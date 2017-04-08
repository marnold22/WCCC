'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var NavBar = function () {
    function NavBar(element) {
        _classCallCheck(this, NavBar);

        this.nav = element;
        this.navContent = $(element).find('.nav-bar-content')[0];
        this.menuItems = $(element).find('nav > ul > li > a');
        this.currentMenuItem = null;
        this.navBarHighlighter = $(element).find('.nav-bar-highlighter')[0];

        //define the burger menu
        this.burgerMenuID = 'burger-menu';
        //display the burger menu
        this.drawBurgerMenuAtPercentage(0);
        this.burgerMenuOpen = false;

        this.updateMenuItemToCurrentPage();
        this.setupListeners();
    }

    _createClass(NavBar, [{
        key: 'setupListeners',
        value: function setupListeners() {
            var _this = this;

            //on resize of window so highlight offset is correct
            $(window).resize(function () {
                if (_this.currentMenuItem) {
                    _this.menuItemHovered(_this.currentMenuItem);
                }
            });

            //menu item hovered
            this.setupOnHover();

            //burger menu
            var burgerMenuID = '#' + this.burgerMenuID;
            $(burgerMenuID).click(this.toggleBurgerMenu.bind(this));
        }

        //REGULAR MENU---------------------------------------------------

    }, {
        key: 'menuItemHovered',
        value: function menuItemHovered(menuItem) {
            var width = $(menuItem).width();
            var menuItemOffset = $(menuItem).offset().left;
            $(this.navBarHighlighter).css({ 'left': menuItemOffset, 'width': width });
        }

        //event handlers

    }, {
        key: 'setupOnHover',
        value: function setupOnHover() {
            var _this2 = this;

            $(this.menuItems).hover(function (event) {
                _this2.menuItemHovered(event.target);
            });
            $(this.menuItems).mouseleave(function () {
                _this2.updateMenuItemToCurrentPage();
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
            this.currentMenuItem = this.getMenuItemForCurrentPage();
            if (this.currentMenuItem) {
                this.menuItemHovered(this.currentMenuItem);
            }
        }

        //BURGER MENU---------------------------------------------------

    }, {
        key: 'toggleBurgerMenu',
        value: function toggleBurgerMenu() {
            if (this.burgerMenuOpen) {
                this.closeBurgerMenu();
                this.burgerMenuOpen = false;
            } else {
                this.openBurgerMenu();
                this.burgerMenuOpen = true;
            }
        }
    }, {
        key: 'drawBurgerMenuAtPercentage',
        value: function drawBurgerMenuAtPercentage(percentComplete) {
            if (percentComplete > 100) {
                percentComplete = 100;
            } else if (percentComplete < 0) {
                percentComplete = 0;
            }

            WCCCStyleKit.clearCanvas(this.burgerMenuID);
            WCCCStyleKit.drawBurgerMenu(this.burgerMenuID, percentComplete, WCCCStyleKit.makeRect(0, 0, 50, 50), 'aspectfit');
        }
    }, {
        key: 'drawBurgerMenu',
        value: function drawBurgerMenu() {
            var _this3 = this;

            var arg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { startVal: 0, endVal: 100, duration: 0, direction: '', callback: function callback() {} };

            var shouldStop = false;
            //base case
            if (arg.direction === 'up' && arg.startVal >= arg.endVal || arg.direction === 'down' && arg.startVal <= arg.endVal) {
                shouldStop = true;
            }

            //setTimeout's minimum timeout is 10ms, so we need to do some adjusting of frames
            //  if the timeout is less than 10ms
            var numFrames = 100;
            if (arg.duration / numFrames < 10) {
                numFrames = 20;
            }

            //will be at least 1
            var incrementBy = 100 / numFrames;

            setTimeout(function () {
                _this3.drawBurgerMenuAtPercentage(arg.startVal);
                arg.startVal += arg.direction === 'up' ? incrementBy : -incrementBy;
                if (!shouldStop) {
                    _this3.drawBurgerMenu(arg);
                }
            }, arg.duration / numFrames);

            if (shouldStop) {
                if (typeof arg.callback === 'function') {
                    arg.callback();
                }
            }
        }
    }, {
        key: 'openBurgerMenu',
        value: function openBurgerMenu() {
            var arg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { callback: function callback() {} };

            this.drawBurgerMenu({ startVal: 0, endVal: 100, duration: 175, direction: 'up', callback: arg.callback });
            $(this.navContent).addClass('nav-bar-content-active');
        }
    }, {
        key: 'closeBurgerMenu',
        value: function closeBurgerMenu() {
            var arg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { callback: function callback() {} };

            this.drawBurgerMenu({ startVal: 100, endVal: 0, duration: 175, direction: 'down', callback: arg.callback });
            $(this.navContent).removeClass('nav-bar-content-active');
        }
    }]);

    return NavBar;
}();

$(document).ready(function () {
    var navBars = $('.nav-bar');
    for (var i = 0; i < navBars.length; i++) {
        var bar = new NavBar(navBars[i]);
    }
});