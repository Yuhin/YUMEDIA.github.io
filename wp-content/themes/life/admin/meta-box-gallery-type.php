<?php

	function life_meta_box__gallery_type($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field('life_meta_box__gallery_type', 'life_meta_box_nonce__gallery_type');
				?>
				<p>
					<label for="life_gallery_type"><?php esc_html_e('Select Gallery Type', 'life'); ?></label>
					<?php
						$gallery_type = get_option('life_gallery_type' . '__' . get_the_ID(), 'grid');
					?>
					<select id="life_gallery_type" name="life_gallery_type" style="min-width: 100px;">
						<option <?php if ($gallery_type == 'grid') { echo 'selected="selected"'; } ?> value="grid"><?php esc_html_e('Grid', 'life'); ?></option>
						<option <?php if ($gallery_type == 'slider') { echo 'selected="selected"'; } ?> value="slider"><?php esc_html_e('Slider', 'life'); ?></option>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Create galleries from Add Media button above the content editor.', 'life');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('And select gallery type from here. You can turn your gallery into a slider.', 'life');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('To show your images in a lightbox, select Grid type then edit your gallery in the content editor and choose Link To: Media File from gallery settings.', 'life');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function life_save_meta_box__gallery_type($post_id)
	{
		if (! isset($_POST['life_meta_box_nonce__gallery_type']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['life_meta_box_nonce__gallery_type'];
		
		if (! wp_verify_nonce($nonce, 'life_meta_box__gallery_type'))
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
		
		update_option('life_gallery_type' . '__' . $post_id, $_POST['life_gallery_type']);
	}
	
	add_action('save_post', 'life_save_meta_box__gallery_type');
	
	
	function life_add_meta_boxes__gallery_type()
	{
		add_meta_box('life_add_meta_box__gallery_type',
					 esc_html__('Gallery Type', 'life'),
					 'life_meta_box__gallery_type',
					 array('post', 'page', 'portfolio'),
					 'side',
					 'low');
	}
	
	add_action('add_meta_boxes', 'life_add_meta_boxes__gallery_type');

?>