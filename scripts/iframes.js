/**
 * Created by jeroen on 17/02/2017.
 * this goes into files, loaded into pageframe
 */
'use strict';
var untouchable;

function accordionclick(event) {
    var button, panel;

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
        $("html").getNiceScroll().resize();
    }
}

$(document).ready(function () {
    var i, acc;

    untouchable = !(('ontouchstart' in window) ||  window.DocumentTouch);
        //(navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0)); //we're on a tablet or phone

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

    $("body").on("mouseup touchend", function (e) {
        parent.site100oxen.iframe_mouseup(e);
    });

    $(".showlist").click(function () {
        parent.show_list();
    });

    acc = document.getElementsByClassName("accordion");

    for (i = 0; i < acc.length; i++) {
        $(acc[i]).on("click tap", accordionclick);
    }
});
