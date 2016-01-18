<?php

final class OCWP_Admin_Menu_Calendar extends OCWP_Abstracts_Menu
{
    public $menu_slug = 'open-calendar-wp';

    public $icon_url = 'dashicons-calendar-alt';

    public $position = '20';

    public function __construct()
    {
        $this->page_title = __( 'Calendar', 'open-calendar-wp' );

        parent::__construct();
    }

    public function display()
    {
        // TODO: Implement display() method.
    }
}