<?php

final class OCWP_Display_Shortcodes
{
    public function __construct()
    {
        add_shortcode( 'open_calendar',     array( $this, 'display_calendar' ) );
        add_shortcode( 'open_calendar_wp',  array( $this, 'display_calendar' ) );
    }

    public function display_calendar( $atts = array() )
    {
        echo "[OPEN CALEDAR HERE]";
    }

}
