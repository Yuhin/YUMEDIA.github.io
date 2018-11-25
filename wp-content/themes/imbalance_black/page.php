<?php get_header(); ?> 

            <div id="main">
              <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="article">
                      <?php the_content(); ?>
                	  <?php edit_post_link(__('[Править]'), '<br />', ''); ?>
                </div>
            <?php endwhile; ?>
            <?php else : ?>
                <h1><?php _e("К сожалению, по вашему запросу ничего не найдено."); ?></h1>
            <?php endif; ?>
            </div>
<?php get_footer(); ?>