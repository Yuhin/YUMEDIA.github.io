<?php
	get_header();
?>

<?php
	$life_select_page_featured_area = get_option('life_select_page_featured_area' . '__' . get_the_ID(), 'No Featured Area');
	
	if ((! isset($_GET['featured_area'])) && is_active_sidebar($life_select_page_featured_area))
	{
		?>
			<section class="top-content">
				<div class="layout-medium">
					<div class="featured-area">
						<?php
							dynamic_sidebar($life_select_page_featured_area);
						?>
					</div> <!-- .featured-area -->
				</div> <!-- .layout-medium -->
			</section> <!-- .top-content -->
		<?php
	}
?>

<?php
	$life_select_page_sidebar = get_option('life_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
?>

<div id="main" class="site-main">
	<div class="<?php if ($life_select_page_sidebar != 'No Sidebar') { echo 'layout-medium'; } else { echo 'layout-fixed'; } ?>">
		<div id="primary" class="content-area <?php if ($life_select_page_sidebar != 'No Sidebar') { echo 'with-sidebar'; } ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="post-header page-header post-header-classic">
									<?php
										$life_title_visibility = get_option(get_the_ID() . 'life_title_visibility', false);
									?>
									<header class="entry-header" <?php if ($life_title_visibility == true) { echo 'style="display: none;"'; } ?>>
										<?php
											the_title('<h1 class="entry-title">', '</h1>');
										?>
									</header> <!-- .entry-header -->
								</div> <!-- .post-header .page-header .post-header-classic -->
								<?php
									if (has_post_thumbnail())
									{
										?>
											<div class="featured-image">
												<?php
													the_post_thumbnail('life_image_size_1');
												?>
											</div> <!-- .featured-image -->
										<?php
									}
								?>
								<div class="entry-content">
									<?php
										life_content();
									?>
								</div> <!-- .entry-content -->
							</article>
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($life_select_page_sidebar != 'No Sidebar')
			{
				life_sidebar();
			}
		?>
	</div>
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>