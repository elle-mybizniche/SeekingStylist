<?php

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

function faq_app_function() {
    register_post_type( 
        'faq-app',
        array(
            'labels'    => array(
                'name' => __( 'FAQs' ),
                'singular_name' => __('FAQ')
            ),
            'public'        => true,
            'publicly_queryable' => false,
            'has_archive'   => false,
            'show_in_rest'  => true,
            'menu_position' => 21,
            'supports'      =>  array('title', 'editor'),
            'menu_icon'     => 'dashicons-admin-tools',
            'rewrite'           => array('slug' => 'stylist'),
        )
    );
}
add_action( 'init', 'faq_app_function' );