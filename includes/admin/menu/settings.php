<?php

final class OCWP_Admin_Menu_Settings extends OCWP_Abstracts_Submenu
{
    public $parent_slug = 'options-general.php';

    public $page_title = 'Open Calendar';

    public function display()
    {
        $settings = array(
            'foo' => array(
                'name' => 'foo',
                'type' => 'textbox',
                'label' => __( 'Foo Setting', 'open-calendar-wp' ),
                'value' => 'Foo Setting Value',
            ),
            'bar' => array(
                'name' => 'bar',
                'type' => 'textarea',
                'label' => __( 'Bar Setting', 'open-calendar-wp' ),
                'value' => 'Bar Setting Value'
            ),
            'baz' => array(
                'name' => 'baz',
                'type' => 'checkbox',
                'label' => __( 'Baz Setting', 'open-calendar-wp' ),
                'value' => FALSE
            ),
        );

        echo OpenCalendarWP::render( 'admin-menu-settings.html.php', compact( 'settings' ) );
    }
}