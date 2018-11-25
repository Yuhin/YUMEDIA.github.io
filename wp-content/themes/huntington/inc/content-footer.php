<footer class="clearfix">

	<div class="alignleft">
		<p class="small"><?php echo wp_kses_post( get_option( 'copyright', 'Configure this message in "appearance" => "customize"' ) ); ?></p>
	</div>
	
	<div class="alignright">
		<p class="small"><?php echo wp_kses_post( get_option( 'copyright_right', 'Configure this message in "appearance" => "customize"' ) ); ?></p>
	</div>

</footer>