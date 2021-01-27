<?php get_header() ?>

<section id="post-list">
    <main>
        <h1>最新記事</h1>
        <p>wordpressを使って、ブログや情報発信等の記事を簡単に管理できます。</p>
        <p>カテゴリやタグ毎に記事を管理することができます。</p>
        <p>一度WEBサイトを構築できれば、プログラミング等の知識がなくてもサイトの運用管理を簡単に行うことができます。</p>
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

            <!-- the_posts_pagination(); ?> -->
        </div>
    </main>
</section>


<!-- 
<?php if (is_active_sidebar('sidebar-widgets')) : ?>
    <ul>
        <?php dynamic_sidebar('sidebar-widgets'); ?>    
    </ul>
    <?php else : ?>
        <h1>sidebar あらへんで</h1>
<?php endif; ?>
 -->

<?php get_footer() ?>