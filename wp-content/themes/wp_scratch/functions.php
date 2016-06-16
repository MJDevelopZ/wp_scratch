<?php
//Enqueue scripts and style sheets
function wp_scratch_scripts(){
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
	wp_enqueue_script ( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery'), '3.3.6', true);
}

add_action ( 'wp_enqueue_scripts', 'wp_scratch_scripts' );

//Add Google Fonts
function wp_scratch_google_fonts(){
	wp_register_style( 'Quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:400,700');
	wp_enqueue_style('Quicksand');
}

add_action('wp_print_styles', 'wp_scratch_google_fonts');

//WP Titles
add_theme_support ('title-tag');

//Custom Social Links
function custom_social_links_add_menu(){
	add_menu_page( 'Custom Social Links', 'Custom Social Links', 'manage_options', 'custom_social_links', 'custom_social_links_page', null, 99);
}
add_action('admin_menu', 'custom_social_links_add_menu' );

//Creat Custom Social Links Settings
function custom_social_links_page(){ ?>
	<div class="wrap">
		<h1>Custom Social Links</h1>
			<form method="post" action="options.php">
				<?php
					settings_fields('section');
					do_settings_sections('theme-options');
					submit_button();
				?>
			</form>
	</div>
<?php }

//Twitter
function display_twitter(){ ?>
	<input type="text" name="twitter" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
<?php }

//Github
function display_github() { ?>
	<input type="text" name="github" id="github_url" value="<?php echo get_option('github_url'); ?>" />
<?php }

//Choose layout
function display_layout_element(){ ?>
	<input type="checkbox" name="theme_layout" value="1" <?php checked(1, get_option('theme_layout', true) ); ?> />
	<?php } 

function display_theme_panel_fields(){
	add_settings_section( 'section', 'All Settings', null, 'theme-options');

	add_settings_field('twitter', 'Twitter URL', 'display_twitter', 'theme-options', 'section');
	add_settings_field('github', 'GitHub URL', 'display_github', 'theme-options', 'section');
	add_settings_field('theme_layout', "Do you want the layout to be responsive?", "display_layout_element", "theme-options", "section");

	register_setting('section', 'twitter');
	register_setting('section', 'github');
	register_setting('section', 'theme_layout');
}

add_action('admin_init', 'display_theme_panel_fields');

//Add Featured Image
add_theme_support( 'post-thumbnails');

//Add Custom Post Type
function create_my_custom_post(){
	register_post_type('my-custom-post',
		array(
			'labels'=> array(
				'name' => __('My Custom Post'),
				'singular_name' => __('My Custom Post'),
				),
			'public' => true,
			'has_archive' => true, 
			'supports' => array(
				'title', 
				'editor',
				'thumbnail',
				'custom-fields'
				)
			));
}
add_action('init', 'create_my_custom_post');

//Add Menu
function register_main_menu(){
	register_nav_menu('header-menu', __( 'Header Menu'));
}
add_action('init', 'register_main_menu');