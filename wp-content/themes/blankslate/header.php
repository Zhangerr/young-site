<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="stylesheet" type="text/css" href="/css/font-awesome.css" />
	<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <link href=<?php bloginfo('stylesheet_url');?> rel="stylesheet" type="text/css" />	
<?php wp_head();

 ?>
</head>
<body <?php body_class(); ?>>
<div id="wrap">
<div id="wrapper" class="hfeed"> 
<header>
<!--<div class="container-fluid">
<div class="row-fluid">
<div class="span10 offset1" id="footer-lists">
<div class="row-fluid">

</div></div></div></div>-->
<div id="branding">
<!--<div id="site-title"><?php if ( is_singular() ) {} else {echo '<h1>';} ?><a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a><?php if ( is_singular() ) {} else {echo '</h1>';} ?></div>-->
<p id="site-description"><?php bloginfo( 'description' ) ?></p>
</div>
<nav>
<div id="search">
<?php// get_search_form(); ?>
</div>

</nav>
</header>
<div id="container" class="container-fluid">
<div class="row-fluid">
<div class="span10 offset1">
               <div class="alert alert-info">
                  <h4><i style="margin-top:3px;" class="icon-bookmark"></i> Notice</h4>
                  Site redesign in progress...
               </div>
               <div class="progress progress-striped progress-danger active">
                  <div class="bar" style="width: 30%;"></div>
               </div>
<hr class="navhr" />
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
<hr class="navhrb" />