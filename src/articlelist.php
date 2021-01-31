    <div class="article-list-item">
        <a class="post-image" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a>
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
            echo wp_trim_words($content, 30,);
            ?>
        </div>
    </div>