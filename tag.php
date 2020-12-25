<?php get_header(); ?>

<p>
    <?php single_tag_title(); ?>記事の一覧です
</p>

<?php 
if(have_posts()): while(have_posts()): the_post();
    get_template_part( '/src/articlelist' );
endwhile; endif; 
the_posts_pagination(); ?>

<?php get_footer(); ?>