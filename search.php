<?php get_header(); ?>

<section>
    <main>
        <h1>検索結果</h1>

        <?php if (have_posts()) :
            if (isset($_GET['s']) && empty($_GET['s'])) {
                // 検索キーワードが未入力の場合のテキストを指定
                echo '検索キーワード未入力';
            } else {
                // 検索キーワードと該当件数を表示
                echo '"' . $_GET['s'] . '"の検索結果：' . $wp_query->found_posts . '件';
            }
        ?>

            <ul>
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </li>

                <?php endwhile; ?>
                <!-- page-nation -->
                <div class="pagination-box">
                    <?php if (function_exists('responsive_pagination')) {
                        responsive_pagination($wp_query->max_num_pages);
                    } ?>
                </div>
            </ul>

        <?php
        else :
            echo "検索されたキーワードにマッチする記事はありませんでした。";
        endif;
        ?>

    </main>
</section>


<?php get_footer() ?>