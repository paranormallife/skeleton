<?php

/**
 * @package WordPress
 * @subpackage asw_template
 */

// Thumbnails
add_theme_support('post-thumbnails');



//menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'nav1' => __( 'Navigation 1' ),
			'nav2' => __( 'Navigation 2' )
		)
	);
}



// make sure quotes and single quotes dont end up in the url
add_action( 'title_save_pre', 'do_replace_dashes' );
function do_replace_dashes($string_to_clean) {
    $string_to_clean = str_replace( array('&#8212;', '—', '&#8211;', '–', '‚', '„', '“', '”', '’', '‘', '…'), array(' -- ',' -- ', '--','--', ',', ',,', '"', '"', "'", "'", '...'), $string_to_clean );
    return $string_to_clean;
}

//remove wp version from head
remove_action('wp_head', 'wp_generator');


// Custom Taxonomies (Should be above Custom Post Types)
function asw_register_taxonomies() {
	register_taxonomy("image_category", array("gallery"), 
	array(
		"hierarchical" => true, 
		"label" => __('Image Categories', 'gallery'), 
		"singular_label" => "Image Category", 
		"rewrite" => true));
}


// Custom Post Types

function js_init() {
  asw_register_custom_types(); // Register Custom Post Types
  asw_register_taxonomies(); // Register Custom Taxonomies
}

add_action('init', 'js_init');

function asw_register_custom_types() {
	

	// FRONT PAGE HEADER/BANNER
	register_post_type(
		  'headers', array(
			  'labels' => array(
				  'name' => 'Headers', 
				  'singular_name' => 'Header', 
				  'add_new' => 'Add new header', 
				  'add_new_item' => 'Add new header', 
				  'new_item' => 'New header', 
				  'view_item' => 'View headers',
				  'edit_item' => 'Edit header',
				  'not_found' =>  __('No headers found'),
				  'not_found_in_trash' => __('No headers found in Trash')
			  ), 
			  'public' => true,
			  'publicly_queryable' => true,
			  'show_ui' => true,
			  'query_var' => true,
			  'rewrite' => array( 'slug' => 'headers','with_front' => FALSE),
			  'capability_type' => 'post',
			  'has_archive' => 'true',
			  'menu_icon' => '',
			  'exclude_from_search' => false, // If this is set to TRUE, Taxonomy pages won't work.
			  'hierarchical' => false,
			  'menu_position' => null,
			  'supports' => array('title', 'thumbnail', 'editor'),
			  'taxonomies' => array('image_category')
		 )
	  );
	
	flush_rewrite_rules();
 
 	add_action('add_meta_boxes', 'asw_add_meta');
	add_action('save_post', 'asw_save_meta');
 
}


function asw_add_meta() {
	add_meta_box('page_summary', 'Summary', 'summary', array('page', 'post'), 'side', 'high');
}

function summary($post) {
    echo '<div id="summary">';
    echo '<textarea style="width:95%;" id="summary" name="summary" placeholder="250 Characters Max" maxlength="250">' . get_post_meta($post->ID, 'summary', true) . '</textarea>';
    echo '</div>';
}


// Save the Custom Field Data
function asw_save_meta($post_id) {

    if (wp_is_post_revision($post_id)) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
       return $post_id;
    }

    if (isset($_POST['summary'])) {
       update_post_meta($post_id, 'summary', $_POST['summary']);
    }
	
}





?>