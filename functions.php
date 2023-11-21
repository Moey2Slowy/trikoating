<?php 

// ----------------------------------------------------------------------------------------
// Remove extra junk
// ----------------------------------------------------------------------------------------
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
//remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
//remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

function post_remove () { 
    //remove_menu_page( 'index.php' );                  //Dashboard
    //remove_menu_page( 'edit.php' );                   //Posts
    //remove_menu_page( 'upload.php' );                 //Media
    //remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    //remove_menu_page( 'tools.php' );                  //Tools
    //remove_menu_page( 'options-general.php' );        //Settings
}
add_action('admin_menu', 'post_remove');   //adding action for triggering function call
add_filter('show_admin_bar', '__return_false');


// ----------------------------------------------------------------------------------------
// Remove Comments
// ----------------------------------------------------------------------------------------
function remove_comments_rss( $for_comments ) {
   return;
}
add_filter('post_comments_feed_link','remove_comments_rss');

function remove_recent_comments_style() {
   global $wp_widget_factory;
   remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );


// ----------------------------------------------------------------------------------------
// Stop WordPress from scaling large images
// ----------------------------------------------------------------------------------------
add_filter( 'big_image_size_threshold', '__return_false' );


// ----------------------------------------------------------------------------------------
// Custom image sizes
// ----------------------------------------------------------------------------------------
add_image_size( 'og', 1200, 630, true ); //open graph snippets preview image
add_image_size( 'gallery', 600, 600 ); //gallery thumbnails


// ----------------------------------------------------------------------------------------
// Login page styles
// ----------------------------------------------------------------------------------------
function custom_loginlogo() {
    echo '<style type="text/css">
        body.login {background: #003b4d;}
        body.login div#login h1 a {
            background-image: url('.get_bloginfo("template_directory").'/images/login.png) !important;
            background-size: contain;
            width: 236px;
            height: 52px;
        }
        body.login #loginform {
            background: #003b4d;
            border: 0px solid #ffffff;
            border-radius: 4px;
            color: #ffffff;
        }
        body.login form .input {
            outline: none;
            background: #ffffff;
            border: 2px solid #ffffff;
        }
        body.login form .input:focus {
            border-color: #d7282f;
            box-shadow: none;
        }
        body.login .button-primary {
            border: 2px solid #d7282f;
            outline: none;
            background: #d7282f;
        }
        body.login .button-primary:hover {
            border: 2px solid #000000;
            background: #434343;
        }
    </style>';
}
add_action('login_head', 'custom_loginlogo');


// ----------------------------------------------------------------------------------------
// Add Navigation // Add Feature Image option to posts
// ----------------------------------------------------------------------------------------
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


// ----------------------------------------------------------------------------------------
// Register Menus
// ----------------------------------------------------------------------------------------
function register_theme_menus() {
	register_nav_menus(
		array(
			'primary-nav' 	=> __( 'Primary Nav' )
		)
	);
}
add_action( 'init', 'register_theme_menus' );


// ----------------------------------------------------------------------------------------
// Advanced Custom Fields - add options page
// ----------------------------------------------------------------------------------------
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Business Info',
        'menu_title'    => 'Business Info',
        'menu_slug'     => 'business-info',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
}


// ----------------------------------------------------------------------------------------
// ACF - Google Maps API
// ----------------------------------------------------------------------------------------
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCwGYIChG3SbRDvzU3VGA1wDtpLIC9tDFM');
}
add_action('acf/init', 'my_acf_init');


// ----------------------------------------------------------------------------------------
// CSS
// ----------------------------------------------------------------------------------------
function tri_theme_styles() {
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/screen.css' );
}
add_action( 'wp_enqueue_scripts', 'tri_theme_styles' );


// ----------------------------------------------------------------------------------------
// JS
// ----------------------------------------------------------------------------------------
function tri_theme_js() {
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '', true );
	wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'scripts_js', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'foundation_js'), '', true );
}
add_action( 'wp_enqueue_scripts', 'tri_theme_js' );



?>