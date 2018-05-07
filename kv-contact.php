<?php
/*
Template Name: Random Interesting Things
*/
 
get_header();
 
$query = new WP_Query(array(
  'category_name' => 'men',
  'orderby' => 'rand',
  'posts_per_page' => 10
));
if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();
?>
 
<a name="<?php the_ID(); ?>"></a>
<article class="post" id="post-<?php the_ID(); ?>">
  <div class="post-body">
    <?php the_excerpt();?>
    <p class="read-more">
      <a
        href="<?php print get_permalink();?>"
      >Read More »</a>
    </p>
  </div>
</article>
 
<?php
  endwhile;
endif;
wp_reset_postdata();
 
get_footer();