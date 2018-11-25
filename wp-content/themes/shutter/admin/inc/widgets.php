<?php
/*********************************************************************************************

Register Global Sidebars

*********************************************************************************************/
if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Sidebar',
	'before_widget' => '<div class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));


/*********************************************************************************************
Register Latest Portfolio Widget
*********************************************************************************************/
class site5framework_latest_portfolio_widget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Site5 Latest Portfolio Entry', array( 'description' => 'Site5 Framework latest portfolio entry.' ) );
    }
    /*
     * Displays the widget form in the admin panel
     */
    function form( $instance ) {
    	$widget_title = esc_attr( $instance['widget_title'] );
        $widget_description = esc_attr( $instance['widget_description'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Widget Title:', 'site5framework') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo $widget_title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'widget_description' ); ?>"><?php _e('Widget Description:', 'site5framework') ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'widget_description' ); ?>" name="<?php echo $this->get_field_name( 'widget_description' ); ?>" cols="20" rows="3"><?php echo $widget_description; ?></textarea>
        </p>

<?php
    }
/*
 * Renders the widget in the sidebar
 */
function widget( $args, $instance ) {
echo $args['before_widget'];
?>

         <?php echo $args['before_title']; ?><?php echo $instance['widget_title']; ?><?php echo $args['after_title']; ?>

        <div class="latestportfolio">
            <?php
                $portfoliobits_paged = 1;
                $pb = new WP_Query("order=DESC&orderby=date&post_type=portfolio&paged={$portfoliobits_paged}&posts_per_page=1");
                if($pb->have_posts()) {
                    while ( $pb->have_posts() ) {
                        $pb->the_post();
                        echo '<p><b>'.get_the_title().'</b></p>';
                        if(has_post_thumbnail()) echo get_the_post_thumbnail(get_the_ID(),'portfolio-bits');
                        echo '<p>'.$instance['widget_description'].'</p>';
                    }
                }
                wp_reset_postdata();
            ?>
            
        </div>

        <?php
        echo $args['after_widget'];
    }
};
// Initialize the widget
add_action( 'widgets_init', create_function( '', 'return register_widget( "site5framework_latest_portfolio_widget" );' ) );

?>