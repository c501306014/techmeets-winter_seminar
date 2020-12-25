<?php get_header() ?>

<section id="post-list">
    <h1>最新記事</h1>
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
</section>

<?php if(is_active_sidebar('sidebar-widgets')):?>
    <ul>
        <?php dynamic_sidebar('sidebar-widgets'); ?>    
    </ul>
    <?php else:?>
        <h1>sidebar あらへんで</h1>
<?php endif; ?>


<?php get_footer() ?>