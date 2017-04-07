'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var NavBar = function () {
    function NavBar(element) {
        _classCallCheck(this, NavBar);

        this.nav = element;
        this.menuItems = $(element).find('nav > ul > li > a');
        this.currentMenuItem = null;
        this.navBarHighlighter = $(element).find('.nav-bar-highlighter')[0];
        this.updateMenuItemToCurrentPage();
        this.setupOnHover();
    }

    _createClass(NavBar, [{
        key: 'menuItemHovered',
        value: function menuItemHovered(menuItem) {
            var width = $(menuItem).width();
            var outerWidth = $(menuItem).outerWidth();
            var difference = outerWidth - width;
            var firstMenuItemOffset = $(this.menuItems[0]).offset().left;
            var menuItemOffset = $(menuItem).offset().left + difference / 2;
            var relativeOffset = menuItemOffset - firstMenuItemOffset;
            $(this.navBarHighlighter).css({ 'left': relativeOffset, 'width': width });
        }

        //event handlers

    }, {
        key: 'setupOnHover',
        value: function setupOnHover() {
            var _this = this;

            $(this.menuItems).hover(function (event) {
                _this.menuItemHovered(event.target);
            });
            $(this.menuItems).mouseleave(function () {
                _this.updateMenuItemToCurrentPage();
            });
        }
    }, {
        key: 'getMenuItemForCurrentPage',
        value: function getMenuItemForCurrentPage() {
            if (this.currentMenuItem === null) {
                var currPath = document.location.pathname;
                var pathPieces = currPath.split('/');
                if (pathPieces.length == 0 || pathPieces[pathPieces.length - 1].search('index') !== -1) {
                    currPath = 'index'; //if it's just a slash, we want the home page
                } else {
                    if (pathPieces.length > 2 && pathPieces[pathPieces.length - 1] === "") {
                        currPath = pathPieces[pathPieces.length - 2];
                    } else {
                        currPath = pathPieces[pathPieces.length - 1];
                    }
                }

                for (var i = 0; i < this.menuItems.length; i++) {
                    var menuItemPath = $(this.menuItems[i]).attr('href');

                    //if the current path is within the link of the menu item
                    if (menuItemPath.search(currPath) !== -1) {
                        this.currentMenuItem = this.menuItems[i];
                        return this.menuItems[i];
                    }
                }
            } else {
                return this.currentMenuItem;
            }
        }
    }, {
        key: 'updateMenuItemToCurrentPage',
        value: function updateMenuItemToCurrentPage() {
            var currentMenuItem = this.getMenuItemForCurrentPage();
            if (currentMenuItem) {
                this.menuItemHovered(currentMenuItem);
            }
        }
    }]);

    return NavBar;
}();

$(document).ready(function () {
    var navBars = $('.nav-bar');
    for (var i = 0; i < navBars.length; i++) {
        new NavBar(navBars[i]);
    }
});