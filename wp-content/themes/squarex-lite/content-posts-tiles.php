<?php
/**
 * @package Squarex
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="box">

<?php
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'squarex-aside' );

	if  ( $thumbnail ) {
		$thumbnail = $thumbnail[0]; $title = 1;
	} else {
		$thumbnail = get_template_directory_uri() .'/img/no-image.png'; $title = 0;
	}
?>

<div class="innerBox" <?php if  ( $thumbnail ) { ?>style="background: url(<?php echo $thumbnail; ?>) no-repeat; background-position: 50%; background-size: cover;"<?php } ?>>

<a href="<?php the_permalink(); ?>" rel="bookmark">
<div class="titleBox">

	<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>

<?php if ( $title == 1 ) { ?>
		<h3><?php the_title(); ?></h3>
<?php } else { ?>
		<h3 class="no-thumb"><?php the_title(); ?></h3>

<?php } ?>

	</article><!-- #post-## -->

</div>
</a>

</div><!-- .innerBox -->

</div>

	<?php endwhile;?>

<?php else : ?>
		<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif;  // have_posts() ?>
