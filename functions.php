<?php

define('MBN_DIR_URI', get_template_directory_uri());
define('MBN_DIR_PATH', get_template_directory());
define('MBN_ASSETS_URI', MBN_DIR_URI.'/assets');
define('MBN_MAP_API_KEY',"AIzaSyDac2mOtJr_IktjUhiLZYRL_xHzxRbodRE");



/**
 * Theme setup
**/
function mbn_theme_setup(){
    show_admin_bar(false);

    add_theme_support('title-tag');
    
    add_theme_support('post-thumbnails');

    add_theme_support( 'woocommerce');
    
    //set_post_thumbnail_size(1568, 9999);
    // add_image_size('small-thumbnail', '150', '100');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // add_theme_support('custom-logo',array(
    //     'height'      => 190,
    //     'width'       => 190,
    //     'flex-width'  => false,
    //     'flex-height' => false
    // ));

    // add_theme_support('customize-selective-refresh-widgets');
    // add_theme_support('wp-block-styles');

    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('style-editor.css');

    register_nav_menus(array(
        'main-menu'   => 'Main Menu',
        'social-media-menu'   => 'Socia Media Menu',
    ));

}
add_action('after_setup_theme', 'mbn_theme_setup');



/**
 * Enqeueue stylesheets and scripts
**/
function mbn_enqueue_scripts(){
    global $wp_version;
    global $template;

    // Global CSS
    // wp_enqueue_style('mbn-style', get_stylesheet_uri());

    // unneccessary scripts
    wp_deregister_script('wp-embed');
    wp_deregister_style('wp-block-library');


    // dummy handler - for using inline-css
    wp_register_style('inlinecss-handle', false);
    wp_enqueue_style('inlinecss-handle');
    

    wp_enqueue_style('font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap', [], $wp_version);

    
    if(!is_admin()){
        wp_deregister_script('jquery');
    }
    wp_enqueue_script('jquery', MBN_ASSETS_URI.'/vendor/jquery-3.4.1.min.js', [], $wp_version);

    // Foundation JS
    wp_enqueue_script('foundation', MBN_ASSETS_URI.'/vendor/foundation/dist/js/foundation.min.js', [], $wp_version, true);

    // Mmenu Light
    // wp_enqueue_style('mmenu-light', MBN_ASSETS_URI.'/vendor/mmenu/mmenu-light.css', [], $wp_version);
    // wp_enqueue_script('mmenu-light', MBN_ASSETS_URI.'/vendor/mmenu/mmenu-light.js', [], $wp_version);

    wp_enqueue_style('mmenu', MBN_ASSETS_URI.'/vendor/mmenu/mmenu.min.css', [], $wp_version);
    wp_enqueue_script('mmenu', MBN_ASSETS_URI.'/vendor/mmenu/mmenu.min.js', [], $wp_version, true);

    // slick
    wp_enqueue_style('slick', MBN_ASSETS_URI.'/vendor/slick/slick.css', [], $wp_version);
    wp_enqueue_script('slick', MBN_ASSETS_URI.'/vendor/slick/slick.min.js', [], $wp_version, true);
   
    // Masonry
    // wp_enqueue_script('masonry', MBN_ASSETS_URI.'/vendor/masonry.pkgd.min.js', [], $wp_version);

    // Match Height
    wp_enqueue_script('match-height', MBN_ASSETS_URI.'/vendor/jquery.matchHeight-min.js', [], $wp_version, true);

    // Nicescroll
    // wp_enqueue_script('nicescroll', MBN_ASSETS_URI.'/vendor/jquery.nicescroll.min.js', [], $wp_version);

    // AOS
    wp_enqueue_style('aos', MBN_ASSETS_URI.'/vendor/aos/aos.css', [], $wp_version);
    wp_enqueue_script('aos', MBN_ASSETS_URI.'/vendor/aos/aos.js', [], $wp_version, true);

    // Parallax
    wp_enqueue_script('parallax', MBN_ASSETS_URI.'/vendor/parallax.min.js', [], $wp_version, true);

    // Fancybox
    wp_enqueue_style('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.css', [], $wp_version);
    wp_enqueue_script('fancybox', MBN_ASSETS_URI.'/vendor/fancybox/jquery.fancybox.min.js', [], $wp_version, true);

    
    // App
    wp_enqueue_style('app', MBN_ASSETS_URI.'/css/app.css', [], $wp_version);
    wp_enqueue_script('app', MBN_ASSETS_URI.'/js/app.js', [], $wp_version, true);

    wp_register_script( 'app', 'global_script' );
    wp_enqueue_script( 'app' );
    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
    wp_localize_script( 'app', 'global_obj', $translation_array );
    

    // localize objects
    wp_localize_script('app', 'main_obj', array(
        'ajax_url'  => admin_url('admin-ajax.php'),
        'home_url'  => home_url(),
        'theme_url' => MBN_DIR_URI,
        'nonce'     => wp_create_nonce('mbn-nonce')
    ));
}
add_action('wp_enqueue_scripts', 'mbn_enqueue_scripts', 20);


/**
 * Disabel gutenberg
**/
// add_filter('use_block_editor_for_post', '__return_false');
// function mbn_disable_gutenberg($current_status, $post_type){
//     // if ($post_type === 'ivtherapy') return false;
    
//     return $current_status;
// }
// add_filter('use_block_editor_for_post_type', 'mbn_disable_gutenberg', 10, 2);


// remove wp emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


/**
 * Register sidebars
**/
function mbn_register_sidebars(){
    // footer menus
    for($i=1;$i<=3;$i++){
        register_sidebar(array(
            'name'          => __('Footer Area '.$i),
            'id'            => 'footer-area-'.$i,
            'before_widget' => false,
            'after_widget'  => false,
            'before_title'  => false,
            'after_title'   => false,
        ));
    }
}
add_action('widgets_init', 'mbn_register_sidebars');


/**
 * Allow SVG
**/
function mbn_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'mbn_myme_types');


/**
 * Activation Hook
**/
function mbn_activator(){
    require MBN_DIR_PATH.'/includes/activator.php';
    new MBN_Activator();
}
add_action('after_switch_theme', 'mbn_activator');



require MBN_DIR_PATH.'/includes/tgmpa/init.php';
require MBN_DIR_PATH.'/includes/post-types.php';
require MBN_DIR_PATH.'/includes/shortcodes.php';
require MBN_DIR_PATH.'/includes/utils.php';
require MBN_DIR_PATH.'/includes/public-hooks.php';
require MBN_DIR_PATH.'/includes/admin-hooks.php';
require MBN_DIR_PATH . '/mbn-login/setup.php';
// require MBN_DIR_PATH.'/includes/site-optimization.php';
//require MBN_DIR_PATH.'/includes/options/theme-options.php';
// require MBN_DIR_PATH.'/includes/options/template-options.php';



add_filter( 'wpcf7_autop_or_not', '__return_false' );





function advanced_custom_search( $where, $wp_query ) {

    global $wpdb;
 
    if ( empty( $where )){
        return $where;
    }
 
    // get search expression
    $terms = $wp_query->query_vars[ 's' ];
    $terms = preg_replace('/[^A-Za-z0-9\-]/', ' ', $terms);

    
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );
         
    $where = '';
    
    $list_searcheable_acf = list_searcheable_acf();

    foreach( $exploded as $tag ) :
        $where .= " 
          AND (
            (".$wpdb->prefix."posts.post_title LIKE '%$tag%')
            OR (".$wpdb->prefix."posts.post_content LIKE '%$tag%')
            OR EXISTS (
              SELECT * FROM ".$wpdb->prefix."postmeta
                  WHERE post_id = ".$wpdb->prefix."posts.ID
                    AND (";

        foreach ($list_searcheable_acf as $searcheable_acf) :
          if ($searcheable_acf == $list_searcheable_acf[0]):
            $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          else :
            $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          endif;
        endforeach;

            $where .= ")
            )
            OR EXISTS (
              SELECT * FROM ".$wpdb->prefix."comments
              WHERE comment_post_ID = ".$wpdb->prefix."posts.ID
                AND comment_content LIKE '%$tag%'
            )
            OR EXISTS (
              SELECT * FROM ".$wpdb->prefix."terms
              INNER JOIN ".$wpdb->prefix."term_taxonomy
                ON ".$wpdb->prefix."term_taxonomy.term_id = ".$wpdb->prefix."terms.term_id
              INNER JOIN ".$wpdb->prefix."term_relationships
                ON ".$wpdb->prefix."term_relationships.term_taxonomy_id = ".$wpdb->prefix."term_taxonomy.term_taxonomy_id
              WHERE (
                taxonomy = 'post_tag'
                    OR taxonomy = 'category'                
                    OR taxonomy = 'myCustomTax'
                )
                AND object_id = ".$wpdb->prefix."posts.ID
                AND ".$wpdb->prefix."terms.name LIKE '%$tag%'
            )
        )";
    endforeach;
    return $where;
}
 
add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );

function list_searcheable_acf(){
  $list_searcheable_acf = array('osf_name','osf_location'); // add acf field_names that you want to search through
  return $list_searcheable_acf;
}