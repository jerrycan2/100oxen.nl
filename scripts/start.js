import * as utils from '../scripts/myUtils.js';
import {beta2uni, uni2beta, LatinGreek} from '../scripts/beta.js';

'use strict';
// lineID format: [Il|Od|Th|WD][:|space|nothing] Xnnn | mm.nnn | nnn where m,n are digits and X is a greek or latin letter (case insensitive)

//region Site global var
window.site100oxen = {
    nolocalstorage: false,
    forcereload: true,
    global_flag_updating: false,
    XML: null, //here comes the XML parsetree
    xml_loaded: false,
    xmlstring: "",
    showAndGotoAnyLine: null,
    init_tree: null,
    createlist: null,
    setnodeattributes: null,
    find_xml_node: null,
    untouchable: true,
    getNewIframeFile: null,
    currentPage: "",
};
//endregion Site global vars

(function ($) {

    //region Page global (jbNS)
    /**********************************************************************/
    /*! global Objects:                                                   */
    /**********************************************************************/
    /**
     * object jbNS
     * Namespace object for global variables
     */
    let jbNS = {
        norm_window_width: 1920,

        columns_config: [1, 1, 3, 0], // List/Page=bit0/bit1, Il/Od/Theo/W&D=1-4, GR/EN=bit0/bit1, Text/Help=bit0/bit1
        width: [0, 0, 0, 0],
        oldcolnum: 0,
        prefixes: ["Il", "Od", "Th", "WD"], //bookmark prefix = prefixes[ columns_config[ 1 ] - 1 ]
        filenames: [
            ["list.html", ""],
            ["greek_il.html", "greek_od.html", "hesiod_theo_greek.html", "hesiod_wd_greek.html"],
            ["butler_il.html", "butler_od.html", "hesiod_theo_transl.html", "hesiod_wd_transl.html"],
            ["textframe.html", "help.php"]
        ],
        xml_names: ["iliad.xml", "odyssey.xml", "", ""],
        perseus_names: [
            ["1999.01.0133", "1999.01.0135", "1999.01.0129", "1999.01.0131"],//iliad, odyssey
            ["1999.01.0134", "1999.01.0136", "1999.01.0130", "1999.01.0132"] //theo, wd
        ],
        perseus_url: "http://www.perseus.tufts.edu/hopper/text?doc=Perseus:text:1999.04.0072:entry=i(/hmi-contents'",

        pages_local: [
            ["100oxen.php", "100 Oxen"],
            ["editor.php", "editor"],
            ["blocks.php", "Proportional View"],
            ["send.php", "contact"],
        ],
        pages_extern: [
            ["", ""],
            ["http://www.perseus.tufts.edu/hopper/", "Perseus"],
            ["http://digital.library.northwestern.edu/homer/", "The Chicago Homer"]
        ],
        treeframe: $("#treeframe"),
        pageframe: $("#pageframe"),
        greekframe: $("#greekframe"),
        butlerframe: $("#butlerframe"),
        textframe: $("#textframe"),
        pages_menu_expanded: false,
        basic_fontsize: 16, //px
        keepFontsize: false, //if true: fontsize remains same after window resize
        OL_level: null,
        LI_elements: null,
        gr_beginLine: 0,
        bu_beginLine: 0,
        gr_previousLine: 0,
        greekanchors: null,
        butleranchors: null,
        treetop_el_index: 0,
        previous_goto: "",
        lastscroll: "",
        line_id_fits_text: false,
        bookMarx: [
            ["---Il:--"],
            ["---Od:--"],
            ["---Th:--"],
            ["---WD:--"]
        ],
        parse_lineID: /((il|od|th|wd)?(\s|:)?)?(((\d+\.)|([a-zA-Z\u0391-\u03C9]))?(\d+))/i,
        // "il 14.100" "od:a200" "wd 50" ":50" "50" etc $1=all, $2=text, $3=greek/eng, $4=lineNR ($6=chap, $7 = letter, $8=line)
        bm_to_goto: "",
        selectBtnMessages: [
            [""],
            ["???"],
            ["Goto gr.", "<img id='perseus' alt='Perseus icon' src='../images/alpheios.png'> :", "Greek", "English"],
            ["Goto eng.", "<img id='perseus' alt='Perseus icon' src='../images/alpheios.png'> :", "Greek", "English"],
            ["Goto"],
            ["Find gr.", "<img id='perseus' alt='Perseus icon' src='../images/alpheios.png'> :", "Word Study"],
            ["Find eng."]
        ],
        selectBtnActions: [
            [showAndGotoAnyLine, null, perseusLookup, perseusLookup],
            [textsearch, null, perseus_WS_search]
        ],
        selectBtnChoice: 0,
        showonlyselection: false,
        swcoldown: false,
        exp_state: "11",
        editing: false,
        scrollspeed: 600,
        touchcancel: false,
        dontSetColumns: false,
        colResizeStep: 96,
        currentLevel: 2,
        newXML: true,
    };
    //endregion Page global

    //region Perseus
    /**********************************************************************/
    /*! Perseus:                                                           */

    /**********************************************************************/
    /**
     * function perseusLookup
     * goto perseus site and load the relevant text. also set columns
     * @param language //  0=greek, 1=english
     */
    function perseusLookup(language) {
        let i, n1, n2, text, textindex, url1, parse, s, line;

        s = $("#textinput").val();
        parse = s.match(jbNS.parse_lineID);
        if (parse[4]) {
            line = lineID_2_lineNR_obj(parse[4]);
            n1 = line.c;
            n2 = line.l;
        } else {
            return;
        }
        text = parse[2].toLowerCase();
        textindex = -1;
        for (i = 0; i < jbNS.prefixes.length; i += 1) {
            if (jbNS.prefixes[i].toLowerCase() === text) {
                textindex = i;
                break;
            }
        }
        url1 = jbNS.perseus_url;
        if (textindex >= 0) {
            url1 += jbNS.perseus_names[language][textindex];
        } else {
            return;
        }
        if (textindex < 2) { // il, od
            url1 = url1 + ":book=" + n1 + ":card=" + n2;
        } else {
            url1 = url1 + ":card=" + n2;
        }
        //url1 = encodeURI( url1 ); ??
        $("#pageframe")[0].src = url1;
        configColumns(0, 2, true);
        try {
            history.pushState(null, "", url1);
        } catch (ignore) {
        }
    }

    function selectText(containerid) {
        let range;
        if (document.selection) { // IE
            range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
        }
    }

    /**
     * goto perseus word-study with word in #textinput
     */
    function perseus_WS_search() {
        let result, url;


        //selectText("hiddendiv");
        $("#hiddendiv").show();
        $("#alphtext").text($("#textinput").val());

        // result = $.trim($("#textinput").val());
        // result = uni2beta(result, true);
        // if (result === "") {
        //     myAlert("no selection!", false, null);
        //     return;
        // }
        // result = result.replace(/wi/, "w|"); //replace iota subscriptum after eta en omega
        // result = result.replace(/hi/, "h|"); //(->Perseus beta code)
    }

    //endregion Perseus

    //region scrolling & searching
    /**
     * function scrollgreek
     * scroll #greekframe to the line in jbNS.gr_beginLine
     */
    function scrollgreek() {
        let begin, $top;

        begin = jbNS.gr_beginLine < 1 ? 0 : jbNS.gr_beginLine - 1; //top = the previous line
        if (!jbNS.greekanchors || !jbNS.greekanchors[begin] || jbNS.greekframe[0].style.visibility === "hidden") {
            return;
        }
        $top = jbNS.greekanchors.eq(begin).parent().prev();
        if ($top.is("a")) {
            $top[0].scrollIntoView();
        } else {
            jbNS.greekanchors[begin].scrollIntoView();
        }
    }

    /**
     * function gotoAnchor (only in textframe)
     * scroll #textframe to a named anchor
     * @param aname : string // name of anchor
     * @param hovering : boolean // true if not clicked->no scroll
     */
    function gotoAnchor(aname, hovering) { /* in textframe */
        let anchor;//, hdr;

        anchor = jbNS.textframe.contents().find('a[target="' + aname + '"]');
        if (anchor.length) {
            if (!hovering) {
                anchor[0].scrollIntoView();
            }
            return true;
        }
        return false;
    }

    /**
     * function loadAndGotoTextframeAnchor
     * scroll #textframe to a named anchor. Load textframe if needed
     * @param name : string // name of anchor
     */
    function loadAndGotoTextframeAnchor(name) {
        if (jbNS.columns_config[3] !== 1) {
            jbNS.textframe.one("load", function () {
                gotoAnchor(name, false);
            });
            jbNS.textframe[0].src = jbNS.filenames[3][0];
            configColumns(3, 1, true);
        } else {
            gotoAnchor(name, false);
        }
    }

    /**********************************************************************/
    /*! Finding linenrs IN THE TEXT                                       */

    /**********************************************************************/
    /**
     * function checklastletter
     * for Hesiod text: check if last char of a linenumber is a letter
     * if so, convert it to a decimal fraction (hack for compare_Butler_Anchors)
     * @param lineID : string
     * @returns {number}
     */
    function checklastletter(lineID) {
        let n, ix;

        n = lineID.substr(-1, 1);
        ix = "abcdefghijklmnopqrst".indexOf(n) + 1;
        return (ix * 0.01); //rtns 0 if not a letter
    }

    /**
     * function lineID_2_lineNR_obj : convert lineID in 1 of the greek/butler texts to standard object
     * @param lineID : string // line number as shown onscreen in 1 of 4 formats
     * @returns {object} : object // linenumber object: ( c:chapter, l:line ) = {number, number}
     */
    function lineID_2_lineNR_obj(lineID) { // in: lineID, out: object { chapter, linenr }; chapter = 1 for Hesiod texts
        let i, n, chap, lnr;
        // 3 formats: letter number, number.number, number
        i = lineID.indexOf(".");
        if (i < 0) {
            lnr = n = parseInt(lineID, 10);
            if (n) { // Hesiod greek
                chap = 1;
                if (jbNS.columns_config[1] === 4) { // if WD loaded
                    if (n === 169) {
                        n = 173.5;
                    } // hack: W&D lines out of order (169a etc. between 173 & 174)
                    lnr = n + checklastletter(lineID);
                }
            } else { // Il or Od greek or latin
                n = LatinGreek.greek2index(lineID.substr(0, 1));
                if (n < 0) {
                    n = LatinGreek.latin2index(lineID.substr(0, 1));
                }
                if (n >= 0) { // n < 0: error
                    if (n > 23) {
                        n -= 24;
                    }
                    chap = n + 1; // mustn't be 0
                    lnr = parseInt(lineID.substr(1), 10);
                }
            }
        } else { // Il or Od transl. "chapter.line"
            chap = parseInt(lineID, 10);
            lnr = parseInt(lineID.substr(i + 1), 10);
        }
        if (!(lnr && chap)) {
            return null; // error condition
        }
        return {c: chap, l: lnr};
    }

    /**
     * function compare_lineNRs
     * compare_lineNRs after converting to linenumber objects
     * @param t1 : string
     * @param t2 : string
     * @returns number : 0 if t1 === t2, > 1, < -1
     */
    function compare_lineNRs(t1, t2) { // for binary search
        let ch1, ln1, ch2, ln2, n1, n2;

        n1 = lineID_2_lineNR_obj(t1);
        if (!n1) {
            utils.myAlert("'" + t1 + "' is not a line number", false, null);
        }
        n2 = lineID_2_lineNR_obj(t2);
        if (!n2) {
            utils.myAlert("'" + t2 + "' is not a line number", false, null);
        }
        if (!n1 || !n2) {
            return 0;
        }
        ch1 = n1.c;
        ch2 = n2.c;
        ln1 = n1.l;
        ln2 = n2.l;
        if (ch1 < ch2) {
            return -1;
        }
        if (ch1 > ch2) {
            return 1;
        }
        if (ln1 < ln2) {
            return -1;
        }
        if (ln1 > ln2) {
            return 1;
        }
        return 0;
    }

    /**
     * function compare_lineIDs : lineID = (text language chapter line), lineNR = (chapter line)
     * compare 2 lineID strings
     * @param t1 : lineID
     * @param t2 : lineID
     * @returns {number} // 1, -1 or 0
     */
    function compare_lineIDs(t1, t2) {
        let parsebm, id1, id2, lang1, lang2;

        if (!t1 || t1[0] === "-") {
            return -1;
        }
        if (!t2 || t2[0] === "-") {
            return 1;
        }

        parsebm = t1.match(jbNS.parse_lineID);
        id1 = parsebm[4];
        lang1 = parsebm[3];
        parsebm = t2.match(jbNS.parse_lineID);
        id2 = parsebm[4];
        lang2 = parsebm[3];
        if (lang1 !== lang2) {
            return (lang1 === " " ? -1 : 1); //diff. languages: greek first
        }
        return compare_lineNRs(id1, id2);
    }

    /**
     * function compare_Butler_Anchors
     * compare linenumbers( x.y or y ) in the butler text (not all butlerlines are numbered)
     * -> is 'item' in the section between this (found1) and next (found2)
     * @param Aindex : number // index in global array jbNS.butleranchors
     * @param item : string // item to search for ( x.y etc )
     * @param which : number // flag: if which == 2 count back 1 line (for selecting up to, not including, next section
     * @returns : number // flag : 0 if t1 === t2, > 1, < -1
     */
    function compare_Butler_Anchors(Aindex, item, which) { //which: see bm_butler_search
        let found1, found2, target, this1, this2, nxt1, nxt2, it1, it2, it, fnd, nxt, s;

        if (Aindex >= jbNS.butleranchors.length - 1) {
            if (item === jbNS.butleranchors.eq(Aindex).text()) {
                return (0);
            }
            return (1);
        } // item & lineID actually are lineNRs here
        s = jbNS.butleranchors.eq(Aindex).text();
        found1 = lineID_2_lineNR_obj(s) || utils.myAlert("'" + s + "' is not a line number", false, null);
        this1 = found1.c; // found beginline of section
        this2 = found1.l;

        s = jbNS.butleranchors.eq(Aindex + 1).text();
        found2 = lineID_2_lineNR_obj(s) || utils.myAlert("'" + s + "' is not a line number", false, null);
        nxt1 = found2.c; // beginline of next section
        nxt2 = found2.l;

        target = lineID_2_lineNR_obj(item) || utils.myAlert("'" + item + "' is not a line number", false, null);
        it1 = target.c;
        it2 = target.l;
        if (which === 2) { //second linenumber: move back 1 iliad line
            if (it2 > 1) { //second is never [1.1]
                it2 -= 1;
            } else {
                it1 -= 1;
                it2 = LatinGreek.getchaplen(it1); // last line of prev book
            }
        }
        it = (it1 * 1000) + it2;
        fnd = (this1 * 1000) + this2;
        nxt = (nxt1 * 1000) + nxt2;

        if (it === fnd) {
            return 0;
        }
        if (it > fnd && it < nxt) {
            return 0;
        }
        if (it < fnd) {
            return 1;
        }
        return -1;
    }

    //endregion scrolling & searching

    //region Bookmarks

    /**
     * function cleanupBookMarx
     * delete empty entries in bookmarx[][] array, also write them to the <select> options
     */
    function cleanupBookMarx() {
        let i, n, opt, txt, tmp, bm;

        opt = document.getElementById("BMselector");
        opt.options.length = 0;
        n = 0;
        for (txt = 0; txt < 4; txt += 1) {
            jbNS.bookMarx[txt].sort(compare_lineIDs);
            for (i = 0; i < jbNS.bookMarx[txt].length; i += 1) {
                bm = jbNS.bookMarx[txt][i];
                if (bm !== "") {
                    opt.options[n] = new Option(bm);
                    opt.options[n].name = txt; // store the index of the text, to know which text the bm is in
                    if (bm.substr(0, 1) === "-") {
                        opt.options[n].disabled = true;
                        opt.options[n].style.backgroundColor = "#aaaaaa";
                    }
                    n += 1;
                }
            }
            jbNS.bookMarx[txt].length = 0;
        }
        // clean up bookmarx
        txt = 0;
        for (i = 0; i < opt.options.length; i += 1) {
            tmp = opt.options[i].text;
            if (i > 0 && tmp.substr(0, 1) === "-") {
                txt += 1;
            }
            jbNS.bookMarx[txt][jbNS.bookMarx[txt].length] = tmp;
        }
    }

    /**
     * function adjustBMselector
     * if txt = "": set selectedIndex of bookmark selector to proper text (Il, Od, Theo, WD)
     * if txt = bookmark, set selectedIndex to that bm
     */
    function adjustBMselector(txt) {
        let i, sel;

        sel = $("#BMselector")[0];
        if (txt === "") {
            txt = jbNS.bookMarx[jbNS.columns_config[1] - 1][0];
        }
        for (i = 0; i < sel.options.length; i++) {
            if (sel.options[i].value === txt) {
                sel.selectedIndex = i;
            }
        }
    }

    /**
     * function bm_greek_search
     * binary search for <a> with text 'lineID' in #greekframe
     * @param lineNR : string // linenumber (also bookmark) to search for (4 formats)
     * @param scroll : boolean // if true, scroll to there
     * @param mark : number // flag: 0: don't color, give error if target doesn't exist; 1: toggle color, no error; 2: no color, no error
     * @returns {number} : index to jbNS.greekanchors or -1
     */
    function bm_greek_search(lineNR, scroll, mark) {
        let step, max, i, groter, stepcount, tl, groter2, $lines;  // returns index of line

        $lines = jbNS.greekanchors; // $("a") array
        if ($lines.length) {
            i = $lines.length - 1;
        } else {
            return -1;
        }
        max = i;
        step = i >> 1;
        stepcount = 0;
        while (true) {
            if (step === 1) {
                stepcount += 1;
            }
            if (stepcount > 15) {
                if (mark === 0) {
                    utils.myAlert("Can't find '" + lineNR + "'!", false, null);
                }
                return -1;
            }
            // this routine does not enter the line into the bookmarx[] array
            tl = $lines[i];    //but it can toggle the BM color
            groter = compare_lineNRs(tl.textContent, lineNR);
            // if(jbNS.columns_config[1] > 2) { // Hesiod: not every line has a nr
            if (i < $lines.length - 1) {
                groter2 = compare_lineNRs($lines[i + 1].textContent, lineNR);
                if (groter === -1 && groter2 === 1) {
                    groter = 0;
                }
            }
            if (groter === 0) {
                if (mark === 1) {
                    if (tl.className === "bmcolor") {
                        tl.className = "";
                    } else {
                        jbNS.gr_previousLine = jbNS.gr_beginLine = i + 1;
                        tl.className = "bmcolor";
                    }
                }
                if (scroll) {
                    jbNS.gr_previousLine = jbNS.gr_beginLine = i + 1;
                    scrollgreek();
                }
                break;
            }
            if (groter === -1) {
                i += step;
            } else {
                i -= step;
            }
            if (step > 1) {
                step >>= 1;
            }
            if (i < 0) {
                i = 0;
            }
            if (i > max) {
                i = max;
            }
        }
        return i; //return index to jbNS.greekanchors or -1
    }

    /**
     * function bm_butler_search
     * binary search for linenumber (bookmark) in butler text
     * @param item : string // linenumber as string
     * @param which : number //see compareanchors
     * @returns : number // index in array of anchors
     */
    function bm_butler_search(item, which) {   // which===1 or 2: beginline or "beginline of next section"
        let i, step, max, groter, stepcount;   // 2 is only used for coloring

        if (!item || !jbNS.butleranchors.length) {
            return -1;
        }
        i = jbNS.butleranchors.length - 1;
        max = i;
        step = i >> 1;
        stepcount = 0;
        while (true) {
            if (step === 1) {
                stepcount += 1;
            }
            if (stepcount > 15) {
                //if (mark === 0) alert("Can't find '" + LineID + "'!");
                return -1;
            }
            groter = compare_Butler_Anchors(i, item, which);
            if (groter === 0) {
                break;
            }
            if (groter === -1) {
                i += step;
            } else {
                i -= step;
            }
            if (step > 1) {
                step >>= 1;
            }
            if (i < 0) {
                i = 0;
            }
            if (i > max) {
                i = max;
            }
        }
        return i;
    }

    /**
     * function butlerGotoBM
     * scroll to given butler linenumber
     * @param lineNR : string
     */
    function butlerGotoBM(lineNR) {
        let lineindex;

        lineindex = bm_butler_search(lineNR, 1);
        if (lineindex >= 0) {
            if ($("#butlerframe:visible").length) {
                jbNS.butleranchors[lineindex].scrollIntoView();
            }
        } else {
            utils.myAlert("Butler bookmark not found", false, null);
        }
        return lineindex;
    }

    /**
     * function setUnsetBookMark
     * Create bookmark from a lineNR, set/unset bookmark marking & combobox select options
     * @param bookmark : string // line number as string
     * @param toggle : boolean // do/don't toggle bookmark (XOR / OR), do if alt-click, don't if 'select' by combobox
     * @param greek : boolean // if true: greek bookmark, false: butler
     * @return boolean // false if too many bookmarks
     */
    function setUnsetBookMark(bookmark, toggle, greek) {
        let linenr, i, $target, currtxt, bms, hascolon, parsebm;
        /* bookmark = lineID = [prefix +] lineNR */
        currtxt = jbNS.columns_config[1] - 1;
        if (currtxt < 0) {
            return false;
        }
        parsebm = bookmark.match(jbNS.parse_lineID); //$1=lineID, $2=text, $3=greek/eng, $4=lineNR ($6=chap, $7 = letter, $8=line
        linenr = parsebm[4];
        if (!linenr) {
            return false;
        }
        if (parsebm[3]) {
            hascolon = parsebm[3] === ":"; //possible switch to other language
        } else {
            hascolon = !greek;
        }
        if (!parsebm[2]) {
            bookmark = jbNS.prefixes[currtxt] + (hascolon ? ":" : " ") + linenr;
        }

        if (greek && !hascolon) {
            $target = jbNS.greekanchors.eq(bm_greek_search(linenr, false, 2));
        } else if (!greek && hascolon) {
            $target = $(jbNS.butlerframe).contents().find("a:contains('" + linenr + "'):first");
        } else {
            return false;
        }
        bms = jbNS.bookMarx[currtxt];
        i = $.inArray(bookmark, bms);
        if (i >= 0) {
            if (toggle) {
                $target.removeClass("bmcolor");
                bms[i] = "";
            } else {
                $target.addClass("bmcolor");
            }
        } else {
            $target.addClass("bmcolor");
            if (bms.length > 1000) {
                return true;
            }
            bms[bms.length] = bookmark;
        }
        cleanupBookMarx();
        adjustBMselector("");
        return false;
    }

    /**
     * function putbackBookmarks
     * set bookmarks after switching text or reload
     * @param greek
     */
    function putbackBookmarks(greek) {
        let currtxt, i, bm;

        currtxt = jbNS.columns_config[1] - 1;
        if (currtxt < 0) {
            return;
        }
        bm = jbNS.bookMarx[currtxt];
        for (i = 0; i < bm.length; ++i) {
            if (bm[i].substr(0, 1) !== "-") {
                jbNS.gr_previousLine = 0;
                setUnsetBookMark(bm[i], false, greek);
            }
        }
        adjustBMselector("");
    }

    function del_all_bm() {
        let i;

        for (i = 0; i < 4; ++i) {
            jbNS.bookMarx[i].length = 1;
        }
        cleanupBookMarx();
        jbNS.greekanchors.removeClass("bmcolor");
        jbNS.butleranchors.removeClass("bmcolor");
        adjustBMselector("");
    }

    /**
     * function goto_BM_on_load
     * read a global let on iframe load, if it's not empty, goto that bm
     */
    function goto_BM_on_load() {
        let bm, parsebm;

        jbNS.gr_previousLine = 0;
        if (!jbNS.bm_to_goto) {
            return;
        }
        parsebm = jbNS.bm_to_goto.match(jbNS.parse_lineID);
        if (!parsebm[4]) {
            return;
        } // 4 = lineID
        bm = parsebm[4];
        if (jbNS.columns_config[2] & 1) {
            bm_greek_search(bm, true, 0);
        }
        if (jbNS.columns_config[2] & 2) {
            butlerGotoBM(bm);
        }
        adjustBMselector(jbNS.bm_to_goto);
        jbNS.bm_to_goto = "";
    }

    function nextbm(event) {
        let i, $bmsel, bmsel;

        event.stopImmediatePropagation();
        $bmsel = $("#BMselector");
        bmsel = $bmsel[0];
        i = bmsel.selectedIndex;
        if (i === -1) {
            i = 0;
        }
        if (i + 1 >= bmsel.options.length || bmsel.options[i + 1].value[0] === "-") {
            if (bmsel.options[i].value[0] === "-") {
                return;
            }
            while (i > 0 && bmsel.options[i - 1].value[0] !== "-") {
                i -= 1;
            }
        } else {
            i += 1;
        }
        bmsel.selectedIndex = i;
        if (bmsel.options[i].value[0] !== "-") {
            changebm(event);
        }
    }

    function prevbm(event) {
        let i, $bmsel, bmsel;

        event.stopImmediatePropagation();
        $bmsel = $("#BMselector");
        bmsel = $bmsel[0];
        i = bmsel.selectedIndex;
        if (bmsel.options[i].value[0] === "-") {
            return;
        }
        if (i - 1 < 1 || bmsel.options[i - 1].value[0] === "-") {
            while (i < bmsel.options.length - 1 && bmsel.options[i + 1].value[0] !== "-") {
                i += 1;
            }
        } else {
            i -= 1;
        }
        bmsel.selectedIndex = i;
        if (bmsel.options[i].value[0] !== "-") {
            changebm(event);
        }
    }

    function changebm(event) {
        event.stopImmediatePropagation();
        showAndGotoAnyLine($("#BMselector").val(), true);
    }

    //endregion Bookmarks

    //region goto linenrs
    /**
     * function showAndGotoAnyLine
     * goto any lineID (bookmark), load text /switch language as needed
     * @param bookmark // = lineID
     */
    function showAndGotoAnyLine(bookmark, loadtext) {
        let i, textindex, prefix, parsebm, lang;

        if (loadtext === false &&
            (jbNS.columns_config[1] === 0 || jbNS.columns_config[2] === 0)) {
            return;
        }
        textindex = 0;
        parsebm = bookmark.match(jbNS.parse_lineID);
        if (!parsebm) {
            utils.myAlert(bookmark + ": Not a linenumber!", false, null);
            return;
        }
        prefix = parsebm[2];
        if (!prefix) {
            textindex = jbNS.columns_config[1]; // same text
        } else {
            prefix = prefix.toLowerCase();
            for (i = 0; i < jbNS.prefixes.length; ++i) {
                if (jbNS.prefixes[i].toLowerCase() === prefix) {
                    textindex = i + 1;
                    break;
                }
            }
        }
        if (textindex < 1) {
            utils.myAlert("Not a linenumber!", false, null);
            return;
        }
        if (parsebm[3] === ":") {
            lang = 2; //english
        } else if (parsebm[3] === " ") {
            lang = 1; //greek
        } else {
            lang = jbNS.columns_config[2];
        } // same language

        if (!lineID_2_lineNR_obj(parsebm[4])) {
            utils.myAlert("'" + parsebm[4] + "' is no linenumber!", false, null);
            return;
        }
        jbNS.bm_to_goto = bookmark;
        if (jbNS.columns_config[2] === 0) {
            if (loadtext) {
                configColumns(2, lang, true);
            } else {
                jbNS.bm_to_goto = "";
                return;
            }
        }
        if (textindex !== jbNS.columns_config[1]) { //
            if (loadtext) {
                fetchTexts(textindex - 1);// callback also goes to goto_BM_on_load()
                configColumns(1, textindex, true); // right text.
            } else {
                jbNS.bm_to_goto = "";
                return;
            }
        } else {
            goto_BM_on_load();
        }
    }

    /**
     * function getSelectedText
     * get textcontent of user selection
     * @param event
     */
    function getSelectedText(event) {
        let txt, rng, idoc, doc, ifr = false;
        //find selected text, in an iframe or input/contenteditable element
        txt = "";
        if (event && event.view.name === "greekframe") {
            doc = document.getElementById("greekframe");
            ifr = true;
        } else if (event && event.view.name === "butlerframe") {
            doc = document.getElementById("butlerframe");
            ifr = true;
        } else if (event && event.view.name === "pageframe") {
            doc = document.getElementById("pageframe");
            ifr = true;
        } else if (event && event.view.name === "textframe") {
            doc = document.getElementById("textframe");
            ifr = true;
        } else {
            doc = document;
        }
        idoc = doc || doc.contentDocument || doc.contentWindow.document;
        if (window.getSelection) { //webkit
            if (ifr) {
                txt = $.trim(doc.contentWindow.getSelection().toString());
            } else {
                txt = $.trim(doc.getSelection().toString());
            }
        } else if (document.getSelection) {
            if (ifr) {
                txt = $.trim(doc.contentWindow.getSelection().toString());
            } else {
                txt = $.trim(idoc.getSelection().toString());
            }
        } else if (document.selection) { //IE?
            rng = idoc.selection.createRange();
            txt = $.trim(rng.text);
        }
        return txt;
    }

    //endregion

    //region user input
    /**
     * function gr_bu_MouseDown(event)
     * event-handler for mousedown/touchend on greek and butlertexts
     * measures time until mouseup. if it's a 'hold', send selected text to textinput or notes
     * @param event
     */
    function gr_bu_MouseDown(event) {
        let time1 = event.timeStamp;

        $(event.delegateTarget).one("mouseup touchend", function (ev2) {
            let notes, txt, time2, greek;

            time2 = ev2.timeStamp - time1;

            if (time2 < 500) {
                gr_bu_MouseUp(ev2);
            } else { //'hold'
                //ev2.preventDefault();
                txt = getSelectedText(ev2);
                greek = ev2.view.name === "greekframe";
                if ($(ev2.target).is("a")) {
                    if (greek) {
                        txt = " " + txt;
                    } else {
                        txt = ":" + txt;
                    }
                    txt = jbNS.prefixes[jbNS.columns_config[1] - 1] + txt;
                }

                if (txt !== "") {
                    notes = $("#notes:visible");
                    if (notes.length) {
                        notes.val(notes.val() + txt);
                    } else {
                        if (txt.length < 100) {
                            $("#textinput").val(txt);
                            setSelButtonText();
                        } else {
                            $("#textinput").val("selection too large");
                        }

                    }
                }
            }
        });
    }

    /**
     * function gr_bu_MouseUp
     * clicked or selected in greek or butler text
     * @param event
     */
    function gr_bu_MouseUp(event) {// set in iframeload()
        let n, $t, greek, line, s, notes, bookmark, click_lnr, too_many_bm;

        event.stopImmediatePropagation();
        if (jbNS.touchcancel) {
            jbNS.touchcancel = false;
            return;
        } // if it's a swipe, don't do anything here
        click_lnr = false;
        $t = $(event.target);
        greek = event.view.name === "greekframe";
        if ($t.is("a")) {
            line = $t.text();
            click_lnr = true;
            /* click on linenr */
        } else if ($t.is("p")) { /* or on line itself */
            for (n = 0; n < 5; ++n) { // in Hesiod greek there is an <a> once in 5 <p>
                line = $t.children("a").text();
                if (line) {
                    break;
                }
                $t = $t.prev("p");
                if (!$t) {
                    return;
                } //can't happen here
            }
        } // got lineNR. may not need it, if text selected
        if (!line) {
            return;
        }
        if (greek) {
            bookmark = " " + line;
        } else {
            bookmark = ":" + line;
        }
        bookmark = jbNS.prefixes[jbNS.columns_config[1] - 1] + bookmark;
        s = getSelectedText(event);
        if (s === line) {
            s = bookmark;
        }
        if (s !== "") { // if selected something: copy to notes or textinput
            notes = $("#notes:visible");
            if (notes.length) {
                notes.val(notes.val() + s);
            } else {
                if (s.length < 100) {
                    $("#textinput").val(s);
                    setSelButtonText();
                } else {
                    $("#textinput").val("selection too large");
                }

            }
        } else {
            if (click_lnr) {  // click on linenumber: let the other frame scroll there
                jbNS.bm_to_goto = line;
                if (greek) {
                    butlerGotoBM(line);
                } else {
                    bm_greek_search(line, true, 0);
                }
            } else { //click in text, no selection: set bookmark
                too_many_bm = setUnsetBookMark(bookmark, true, greek);
                if (too_many_bm) {
                    utils.myAlert("Too many bookmarks (max. 1000). BM not set.", false, null);
                }
            }
        }
    }

    /**
     * function isGreekCode
     * in: string with greek chars. return 0: no greek chars, 1:greek, no diacritics, 2:extended unicode
     * @param str : string
     * @returns {number}
     */
    function isGreekCode(str) { //
        let i, code, c;

        code = 0;
        for (i = 0; i < str.length; i += 1) {
            c = str.charCodeAt(i);
            if (c === 0x1FBD) {
                continue;
            } // '
            if (c >= 0x1F00) {
                return 2;
            }
            if (c >= 0x300) {
                if (c === 0x3CA || c === 0x3CB) {
                    return 2;
                }
                code = 1;
            }
        }
        return code;
    }

    /**
     * function clear_search()
     * removes the <b></b> tags from greek text
     * then rebuilds the anchors-array
     */
    function clear_search() {
        let bs, t;

        bs = jbNS.greekframe.contents().find("b:first");
        while (bs.length > 0) {
            t = bs.parent().html();
            while (t.indexOf("<b>") >= 0) {
                t = t.replace("<b>", "");
                t = t.replace("</b>", "");
            }
            bs.parent().html(t);
            bs = jbNS.greekframe.contents().find("b:first");
        }
        jbNS.greekanchors = jbNS.greekframe.contents().find("a");
    }

    /**
     * function textsearch()
     * search for the text or lineID in #textinput, in greek + english
     * it's counted greek if there is at least 1 greek char in it.
     */
    function textsearch() {
        let i, n, len, target, lines, flag, count, bmsel, inp, start, $frame, greekline, betaline, found, pos;

        inp = $("#textinput").val();
        if (inp.length < 1) {
            utils.myAlert("Select what?", false, null);
            return;
        }
        del_all_bm();
        clear_search();

        count = 0;
        flag = isGreekCode(inp);
        $frame = $("#greekframe");
        if (flag === 0) { //search in Butler text. No <b> tagging of found words here, only the bookmarks
            $("#butlerframe").contents().find("p:contains('" + inp + "')").each(function (i, el) {
                let bm;

                bm = $(el).children("a:first").text();
                count += 1;
                if (setUnsetBookMark(bm, false, false)) {
                    utils.myAlert("too many bookmarks! (max. 1000)", false, null);
                    //abort!
                }
            });

        } else {
            lines = $frame.contents().find("p");
            len = lines.length;
            for (i = 0; i < len; i += 1) {
                greekline = lines.eq(i).html();
                start = -1;
                found = 0;
                if (flag < 2) { // searching is done in betacode, without diacriticals
                    betaline = uni2beta(greekline, false);
                    target = uni2beta(inp, false);
                    while ((start = betaline.indexOf(target, start + 1)) >= 0) { //search in betacode
                        pos = start + found * 7;
                        greekline = greekline.substr(0, pos) + "<b>" + // replace in greek unicode
                            greekline.substr(pos, inp.length) + "</b>" +
                            greekline.substr(pos + inp.length);
                        found += 1;
                    }
                } else { // search in Greek unicode
                    while ((start = greekline.indexOf(inp, start + 1)) >= 0) {
                        greekline = greekline.substr(0, start) + "<b>" + inp + "</b>" + greekline.substr(start + inp.length);
                        start += inp.length + 7;
                        found += 1;
                    }
                }
                if (found > 0) {
                    lines.eq(i).html(greekline);
                    jbNS.greekanchors = $frame.contents().find("a");
                    n = i;
                    while (lines.eq(n).children().length === 0) {
                        n -= 1;
                        if (n < 0) {
                            break;
                        }
                    }
                    count += 1;
                    if (setUnsetBookMark(lines.eq(n).children(":first").text(), false, true)) {
                        // 2nd parameter: don't toggle BM, just add
                        utils.myAlert("too many bookmarks! (max. 1000)", false, null);
                        return; //abort!
                    }
                }
            }

        }
        cleanupBookMarx();
        //updateCounter();
        if (!count) {
            utils.myAlert("Nothing found!", false, null);
        } else {
            bmsel = $("#BMselector");
            $("#counter").css({
                "left": bmsel.offset().left + bmsel.width() + 10,
                "top": bmsel.offset().top

            }).show().children(" div:last").text("" + count);
            setTimeout(function () {
                $("#counter").fadeOut(5000);
            }, 1000);
        }
    }

    /**
     * function whatisPutIn
     * decide what is in the #textinput: searchword (greek, extended greek or english) or linenr, for butler or greek text
     * @returns {{txt: number, lnr: boolean, taal: number, code: number, kind: number}}
     */
    function whatisPutIn() {
        let txt, i = 0, s, coding, lang = 3, lnr = false, typ = 0, parseln, $inp;

        $inp = $("#textinput");
        s = $inp.val();
        if (s.indexOf("mailto:") >= 0) {
            typ = 2; // email addr
        }
        parseln = s.match(jbNS.parse_lineID);
        if (parseln && lineID_2_lineNR_obj(parseln[4])) {
            txt = parseln[2];
            if (txt) {
                for (i = 1; i <= 4; i += 1) {
                    if (txt.toLowerCase() === jbNS.prefixes[i - 1].toLowerCase()) {
                        break;
                    }
                }
            } else {
                i = jbNS.columns_config[1];
            }
            lnr = true;
            if (parseln[3] === " ") {
                lang = 1;
            } else if (parseln[3] === ":") {
                lang = 2;
            }
        } else {
            if (!isNaN(parseInt(s, 10))) {
                //utils.myAlert( "ill-formed line number", false, null );
                typ = -1; // -1 = error
            } else {
                coding = isGreekCode(s);
            }
        } //coding: text encoding 0=latin 1=greek 2=extended greek
        if (i > 2 && (parseln[7] || parseInt(parseln[6]) > 1)) {
            typ = -1;
        }
        return {txt: i, lnr: lnr, taal: lang, code: coding, kind: typ};
    }

    /**
     * function setSelButtonText
     * rewrite 'select' menu item
     */
    function setSelButtonText() {
        let what, i, msg = 0, sb, selbutt, m, s;

        s = $("#textinput").val();
        selbutt = $("#selectbtn");
        what = whatisPutIn();
        if (!what || !s) {
            selbutt.find("ul").remove();
            return;
        } else if (what.kind === -1) {
            msg = 1; //"???";
        } else if (what.kind === 2) {
            msg = 7;
        } else {
            if (what.lnr) {
                if (what.taal === 1) {
                    msg = 2; //"goto gr." + Perseus lookups
                } else if (what.taal === 2) {
                    msg = 3; //"goto eng." + Perseus lookups
                } else if (what.taal === 3) {
                    msg = 4; //"goto";
                }
            } else {
                if (what.code) { //which = 1 or 2
                    msg = 5; //"Find gr."; + Word Study lookup
                } else { // which = 0
                    msg = 6; //"Find eng.";
                }
            }
        }
        //rewrite:
        jbNS.selectBtnChoice = msg;
        sb = selbutt.find("ul");
        if (!sb.length) {
            selbutt.append("<ul id='selectlist'></ul>");
            sb = selbutt.find("ul");
        } else {
            sb.children().remove();
        }
        for (i = 0; i < jbNS.selectBtnMessages[msg].length; ++i) {
            m = jbNS.selectBtnMessages[msg][i];
            if (m) {
                sb.append("<li>" + m + "</li>");
            }
        }
        if (msg > 0) {
            sb.show();
        }
        sb.on("mouseleave", function () {
            this.style.display = "none";
        });
    }

    /**
     * function clrinp
     * set #textinput to ""
     */
    function clrinp(event) {

        event.stopImmediatePropagation();
        $("#textinput").val("");
        setSelButtonText();
    }

    /**
     * function enterInput
     * enter a char/string in the chosen input, at cursor pos., if there is a selection, replace it
     * @param str : string // string to be entered (normally 1 char)
     * @param inputbox : object // textinput or notepad
     * @param keep : boolean //false=discard true=keep selection
     */
    function enterInput(str, inputbox, keep) {
        let val, start, selend;

        val = inputbox.value;
        start = inputbox.selectionStart;
        selend = inputbox.selectionEnd;
        inputbox.value = val.slice(0, start) + str + val.slice(selend);
        if (start === selend) {
            inputbox.selectionStart = inputbox.selectionEnd = selend + 1;// Move the caret
        } else {
            if (keep) {
                inputbox.selectionStart = start;
                inputbox.selectionEnd = start + str.length;
            } else {
                inputbox.selectionStart = inputbox.selectionEnd = start + str.length;
            }
        }
        if (inputbox.id === "textinput") {
            setSelButtonText();
        }
    }

    function changeTextCoding(elem, accents) { // only allow input[type=text]/textarea
        /**
         * function changeTextCode
         * switch the text in elem between greek and betacode
         * @param elem : object // textinput or notepad
         * @param accents : boolean // if false, discard breathings etc
         * @returns {string}
         */
        let sel;

        if (elem.id === "notes") {
            sel = elem.value.substring(elem.selectionStart, elem.selectionEnd);
            //sel = getSelectedText( null );
            if (sel === "") { //no selection: replace whole text
                sel = elem.value;
                elem.select();
            }
        } else { //input
            sel = elem.value;
            elem.value = "";
        }
        if (isGreekCode(sel)) {
            sel = uni2beta(sel, accents);
        } else {
            sel = beta2uni(sel);
        }
        return sel;
    }

    /**
     * function keyboardInput
     * event handler: keyboard input to #textinput or notepad
     * @param event : object // keypress
     * @returns {boolean} // for propagation of event
     */
    function keyboardInput(event) {
        // focus must be on the "#textinput" input or "#notes" textarea element
        let code, sel;

        code = event.keyCode || event.charCode;
        if (code < 48) {
            return true;
        }
        sel = String.fromCharCode(code);
        enterInput(sel, event.target, false);
        return false;
    }

    /**
     * function betaclick
     * change textarea text into extended greek or vv.
     * if nothing selected, the whole text. If mousebtn hold or shift-key: discard diacritics
     * @param event : object // (click)
     */
    function betaclick(event) {
        let time1 = event.timeStamp;

        event.stopImmediatePropagation();
        $(event.currentTarget).one("mouseup", function (ev2) {
            let time2, inp, keepdia;

            event.stopImmediatePropagation();
            time2 = ev2.timeStamp - time1;
            keepdia = !(time2 > 500 || event.shiftKey); //click or hold
            inp = $(event.target).parent().siblings(".input")[0];
            //document.getElementById( "notes" );
            enterInput(changeTextCoding(inp, keepdia), inp, true);
        });
    }

    /**
     * function executeBtnChoice
     * execute selectbutton entry
     * @param event
     */
    function executeBtnChoice(event) {
        let trg, index, s, $lst;

        //event.stopImmediatePropagation();
        $lst = $("#selectlist");
        trg = $(event.target);
        if (trg[0].id === "select") {
            $lst.toggle(); //$lst.display === "none");
            return;
        }
        index = trg.parent().children("li").index(trg);
        s = $.trim($("#textinput").val());
        if (index === 1) {
            return;
        }

        switch (jbNS.selectBtnChoice) {
            case 0: // empty
                break;
            case 1: // error (not used)
                break;
            case 2: // goto greek
            case 3: // goto butler
                if (index === 0) {
                    showAndGotoAnyLine(s, true);
                } else if (index === 2) {
                    perseusLookup(0);
                } else if (index === 3) {
                    perseusLookup(1);
                }
                break;
            case 4: // goto both
                showAndGotoAnyLine(s, true);
                break;
            case 5: // search greek
            case 6:
                jbNS.selectBtnActions[1][index]();
                break;
            case 7: //set email addr
                setMailAdr();
                break;
            default:
                break;
        }
    }

    //endregion

    //region blob & filereader

    /**
     * function saveTextAsFile
     * save string (notepad contents) to a file going to the download directory (blob)
     * @param textToWrite ; string
     */
    function saveTextAsFile(textToWrite) {
        let textFileAsBlob, fileNameToSaveAs, downloadLink;

        textFileAsBlob = new Blob([textToWrite], {type: 'text/html'});
        fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;

        if (!window.navigator.msSaveOrOpenBlob) {
            downloadLink = document.createElement("a");
            downloadLink.download = fileNameToSaveAs;
            downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
            downloadLink.onclick = destroyClickedElement;
            downloadLink.style.display = "none";
            document.body.appendChild(downloadLink);
            //}
        } else { // IE 10+
            window.navigator.msSaveOrOpenBlob(textFileAsBlob, fileNameToSaveAs);
        }

        downloadLink.click();
    }

    function saveBlob() {
        saveTextAsFile(document.getElementById("notes").value);
    }

    function destroyClickedElement(event) {
        document.body.removeChild(event.target);
    }

    /**
     * function loadFileAsText
     * create filereader to upload a text and store it in notepad
     */
    function loadFileAsText() {
        let fileToLoad, fileReader;

        fileToLoad = document.getElementById("fileToLoad").files[0];
        fileReader = new FileReader();
        fileReader.onload = function (fileLoadedEvent) {
            document.getElementById("notes").value = fileLoadedEvent.target.result;
        };
        fileReader.readAsText(fileToLoad, "UTF-8");
    }

    //endregion

    //region notepad

    /**
     * function showNotes
     * show notepad
     * @param event
     */
    function showNotes(event) {
        event.stopImmediatePropagation();
        //$(".btn1 ul").removeClass("menuActive");
        $("#notediv, #notes").hide();
        $("#notediv").show(300, "swing", function () {
            $("#notes").slideDown(300, "swing");
        });
        $("body").off("keyup");
    }

    function setMailAdr() {
        let $txt = $("#textinput");
        localStorage.setItem("mailadr", $txt.val().substr(7));
        $txt.val("");
    }

    function getMailAdr() {
        let s = localStorage.getItem("mailadr");
        if (s === "evernote") {
            s = "jeroen1952.2a0d762@m.evernote.com";
        }
        return s;
    }

    /**
     * function saveNotes
     * save notepad contents to localstorage
     */
    function saveNotes() {
        let $n = $("#notes");
        localStorage.setItem("Notes", $n.val());
        localStorage.setItem("NotesHeight", $n.height());
        localStorage.setItem("NotesWidth", $n.width());

    }

    /**
     * function loadNotes
     * load notepad contents from localstorage
     */
    function loadNotes() {
        let $n = $("#notes");
        $n.val(localStorage.getItem("Notes") || "");
        $n.height(localStorage.getItem("NotesHeight")); // not yet? because of Chrome bug
        $n.width(localStorage.getItem("NotesWidth"));
    }

    /**
     * function gotoclick
     * (load and) scroll to prefixed bookmark (in notes)
     */
    function gotoclick() {
        let inp, str;

        inp = document.getElementById("notes");
        str = inp.value.substring(inp.selectionStart, inp.selectionEnd);
        if (str) {
            showAndGotoAnyLine(str, true);
        }
        inp.selectionStart = inp.selectionEnd;
    }

    //endregion

    //region menu items

    /**
     * function showAlfabet
     * show / hide alfabet popup
     * @param doit : boolean //true = show
     */
    function showAlfabet(doit) {
        if (doit) {
            $("#alfabetdiv").show("slow", "swing");
        } else {
            $("#alfabetdiv").hide("slow", "swing");
        }
    }

    /**
     * function showAllLines
     * unhide lines hidden by showSelOnly()
     */
    function showAllLines() {
        let i, len, headers;

        headers = $("#greekframe").contents().find("h4");
        len = headers.length;
        for (i = 0; i < len; i += 1) {
            headers[i].style.display = "";
        }
        len = jbNS.greekanchors.length;
        for (i = 0; i < len; i += 1) {
            jbNS.greekanchors[i].parentNode.style.display = "";
        }
    }

    /**
     * function showSelOnly
     * Hide all greek lines that are not bookmarked (Il, Od only)
     */
    function showSelOnly() {
        let i, len, p, headers;

        len = jbNS.greekanchors.length;
        for (i = 0; i < len; i += 1) {
            p = jbNS.greekanchors[i];
            if (p.className !== "bmcolor") {
                p.parentNode.style.display = "none";
            }
        }
        headers = $("#greekframe").contents().find("h4");
        len = headers.length;
        for (i = 0; i < len; i += 1) {
            headers[i].style.display = "none";
        }
    }

    /**
     * function toggleSelOnly
     * toggle showSelOnly() - showAllLines + menu-entry
     * @param event
     */
    function toggleSelOnly(event) {
        let a;

        event.stopImmediatePropagation();
        //$(".btn1 ul").removeClass("menuActive");
        if (jbNS.columns_config[1] > 2) {
            utils.myAlert("sorry, Iliad or Odyssey only", false, null);
            return;
        }
        a = $("#selonly");
        if (jbNS.showonlyselection) {
            a.text("Show only selection");
            jbNS.showonlyselection = false;
            showAllLines();
        } else {
            a.text("Show all lines");
            jbNS.showonlyselection = true;
            showSelOnly();
        }
    }

    //endregion

    //region Tree manip

    /**
     * function getindex
     * find index of li-element in tree
     * @param el : object
     * @returns {number} : element index, 0 if not found
     */
    function getindex(el) {
        let i;

        for (i = 0; i < jbNS.LI_elements.length; i += 1) {
            if (jbNS.LI_elements[i] === el) {
                return i;
            }
        }
        return (0); //for scrolling to top even if not found
    }

    /**
     * function scrolltree
     * scroll tree to given element index
     * @param el_index : number
     */
    function scrolltree(el_index) {
        if (jbNS.LI_elements.length) {
            jbNS.LI_elements[el_index].scrollIntoView();
        }
    }

    /**
     * function handleRemClick
     * show the "rem' data-attribute text or hide it and save the text back to the DOM
     * @param {*} $element - the clicked html element: either .hasrem or .norem
     */
    function handleRemClick($element) {
        let $parent, txtrem, newtext;
        $parent = $element.parent();
        if ($parent.has(".remtxt").length) { // if it's showing: hide it
            txtrem = $parent.find(".remtxt:first");
            txtrem.slideToggle(350, function () {
                $(this).remove();
            });
        } else { // show it by creating a temporary <div> element with the text
            $element.nextAll("span:last")
                .after("<div class='remtxt'>" + $element.closest("li").data("rem") || "" + "</div>");
            $parent.find(".remtxt:first").slideToggle(350);
        }

    }


    /**
     * function tree_handleMouseEvents
     * event handler: click on treeframe
     * @param event
     */
    function tree_handleMouseEvents(event) { //single click or mouseenter
        let $trg, $prev, $ol, s, ids, bg, lvl, hovering, found, anchor;

        hovering = event.type !== "click";
        $trg = $(event.target);

        if (hovering) {
            ids = element2lineIDs($trg);
            bg = ids.beginning;
            lvl = $trg.parent().parent().data("level") + 1;
            anchor = lvl + ":" + bg;
            found = gotoAnchor(anchor, hovering); // if hover, don't go, just return true if anchor found
            if (found) {
                $trg.css("background-color", "lightblue");
            }

        } else if ($trg.is("span")) {
            $prev = $trg.prev("span");
            if ($prev && $prev.hasClass("ln")) { /*click on text part*/
                if (hovering) {
                    return;
                }
                s = $prev.text();
                const ix = jbNS.columns_config[1] - 1;
                if (ix < 2) {
                    showAndGotoAnyLine(`${jbNS.prefixes[ix]} ${s}`, false);
                }
            } else if (!hovering && $trg.is(".plm")) { /*click on + or - */

                $ol = $trg.closest("li").eq(0).children("ol").eq(0);
                $ol.slideToggle(400); //this = LI element
                $ol.promise().done(function () {
//                        setplusminus();
                    utils.setnodeattributes("list");
                    $("html").getNiceScroll().resize();
                });
            }
        } else if ($trg.is("div.hasrem")) {
            handleRemClick($trg);
        }
    }

    /**
     * function lineIDmousedown
     * timed mousedown event on lineID: click or hold (>500 ms)
     * click: scroll textframe to anchor
     * hold: set & remember scrolling top of tree
     * @param event
     */
    function lineIDmousedown(event) {
        let time1 = event.timeStamp,
            $trg = $(event.target);

        $(event.currentTarget).one("mouseup", function (ev2) {
            let ids, bg, lvl, anchor, found, ix,
                time2 = ev2.timeStamp - time1;

            if (time2 < 500) { //'click'
                ids = element2lineIDs($trg);
                bg = ids.beginning;
                lvl = $trg.parent().parent().data("level") + 1;
                anchor = lvl + ":" + bg;
                found = gotoAnchor(anchor, true); // check if target exists
                if (found) {
                    $trg.css("background-color", "lightblue");
                    loadAndGotoTextframeAnchor(anchor);
                }
            } else { // 'hold'
                if (!$trg.hasClass("ln")) {
                    return;
                }
                ix = getindex($trg[0].parentNode);
                if (jbNS.treetop_el_index === ix) {
                    ix = 0;
                }
                jbNS.treetop_el_index = ix;
                scrolltree(ix);
                localStorage.setItem("treetop", String(ix));
            }
        });
    }

    /**
     * function tree_handleKey
     * event handler: handle keypress when focus on treeframe. for now only '0'-'8'
     * @param event
     */
    function tree_handleKey(event) {
        let key, trg;

        trg = event.target;
        if ($(trg).is("input")) {
            return;
        }
        key = event.keyCode || event.charCode;
        event.stopImmediatePropagation();

        key -= 48;
        if (key >= 0 && key <= 8) {
            utils.expand("list", key, false);
        }
    }

    /**
     * function element2lineIDs
     * given a .ln-class element, search the beginning & end linenumbers
     * of its section. (end = beginning of next section)
     * @param $el : html element
     * @returns object : {beginning, end}
     */
    function element2lineIDs($el) {
        let $parent, bg, nd;

        bg = $el.text();
        $parent = $el.parent("li");
        //search closest parent which has a next sibling:
        while ($parent.next('li').length === 0) {
            $parent = $parent.parents('li').eq(0);
            if ($parent.length === 0) { // no such parent
                break;
            }
        }
        if ($parent.length === 0) {
            nd = "24.805"; // final li element
        } else {
            nd = $parent.next("li").children(".ln").text(); // only 1 .ln child
        }
        return {beginning: bg, last: nd};
    }

    //endregion

    //region load content

    function get_page_from_menu(ix) {
        let txt;

        if (ix < jbNS.pages_local.length) {
            txt = jbNS.pages_local[ix][0];
        } else {
            txt = jbNS.pages_extern[ix - jbNS.pages_local.length][0];
        }
        if (jbNS.pageframe[0].src !== txt) {
            jbNS.pageframe[0].src = txt;
        }
    }

    function getNewIframeFile(url, targetframe) {
        let getnew = true;
        let cache$ = 'no-cache';

        site100oxen.currentPage = url;

        $.ajax({
            type: "HEAD",
            async: true,
            cache: false,
            datatype: "text",
            url: url,
        }).done(function (message, textStatus, jqXHR) {
            const resp = jqXHR.getAllResponseHeaders();
            const etag = resp.match(/etag: \"(.*)\"/i);
            const here = localStorage.getItem(url);
            if (here && here === etag[1]) {
                getnew = false;
                cache$ = 'max-age=1000';
            }
            if (getnew && etag) {
                localStorage.setItem(url, etag[1]);
            }
            $.ajax({
                type: "GET",
                // headers: {
                //     'Cache-Control': cache$
                // },
                async: true,
                cache: true,
                url: url,
                dataType: 'html',
            }).done(function (data, textStatus, jqXHR) {
                let iframe = document.getElementById(targetframe);
                iframe.srcdoc = data;
                console.log(url + " from cache: " + !getnew + "," + etag);
            });
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
                myAlert(errorThrown);
            });
    }

    /**
     * loadIframeToPage
     * event handler: load external html into pageframe.
     * @param event
     */
    function loadIframeToPage(event) {
        let ix;
        ix = $("#filesmenu li").index($(event.target).parent());
        event.stopImmediatePropagation();
        get_page_from_menu(ix);
        hidemenuitems();
        //let [c1, c2, c3, c4] = jbNS.columns_config;
        configColumns(0, 2, true);
    }

    /**
     * function iFrameLoad
     * deferred load an iframe (greek/butler) and return a promise (so a callback can be called after loading )
     * @param id : string // #id of iframe
     * @param src : string //url
     * @returns {*}
     */
    /**
     * function fetchTexts
     * fetch greek/butler texts acc. to columns_config
     * @param filenr : number // index to filenames array
     */
    function fetchTexts(filenr) {
        let dfd = $.Deferred();
        let done = false;

        function iFrameLoad(id, src) {
            function iFrameLoad1(id, src) {
                let deferred = $.Deferred(),
                    iframe = document.getElementById(id);
                iframe.src = src;
                $(iframe).load(deferred.resolve);

                deferred.done(function () { //what to do after the individual frame has been loaded
                    let $frame, isgreek;
                    if (id === "greekframe") {
                        $frame = $("#greekframe");
                        isgreek = true;
                        $("#selonly").text("Show only selection");
                        jbNS.greekanchors = $frame.contents().find("a"); //collect anchors (linenumbers)
                        putbackBookmarks(isgreek); // false = butler, true = greek
                        if (jbNS.gr_beginLine > 0) {
                            scrollgreek();
                        }
                    } else {
                        $frame = $("#butlerframe");
                        isgreek = false;
                        jbNS.butleranchors = $frame.contents().find("a");
                        putbackBookmarks(isgreek); // false = butler, true = greek
                    }
                    $frame.contents().find("body").on({
                        //"touchhold": gr_bu_hold,
                        "mousedown": gr_bu_MouseDown,
                        "touchmove": function () {
                            jbNS.touchcancel = true;
                        }
                    });
                    if (!done) {
                        done = true;
                    } else {
                        dfd.resolve();
                    }
                });
                return deferred.promise();
            }

            return $.ajax({
                type: "HEAD",
                async: true,
                cache: false,
                datatype: "text",
                url: src,
            }).done(function (message, textStatus, jqXHR) {
                const resp = jqXHR.getAllResponseHeaders();
                const etag = resp.match(/etag: \"(.*)\"/i);
                const here = localStorage.getItem(src);
                let getnew = true;
                if (here && here === etag[1]) {
                    getnew = false;
                }
                if (getnew && etag) {
                    localStorage.setItem(src, etag[1]);
                }
                if (getnew) {
                    src += `?_=${(new Date()).getTime()}`
                }
                iFrameLoad1(id, src);
            });
        }

        iFrameLoad("greekframe", jbNS.filenames[1][filenr]);
        iFrameLoad("butlerframe", jbNS.filenames[2][filenr]);
        dfd.done(function () { //what to do after both frames have been loaded:
            setColumns();
            if (window.site100oxen.untouchable) {
                createSplitter();
            }
            adjustColWidth();
            goto_BM_on_load();
        });
    }

    //endregion

    //region column manip

    /**
     * function mousedowncolresize
     * mousedown event handler: column resize with mouse-drag (not on tablets)
     * @param event : object
     */
    function mousedowncolresize(event) {
        let $resizer = $(event.delegateTarget),
            $selected = $resizer.prev(".viewport"),
            delta_X,
            delta_W,
            $viscols = $selected.nextAll('.viewport:visible'),
            viscolnum = $viscols.length,
            prevX = event.pageX, // initial x pos
            $tmp,
            $coverdiv = $("#coverall");
        // create invisible cover for dragging resizer over iframes:
        utils.cover(8, 0); //brings #coverall forward

        // clone resizer div  and detach it to make resizing visible
        $tmp = $resizer.clone().css({
            "position": "absolute",
            "top": "6rem", //not necessary
            "background": "rgba( 240, 240, 240, 0.2 )",
            "z-index": 10,
            "height": $resizer.height(),
            "float": "none"
        }).appendTo($coverdiv);
        $(document).one("mouseup", function (e) { //evt handler disappears after use
            $tmp.remove();
            utils.cover(-8, 0.3);
            $("#coverall").off("mousemove");
            //calc. position, width change
            delta_X = e.pageX - prevX;
            delta_W = Math.round(delta_X / viscolnum);
            $selected.css("width", "+=" + delta_X);
            $viscols.each(function (i) {
                $(this).css({
                    //the first one takes all the x-move, the next columns' moves are diminished by the width-change
                    "left": "+=" + (delta_X - i * delta_W),
                    "width": "-=" + delta_W
                });
            });
            scrollgreek();
        });
        $coverdiv.on("mousemove", function (e) {
            $tmp.css("left", e.pageX);
        });

        event.preventDefault(); // disable mouse-selection
    }

    /**
     * function adjustColWidth
     * tweak the width of the rightmost viewport-column so it fits in window
     */
    function adjustColWidth() {
        let w, sum_w = 0;

        $(".viewport:visible, .resizer:visible").each(function () {
            sum_w += $(this).outerWidth(true);
        });
        sum_w += 8; //error margin (rounding?) was 4
        w = $("#colwrap").width() - sum_w;
        $(".viewport:visible:last").css("width", "+=" + w);
    }

    /**
     * function createSplitter
     * create div where the cursor shows 'splitter' shape & columns can be resized
     * rightmost column doesn't get a splitter
     */
    function createSplitter() {
        $(".resizer").remove();
        $(".viewport:visible").not(":last").after("<div class='resizer'></div>");
        $(".resizer").each(
            function () {
                $(this).css({
                    "z-index": 10,
                    float: "left"
                });
            }).on("mousedown", mousedowncolresize);
        adjustColWidth();
    }

    /**
     * function setColumns
     * set default visible column widths and show/hide them acc. to jbNS.columns_config
     */
    function setColumns() {
        let colwidth,
            col_ix = 0,
            w,
            scr = $(window).width(),
            col1, col2, col4,
            which,
            colnum = 0,
            doresize,
            left2, left4;

        col2 = jbNS.columns_config[1]; //text choice: homer, hesiod
        which = jbNS.columns_config[2]; //greek and/or translation (butler)
        /* count visible frames. tree/pageframe has double width */
        //pageframe - treeframe:
        colnum += jbNS.columns_config[0] ? 1 : 0;
        //if greek:
        colnum += col2 && (which & 1 ? 1 : 0);
        //if transl.:
        colnum += col2 && (which & 2 ? 1 : 0);
        //textframe - other:
        colnum += jbNS.columns_config[3] ? 1 : 0;

        if (colnum === jbNS.oldcolnum) {
            doresize = false; //no resize after column switch if nr. of columns remains the same
            $(".viewport:visible").each(function (i) {
                jbNS.width[i] = $(this).width(); //store widths
            });
        } else { //otherwise: resize to default widths
            doresize = true;
        }
        jbNS.oldcolnum = colnum;
        //pageframe - treeframe
        col1 = jbNS.columns_config[0]; // list or page or none
        jbNS.treeframe.hide();
        jbNS.pageframe.hide();
        if (col1 && colnum > 2) {
            colwidth = (scr / (colnum + 1)) - 8; //8 for resizer
        } else {
            colwidth = (scr / colnum) - 8;
        }
        if (doresize) {
            if (colnum > 2) {
                w = 2 * colwidth;
            } else {
                w = colwidth;
            }
        } else {
            w = jbNS.width[col_ix];
        }
        if (col1 === 1) {
            jbNS.treeframe.show().width(w);
            col_ix++;
        } else if (col1 === 2) {
            jbNS.pageframe.show().width(w);
            col_ix++;
        }
        //greekframe - butlerframe
        jbNS.greekframe.hide();
        jbNS.butlerframe.hide();
        left2 = col1 ? colwidth + 8 : 0;
        if (col2 && which) {
            //left3 = left2 + ((which & 1) ? colwidth + 8 : 0);
            w = doresize ? colwidth : jbNS.width[col_ix];
            if (which & 1) {
                //if(doresize) jbNS.greekframe.css("left", left2);
                jbNS.greekframe.show().width(w);
                col_ix++;
            }
            w = doresize ? colwidth : jbNS.width[col_ix];
            if (which & 2) {
                //if(doresize) jbNS.butlerframe.css("left", left3);
                jbNS.butlerframe.show().width(w);
                col_ix++;
            }
        }
        // textframe
        left4 = left2 + (col2 && (((which & 1) ? colwidth + 8 : 0) + ((which & 2) ? colwidth + 8 : 0)));
        col4 = jbNS.columns_config[3];
        jbNS.textframe.hide();

        w = doresize ? colwidth : jbNS.width[col_ix];
        if (col4) {
            if (doresize) {
                jbNS.textframe.css("left", left4);
            }
            jbNS.textframe.width(w).show();
        }
    }

    /**
     * function resizeLeftColumn
     * for tablets: resize left column (swipe in header) and adapt the others
     * @param amount : number //pixels, + or -
     */
    function resizeLeftColumn(amount) {
        let n, colnum, deltaX, columns;

        colnum = jbNS.oldcolnum;
        if (colnum < 1) {
            return;
        }
        columns = $(".viewport:visible");
        jbNS.width[0] = $(columns[0]).width() + amount;
        deltaX = amount / (colnum - 1);
        for (n = 1; n < colnum; n += 1) {
            jbNS.width[n] = $(columns[n]).width() - deltaX;
        }
        for (n = 0; n < colnum; n += 1) {
            columns[n].left += n * deltaX;
            $(columns[n]).width(jbNS.width[n]);
        }
        scrollgreek();
    }

    function growLeftColumn() {
        resizeLeftColumn(jbNS.colResizeStep);
        return true;
    }

    function shrinkLeftColumn() {
        resizeLeftColumn(-jbNS.colResizeStep);
        return true;
    }

    /**
     * function switchColMousedown
     * event handler: mousedown on top-of-screen 'pop-down' menu.  on 'pages' > 1/2 sec. : show popup menu
     * @param event
     */
    function switchColMousedown(event) {

        event.preventDefault();
        event.stopImmediatePropagation();

        $("#switchColumns").one("mouseup touchend", function (e) { //handler deleted after execution
            let $trg, $par, colnr, ix, time2, t;

            $trg = $(e.target);
            e.preventDefault();
            e.stopImmediatePropagation();
            if ($trg.is("nav") || $trg.is("ul")) {
                swcol_up();
                return;
            }
            $par = $trg.parents("li");
            ix = $trg.index(); // content button index 0-1, but 0-3 if colnr == 1
            colnr = $par.index(); // column index: 0=list/page, 1=Il,Od,Theo,WD 2=gr/transl 3=expl/? NOTE:colnr - 1 if left & right btns
            // button clicked: show/hide/switch pages or texts
            if (colnr > 0) {// button clicked: show/hide/switch pages or texts
                configColumns(colnr, ix + 1, false); //-1
                if (colnr === 1) {
                    jbNS.gr_beginLine = 0;
                    if (ix < 2) {
                        getXML(jbNS.xml_names[ix]).done(() => {
                            init_tree();
                        });
                    }
                    fetchTexts(ix); // fetch greek & butler texts
                }
                if (colnr === 2) {
                    goto_BM_on_load();
                } else {
                    jbNS.bm_to_goto = "";
                }
                if (colnr === 3) {
                    jbNS.textframe[0].src = jbNS.filenames[3][ix];
                }
            } else { // pages in/out
                if (jbNS.columns_config[0] === 2 && ix === 1) {
                    if (site100oxen.currentPage !== 'sitemap.php') {
                        $("#pageframe")[0].src = 'sitemap.php';
                        site100oxen.currentPage = 'sitemap.php';
                    } else {
                        configColumns(0, 2, false);
                    }
                } else {
                    configColumns(colnr, ix + 1, false);
                }
            }
        });
    }

    /**
     * function swcol_up, swcol_down
     * jquery css animations for switchcol header
     */
    function swcol_up() {
        $("#switchColumns, #bm_nav").each(function () {
            let $that = $(this);
            $that.stop().animate({
                "height": "0.6rem",
                "font-size": "0.1rem",
                "opacity": 0
            }, 400, "swing", function () {
                $that.hide();
            });
        });
    }

    function swcol_down(event) { // for click and mouseenter
        let trg;

        //event.stopImmediatePropagation();
        $(event.target).show();
        if (event.target.id === "columns") {
            trg = "#switchColumns";
        } else {
            trg = "#bm_nav";
        }
        $(trg).stop().show().animate({
            "height": "6rem",
            "font-size": "1rem",
            "opacity": 1
        }, 400, "swing");
    }

    /**
     * function configColumns
     * implement column-switching logic
     * configure column[ colnr ] and set buttons accordingly (if set == true). Then set column width, font, scrollbar etc.
     * @param colnr : number // column index (0-3)
     * @param ix : number // index of buttons. if undefined (absent), set everything acc. to columns_config
     * @param notoggle : boolean // if true: set, don't toggle default = false
     */
    function configColumns(colnr, ix, notoggle) //colnr, index of buttons, notoggle=true: set, don't toggle
    {	// NB: index has 1 added so [0] can be 'none'
        let language_choice = 0, $allbuttons;

        jbNS.dontSetColumns = false;

        $allbuttons = $(".switch").eq(colnr).find("li");
        //notoggle = (typeof notoggle !== "undefined");

        if (typeof ix === "undefined") {
            ix = jbNS.columns_config[colnr];
            notoggle = true;
            jbNS.dontSetColumns = true;
        }
        if (colnr === 2) { //language choice
            language_choice = 1; // raise index by one, because of "⇔" button
            if (notoggle) {
                jbNS.columns_config[colnr] = ix;
            }//language buttons can both be set (greek = bit0, engl. = bit1)
            else {
                if (ix > 1) {
                    ix = (ix === 2 ? 3 : 2);
                }//make the middle button count as 3 (bit0 + bit1) so it performs a 'switch'
                jbNS.columns_config[colnr] ^= ix;
            }
        } else {						// the other btns: not both
            if (notoggle) {
                jbNS.columns_config[colnr] = ix;
            } else {
                jbNS.columns_config[colnr] = (jbNS.columns_config[colnr] === ix ? 0 : ix);
            }
        }
        $allbuttons.removeClass("switchselect");
        if (colnr === 1) { //text select
            if (jbNS.columns_config[1]) {
                $allbuttons.eq(ix - 1).addClass("switchselect");
                //fetchTexts( ix - 1 );
                return; // because text in iframe is fetchText()-ed and setcolumns() etc is done by deferred callback
            }
        } else {// textframe
            if (jbNS.columns_config[colnr] & 1) {
                $allbuttons.eq(0).addClass("switchselect");
            }
            if (jbNS.columns_config[colnr] & 2) {
                $allbuttons.eq(1 + language_choice).addClass("switchselect");
            }
        }
        if (jbNS.dontSetColumns) {
            return;
        }
        setColumns(); //width, display
        if (window.site100oxen.untouchable) {
            createSplitter();
        }
        if (colnr === 0 && ix === 0) {
            scrolltree(jbNS.treetop_el_index);
        }
    }

    //endregion

    //region zoom functions

    /**
     * function setHeaderContents
     * calc window width divided by fontsize, set header contents accordingly during resize / zoom
     * @param size : number //fontsize in pixels
     */
    function setHeaderContents(size) {
        let m1, relwidth;

        relwidth = window.innerWidth / size;
        m1 = $("#menu1");
        $(".lrpic, #hdpic1, #hdpic2").hide();
        m1.css("width", "95%");
        if (relwidth > 50) {
            $(".lrpic").show();
            m1.css("width", "75%");
        }
        if (relwidth > 60) {
            $("#hdpic2").show();
            m1.css("width", "60%");
        }
        if (relwidth > 80) {
            $("#hdpic1").show();
            m1.css("width", "50%");
        }
    }

    /**
     * function calcFontsizeDiff
     * calc the fontsize relative to the window size (1920px ~ 14pt)
     * @returns {number} fontsize difference in pt
     */
    function calcFontsizeDiff() {
        let winwidth, zoomX, res;

        winwidth = window.innerWidth;
        zoomX = (winwidth / jbNS.norm_window_width) * 100;
        res = 0.7 * (0.5 + (10 - (zoomX + 5) / 10));
        return (res); // < 0 if font larger
    }

    /**
     * function setIframeFont
     * try to set font size of iframe
     */
    function setIframeFont(size) {
        $(".viewport:visible").each(function () { //hier
            try {
                $(this).contents().find("html").css("font-size", size + "px");
            } catch (ignore) {
            }
        });
    }

    /**
     * function setfont
     * set basic fontsize of <html> and global let (and iframes)
     * @param size : number // in pix
     */
    function setfont(size) {
        setHeaderContents(size);
        $("html").css("font-size", size + "px");
        $("#setfontsize")[0].value = Math.round(size);
        setIframeFont(size);
        scrollgreek();
    }

    /**
     * function zoominout
     * zoom whole page relative to window size
     */
    function zoominout() {
        let size, diff;

        size = jbNS.basic_fontsize;
        diff = jbNS.keepFontsize ? 0 : calcFontsizeDiff();
        setfont(size - diff);
    }

    //endregion

    //region initialize

    /**
     * function hidemenuitems
     * hide sliding menu
     */
    function hidemenuitems() {
        let $fm = $("#filesmenu");
        $fm.animate({
            "left": "-" + $fm.width(),
            "opacity": "0"
        }, 800);
        utils.cover(-8, 0.3);
        jbNS.pages_menu_expanded = false;
        //$("#switchColumns").on("mousedown touchstart", switchColMousedown);
        $(".menuitems").css("background-color", "");
    }

    /**
     * function storeExpansionstate
     * save expansion state of treeframe by creating a string of '0' and '1'
     * 0 for an OL element that is collapsed, 1 for an expanded one. Save string to localstorage.
     */
    function storeExpansionstate() {
        let t;
        jbNS.exp_state = "";
        for (t = 0; t < jbNS.OL_level.length; t += 1) {
            if (jbNS.OL_level[t].style.display === "none") {
                jbNS.exp_state += "0";
            } else {
                jbNS.exp_state += "1";
            }
        }
        localStorage.setItem("exp_state", jbNS.exp_state);
        localStorage.setItem("exp_level", jbNS.currentLevel);
    }

    /**
     * function setExpansionstate
     * read expansion state of treeframe by loading string from localstorage
     * 0 : collapse OL element, 1 : expand it.
     */
    function setExpansionstate() { // jbNS.OL_level[] must be created already
        let t;

        jbNS.exp_state = localStorage.getItem("exp_state") || "11";
        for (t = 0; t < jbNS.OL_level.length; t += 1) {
            if (t < jbNS.exp_state.length && jbNS.exp_state[t] === "1") {
                jbNS.OL_level[t].style.display = "";
            } else {
                jbNS.OL_level[t].style.display = "none";
            }
        }
    }

    function doReset() {
        window.site100oxen.forcereload = true;
        localStorage.clear();
        setTimeout(function () {
            window.location.reload(true);
        }, 0);
        //can't do anything after this! or the reload is aborted
        //also: doesn't work on ipad
    }

    /**
     * function savePageState
     * save column config, bookmarks, scroll state, tree config to localStorage
     */
    function savePageState() {
        let s;
        if (window.site100oxen.forcereload) {
            return;
        }
        //1: save column config
        if(jbNS.columns_config[1] === 0){
            jbNS.columns_config[1] = 1;
        }
        s = jbNS.columns_config.toString();
        localStorage.setItem("colconf", s);
        // 2: save bookmarks
        s = jbNS.bookMarx.toString();
        localStorage.setItem("bookmarks", s);
        // 3: save list expansion state
        storeExpansionstate();
        // 4: save notes
        saveNotes();
        // 5: fontsize localStorage set locally
        localStorage.setItem("keepfontsize", jbNS.keepFontsize ? "1" : "0");
        localStorage.setItem("fontsize", jbNS.basic_fontsize);
        //6: save current page in left iframe
        localStorage.setItem("currentpage", site100oxen.currentPage);
    }

    function read_in_Bookmarx(s) {
        let arr, i, m, n, bm, nw;

        jbNS.greekanchors = jbNS.greekframe.contents().find("a");
        arr = s.split(",");
        m = 0;
        n = -1;
        for (i = 0; i < arr.length; i += 1) {
            bm = arr[i];
            nw = false;
            if (bm.substr(0, 1) === "!") {
                continue;
            }
            if (bm.substr(0, 1) === "-") {
                m = 0;
                n += 1;
                nw = true;
            }
            if (!nw) {
                setUnsetBookMark(bm, false, (n === 0 || n === 2));
            }
            m += 1;
        }
        cleanupBookMarx();
    }

    /**
     * function loadPageState
     * load column config, bookmarks, scroll state, tree config from localStorage
     */
    function loadPageState() {
        let s, arr, i, tf, fs = 16;

        s = localStorage.getItem("colconf") || "1,1,3,0";
        //s = "0,0,1,2";
        arr = s.split(",");
        for (i = 0; i < 4; ++i) {
            jbNS.columns_config[i] = parseInt(arr[i]);
        }
        fetchTexts(jbNS.columns_config[1] - 1);
        tf = jbNS.columns_config[3];
        if (tf) {
            jbNS.textframe[0].src = jbNS.filenames[3][tf - 1];
        }
        for (i = 0; i < 4; ++i) {
            //configColumns( i, undefined, undefined ); //, jbNS.columns_config[i], true); <-- this is wrong!
            configColumns(i); //, jbNS.columns_config[i], true); <-- this is wrong!
        }

        s = localStorage.getItem("bookmarks") || "---Il:--,---Od:--,---Th:--,---WD:--";
        read_in_Bookmarx(s);

        jbNS.treetop_el_index = parseInt(localStorage.getItem("treetop")) || 0;
        jbNS.currentLevel = parseInt(localStorage.getItem("exp_level")) || 1;

        jbNS.keepFontsize = localStorage.getItem("keepfontsize") === "1";
        jbNS.basic_fontsize = fs; //can be set different
        if (window.location.href !== parent.location.href) { //?
            jbNS.keepFontsize = false;
        }
        if (jbNS.keepFontsize) {
            jbNS.basic_fontsize = parseInt(localStorage.getItem("fontsize")) || fs;
        }
        $("#keepfs")[0].checked = !jbNS.keepFontsize; //"auto"
        setHeaderContents(jbNS.basic_fontsize);
        loadNotes();

        s = localStorage.getItem("splash") || "";
        if (s !== "hide") {
            $("#splash").show();
        } else {
            $("#splash").hide();
        }
        if (localStorage.getItem("messages") === $("#messages span").text()
            && localStorage.getItem("showmsg") === "false") {
            $("#messages").hide();
        } else {
            localStorage.setItem("showmsg", "true");
            $("#messages").show();
        }
        setSelButtonText();
        site100oxen.currentPage = localStorage.getItem("currentpage") || "sitemap.php";
        $("#pageframe")[0].src = site100oxen.currentPage;
        zoominout();
    }

    function init_tree() {
        utils.createTreeFromXML(site100oxen.XML.firstChild, 'list');
        /* initialize */
        jbNS.OL_level = jbNS.treeframe.find('ol');
        jbNS.LI_elements = jbNS.treeframe.find('li');
        jbNS.treeframe.find(".ln").on({
            "mouseenter": tree_handleMouseEvents,
            "mouseleave": function (event) {
                event.target.style.backgroundColor = "";
            },
            "mousedown": lineIDmousedown
        });
        setExpansionstate();
        scrolltree(jbNS.treetop_el_index);
    }

    //endregion

    //region draggable

    // Simple JQuery Draggable Plugin
// https://plus.google.com/108949996304093815163/about
// Usage: $(selector).drags();
// Options:
// handle            => your dragging handle.
//                      If not defined, then the whole body of the
//                      selected element will be draggable
// cursor            => define your draggable element cursor type
// draggableClass    => define the draggable class
// activeHandleClass => define the active handle class
//
// Update: 26 February 2013 - Check the older version
// 1. Move the `z-index` manipulation from the plugin to CSS declaration
// 2. Fix the laggy effect, because at the first time I made this plugin,
//    I just use the `draggable` class that's added to the element
//    when the element is clicked to select the current draggable element. (Sorry about my bad English!)
// 3. Move the `draggable` and `active-handle` class as a part of the plugin option
    $.fn.drags = function (opt) {

        opt = $.extend({
            handle: ".dragme",
            cursor: "move",
            draggableClass: "draggable",
            activeHandleClass: "active-handle"
        }, opt);

        let $selected;// = null;
        let $elements = (opt.handle === "") ? this : this.find(opt.handle);

        $elements.css('cursor', opt.cursor).on("mousedown touchstart", function (e) {
            if (opt.handle === "") {
                $selected = $(this);
                $selected.addClass(opt.draggableClass);
            } else {
                $selected = $(this).parent();
                $selected.addClass(opt.draggableClass).find(opt.handle).addClass(opt.activeHandleClass);
            }
            let drg_h = $selected.outerHeight(),
                drg_w = $selected.outerWidth(),
                pos_y = $selected.offset().top + drg_h - e.pageY,
                pos_x = $selected.offset().left + drg_w - e.pageX;
            $(document).on("mousemove", function (e) {
                $selected.offset({
                    top: e.pageY + pos_y - drg_h,
                    left: e.pageX + pos_x - drg_w
                });
            }).on("mouseup touchend", function () {
                $(this).off("mousemove"); // Unbind events from document
                if ($selected !== null) {
                    $selected.removeClass(opt.draggableClass);
                    $selected = null;
                }
            });
            e.preventDefault(); // disable selection
        }).on("mouseup touchend", function () {
            if (opt.handle === "") {
                $selected.removeClass(opt.draggableClass);
            } else {
                $selected.removeClass(opt.draggableClass)
                    .find(opt.handle).removeClass(opt.activeHandleClass);
            }
            $selected = null;
        });

        return this;

    };
    //endregion

    //region set globals
    window.site100oxen.showAndGotoAnyLine = showAndGotoAnyLine;
    window.site100oxen.init_tree = init_tree;
    window.site100oxen.getNewIframeFile = getNewIframeFile;
    //endregion

    //region bound event handlers
    $("#hiddendiv").on({
        "dblclick": function () {
            setTimeout(function () {
                $("#hiddendiv").hide();
            }, 1000);
            return true;
        }
    });

    $("#switchColumns").on({
        "mousedown touchstart": switchColMousedown
        //"click": swcol_up
    });
    $("#bm_nav").on({
        "click": swcol_up
    });
    $("body").on({
        "keyup": tree_handleKey,
        "click": tree_handleMouseEvents
    });
    $(window).on({
        resize: function () {
            let li;

            li = $("#col4").find("li");
            if (window.innerWidth < 500) {
                li.eq(0).text("expl");
                li.eq(1).text("help");
            } else {
                li.eq(0).text("explanation");
                li.eq(1).text("help");
            }
            zoominout();
            jbNS.oldcolnum = -1;
            setColumns();
            adjustColWidth();
            scrollgreek();
        },
        unload: savePageState
    });

    $("iframe").on({
        "load": function () {
            try {
                const diff = jbNS.keepFontsize ? 0 : calcFontsizeDiff();
                $(this).contents().find("html").css("font-size",
                    (jbNS.basic_fontsize - diff) + "px");
            } catch (ignore) {
            }
        }
    });

    /* menu clicks */
    if (!window.site100oxen.untouchable) {
        $(window, "#topdiv,#switchColumns,#bm_nav").on("swipeleft", shrinkLeftColumn);
        $(window, "#topdiv,#switchColumns,#bm_nav").on("swiperight", growLeftColumn);
    }
    $("#BMselector").on({
        "change": changebm,
        "click": function (event) {
            event.stopImmediatePropagation();
            return false;
        },
        "focus": function () {
            this.selectedIndex = -1;
        }
    });
    $("#bmnext").on({"click": nextbm});
    $("#bmprev").on({"click": prevbm});
    $("#setlevel").on({
        "click": function (event) {
            event.stopImmediatePropagation();
            let $targ = $(event.target);
            let t = $targ.text();
            $("#setlevel tr td").css("backgroundColor", "");
            if (t !== "level:") {
                utils.expand("list", parseInt(t, 10), false);
            }
            if ($targ.is("td")) {
                $targ.css("backgroundColor", "black");
            }
        }
    });
    $("#setfontsize").on({
        "change": function () {
            jbNS.basic_fontsize = this.value;
            setfont(this.value);
            $("#keepfs")[0].checked = false;
            jbNS.keepFontsize = true;
        },
        "click": function (event) { // catch click
            event.stopImmediatePropagation();
        }
    });
    $("#keepfs").click(function (event) {
        event.stopImmediatePropagation();
        if (this.checked === false) { //not auto
            jbNS.keepFontsize = true;
            jbNS.basic_fontsize = $("#setfontsize")[0].value;
            //localStorage.setItem( "fontsize", jbNS.basic_fontsize );
        } else {
            jbNS.keepFontsize = false;
            jbNS.basic_fontsize = 16;
            zoominout();
        }
    });
    $("#reset").click(function (event) {
        event.stopImmediatePropagation();
        //$(".btn1 ul").removeClass("menuActive");
        utils.myAlert("Reset all? settings will be lost", true, doReset);
    });
    $("#del_all_bm").click(function (event) {
            event.stopImmediatePropagation();
            del_all_bm();
            clear_search();
        }
    );
    $("#empty").on({
        "click": function (event) {
            event.stopImmediatePropagation();
            jbNS.bookMarx[jbNS.columns_config[1] - 1].length = 1;
            cleanupBookMarx();
            jbNS.greekanchors.removeClass("bmcolor");
            jbNS.butleranchors.removeClass("bmcolor");
            adjustBMselector("");
            clear_search();
        }
    });
    $("#goback").click(function (event) {
        let tmp;
        event.stopImmediatePropagation();
        tmp = jbNS.gr_beginLine;
        jbNS.gr_beginLine = jbNS.gr_previousLine;
        jbNS.gr_previousLine = tmp;
        scrollgreek();
    });
    $("#to_pad").click(function () {
        $("#shownotes").trigger("click");
        let m = "!BM\n" + jbNS.bookMarx[0].join('\n') + '\n';
        m += jbNS.bookMarx[1].join('\n') + '\n';
        m += jbNS.bookMarx[2].join('\n') + '\n';
        m += jbNS.bookMarx[3].join('\n') + '\n';
        $("#notes")[0].value = m;

    });
    $("#from_pad").click(function () {
        let s, arr;
        event.stopImmediatePropagation();
        //$("#shownotes").trigger("click");
        arr = $("#notes")[0].value.split("\n");
        s = arr.join(",");
        read_in_Bookmarx(s);
    });
    $(".btn1 ul li").on({
        "click": function () {
            //event.stopImmediatePropagation();
            //utils.myAlert("notok", false);
            $(".btn1 ul").hide();
        }
    });
    $("#colwrap").on({
        "click": function () {
            $(".btn1 ul").hide(); // event is not caught, falls through to here
        }
    });
    $(".btn1").on({
        "mouseenter": function (e) { //correct menu position when screen is too narrow
            let pos, b;
            let menu = $(this).find("ul").eq(0);
            menu.show().addClass("menuActive");
            if ($(e.target).is("#tools")) {
                $("#setlevel tr :nth-child(" + jbNS.currentLevel + ")").css("backgroundColor", "black");
                pos = $(menu).position();
                b = $("body").width();
                if (pos.left + menu.width() > b) {
                    menu.css({left: b - menu.width()});
                } else {
                    menu.css({left: $("#tools").last().position().left});
                }
            }
        }
    });
    $(".btn1 ul").on({
        "mouseleave": function () {
            $(this).hide();
        }
    });
    $(".btn1 img").on({
        "mouseenter": function () {
            $(this).css("outline", "1px solid red");
        },
        "mouseleave": function () {
            $(this).css("outline", "0");
        },
        "click": function () {
            $(".btn1 > ul").not($(this).parent().children("ul")).hide(); //0, function () {
            //     $(this).parent().children("ul").css({"display": "block"});
            // });
        }
    });
    $(".btn1 #tools").on({
        "tap": function () {
            $(this).parent().children("ul").toggle(); //css({"display": "block"});
            return true;
        }
    });
    $("#selectbtn").click(executeBtnChoice);

    $("#textinput").on({
        "keypress": keyboardInput,
        "keyup": setSelButtonText,
        "paste": function () {
            setTimeout(setSelButtonText, 100);
        }, //delay because "paste" fires before the text is entered
        "click": function () {
            //event.stopImmediatePropagation();
            return false;
        },
        //"dblclick": clrinp
    });
    $("#selonly").click(toggleSelOnly);
    $("#shownotes").click(showNotes);
    $("#notediv").drags().find(".divhdr").on("click", function () {
        saveNotes();
        $("#notes").slideUp(300, "swing", function () {
            $("#notediv").hide(300, "swing");
        });
        $("body").on({ // put back key handler
            "keyup": tree_handleKey
        });
    });
    $("#notes").on({
        "keypress": keyboardInput
    });
    $("#showalf").click(function (event) {
        event.stopImmediatePropagation();
        //$(".btn1 ul").removeClass("menuActive");
        showAlfabet(true);
    });
    $("#alfabetdiv").drags().find(".divhdr").on("click", function () {
        showAlfabet(false);
    });
    $("#tr1").find("td").on({
        "mouseup": function () {
            enterInput($(this).text(), $("#notes:visible").length ? $("#notes")[0] : $("#textinput")[0], false);
        }
    });
    $("#savestate").click(savePageState);
    $("#loadstate").click(function () {
        loadPageState();
        setExpansionstate();
    });
    $("#beta, #betaswitch").on("mousedown", betaclick);
    $("#betaswitch").click(function () {
        return false;
    });
    $("#goto").click(gotoclick);
    $("#who, #dunnit").click(function (event) {
        event.stopImmediatePropagation();
        $("#dunnit").fadeToggle(400);
    });
    $("#loadsavebtn").click(function () {
        let ls = $("#loadsave");
        ls.fadeToggle();
    });
    $("#clrpad").click(function () {
        $("#notes")[0].value = "";
    });
    $("#send").click(function () {
        $(location).attr('href', 'mailto:' + getMailAdr() + '?subject=' +
            encodeURIComponent("homepage note") +
            "&body=" +
            encodeURIComponent($("#notes")[0].value)
        );
    });
    $("#arktos").click(function () {
        showAndGotoAnyLine("od 5.273", true);
    });
    $("#splash").click(function () {
        $(this).fadeToggle(1000);
    });
    $("#nosplash").change(function () {
        if (this.checked) {
            localStorage.setItem("splash", "hide");
        }
    });
    $("#editor").click(function () {
        $("#pageframe")[0].src = 'editor.php';
        site100oxen.currentPage = 'editor.php';
        configColumns(0, 2, true);
    });
    $("#contact").click(function () {
        get_page_from_menu(3);
    });
    $("#showcolnav, #showbmnav").click(swcol_down);
    $("#savefile").click(saveBlob);
    $("#loadfile").click(loadFileAsText);
    $("#messages button").click(function () {
        $("#messages").slideUp(600);
        localStorage.setItem("showmsg", "false");
        localStorage.setItem("messages", $("#messages span").text());
    });

    //endregion
    function init_all() {
        window.site100oxen.forcereload = false;
        window.site100oxen.xml_loaded = true;
        init_tree();
        window.site100oxen.untouchable = // are we on a touch device?
            !(('ontouchstart' in window) || (navigator.maxTouchPoints > 0));
        if (window.site100oxen.untouchable) {
            $("#treeframe").niceScroll({
                cursorcolor: "#888",
                cursorwidth: "7px",
                background: "rgba(0,0,0,0.1)",
                cursoropacitymin: 0.2,
                hidecursordelay: 0,
                zindex: 2,
                horizrailenabled: true
            });
        }
        loadPageState(); // from localStorage
        //zoominout();
    }

    //region Ajax get xml
    function getXML(filename) {
        if (!filename) {
            filename = localStorage.getItem('textToLoad');
            if (!filename) {
                filename = 'iliad.xml';
            }
        }
        let fileindex = jbNS.xml_names.indexOf(filename);
        if (fileindex < 0) {
            utils.myAlert(`unknown filename ${filename}`, true);
            return;
        } else {
            jbNS.columns_config[1] = fileindex + 1;
        }
        localStorage.setItem('textToLoad', filename);
        jbNS.newXML = true;
        let dfr = $.Deferred();
        $.ajax({
            type: "HEAD",
            async: true,
            cache: false,
            url: filename,
        }).done(function (message, textStatus, jqXHR) {
            const resp = jqXHR.getAllResponseHeaders();
            const etag = resp.match(/etag: \"(.*)\"/i);
            const here = localStorage.getItem(filename);
            if (here && here === etag[1]) {
                jbNS.newXML = false;
            }
            if (jbNS.newXML) {
                localStorage.setItem(filename, etag[1]);
            }
            $.ajax({
                type: "GET",
                url: filename,
                cache: !window.site100oxen.forcereload || !jbNS.newXML,
                dataType: "text",
                success: function (xmlstring) {
                    try {
                        window.site100oxen.XML = $.parseXML(xmlstring);
                    } catch (e) {
                        dfr.reject(e);
                    }
                    console.log(`${filename} from cache: ${!jbNS.newXML}`);
                    dfr.resolve(xmlstring);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    window.site100oxen.xml_loaded = false;
                    dfr.reject(`can't load ${filename}; ${textStatus}; ${errorThrown}`);
                }
            });
        }).fail((xhr) => {
            utils.myAlert(`${xhr.status} ${xhr.statusText}`, true);
        });
        return dfr.promise();
    };
    getXML().done(() => { //xml load what is in localStorage or iliad.xml
        init_all();
    })
        .fail((msg) => {
            utils.myAlert(msg, true);
        });
    //endregion

})(jQuery);
