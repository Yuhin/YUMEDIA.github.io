<?php get_header();?>           
        <div class="main">
                <!-- begin .col-left -->
                <div class="col-left">

                <!-- begin .post -->
                <article <?php post_class(); ?>>
                    <h1><?php the_author(); ?></h1>

                    <div class="post-content">
                        <?php the_author_description(); ?> 
                    </div>

                </article>
                <!-- end .post -->

                </div>
                <!-- end colleft -->   
            <?php get_sidebar(); ?>    
        </div>
<?php get_footer(); ?>