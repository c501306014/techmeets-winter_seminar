<?php get_header(); ?>
<h1><?php single_cat_title(); ?></h1>

<div>
    <?php
        if(category_description()):
            echo category_description();
        endif;
    ?>
</div>

<!-- パンくずメニュー -->
<a href="<?php bloginfo('url'); ?>">TOP</a>&nbsp;>&nbsp;
<?php $cat = get_the_category();
echo get_category_parents($cat[0], true, '&nbsp;'); ?>

<div>
    <?php
    $tax_slug = 'category';
    $id = get_query_var('cat');
    $term = get_term($id, $tax_slug);
    ?>

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo home_url('/'); ?>">ホーム</a>
        </li>
        <?php
        $parent_term_id = $term->parent;
        $parent_term = get_category($parent_term_id);
        if($parent_term_id):
        ?>
        <li>
            &nbsp;&gt;&nbsp;
            <a href="<?php get_category_link($parent_term_id) ?>">
                <?php echo $parent_term->name ?>
            </a>
        </li>
        <?php endif; ?>
        <li>
            &nbsp;&gt;&nbsp;
            <a href="<?php get_category_link($term->id) ?>">
                <?php echo $term->name; ?>
            </a>            
        </li>
    </ul>
    <!-- /パンくずメニュー -->

    <div class="container">
        <?php
        if( have_posts() ):while( have_posts() ):the_post();
            get_template_part( '/src/articlelist' );
        endwhile; endif; 
        the_posts_pagination(); ?>
    </div>    
    



</div>
<?php get_footer(); ?>