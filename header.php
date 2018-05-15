<!DOCTYPE html>
<html lang="en">
<head>
  <title>Twenty seventeen child theme</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php

if ( is_active_sidebar( 'search_page_1' ) ) : ?>
    <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'search_page_1' ); ?>
    </div>
     
<?php endif; ?>



