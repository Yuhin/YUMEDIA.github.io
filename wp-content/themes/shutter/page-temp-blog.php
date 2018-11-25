<?php
/*
Template Name: Blog
*/
?>
<?php get_header();?>
            <?php 
            if ( get_query_var('paged') )
            $paged = get_query_var('paged');
            elseif ( get_query_var('page') )
            $paged = get_query_var('page');
            else
            $paged = 1;
            $args = array(
            'post_type' => 'post',
            'paged' => $paged );

            query_posts($args);   
            ?>
            <?php if (have_posts()) : ?>
            <div class="grid">
                <?php while (have_posts()) : the_post();  ?>
                <!-- begin .post -->
                <div class="grid-item">
                    <!-- begin .post-thumb -->
                        <?php if(has_post_thumbnail()): the_post_thumbnail('blog-thumb', array('class'=>'')); else: ?><?php endif; ?>
                    <!-- end .post-thumb -->
                    <div class="grid-white-content">      
                        <span class="category"><?php the_category(', '); ?></span>  
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> 
                        <div class="by"><?php _e('by','site5framework') ?> <?php the_author_posts_link(); ?></div>
                        <i class="fa fa-ellipsis-h"></i>
                        <span class="comments_number"><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a></span>
                    </div>
                </div>
                <!-- end .post -->
                <?php endwhile; ?>
            </div>
            <!-- begin #pagination -->
            <?php if (function_exists("emm_paginate")) {
                    emm_paginate();
                 } else { ?>
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('Older') ?></div>
                <div class="alignright"><?php previous_posts_link('Newer') ?></div>
            </div>
            <?php } ?>
            <!-- end #pagination -->
            <?php endif;?>

<?php get_footer(); ?>