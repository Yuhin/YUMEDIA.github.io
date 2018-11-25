
<!-- begin aside -->
<aside class="sidebar">

	<!-- Sidebar Widgets Area -->
    <?php if ( !function_exists('dynamic_sidebar') || dynamic_sidebar('Sidebar') ) { ?>
	<?php } else { ?>
    <!-- This content shows up if there are no widgets defined in the backend. -->
        <p>
            Here you can add widgets.
            <?php if(current_user_can('edit_theme_options')) : ?><br>
            <a href="<?php echo admin_url('widgets.php')?>" class="add-widget">Add Widget</a>
            <?php endif ?>
        </p>
    
    <!-- END Sidebar Widgets Area -->
	<?php
	}
	?>
</aside>
<!-- end aside -->