<!DOCTYPE html>
<html>
  <head>
    <title>WCCC</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script type="text/javascript" src="./resources/js/require.js"></script>
    <script type="text/javascript">requirejs(["<?php echo get_template_directory_uri().'./resources/js/parallax.js'?>"], function(){ })</script>
    <script type="text/javascript">requirejs(["<?php echo get_template_directory_uri().'./resources/js/main.js'?>"], function(){ })</script><link href=<?php echo get_template_directory_uri().'./resources/css/styles.css'?> rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="content">
      <div>
        <h1>hello world</h1>
      </div>
    </div>
  </body>
</html>