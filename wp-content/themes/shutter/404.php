<?php get_header();?>           
        <div class="main">
                <!-- begin .col-left -->
                <div class="col-left">

                <!-- begin .post -->
                <article <?php post_class(); ?>>
                    <h2><?php _e('404 Not Found','site5framework') ?></h2>

                    <div class="post_content">
                    <?php _e("The article you were looking for was not found, but maybe try looking again!", "site5framework"); ?>
                    </div>

                </article>
                <!-- end .post -->

                </div>
                <!-- end colleft -->
            <?php get_sidebar(); ?>    
        </div>
<?php get_footer(); ?>