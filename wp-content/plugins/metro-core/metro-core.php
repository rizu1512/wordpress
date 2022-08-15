<?php
/*
Plugin Name: Metro Core
Plugin URI: https://www.radiustheme.com
Description: Metro Core Plugin for Metro Theme
Version: 1.7.0
Author: RadiusTheme
Author URI: https://www.radiustheme.com
*/

if (! defined('ABSPATH')) {
    exit;
}

if (! defined('METRO_CORE')) {
    $plugin_data = get_file_data(__FILE__, array( 'version' => 'Version' ));
    define('METRO_CORE', $plugin_data['version']);
    define('METRO_CORE_SCRIPT_VER', ( WP_DEBUG ) ? time() : METRO_CORE);
    define('METRO_CORE_THEME_PREFIX', 'metro');
    define('METRO_CORE_BASE_DIR', plugin_dir_path(__FILE__));
}

class Metro_Core
{

    public $plugin  = 'metro-core';
    public $action  = 'metro_theme_init';
    protected static $instance;

    public function __construct()
    {

        add_action('plugins_loaded', array( $this, 'load_textdomain' ), 20);
        add_action('plugins_loaded', array( $this, 'demo_importer' ), 17);
        add_action($this->action, array( $this, 'after_theme_loaded' ));
        add_action('rdtheme_social_share', array( $this, 'social_share' ));
        add_action('plugins_loaded', array( $this, 'php_version_check' ));
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function php_version_check()
    {

        if (version_compare(phpversion(), '7.2', '<')) {
            add_action('admin_notices', [ $this, 'php_version_message' ]);
        }

        if (version_compare(phpversion(), '7.2', '>')) {
            require_once METRO_CORE_BASE_DIR . 'lib/optimization/__init__.php';
        }
    }

    public function php_version_message()
    {

        $class = 'notice notice-warning settings-error';
        /* translators: %s: html tags */
        $message = sprintf(__('The %1$sMetro Optimization%2$s requires %1$sphp 7.2+%2$s. Please consider updating php version and know more about it <a href="https://wordpress.org/about/requirements/" target="_blank">here</a>.', 'metro-core'), '<strong>', '</strong>');
        printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses_post($message));
    }

    public function after_theme_loaded()
    {

        require_once METRO_CORE_BASE_DIR . 'plugin-hooks.php'; // Plugin Hooks
        require_once METRO_CORE_BASE_DIR . 'lib/sidebar-generator/init.php'; // Sidebar generator
        require_once METRO_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
        require_once METRO_CORE_BASE_DIR . 'lib/navmenu-icon/init.php'; // Navmenu icon support


        if (defined('RT_FRAMEWORK_VERSION')) {
            require_once METRO_CORE_BASE_DIR . 'inc/post-meta.php'; // Post Meta
            require_once METRO_CORE_BASE_DIR . 'widgets/init.php'; // Widgets
        }

        if (did_action('elementor/loaded')) {
            require_once METRO_CORE_BASE_DIR . 'elementor/init.php'; // Elementor
        }
    }

    public function demo_importer()
    {
        require_once METRO_CORE_BASE_DIR . 'inc/demo-importer.php';
        require_once METRO_CORE_BASE_DIR . 'inc/demo-importer-ocdi.php';
    }

    public function social_share($sharer)
    {
        include METRO_CORE_BASE_DIR . 'inc/social-share.php';
    }

    public function load_textdomain()
    {
        load_plugin_textdomain($this->plugin, false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
}

Metro_Core::instance();
