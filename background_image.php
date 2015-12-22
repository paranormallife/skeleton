<?php // THE LOOP 
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php // GET THE POST THUMBNAIL
$bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' ); ?>
<li style="background-image: url('<?php echo $bg_image[0]; ?>');">

<!-- Content -->

</li>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
