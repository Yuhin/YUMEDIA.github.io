<?php

	function life_pre_get_posts($query)
	{
		$sticky_posts = get_theme_mod('life_setting_sticky_posts', 'include');
		
		if (($sticky_posts == 'exclude') && ($query->is_main_query()) && is_home() && (! is_admin()))
		{
			$query->set('post__not_in', get_option('sticky_posts'));
		}
	}
	
	add_action('pre_get_posts', 'life_pre_get_posts');

?>