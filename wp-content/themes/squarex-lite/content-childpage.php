<?php
/**
 * @package Squarex
 * @see content-homepage.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h3>
		<div class="page-thumb">
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'squarex-aside' ); ?>
			</a>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
