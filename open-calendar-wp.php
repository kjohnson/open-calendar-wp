<?php

/*
 * Plugin Name: Open Calendar WP
 * Plugin URI: http://opencalendarwp.com/
 * Description: A WordPress calendar plugin with an open context for any content.
 * Author Name: Kyle B. Johnson
 * Author URI: http://kylebjohnson.me
 */

final class OpenCalendarWP
{
    /**
     * @var string
     */
    const VERSION = '0.1.0';

    /**
     * @var OpenCalendarWP
     */
    private static $instance;

    /**
     * @var string
     */
    private static $dir = '';

    /**
     * @var string
     */
    private static $url = '';

    /**
     * @return OpenCalendarWP
     */
    public static function get_instance()
    {
        if (!isset(self::$instance) && !(self::$instance instanceof OpenCalendarWP)) {
            self::$instance = new OpenCalendarWP;

            self::$dir = plugin_dir_path(__FILE__);

            self::$url = plugin_dir_url(__FILE__);

            register_activation_hook( __FILE__, array( self::$instance, 'activation' ) );

            register_deactivation_hook( __FILE__, array( self::$instance, 'deactivation' ) );

            register_uninstall_hook( __FILE__, array( self::$instance, 'uninstall' ) );

            spl_autoload_register( array( self::$instance, 'autoloader' ) );

            new OCWP_Admin_Menu_Settings();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    public static function get_dir()
    {
        return self::$dir;
    }

    /**
     * @return string
     */
    public static function get_url()
    {
        return self::$url;
    }

    /**
     * @return void
     */
    public function activation()
    {
        // This section intentionally left blank.
    }

    /**
     * @return void
     */
    public function deactivation()
    {
        // This section intentionally left blank.
    }

    /**
     * @return void
     */
    public function uninstall()
    {
        //if uninstall not called from WordPress exit
        if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
            exit();

        // This section intentionally left blank.
    }

    /**
     * @param $class_name
     * @return void
     */
    public function autoloader( $class_name )
    {
        if( class_exists( $class_name ) ) return;

        if (false !== strpos($class_name, 'OCWP_')) {
            $class_name = strtolower( str_replace('OCWP_', '', $class_name) );
            $classes_dir = realpath(plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR;
            $class_file = str_replace('_', DIRECTORY_SEPARATOR, $class_name) . '.php';
            if (file_exists($classes_dir . $class_file)) {
                require_once $classes_dir . $class_file;
            }
        }
    }

    /**
     * @param string $file_name
     * @param array $data
     * @return string|void
     */
    public static function render( $file_name = '', array $data = array() )
    {
        if( ! $file_name ) return;

        extract( $data );

        ob_start();
        include self::$dir . 'includes/views/' . $file_name;
        return ob_get_clean();
    }
}

OpenCalendarWP::get_instance();
