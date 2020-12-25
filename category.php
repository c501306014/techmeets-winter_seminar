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
        <?php if( have_posts() ):while( have_posts() ):the_post(); ?>

        <div class="item">
            <div class="post-image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                </a>
            </div>
            <div class="post-title">
                <h2><?php the_title(); ?></h2>
            </div>
            <div class="post-meta">
                <p><?php the_time('Y年m月d日'); ?> </p>
                <p><?php the_tags(); ?> </p>
                <p>カテゴリー：<?php the_category(','); ?> </p>
            </div>
            <div class="excerpt">
                <?php 
                $content = get_the_content();
                echo wp_trim_words( $content, 30,);
                ?>
            </div>
        </div>
        <?php endwhile; endif; ?>
        <?php the_posts_pagination(); ?>
    </div>    
    



</div>
<?php get_footer(); ?>