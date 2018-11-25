<?php
/**
 * @package Squarex
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( has_excerpt() ) : ?>
	<header class="entry-header">
		<?php the_excerpt(); ?>
	</header><!-- .entry-header -->
<?php endif; ?>

	<h1 class="entry-title"><?php the_title(); ?></h1>

<?php	
	if( false === get_theme_mod( 'squarex_top_meta' ) ) { ?>
		<div class="top-single">

		<?php
			$avatar = get_theme_mod( 'avatar_upload' );

			if( !empty( $avatar ) ) { ?>

				<img src="<?php echo esc_url( get_theme_mod( 'avatar_upload' ) ); ?>" class="avatar" />
			<?php } else { ?>
				<?php echo get_avatar( get_the_author_meta('ID'), 60 ); ?>

			<?php } ?>

		<div class="author-meta">
			<?php _e( 'Written by ', 'squarex-lite'); ?><?php the_author(); ?><br />
			<time datetime="<?php the_time( get_option( 'date_format' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
		</div>

		</div><!-- .top-single -->
<?php	
	} ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'squarex-lite' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-meta no-sidebar">

	<?php if ( false === get_theme_mod( 'squarex_bottom_meta' ) ) : ?>
		<div class="posted">
			<?php squarex_posted_on(); ?>
		</div>
		<div class="extrameta">
			<?php squarex_posted_extra(); ?>
		</div>
	<?php endif; ?>

	<?php edit_post_link( __( 'Edit', 'squarex-lite' ), '<span class="edit-link">', '</span>' ); ?>

	</footer>

</article><!-- #post-## -->