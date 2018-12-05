/**
 * Created by jeroen on 17/02/2017.
 * this goes into files, loaded into pageframe
 */
'use strict';
$(document).ready(function () {

    const untouchable = !(('ontouchstart' in window) || (navigator.maxTouchPoints > 0));

    if (untouchable) {
        $("html").niceScroll({
            cursorcolor: "#888",
            cursorwidth: "7px",
            background: "rgba(0,0,0,0.1)",
            cursoropacitymin: 0.2,
            hidecursordelay: 0,
            zindex: 2,
            horizrailenabled: true
        });
    }

    function accordionclick(event) {
        let button, panel;

        event.stopImmediatePropagation();
        button = event.target;
        button.classList.toggle("active");
        panel = $(button).next(".panel");
        if (panel) {
            if (panel[0].style.maxHeight) {
                panel[0].style.maxHeight = null;
            } else {
                panel[0].style.maxHeight = panel[0].scrollHeight + "px";
            }
        }
        if (untouchable) {
            setTimeout(function () { //wait for transition!
                $("html").getNiceScroll().resize();
            }, 500);
        }
    }

    $("body").on("mouseup touchend", function () {
        let doc, range, txt, bg, nd, ok, txtID, count, sel;
        function isNumberOrDot(c) {
            return ((c >= "0" && c <= "9") || c === ".");
        }

        if (event.view.name === "pageframe") {
            doc = parent.document.getElementById("pageframe");
        } else if (event.view.name === "textframe") {
            doc = parent.document.getElementById("textframe");
        }
        sel = doc.contentWindow.getSelection();
        if (sel && sel.rangeCount > 0) {
            range = sel.getRangeAt(0);
        } else {
            return;
        }
        bg = range.startOffset;
        nd = range.endOffset;
        txt = range.commonAncestorContainer.data; //element text excluding any child elements
        ok = false;
        count = 0;
        //linenr: xx nn.nnn
        while (!isNumberOrDot(txt[nd])) { //clicked left of nn.nnn
            count += 1;
            nd += 1;
            bg = nd;
            if (count > 3) {
                return;
            } // 3 letters: xx space. these are oprional
        }
        while (isNumberOrDot(txt[nd])) {
            ok = true;
            nd += 1;
        } //clicked on nn.nnn
        if (ok) {
            ok = false;
            while (bg > 0 && isNumberOrDot(txt[bg])) {
                ok = true;
                bg -= 1;
            }
        } else {
            return;
        }

        if (ok) {
            bg -= 2;
        } else {
            return;
        }
        txt = txt.substring(bg, nd);
        txtID = txt.substr(0, 2).toLowerCase();
        if (!(txtID === "il" || txtID === "od" || txtID === "wd" || txtID === "th")) {
            txt = txt.substr(3);
        }
        if (txt.length > 1) {
            parent.site100oxen.showAndGotoAnyLine(txt, true);
        }
    });

    $(".textlink").on({
        "click": function (event) {
            //event.preventDefault();
            let href = event.target.href;
            const fname = href.split("/").pop();
            parent.site100oxen.getNewIframeFile(fname, "pageframe");
            return false;
        }
    });

    $(".accordion, .citation .cithead").on("click tap", accordionclick);

    /* footnotes */
    const FOOTNOTE_REGEX = /^\([0-9]+\)$/;
    const REFERENCE_REGEX = /^\[[0-9]+\]$/;

    let oldOnLoad = window.onload;
    window.onload = function (event) {
        if (document.getElementsByClassName) {
            const elems = document.getElementsByClassName("ptr");
            for (let i = 0; i<elems.length; i++) {
                const elem = elems[i];
                let ptrText = elem.innerHTML;
                if (FOOTNOTE_REGEX.test(ptrText)) {
                    elem.className = "ptr footptr";
                    elem.onclick = toggle;
                } else if (REFERENCE_REGEX.test(ptrText)) {
                    elem.className = "ptr refptr";
                }
                elem.setAttribute("href", "#"+ptrText);
            }
            addListItemIds("references", "[", "]");
            addListItemIds("footnotes", "(", ")");
        }

        if (typeof oldOnLoad === "function") {
            oldOnLoad(event);
        }
    };

    function addListItemIds(parentId, before, after) {
        const refs = document.getElementById(parentId);
        if (refs && refs.getElementsByTagName) {
            const elems = refs.getElementsByTagName("li");
            for (let i = 0; i<elems.length; i++) {
                elems[i].setAttribute("id", before+(i+1)+after);
            }
        }
    }

    let currentDiv = null;
    let currentId = null;
    function toggle(event) {
        const parent = this.parentNode;
        if (currentDiv) {
            parent.removeChild(currentDiv);
            currentDiv = null;
        }
        const footnoteId = this.innerHTML;
        if (currentId === footnoteId) {
            currentId = null;
        } else {
            currentId = footnoteId;
            currentDiv = document.createElement("div");
            currentDiv.innerHTML = document.getElementById(footnoteId).innerHTML;
            currentDiv.className = "foot-tooltip";
            parent.insertBefore(currentDiv, this.nextSibling);
            setTimeout(function () {
                currentDiv.style.opacity = "1";
            }, 0);
        }
        event.preventDefault();
    }

});
