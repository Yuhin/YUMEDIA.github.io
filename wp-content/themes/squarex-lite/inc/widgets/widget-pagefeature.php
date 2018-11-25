<?php
/**
 * Featured Page Widget
 * @package Squarex
 */
add_action('widgets_init', create_function('', 'register_widget("squarex_featured_page");'));

class squarex_featured_page extends WP_Widget {
    function __construct() {
	parent::__construct(
		'squarex_featured_page',
		__( 'Squarex Featured Page', 'squarex-lite' ),
		array(
		'classname' => 'squarex_featured_page',
		'description' => __( 'Display a featured page header.', 'squarex-lite' )
		)
	);
    }

function widget( $args, $instance ) {
	extract($args);
		$title = ( ! $instance['title'] ? false : apply_filters( 'widget_title', $instance['title'] ) );
		$page_id = ( empty( $instance['page_id'] ) ? '0' : $instance['page_id'] );

		$featured_post_args = array(
			'post_type' => 'page',
			'page_id' => $page_id
		);
		$featured_post = new WP_Query( $featured_post_args );

	if ( $featured_post->have_posts() ) : while ( $featured_post->have_posts() ) : $featured_post->the_post();

	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'squarex-aside' );
		echo $before_widget;
		echo '<div class="featured-page"';
	if ( $thumbnail ) {
		echo ' style="background-image: url(' . $thumbnail[0] . ');"';
	}
		echo '>';
?>
<a href="<?php the_permalink(); ?>" class="cover-link"></a>
<div class="featured-page-overlay">
	<h3>
<?php
	if ( $title ) {
		echo '<span>' . $title . '</span>';
	} ?>

	<?php the_title(); ?>
	</h3>

</div>
<?php
	endwhile;
	endif;
		wp_reset_postdata(); ?>


        		</div><!-- featured-page -->
<?php
	echo $after_widget;
}

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = '' != $new_instance['title'] ? strip_tags( $new_instance['title'] ) : false;
		$instance['page_id'] = strip_tags( $new_instance['page_id'] );

        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => __( 'Featured Page', 'squarex-lite' ), 'page_id' => '' ) );
        $title = strip_tags( $instance['title'] );
        $page_id = strip_tags( $instance['page_id'] );
?>

<p><?php _e( 'This widget will show the title, thumbnail and the announcement of any page on which you want to attract the visitors attention.', 'squarex-lite' ); ?></p>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'squarex-lite' ); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>

			<p>
				<label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e( 'Page:', 'squarex-lite' ); ?></label>

				<?php
				wp_dropdown_pages( array( 
					'depth'            => 0,
					'child_of'         => 0,
					'selected'         => $page_id,
					'echo'             => 1,
					'name'             => $this->get_field_name('page_id'),
					'id'               => $this->get_field_id('page_id')
				) );
				?>
			</p>

<?php
    }
} 