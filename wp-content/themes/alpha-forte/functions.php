<?php

// define content area width
if (!isset($content_width)) $content_width = 650;

// sets up theme defaults and registers the WordPress features
function alphaforte_setup() {	
	register_nav_menu('primary-menu', __('Primary Menu', 'alphaforte'));
	add_theme_support('post-thumbnails');
	add_image_size('featured', 650, 9999); 	
	add_theme_support('automatic-feed-links');	
}
add_action('after_setup_theme', 'alphaforte_setup');

// format page titles
function alphaforte_wp_title($title, $sep) {
	global $paged, $page;
	if (is_feed())
		return $title;	
	$title .= get_bloginfo('name');	
	$site_description = get_bloginfo('description','display');
	if ($site_description && (is_home() || is_front_page()))
		$title = "$title $sep $site_description";	
	if ($paged >= 2 || $page >= 2)
		$title = "$title $sep " . sprintf( __('Page %s', 'alphaforte'), max($paged, $page));
	return $title;
}
add_filter('wp_title', 'alphaforte_wp_title', 10, 2);

// load styles
function alphaforte_styles() {
	wp_register_style('sourceSans', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');
	wp_register_style('openSans', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap.min.css');	
    wp_enqueue_style('sourceSans');
    wp_enqueue_style('openSans');
	wp_enqueue_style('alphaforte_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'alphaforte_styles');

// load javascript
function alphaforte_scripts() {
	if(!is_admin()){
		wp_enqueue_script('jquery');
		wp_enqueue_script('alphaforte_scripts', get_template_directory_uri() . '/assets/scripts.js'); 		
	}
	if (is_singular()) wp_enqueue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'alphaforte_scripts');

// register widgets
function alphaforte_widgets_init() {
	register_sidebar(array(
		'name' => __('Left Sidebar', 'alphaforte'),
		'id' => 'left-sidebar',
		'description' => __('Widgets in this area will appear in the left hand sidebar on all pages and posts.', 'alphaforte'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Right Sidebar', 'alphaforte'),
		'id' => 'right-sidebar',
		'description' => __('Widgets in this area will appear in the right hand sidebar on all pages and posts.', 'alphaforte'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));		
}
add_action('widgets_init', 'alphaforte_widgets_init');

// display page numbers on teasers
if (!function_exists('alphaforte_pagination')):
	function alphaforte_pagination() {
		global $wp_query;
		$big = 999999999;		
		echo paginate_links( array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages
		));
	}
endif;

// custom background image
function alphaforte_theme_customizer($wp_customize) {
	$wp_customize->add_section('alphaforte_background_section', array(
		'title' => __('Custom Background', 'alphaforte'),
		'priority' => 999,
		'description' => 'Upload a custom background image.'
	));
	$wp_customize->add_setting('alphaforte_background');
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'alphaforte_background', array(
		'label' => __('Image', 'alphaforte'),
		'section' => 'alphaforte_background_section',
		'settings' => 'alphaforte_background'
	)));
}
add_action('customize_register', 'alphaforte_theme_customizer');
function alphaforte_background() {
	if (get_theme_mod('alphaforte_background')): ?>
		$.backstretch('<?php echo esc_url(get_theme_mod('alphaforte_background')); ?>');
	<?php else: ?>	
		$.backstretch('<?php echo get_template_directory_uri(); ?>/img/bg.jpg');			
	<?php endif;
}
?>