<?php get_header(); ?>

			<h3>
                <?php if (is_category()) { ?>
                        <?php _e("Posts Categorized", "site5framework"); ?> / <span><?php single_cat_title(); ?></span>
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
                        <?php _e("Search Results", "site5framework"); ?> / <span><?php echo esc_attr(get_search_query()); ?></span>
                <?php } ?>
            </h3>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<!-- begin .post -->
			<article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

                    <!-- begin .post-meta -->
                    <div class="meta">
                        <span class="post-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?> <?php _e('by','site5framework') ?> <?php the_author_posts_link(); ?></span>

                        <span class="post-date"> | <?php echo get_the_date(n); ?>.<?php echo get_the_date(d); ?>.<?php echo get_the_date(Y); ?></span>
                    </div>
                    <!-- end .post-meta -->

                    <div class="post_content">
                    <?php the_excerpt(); ?>
                    </div>
            </article>
			<!-- end .post -->

			<?php endwhile; ?>
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

<div class="clear"></div>
<?php get_footer(); ?>