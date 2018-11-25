<?php

	function life_meta_box__title_visibility($post)
	{
		?>
			<?php
				wp_nonce_field('life_meta_box__title_visibility',
							   'life_meta_box_nonce__title_visibility');
			?>
			<p>
				<?php
					$life_title_visibility = get_option(get_the_ID() . 'life_title_visibility', false);
				?>
				<label for="life_title_visibility">
					<input type="checkbox" id="life_title_visibility" name="life_title_visibility" <?php if ($life_title_visibility == true) { echo 'checked="checked"'; } ?>>
					<?php esc_html_e('Hide Title', 'life'); ?>
				</label>
			</p>
		<?php
	}
	
	
	function life_meta_box_save__title_visibility($post_id)
	{
		if (! isset($_POST['life_meta_box_nonce__title_visibility']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['life_meta_box_nonce__title_visibility'];
		
		if (! wp_verify_nonce($nonce, 'life_meta_box__title_visibility'))
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
		
		update_option($post_id . 'life_title_visibility', $_POST['life_title_visibility']);
	}
	
	add_action('save_post', 'life_meta_box_save__title_visibility');
	
	
	function life_add_meta_boxes__title_visibility()
	{
		add_meta_box('life_add_meta_box__title_visibility',
					 esc_html__('Title Visibility', 'life'),
					 'life_meta_box__title_visibility',
					 array('page'),
					 'side',
					 'high');
	}
	
	add_action('add_meta_boxes', 'life_add_meta_boxes__title_visibility');

?>