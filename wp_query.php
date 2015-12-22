<?php
// The Query
$the_query = new WP_Query( array( 'post_type' => 'page', 'order' => 'ASC' ) );
// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();// GET THE POST THUMBNAIL
$bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' ); ?>

<article>
<h2><?php the_title(); ?></h2>
<p><?php the_content(); ?></p>
</article>

<?php endwhile;

// Reset Post Data
wp_reset_postdata();

?>