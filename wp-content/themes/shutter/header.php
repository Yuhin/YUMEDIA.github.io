
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
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

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
    <div class="main-sidebar">
        <a href="#" class="small_menu"><i class="fa fa-bars"></i></a>   
        <a href="#" class="close_sidebar"><i class="fa fa-times"></i></a>  
        <span class="clearfix"></span>
        <form action="" id="searchform-sidebar" method="get" role="search">
            <div>
                <input type="text" id="s-sidebar" name="s" value="">
                <input type="submit" value="Search" id="searchsubmit-sidebar">
            </div>
        </form>
        <nav id="main_menu">
            <?php wp_nav_menu('theme_location=main-menu&container=&container_class=menu&menu_id=main&menu_class=main-nav sf-menu&link_before=&link_after=&fallback_cb=false'); ?>
        </nav>
        
        <!-- begin .copyright -->
        <div class="copyright">
           <div class="social_buttons">
               <?php 
                    if(of_get_option("facebook")) echo '<a href="'.of_get_option("facebook").'" class="like us on Facebook"><i class="fa fa-facebook"></i>
</a>';              
                    if(of_get_option("twitter")) echo '<a href="'.of_get_option("twitter").'" class="follow us on Twitter"><i class="fa fa-twitter"></i>
</a>';              
                    if(of_get_option("pinterest")) echo '<a href="'.of_get_option("pinterest").'" class="follow us on Pinterest"><i class="fa fa-pinterest-p"></i>
                    </a>';              
                    if(of_get_option("email")) echo '<a href="mailto:'.of_get_option("email").'" class="send us an e-mail"><i class="fa fa-envelope"></i>
                    </a>';   
                ?>
           </div>
            <?php if(of_get_option('footer_copyright') !='' ) { ?>
                <?php echo of_get_option('footer_copyright')  ?><br>
            <?php } ?>
            <!-- Site5 Credits-->
            Created by <a href="http://www.s5themes.com/">Site5 WordPress Themes</a><br/> Experts in <a href="http://gk.site5.com/t/742">WordPress Hosting</a>
            <!-- end Site5 Credits-->
        </div>
        <!-- end .copyright -->
    </div>       


    <div id="page">