<?php
/**
 * Admin screen theme Welcome
 * @package Squarex
 */

class Squarex_Welcome {

	public $minimum_capability = 'edit_theme_options';

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		//add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'load-themes.php', array( $this, 'squarex_activation_admin_notice' ) );
	}

	/**
	 * Adds admin notice
	 */
	public function squarex_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'squarex_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display admin notice
	 */
	public function squarex_welcome_admin_notice() {
		?>
			<div class="updated notice">
			<p><strong><?php echo esc_html__( 'Thanks for choosing Squarex!', 'squarex-lite' ); ?></strong></p>
			<p><?php echo esc_html__( 'This theme has built-in Contextual Help for most admin screens.', 'squarex-lite' ); ?>&nbsp;<?php echo esc_html__( 'To get Help right now, click on the tab Help on the top admin bar.', 'squarex-lite' ); ?><br /><?php echo sprintf( esc_html__( 'Get a brief setup instructions on the %swelcome screen%s.', 'squarex-lite' ), '<a href="' . esc_url( admin_url( 'themes.php?page=squarex-about' ) ) . '">', '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=squarex-about' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Welcome!', 'squarex-lite' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Register the Theme Pages which are later hidden but these pages
	 * are used to render the Welcome and subpages.
	 */
	public function admin_menus() {
		add_theme_page(
			__( 'Squarex Theme', 'squarex-lite' ),
			__( 'Squarex Theme', 'squarex-lite' ),
			$this->minimum_capability,
			'squarex-about',
			array( $this, 'about_screen' )

		);
	}

	/**
	 * Render About Screen
	 */
	public function about_screen() {
			// Get theme version
			$theme_data = wp_get_theme();
			$theme_version = $theme_data->get( 'Version' );
			$theme_name = $theme_data->get( 'Name' ); ?>

		<div class="wrap">
			<h2><?php echo $theme_name; ?> <?php _e( 'Theme', 'squarex-lite' ); ?> v<?php echo $theme_version; ?></h2>
			<p class="about-description"><?php _e( 'Thank you for choosing Squarex WordPress theme for your website!', 'squarex-lite' ); ?></p>

		    <div class="welcome-panel">
		        <div class="welcome-panel-content">

			<h3><?php _e( 'Welcome to', 'squarex-lite' ); ?> <?php echo $theme_name; ?>!</h3>

			<div class="about-description">
				<?php _e( 'Here are some links to get you started and optional theme-setup tasks:', 'squarex-lite' ); ?>
			</div>

				<div class="welcome-panel-column-container">

					<div class="welcome-panel-column">
						
						<h4><?php _e( 'Get Started', 'squarex-lite' ); ?></h4>

				<?php if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_on_front' ) ) : ?>
						<p><?php echo sprintf( esc_html__( 'Squarex includes a page templates. Assign the Home page templates (see Page Attributes box) when editing the your %sfront page%s.', 'squarex-lite' ), '<a href="' . esc_url( get_edit_post_link( get_option( 'page_on_front' ) ) ) . '">', '</a>' ); ?></p>
				<?php endif; ?>

				<?php if ( 'posts' == get_option( 'show_on_front' ) && get_option( 'page_on_front' ) ) : ?>
						<p><?php _e( 'Set your Front page, go to', 'squarex-lite' ); ?> <a href="<?php echo admin_url( 'options-reading.php' ); ?>"><?php _e( 'Front page displays', 'squarex-lite' ); ?></a></p>
				<?php endif; ?>

				<?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
						<p><?php _e( 'Set you Posts page, go to', 'squarex-lite' ); ?> <a href="<?php echo admin_url( 'options-reading.php' ); ?>"><?php _e( 'Front page displays', 'squarex-lite' ); ?></a></p>
				<?php endif; ?>

				<?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_on_front' ) ) : ?>
						<p><?php _e( 'Set your Front page, go to', 'squarex-lite' ); ?> <a href="<?php echo admin_url( 'options-reading.php' ); ?>"><?php _e( 'Front page displays', 'squarex-lite' ); ?></a></p>
				<?php endif; ?>

				<?php if ( 'posts' == get_option( 'show_on_front' ) && ! get_option( 'page_on_front' ) ) : ?>
						<p><?php _e( 'To select page as Front page you will need to create a new page, go to ', 'squarex-lite' ); ?><a href="<?php echo admin_url( 'post-new.php?post_type=page' ); ?>"><?php _e( 'Add New Page', 'squarex-lite' ); ?></a></p>
				<?php endif; ?>

				<?php if ( !has_nav_menu('primary') ) : ?>
						<p><?php _e( 'Set you ', 'squarex-lite' ); ?><a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php _e( 'main Menu', 'squarex-lite' ); ?></a></p>
				<?php endif; ?>

						<h4><?php _e( 'Get Premium Squarex', 'squarex-lite' ); ?></h4>

						<p><?php _e( 'Get more features and support with Premium Squarex!', 'squarex-lite' ); ?></p>
						<p><a href="<?php echo esc_url( 'http://dinevthemes.com/themes/squarex/' ); ?>" class="button button-primary" target="blank"><?php _e( 'Get Support', 'squarex-lite' ); ?></a></p>

					</div>

					<div class="welcome-panel-column">

						<h4><?php _e( 'Next Steps', 'squarex-lite' ); ?></h4>
						
						<p><?php _e( 'Squarex includes a custom widgets is marked Squarex, go to ', 'squarex-lite' ); ?><a href="<?php echo admin_url( 'widgets.php' ); ?>"><?php _e( 'Manage widgets', 'squarex-lite' ); ?></a></p>


					<?php if ( current_user_can( 'customize' ) ): ?>
						<p><?php _e( 'Using the WordPress Customizer you can tweak appearance.', 'squarex-lite' ); ?></p>
						<p><a href="<?php echo wp_customize_url(); ?>" class="button"><?php esc_html_e( 'Customize', 'squarex-lite' ); ?></a></p>
					<?php endif; ?>

					</div>

					<div class="welcome-panel-column welcome-panel-last">

						<h4><?php _e( 'Plugins', 'squarex-lite' ); ?></h4>

						<p><?php _e( 'Below you will find links to plugins we recommend. None of these plugins are required for theme to work, they add additional functionality.', 'squarex-lite' ); ?></p>

						<ul style="list-style: none; margin: 20px 0 20px 0;">
							<li><span style="font-weight:bold">JetPack WordPress:</span> <a href="<?php echo esc_url( 'http://jetpack.me/' ); ?>">JetPack</a></li>
							<li><span style="font-weight:bold">Shortcodes:</span> <a href="<?php echo esc_url( 'http://gndev.info/shortcodes-ultimate/' ); ?>">Shortcodes Ultimate</a></li>
							<li><span style="font-weight:bold">Contact Forms:</span> <a href="<?php echo esc_url( 'http://wordpress.org/plugins/contact-form-7/' ); ?>">Contact Form 7</a></li>
						</ul>
					</div>

				</div><!-- .welcome-panel-column-container -->

	                        </div><!-- .welcome-panel-content -->
	                    </div>

		</div><!-- .wrap -->

		<?php
	} // about_screen
	
}
new Squarex_Welcome();