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
                    currPath = pathPieces[pathPieces.length - 1];
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
    }, {
        key: 'drawBurgerMenu',
        value: function drawBurgerMenu() {
            var _this2 = this;

            var arg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { startVal: 0, endVal: 100, duration: 0, callback: function callback() {} };

            //base case
            if (arg.startVal == arg.endVal) {
                if (typeof arg.callback === 'function') {
                    arg.callback();
                }
                return;
            }

            //if we're incrementing
            if (arg.startVal < arg.endVal) {
                setTimeout(function () {
                    WCCCStyleKit.clearCanvas('mainCanvas');
                    WCCCStyleKit.drawBurgerMenu('mainCanvas', arg.startVal);
                    arg.startVal += 1;
                    _this2.drawBurgerMenu(arg);
                }, arg.duration / 100);
            }
            //we're decrementing
            else {
                    setTimeout(function () {
                        WCCCStyleKit.clearCanvas('mainCanvas');
                        WCCCStyleKit.drawBurgerMenu('mainCanvas', arg.startVal);
                        arg.startVal -= 1;
                        _this2.drawBurgerMenu(arg);
                    }, arg.duration / 100);
                }
        }
    }, {
        key: 'openBurgerMenu',
        value: function openBurgerMenu() {
            var arg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { callback: function callback() {} };

            this.drawBurgerMenu({ startVal: 0, endVal: 100, duration: 0.01, callback: arg.callback });
        }
    }, {
        key: 'closeBurgerMenu',
        value: function closeBurgerMenu() {
            var arg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { callback: function callback() {} };

            this.drawBurgerMenu({ startVal: 100, endVal: 0, duration: 0.01, callback: arg.callback });
        }
    }]);

    return NavBar;
}();

$(document).ready(function () {
    var navBars = $('.nav-bar');

    var _loop = function _loop(i) {
        var bar = new NavBar(navBars[i]);
        bar.openBurgerMenu({ callback: function callback() {
                bar.closeBurgerMenu();
            } });
    };

    for (var i = 0; i < navBars.length; i++) {
        _loop(i);
    }
});