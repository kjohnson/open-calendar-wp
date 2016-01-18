<?php

final class OCWP_Display_Shortcodes
{
    public function __construct()
    {
        wp_register_style( 'open_calendar_wp', OpenCalendarWP::get_url() . 'assets/css/style.css' );

        add_shortcode( 'open_calendar',     array( $this, 'display_calendar' ) );
        add_shortcode( 'open_calendar_wp',  array( $this, 'display_calendar' ) );
    }

    public function display_calendar( $atts = array() )
    {
        wp_enqueue_style( 'open_calendar_wp' );
        echo "[OPEN CALEDAR HERE]";
        echo OpenCalendarWP::render( 'display-calendar.html.php' );
    }

}
