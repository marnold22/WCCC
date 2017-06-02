function loadScript(script, callback){
    //load jQuery
    var myScript = document.createElement('script');
    myScript.onload = function() {
        if(typeof callback === 'function'){
            callback();
        }
    };
    myScript.src = script;
    document.getElementsByTagName('head')[0].appendChild(myScript);
}

window.addEventListener("load", function(){
    //load jQuery
    var jqueryScript = document.createElement('script');
    jqueryScript.onload = function() {
        //set up the navigation bar
        let navBars = $('.nav-bar');
        for(let i = 0; i < navBars.length; i++){
            let bar = new NavBar(navBars[i]);
        }
    };
    jqueryScript.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js';
    document.getElementsByTagName('head')[0].appendChild(jqueryScript);
});
