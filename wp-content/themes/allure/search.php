<?php get_header(); ?>

			<h3><?php _e("Search Results", "site5framework"); ?> / <span><?php echo esc_attr(get_search_query()); ?></span></h3>

			<?php if (have_posts()) : $count = 0; ?>

			<?php while (have_posts()) : the_post(); $count++; global $post; ?>

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

		<?php endif; ?>

<div class="clear"></div>

<?php get_footer(); ?>