<?php

final class OCWP_Display_Shortcodes
{
    public function __construct()
    {
        wp_register_style(  'open_calendar_wp_css_style', OpenCalendarWP::get_url() . 'assets/css/style.css' );
        wp_register_script( 'open_calendar_wp_js_main',   OpenCalendarWP::get_url() . 'assets/js/main.js', array( 'jquery', 'backbone' ) );
        wp_register_script( 'backbone-marionette',        OpenCalendarWP::get_url() . 'assets/js/lib/backbone.marionette.min.js', array( 'jquery', 'backbone' ) );

        add_shortcode( 'open_calendar',     array( $this, 'display_calendar' ) );
        add_shortcode( 'open_calendar_wp',  array( $this, 'display_calendar' ) );
    }

    public function display_calendar( $atts = array() )
    {
        wp_enqueue_style(  'open_calendar_wp_css_style' );
        wp_enqueue_script( 'backbone-marionette' );
        wp_enqueue_script( 'open_calendar_wp_js_main' );

        echo "[BEFORE CALENDAR SHORTCODE]";
        echo OpenCalendarWP::render( 'display-calendar.html.php' );
        echo OpenCalendarWP::render( 'display-tmpl-header.html.php' );
        echo OpenCalendarWP::render( 'display-tmpl-main.html.php' );
        echo OpenCalendarWP::render( 'display-tmpl-html.html.php' );
        echo "[AFTER CALENDAR SHORTCODE]";
    }

}
