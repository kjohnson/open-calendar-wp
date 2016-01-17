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
}

OpenCalendarWP::get_instance();
