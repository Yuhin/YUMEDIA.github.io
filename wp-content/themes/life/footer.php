        <footer id="colophon" class="site-footer" role="contentinfo">
			<?php
				if (is_active_sidebar('life_sidebar_5'))
				{
					?>
						<div class="footer-subscribe">
							<div class="layout-medium">
								<?php
									dynamic_sidebar('life_sidebar_5');
								?>
							</div>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('life_sidebar_6'))
				{
					?>
						<div class="footer-insta">
							<?php
								dynamic_sidebar('life_sidebar_6');
							?>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('life_sidebar_9') || 
					is_active_sidebar('life_sidebar_10') || 
					is_active_sidebar('life_sidebar_11') || 
					is_active_sidebar('life_sidebar_12'))
				{
					?>
						<div class="footer-widgets widget-area">
							<div class="layout-medium">
								<div class="row">
									<?php
										$life_footer_columns = get_theme_mod('life_setting_footer_columns', '4');
										
										if ($life_footer_columns == '3')
										{
											life_footer_columns_3();
										}
										else
										{
											life_footer_columns_4();
										}
									?>
								</div>
							</div>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('life_sidebar_7'))
				{
					?>
						<div class="site-info">
							<?php
								dynamic_sidebar('life_sidebar_7');
							?>
						</div>
					<?php
				}
			?>
		</footer>
	</div>
    
	<?php
		wp_footer();
	?>
</body>
</html>