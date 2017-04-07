<script type="text/javascript">
    requirejs(["<?php echo get_template_directory_uri().'/assets/js/WCCCStyleKit.js'; ?>"], function(){
        requirejs(["<?php echo get_template_directory_uri().'/assets/js/navigation.js'; ?>"], function(){});
    });
</script>

<div class="nav-bar">
    <div class="nav-bar-content">
        <!-- <div class="nav-bar-logo" style="background-image: url(<?php echo get_template_directory_uri().'/assets/images/grey_logo.png'; ?>)"><a href="#"></a></div> -->

        <!-- <canvas id="mainCanvas" width="175" height="125"></canvas> -->

        <nav>
            <ul>
              <li><a href="./about.php">About</a></li>
              <li><a href="./programs.php">Programs</a></li>
              <li><a href="./events.php">Events</a></li>
              <li><a href="./giving.php">Giving</a></li>
              <li><a href="./resources.php">Resources</a></li>
              <li><a href="./contact.php">Contact</a></li>
            </ul>
            <div class="nav-bar-highlighter"></div>
        </nav>
    </div>
</div>
