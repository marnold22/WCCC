//start the script
$(document).ready(()=>{

    //set up the navigation bar
    let navBars = $('.nav-bar');
    for(let i = 0; i < navBars.length; i++){
        let bar = new NavBar(navBars[i]);
    }
});
