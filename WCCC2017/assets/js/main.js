'use strict';

//start the script
$(document).ready(function () {

    //set up the navigation bar
    var navBars = $('.nav-bar');
    for (var i = 0; i < navBars.length; i++) {
        var bar = new NavBar(navBars[i]);
    }
});