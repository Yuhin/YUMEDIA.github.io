<?php
/**
 * Theme Widget Image-Text
 * @package Squarex
 */
add_action('widgets_init', create_function('', 'register_widget("DT_Featured_Widget");'));

class DT_Featured_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'dt_featured_widget',
			'Squarex ' . __( 'Image & Text', 'squarex-lite' ),
			array(
				'classname' => 'dt_featured_widget', 
				'description' => __( 'The image with the title and text.', 'squarex-lite' ),
				'width' => 250,
				'height' => 350
			)
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	function admin_enqueue_scripts( $hook ) {
	    if ( 'widgets.php' == $hook ) {
    		wp_enqueue_media();
    		wp_enqueue_script( 'image_widget', get_template_directory_uri() . '/js/widget-image-txt.js', array( 'jquery', 'media-upload', 'media-views' ), '', true );

    		wp_enqueue_style( 'image_widget_css', get_template_directory_uri() . '/css/widget-image-txt.css' );
        }
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$image = esc_url( $instance['image'] );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$url = esc_url( $instance['url'] );

		$title_string = ( $url ) ? '<a href="' . $url . '">'. $title . '</a>' : $title;
		$image_string = ( $url ) ? '<a href="' . $url . '"><img src="' . $image. '" alt="' . esc_attr( $title ) . '" class="aligncenter" /></a>' : '<img src="' . $image. '" alt="' . esc_attr( $title ) . '" class="aligncenter" />';

		echo $before_widget;
		echo '<div class="image-text-widget">';

		if ( ! empty( $image ) )
			echo $image_string;

		echo '<div class="text-image">';

		if ( $title )
			echo $before_title . $title_string . $after_title;
		?>
			<?php echo ( ! empty( $instance['filter'] ) ) ? wpautop( $text ) : $text; ?>
		<?php
		echo '</div></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['image'] = esc_url( $new_instance['image'] );
		$instance['url'] = esc_url( $new_instance['url'] );

		if ( current_user_can( 'unfiltered_html' ) )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) ); // wp_filter_post_kses() expects slashed

		$instance['filter'] = isset( $new_instance['filter'] );

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'image' => '', 'url' => '' ) );
		extract( $instance );
		$img_tag = ( $image ) ? '<img src="' . esc_url( $image ) . '" alt="" />' : '';
		?>

		<p><?php _e( 'This widget is assigned to create a block with the image, title, and short text.','squarex-lite' ); ?></p>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'squarex-lite' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p><label><?php _e( 'Image:', 'squarex-lite' ); ?></label>
		<span class="widget-image-container"><?php echo $img_tag; ?></span>
		<a href="#" class="select-image"><?php _e( 'Select Image', 'squarex-lite' ); ?></a> | <a href="#" class="delete-image"><?php _e( 'Remove Image', 'squarex-lite' ); ?></a>
		<input class="image-widget-image-container" name="<?php echo $this->get_field_name( 'image' ); ?>" type="hidden" value="<?php echo esc_url( $image ); ?>" />
		</p>

		<p><label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:', 'squarex-lite' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
		</p>

		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $text ); ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked( isset( $filter ) ? $filter : 0 ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e( 'Automatically add paragraphs', 'squarex-lite' ); ?></label>
		</p>
		<?php
	}
}