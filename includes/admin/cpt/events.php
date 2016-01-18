<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class OCWP_Admin_CPT_Events
{
    /**
     * @var string
     */
    const POST_TYPE = 'ocwp-event';

    /**
     * Constructor
     */
    public function __construct()
    {
        add_action( 'init', array( $this, 'custom_post_type' ) );
    }

    /**
     * Custom Post Type
     */
    function custom_post_type() {

        $labels = array(
            'name'                => _x( 'Events', 'Post Type General Name', 'open-calendar' ),
            'singular_name'       => _x( 'Events', 'Post Type Singular Name', 'open-calendar-wp' ),
            'menu_name'           => __( 'Events', 'open-calendar-wp' ),
            'name_admin_bar'      => __( 'Events', 'open-calendar-wp' ),
            'parent_item_colon'   => __( 'Parent Item:', 'open-calendar-wp' ),
            'all_items'           => __( 'Events', 'open-calendar-wp' ),
            'add_new_item'        => __( 'Add New Event', 'open-calendar-wp' ),
            'add_new'             => __( 'Add New', 'open-calendar-wp' ),
            'new_item'            => __( 'New Event', 'open-calendar-wp' ),
            'edit_item'           => __( 'Edit Event', 'open-calendar-wp' ),
            'update_item'         => __( 'Update Event', 'open-calendar-wp' ),
            'view_item'           => __( 'View Event', 'open-calendar-wp' ),
            'search_items'        => __( 'Search Events', 'open-calendar-wp' ),
            'not_found'           => __( 'No Events Found', 'open-calendar-wp-forms' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'open-calendar-wp' ),
        );
        $args = array(
            'label'               => __( 'Event', 'open-calendar-wp' ),
            'description'         => __( 'Calendar Events', 'open-calendar-wp' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => 'open-calendar-wp',
            'menu_position'       => 5,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'rewrite'             => array( 'slug' => 'events' ), // TODO: Make the rewrite customizable
        );
        register_post_type( $this::POST_TYPE, $args );
    }

}

