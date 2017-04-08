<script type="text/javascript">
    requirejs(["<?php echo get_template_directory_uri().'/assets/js/WCCCStyleKit.js'; ?>"], function(){
        requirejs(["<?php echo get_template_directory_uri().'/assets/js/navigation.js'; ?>"], function(){});
    });
</script>

<div class="nav-bar">
    <div class="nav-bar-logo" style="background-image: url(<?php echo get_template_directory_uri().'/assets/images/grey_logo.png'; ?>)"><a href="./index"></a></div>

    <canvas id="burger-menu" width="35px" height="35px"></canvas>

    <div class="nav-bar-content">
        <nav>
            <ul>
              <li><a href="./index">Home</a></li>
              <li><a href="./about">About</a></li>
              <li><a href="./programs">Programs</a></li>
              <li><a href="./events">Events</a></li>
              <li><a href="./giving">Giving</a></li>
              <li><a href="./resources">Resources</a></li>
              <li><a href="./contact">Contact</a></li>
            </ul>
            <div class="nav-bar-highlighter"></div>
        </nav>
    </div>
</div>
