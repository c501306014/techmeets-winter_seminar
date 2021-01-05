<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class=" col l6 s12">
                <h5 class="white-text">Footer Content</h5>    
                <p class="grey-text text-lighten-4">You can use rows and columns her to organize your footer content</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5>タグ一覧</h5>
                <!-- tag list -->
                <ul>
                    <?php $tags = get_tags();
                        foreach( $tags as $tag):?>
                        <li><a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>    
    <div class="footer-copyright">
        <div class="container">
            @2020 copyright text
        </div>
    </div>
</footer>


<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<?php wp_footer() ?>    
</body>
</html>