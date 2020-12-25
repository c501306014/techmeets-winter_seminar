<?php get_header() ?>

<section id="post-list">
    <h1>最新記事</h1>
    <div class="container">
        <?php
        if( have_posts() ):while( have_posts() ):the_post(); 
            get_template_part( '/src/articlelist' );
        endwhile; endif; 
        the_posts_pagination(); ?>
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