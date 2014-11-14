<?php
/*
Plugin Name: TTCool Plugin
Author: Wudong Liu
*/


if (!defined('TT_COOL_PLUGIN_DIR'))
    define('TT_COOL_PLUGIN_DIR', trailingslashit(plugin_dir_path(__FILE__)));

if (!defined('TT_COOL_PLUGIN_URL'))
    define('TT_COOL_PLUGIN_URL', trailingslashit(plugin_dir_url(__FILE__)));

if (!defined('TT_COOL_PLUGIN_VERSION'))
    define('TT_COOL_PLUGIN_VERSION', '1.0.0');

/**
 * Set the defula locale to be Chinese.
 * This enable the locale to be set by a request param '?l=zh_CN'
 *
 */
function my_theme_localized($locale)
{
    if (isset($_GET['l'])) {
        return esc_attr($_GET['l']);
    }

//	return $locale;
    return 'zh_CN';
}

add_filter('locale', 'my_theme_localized');

// WUDONG set up the support for using timber.
if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
    });
    return;
}

class TTCoolSite extends TimberSite
{

    function __construct()
    {
        add_theme_support('post-formats');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_filter('timber_context', array($this, 'add_to_context'));
        add_filter('get_twig', array($this, 'add_to_twig'));
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        parent::__construct();
    }

    function register_post_types()
    {
        //this is where you can register custom post types
    }

    function register_taxonomies()
    {
        //this is where you can register custom taxonomies
    }

    function add_to_context($context)
    {
//		$context['foo'] = 'bar';
//		$context['stuff'] = 'I am a value set in your functions.php file';
//		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
        $context['menu'] = new TimberMenu();
        $context['site'] = $this;
        return $context;
    }

    function add_to_twig($twig)
    {
        /* this is where you can add your own fuctions to twig */
        $twig->addExtension(new Twig_Extension_StringLoader());
        $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
        return $twig;
    }

}

new TTCoolSite();


/**
 * Register the javascript files
 */
function ttcool_scripts()
{
//	wp_register_script( 'jquery', '//code.jquery.com/jquery-1.11.1.min.js' );
    wp_register_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');

//	wp_enqueue_script( 'jquery' );
    wp_enqueue_script('bootstrap');

//  our own javascript files.
// define the ajax request url to be used by the javascript.
//this is to define the global parameters that will be used by javascript.
// SEE: http://solislab.com/blog/5-tips-for-using-ajax-in-wordpress/

//  embed the javascript file that makes the AJAX request
//    wp_enqueue_script( 'my-ajax-request', plugin_dir_url( __FILE__ ) . 'js/ajax.js', array( 'jquery' ) );

    wp_localize_script('ajax-request', 'Ajax', array(
            // URL to wp-admin/admin-ajax.php to process the request
            'ajaxurl' => admin_url('admin-ajax.php'),

            // generate a nonce with a unique ID "myajax-post-comment-nonce"
            // so that you can check it later when an AJAX request is sent
            'nonce' => wp_create_nonce('ajax-nonce'),
        )
    );

}

add_action('wp_print_scripts', 'ttcool_scripts');

/**
 * Register the css style files.
 */
function ttcool_styles()
{
    wp_register_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
    wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('font-awesome');
}

add_action('wp_print_styles', 'ttcool_styles');

function my_plugin_override()
{
    //remove the default easy_image_gallary's display
    remove_filter('the_content', 'easy_image_gallery_append_to_content');
}

add_action('plugins_loaded', 'my_plugin_override');

//register types.
require_once('core/register_types.php');

require_once('product.php');
require_once('review.php');
require_once('image-slider.php');

require_once('ajax/ajax.php');

?>
