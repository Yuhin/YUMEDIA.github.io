<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Squarex
 */

if ( ! function_exists( 'squarex_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function squarex_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'squarex-lite' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="fa fa-arrow-left"></i>', 'Previous post link', 'squarex-lite' ) . '</span>' ); // %title ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '<span class="meta-nav">' . _x( '<i class="fa fa-arrow-right"></i>', 'Next post link', 'squarex-lite' ) . '</span>' ); // %title ?>

<?php elseif ( $wp_query->max_num_pages > 1 ) : // && ( is_home() || is_category() || is_archive() || is_search() )  ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( 'Older', 'squarex-lite' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer', 'squarex-lite' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // squarex_content_nav

if ( ! function_exists( 'squarex_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function squarex_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'squarex-lite' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'squarex-lite' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'squarex-lite' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<time datetime="<?php comment_time( 'c' ); ?>">
	<?php printf( _x( '%1$s &middot; %2$s', '1: date, 2: time', 'squarex-lite' ), get_comment_date(), get_comment_time() ); ?>
					</time>
	<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">#<?php echo $comment->comment_ID; ?></a>
					<?php edit_comment_link( __( 'Edit', 'squarex-lite' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'squarex-lite' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for squarex_comment()

if ( ! function_exists( 'squarex_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function squarex_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'squarex_attachment_size', array( 1200, 9999 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'squarex_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function squarex_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span><span class="byline"> <i>by</i> %2$s</span>', 'squarex-lite' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

if ( ! function_exists( 'squarex_posted_extra' ) ) :
/**
 * Prints HTML with meta info cat/tag
 */
function squarex_posted_extra() {

	$categories_list = get_the_category_list( __( ', ', 'squarex-lite' ) );
	$tags_list = get_the_tag_list( '', __( ', ', 'squarex-lite' ) );

	if ( $categories_list && squarex_categorized_blog() ) {

	echo '<span class="cat-links">' . __( 'Category: ', 'squarex-lite' ), $categories_list . '.</span>';

	}
	if ( $tags_list ) {

	echo '<span class="tags-links">' . __( 'Tag: ', 'squarex-lite' ), $tags_list . '</span>';

	}
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function squarex_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so squarex_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so squarex_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in squarex_categorized_blog
 */
function squarex_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'squarex_category_transient_flusher' );
add_action( 'save_post',     'squarex_category_transient_flusher' );

/**
 * Display one category of post
 */
if ( ! function_exists( 'squarex_one_cat' ) ) :
	function squarex_one_cat() {
		$categories = get_the_category(); 
			if ( $categories[0] ) {
				echo '<a href="' . get_category_link($categories[0]->term_id ) . '">'. $categories[0]->name . '</a>';
			}
	}
endif;

/**
 * Featured image as the background for some formats posts
 */
function squarex_bgimage_postformats() {
$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'squarex-aside' );
echo 'style="background:';
echo esc_attr( get_theme_mod( 'squarex_link_color', '#2d2d2d' ) );
	if  ( $thumbnail ) {
		echo ' url(';
		echo $thumbnail[0];
		echo ' ) no-repeat; background-position: 50%; background-size: cover';
	}
echo ';"';
}

/**
 * Sets up the slider posts
 */
if ( ! function_exists( 'squarex_featured_content' ) ) :
function squarex_featured_content() {
	global $post;
	
	// Get the setting
	// $tag   = get_theme_mod( 'squarex_featured_posts', 'slide' );
	$count = 3; // get_theme_mod( 'squarex_featured_posts_count', 3 );
	$sticky = get_option( 'sticky_posts' );

	if ( empty( $sticky ) ) { // empty( $tag )
		return;
	}

	if ( false === ( $featured = get_transient( 'squarex_featured_posts' ) ) ) {

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => (int) $count,
			'post__in'  => $sticky,
			// 'ignore_sticky_posts' => 1
			// 'tag'            => esc_attr( $tag )
		);

		// The post query
		$featured = get_posts( $args );

		// Store the transient.
		set_transient( 'squarex_featured_posts', $featured );
	}

	// Check if the post(s) exist.
	if ( $featured ) :

		$html = '<div class="featured-slides">';

			$html .= '<div class="container">';
				$html .= '<div class="slides">';

					foreach ( $featured as $post ) :
						setup_postdata( $post );

						$html .= '<div class="slides-item">';
							$html .= '<a href="' . esc_url( get_permalink( $post->ID ) ) . '" rel="bookmark">';
								if ( has_post_thumbnail( $post->ID ) ) {
									$html .= get_the_post_thumbnail( $post->ID, 'squarex-slides', array( 'alt' => esc_attr( get_the_title( $post->ID ) ) ) );
								}
								$html .= '<div class="slide-data">';
									$html .= '<h1 class="slide-title">' . esc_attr( get_the_title( $post->ID ) ) . '</h1>';
									$html .= '<time class="published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>';
								$html .= '</div>';
							$html .= '</a>';
						$html .= '</div>';

					endforeach;

				$html .= '</div><!-- .slides -->';
			$html .= '</div><!-- .container -->';

		$html .= '</div><!-- .featured-slides -->';

	// End check.
	endif;

	// Restore original post data.
	wp_reset_postdata();

	// Display the featured content.
	if ( ! empty( $html ) ) {
		echo $html;
	}

}
endif;

/**
 * Flush out the transients used in squarex_featured_content
 */
function squarex_featured_content_transient_flusher() {
	delete_transient( 'squarex_featured_posts' );
}
add_action( 'save_post'     , 'squarex_featured_content_transient_flusher' );
add_action( 'customize_save', 'squarex_featured_content_transient_flusher' );

/**
 * The page submenu in the sidebar
 */
if ( ! function_exists( 'squarex_get_submenu' ) ) {
  function squarex_get_submenu($args) {
    $defaults = array(
    	'container_id' => '',
    	'container' => 'div',
    	'container_class' => 'submenu',
    	'submenu_id' => 'sidemenu',
    	'submenu_class' => '',
    	'theme_location' => 'primary',
    	'xpath' => "./li[contains(@class,'current-menu-item') or contains(@class,'current-menu-ancestor')]/ul",
    	'echo' => true
    );

    $args = wp_parse_args( $args, $defaults );
    $args = (object) $args;
 
    $menu = wp_nav_menu(
        array(
            'theme_location' => $args->theme_location,
            'container' => '',
            'echo' => false
        )
    );

    $menu = simplexml_load_string($menu);
    $submenu = $menu->xpath($args->xpath);

    if (empty($submenu)) {
        return;
    }

    // Set value of class attribute
    $submenu[0]['class'] = $args->submenu_class;

    // Add "id" attribute
    if ($args->submenu_id) {
        $submenu[0]->addAttribute('id', $args->submenu_id);
    }

    if ($args->container) {
        $submenu_sxe = simplexml_load_string($submenu[0]->saveXML());
        $sdm = dom_import_simplexml($submenu_sxe);

        if ($sdm) {
            $xmlDoc = new DOMDocument('1.0', 'utf-8');
            $container = $xmlDoc->createElement($args->container);

            // Add "class" attribute for container
            if ($args->container_class) {
                $container->setAttribute('class', $args->container_class);
            }

            // Add "id" attribute for container
            if ($args->container_id) {
                $container->setAttribute('id', $args->container_id);
            }
    
            $smsx = $xmlDoc->importNode($sdm, true);
            $container->appendChild($smsx);
            $xmlDoc->appendChild($container);
        }
    }

    if (isset($xmlDoc)) {
        $output = $xmlDoc->saveXML();
    } else {
        $output = $submenu[0]->saveXML();
    }

    if (!$args->echo) {
        return $output;
    }

    echo $output;
  }
}

/**
 * Tag Cloud Filter
 */
function squarex_widget_tag_cloud_args( $args ) {
	$args = array(
		'number'   => 0,
		'unit' => 'px',
		'largest'    => 16,
		'smallest' => 11,
		'order' => 'RAND'
		);
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'squarex_widget_tag_cloud_args' );

/**
 * Footer credits.
 */
function squarex_txt_credits() {
	$text = sprintf( __( ' %s', 'squarex-lite' ), '<a href="http://wp-templates.ru/">WordPress</a>' );
	$text .= '<span class="sep"> &middot; </span>';
	$text .= sprintf( __( ' %s', 'squarex-lite' ), '<a href="http://www.dinevthemes.com/">DinevThemes</a> <span class="sep"> &middot; </span> <a href="http://builderbody.ru/" rel="nofollow" title="Упражнения и программы тренировок" target="_blank">Спорт</a>' );
	echo apply_filters( 'squarex_txt_credits', $text );
}