import {LatinGreek} from '../scripts/myUtils.js';
"use strict";
/**
 * Created by WinJeroen on 29-10-2014.
 */

var pg1Namespace = {
    chaplength: [611, 877, 461, 544, 909, 529, 482, 561, 713, 579, 848, 471, 837, 522, 746, 867, 761, 616, 424, 503, 611, 515, 897, 804],
    XML: "",
    xmlLoaded: false,
    COLHEIGHT: 45, //see also css
    ColNames: ["#col2", "#col3"],
    clicked: null,
    textLoaded: 0,
    index: -1
};

/**********************************************************************/
/*! XML    it's not normally loaded here anymore                      */

/**********************************************************************/

/**
 * getXML: fetch it if possible from l.s., otherwise from the website
 * @param name = url
 */
function getXML(name) {
    var str, loaded;

    loaded = localStorage.getItem("list_xml_loaded");
    if (loaded === "true") {
        str = localStorage.getItem("list_xml");
        saveXML(str);
        return "local";
    }
    //localstorage not available and/or list not loaded and/or forced reload

    $.ajax({
        type: "GET",
        url: name,
        dataType: "text", //don't parse, save xml as one long string
        success: saveXML,
        cache: true,
        error: function () { //} jqXHR, textStatus, errorThrown ){
            //console.log( textStatus + "," + errorThrown );
            alert("Can't load " + name);
            //do something here to fail gracefully
        }
    });
    return null;
}	//non-error exit always goes through saveXML

/**
 * saveXML
 * @param str: the iliad xml file, 1 string without CR's
 * saves the xml to the global object and if possible to localStorage
 * then move on to the parsing
 */
function saveXML(str) {
    try {
        pg1Namespace.XML = $.parseXML(str);
    }
    catch (e) {
        window.parent.site100oxen.myAlert(e, true, null);
        return;
    }
    localStorage.setItem("list_xml", str);
    localStorage.setItem("list_xml_loaded", "true");
    if (parent.site100oxen) {
        parent.site100oxen.XML = pg1Namespace.XML;
        parent.site100oxen.xml_loaded = true;
        pg1Namespace.xmlLoaded = true;
        /* create new collapsible list in parent page */
        if (parent.site100oxen.global_flag_updating) {
            parent.site100oxen.global_flag_updating = false;
            parent.site100oxen.createlist(pg1Namespace.XML);
        }
    }
    createBlocks();
}

function createBlocks() {
    //equalLevels( $( pg1Namespace.XML ).find( "book" ) );
    drawBlocks(null, pg1Namespace.COLHEIGHT, 0); //setup 'xml loaded' event for remote fetch
}


function getelementnode(n) {
    while (n && n.nodeType !== 1) {
        n = n.nextSibling;
    }
    return n;
}

/**
 * function getlinenr
 * go down tree until "line" node, then take its ltr and nr attributes
 * @param {Object} node - xml node
 * @returns {string} - "booknr.linenr" string or ""
 */
function getlinenr(node) {
    while (node.nodeName !== "line") {
        node = getelementnode(node.firstChild);
        if (node === null) {
            break;
        }
    }
    return node ? node.getAttribute("lnr") : "";
}

/**********************************************************************/
/*! XML                                                               */
/**********************************************************************/

/*
 * drawBlocks: create the block representation of the structure
 * @param: xml node
 *
*/
function drawBlocks($node, colheight, recursion) {
    // recursion == 0: draw col1&col2  recursion=1: recursive call to draw col3 (for every subdiv in col2)
    var $col1, $col2div2, i, bg, fg, h, moving_copy, targetblock, totalEm, scale, has_children,
        oldheight, oldwidth, newheight, newwidth, oldpos, newpos;

    function draw() {
        var app, txt1, txt2, count, before, len, chap, som, diff,
            nextbg, prevbg, t, c1, $trg;

        if (!recursion) {
            $(".subdiv2, .subdiv3").remove();
        }
        if (has_children) {
            $trg = $node.children();
        }
        else {
            $trg = $node; // filler for shorter branches
        }
        $trg.each(function () {
            var $this;

            $this = $(this);
            nextbg = prevbg = "";
            fg = $this.attr("f") || "000000";
            if (has_children) {
                bg = $this.attr("c");
                if(!bg || bg === "000000") {bg = "c0b0a0";}
            } else {
                bg = "c0c0c0"; // filler
            }
            h = (parseInt($this.attr("sz")) * scale);
            txt1 = txt2 = getlinenr(this) + " " + $this.attr("d");
            if (recursion) {
                txt1 = "";
                app = "3";
            } else {
                app = "2";
                if ($this.next().length) {
                    nextbg = $this.next().attr("c");
                }
                if ($this.prev().length) {
                    prevbg = $this.prev().attr("c");
                }
            }
            if (!fg) { //non-initialized subdiv (not in xml)
                txt2 = ""; //don't show title
            }
            $("<div class='subdiv" + app + "'><span>" + txt1 + "</span></div>")
                .css({ //draw col2 blocks, col3 blocks in recursion
//                        "position": "absolute",
                    "background-color": "#" + bg,
                    "color": "#" + fg,
                    "height": h + "rem"
                })
                .attr("title", txt2)
                .appendTo($(pg1Namespace.ColNames[recursion]));

            if (!recursion) {
                drawBlocks($this, parseFloat(h), 1); //curse again
            }
        });
        if (!recursion) { // this is only about col1
            $col1.children().remove();
            $col1.css({
                "outline": 0
            });
            before = 0;
            $node.parents().addBack().prevAll().each(function () {
                before += +$(this).attr("sz");
            });

            len = parseInt($node.attr("sz"));
            scale = colheight / len;
            som = 0;
            count = 0; //0: first box 1:middle boxes (only whole books) 2: last box
            $("#parenttitle").text($node.attr("d"));
            $("#lines").text($node.attr("sz") + " lines");
            txt1 = "";
            for (i = 1; i <= 24; ++i) { //draw col1 book divisions
                //chap = pg1Namespace.chaplength[i - 1];
                chap = LatinGreek.getchaplen(parent.site100oxen.configColumns(1)-1, i);
                som += chap;
                if (som <= before) {
                    continue;
                } //don't draw yet
                if (som >= before + len) { //draw last one
                    if (count === 0) { //beginning & end: only 1 part, smaller than book
                        diff = len;
                        count = 2;
                        t = som - (before + len);
                        if (t === 0) {
                            txt1 = 1 + chap - (som - before) + "-";
                        }
                        else {
                            txt1 = (1 + chap - (som - before)) + "-" + (chap - t);
                        }
                    }
                    else {//end: first part of a book
                        diff = chap - (som - (before + len));
                        ++count;
                        if (diff === chap) {
                            txt1 = chap;
                        }
                        else {
                            txt1 = "-" + diff;
                        }
                    }
                }
                else {
                    if (count === 0) {
                        diff = som - before; //beginning: last part of a book
                        if (diff === chap) {
                            txt1 = diff;
                        }
                        else {
                            txt1 = (1 + chap - diff) + "-";
                        }
                        ++count;
                    } else if (count === 1) {
                        txt1 = diff = chap; //whole book
                    }
                }

                h = (diff * scale) + "rem";
                txt1 = "Book " + i + " (" + txt1 + ")";
                $("<div class='subdiv1'><span>" + txt1 + "</span></div>")
                    .css({
                        "height": h
                    })
                    .appendTo($col1)
                    .attr("title", txt1);

                if (count > 1) {
                    break;
                } //last box drawn
            }
            c1 = $node.attr("c");
            //if(!c1 || c1 === "000000") {c1 = "rgba(200,200,200,0)";}
            c1 = c1 ? "#" + c1 : "rgba(200,200,200,0)"; //col1 start-color = transparent
            if (pg1Namespace.index >= 0) {
                $col1.css({
                    "color": "#" + ($node.attr("f") || "003388")
                })
                    .animate({
                        "background-color": c1
                    }, 1000);
            } else {
                $col1.css({
                    "color": "#" + ($node.attr("f") || "003388"),
                    "background-color": c1
                });
            }
        }
    }

    /* END DRAW */

    /***************/
    /* DRAWBLOCKS: */
    /***************/
    if (!$node) {
        $node = $(pg1Namespace.XML).find('book');
    }
    $col1 = $("#col1");
    has_children = $node.children("line").length === 0;
    //has_children means non-textline children. it's used in draw()
    totalEm = +$node.attr("sz");
    scale = colheight / totalEm;
    if (!recursion) {
        if (pg1Namespace.clicked) { //go left
            moving_copy = pg1Namespace.clicked.clone();
            pg1Namespace.clicked.css("visibility", "hidden");
            oldpos = pg1Namespace.clicked.offset();
            newpos = $col1.offset();
            oldheight = pg1Namespace.clicked.height();
            oldwidth = pg1Namespace.clicked.width();
            newheight = $col1.height();
            newwidth = $col1.width();
            moving_copy.css({
                "width": oldwidth,
                "height": oldheight,
                "left": oldpos.left,
                "top": oldpos.top,
                "position": "absolute"
            })
                .prependTo("#col1")
                .animate({
                    "width": newwidth,
                    "height": newheight,
                    "left": newpos.left,
                    "top": newpos.top
                }, {
                    "duration": 500,
                    "complete": function () {
                        moving_copy.removeClass("subdiv2").attr("id", "col1");
                        draw();
                    }
                });
        } else if (pg1Namespace.index >= 0) { //go right
            moving_copy = $col1.clone();
            draw();
            $col2div2 = $("#col2").find("div.subdiv2");
            targetblock = $col2div2.eq(pg1Namespace.index);
            newpos = targetblock.offset();
            oldpos = $col1.offset();
            oldheight = $col1.height();
            oldwidth = $col1.width();
            newheight = targetblock.height();
            newwidth = targetblock.width();
            if (pg1Namespace.index > 0) {
                moving_copy.insertAfter($col2div2.eq(pg1Namespace.index - 1));
            }
            else if (pg1Namespace.index === 0) {
                moving_copy.insertBefore($col2div2.eq(0));
            }
            targetblock.css("visibility", "hidden");
            moving_copy.css({
                "width": oldwidth,
                "height": oldheight,
                "left": oldpos.left,
                "top": oldpos.top,
                "position": "absolute"
            })
                .animate({
                    "width": newwidth,
                    "height": newheight,
                    "left": newpos.left,
                    "top": newpos.top
                }, {
                    "duration": 500,
                    "complete": function () {
                        targetblock.css("visibility", "visible");
                        moving_copy.remove();
                    }
                });
        } else {
            draw(); // control arrives here on initial draw, not for clicks
        }
    } else {
        draw(); // and here for the middle blocks (recursive calls)
    }
}

/**
 * columnclick: move up/down the xmltree & display by calling drawblocks()
 * @param: (mouse)event
 */
function columnclick(e) {
    var s = "", $t, $node, $x, $trg, tmp, txt, booknr, lnr;

    pg1Namespace.clicked = null;
    pg1Namespace.index = -1;
    e.stopPropagation();
    $t = $(e.target);
    if ($t.parents("div#col2").length) {
        pg1Namespace.clicked = $t; //going forw/left, which col2 subdiv will go to col1?
        txt = $t.text();
        tmp = txt.substr(txt.indexOf(" ") + 1);
        lnr = txt.substr(0, txt.indexOf(" "));
        s = '[d="' + tmp + '"]';
        $trg = $(pg1Namespace.XML).find(s);
        if ($trg.length > 1) {
            $trg.each(function (i, node) {
                if (lnr === getlinenr(node)) {
                    $trg = $trg.eq(i);
                    return false;
                }
            });
        }
        if (parent) {
            parent.site100oxen.showAndGotoAnyLine("il" + getlinenr($trg[0]), false);
        }
        if (!$trg[0].firstChild || $trg[0].firstChild.nodeName === "line") {
            return;
        }
    }
    else if ($t.parents("div#col1").length) {
        txt = $(".subdiv2").eq(0).text();
        lnr = txt.substr(0, txt.indexOf(" "));
        $x = $(pg1Namespace.XML).find('[d="' + $("#parenttitle").text() + '"]');
        if ($x.length > 1) {
            $x.each(function (i, node) {
                if (lnr === getlinenr(node)) {
                    $x = $x.eq(i);
                    return false;
                }
            });
        }
        $node = $x.parent();
        if (parent) {
            if ($node.is("book")) {
                parent.site100oxen.showAndGotoAnyLine("il1.1", false);
            }
            else {
                s = $node.attr("d");
                if (!s) {
                    if ($t.is("span")) {
                        $t = $t.parent();
                    }
                    booknr = $t.index() + 1;
                    parent.site100oxen.showAndGotoAnyLine("il" + booknr + ".1", false);
                    return;
                } else {
                    s = '[d="' + s + '"]';
                    $trg = $(pg1Namespace.XML).find(s);
                }
                parent.site100oxen.showAndGotoAnyLine("il" + getlinenr($node[0]), false);
            }
        }
        pg1Namespace.index = $node.children().index($x);//going back/right, which col2 subdiv is now in col1?
    }
    else {
        return;
    }

    drawBlocks($trg, pg1Namespace.COLHEIGHT, 0);
}

/**********************************************************************/
/* initialize:                                                        */
/**********************************************************************/
$(document).ready(function () {
    var from;

    $("html").niceScroll({
        cursorcolor: "#888",
        cursorwidth: "7px",
        background: "rgba(0,0,0,0.1)",
        cursoropacitymin: 0.2,
        hidecursordelay: 0,
        zindex: 2,
        horizrailenabled: true
    });

    $("#wrap").on("click", columnclick);
    //$(document).ajaxComplete(createBlocks);

    if (parent.site100oxen) {
        if (parent.site100oxen.forcereload || !parent.site100oxen.xml_loaded) {
            from = getXML("iliad.xml"); //fetch from the web (async, callback) or localStorage
            if (from === "local") {
                createBlocks();
            }
        }
        else {
            pg1Namespace.XML = parent.site100oxen.XML;
            createBlocks();
        }
    }
    else {
        getXML("iliad.xml");
    }
});
/* end of 'ready' */


