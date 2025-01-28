<?php
function mindset_enqueues() {
	// Load style.css on the front-end
	// Parameters: Unique handle, Source, Dependencies, Version number, Media
	wp_enqueue_style( 
		'mindset-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' ),
		'all'
	);
    //Enqueue External Stylesheets
//You can enqueue CSS files from a CDN as well.
    wp_enqueue_style( 
        'mindset-normalize', 
        'https://unpkg.com/@csstools/normalize.css', 
        array(), 
        '12.1.0'
    );
    //Default Scripts
    //WordPress is distributed with some JavaScript, like jQuery.
    //To load those JavaScript files, set the handle of any default scripts as a dependency.
    wp_enqueue_script(
        'mindset-scroll-to-top', 
        get_theme_file_uri( 'assets/js/mindset-scroll-to-top.js' ), 
        array(), 
        wp_get_theme()->get( 'Version' ), //'20250127'
        array( 'strategy' => 'defer' )
    );

    if(is_page('contact')){
       wp_enqueue_script(
            'scroll-top-color-change-contact',
            get_theme_file_uri('assets/js/scroll-top-color-change-contact.js'),
            array(),
            wp_get_theme()->get( 'Version' ), //'20250127'
            array( 'strategy' => 'defer' )
       );
    }

}
add_action( 'wp_enqueue_scripts', 'mindset_enqueues' );


function mindset_setup() {
	add_editor_style( get_stylesheet_uri() );

        // Crop images to 400px by 500px
    add_image_size( '400x500', 400, 500, true );

    // Crop images to 200px by 250px
    add_image_size( '200x250', 200, 250, true );
    
    // Crop images to 400px by 500px
    add_image_size( '400x200', 400, 200, true );

    // Crop images to 200px by 250px
    add_image_size( '800x400', 800, 400, true );

}
add_action( 'after_setup_theme', 'mindset_setup' );

//Add New Sizes to UI - Code
function mindset_add_custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'400x500' => __( '400x500', 'mindset-theme' ),
		'200x250' => __( '200x250', 'mindset-theme' ),
        '400x200' => __( '400x200', 'mindset-theme' ),
		'800x400' => __( '800x400', 'mindset-theme' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'mindset_add_custom_image_sizes' );



