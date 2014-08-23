<?php


//Remove before sending to production
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);


// Custom character length for the_excerpt
function thoughts_custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'thoughts_custom_excerpt_length', 999 );

// Removes the [...] from excerpt
function thoughts_new_excerpt_more( $more ) {
	return ' ';
}
add_filter('excerpt_more', 'thoughts_new_excerpt_more');


//Register the menu through WP
function thoughts_register_theme_menu() {
    register_nav_menu( 'primary', 'Main Navigation Menu' );
}
add_action( 'init', 'thoughts_register_theme_menu' );


if ( ! function_exists( 'thoughts_paginate' ) ) :
//This function creates pagination if 
//there are more then one page of aricles
function thoughts_paginate() {
    global $wp_query;
     
    $total_pages = $wp_query->max_num_pages;
     
    if ($total_pages > 1){
     
        $current_page = max(1, get_query_var('paged'));
        
        echo '<div class="paginate">';

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => 'Prev',
            'next_text' => 'Next'
        ));

        echo '</div>';
    }
}
endif; 

// Registers and enqueues all of our scripts and styles
function thoughts_register_scripts() {
	wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/components/modernizr/modernizr.js', array('jquery'), '1.0');
    wp_enqueue_script( 'modernizr' );

    wp_register_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array('jquery', 'modernizr'), '1.0');
    wp_enqueue_script( 'app' );
    
    wp_register_style( 'app', get_template_directory_uri() . '/assets/css/app.css', array('bootstrap', 'bootstrap_theme'), '1.0', 'all' );
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/js/components/bootstrap/dist/css/bootstrap.min.css', array(), '3', 'all' );
    wp_register_style( 'bootstrap_theme', get_template_directory_uri() . '/assets/js/components/bootstrap/dist/css/bootstrap-theme.min.css', array(), '3', 'all' );
    wp_enqueue_style( 'app' );
}
add_action( 'wp_enqueue_scripts', 'thoughts_register_scripts' );


// Making featured images possible
add_theme_support( 'post-thumbnails' );







