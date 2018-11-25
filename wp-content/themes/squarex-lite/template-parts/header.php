<?php
/**
 * @package Squarex
 */
?>

<?php
	/**
	 * Archives
	 */
	if (  is_archive() || !is_home() && !is_singular() ) { ?>
<header class="page-header wrap">
		<h1 class="page-title">

		<?php
			if ( is_category() ) :
				single_cat_title();

			elseif ( is_tag() ) :
				_e( 'Tag: ', 'squarex-lite' );
				single_tag_title();

			elseif ( is_author() ) :
				the_post();
				printf( __( 'Author: %s', 'squarex-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
				rewind_posts();

			elseif ( is_day() ) :
				printf( __( 'Day: %s', 'squarex-lite' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Month: %s', 'squarex-lite' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Year: %s', 'squarex-lite' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'squarex-lite' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'squarex-lite');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'squarex-lite' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'squarex-lite' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'squarex-lite' );

			elseif ( is_search() ) :
				_e( 'Search Results for:', 'squarex-lite' );

			elseif ( is_404() ) :
				_e( 'Error 404: Not Found', 'squarex-lite' );
			else :
				_e( 'Archive', 'squarex-lite' );
			endif;
		?>
		</h1>

		<?php
			// Show an optional term description.
			$term_description = term_description();

				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;

	/**
	 * Search
	 */
	if ( is_search() ) { ?>
	<span><?php printf( __( '%s', 'squarex-lite' ), '<em>' . get_search_query() . '</em>' ); ?></span>
<?php
	} ?>
</header>
<?php

	} // is_archive() ?>

<?php
	/**
	 * Home and Posts page
	 */
	if ( is_home() && get_theme_mod( 'squarex_title_blog' ) ) { ?>
		<header class="page-header wrap">
			<h1 class="page-title"><?php echo esc_html( get_theme_mod( 'squarex_title_blog', 'Blog' ) ); ?></h1>
		</header>
<?php
	} ?>


<?php
	/**
	 * Attachment Page
	 */
	if ( is_attachment() ) { ?>
<header class="page-header wrap">
	<?php
		the_title( '<h1 style="display:inline-block;">', '</h1>' ); ?>

	<nav id="single-nav">
		<div id="single-nav-right"><?php previous_image_link('%link', '<i class="fa fa-chevron-left"></i>', false); ?></div>
		<div id="single-nav-left"><?php next_image_link('%link', '<i class="fa fa-chevron-right"></i>', false); ?></div>
	</nav><!-- /single-nav -->

<?php
	} ?>
</header>

	<?php if ( is_singular() && has_post_thumbnail() && !has_post_format() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'squarex-big' );
			if ( $thumbnail ) { ?>
<div class="entry-cover-thumbnail" style="background: url(<?php echo $thumbnail[0]; ?>);background-position: 50%;background-size: cover;"></div>
<?php
			}
	endif; ?>