<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title('|', true, 'right'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>" />           
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="profile" href="http://gmpg.org/xfn/11" />        
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />    
    <!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/html5shiv.js" type="text/javascript"></script>      
	<![endif]-->     
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="container">
    <div class="row">
        <header class="col-sm-12">           
            <div id="blog-name">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
            </div>                
            <?php if (has_nav_menu('primary-menu')) { ?>
                <nav id="primary-menu">
                    <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
                </nav>
            <?php } ?>           
        </header>
    </div>
    <div class="row">
    <?php get_sidebar(); ?>