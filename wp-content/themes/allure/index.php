<?php get_header();?>
            <?php if(is_home()): ?>
            <div class="large_intro" style="background-image: url(<?php if(of_get_option('homepageimg')) : echo of_get_option('homepageimg'); else: echo get_stylesheet_directory_uri().'/img/large.jpg'; endif;?>);">
               <?php if(of_get_option('homepagetext')) : echo '<h1>'.nl2br(of_get_option('homepagetext')).'</h1>'; endif;?>
	        </div>
	        <?php if(of_get_option('newstories')): ?>
	        <div class="article_grid clearfix">
                <h2 class="article_grid_title"><?php echo of_get_option('newstories_title'); ?></h2>
                <?php
                    $args = array(
                        'post_type'  => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 3,
                        'meta_query' => array(
                            array(
                                'key'     => 'allure_f_is_featured',
                                'value'   => 'on'
                            ),
                        ),
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) :
                        while($query->have_posts()) :
                            $query->the_post();
                    ?>
                        <div style="background-image: url(<?php  echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);" class="article_grid_item">
                            <div class="article_data">
                                <div class="categories">
                                <?php
                                $output = '';
                                foreach((get_the_category()) as $category) {
                                    $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                                }
                                echo $output;
                                ?>
                                </div>
                                <h3 class="post_title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="post_title"><?php the_title();?></a>
                                </h3>
                            </div>
                        </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
	        </div>
	        <?php endif; ?>
	        <?php if(of_get_option('hotstories')): ?>
	        <div class="article_grid clearfix">
                <h2 class="article_grid_title"><?php echo of_get_option('hotstories_title'); ?></h2>
                <?php
                    $args = array(
                        'post_type'  => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 3,
                        'meta_query' => array(
                            array(
                                'key'     => 'allure_f_is_featured',
                                'value'   => 'on'
                            ),
                            array(
                                'key'     => 'allure_f_is_hot',
                                'value'   => 'on'
                            ),
                        ),
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) :
                        while($query->have_posts()) :
                            $query->the_post();
                    ?>
                        <div style="background-image: url(<?php  echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);" class="article_grid_item">
                            <div class="article_data">
                                <div class="categories">
                                <?php
                                $output = '';
                                foreach((get_the_category()) as $category) {
                                    $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                                }
                                echo $output;
                                ?>
                                </div>
                                <h3 class="post_title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="post_title"><?php the_title();?></a>
                                </h3>
                            </div>
                        </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
	        </div>
	        <?php endif; ?>
	        <?php endif; ?>
<?php get_footer(); ?>