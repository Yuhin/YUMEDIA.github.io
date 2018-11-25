<?php

	function life_post_tags()
	{
		$tags = get_theme_mod('life_setting_tags', 'Yes');
		
		if ($tags != 'No')
		{
			if (get_the_tags() != "")
			{
				?>
					<div class="post-tags tagcloud">
						<?php
							the_tags("", ' ', "");
						?>
					</div>
				<?php
			}
		}
	}

?>