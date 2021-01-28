<?php get_header(); ?>

<section>
    <main>
        <h1><?php single_cat_title(); ?></h1>
        <div>
            <?php
            if (category_description()) :
                echo category_description();
            endif;
            ?>
        </div>

        <!-- パンくずメニュー -->
        <a href="<?php bloginfo('url'); ?>">TOP</a>&nbsp;>&nbsp;
        <?php $cat = get_the_category();
        echo get_category_parents($cat[0], true, '&nbsp;'); ?>
        <!-- /パンくずメニュー -->

        <div class="container">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                    get_template_part('/src/articlelist');
                endwhile;
            endif;
            ?>
            <!-- page-nation -->
            <div class="pagination-box">
                <?php if (function_exists('responsive_pagination')) {
                    responsive_pagination($wp_query->max_num_pages);
                } ?>
            </div>
        </div>
    </main>
</section>
<?php get_footer(); ?>