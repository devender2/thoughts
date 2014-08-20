<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Place favicon.ico and apple-touch-icon.png in the theme root directory -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<!--[if lt IE 9]>
    <script type="text/javascript" src="assets/js/components/console-shim/console-shim-min.js"></script>
    <script type="text/javascript" src="assets/js/components/html5shiv/dist/html5shiv.js"></script>
    <script type="text/javascript" src="assets/js/components/respond/dest/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body>



<nav id="main-navigation">
	<ul>
		<li><a class="closeNav entypo-cancel" href="#"></a></li>
	</ul>
    <?php wp_nav_menu( array( 'container_class' => 'main-nav', 'theme_location' => 'primary' ) ); ?>
</nav>
<a href="#" class="navOpen entypo-menu"></a>
<div class="mask"></div>

