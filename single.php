<?php get_header() ?>

<?php if(have_posts()): while(have_posts()) : the_post(); ?>

<div class="post-title">
    <h1><?php bloginfo('name'); wp_title('|', true, 'left'); ?></h1>
</div>

<!-- パンくずメニュー -->
<div>
    <a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a>&nbsp;>&nbsp;
    <?php $cat = get_the_category();
        echo get_category_parents( $cat[0], true, '&nbsp;>&nbsp;' ); ?>
    <?php the_title(''); ?>
</div>
<!-- パンくずメニュー -->


<div class="post-image">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
    </a>
</div>

<div class="post-meta">
    <p><?php the_time('Y年m月d日'); ?> </p>
    <p><?php the_tags(); ?> </p>
    <p>カテゴリー：<?php the_category(','); ?> </p>
</div>

<section>
    <?php the_content(); ?>
</section>

<?php previous_post_link('&laquo; %link', '前の記事へ');?>
<?php next_post_link('%link &raquo;', '後の記事へ');?>

<?php endwhile;endif; ?>

<?php get_footer() ?>