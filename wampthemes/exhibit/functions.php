<?php
/*

 It's not recommended to add functions to this file, as it will be lost if you ever update this child theme.
 Instead, consider adding your function into a plugin using Pluginception: https://wordpress.org/plugins/pluginception/
 
 */
 
if ( function_exists( 'generate_blog_get_defaults' ) ) :
	if ( !function_exists( 'exhibit_new_blog_defaults' ) ) :
		add_filter( 'generate_blog_option_defaults','exhibit_new_blog_defaults' );
		function exhibit_new_blog_defaults( $new_defaults )
		{
			$new_defaults[ 'excerpt_length' ] = '55';
			$new_defaults[ 'read_more' ] = __('Read more...','generate-blog');
			$new_defaults[ 'masonry' ] = 'false';
			$new_defaults[ 'masonry_width' ] = 'width2';
			$new_defaults[ 'masonry_most_recent_width' ] = 'width4';
			$new_defaults[ 'masonry_load_more' ] = __('+ More','generate-blog');
			$new_defaults[ 'masonry_loading' ] = 'Loading...';
			$new_defaults[ 'post_image' ] = 'true';
			$new_defaults[ 'post_image_position' ] = 'post-image-above-header';
			$new_defaults[ 'post_image_alignment' ] = 'post-image-aligned-center';
			$new_defaults[ 'post_image_width' ] = '';
			$new_defaults[ 'post_image_height' ] = '';
			$new_defaults[ 'date' ] = 'true';
			$new_defaults[ 'author' ] = 'true';
			$new_defaults[ 'categories' ] = 'true';
			$new_defaults[ 'tags' ] = 'true';
			$new_defaults[ 'comments' ] = 'true';
			$new_defaults[ 'column_layout' ] = 0;
			$new_defaults[ 'columns' ] = '50';
			$new_defaults[ 'featured_column' ] = 0;
			
			return $new_defaults;
		}
	endif;
endif;

add_action( 'admin_notices', 'exhibit_reset_customizer_settings' );
function exhibit_reset_customizer_settings() {
	global $pagenow;
	$generate_settings = get_option('generate_settings');
	
	if ( empty($generate_settings) )
		return;
	
	if ( is_admin() && $pagenow == "themes.php" && isset( $_GET['activated'] ) ) {
		?>
		<div class="updated settings-error notice is-dismissible">
			<p>
				<?php printf( __( '<strong>Almost done!</strong> Previous GeneratePress options detected in your database. Please <a href="%s">click here</a> to delete your current options for Exhibit to take full effect.', 'exhibit' ), admin_url('themes.php?page=generate-options#gen-delete') ); ?>
			</p>
		</div>
		<?php
	}
}

/**
 * Remove unnecessary actions
 */
add_action('wp','exhibit_setup');
function exhibit_setup()
{
	if ( !function_exists( 'generate_blog_get_defaults' ) ) :
		remove_action( 'generate_after_entry_header', 'generate_post_image' );
		
		if ( function_exists('generate_page_header') ) :
			remove_action( 'generate_after_entry_header', 'generate_page_header_post_image' );
			add_action( 'generate_before_content', 'generate_page_header_post_image' );
		endif;
	endif;
}

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'exhibit_scripts' );
function exhibit_scripts() {

	if ( ! function_exists( 'generate_menu_plus_setup' ) ) :
		wp_enqueue_script( 'stickynav', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), GENERATE_VERSION, true );
	endif;

}

if ( !function_exists( 'exhibit_exhibit_defaults' ) ) :
add_filter( 'generate_option_defaults','exhibit_exhibit_defaults' );
function exhibit_exhibit_defaults( $exhibit_defaults )
{
	$exhibit_defaults[ 'hide_title' ] = '';
	$exhibit_defaults[ 'hide_tagline' ] = '';
	$exhibit_defaults[ 'logo' ] = '';
	$exhibit_defaults[ 'container_width' ] = '1220';
	$exhibit_defaults[ 'header_layout_setting' ] = 'fluid-header';
	$exhibit_defaults[ 'center_header' ] = 'true';
	$exhibit_defaults[ 'center_nav' ] = 'true';
	$exhibit_defaults[ 'nav_alignment_setting' ] = 'center';
	$exhibit_defaults[ 'header_alignment_setting' ] = 'center';
	$exhibit_defaults[ 'nav_layout_setting' ] = 'fluid-nav';
	$exhibit_defaults[ 'nav_position_setting' ] = 'nav-below-header';
	$exhibit_defaults[ 'nav_search' ] = 'enable';
	$exhibit_defaults[ 'nav_dropdown_type' ] = 'hover';
	$exhibit_defaults[ 'content_layout_setting' ] = 'separate-containers';
	$exhibit_defaults[ 'layout_setting' ] = 'right-sidebar';
	$exhibit_defaults[ 'blog_layout_setting' ] = 'right-sidebar';
	$exhibit_defaults[ 'single_layout_setting' ] = 'right-sidebar';
	$exhibit_defaults[ 'post_content' ] = 'full';
	$exhibit_defaults[ 'footer_layout_setting' ] = 'fluid-footer';
	$exhibit_defaults[ 'footer_widget_setting' ] = '3';
	$exhibit_defaults[ 'back_to_top' ] = '';
	$exhibit_defaults[ 'background_color' ] = '#9e9e9e';
	$exhibit_defaults[ 'text_color' ] = '#3a3a3a';
	$exhibit_defaults[ 'link_color' ] = '#1e73be';
	$exhibit_defaults[ 'link_color_hover' ] = '#222222';
	$exhibit_defaults[ 'link_color_visited' ] = '';
	
	return $exhibit_defaults;
}
endif;

/**
 * Set default options
 */
if ( !function_exists( 'exhibit_get_color_defaults' ) ) :
add_filter( 'generate_color_option_defaults','exhibit_get_color_defaults' );
function exhibit_get_color_defaults( $exhibit_color_defaults )
{	
	$exhibit_color_defaults[ 'header_background_color' ] = '#222222';
	$exhibit_color_defaults[ 'header_text_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'header_link_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'header_link_hover_color' ] = '#efefef';
	$exhibit_color_defaults[ 'site_title_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'site_tagline_color' ] = '#bcbcbc';
	$exhibit_color_defaults[ 'navigation_background_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'navigation_text_color' ] = '#5b5b5b';
	$exhibit_color_defaults[ 'navigation_background_hover_color' ] = '#1e72bd';
	$exhibit_color_defaults[ 'navigation_text_hover_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'navigation_background_current_color' ] = '#1e72bd';
	$exhibit_color_defaults[ 'navigation_text_current_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'subnavigation_background_color' ] = '#1e72bd';
	$exhibit_color_defaults[ 'subnavigation_text_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'subnavigation_background_hover_color' ] = '#1e72bd';
	$exhibit_color_defaults[ 'subnavigation_text_hover_color' ] = '#2d2d2d';
	$exhibit_color_defaults[ 'subnavigation_background_current_color' ] = '#1e72bd';
	$exhibit_color_defaults[ 'subnavigation_text_current_color' ] = '#2d2d2d';
	$exhibit_color_defaults[ 'content_background_color' ] = '#FFFFFF';
	$exhibit_color_defaults[ 'content_text_color' ] = '#3a3a3a';
	$exhibit_color_defaults[ 'content_link_color' ] = '';
	$exhibit_color_defaults[ 'content_link_hover_color' ] = '';
	$exhibit_color_defaults[ 'content_title_color' ] = '';
	$exhibit_color_defaults[ 'blog_post_title_color' ] = '#1E72BD';
	$exhibit_color_defaults[ 'blog_post_title_hover_color' ] = '#222222';
	$exhibit_color_defaults[ 'entry_meta_text_color' ] = '#888888';
	$exhibit_color_defaults[ 'entry_meta_link_color' ] = '#666666';
	$exhibit_color_defaults[ 'entry_meta_link_color_hover' ] = '#1E72BD';
	$exhibit_color_defaults[ 'h1_color' ] = '';
	$exhibit_color_defaults[ 'h2_color' ] = '';
	$exhibit_color_defaults[ 'h3_color' ] = '';
	$exhibit_color_defaults[ 'sidebar_widget_background_color' ] = '#FFFFFF';
	$exhibit_color_defaults[ 'sidebar_widget_text_color' ] = '#3a3a3a';
	$exhibit_color_defaults[ 'sidebar_widget_link_color' ] = '#686868';
	$exhibit_color_defaults[ 'sidebar_widget_link_hover_color' ] = '#1e73be';
	$exhibit_color_defaults[ 'sidebar_widget_title_color' ] = '#000000';
	$exhibit_color_defaults[ 'footer_widget_background_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'footer_widget_text_color' ] = '#222222';
	$exhibit_color_defaults[ 'footer_widget_link_color' ] = '';
	$exhibit_color_defaults[ 'footer_widget_link_hover_color' ] = '';
	$exhibit_color_defaults[ 'footer_widget_title_color' ] = '#222222';
	$exhibit_color_defaults[ 'footer_background_color' ] = '#222222';
	$exhibit_color_defaults[ 'footer_text_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'footer_link_color' ] = '#ffffff';
	$exhibit_color_defaults[ 'footer_link_hover_color' ] = '#f5f5f5';
	$exhibit_color_defaults[ 'form_background_color' ] = '#FAFAFA';
	$exhibit_color_defaults[ 'form_text_color' ] = '#666666';
	$exhibit_color_defaults[ 'form_background_color_focus' ] = '#FFFFFF';
	$exhibit_color_defaults[ 'form_text_color_focus' ] = '#666666';
	$exhibit_color_defaults[ 'form_border_color' ] = '#CCCCCC';
	$exhibit_color_defaults[ 'form_border_color_focus' ] = '#BFBFBF';
	$exhibit_color_defaults[ 'form_button_background_color' ] = '#666666';
	$exhibit_color_defaults[ 'form_button_background_color_hover' ] = '#606060';
	$exhibit_color_defaults[ 'form_button_text_color' ] = '#FFFFFF';
	$exhibit_color_defaults[ 'form_button_text_color_hover' ] = '#FFFFFF';
	
	return $exhibit_color_defaults;
}
endif;

/**
 * Set default options
 */
if ( !function_exists('exhibit_get_default_fonts') ) :
add_filter( 'generate_font_option_defaults','exhibit_get_default_fonts' );
function exhibit_get_default_fonts( $exhibit_font_defaults )
{	
	$exhibit_font_defaults[ 'font_body' ] = 'Roboto';
	$exhibit_font_defaults[ 'font_body_category' ] = 'sans-serif';
	$exhibit_font_defaults[ 'font_body_variants' ] = '100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic';
	$exhibit_font_defaults[ 'body_font_weight' ] = '300';
	$exhibit_font_defaults[ 'body_font_transform' ] = 'none';
	$exhibit_font_defaults[ 'body_font_size' ] = '16';
	$exhibit_font_defaults[ 'font_site_title' ] = 'inherit';
	$exhibit_font_defaults[ 'site_title_font_weight' ] = '300';
	$exhibit_font_defaults[ 'site_title_font_transform' ] = 'none';
	$exhibit_font_defaults[ 'site_title_font_size' ] = '78';
	$exhibit_font_defaults[ 'mobile_site_title_font_size' ] = '30';
	$exhibit_font_defaults[ 'font_site_tagline' ] = 'inherit';
	$exhibit_font_defaults[ 'site_tagline_font_weight' ] = '300';
	$exhibit_font_defaults[ 'site_tagline_font_transform' ] = 'none';
	$exhibit_font_defaults[ 'site_tagline_font_size' ] = '15';
	$exhibit_font_defaults[ 'font_navigation' ] = 'inherit';
	$exhibit_font_defaults[ 'navigation_font_weight' ] = '300';
	$exhibit_font_defaults[ 'navigation_font_transform' ] = 'none';
	$exhibit_font_defaults[ 'navigation_font_size' ] = '15';
	$exhibit_font_defaults[ 'font_widget_title' ] = 'inherit';
	$exhibit_font_defaults[ 'widget_title_font_weight' ] = '300';
	$exhibit_font_defaults[ 'widget_title_font_transform' ] = 'none';
	$exhibit_font_defaults[ 'widget_title_font_size' ] = '20';
	$exhibit_font_defaults[ 'widget_content_font_size' ] = '16';
	$exhibit_font_defaults[ 'font_heading_1' ] = 'inherit';
	$exhibit_font_defaults[ 'heading_1_weight' ] = '300';
	$exhibit_font_defaults[ 'heading_1_transform' ] = 'none';
	$exhibit_font_defaults[ 'heading_1_font_size' ] = '40';
	$exhibit_font_defaults[ 'mobile_heading_1_font_size' ] = '30';
	$exhibit_font_defaults[ 'font_heading_2' ] = 'inherit';
	$exhibit_font_defaults[ 'heading_2_weight' ] = '300';
	$exhibit_font_defaults[ 'heading_2_transform' ] = 'none';
	$exhibit_font_defaults[ 'heading_2_font_size' ] = '30';
	$exhibit_font_defaults[ 'mobile_heading_2_font_size' ] = '25';
	$exhibit_font_defaults[ 'font_heading_3' ] = 'inherit';
	$exhibit_font_defaults[ 'heading_3_weight' ] = 'normal';
	$exhibit_font_defaults[ 'heading_3_transform' ] = 'none';
	$exhibit_font_defaults[ 'heading_3_font_size' ] = '20';
	$exhibit_font_defaults[ 'footer_font_size' ] = '17';
	
	return $exhibit_font_defaults;
}
endif;

/**
 * Set default options
 */
if ( !function_exists( 'exhibit_get_spacing_defaults' ) ) :
add_filter( 'generate_spacing_option_defaults','exhibit_get_spacing_defaults' );
function exhibit_get_spacing_defaults( $exhibit_spacing_defaults )
{
	$exhibit_spacing_defaults[ 'header_top' ] = '70';
	$exhibit_spacing_defaults[ 'header_right' ] = '40';
	$exhibit_spacing_defaults[ 'header_bottom' ] = '70';
	$exhibit_spacing_defaults[ 'header_left' ] = '40';
	$exhibit_spacing_defaults[ 'menu_item' ] = '30';
	$exhibit_spacing_defaults[ 'menu_item_height' ] = '60';
	$exhibit_spacing_defaults[ 'sub_menu_item_height' ] = '10';
	$exhibit_spacing_defaults[ 'content_top' ] = '40';
	$exhibit_spacing_defaults[ 'content_right' ] = '40';
	$exhibit_spacing_defaults[ 'content_bottom' ] = '40';
	$exhibit_spacing_defaults[ 'content_left' ] = '40';
	$exhibit_spacing_defaults[ 'separator' ] = '10';
	$exhibit_spacing_defaults[ 'left_sidebar_width' ] = '25';
	$exhibit_spacing_defaults[ 'right_sidebar_width' ] = '25';
	$exhibit_spacing_defaults[ 'widget_top' ] = '40';
	$exhibit_spacing_defaults[ 'widget_right' ] = '40';
	$exhibit_spacing_defaults[ 'widget_bottom' ] = '40';
	$exhibit_spacing_defaults[ 'widget_left' ] = '40';
	$exhibit_spacing_defaults[ 'footer_widget_container_top' ] = '40';
	$exhibit_spacing_defaults[ 'footer_widget_container_right' ] = '0';
	$exhibit_spacing_defaults[ 'footer_widget_container_bottom' ] = '40';
	$exhibit_spacing_defaults[ 'footer_widget_container_left' ] = '0';
	$exhibit_spacing_defaults[ 'footer_top' ] = '20';
	$exhibit_spacing_defaults[ 'footer_right' ] = '0';
	$exhibit_spacing_defaults[ 'footer_bottom' ] = '20';
	$exhibit_spacing_defaults[ 'footer_left' ] = '0';
	
	return $exhibit_spacing_defaults;
}
endif;

/**
 * Prints the Post Image to post excerpts
 */
if ( ! function_exists( 'exhibit_post_image' ) && !function_exists( 'generate_blog_get_defaults' ) ) :
	add_action( 'generate_before_content', 'exhibit_post_image' );
	function exhibit_post_image()
	{
		if ( !has_post_thumbnail() )
			return;
			
		if ( 'post' == get_post_type() && !is_single() ) {
		?>
			<div class="post-image">
				<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
		<?php
		}
	}
endif;

/**
 * Add page header above content
 * @since 1.0.2
 */
add_action( 'generate_before_content', 'exhibit_featured_page_header' );
function exhibit_featured_page_header()
{
	if ( function_exists('generate_page_header') )
		return;

	if ( is_page() ) :
		
		generate_featured_page_header_area('page-header-image');
	
	endif;
}

/**
 * Add dynamic CSS
 * @since 0.4
 */
function exhibit_custom_css()
{

	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);

	if ( function_exists( 'generate_spacing_get_defaults' ) ) :
		
		$spacing_settings = wp_parse_args( 
			get_option( 'generate_spacing_settings', array() ), 
			generate_spacing_get_defaults() 
		);
			
	endif;
	
	if ( function_exists( 'generate_blog_get_defaults' ) ) :
		
		$blog_settings = wp_parse_args( 
			get_option( 'generate_blog_settings', array() ), 
			generate_blog_get_defaults() 
		);
			
	endif;
	
	if ( function_exists('generate_spacing_get_defaults') ) :
		$top_padding = $spacing_settings['content_top'];
		$right_padding = $spacing_settings['content_right'];
		$bottom_padding = $spacing_settings['content_bottom'];
		$left_padding = $spacing_settings['content_left'];
		$menu_height = $spacing_settings['menu_item_height'];
	else :
		$top_padding = 40;
		$right_padding = 40;
		$bottom_padding = 40;
		$left_padding = 40;
		$menu_height = 60;
	endif;
	
	$return = '';
		
	if ( function_exists( 'generate_blog_get_defaults' ) ) :
		if ( '' == $blog_settings['post_image_position'] ) :
			$return .= '.separate-containers .post-image, .separate-containers .inside-article .page-header-image-single, .separate-containers .inside-article .page-header-image, .separate-containers .inside-article .page-header-content-single, .no-sidebar .inside-article .page-header-image-single, .no-sidebar .inside-article .page-header-image, article .inside-article .page-header-post-image { margin: ' . $bottom_padding . 'px -' . $right_padding . 'px ' . $bottom_padding . 'px -' . $left_padding . 'px }';
		else :
			$return .= '.separate-containers .post-image, .separate-containers .inside-article .page-header-image-single, .separate-containers .inside-article .page-header-image, .separate-containers .inside-article .page-header-content-single, .no-sidebar .inside-article .page-header-image-single, .no-sidebar .inside-article .page-header-image, article .inside-article .page-header-post-image { margin: -' . $top_padding . 'px -' . $right_padding . 'px ' . $bottom_padding . 'px -' . $left_padding . 'px }';
		endif;
	else :
		$return .= '.separate-containers .post-image, .separate-containers .inside-article .page-header-image-single, .separate-containers .inside-article .page-header-image, .separate-containers .inside-article .page-header-content-single, .no-sidebar .inside-article .page-header-image-single, .no-sidebar .inside-article .page-header-image, article .inside-article .page-header-post-image { margin: -' . $top_padding . 'px -' . $right_padding . 'px ' . $bottom_padding . 'px -' . $left_padding . 'px }';
	endif;
	
	$return .= '.nav-above-header {padding-top: ' . $menu_height . 'px}';
	$return .= '.stickynav.nav-below-header .site-header {margin-bottom: ' . $menu_height . 'px}';
	
	if ( 'contained-nav' == $generate_settings['nav_layout_setting'] ) :
		$return .= '@media screen and (min-width: ' . $generate_settings['container_width'] . 'px) { body.stickynav.nav-below-header #site-navigation, body.nav-above-header #site-navigation, body.stickynav.nav-above-header #site-navigation { left: 50%; width: 100%; max-width: ' . $generate_settings['container_width'] . 'px; margin-left: -' . $generate_settings['container_width'] / 2 . 'px; } }';
		$return .= '@media screen and (min-width: 768px) and (max-width: ' . ($generate_settings['container_width'] - 1) . 'px){ body.stickynav.nav-below-header #site-navigation, body.nav-above-header #site-navigation, body.stickynav.nav-above-header #site-navigation { width: 100%; } }';
	endif;

	return $return;
}

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'exhibit_css', 50 );
function exhibit_css() {
	wp_add_inline_style( 'generate-style', exhibit_custom_css() );
}