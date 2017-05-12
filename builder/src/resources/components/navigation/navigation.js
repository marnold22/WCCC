class NavBar{
    constructor(element){
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
        this.setPageContentOffset();
        //set the currently highlighted SubNav item
        this.setCurrentSubMenuItem();
    }

    //FIX CONTENT OFFSET---------------------------------------------

    getPageContentOffset(){
        let content = $('#content-container');
        let navOffset = $(this.nav).height() + $(this.subNav).height() + parseInt($(this.nav).css("margin-top"));
        return navOffset;
    }

    setPageContentOffset(){
        let content = $('#content-container');
        let navHeight = this.getPageContentOffset();
        $(content).css({'margin-top': navHeight+'px'});
        this.pageContentOffset = navHeight;
    }

    setMenuPageScroll(){
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if(this.lastScrollPos < scrollTop){
            $(this.nav).addClass('nav-bar-hidden');
        }else if(this.lastScrollPos > scrollTop){
            $(this.nav).removeClass('nav-bar-hidden');
        }
        this.setPageContentOffset();
        this.lastScrollPos = scrollTop;
    }

    //PAGE LISTENERS-------------------------------------------------

    setupListeners(){
        let throttle = 50;

        $(window).resize(_.throttle(()=>{
            //on resize of window so highlight offset is correct
            if(this.currentMenuItem){
                this.menuItemHovered(this.currentMenuItem);
            }
            //make sure content is never behind menu on window resize
            this.setPageContentOffset();
        }, throttle));

        $(window).scroll(_.throttle(()=>{
            if(!this.isScrollingProgrammatically){
                //find the current menu item in the viewport
                this.setCurrentSubMenuItem();
            }
            this.setMenuPageScroll();
        }, throttle));

        //menu item hovered
        this.setupMenuItemHover();

        //burger menu
        let burgerMenuID = '#'+this.burgerMenuID;
        $(burgerMenuID).click(this.toggleBurgerMenu.bind(this));
    }

    //REGULAR MENU---------------------------------------------------

    menuItemHovered(menuItem, highlighter){
        const width = $(menuItem).outerWidth(true);
        const menuItemOffset = $(menuItem).offset().left;
        $(highlighter).css({'left': menuItemOffset, 'width': width});
    }

    //event handlers
    setupMenuItemHover(){
        $(this.menuItems).hover((event)=>{
            this.menuItemHovered(event.target, this.navBarHighlighter);
        });
        $(this.menuItems).mouseleave(()=>{
            this.updateMenuItemToCurrentPage();
        });
    }

    getMenuItemForCurrentPage(){
        if(this.currentMenuItem === null){
            let currPath = document.location.pathname;
            let pathPieces = currPath.split('/');
            if(pathPieces.length == 0 || pathPieces[pathPieces.length - 1].search('index') !== -1){
                currPath = 'index'; //if it's just a slash, we want the home page
            }else{
              if(pathPieces.length > 2 && pathPieces[pathPieces.length - 1] === ""){
                currPath = pathPieces[pathPieces.length - 2];
              }
              else{
                currPath = pathPieces[pathPieces.length - 1];
              }
            }

            for(let i = 0; i < this.menuItems.length; i++){
                const menuItemPath = $(this.menuItems[i]).attr('href');

                //if the current path is within the link of the menu item
                if(menuItemPath.search(currPath) !== -1){
                    this.currentMenuItem = this.menuItems[i];
                    return this.menuItems[i];
                }
            }
        }else{
            return this.currentMenuItem;
        }
    }

    updateMenuItemToCurrentPage(){
        this.currentMenuItem = this.getMenuItemForCurrentPage();
        if(this.currentMenuItem){
            this.menuItemHovered(this.currentMenuItem, this.navBarHighlighter);
            $(this.currentMenuItem).addClass('menu-item-current-page');
        }
    }

    //BURGER MENU---------------------------------------------------

    toggleBurgerMenu(){
        if(this.burgerMenuOpen){
            this.closeBurgerMenu();
            this.burgerMenuOpen = false;
        }else{
            this.openBurgerMenu();
            this.burgerMenuOpen = true;
        }
    }

    drawBurgerMenuAtPercentage(percentComplete){
        if(percentComplete > 100){
            percentComplete = 100;
        }else if(percentComplete < 0){
            percentComplete = 0
        }

        WCCCStyleKit.clearCanvas(this.burgerMenuID);
        WCCCStyleKit.drawBurgerMenu(this.burgerMenuID, percentComplete, WCCCStyleKit.makeRect(0,0,this.burgerMenuSize,this.burgerMenuSize), 'aspectfit');
    }

    drawBurgerMenu(arg = {startVal: 0, endVal: 100, duration: 0, direction: '', callback:()=>{}}){
        let shouldStop = false;
        //base case
        if((arg.direction === 'up' && arg.startVal >= arg.endVal) || arg.direction === 'down' && arg.startVal <= arg.endVal){
            shouldStop = true;
        }

        //setTimeout's minimum timeout is 10ms, so we need to do some adjusting of frames
        //  if the timeout is less than 10ms
        let numFrames = 100;
        if(arg.duration/numFrames < 10){
            numFrames = 20;
        }

        //will be at least 1
        let incrementBy = 100/numFrames;

        setTimeout(()=>{
            this.drawBurgerMenuAtPercentage(arg.startVal);
            arg.startVal += arg.direction === 'up' ? incrementBy : -incrementBy;
            if(!shouldStop){
                this.drawBurgerMenu(arg);
            }
        }, arg.duration/numFrames);

        if(shouldStop){
            if(typeof arg.callback === 'function'){
                arg.callback();
            }
        }
    }

    openBurgerMenu(arg = {callback: ()=>{}}){
        this.drawBurgerMenu({startVal: 0, endVal: 100, duration: 175, direction: 'up', callback: arg.callback});
        $(this.navContent).addClass('nav-bar-content-active');
        this.showAllMenuItems();
    }

    closeBurgerMenu(arg = {callback: ()=>{}}){
        this.drawBurgerMenu({startVal: 100, endVal: 0, duration: 175, direction: 'down', callback: arg.callback});
        $(this.navContent).removeClass('nav-bar-content-active');
        this.hideAllMenuItems();
    }

    showAllMenuItems(){
        for(let i = 0; i < this.menuItems.length; i++){
            setTimeout(()=>{
                this.showMenuItem(i);
            }, 200*i)
        }
    }

    hideAllMenuItems(){
        for(let i = 0; i < this.menuItems.length; i++){
            this.hideMenuItem(i);
        }
    }

    displayMenuItem(index){
        if(index < this.menuItems.length){
            $(this.menuItems[index]).addClass('menu-item-display');
        }
    }

    noDisplayMenuItem(index){
        if(index < this.menuItems.length){
            $(this.menuItems[index]).removeClass('menu-item-display');
        }
    }

    showMenuItem(index){
        this.displayMenuItem(index);
        if(index < this.menuItems.length){
            setTimeout(()=>{
                if(this.burgerMenuOpen){
                    $(this.menuItems[index]).addClass('menu-item-active');
                }
            },10);
        }
    }

    hideMenuItem(index){
        setTimeout(()=>{
            if(!this.burgerMenuOpen){
                this.noDisplayMenuItem(index);
            }
        }, 500);
        if(index < this.menuItems.length){
            setTimeout(()=>{
                $(this.menuItems[index]).removeClass('menu-item-active');
            },0);
        }
    }

    //SUB MENU-----------------------------------------------------
    setupSubMenu(){
        let anchorIDs = {};
        let subNavActive = false;

        for(let i = 0; i < this.pageAnchors.length; i++){
            //we have nav items
            subNavActive = true;

            let currAnchor = this.pageAnchors[i];
            let anchorID = $(currAnchor).attr('name');
            anchorID = this.formatAnchorTagString(anchorID);
            let title = $(currAnchor).attr('title');

            //if we haven't seen this id before
            if(!anchorIDs[anchorID]){
                //keep track of the IDs to make sure they're unique
                anchorIDs[anchorID] = true;
            }else{
                //generate a random string and append it to our ID
                let randomString = Math.random().toString(36).substring(7);
                anchorID += ('_' + randomString);
                $(currAnchor).attr('name', anchorID);
                $(currAnchor).attr('id', anchorID);
            }

            let navItem = `<li class="sub-nav-item"><a href="#${anchorID}">${title}</a></li>`
            $(this.subNav).append(navItem);

            if (i <= this.pageAnchors.length - 2) {
                $(this.subNav).append("<span> | </span>");
            }
        }

        if($('.anchor').length > 0){
          $(this.subNav).addClass('sub-nav-active');
        }

        if($('.anchor').length > 0){
            $(this.subNav).addClass('sub-nav-active');
        }

        this.subNavItems = $('.sub-nav-item');
        this.setupSmoothScrollAnchors();
    }

    setupSmoothScrollAnchors(){
        // Get all links in the Sub Nav
        let links = $(this.subNav).find('a');
        let setCurrentSubMenuItemFunction = this.setCurrentSubMenuItem.bind(this);
        // Add smooth scrolling to all links in the sub nav
        $(links).click((event)=>{
            this.isScrollingProgrammatically = true;
            // Make sure this.hash has a value before overriding default behavior
            if (event.target.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();
              // Store hash
              var hash = event.target.hash;
              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top - this.pageContentOffset
            }, 800, ()=>{
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
                this.isScrollingProgrammatically = false;
                setCurrentSubMenuItemFunction();
              });
            } // End if
        });
    }

    setupSubMenuItemHover(){
        $(this.subNavItems).hover((event)=>{
            this.menuItemHovered(event.target, this.subNavHighlighter);
        });
        $(this.subNavItems).mouseleave(()=>{
            this.menuItemHovered($('.sub-nav-item-active')[0], this.subNavHighlighter);
        });
    }

    formatAnchorTagString(anchor){
        return anchor.replace(/[^0-9a-z]/gi, '');
    }

    setCurrentSubMenuItem(){
        //window scroll position
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        //height of nav bar
        let offset = this.pageContentOffset;
        //current scroll position taking nav bar into account
        let currPos = scrollTop;
        let noItemSelected = true;
        for(let i = 0; i < this.pageAnchors.length; i++){
            let currAnchor = this.pageAnchors[i];
            let anchorOffset = Math.floor($(currAnchor).position().top);
            let anchorHeight = Math.ceil($(currAnchor).height());

            //if the current position is in the middle of the anchor
            if(currPos >= anchorOffset && currPos < anchorOffset + anchorHeight){
                let anchorTag = $(currAnchor).attr('name');
                anchorTag = this.formatAnchorTagString(anchorTag);
                //if we have a new item
                if(!$(currAnchor).hasClass('anchor-active')){
                    //remove the active classes of the other element
                    $(this.pageAnchors).removeClass('anchor-active');
                    $('.sub-nav-item-active').removeClass('sub-nav-item-active');

                    //add the new active class
                    $(currAnchor).addClass('anchor-active');
                    let id = $(currAnchor).attr('id');
                    let subMenuItem = $(`[href="#${id}"]`);
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
        if(noItemSelected){
            //remove any active anchors
            $('.anchor-active').removeClass('anchor-active');
            $('.sub-nav-item-active').removeClass('sub-nav-item-active');
        }
    }
}
