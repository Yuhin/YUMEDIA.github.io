<?php get_header(); ?>
    <div id="archive-title">
        <?php if (is_category()) { ?>
                <?php _e("Browsing posts in:", "site5framework"); ?> / <span><?php single_cat_title(); ?></span>
        <?php } elseif (is_tag()) { ?>
                <?php _e("Posts Tagged", "site5framework"); ?> / <span><?php single_cat_title(); ?></span>
        <?php } elseif (is_author()) { ?>
                <?php _e("Posts By", "site5framework"); ?> / <span><?php the_author_meta('display_name', $post->post_author) ?> </span>
        <?php } elseif (is_day()) { ?>
                <?php _e("Daily Archives", "site5framework"); ?> / <span><?php the_time('l, F j, Y'); ?></span>
        <?php } elseif (is_month()) { ?>
                <?php _e("Monthly Archives", "site5framework"); ?> / <span><?php the_time('F Y'); ?></span>
        <?php } elseif (is_year()) { ?>
                <?php _e("Yearly Archives", "site5framework"); ?> / <span><?php the_time('Y'); ?></span>
        <?php } elseif (is_search()) { ?>
                <?php _e("Search Results For", "site5framework"); ?> / <span><?php echo esc_attr(get_search_query()); ?></span>
        <?php } ?>
    </div>
    
    <?php if (have_posts()) : ?>
            <div class="grid">
                <?php while (have_posts()) : the_post(); ?>
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