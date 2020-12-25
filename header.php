<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- read ress.css -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/filipelinhares/ress/master/dist/ress.min.css">
    <!-- read fawe -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>techmeets_winter_seminar</title>
    <?php wp_head() ?>
</head>
<body>

<header>
    <!-- <?php get_search_form(); ?> -->
    <?php $args = array(
        'parent' => 0,
        'orderby' => 'term_order',
        'order' => 'ASC'
    );
    $categories = get_categories( $args );
    // echo var_dump($categories);
    ?>

    <!-- category -->
    <?php
    foreach( $categories as $category ):
    ?>
        <li>
            <a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name; ?></a>
        </li>
    <?php endforeach; ?>

    <!-- links -->
    <?php 
        wp_nav_menu(array(
            'theme_location' => 'header-nav'
        ));
    ?>


    
</header>