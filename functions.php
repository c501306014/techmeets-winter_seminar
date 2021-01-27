<?php

// read stylesheet, javascript
function my_scripts()
{
    wp_enqueue_style("stylesheet", get_template_directory_uri() . "/css/stylesheet.css", array(), '1.0.0', 'all');
    wp_enqueue_script("materialize", get_template_directory_uri() . "/js/materialize_contact_form.js", array(), false, true);
}
add_action('wp_enqueue_scripts', 'my_scripts');

// add customize functions
function my_setup()
{
    // i-chatch image
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    // custom menu
    register_nav_menus(array(
        'header-nav' => 'ヘッダーナビゲーション',
    ));
}
add_action('after_setup_theme', 'my_setup');


// add widget
function my_theme_widgets_init()
{
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebar-widgets'
    ));
    register_sidebar(array(
        'name' => 'Header Widgets',
        'id' => 'header-widgets'
    ));
}
add_action('widgets_init', 'my_theme_widgets_init');

// custom pagintion 
function responsive_pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    // get page info
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<ul class="pagination">';
        // to top
        echo ($paged == 1) ? '<li class="disabled"><a href="#!"><i class="material-icons">first_page</i></a></li>' : '<li class="waves-effect"><a href="' . get_pagenum_link(1) . '"><i class="material-icons">first_page</i></a></li>';
        // prev 1 page
        echo ($paged == 1) ? '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>' : '<li class="waves-effect"><a href="' . get_pagenum_link($paged - 1) . '"><i class="material-icons">chevron_left</i></a></li>';
        // to number page
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? '<li class="active"><a href="#!">' . $i . '</a></li>' : '<li class="waves-effect"><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
            }
        }
        // next 1 page
        echo ($paged == $pages) ?  '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>' : '<li class="waves-effect"><a href="' . get_pagenum_link($paged + 1) . '"><i class="material-icons">chevron_right</i></a></li>';
        // to last
        echo ($paged == $pages) ?  '<li class="disabled"><a href="#!"><i class="material-icons">last_page</i></a></li>' : '<li class="waves-effect"><a href="' . get_pagenum_link($pages) . '"><i class="material-icons">last_page</i></a></li>';
        echo '</ul>';
    }
}
