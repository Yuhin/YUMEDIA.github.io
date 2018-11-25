<?php get_header();?>           
        <div class="main">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); $count++; global $post; ?>
                <!-- begin .post-thumb -->
                <div class="post-thumb">
                    <?php if(has_post_thumbnail()): the_post_thumbnail('full', array('class'=>'blog-thumb')); else: ?><?php endif; ?>
                </div>
                <!-- end .post-thumb -->
                <!-- begin .col-left -->
                <div class="col-left">

                <!-- begin .post -->
                <article <?php post_class(); ?>>
                    <div class="meta clearfix">
                        <span><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a></span>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <!-- begin .post-meta -->
                    <div class="by">
                        <?php _e('by','site5framework') ?> <?php the_author_posts_link(); ?>
                    </div>
                    <!-- end .post-meta -->

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <?php comments_template(); ?>
                </article>
                <!-- end .post -->

                </div>
                <!-- end colleft -->    
            <?php endwhile; ?>
            <?php endif;?>
            <?php get_sidebar(); ?>    
        </div>
<?php get_footer(); ?>