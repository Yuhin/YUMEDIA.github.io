<?php get_header();?>           
            <?php query_posts( 'paged='.get_query_var( 'paged' ).'&cat='.of_get_option('homepage_category') ); ?>
            <?php if (have_posts()) : ?>
            <div class="grid">
                <?php while (have_posts()) : the_post();  ?>
                <!-- begin .post -->
                <div class="grid-item">
                    <!-- begin .post-thumb -->
                        <?php if(has_post_thumbnail()): the_post_thumbnail('blog-thumb', array('class'=>'desaturate')); else: ?><?php endif; ?>
                    <!-- end .post-thumb --> 
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="grid-content">
                        <i class="fa fa-ellipsis-h"></i>
                        <h2><?php the_title(); ?></h2>                        
                    </a>           
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