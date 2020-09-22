<?php


function mbn_register_post_type(){

    // Testimoinals
    // $labels = array(
    //     'name'                  => __('Testimonials'),
    //     'singular_name'         => __('Testimonial'),
    //     'menu_name'             => __('Testimonials'),
    //     'name_admin_bar'        => __('Testimonial'),
    //     'add_new'               => __('Add New'),
    //     'add_new_item'          => __('Add New Testimonial'),
    //     'new_item'              => __('New Testimonial'),
    //     'edit_item'             => __('Edit Testimonial'),
    //     'view_item'             => __('View Testimonial'),
    //     'all_items'             => __('Testimonials'),
    //     'search_items'          => __('Search Testimonials'),
    //     'parent_item_colon'     => __('Parent Testimonials:'),
    //     'not_found'             => __('No Testimonials found.'),
    //     'not_found_in_trash'    => __('No Testimonials found in Trash.')
    // );

    // $args = array(
    //     'labels'                => $labels,
    //     'description'           => 'lorem ipsum',
    //     'public'                => false,
    //     'publicly_queryable'    => false,
    //     'show_in_menu'          => true,
    //     'show_ui'               => true,
    //     'show_in_admin_bar'     => false,
    //     'show_in_nav_menus'     => true,
    //     'capability_type'       => 'post',
    //     'show_in_rest'          => true,
    //     'has_archive'           => true,
    //     'hierarchical'          => false,
    //     'can_export'            => true,
    //     'menu_position'         => 5,
    //     'menu_icon'             => 'dashicons-editor-quote',
    //     'supports'              => array('title', 'editor'),
    //     'delete_with_user'      => true
    // );

    // register_post_type('testimonials', $args);


    // // Add new taxonomy
    // $labels = array(
    //     'name'              => 'Categories',
    //     'singular_name'     => 'Category',
    //     'search_items'      => 'Search Categories',
    //     'all_items'         => 'All Categories',
    //     'parent_item'       => 'Parent Category',
    //     'parent_item_colon' => 'Parent Category:',
    //     'edit_item'         => 'Edit Category',
    //     'update_item'       => 'Update Category',
    //     'add_new_item'      => 'Add New Category',
    //     'new_item_name'     => 'New Category Name',
    //     'menu_name'         => 'Category',
    // );

    // $args = array(
    //     'hierarchical'      => true,
    //     'labels'            => $labels,
    //     'show_ui'           => true,
    //     'show_admin_column' => true,
    //     'query_var'         => true,
    //     'rewrite'           => array('slug' => 'faqs_cat'),
    // );

    // register_taxonomy('faqs_cat', array('faqs'), $args);
}

add_action('init', 'mbn_register_post_type');


function home_page_banner_app() {
    register_post_type( 
        'home-banner-app',
        array(
            'labels'    => array(
                'name' => __( 'Home Banner' ),
                'singular_name' => __('Home Banner App')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => true,
            'menu_position' => 21,
            'supports'      =>  array('title'),
            'menu_icon'     => 'dashicons-admin-tools',
            'rewrite'  => array('slug' => 'home-banner-app'),
        )
    );
}
add_action( 'init', 'home_page_banner_app' );



function home_gallery_app_func() {
    register_post_type( 
        'home-gallery-app',
        array(
            'labels'    => array(
                'name' => __( 'Home Gallery' ),
                'singular_name' => __('Home Gallery App')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => false,
            'menu_position' => 20,
            'supports'      =>  array('title'),
            'menu_icon'     => 'dashicons-admin-tools',
        )
    );
}
add_action( 'init', 'home_gallery_app_func' );


function stylist_app_function() {
    register_post_type( 
        'stylist-app',
        array(
            'labels'    => array(
                'name' => __( 'Our Stylists' ),
                'singular_name' => __('Our Stylist')
            ),
            'public'        => true,
            'publicly_queryable' => true,
            'has_archive'   => false,
            'show_in_rest'  => true,
            'menu_position' => 21,
            'supports'      =>  array('title', 'editor', 'thumbnail', 'comments'),
            'menu_icon'     => 'dashicons-admin-tools',
            'rewrite'           => array('slug' => 'stylist'),
        )
    );
}
add_action( 'init', 'stylist_app_function' );