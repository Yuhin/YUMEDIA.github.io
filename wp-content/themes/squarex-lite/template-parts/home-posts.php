<?php
/**
 * The template used for Home page
 * @package Squarex
 */
?>


<section id="squarePosts">
 <!-- SquarePost-->
<div id="squareTiles" class="clearfix">

    <?php
        global $post;

        $numberposts = esc_attr( get_theme_mod( 'number_homeposts', 6 ) );

        $args = array(
	'post_status'    => 'publish',
	'post__not_in'   => get_option( 'sticky_posts' ),
	'numberposts' => $numberposts
        );
        $home_posts = get_posts($args);
    ?>
<?php if( $home_posts ) { ?>

<?php
	foreach( $home_posts as $post ) : setup_postdata( $post );
		get_template_part( 'content', 'home-tiles' );
	endforeach;
	wp_reset_postdata(); ?>

<?php } // if( $home_posts ) ?>

</div><!-- #squareTiles -->
</section>