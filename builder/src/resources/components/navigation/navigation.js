class NavBar{
    constructor(element){
        this.nav = element;
        this.menuItems = $(element).find('nav > ul > li > a');
        this.currentMenuItem = null;
        this.navBarHighlighter = $(element).find('.nav-bar-highlighter')[0];
        this.updateMenuItemToCurrentPage();
        this.setupOnHover();
        this.setupListeners();
    }

    menuItemHovered(menuItem){
        const width = $(menuItem).width();
        const menuItemOffset = $(menuItem).offset().left;
        $(this.navBarHighlighter).css({'left': menuItemOffset, 'width': width});
    }

    //event handlers
    setupOnHover(){
        $(this.menuItems).hover((event)=>{
            this.menuItemHovered(event.target);
        });
        $(this.menuItems).mouseleave(()=>{
            this.updateMenuItemToCurrentPage();
        });
    }

    setupListeners(){
        $(window).resize(()=>{
            if(this.currentMenuItem){
                this.menuItemHovered(this.currentMenuItem);
            }
        });
    }

    getMenuItemForCurrentPage(){
        if(this.currentMenuItem === null){
            let currPath = document.location.pathname;
            let pathPieces = currPath.split('/');
            if(pathPieces.length == 0 || pathPieces[pathPieces.length - 1].search('index') !== -1){
                currPath = 'index'; //if it's just a slash, we want the home page
            }else{
                currPath = pathPieces[pathPieces.length - 1];
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
            this.menuItemHovered(this.currentMenuItem);
        }
    }

    drawBurgerMenu(arg = {startVal: 0, endVal: 100, duration: 0, callback:()=>{}}){
        //base case
        if(arg.startVal == arg.endVal){
            if(typeof arg.callback === 'function'){
                arg.callback();
            }
            return;
        }

        //if we're incrementing
        if(arg.startVal < arg.endVal){
            setTimeout(()=>{
                WCCCStyleKit.clearCanvas('mainCanvas');
                WCCCStyleKit.drawBurgerMenu('mainCanvas', arg.startVal);
                arg.startVal += 1;
                this.drawBurgerMenu(arg);
            }, arg.duration/100);
        }
        //we're decrementing
        else{
            setTimeout(()=>{
                WCCCStyleKit.clearCanvas('mainCanvas');
                WCCCStyleKit.drawBurgerMenu('mainCanvas', arg.startVal);
                arg.startVal -= 1;
                this.drawBurgerMenu(arg);
            }, arg.duration/100);
        }
    }

    openBurgerMenu(arg = {callback: ()=>{}}){
        this.drawBurgerMenu({startVal: 0, endVal: 100, duration: 0.01, callback: arg.callback});
    }

    closeBurgerMenu(arg = {callback: ()=>{}}){
        this.drawBurgerMenu({startVal: 100, endVal: 0, duration: 0.01, callback: arg.callback});
    }

}

$(document).ready(()=>{
    let navBars = $('.nav-bar');
    for(let i = 0; i < navBars.length; i++){
        let bar = new NavBar(navBars[i]);
        // bar.openBurgerMenu({callback: ()=>{
        //     bar.closeBurgerMenu()
        // }});
    }
});
