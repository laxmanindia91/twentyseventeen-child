<?php
/*
Template Name: My Choices
*/
wp_head();
get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Size</a></li>
    <li><a data-toggle="tab" href="#menu1">Colors</a></li>
    <li><a data-toggle="tab" href="#menu2">Style</a></li>
    <li><a data-toggle="tab" href="#menu3">Pattern</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p><?php 
      ob_start();
print 'Hello First!\n';
ob_end_flush();

ob_start();
print 'Hello Second!\n';
ob_end_clean();

ob_start();
print 'Hello Third!\n'; ?></p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p><?php
      $terms = get_terms( 'pa_color' );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

echo '<ul>';

foreach ( $terms as $term ) {
echo '<pre>';
print_r($term);
echo '</pre>';
//echo '<li>' . $term->name . '</li>';
}

echo '</ul>';

} ?></p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <!--h3>Menu 3</h3-->
      <p><?php

  $vv= get_the_terms(570,'pa_design');    
  print_r($vv);
  echo wp_get_attachment_image( 570, 'full' );
  print_r($media);
  $attachment_page = get_attachment_link( 570 ); 
  echo wp_get_attachment_image( 570, array('700', '600'), "", array( "class" => "img-responsive" ) );

  echo $image_attributes = wp_get_attachment_image_src( $attachment_id = 570 );

$terms = get_terms( 'pa_design' );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){

echo '<ul>';

foreach ( $terms as $term ) {
echo '<pre>';
print_r($term);
echo '</pre>';
//echo '<li>' . $term->name . '</li>';
}

echo '</ul>';

}


 $args = array('post_type'=>'attachment','numberposts'=>null,'post_status'=>null, 'post_parent' => 571);
   $attachments = get_posts($args);
    if($attachments){
          foreach($attachments as $attachment){
             // here your code 
              echo $attachment->ID; 
           }
      }

      echo wp_get_attachment_image( 570, 'thumbnail' );




      ?></p>
    </div>
  </div>
</div>

</body>
</html>
