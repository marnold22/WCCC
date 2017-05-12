'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var NavBar = function () {
    function NavBar(element) {
        _classCallCheck(this, NavBar);

        //ELEMENTS
        this.nav = element;
        this.subNav = $(element).find('.sub-nav-list')[0];
        this.subNavItems = null; //set in setupSubMenu()
        this.pageAnchors = $('.anchor');
        this.navContent = $(element).find('.nav-bar-content')[0];
        this.menuItems = $(element).find('nav > ul > li > a');
        this.currentMenuItem = null;
        this.navBarHighlighter = $(element).find('.nav-bar-highlighter')[0];
        this.subNavHighlighter = $(element).find('.sub-nav-highligher')[0];
        this.pageContentOffset = null; //set in setPageContentOffset()
        this.lastScrollPos = window.pageYOffset || document.documentElement.scrollTop;
        this.isScrollingProgrammatically = false;

        //BURGER
        //define the burger menu
        this.burgerMenuID = 'burger-menu';
        //the dimensions of the burger menu
        this.burgerMenuSize = 35;
        //display the burger menu
        this.drawBurgerMenuAtPercentage(0);
        this.burgerMenuOpen = false;

        //PAGE
        //which page are we on
        this.updateMenuItemToCurrentPage();
        //setup the sub menu items
        this.setupSubMenu();
        //set up the page interactions
        this.setupListeners();
        //set the page offset
        // this.setPageContentOffset();
        //set the currently highlighted SubNav item
        this.setCurrentSubMenuItem();
    }

    //FIX CONTENT OFFSET---------------------------------------------

    _createClass(NavBar, [{
        key: 'getPageContentOffset',
        value: function getPageContentOffset() {
            var content = $('#content-container');
            var navOffset = $(this.nav).height() + $(this.subNav).height() + parseInt($(this.nav).css("margin-top"));
            return navOffset;
        }
    }, {
        key: 'setPageContentOffset',
        value: function setPageContentOffset() {
            var content = $('#content-container');
            var navHeight = this.getPageContentOffset();
            $(content).css({ 'margin-top': navHeight + 'px' });
            this.pageContentOffset = navHeight;
        }
    }, {
        key: 'setMenuPageScroll',
        value: function setMenuPageScroll() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (this.lastScrollPos < scrollTop) {
                $(this.nav).addClass('nav-bar-hidden');
            } else if (this.lastScrollPos > scrollTop) {
                $(this.nav).removeClass('nav-bar-hidden');
            }
            // this.setPageContentOffset();
            this.lastScrollPos = scrollTop;
        }

        //PAGE LISTENERS-------------------------------------------------

    }, {
        key: 'setupListeners',
        value: function setupListeners() {
            var _this = this;

            var throttle = 50;

            $(window).resize(_.throttle(function () {
                //on resize of window so highlight offset is correct
                if (_this.currentMenuItem) {
                    _this.menuItemHovered(_this.currentMenuItem);
                }
                //make sure content is never behind menu on window resize
                // this.setPageContentOffset();
            }, throttle));

            $(window).scroll(_.throttle(function () {
                if (!_this.isScrollingProgrammatically) {
                    //find the current menu item in the viewport
                    _this.setCurrentSubMenuItem();
                }
                _this.setMenuPageScroll();
            }, throttle));

            //menu item hovered
            this.setupMenuItemHover();

            //burger menu
            var burgerMenuID = '#' + this.burgerMenuID;
            $(burgerMenuID).click(this.toggleBurgerMenu.bind(this));
        }

        //REGULAR MENU---------------------------------------------------

    }, {
        key: 'menuItemHovered',
        value: function menuItemHovered(menuItem, highlighter) {
            var width = $(menuItem).outerWidth(true);
            var menuItemOffset = $(menuItem).offset().left;
            $(highlighter).css({ 'left': menuItemOffset, 'width': width });
        }

        //event handlers

    }, {
        key: 'setupMenuItemHover',
        value: function setupMenuItemHover() {
            var _this2 = this;

            $(this.menuItems).hover(function (event) {
                _this2.menuItemHovered(event.target, _this2.navBarHighlighter);
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
                this.menuItemHovered(this.currentMenuItem, this.navBarHighlighter);
                $(this.currentMenuItem).addClass('menu-item-current-page');
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
            WCCCStyleKit.drawBurgerMenu(this.burgerMenuID, percentComplete, WCCCStyleKit.makeRect(0, 0, this.burgerMenuSize, this.burgerMenuSize), 'aspectfit');
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
            this.showAllMenuItems();
        }
    }, {
        key: 'closeBurgerMenu',
        value: function closeBurgerMenu() {
            var arg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : { callback: function callback() {} };

            this.drawBurgerMenu({ startVal: 100, endVal: 0, duration: 175, direction: 'down', callback: arg.callback });
            $(this.navContent).removeClass('nav-bar-content-active');
            this.hideAllMenuItems();
        }
    }, {
        key: 'showAllMenuItems',
        value: function showAllMenuItems() {
            var _this4 = this;

            var _loop = function _loop(i) {
                setTimeout(function () {
                    _this4.showMenuItem(i);
                }, 200 * i);
            };

            for (var i = 0; i < this.menuItems.length; i++) {
                _loop(i);
            }
        }
    }, {
        key: 'hideAllMenuItems',
        value: function hideAllMenuItems() {
            for (var i = 0; i < this.menuItems.length; i++) {
                this.hideMenuItem(i);
            }
        }
    }, {
        key: 'displayMenuItem',
        value: function displayMenuItem(index) {
            if (index < this.menuItems.length) {
                $(this.menuItems[index]).addClass('menu-item-display');
            }
        }
    }, {
        key: 'noDisplayMenuItem',
        value: function noDisplayMenuItem(index) {
            if (index < this.menuItems.length) {
                $(this.menuItems[index]).removeClass('menu-item-display');
            }
        }
    }, {
        key: 'showMenuItem',
        value: function showMenuItem(index) {
            var _this5 = this;

            this.displayMenuItem(index);
            if (index < this.menuItems.length) {
                setTimeout(function () {
                    if (_this5.burgerMenuOpen) {
                        $(_this5.menuItems[index]).addClass('menu-item-active');
                    }
                }, 10);
            }
        }
    }, {
        key: 'hideMenuItem',
        value: function hideMenuItem(index) {
            var _this6 = this;

            setTimeout(function () {
                if (!_this6.burgerMenuOpen) {
                    _this6.noDisplayMenuItem(index);
                }
            }, 500);
            if (index < this.menuItems.length) {
                setTimeout(function () {
                    $(_this6.menuItems[index]).removeClass('menu-item-active');
                }, 0);
            }
        }

        //SUB MENU-----------------------------------------------------

    }, {
        key: 'setupSubMenu',
        value: function setupSubMenu() {
            var anchorIDs = {};
            var subNavActive = false;

            for (var i = 0; i < this.pageAnchors.length; i++) {
                //we have nav items
                subNavActive = true;

                var currAnchor = this.pageAnchors[i];
                var anchorID = $(currAnchor).attr('name');
                anchorID = this.formatAnchorTagString(anchorID);
                $(currAnchor).attr('name', anchorID);
                var title = $(currAnchor).attr('title');

                //if we haven't seen this id before
                if (!anchorIDs[anchorID]) {
                    //keep track of the IDs to make sure they're unique
                    anchorIDs[anchorID] = true;
                } else {
                    //generate a random string and append it to our ID
                    var randomString = Math.random().toString(36).substring(7);
                    anchorID += '_' + randomString;
                    $(currAnchor).attr('name', anchorID);
                    $(currAnchor).attr('id', anchorID);
                }

                var navItem = '<li class="sub-nav-item"><a href="#' + anchorID + '">' + title + '</a></li>';
                $(this.subNav).append(navItem);

                if (i <= this.pageAnchors.length - 2) {
                    $(this.subNav).append("<span> | </span>");
                }
            }

            if ($('.anchor').length > 0) {
                $(this.subNav).addClass('sub-nav-active');
            }

            if ($('.anchor').length > 0) {
                $(this.subNav).addClass('sub-nav-active');
            }

            this.subNavItems = $('.sub-nav-item');
            this.setupSmoothScrollAnchors();
        }
    }, {
        key: 'setupSmoothScrollAnchors',
        value: function setupSmoothScrollAnchors() {
            var _this7 = this;

            // Get all links in the Sub Nav
            var links = $(this.subNav).find('a');
            var setCurrentSubMenuItemFunction = this.setCurrentSubMenuItem.bind(this);
            // Add smooth scrolling to all links in the sub nav
            $(links).click(function (event) {
                _this7.isScrollingProgrammatically = true;
                // Make sure this.hash has a value before overriding default behavior
                if (event.target.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();
                    // Store hash
                    var hash = event.target.hash;
                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - _this7.pageContentOffset
                    }, 800, function () {
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                        _this7.isScrollingProgrammatically = false;
                        setCurrentSubMenuItemFunction();
                    });
                } // End if
            });
        }
    }, {
        key: 'setupSubMenuItemHover',
        value: function setupSubMenuItemHover() {
            var _this8 = this;

            $(this.subNavItems).hover(function (event) {
                _this8.menuItemHovered(event.target, _this8.subNavHighlighter);
            });
            $(this.subNavItems).mouseleave(function () {
                _this8.menuItemHovered($('.sub-nav-item-active')[0], _this8.subNavHighlighter);
            });
        }
    }, {
        key: 'formatAnchorTagString',
        value: function formatAnchorTagString(anchor) {
            return anchor.replace(/[^0-9a-z]/gi, '_');
        }
    }, {
        key: 'setCurrentSubMenuItem',
        value: function setCurrentSubMenuItem() {
            //window scroll position
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            //height of nav bar
            var offset = this.pageContentOffset;
            //current scroll position taking nav bar into account
            var currPos = scrollTop;
            var noItemSelected = true;
            for (var i = 0; i < this.pageAnchors.length; i++) {
                var currAnchor = this.pageAnchors[i];
                var anchorOffset = Math.floor($(currAnchor).position().top);
                var anchorHeight = Math.ceil($(currAnchor).height());

                //if the current position is in the middle of the anchor
                if (currPos >= anchorOffset && currPos < anchorOffset + anchorHeight) {
                    var anchorTag = $(currAnchor).attr('name');
                    anchorTag = this.formatAnchorTagString(anchorTag);
                    //if we have a new item
                    if (!$(currAnchor).hasClass('anchor-active')) {
                        //remove the active classes of the other element
                        $(this.pageAnchors).removeClass('anchor-active');
                        $('.sub-nav-item-active').removeClass('sub-nav-item-active');

                        //add the new active class
                        $(currAnchor).addClass('anchor-active');
                        var id = $(currAnchor).attr('id');
                        var subMenuItem = $('[href="#' + id + '"]');
                        $(subMenuItem).addClass('sub-nav-item-active');
                        $(this.subNav).animate({
                            scrollLeft: $(subMenuItem).offset().left
                        }, 333, null);
                    }
                    noItemSelected = false;
                    break;
                }
            }

            //if we don't have a valid item
            if (noItemSelected) {
                //remove any active anchors
                $('.anchor-active').removeClass('anchor-active');
                $('.sub-nav-item-active').removeClass('sub-nav-item-active');
            }
        }
    }]);

    return NavBar;
}();