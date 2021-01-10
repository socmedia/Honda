/*
Template Name: Admin Template
Author: Wrappixel

File: js
*/
// ==============================================================
// Auto select left navbar
// ==============================================================
$(function () {
    "use strict";
    var url = window.location + "";
    var path = url.replace(window.location.protocol + "//" + window.location.host + "/", "");
    var element = $('ul#sidebarnav a').filter(function () {
        return this.href === url || this.href === path; // || url.href.indexOf(this.href) === 0;
    });

    $('#sidebarnav >li >a.has-arrow').on('click', function (e) {
        e.preventDefault();
    });

});
