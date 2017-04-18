<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/assets/css/styles.css';?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri().'/assets/js/WCCCStyleKit.js'; ?>"></script>
    <script src="<?php echo get_template_directory_uri().'/assets/js/navigation.js'; ?>"></script>
    <script src="<?php echo get_template_directory_uri().'/assets/js/lodash.js'; ?>"></script>
    <script defer src="<?php echo get_template_directory_uri().'/assets/js/main.js'; ?>"></script>
    <?php wp_head(); ?>
  </head>

    <header>
        <?php get_template_part('assets/partials/navigation'); ?>
    </header>

  <div id="content-container">
    <body>
