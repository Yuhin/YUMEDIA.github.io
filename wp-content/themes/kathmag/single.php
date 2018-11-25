<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kathmag
 */

	get_header();

	$sidebar_position = get_post_meta( absint( get_the_ID() ), 'sidebar', true );

    if( empty( $sidebar_position ) ) {
        $sidebar_position = 'right';
    }

?>
	<div class="left_and_right_sidebar_wrapper">
        <div class="km_container">
            <?php
                do_action( 'kathmag_breadcrumb' );
            ?>
            <div class="row">
            	<?php
            		$class = null;
            		if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar-1' ) ) {
            			$class = 'col-md-8 col-sm-12 col-xs-12 sticky_portion';
            		} else {
            			$class = 'col-md-12 col-sm-12 col-xs-12';
            		}

            		if( $sidebar_position == 'left' ) {
            			get_sidebar();
            		}
            	?>
                <div class="<?php echo esc_attr( $class ); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <section class="single single_page_layout_one">
                                <?php
                                	while( have_posts() ) :

                                		the_post();

                                		get_template_part( 'template-parts/content', 'single' );

		                                ?>
		                                <div class="next_and_previous_posts">
		                                    <div class="row">
		                                        <div class="col-sm-12">
		                                            <?php
		                                            	the_post_navigation();
		                                            ?>
		                                        </div><!-- .col-* -->
		                                    </div><!-- .row -->
		                                </div><!-- .next_and_previous_posts -->
		                                <?php

	                                	get_template_part( 'template-parts/content', 'related' );

                                        $enable_comment = kathmag_get_option( 'kathmag_enable_comments' );

                                        if( $enable_comment == 1 ) :

    	                                	// If comments are open or we have at least one comment, load up the comment template.
    										if ( comments_open() || get_comments_number() ) :
    											comments_template();
    										endif;

                                        endif;

									endwhile;
                                ?>
                            </section><!-- .single.single_page_layout_one -->
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.content-area -->
                </div><!-- .col-*.sticky_portion -->
                <?php
                	if( $sidebar_position == 'right' ) {
                		get_sidebar();
                	}
                ?>
            </div><!-- .row -->
        </div><!-- .km_container -->
    </div><!-- .left_and_right_sidebar_wrapper -->
<?php
get_footer();
