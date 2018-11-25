
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, maximum-scale=1,  width=device-width, initial-scale=1"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="keywords" content="<?php echo of_get_option('metakeywords'); ?>" />
<meta name="description" content="<?php echo of_get_option('metadescription'); ?>" />


<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- stylesheet -->
<link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>
<!-- stylesheet -->


<!-- wp_head -->
<?php wp_head(); ?>
<!-- wp_head -->

<?php if(of_get_option('customtypography') == '1') { ?>
<!-- custom typography-->

<?php if(of_get_option('headingfontlink') != '') { ?>
<?php echo of_get_option('headingfontlink');?>
<?php } ?>
<?php if(of_get_option('bodyfontlink') != '') { ?>
<?php echo of_get_option('bodyfontlink');?>
<?php } ?>

<?php load_template( get_template_directory() . '/custom.typography.css.php' );?>
<?php } ?>
<!-- custom typography -->

</head>
<!-- end head -->

<body  <?php body_class(); ?> lang="en">
    <div class="mobile-sidebar">
        <div class="sidebar-title clearfix">
            <a href="<?php echo get_bloginfo('url'); ?>" class="logo"><?php if(of_get_option('clogo')) : echo of_get_option('clogo'); else: if(of_get_option('clogo_text')): echo of_get_option('clogo_text'); else: echo bloginfo('name'); endif; endif;?></a>
            <i class="fa fa-times close_sidebar"></i>
        </div>
        <nav>
           <?php wp_nav_menu('theme_location=main-menu&container=&container_class=menu&menu_id=main&menu_class=main-nav sf-menu&link_before=&link_after=&fallback_cb=false'); ?>
        </nav>
    </div>

    <div id="body-container">

    <header id="header" class="clearfix">
        <a href="#" class="small_menu"><i class="fa fa-bars"></i></a>
        <div id="branding">
            <h1 id="site-title"><a href="<?php echo get_bloginfo('url'); ?>" class="logo"><?php if(of_get_option('clogo')) : echo of_get_option('clogo'); else: if(of_get_option('clogo_text')): echo of_get_option('clogo_text'); else: echo bloginfo('name'); endif; endif;?></a></h1>
            <?php if(of_get_option('cslogan')): echo '<span class="slogan">'.of_get_option('cslogan').'</span>'; endif;?>
        </div>
        <form action="" class="searchform" id="searchform" method="get" role="search">
            <div>
                <input type="text" id="s" name="s" value="">
                <input type="submit" value="Search" id="searchsubmit">
            </div>
        </form>
        <nav id="main">
            <?php wp_nav_menu('theme_location=main-menu&container=&container_class=menu&menu_id=main&menu_class=main-nav sf-menu&link_before=&link_after=&fallback_cb=false'); ?>
        </nav>
    </header>

    <section id="page" class="clearfix">