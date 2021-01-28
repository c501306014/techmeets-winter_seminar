<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <!-- read ress.css -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/filipelinhares/ress/master/dist/ress.min.css">
    <!-- read fawe -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- Google icon font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <title>wordpress-sample-site</title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <!-- logo -->
        <div id="header-logo">
            <?php the_custom_logo();
            if (!has_custom_logo()) {
                bloginfo('name');
            } ?>
        </div><!-- /logo -->



    </header>

    <nav>
        <div class="nav-wrapper">
            <!-- search form -->
            <?php get_search_form(); ?>
            <!-- category -->
            <?php $args = array(
                'parent' => 0,
                'orderby' => 'term_order',
                'order' => 'ASC'
            );
            $categories = get_categories($args);
            ?>
            <div>
                <ul id="dropdown2" class="dropdown-content">
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <a class='dropdown-button btn' data-beloworigin="true" href='#' data-activates='dropdown2'>カテゴリー</a>
            </div>
            <!-- links -->
            <?php if (is_active_sidebar('header-widgets')) : ?>
                <ul class="right hide-on-med-and-down">
                    <?php dynamic_sidebar('header-widgets'); ?>
                </ul>
            <?php else : ?>
                <h1>not found sidebar</h1>
            <?php endif; ?>
            <!-- mobile hamburger menu -->
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <!-- links-mobile -->
    <?php if (is_active_sidebar('header-widgets')) : ?>
        <ul id="slide-out" class="side-nav">
            <?php dynamic_sidebar('header-widgets'); ?>
        </ul>
    <?php else : ?>
        <h1>not found sidebar</h1>
    <?php endif; ?>