<?php get_header(); ?>

<?php if(have_posts()): 
    while(have_posts()): the_post();
?>

<section>
<main>

<h1><?php the_title(); ?></h1>


    <?php the_content(); ?>    


<?php endwhile; endif;?>

</main>
</section>

<?php get_footer(); ?>