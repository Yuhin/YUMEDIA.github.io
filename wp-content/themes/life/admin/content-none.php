<?php

	function life_content_none()
	{
		if (is_404())
		{
			?>
				<article class="hentry page">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
								esc_html_e('you are lost!', 'life');
							?>
						</h1>
					</header>
					<div class="entry-content">
                        <div class="http-alert">
                            <h1>
								<i class="pw-icon-doc-alt"></i>
							</h1>
							<p>
								<?php
									esc_html_e('The page you are looking for was not found!', 'life');
								?>
							</p>
                            <p>
                            	<a class="button big" href="<?php echo esc_url(home_url('/')); ?>">
									<i class="pw-icon-home"></i>
									
									<?php
										esc_html_e('Return To Homepage', 'life');
									?>
								</a>
                            </p>
                        </div>
					</div>
				</article>
			<?php
		}
		elseif (is_search())
		{
			?>
				<article class="hentry page">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
								esc_html_e('nothing found', 'life');
							?>
						</h1>
					</header>
					<div class="entry-content">
						<div class="http-alert">
                            <h1>
								<i class="pw-icon-doc-alt"></i>
							</h1>
							<p>
								<?php
									esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'life');
								?>
							</p>
							<?php
								get_search_form();
							?>
						</div>
					</div>
				</article>
			<?php
		}
		else
		{
			?>
				<article class="hentry page">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
								esc_html_e('nothing found', 'life');
							?>
						</h1>
					</header>
					<div class="entry-content">
						<div class="http-alert">
                            <h1>
								<i class="pw-icon-doc-alt"></i>
							</h1>
							<p>
								<?php
									esc_html_e('It seems we can not find what you are looking for. Perhaps searching can help.', 'life');
								?>
							</p>
							<?php
								get_search_form();
							?>
						</div>
					</div>
				</article>
			<?php
		}
	}

?>