<?php

	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	
	
	function life_remove_wc_breadcrumbs()
	{
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
	}
	
	add_action('init', 'life_remove_wc_breadcrumbs');
	
	
	function life_header_add_to_cart_fragment($fragments)
	{
		ob_start();
		$count = WC()->cart->cart_contents_count;
		
		?>
			<a class="shopping-cart" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'life'); ?>">
				<?php
					if ($count > 0)
					{
						?>
							<span>
								<?php
									echo esc_html($count);
								?>
							</span>
						<?php            
					}
				?>
			</a>
		<?php
		
		$fragments['a.shopping-cart'] = ob_get_clean();
		
		return $fragments;
	}
	
	add_filter('woocommerce_add_to_cart_fragments', 'life_header_add_to_cart_fragment');
	
	
	function life_wc_cart_count()
	{
		if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))))
		{
			$count = WC()->cart->cart_contents_count;
			
			?>
				<a class="shopping-cart" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'life'); ?>">
					<?php
						if ($count > 0)
						{
							?>
								<span>
									<?php
										echo esc_html($count);
									?>
								</span>
							<?php
						}
					?>
				</a>
			<?php
		}
	}
	
	add_action('life_header_cart_icon', 'life_wc_cart_count');

?>