import * as utils from '../scripts/myUtils.js';
/**
 * Created by jeroen on 17/02/2017.
 * this goes into files, loaded into pageframe
 */
'use strict';

function accordionclick(event) {
    var button, panel;

    //event.stopImmediatePropagation();
    button = event.target;
    button.classList.toggle("active");
    panel = $(button).next(".panel");
    if (panel) {
        if (panel[0].style.maxHeight) {
            panel[0].style.maxHeight = null;
            panel[0].style.height = null;
        } else {
            panel[0].style.maxHeight = panel[0].scrollHeight + "px";
            panel[0].style.height = panel[0].style.maxHeight;
        }
    }
    if (parent.site100oxen.untouchable) {
        setTimeout(function () { //wait for transition?
            $("html").getNiceScroll().resize();
        }, 500);

    }
}

$(document).ready(function () {
    let acc, frags;


    if (parent.site100oxen.untouchable) {
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

    $("body").on("mouseup touchend", function (e) {
        parent.site100oxen.iframe_mouseup(e);
    });

    //acc = document.getElementsByClassName("accordion");

    $(".accordion, .citation .cithead").on("click tap", accordionclick);

    frags = $(".treefragment");
    if(frags.length){
        frags.each(function (i, el) {
            const lnr = "" + $(el).data("lnr"); //the data is a number!
            const title = $(el).data("title");
            const lvl = $(el).data("lvl");
            let node = utils.find_xml_node(parent.site100oxen.XML, lnr, title);
            utils.createTreeFromXML(node, "frag");
            utils.setnodeattributes("frag");
            utils.expand("frag", 1, false);
        });
    }
});
