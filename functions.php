<?php 

// read stylesheet, javascript
function my_scripts(){
    wp_enqueue_style( "stylesheet", get_template_directory_uri()."/css/stylesheet.css", array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

// add customize functions
function my_setup(){
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_setup' );


// add widget
function my_theme_widgets_init(){
    register_sidebar( array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebar-widgets'
    ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );