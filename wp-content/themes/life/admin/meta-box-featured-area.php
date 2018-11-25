<?php

	function life_meta_box__featured_area($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field('life_meta_box__featured_area', 'life_meta_box_nonce__featured_area');
				?>
				<p>
					<label for="life_select_page_featured_area"><?php esc_html_e('Select Featured Area', 'life'); ?></label>
					<?php
						$select_page_featured_area = get_option('life_select_page_featured_area' . '__' . get_the_ID(), 'No Featured Area');
					?>
					<select id="life_select_page_featured_area" name="life_select_page_featured_area">
						<option <?php if ($select_page_featured_area == 'No Featured Area') { echo 'selected="selected"'; } ?> value="No Featured Area"><?php esc_html_e('No Featured Area', 'life'); ?></option>
						<option <?php if ($select_page_featured_area == 'life_sidebar_14') { echo 'selected="selected"'; } ?> value="life_sidebar_14"><?php esc_html_e('Page Featured Area', 'life'); ?></option>
						<option <?php if ($select_page_featured_area == 'life_sidebar_17') { echo 'selected="selected"'; } ?> value="life_sidebar_17"><?php esc_html_e('Portfolio Featured Area', 'life'); ?></option>
						<option <?php if ($select_page_featured_area == 'life_sidebar_18') { echo 'selected="selected"'; } ?> value="life_sidebar_18"><?php esc_html_e('Shop Featured Area', 'life'); ?></option>
						<option <?php if ($select_page_featured_area == 'life_sidebar_13') { echo 'selected="selected"'; } ?> value="life_sidebar_13"><?php esc_html_e('Blog Featured Area', 'life'); ?></option>
						<?php
							$life_sidebars_with_commas = get_option('life_sidebars_with_commas');
							
							if ($life_sidebars_with_commas != "")
							{
								$sidebars = preg_split("/[\s]*[,][\s]*/", $life_sidebars_with_commas);
								
								foreach ($sidebars as $sidebar_name)
								{
									$selected = "";
									
									if ($select_page_featured_area == $sidebar_name)
									{
										$selected = 'selected="selected"';
									}
									
									echo '<option ' . $selected . ' value="' . esc_attr($sidebar_name) . '">' . $sidebar_name . '</option>';
								}
							}
						?>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Featured Area is a widget area like sidebars. So you can create new one from Appearance > Theme Options > Sidebar.', 'life');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Add Main Slider, Link Box or Intro widgets to your featured area. You can add many widgets to a featured area.', 'life');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function life_save_meta_box__featured_area($post_id)
	{
		if (! isset($_POST['life_meta_box_nonce__featured_area']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['life_meta_box_nonce__featured_area'];
		
		if (! wp_verify_nonce($nonce, 'life_meta_box__featured_area'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_option('life_select_page_featured_area' . '__' . $post_id, $_POST['life_select_page_featured_area']);
	}
	
	add_action('save_post', 'life_save_meta_box__featured_area');
	
	
	function life_add_meta_boxes__featured_area()
	{
		add_meta_box('life_add_meta_box__featured_area',
					 esc_html__('Featured Area', 'life'),
					 'life_meta_box__featured_area',
					 array('page'),
					 'side',
					 'low');
	}
	
	add_action('add_meta_boxes', 'life_add_meta_boxes__featured_area');

?>