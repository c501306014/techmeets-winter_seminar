<?php get_header(); ?>

<section>
<main>


<p>
    <?php single_tag_title(); ?>記事の一覧です
</p>

<?php 
if(have_posts()): while(have_posts()): the_post();
    get_template_part( '/src/articlelist' );
endwhile; endif; 
?>

<!-- page-nation -->
<div class="pagination-box">
    <?php if(function_exists('responsive_pagination')){
        responsive_pagination($wp_query->max_num_pages);
    } ?>
</div>

</main>
</section>
<?php get_footer(); ?>