<?php
/*
Template Name: My Link
*/
wp_head();
get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>search Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
// check if the username is taken
$user_name = 'test1';
$user_email = 'abc@xyz.com';
// check if the username is taken
$user_id = username_exists($user_name);
 
// check that the email address does not belong to a registered user
if (!$user_id && email_exists($user_email) === false) {
// create a random password
    $random_password = wp_generate_password(
        $length = 12,
        $include_standard_special_chars = false
    );
// create the user
    $user_id = wp_create_user(
        $user_name,
        $random_password,
        $user_email
    );
	
	echo $random_password;
}
$args = array(
	'post_type' => 'post',
	'post_per_page' => -1
	);
// The Query
$loop = new WP_Query( $args );

?>

<?php if ($loop->have_posts() ) : ?>
 
    <!-- Add the pagination functions here. -->
 
    <!-- Start of the main loop. -->
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
 
    <!-- the rest of your theme's main loop -->
	<?php the_title(); ?><br>
 
    <?php endwhile; ?>
    <!-- End of the main loop -->
 
    <!-- Add the pagination functions here. -->
 
 
<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
 
 
 
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
 
 
<?php else : ?>
 
<?php _e('Sorry, no posts matched your criteria.'); ?>
 
<?php endif; ?>

 
 

</body>
</html>
