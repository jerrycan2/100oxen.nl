import * as utils from '../scripts/myUtils.js?v=0.1.6';
import {beta2uni, uni2beta} from '../scripts/beta.js';
//import {myAlert} from "../scripts/myUtils";

'use strict';
// lineID format: [Il|Od|Th|WD][:|space|nothing] Xnnn | mm.nnn | nnn where m,n are digits and X is a greek or latin letter (case insensitive)
//region Site global var
// set pointers:
window.parent.site100oxen = { // parent refers to itself
    XML: null, //here comes the XML parsetree
    ilXML: null,
    odXML: null,
    showAndGotoAnyLine: null,
    loadAndGotoTextframeAnchor: null,
    init_tree: null,
    untouchable: true,
    configColumns: null,
    set_beginLine: null,
    get_col_config: null,
    currentPage: "",
    startLevel: 0,
};
//endregion Site global vars endregion
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
        columns_config: [1, 1, 3, 0],
        // List/Page=bit0/bit1, Il/Od/Theo/W&D=1-4 (index+1), GR/EN=bit0/bit1, Text/Help=bit0/bit1
        width: [0, 0, 0, 0],
        already_loaded: [false, false, false, false],
        store_greek: [null, null, null, null],
        store_butler: [null, null, null, null],
        oldcolnum: 0,
        prefixes: ["Il", "Od", "Th", "WD"], //bookmark prefix = prefixes[ columns_config[ 1 ] - 1 ]
        filenames: [
            ["", ""],
            [`gr_il`, `gr_od`, `gr_th`, `gr_wd`],
            [`en_il`, `en_od`, `en_th`, `en_wd`],
            ["textframe.php", "help.php"]
        ],
        xml_names: ["iliad.xml", "odyssey.xml", "", ""],
        perseus_names: [
            ["1999.01.0133", "1999.01.0135", "1999.01.0129", "1999.01.0131"],//iliad, odyssey
            ["1999.01.0134", "1999.01.0136", "1999.01.0130", "1999.01.0132"] //theo, wd
        ],
        perseus_url: "http://www.perseus.tufts.edu/hopper/text?doc=Perseus:text:",
        treeframe: $("#treeframe"),
        pageframe: $("#pageframe"),
        greekframe: $("#greekframe"),
        butlerframe: $("#butlerframe"),
        textframe: $("#textframe"),
        fileindex: -1,
        forcereload: true,
        basic_fontsize: 16, //px
        keepFontsize: false, //if true: fontsize remains same after window resize
        OL_level: null,
        LI_elements: null,
        beginLine: [0, 0, 0, 0],
        greekanchors: null,
        butleranchors: null,
        treetop_el_index: 0,
        bookMarx: [
            ["---Il:--"],
            ["---Od:--"],
            ["---Th:--"],
            ["---WD:--"]
        ],
        parse_lineID: /((il|od|th|wd)?(\s|:)?)?(((\d+\.)|([a-zA-Z\u0391-\u03C9]))?(\d+))/i,
        // "il 14.100" "od:a200" "wd 50" ":50" "50" etc $1=all, $2=text, $3=greek/eng, $4=lineNR ($6=chap, $7 = letter, $8=line)
        check_br: /(<br>)/g,
        bm_to_goto: "",
        selectBtnMessages: [
            [""],
            ["???"],
            ["Goto gr.", "<img id='perseus' alt='Perseus icon' src='../images/perseus_digital_lib.gif'> :", "Greek", "English"],
            ["Goto eng.", "<img id='perseus' alt='Perseus icon' src='../images/perseus_digital_lib.gif'> :", "Greek", "English"],
            ["Goto"],
            ["Find Greek", "<img id='perseus' alt='Perseus icon' src='../images/perseus_digital_lib.gif'> :", "Word Study"],
            ["Find Eng."],
            ["set email adr."]
        ],
        selectBtnActions: [
            [showAndGotoAnyLine, null, perseusLookup, perseusLookup],
            [textsearch, null, perseus_WS_search]
        ],
        selectBtnChoice: 0,
        showonlyselection: false,
        exp_state: "11",
        touchcancel: false,
        dontSetColumns: false,
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
        // if (window.location.hostname !== "127.0.0.1") {
        //     utils.myAlert("This only works with localhost");
        //     return;
        // }
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
        url1 = encodeURI(url1);
        window.open(url1);
        // jbNS.pageframe[0].src = url1;
        // configColumns(0, 2, true);
        // try {
        //     history.pushState(null, "", url1);
        // } catch (ignore) {
        // }
    }

    function perseus_WS_search() {
        var result, url;

        result = $.trim($("#textinput").val());
        result = uni2beta(result, true);
        if (result === "") {
            utils.myAlert("no selection!", false, null);
            return;
        }
        result = result.replace(/wi/, "w|"); //replace iota subscriptum after eta en omega
        result = result.replace(/hi/, "h|"); //(->Perseus beta code)
        url = 'http://www.perseus.tufts.edu/hopper/morph?l=' + result + '&la=greek';
        window.open(url);
        // $("#pageframe")[0].src = url;
        // try {
        //     history.pushState(null, "", url);
        // } catch (ignore) {
        // }
        // configColumns(0, 2, true);
    }

    /**
     * goto Alpheios word-study with word in #textinput
     */
    function WS_search() {
        $("#hiddendiv").show();
        $("#alphtext").text($("#textinput").val());
    }

    //endregion Perseus
    //region scrolling & searching
    /**
     * function scrollgreek
     * scroll #greekframe to the line in jbNS.gr_beginLine
     */
    function scrollgreek() {
        let begin, $top;
        begin = get_beginLine();
        if (!jbNS.greekanchors || !jbNS.greekanchors[begin] || jbNS.greekframe[0].style.visibility === "hidden") {
            return;
        }
        if (begin !== 0) {
            $top = jbNS.greekanchors.eq(begin);
            $top[0].scrollIntoView();
        } else {
            jbNS.greekframe.contents().scrollTop(0);
        }
    }

    /**
     * function loadAndGotoTextframeAnchor
     * scroll #textframe to a named anchor. Load textframe if needed
     * @param name : string // name of anchor
     */
    function loadAndGotoTextframeAnchor(name) {
        if (jbNS.columns_config[3] !== 1) {
            jbNS.textframe.one("load", function () {
                utils.gotoAnchor(name, false);
            });
            jbNS.textframe[0].src = jbNS.filenames[3][0];
            configColumns(3, 1, true);
        } else {
            utils.gotoAnchor(name, true);
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
                n = utils.LatinGreek.greek2index(lineID.substr(0, 1));
                if (n < 0) {
                    n = utils.LatinGreek.latin2index(lineID.substr(0, 1));
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
     * @param t1 : string // lineID
     * @param t2 : string // lineID
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
        found1 = lineID_2_lineNR_obj(s);
        if (found1) {
            this1 = found1.c; // found beginline of section
            this2 = found1.l;
        } else {
            utils.myAlert("'" + s + "' is not a line number", false, null);
        }
        s = jbNS.butleranchors.eq(Aindex + 1).text();
        found2 = lineID_2_lineNR_obj(s);
        if (found2) {
            nxt1 = found2.c; // beginline of next section
            nxt2 = found2.l;
        } else {
            utils.myAlert("'" + s + "' is not a line number", false, null);
        }
        target = lineID_2_lineNR_obj(item) || utils.myAlert("'" + item + "' is not a line number", false, null);
        it1 = target.c;
        it2 = target.l;
        if (which === 2) { //second linenumber: move back 1 iliad line
            if (it2 > 1) { //second is never [1.1]
                it2 -= 1;
            } else {
                it1 -= 1;
                it2 = utils.LatinGreek.getchaplen(jbNS.columns_config[1] - 1, it1); // last line of prev book
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
        bs = jbNS.butlerframe.contents().find("b:first");
        while (bs.length > 0) {
            t = bs.parent().html();
            while (t.indexOf("<b>") >= 0) {
                t = t.replace("<b>", "");
                t = t.replace("</b>", "");
            }
            bs.parent().html(t);
            bs = jbNS.butlerframe.contents().find("b:first");
        }
        jbNS.butleranchors = jbNS.butlerframe.contents().find("a");
    }

    /**
     * function textsearch()
     * search for the text or lineID in #textinput, in greek + english
     * it's counted greek if there is at least 1 greek char in it.
     * it's counted Extended Greek if at least 1 char. has diacritics
     */
    function textsearch() {
        function add_offset(lineID, offset) {
            const arr = lineID.split(".");
            const lnr = parseInt(arr[1], 10) + offset;
            return `${arr[0]}.${lnr}`;
        }

        let i, n, len, target, lines, flag, count, bmsel, inp, $frame, pos, prefix,
            found, item, matches;
        let too_many_bm = false;
        const queue = [];
        inp = $("#textinput").val();
        if (inp.length < 2) {
            utils.myAlert("Select what? none or one letter?", false, null);
            return;
        }
        //del_all_bm();
        //clear_search();
        count = 0;
        flag = isGreekCode(inp);
        $frame = jbNS.greekframe;
        if (flag === 0) { //search in Butler text. No <b> tagging of found words here, only the bookmarks
            //jbNS.butlerframe.contents().find("p:contains('" + inp + "')").each(function (i, el) {
            jbNS.butleranchors.each(function (i, el) {
                const content = el.parentElement.innerHTML;
                const butlerpos = content.indexOf(inp);
                if (butlerpos >= 0) {
                    const bm = el.textContent;
                    count += 1;
                    if (setUnsetBookMark(bm, false, false) && !too_many_bm) {
                        utils.myAlert("too many bookmarks! (max. 500)", false, null);
                        too_many_bm = true; //abort!
                    }
                    el.parentElement.innerHTML = content.substring(0, butlerpos) +
                        "<b>" + inp + "</b>" + content.substring(butlerpos + inp.length);
                }
            });
            jbNS.butleranchors = jbNS.butlerframe.contents().find("a");
        } else {
            lines = $frame.contents().find("p");
            len = lines.length;
            target = new RegExp(uni2beta(inp, false));
            for (i = 0; i < len; i += 1) {
                let greekline = lines.eq(i).html();
                pos = greekline.indexOf("</a>") + 4;
                prefix = greekline.substring(0, pos);
                greekline = greekline.substr(pos);
                matches = null;
                found = 0;
                if (flag < 2) { // searching is done in betacode, without diacriticals
                    const betaline = uni2beta(greekline, false);
                    let betapos = 0;
                    let greekpos = 0;
                    while ((matches = target.exec(betaline.substring(betapos))) !== null) {
                        item = matches[0];
                        const matchlen = item.length;
                        betapos = betapos + matches.index + matchlen;
                        greekpos += matches.index;
                        const br_found = greekline.substring(0, greekpos).match(jbNS.check_br);
                        let br_count = 0;
                        if (br_found) {
                            br_count = br_found.length;
                        }
                        queue.push(add_offset(lines.eq(i).children(":first").text(), br_count));
                        greekline = greekline.substr(0, greekpos) + "<b>" + // replace in greek unicode
                            greekline.substr(greekpos, matchlen) + "</b>" +
                            greekline.substr(greekpos + matchlen);
                        greekpos += matchlen + 7;
                        found += 1;
                    }
                } else { // search in Greek unicode
                    let val, x = 0, ustring = "";
                    for (; x < inp.length; x += 1) {
                        val = inp.charCodeAt(x);
                        if (val >= 0x1F00) {
                            ustring += utils.LatinGreek.greek_unicode(inp[x]);
                        } else {
                            ustring += inp[x];
                        }
                    }
                    target = new RegExp(ustring, "u");
                    let greekpos = 0;
                    while ((matches = target.exec(greekline.substring(greekpos))) !== null) {
                        item = matches[0];
                        const matchlen = item.length;
                        greekpos += matches.index;
                        const br_found = greekline.substring(0, greekpos).match(jbNS.check_br);
                        let br_count = 0;
                        if (br_found) {
                            br_count = br_found.length;
                        }
                        queue.push(add_offset(lines.eq(i).children(":first").text(), br_count));
                        greekline = greekline.substr(0, greekpos) + "<b>" + item + "</b>"
                            + greekline.substr(greekpos + matchlen);
                        greekpos += matchlen + 7;
                        found += 1;
                    }
                }
                if (found > 0) {
                    lines.eq(i).html(prefix + greekline);
                    count += found;

                    if (!too_many_bm && count > 500) {
                        // 2nd parameter: don't toggle BM, just add
                        utils.myAlert("too many bookmarks (max. 500)! counting only...", false, null);
                        too_many_bm = true;
                    }
                }
            }
        }
        jbNS.greekanchors = $frame.contents().find("a"); // must refresh
        if (!too_many_bm) {
            while (queue.length) {
                n = queue.shift();
                setUnsetBookMark(n, false, true);
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
            }, 3000);
        }
    }

    /**
     * function set_beginLine
     * set the beginline (scroll top) of current text
     * @param n : number //index to <a> element in greek text (jbNS.greekanchors), see common.js
     */
    function set_beginLine(n) {
        jbNS.beginLine[jbNS.columns_config[1] - 1] = n;
    }

    /**
     * get_beginLine
     * @returns : number //first visible line of current text
     */
    function get_beginLine() {
        return jbNS.beginLine[jbNS.columns_config[1] - 1];
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
        let index = [0, 0, 0, 0, 0];
        for (i = 0; i < opt.options.length; i += 1) {
            tmp = opt.options[i].text;
            if (i > 0 && tmp.substr(0, 1) === "-") {
                txt += 1;
                index[txt] = i;
            }
            jbNS.bookMarx[txt][jbNS.bookMarx[txt].length] = tmp;
        }
        for (i = 0; i < 4; i += 1) {
            opt.options[index[i]].text = opt.options[index[i]].text.substr(0, 6) +
                " " + (jbNS.bookMarx[i].length - 1);
        }
    }

    /**
     * function read_in_Bookmarx
     * read bookmarks from localstorage
     * @param s: string //comma-separated list of all bm
     */
    function read_in_Bookmarx(s) {
        let arr, i, m, n, bm, nw, isgreek;
        jbNS.bookMarx = [[], [], [], []];
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
            jbNS.bookMarx[n][m] = bm;
            m += 1;
        }
        cleanupBookMarx();
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
            for (i = 0; i < sel.options.length; i++) {
                if (sel.options[i].value.substring(0, 6) === txt.substring(0, 6)) {
                    sel.selectedIndex = i;
                }
            }
        } else {
            for (i = 0; i < sel.options.length; i++) {
                if (sel.options[i].value === txt) {
                    sel.selectedIndex = i;
                }
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
        let step, i, groter, stepcount, tl, groter2, $lines;  // returns index of line
        $lines = jbNS.greekanchors; // $("a") array
        if ($lines.length) {
            i = $lines.length - 1;
        } else {
            return -1;
        }
        const max = i;
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
            // if(jbNS.columns_config[1] > 2) { // Hesiod & Iliad: not every line has a nr
            if (i < $lines.length - 1) {
                groter2 = compare_lineNRs($lines[i + 1].textContent, lineNR);
                if (groter === -1 && groter2 === 1) {
                    groter = 0;
                }
            } else {
                if (groter === -1) {
                    groter = 0;
                }
            }
            if (groter === 0) {
                if (mark === 1) {
                    if (tl.className === "bmcolor") {
                        tl.removeClass("bmcolor");
                    } else {
                        tl.className = "bmcolor";
                    }
                }
                if (scroll) {
                    set_beginLine(i);
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
        let i, step, groter, stepcount;   // 2 is only used for coloring
        if (!item || !jbNS.butleranchors.length) {
            return -1;
        }
        i = jbNS.butleranchors.length - 1;
        const max = i;
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
            if (groter === -1 && i >= max - 1) {
                groter = 0;
            }
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
                if (lineindex !== 0) {
                    jbNS.butleranchors[lineindex].scrollIntoView();
                } else {
                    jbNS.butlerframe.contents().scrollTop(0);//.find("#butlertext")
                }
            }
        } else {
            utils.myAlert("Butler bookmark not found", false, null);
        }
        return lineindex;
    }

    function find_lnr_from_bm(bm) {
        return bm.substring(0, 3) + jbNS.greekanchors[bm_greek_search(bm.substring(3), false, 2)].textContent;
    }

    /**
     * function setUnsetBookMark
     * Create bookmark from a lineNR, set/unset bookmark marking & combobox select options
     * @param bookmark : string // line number as string. May or may not contain text & language
     * @param toggle : boolean // do/don't toggle bookmark (XOR / OR), do if alt-click, don't if 'select' by combobox
     * @param greek : boolean // if true: greek bookmark, false: butler
     * @return boolean // true if too many bookmarks
     */
    function setUnsetBookMark(bookmark, toggle, greek) {
        let linenr, i, $target, currtxt, bms, hascolon, parsebm, txtindex, found;
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
            hascolon = !greek; // if no language ID, take parameter
        }
        if (!parsebm[2]) { //if no text ID in bookmark, take currently loaded text
            bookmark = jbNS.prefixes[currtxt] + (hascolon ? ":" : " ") + linenr;
        } else {
            txtindex = $.inArray(parsebm[2], jbNS.prefixes);
            if (txtindex >= 0) {
                currtxt = txtindex;
            }
        }
        if (!hascolon) {
            $target = jbNS.greekanchors.eq(bm_greek_search(linenr, false, 2));
        } else {
            found = false;
            jbNS.butleranchors.each(function (i, el) {
                if (el.textContent === linenr) {
                    $target = $(el);
                    found = true;
                    return false;
                } else {
                    return true;
                }
            });
            if (!found) {
                utils.myAlert("butler bookmark not found", false);
                return false;
            }
        }
        bms = jbNS.bookMarx[currtxt]; //take the bm's for one text
        let ix, bm, startline;
        found = false;
        for (ix = 1; ix < bms.length; ix += 1) {
            bm = bms[ix];
            if (!hascolon) {
                startline = find_lnr_from_bm(bm);
            } else {
                startline = bm;
            }
            if (startline === bookmark) {
                found = true;
                break;
            }
        }
        if (found) {
            if (toggle) {
                $target.removeClass("bmcolor");
                bms[ix] = "";
            } else {
                $target.addClass("bmcolor");
            }
        } else {
            if (bms.length > 500) {
                return true;
            }
            $target.addClass("bmcolor");
            bms[bms.length] = bookmark;
        }
        return false;
    }

    /**
     * function putbackBookmarks
     * set bookmarks from bookmarx[][] into text and select element after switching text or reload
     * @param greek
     */
    function putbackBookmarks(greek) {
        let currtxt, i, bm;
        currtxt = jbNS.columns_config[1] - 1;
        if (currtxt < 0) {
            return;
        }
        if (jbNS.bookMarx[currtxt].length < 2) {
            jbNS.greekanchors.removeClass("bmcolor");
            jbNS.butleranchors.removeClass("bmcolor");
            clear_search();
        } else {
            bm = jbNS.bookMarx[currtxt].slice();
            jbNS.bookMarx[currtxt] = [];
            for (i = 0; i < bm.length; ++i) {
                if (bm[i].substr(0, 1) !== "-") {
                    setUnsetBookMark(bm[i], false, greek);
                } else {
                    jbNS.bookMarx[currtxt][jbNS.bookMarx[currtxt].length] = bm[i];
                }
            }
            cleanupBookMarx();
        }
    }

    function del_all_bm() {
        let i;
        for (i = 0; i < 4; ++i) {
            jbNS.bookMarx[i].length = 1;
        }
        localStorage.setItem("bookmarks", "---Il:--,---Od:--,---Th:--,---WD:--");
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
        parsebm = jbNS.bm_to_goto.match(jbNS.parse_lineID);
        if (!parsebm || !parsebm[4]) {
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
    /**
     * function showAndGotoAnyLine
     * goto any lineID (bookmark), load text /switch language as needed
     * @param bookmark: string //target text+linenr
     * @param loadtext: boolean //load the text if it is not showing
     */
    function showAndGotoAnyLine(bookmark, loadtext) {
        if (!bookmark) {
            return;
        }
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
                if (textindex < 3) {
                    getXML(jbNS.xml_names[textindex - 1]).done(() => {
                        init_all();
                    });
                }
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
     * get textcontent of user selection (event listener created in iframe)
     * @param event
     */
    function getSelectedText(event) {
        let txt, rng, idoc, doc, ifr = false;
        //find selected text, in an iframe or input/contenteditable element
        txt = "";
        if (event && event.view.name === "greekframe") {
            doc = jbNS.greekframe[0];
            ifr = true;
        } else if (event && event.view.name === "butlerframe") {
            doc = jbNS.butlerframe[0];
            ifr = true;
        } else if (event && event.view.name === "pageframe") {
            doc = jbNS.pageframe[0];
            ifr = true;
        } else if (event && event.view.name === "textframe") {
            doc = jbNS.textframe[0];
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
     * function scrollTreeToLinenr
     * scroll the collapsible tree to given linenumber. It fully expands the tree
     * and scrolls to the the first node having that number.
     * (all the linenrs are in the XML greek lines, but not in the HTML)
     * @param linenr
     */
    function scrollTreeToLinenr(linenr) {
        utils.maptree.line = linenr;
        utils.maptree(window.parent.site100oxen.XML, function (node) {
            // if (utils.maptree.node) {
            //     return false;
            // }
            if (node.nodeName === "line" &&
                node.getAttribute("lnr") === utils.maptree.line) {
                utils.maptree.line = node.parentNode.firstChild.getAttribute("lnr");
                //return line number of first sibling. This can be found in the HTML
                return false;
            }
            return true;
        });
        utils.expand("list", 8, false).then(function () {
            //level=8 : elements must not be hidden to find offset()
            jbNS.currentLevel = 8;
            const fnd = $(`span:contains("${utils.maptree.line}")`).eq(0);
            const t = (fnd.offset().top - $(".lvl0").eq(0).offset().top) +
                ($("#topdiv").height() - $("span.ln:first").height());
            jbNS.treeframe.animate({scrollTop: t}, 350); // position can only be calculated after expanding
            // utils.maptree.node = null;
            utils.maptree.line = "";
        });
    }

    /**
     * function gr_bu_MouseDown(event)
     * event-handler for mousedown/touchend on greek and butlertexts
     * measures time until mouseup. if it's a 'hold', send selected text to textinput or notes
     * @param event
     */
    function gr_bu_MouseDown(event) {
        /**
         * function gr_bu_MouseUp
         * clicked or selected in greek or butler text
         * @param event
         */
        let time1 = event.timeStamp;
        event.stopImmediatePropagation();
        // event.preventDefault();
        $(event.target).one("mouseup", function (ev2) {

            let $t, is_greek, line, s, notes, bookmark, click_lnr, too_many_bm;
            const holding = (ev2.timeStamp - time1) > 500;
            ev2.stopImmediatePropagation();
            if (jbNS.touchcancel) {
                jbNS.touchcancel = false;
                return;
            } // if it's a swipe, don't do anything here

            click_lnr = false;
            $t = $(ev2.target);
            is_greek = ev2.view.name === "greekframe";
            if ($t.is("a")) {
                line = $t.text();
                click_lnr = true;
                /* click on linenr */
            } else if ($t.is("p") || $t.parent().is("p")) { /* or on line itself */
                line = $t.children("a").text();
                click_lnr = false;
            } // got lineNR. may not need it, if text selected
            if (!line) {
                return;
            }
            if (is_greek) {
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
                    if (s.length < 1000) {
                        $("#textinput").val(s);
                        change_textinput();
                        setSelButtonText();
                    } else {
                        $("#textinput").val("selection too large");
                    }
                }
            } else {
                if (click_lnr) {  // click on linenumber: let the other frame scroll there
                    jbNS.bm_to_goto = line;
                    butlerGotoBM(line);
                    bm_greek_search(line, true, 0);
                    if (ev2.ctrlKey || holding) {
                        scrollTreeToLinenr(line);
                    }
                } else { //click in text, no selection: set bookmark
                    too_many_bm = setUnsetBookMark(bookmark, true, is_greek);
                    if (too_many_bm) {
                        utils.myAlert("Too many bookmarks (max. 500). BM not set.", false, null);
                    }
                    cleanupBookMarx();
                }
            }
        });
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
     * function whatisPutIn
     * decide what is in the #textinput: searchword (greek, extended greek or english) or linenr, for butler or greek text
     * @returns {{txt: number, lnr: boolean, taal: number, code: number, kind: number}}
     */
    function whatisPutIn() {
        let txt, i = 0, s, coding, lang = 3, lnr = false, typ = 0, parseln, $inp;
        $inp = $("#textinput");
        s = $inp.val();
        if (s.indexOf("mailto:") === 0) {
            typ = 2; // email addr
        } else {
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
            msg = 7; //mailto:
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

    function change_textinput() {
        const $inbuf = $("#textinput");
        if ($inbuf.val().length > 12) {
            if ($("#inputfield").has("#textinput").length) {
                $("#inputfield2").append($inbuf);
                $inbuf.css("width", "100%")
                $inbuf.focus();
            }
        } else {
            if ($("#inputfield2").has("#textinput").length) {
                $("#inputicon").before($inbuf);
                $inbuf.css({
                    "width": "12rem",
                    "background-color": "#003388",
                    "color": "white"
                });
                $inbuf.focus();
            }
        }
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
        if (code === 13) {
            executeBtnChoice(null);
            event.target.blur();
            return true;
        }
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
        const $trg = $(event.target);
        let inp;
        event.stopImmediatePropagation();
        event.preventDefault();
        if ($trg.attr("id") === "beta") {
            inp = document.getElementById("notes");
        } else {
            inp = document.getElementById("textinput");
        }
        //inp.value = inp.value.toLowerCase();
        enterInput(changeTextCoding(inp, true), inp, true);
    }

    function no_diacritics(event) {
        let input_el;
        if ($(event.target).is("#beta")) {
            input_el = document.getElementById("notes");
        } else {
            input_el = document.getElementById("textinput");
        }
        enterInput(changeTextCoding(input_el, false), input_el, true);
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
        if (!event) {
            index = 0;
            $lst.toggle();
        } else {
            trg = $(event.target);
            if (trg[0].id === "select") {
                $lst.toggle(); //$lst.display === "none");
                return;
            }
            index = trg.parent().children("li").index(trg);
        }
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
                s = s.toLowerCase();
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
        let txt = $("#textinput").val();
        if (txt.length > 7) {
            txt = $.trim(txt.substr(7));
        } else return;
        const check = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/i;
        const res = txt.match(check);
        if (!res) {
            utils.myAlert(`email adr. ${txt} seems invalid. Enter anyway?`, true, function () {
                localStorage.setItem("mailadr", txt);
            })
        } else {
            localStorage.setItem("mailadr", txt);
        }
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
     * function showAlphabet
     * show / hide alphabet popup
     * @param doit : boolean //true = show
     */
    function showAlphabet(doit) {
        if ($("#archaic").text() === "Polytonic Greek") {
            $("#tr2").find("td:not('.td2')").each(function (i, e) {
                $(e).text($(e).text().toUpperCase());
                $(e).css("font-family", "Archaic Greek");
                $(".td2").css("visibility", "hidden");
            });
        } else {
            $("#tr2").find("td:not('.td2')").each(function (i, e) {
                $(e).text($(e).text().toLowerCase());
                $(e).css("font-family", "Noto Sans");
                $(".td2").css("visibility", "visible");
            });
        }
        if (doit) {
            $("#alphabetdiv").show("slow", "swing");
        } else {

            $("#alphabetdiv").hide("slow", "swing");
        }
    }

    /**
     * function showAllLines
     * unhide lines hidden by showSelOnly()
     */
    function showAllLines() {
        let i, len, headers;
        headers = jbNS.greekframe.contents().find("h4");
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
        headers = jbNS.greekframe.contents().find("h4");
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

    /**
     * function switchArchaicFont
     * toggle greek font to and from archaic. Make the text
     * boustrophedon, starting r-l
     * @param event
     */
    function switchArchaicFont(event) {
        let i, n, len, node, txt, anch, arr, t2, cls, begin, end, lnr1;
        event.stopImmediatePropagation();
        if ($(this).text() === "Archaic Greek") {
            $(this).text("Polytonic Greek");
            jbNS.already_loaded[get_col_config(1) - 1] = null; //it's not already loaded
            let reverse = true;
            const acount = jbNS.greekanchors.length;
            if (jbNS.columns_config[1] > 2) { // if Theo or WD
                begin = 0;
                end = "";
            } else {
                lnr1 = parseInt(jbNS.greekanchors[get_beginLine()].textContent) + ".1";
                begin = bm_greek_search(lnr1, false, 2); // index of anchor
                end = (parseInt(lnr1) + 1) + ".1"; // linenr string
            }

            for (i = begin; i < acount - 1; i += 1) { // -1 : the last <a> is different
                node = jbNS.greekanchors[i].parentNode;
                anch = jbNS.greekanchors[i].innerText;
                if (anch === end) {
                    break; // in Hesiod texts this never kicks in
                }
                txt = Array.prototype.filter.call(node.childNodes, function (element) {
                    return element.nodeType === Node.TEXT_NODE;
                }).map(function (element) {
                    return element.textContent;
                }).join("");
                arr = txt.split('\n');
                len = arr.length;
                txt = "";
                if (len) {
                    for (n = 0; n < len; n += 1) {
                        t2 = arr[n];
                        t2 = t2.replace(/[ ]|,|\.|;|:|'|\u1FBD/g, "");
                        if (t2.length < 4) {
                            continue;
                        }
                        t2 = uni2beta(t2, false).toUpperCase();
                        if (reverse) {
                            t2 = t2.split("").reverse().join("");
                            cls = "rl";
                        } // reverse uneven linenrs (they started r to l)
                        else {
                            cls = "lr";
                        }
                        reverse = !reverse;
                        txt += `<p class="${cls}">${t2}</p>` + "\n";
                    }
                }
                node.innerHTML = `<a>${anch}</a> ${txt}`;
            }
            //jbNS.greekframe.contents().find( ".bk" ).css( "font-family", "reverse" );
            jbNS.greekframe.contents().find(".rl").css("font-family", "reverse");
            jbNS.greekframe.contents().find(".lr").css("font-family", "Archaic Greek");
            //jbNS.greekframe.contents().find( "a, h2, h4" ).css( "font-family", "Noto Sans" );
            jbNS.greekanchors = jbNS.greekframe.contents().find("a");
        } else {
            $(this).text("Archaic Greek");
            fetchTexts(jbNS.columns_config[1] - 1);
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
     * function tree_handleMouseEvents
     * event handler: click on treeframe
     * @param event
     */
    function tree_handleMouseEvents(event) { //single click or mouseenter
        if (event.type !== "click") {
            return;
        }
        let $trg, $prev, $ol, s, ids, bg, lvl, found, anchor;
        $trg = $(event.target);
        if ($trg.is(".hasrem")) {
            ids = utils.element2lineIDs($trg.next());
            bg = ids.beginning;
            lvl = parseInt($trg.parent().parent().attr("class").substring(3), 10);
            if (!isNaN(lvl)) {
                anchor = lvl + ":" + bg;
                found = utils.gotoAnchor(anchor, true); // 2nd par: false = don't go, just check existence
                if (!found) {
                    utils.myAlert("explanation not found")
                }
            }
        }
        if ($trg.is("span")) {
            $prev = $trg.prev("span");
            if ($prev && $prev.hasClass("ln")) { /*click on text part*/
                const ix = jbNS.columns_config[1] - 1;
                if (jbNS.fileindex !== ix) {
                    if (jbNS.fileindex === 0) {
                        utils.myAlert("load Iliad text first", false);
                    } else if (jbNS.fileindex === 1) {
                        utils.myAlert("load Odyssey text first", false);
                    }
                    return;
                }
                if ($trg.parents("ol").eq(0).hasClass("lvl0")) { //click on top element: wipe
                    wipeColors([jbNS.greekanchors, jbNS.butleranchors]);//wipe all colored sections
                    return;
                }
                selectTextSection($trg); // color greek lines
                s = $prev.text();
                showAndGotoAnyLine(`${jbNS.prefixes[ix]} ${s}`, false);
            } else if ($trg.is(".plm")) { /*click on + or - */
                const plm = $trg.text();
                if (plm === "⊕") {
                    $trg.text("⊖");
                } else {
                    $trg.text("⊕");
                }
                $ol = $trg.closest("li").children("ol").eq(0);
                $ol.slideToggle(400); //this = LI element
                $ol.promise().done(function () {
                    $("html").getNiceScroll().resize();
                });
            }
        }
        // else if ($trg.is("div.hasrem")) {
        //     handleRemClick($trg);
        // }
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
                ids = utils.element2lineIDs($trg);
                bg = ids.beginning;
                lvl = $trg.parent().parent().data("level") + 1;
                anchor = lvl + ":" + bg;
                found = utils.gotoAnchor(anchor, true); // check if target exists
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
     * function wipeColors
     * remove all coloring + class from linenrs of greekframe / butlerframe
     * @param targets: array // of arrays of <a> elements
     */
    function wipeColors(targets) { // targets = [jbNS.greekanchors, jbNS.butleranchors]

        function removeColor(arr) {
            function wipeItem(i, val) {
                let $item = $(val);
                if ($item.hasClass("colored")) {
                    $item.css(
                        {
                            color: "",
                            "background-color": ""
                        }
                    ).removeClass("colored");
                }
            }

            arr.each(wipeItem);
        }

        targets.forEach(removeColor);
    }

    /**
     * function colorGreekLineNrs
     * color linenrs of greek & butler lines bg..nd with 'colors'
     * @param colors : object {fcolor,bcolor}
     * @param bg : string //"bgchap.bgline"
     * @param nd : string //"endchap.endline"
     */
    function colorGreekLineNrs(colors, bg, nd) //colors: object{fcolor,bcolor}; bg: bgchap.bgline nd:endchap.endline
    {
        var gr_endline, bu_endline, gr_beginline, bu_beginline, $all;

        gr_beginline = bm_greek_search(bg, false, 2);
        gr_endline = bm_greek_search(nd, false, 2);
        bu_beginline = bm_butler_search(bg, 1);
        bu_endline = bm_butler_search(nd, 2); //don't include the endline
        if (gr_endline < 0) { // up to the end
            $all = jbNS.greekanchors.slice(gr_beginline).add(jbNS.butleranchors.slice(bu_beginline));
        } else {
            $all = jbNS.greekanchors.slice(gr_beginline, gr_endline).add(jbNS.butleranchors.slice(bu_beginline, bu_endline + 1));
        }

        if (jbNS.greekanchors.eq(gr_beginline).hasClass("colored")) {
            $all.removeClass("colored").css({
                "color": "",
                "background-color": ""
            });
        } else {
            $all.addClass("colored").css({
                "color": colors.fcolor,
                "background-color": colors.bcolor
            });
        }
    }

    /**
     * function selectTextSection
     * clicked on text <span> in treeframe; color greek & butler lines of that section the same colors.
     * or scroll textframe to anchor whose name contains this linenr
     * @param $orig : object // element where mouse event originates
     */
    function selectTextSection($orig) { // source: tree_handleMouseEvents() on text part

        const ids = utils.element2lineIDs($orig.prev("span"));

        let colors = {};
        colors.bcolor = $orig.css("backgroundColor");
        colors.fcolor = $orig.css("color");
        showAndGotoAnyLine(`${jbNS.prefixes[jbNS.columns_config[1] - 1]} ${ids.beginning}`);
        if (!(parseInt(utils.rgb2hex(colors.bcolor), 16) === 0)) {
            colorGreekLineNrs(colors, ids.beginning, ids.last);
        } // "uncolored" thema's have a 000000 bgcolor
    }

    //endregion
    //region load content

    /**
     * function fetchTexts
     * fetch greek/butler texts acc. to columns_config
     * @param fileindex : number // index to filenames array
     */
    function fetchTexts(fileindex) {
        let deferred = $.Deferred();
        let filestogo = 2; //nr of files to load

        /**
         * function iFrameLoad
         * deferred load an iframe (greek/butler) and return a promise (so a callback can be called after loading )
         * @param id : string // #id of iframe
         * @param src : string //url
         * @returns {*}
         */
        function iFrameLoad(id, src) {
            $.ajax({
                type: "GET",
                datatype: "text",
                url: "getmtime.php?file=" + src, //get filename (with modified-date built in)
            }).done(function (result) {
                let iframe = document.getElementById(id),
                    dfd = $.Deferred();
                iframe.src = result;
                $(iframe).load(dfd.resolve);
                dfd.done(function () {
                    if (--filestogo === 0) {
                        deferred.resolve();
                    }
                });
            }); // end iframeload
        }

        function done_loading() { //what to do after both frames have been loaded:
            jbNS.columns_config[1] = fileindex + 1;
            setColumns();
            jbNS.store_greek[fileindex] = jbNS.greekframe.contents().find("#greektext");
            jbNS.store_butler[fileindex] = jbNS.butlerframe.contents().find("#butlertext");
            jbNS.already_loaded[fileindex] = true;
            jbNS.butleranchors = jbNS.butlerframe.contents().find("a");
            jbNS.greekanchors = jbNS.greekframe.contents().find("a"); //collect anchors (linenumbers)

            $("#selonly").text("Show only selection");

            putbackBookmarks(true); // false = butler, true = greek
            //putbackBookmarks(false); // false = butler, true = greek
            $("#greekframe,#butlerframe").contents().find("body").on({
                //"touchhold": gr_bu_hold,
                "mousedown": gr_bu_MouseDown,
                "touchmove": function () {
                    jbNS.touchcancel = true;
                }
            });
            if (window.parent.site100oxen.untouchable) {
                createSplitter();
            }
            if (!jbNS.bm_to_goto) {
                scrollgreek();
                let begin = get_beginLine();

                if (jbNS.butleranchors.length) {
                    butlerGotoBM(jbNS.butleranchors[begin].textContent);
                }
            } else {
                goto_BM_on_load();
            }
        }

        /*****************/
        if (jbNS.already_loaded[fileindex]) {
            jbNS.greekframe.contents().find("#greektext").replaceWith(jbNS.store_greek[fileindex]);
            jbNS.butlerframe.contents().find("#butlertext").replaceWith(jbNS.store_butler[fileindex]);
            done_loading();
        } else {
            iFrameLoad("greekframe", jbNS.filenames[1][fileindex]);
            iFrameLoad("butlerframe", jbNS.filenames[2][fileindex]);
            deferred.done(function () {
                done_loading();
            });
        }
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
            if (site100oxen.untouchable) {
                jbNS.treeframe.getNiceScroll().resize();
            }
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
            wcurr, w1, w2,
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
        colwidth = scr / 60;
        switch (colnum) {
            case 1:
                w1 = 60 * colwidth;
                break;
            case 2:
                if (jbNS.columns_config[0]) {
                    w1 = 40 * colwidth;
                    w2 = 20 * colwidth;
                } else {
                    w1 = w2 = 30 * colwidth;
                }
                break;
            case 3:
                if (jbNS.columns_config[0]) {
                    w1 = 30 * colwidth;
                    w2 = 15 * colwidth;
                } else {
                    w1 = w2 = 20 * colwidth;
                }
                break;
            case 4:
                if (jbNS.columns_config[0]) {
                    w1 = 24 * colwidth;
                    w2 = 12 * colwidth;
                } else {
                    w1 = w2 = 15 * colwidth;
                }
                break;
        }
        w1 -= 8;
        w2 -= 8;
        if (doresize) {
            wcurr = w1;
        } else {
            wcurr = jbNS.width[col_ix];
        }
        if (col1 === 1) {
            jbNS.treeframe.width(wcurr);
            jbNS.treeframe.show();
            const iframe = jbNS.pageframe[0];
            iframe.contentWindow.document.open();
            iframe.contentWindow.document.write("");
            iframe.contentWindow.document.close();
            col_ix++;
        } else if (col1 === 2) {
            jbNS.pageframe.width(wcurr);
            jbNS.pageframe.show();
            col_ix++;
        }
        //greekframe - butlerframe
        jbNS.greekframe.hide();
        jbNS.butlerframe.hide();
        left2 = col1 ? colwidth + 8 : 0;
        if (col2 && which) {
            wcurr = doresize ? w2 : jbNS.width[col_ix];
            if (which & 1) {
                jbNS.greekframe.width(wcurr);
                jbNS.greekframe.show();
                col_ix++;
            }
            wcurr = doresize ? w2 : jbNS.width[col_ix];
            if (which & 2) {
                jbNS.butlerframe.width(wcurr);
                jbNS.butlerframe.show();
                col_ix++;
            }
        }
        // textframe
        left4 = left2 + (col2 && (((which & 1) ? w2 + 8 : 0) + ((which & 2) ? w2 + 8 : 0)));
        col4 = jbNS.columns_config[3];
        jbNS.textframe.hide();
        wcurr = doresize ? w2 : jbNS.width[col_ix];
        if (col4) {
            if (doresize) {
                jbNS.textframe.css("left", left4);
            }
            jbNS.textframe.width(wcurr);
            jbNS.textframe.show();
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

    // function growLeftColumn() {
    //     utils.myAlert("right");
    //     resizeLeftColumn(jbNS.colResizeStep);
    //     return true;
    // }
    //
    // function shrinkLeftColumn() {
    //     utils.myAlert("left");
    //     resizeLeftColumn(-jbNS.colResizeStep);
    //     return true;
    // }

    /**
     * function switchColMousedown
     * event handler: mousedown on top-of-screen 'pop-down' menu.  on 'pages' > 1/2 sec. : show popup menu
     * @param event
     */
    function switchColMousedown(event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        const $trg = $(event.target);
        if ($trg.is("nav") || $trg.is("ul")) {
            swcol_up();
            return;
        }
        const $par = $trg.parents("li");
        const ix = $trg.index(); // content button index 0-1, but 0-3 if colnr == 1
        const colnr = $par.index(); // column index: 0=list/page, 1=Il,Od,Theo,WD 2=gr/transl 3=expl/? NOTE:colnr - 1 if left & right btns
        // button clicked: show/hide/switch pages or texts
        if (colnr > 0) {// button clicked: show/hide/switch pages or texts
            storeExpansionstate();
            localStorage.setItem("scrollpos", jbNS.beginLine.toString());
            const doload = jbNS.columns_config[1] - 1;
            if (colnr === 1 && ix !== doload) {
                configColumns(1, ix + 1, false); //-1
                if (ix < 2) {
                    getXML(jbNS.xml_names[ix]).done(() => {
                        init_tree();
                    });
                }
                if (ix !== doload) {
                    fetchTexts(ix); // fetch greek & butler texts
                    $("#archaic").text("Archaic Greek");
                }
            }
            if (colnr === 2) {
                configColumns(2, ix + 1, false); //-1
                if (!jbNS.bm_to_goto) {
                    jbNS.bm_to_goto = jbNS.greekanchors[get_beginLine()].textContent;
                }
                goto_BM_on_load();
            } else {
                jbNS.bm_to_goto = "";
            }
            if (colnr === 3) {
                configColumns(3, ix + 1, false); //-1
                jbNS.textframe[0].src = jbNS.filenames[3][ix];
            }
        } else if (!$trg.is(".switch")) { // pages in/out
            switch (jbNS.columns_config[0]) {
                case 0:
                    configColumns(0, ix + 1, true); // show the column, treeframe or page
                    break;
                case 1:
                    if (ix === 0) {
                        configColumns(0, 0, true); // hide treeframe
                    } else {
                        jbNS.pageframe[0].src = site100oxen.currentPage;
                        configColumns(0, 2, true); // show page
                    }
                    break;
                case 2:
                    if (ix === 1) {
                        if (site100oxen.currentPage !== 'sitemap.php') {
                            jbNS.pageframe[0].src = 'sitemap.php';
                            site100oxen.currentPage = 'sitemap.php';
                            configColumns(0, 2, true);
                        } else {
                            configColumns(0, 0, true);
                        }
                    } else {
                        configColumns(0, 1, true);
                    }
                    break;
            }
        }
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
        event.stopImmediatePropagation();
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
    function configColumns(colnr, ix, notoggle) //colnr, index of buttons,
    // notoggle=true: set, don't toggle
    {	// NB: index has 1 added so [0] can be 'none'
        let language_choice = 0, $allbuttons;
        if (typeof ix === "undefined") {
            return jbNS.columns_config[colnr];
        }
        $allbuttons = $(".switch").eq(colnr).find("li");
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
        // const s = jbNS.columns_config.toString();
        // localStorage.setItem("colconf", s);

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
            jbNS.dontSetColumns = false;
            return jbNS.columns_config[colnr];
        }
        jbNS.dontSetColumns = false;
        setColumns(); //width, display
        if (window.parent.site100oxen.untouchable) {
            createSplitter();
        }
        if (colnr === 0 && ix === 0) {
            scrolltree(jbNS.treetop_el_index);
        }
        return jbNS.columns_config[colnr];
    }

    function get_col_config(n) {
        return jbNS.columns_config[n];
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
        relwidth = Math.round(window.innerWidth / size);
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
     * function setExpansionstate
     * read expansion state of treeframe by loading string from localstorage
     * 0 : collapse OL element, 1 : expand it.
     */
    function setExpansionstate() { // jbNS.OL_level[] must be created already
        let t;
        jbNS.exp_state = localStorage.getItem(get_exp_state_name()) || "11";
        for (t = 0; t < jbNS.OL_level.length; t += 1) {
            if (t < jbNS.exp_state.length && jbNS.exp_state[t] === "1") {
                jbNS.OL_level[t].style.display = "";
            } else {
                jbNS.OL_level[t].style.display = "none";
            }
        }
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
        let nm = get_exp_state_name();
        localStorage.setItem(nm, jbNS.exp_state);
        localStorage.setItem(nm + "_lvl", jbNS.currentLevel);
    }

    function get_exp_state_name() {
        let exptxt = "il_exp";
        switch (jbNS.columns_config[1]) {
            case 1:
                exptxt = "il_exp";
                break;
            case 2:
                exptxt = "od_exp";
                break;
            case 3:
                exptxt = "il_exp";
                break;
            case 4:
                exptxt = "il_exp";
                break;
        }
        return exptxt;
    }

    function doReset() {
        jbNS.forcereload = true;
        localStorage.clear();
        sessionStorage.clear();
        setTimeout(function () {
            //document.getElementById("reload").submit();
            window.location.reload(true);
        }, 0);
    }

    /**
     * function savePageState
     * save column config, bookmarks, scroll state, tree config to localStorage
     */
    function savePageState() {
        let s;
        if (jbNS.forcereload) {
            return;
        }
        //1: save column config
        store_colconf_to_locstor();
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
        //7: save scroll positions
        s = jbNS.beginLine.toString();
        localStorage.setItem("scrollpos", s);
        localStorage.setItem("treetop", jbNS.treetop_el_index);
    }

    function get_colconf_from_locstor() {
        const s = localStorage.getItem("colconf") || "1,1,3,0";
        const arr = s.split(",");
        for (let i = 0; i < 4; ++i) {
            jbNS.columns_config[i] = parseInt(arr[i]);
        }
    }

    function store_colconf_to_locstor() {
        const s = jbNS.columns_config.toString();
        localStorage.setItem("colconf", s);
    }

    /**
     * function loadPageState
     * load bookmarks, scroll state, tree config from localStorage
     * columns config loaded separately, has to be set here
     */
    function loadPageState() {
        let s, i, tf, fs = 16;
        jbNS.keepFontsize = localStorage.getItem("keepfontsize") === "1";
        jbNS.basic_fontsize = fs; //can be set different
        if (window.location.href !== parent.location.href) { // if the page is loaded outside index.php
            jbNS.keepFontsize = false;
        }
        if (jbNS.keepFontsize) {
            jbNS.basic_fontsize = parseInt(localStorage.getItem("fontsize")) || fs;
        }
        $("#keepfs")[0].checked = !jbNS.keepFontsize; //"auto"
        zoominout();

        tf = jbNS.columns_config[3];
        if (tf) {
            jbNS.textframe[0].src = jbNS.filenames[3][tf - 1];
        }
        for (i = 0; i < 4; ++i) { // set switchactive (red color)
            jbNS.dontSetColumns = true; //this works only for 1 call
            configColumns(i, jbNS.columns_config[i], true);
        }
        s = localStorage.getItem("bookmarks") || "---Il:--,---Od:--,---Th:--,---WD:--";
        read_in_Bookmarx(s);
        fetchTexts(jbNS.columns_config[1] - 1);
        //let s2 = jbNS.columns_config.toString();
        doResize();
        jbNS.treetop_el_index = parseInt(localStorage.getItem("treetop")) || 0;
        jbNS.currentLevel = parseInt(localStorage.getItem(get_exp_state_name() + "_lvl")) || 1;
        //setHeaderContents(jbNS.basic_fontsize);
        loadNotes();
        s = localStorage.getItem("splash") || "";
        if (s !== "hide") {
            $("#splash").show();
        } else {
            $("#splash").hide();
        }
        // if (localStorage.getItem("messages") === $("#messages span").text()
        //     && localStorage.getItem("showmsg") === "false") {
        $("#messages").hide();
        // } else {
        //     localStorage.setItem("showmsg", "true");
        //     $("#messages").show();
        // }
        setSelButtonText();
        site100oxen.currentPage = localStorage.getItem("currentpage") || "sitemap.php";
        jbNS.pageframe[0].src = site100oxen.currentPage;
        let s1 = localStorage.getItem("scrollpos") || "0,0,0,0";
        let arr1 = s1.split(",");
        for (let i = 0; i < 4; ++i) {
            jbNS.beginLine[i] = parseInt(arr1[i]);
        }
    }

    function init_tree() {
        utils.createTreeFromXML(window.parent.site100oxen.XML.firstChild, 'list');
        /* initialize */
        jbNS.OL_level = jbNS.treeframe.find('ol');
        jbNS.LI_elements = jbNS.treeframe.find('li');
        jbNS.treeframe.find(".ln").on({
            "mousedown": lineIDmousedown
        });
        setExpansionstate();
        utils.check_expansion("list");
        if (jbNS.treetop_el_index > 0) {
            scrolltree(jbNS.treetop_el_index);
        } else {
            $('#treeframe').scrollTop(0);

        }
    }

    function doResize() {
        let li;
        li = $("#col4").find("li");
        if (window.innerWidth < 500) {
            li.eq(0).text("expl");
            $("#switchColumns").css("fontSize", "90%");
            $("#switchColumns ul li").css("margin", "0");
        } else {
            li.eq(0).text("explanation");
            $("#switchColumns").css("fontSize", "110%");
            $("#switchColumns ul li").css("margin", "0 0.5rem");
        }
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
            $(document).on("mousemove touchmove", function (e) {
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
    //region bound event handlers
    $("#hiddendiv").on({
        "click": function () {
            setTimeout(function () {
                $("#hiddendiv").hide();
            }, 500);
            return true;
        }
    });
    $("#switchColumns").on({
        "mousedown touchstart": switchColMousedown
    });
    $("#bm_nav").on({
        "click": swcol_up
    });
    $("body").on({
        "keyup": tree_handleKey,
        "click": tree_handleMouseEvents
    });
    $(window).on({
        "resize": function () {
            doResize();
            zoominout();
            jbNS.oldcolnum = -1;
            setColumns();
            adjustColWidth();
            scrollgreek();
        },
        "beforeunload": function () {
            savePageState();
            jbNS = null;
            window.parent.site100oxen = null;
        },
        "blur": function () {
            savePageState();
        },
        "visibilityChange": function () {
            if (document.visibilityState === "hidden") {
                savePageState();
            }
        }
    });
    $("iframe").on({
        "load": function () {
            try {
                const diff = jbNS.keepFontsize ? 0 : calcFontsizeDiff();
                $(this).contents().find("html").css("font-size",
                    (jbNS.basic_fontsize - diff) + "px");
            } catch (ignore) {
            }
            const frame = $("#pageframe").contents();
            const hash = frame.get(0).location.hash;
            if (hash !== "") {
                frame.scrollTop(frame.find(hash)[0].offsetTop);
            }
        }
    });
    /* menu clicks */
    // if (!window.parent.site100oxen.untouchable) {
    //     $(window, ".viewport").on("swipeleft", shrinkLeftColumn);
    //     $(window, ".viewport").on("swiperight", growLeftColumn);
    // }
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
    $("#archaic").click(switchArchaicFont);
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
    // $("#goback").click(function (event) {
    //     let tmp;
    //     event.stopImmediatePropagation();
    //     tmp = jbNS.gr_beginLine;
    //     jbNS.gr_beginLine = jbNS.gr_previousLine;
    //     jbNS.gr_previousLine = tmp;
    //     scrollgreek();
    // });
    $("#to_pad").click(function () {
        $("#shownotes").trigger("click");
        let m = "!BM\n" + jbNS.bookMarx[0].join('\n') + '\n';
        m += jbNS.bookMarx[1].join('\n') + '\n';
        m += jbNS.bookMarx[2].join('\n') + '\n';
        m += jbNS.bookMarx[3].join('\n') + '\n';
        $("#notes")[0].value = m;
    });
    $("#from_pad").click(function (event) {
        let s, arr;
        event.stopImmediatePropagation();
        //$("#shownotes").trigger("click");
        arr = $("#notes")[0].value.split("\n");
        s = arr.join(",");
        read_in_Bookmarx(s);
        putbackBookmarks(true);
    });
    $(".btn1 ul li").on({
        "click": function () {
            //event.stopImmediatePropagation();
            //utils.myAlert("notok", false);
            $(".btn1 ul").hide();
        }
    });
    $("#colwrap, #topdiv").on({
        "click": function () {
            $(".btn1 ul").hide(); // event is not caught, falls through to here
        }
    });
    $("#showcolnav, #showbmnav").click(function (event) {
        $(".btn1 > ul").not($(this).parent().children("ul")).hide();
        swcol_down(event);
    });
    $(".btn1").on({
        "mouseenter": function (e) { //correct menu position when screen is too narrow //tap?
            let pos, b;
            let menu = $(this).find("ul").eq(0);
            menu.show().addClass("menuActive");
            e.stopImmediatePropagation();
            if ($(e.target).is("#tools")) {
                pos = $(menu).position();
                b = $("body").width();
                if (pos.left + menu.width() > b) {
                    menu.css({left: b - menu.width()});
                } else {
                    menu.css({left: $("#tools").last().position().left});
                }
            }
        },
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
        }
    });
    $("#tools, #select").on({
        "click": function (e) {
            $(this).parent().children("ul").css({"display": "block"});
            //utils.myAlert("click");
            e.stopImmediatePropagation();
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
            setTimeout(function () {
                change_textinput();
                setSelButtonText();
            }, 100);
        }, //delay because "paste" fires before the text is entered
        "click": function (event) {
            event.preventDefault();
            return false;
        },
        "dblclick": no_diacritics,

        "keydown": change_textinput
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
        showAlphabet(true);
    });
    $("#alphabetdiv").drags().find(".divhdr").on("click", function () {
        showAlphabet(false);
    });
    $("#tr1").find("td").on({
        "mouseup": function () {
            enterInput($(this).text(), $("#notes:visible").length ? $("#notes")[0] : $("#textinput")[0], false);
        }
    });
    $("#savestate").click(savePageState);
    $("#loadstate").click(function () {
        getXML(jbNS.xml_names[jbNS.columns_config[1] - 1]).done(() => { //xml load what is in localStorage or iliad.xml
            get_colconf_from_locstor();
            init_all();
        })
            .fail((msg) => {
                utils.myAlert(msg, true);
            });
    });
    $("#beta, #betaswitch").on({
        "click": betaclick,
        "dblclick": no_diacritics
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
        const adr = getMailAdr();
        if (adr === "") {
            utils.myAlert("no email address! Type 'mailto:[adr] in search box", false);
        } else {
            $(location).attr('href', 'mailto:' + getMailAdr() + '?subject=' +
                encodeURIComponent("homepage note") +
                "&body=" +
                encodeURIComponent($("#notes")[0].value)
            );
        }
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
        jbNS.pageframe[0].src = 'editor.php';
        site100oxen.currentPage = 'editor.php';
        configColumns(0, 2, true);
    });
    $("#clearcolors").click(function () {
        wipeColors([jbNS.greekanchors, jbNS.butleranchors]);
    });
    $("#savefile").click(saveBlob);
    $("#loadfile").click(loadFileAsText);
    $("#messages button").click(function () {
        $("#messages").slideUp(600);
        localStorage.setItem("showmsg", "false");
        localStorage.setItem("messages", $("#messages span").text());
    });
    $("#struct_header").click(function () {
        if (!jbNS.pageframe[0].src.includes("blocks.php")) {
            jbNS.pageframe[0].src = "blocks.php";
        }
        configColumns(0, 2, false);
    });
    $("#plus").click(function (e) {
        if (jbNS.currentLevel < 9) {
            jbNS.currentLevel += 1;
        }
        utils.expand("list", jbNS.currentLevel, false);
        e.preventDefault();
    });
    $("#min").click(function (e) {
        if (jbNS.currentLevel > 1) {
            jbNS.currentLevel -= 1;
        }
        utils.expand("list", jbNS.currentLevel, false);
        e.preventDefault();
    });

    //endregion
    //region Ajax get xml
    function getXML(filename) {
        if (!filename) {
            filename = localStorage.getItem('textToLoad');
            if (!filename) {
                filename = 'iliad.xml';
            }
        }
        if (!localStorage.getItem(`${filename}.txt`)) {
            localStorage.setItem(filename, "");
        }
        let fileindex = jbNS.xml_names.indexOf(filename);
        let dfr = $.Deferred();
        if (jbNS.fileindex === fileindex) {
            dfr.resolve();
            return dfr.promise();
        } else {
            jbNS.fileindex = fileindex;
        }

        if (fileindex < 0) {
            utils.myAlert(`unknown filename ${filename}`, true);
            dfr.reject();
            return dfr.promise();
        } else {
            jbNS.columns_config[1] = fileindex + 1;
        }
        localStorage.setItem('textToLoad', filename);
        jbNS.newXML = true;
        $.ajax({
            type: "HEAD",
            async: true,
            cache: false,
            url: filename,
        }).done(function (message, textStatus, jqXHR) {
            const resp = jqXHR.getAllResponseHeaders();
            const etag = resp.match(/etag: "(.*)"/i);
            const here = localStorage.getItem(filename);
            if (here && here === etag[1]) {
                jbNS.newXML = false;
            }
            if (jbNS.newXML) {
                localStorage.setItem(filename, etag[1]);
                $.ajax({
                    type: "GET",
                    url: filename,
                    cache: false,
                    dataType: "text",
                    success: function (xmlstring) {
                        localStorage.setItem(`${filename}.txt`, xmlstring);
                        try {
                            window.parent.site100oxen.XML = $.parseXML(xmlstring);
                            if (fileindex === 0) {
                                window.parent.site100oxen.ilXML = window.parent.site100oxen.XML;
                            } else if (fileindex === 1) {
                                window.parent.site100oxen.odXML = window.parent.site100oxen.XML;
                            }
                        } catch (e) {
                            dfr.reject(e);
                        }
                        dfr.resolve();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //window.parent.site100oxen.xml_loaded = false;
                        dfr.reject(`can't load ${filename}; ${textStatus}; ${errorThrown}`);
                    }
                });
            } else {
                if (fileindex === 0) {
                    const temp = window.parent.site100oxen.ilXML;
                    if (temp !== null) {
                        window.parent.site100oxen.XML = temp;
                        dfr.resolve();
                        return dfr.promise();
                    }
                } else if (fileindex === 1) {
                    const temp = window.parent.site100oxen.odXML;
                    if (temp !== null) {
                        window.parent.site100oxen.XML = temp;
                        dfr.resolve();
                        return dfr.promise();
                    }
                }
                const xml = localStorage.getItem(`${filename}.txt`);
                if (!xml) {
                    utils.myAlert("please do full reset", true);
                    return;
                }
                window.parent.site100oxen.XML = $.parseXML(xml);
                if (fileindex === 0) { // save a ref
                    window.parent.site100oxen.ilXML = window.parent.site100oxen.XML;
                } else if (fileindex === 1) {
                    window.parent.site100oxen.odXML = window.parent.site100oxen.XML;
                }
                dfr.resolve();
            }
            $.ajax({
                type: "POST",
                url: 'xml_modified.php',
                dataType: 'text',
                data: {data: filename},
                success: function (txt) {
                    $("#mtime").text(txt);
                }
            });

        }).fail((xhr) => {
            utils.myAlert(`${xhr.status} ${xhr.statusText}`, true);
        });
        return dfr.promise();
    }

    //endregion
    //region active part

    function init_all() {
        jbNS.forcereload = false;
        //window.parent.site100oxen.xml_loaded = true;
        init_tree();
        window.parent.site100oxen.untouchable = // are we on a touch device?
            !(('ontouchstart' in window) || (navigator.maxTouchPoints > 0));
        if (window.parent.site100oxen.untouchable) {
            jbNS.treeframe.niceScroll({
                cursorcolor: "#888",
                cursorwidth: "7px",
                background: "rgba(0,0,0,0.1)",
                cursoropacitymin: 0.2,
                hidecursordelay: 0,
                zindex: 2,
                horizrailenabled: true
            });
        }
        loadPageState(); // from localStorage if possible

    }

    // set globals
    window.parent.site100oxen.showAndGotoAnyLine = showAndGotoAnyLine;
    window.parent.site100oxen.init_tree = init_tree;
    window.parent.site100oxen.configColumns = configColumns;
    window.parent.site100oxen.set_beginLine = set_beginLine;
    window.parent.site100oxen.get_col_config = get_col_config;
    window.parent.site100oxen.loadAndGotoTextframeAnchor = loadAndGotoTextframeAnchor;

    getXML().done(() => { //xml load what is in localStorage or iliad.xml
        get_colconf_from_locstor();
        init_all();
    })
        .fail((msg) => {
            utils.myAlert(msg, true);
        });
    //endregion

})(jQuery);
