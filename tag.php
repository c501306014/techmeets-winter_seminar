<?php get_header(); ?>

<p>
    <?php single_tag_title(); ?>
    記事の一覧です
</p>

<?php
    if(have_posts()):   while(have_posts()):    the_post();
?>

    <h1>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>    
    </h1>
    <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y年m月d日'); ?></time>
    <p><?php the_category(', '); ?></p>
    <p><?php the_tags(' '); ?></p>

    <!-- アイキャッチ画像 -->
    <?php if(has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
    <?php else: ?>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt=""></a>
    <?php endif; ?>

    <p><?php the_content('Read more'); ?></p>    
<?php endwhile; endif; ?>
<?php the_posts_pagination(); ?>

<?php get_footer(); ?>