import {LatinGreek, myAlert} from '../scripts/myUtils.js?v=0.1.6';

"use strict";
/**
 * Created by WinJeroen on 29-10-2014.
 */

let pg1Namespace = {
    xmlLoaded: false,
    COLHEIGHT: 45, //see also css
    ColNames: ["#col2", "#col3"],
    clicked: null,
    textLoaded: 0,
    index: -1,
    prefixes: ["Il", "Od", "Th", "WD"],
};

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

/**
 * drawBlocks: create the block representation of the structure
 * @param: xml node
 *
 */
function drawBlocks($node, colheight, recursion) {
    // recursion == 0: draw col1&col2  recursion=1: recursive call to draw col3 (for every subdiv in col2)
    let $col1, $col2div2, moving_copy, targetblock, totalEm, scale, has_children,
        oldheight, oldwidth, newheight, newwidth, oldpos, newpos;

    function draw() {
        let bg, fg, text, count, before, len, chap, som, diff, t, c1, $trg;
        // nextbg, prevbg,

        if (!recursion) {
            $(".subdiv2, .subdiv3").remove();
        }
        if (has_children) {
            $trg = $node.children();
        } else {
            $trg = $node; // filler for shorter branches
        }
        $trg.each(function () {
            let $this, h, app, txt1, txt2;

            $this = $(this);
            // nextbg = prevbg = "";
            fg = $this.attr("f") || "000000";
            if (has_children) {
                bg = $this.attr("c");
                if (!bg || bg === "000000") {
                    bg = "c0b0a0";
                }
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
                // if ($this.next().length) {
                //     nextbg = $this.next().attr("c");
                // }
                // if ($this.prev().length) {
                //     prevbg = $this.prev().attr("c");
                // }
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
            text = "";
            for (let i = 1; i <= 24; ++i) { //draw col1 book divisions
                chap = LatinGreek.getchaplen(window.parent.site100oxen.get_col_config(1) - 1, i);
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
                            text = 1 + chap - (som - before) + "-";
                        } else {
                            text = (1 + chap - (som - before)) + "-" + (chap - t);
                        }
                    } else {//end: first part of a book
                        diff = chap - (som - (before + len));
                        ++count;
                        if (diff === chap) {
                            text = chap;
                        } else {
                            text = "-" + diff;
                        }
                    }
                } else {
                    if (count === 0) {
                        diff = som - before; //beginning: last part of a book
                        if (diff === chap) {
                            text = diff;
                        } else {
                            text = (1 + chap - diff) + "-";
                        }
                        ++count;
                    } else if (count === 1) {
                        text = diff = chap; //whole book
                    }
                }

                let h = (diff * scale) + "rem";
                text = "Book " + i + " (" + text + ")";
                $("<div class='subdiv1'><span>" + text + "</span></div>")
                    .css({
                        "height": h
                    })
                    .appendTo($col1)
                    .attr("title", text);

                if (count > 1) {
                    break;
                } //last box drawn
            }
            c1 = $node.attr("c");
            if (!c1 || c1 === "000000") {
                c1 = "rgba(200,200,200,0)";
            } else {
                c1 = "#" + c1;
            } //col1 start-color = transparent
            if (pg1Namespace.index >= 0) {
                $col1.css({
                    "color": "#" + ($node.attr("f") || "003388")
                })
                    .animate({
                        "background-color": c1
                    }, 2000);
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
    /* DRAWBLOCKS: */ //execution starts here
    /***************/
    if (!$node) {
        $node = $(window.parent.site100oxen.XML).find('book');
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
            } else if (pg1Namespace.index === 0) {
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
    pg1Namespace.blocks_drawn = true;
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
        $trg = $(window.parent.site100oxen.XML).find(s);
        if ($trg.length > 1) {
            $trg.each(function (i, node) {
                if (lnr === getlinenr(node)) {
                    $trg = $trg.eq(i);
                    return false;
                }
            });
        }
        if (parent) {
            window.parent.site100oxen.showAndGotoAnyLine(
                pg1Namespace.prefixes[window.parent.site100oxen.get_col_config(1) - 1] + " " + getlinenr($trg[0]), false);
        }
        if (!$trg[0].firstChild || $trg[0].firstChild.nodeName === "line") {
            return;
        }
    } else if ($t.parents("div#col1").length) {
        txt = $(".subdiv2").eq(0).text();
        lnr = txt.substr(0, txt.indexOf(" "));
        $x = $(window.parent.site100oxen.XML).find('[d="' + $("#parenttitle").text() + '"]');
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
            if ($node.is("lvl0")) {
                window.parent.site100oxen.showAndGotoAnyLine("1.1", false);
            } else {
                s = $node.attr("d");
                if (!s) {
                    if ($t.is("span")) {
                        $t = $t.parent();
                    }
                    booknr = $t.index() + 1;
                    window.parent.site100oxen.showAndGotoAnyLine(
                        pg1Namespace.prefixes[window.parent.site100oxen.get_col_config(1) - 1] + " " + booknr + ".1", false);
                    return;
                } else {
                    s = '[d="' + s + '"]';
                    $trg = $(window.parent.site100oxen.XML).find(s);
                }
                window.parent.site100oxen.showAndGotoAnyLine(
                    pg1Namespace.prefixes[window.parent.site100oxen.get_col_config(1) - 1] + " " + getlinenr($node[0]), false);
            }
        }
        pg1Namespace.index = $node.children().index($x);//going back/right, which col2 subdiv is now in col1?
    } else {
        return;
    }

    drawBlocks($trg, pg1Namespace.COLHEIGHT, 0);
}

/**********************************************************************/
/* initialize:                                                        */
/**********************************************************************/
$(document).ready(function () {
    var from;

    $("#blocks_header").click(function () {
        window.parent.site100oxen.configColumns(0, 1, false);
    });

    $("html").niceScroll({
        cursorcolor: "#888",
        cursorwidth: "7px",
        background: "rgba(0,0,0,0.1)",
        cursoropacitymin: 0.2,
        hidecursordelay: 0,
        zindex: 2,
        horizrailenabled: true
    });
    // $(window).on({
    //     "beforeunload": function () {
    //         //pg1Namespace = null;
    //     }
    // });
    $("#wrap").on("click", columnclick);
    drawBlocks(null, pg1Namespace.COLHEIGHT, 0);

});
/* end of 'ready' */


