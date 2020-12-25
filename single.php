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
<!-- /パンくずメニュー -->

<!-- カスタムフィールドメタ情報 -->
<div class="custom-field">
    <p>カスタムフィールドゾーン</p>
    <?php 
        $meta = get_post_meta( get_the_ID(),'html' );
        if($meta){
            foreach ($meta as $val ) {
                echo $val;
            }
        }

        $meta = get_post_meta( get_the_ID(), 'image', );
        if($meta){
            foreach ($meta as $val) {
                echo "<img src='". $val . "' height='150px'> <br>";
            }
        }

        $meta = get_post_meta( get_the_ID(),'text' );
        if($meta){
            foreach ($meta as $val ) {
                echo esc_html( $val ). "<br>";
            }
        }
    ?>
    <p>カスタムフィールドゾーンここまで</p>
</div>
<!-- /カスタムフィールドメタ情報 -->


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

<!-- share links -->
<a href="https://twitter.com/share?
    text=<?php the_title(); ?>
    &url=<?php the_permalink(); ?>">
        <i class="fab fa-twitter"></i>
</a>

<a href="https://www.facebook.com/sharer/sharer.php
?u=<?php the_permalink(); ?>">
<i class="fab fa-facebook-f"></i>
</a>

<?php endwhile;endif; ?>

<!-- 関連記事一覧（タグが同一の記事） -->
<section class="related-posts">
    <?php
    $current_tags = get_the_tags(); 
    if($current_tags):
        foreach ($current_tags as $tag):
            $current_tag_list[] = $tag->term_id;
        endforeach;

        $args = array(
            'tag__in'       => $current_tag_list,
            'post__not_in'  => array($post->ID),    
            'posts_per_page'=> 3,
        );
        $related_posts = new WP_Query($args);
        if($related_posts->have_posts()):
            ?>
            <h3>関連記事</h3>
            <ul class="related-posts-list">
                <?php
                while($related_posts->have_posts()): $related_posts->the_post();
                ?>
                <li class="item">
                    <div class="post-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail();
                            }else{
                            }
                            ?>
                        </a>
                    </div>
                    <div class="post-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="post-meta">
                        <p><?php the_time('Y年m月d日'); ?></p>
                        <p><?php the_tags(); ?></p>
                        <p>カテゴリー：<?php the_category( ',' ); ?></p>
                    </div>
                    <div class="excerpt">
                        <?php 
                        $content=get_the_content();
                        echo wp_trim_words( $content, 30,);
                        ?>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    <?php endif;?>
</section>


<?php get_footer() ?>