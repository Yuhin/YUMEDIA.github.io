<?php

	function life_meta_box__sidebar($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field('life_meta_box__sidebar', 'life_meta_box_nonce__sidebar');
				?>
				<p>
					<label for="life_select_page_sidebar"><?php esc_html_e('Select Sidebar', 'life'); ?></label>
					<?php
						$select_page_sidebar = get_option('life_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
					?>
					<select id="life_select_page_sidebar" name="life_select_page_sidebar">
						<option <?php if ($select_page_sidebar == 'No Sidebar') { echo 'selected="selected"'; } ?> value="No Sidebar"><?php esc_html_e('No Sidebar', 'life'); ?></option>
						<option <?php if ($select_page_sidebar == 'life_sidebar_1') { echo 'selected="selected"'; } ?> value="life_sidebar_1"><?php esc_html_e('Blog Sidebar', 'life'); ?></option>
						<option <?php if ($select_page_sidebar == 'life_sidebar_2') { echo 'selected="selected"'; } ?> value="life_sidebar_2"><?php esc_html_e('Post Sidebar', 'life'); ?></option>
						<option <?php if ($select_page_sidebar == 'life_sidebar_3') { echo 'selected="selected"'; } ?> value="life_sidebar_3"><?php esc_html_e('Page Sidebar', 'life'); ?></option>
						<option <?php if ($select_page_sidebar == 'life_sidebar_15') { echo 'selected="selected"'; } ?> value="life_sidebar_15"><?php esc_html_e('Portfolio Sidebar', 'life'); ?></option>
						<?php
							$life_sidebars_with_commas = get_option('life_sidebars_with_commas');
							
							if ($life_sidebars_with_commas != "")
							{
								$sidebars = preg_split("/[\s]*[,][\s]*/", $life_sidebars_with_commas);
								
								foreach ($sidebars as $sidebar_name)
								{
									$selected = "";
									
									if ($select_page_sidebar == $sidebar_name)
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
						esc_html_e('Sidebar is a widget area. You can find all available sidebars in your Widgets page under Appearance menu or Widgets section in Customizer.', 'life');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Also you can create new sidebars from Appearance > Theme Options > Sidebar.', 'life');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function life_save_meta_box__sidebar($post_id)
	{
		if (! isset($_POST['life_meta_box_nonce__sidebar']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['life_meta_box_nonce__sidebar'];
		
		if (! wp_verify_nonce($nonce, 'life_meta_box__sidebar'))
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
		
		update_option('life_select_page_sidebar' . '__' . $post_id, $_POST['life_select_page_sidebar']);
	}
	
	add_action('save_post', 'life_save_meta_box__sidebar');
	
	
	function life_add_meta_boxes__sidebar()
	{
		add_meta_box('life_add_meta_box__sidebar',
					 esc_html__('Sidebar', 'life'),
					 'life_meta_box__sidebar',
					 array('page'),
					 'side',
					 'low');
	}
	
	add_action('add_meta_boxes', 'life_add_meta_boxes__sidebar');

?>