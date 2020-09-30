<?php

function mbn_shortcode_home_url($atts = null, $content = null){
    return home_url();
}
add_shortcode('home_url', 'mbn_shortcode_home_url');



function home_gallery_app_sc($atts = null, $content = null){
	ob_start();
    require dirname(__FILE__) .  '/webapps/home-gallery-app.php';
    $data = ob_get_contents();
    ob_end_clean();

    return $data;
}
add_shortcode('home_gallery', 'home_gallery_app_sc');



function featured_stylists_app_sc($atts = null, $content = null){
	ob_start();
    require dirname(__FILE__) .  '/webapps/featured-stylists-app.php';
    $data = ob_get_contents();
    ob_end_clean();

    return $data;
}
add_shortcode('featured_stylists', 'featured_stylists_app_sc');



function latest_articles($atts = null, $content = null){
    ob_start();
    require dirname(__FILE__) .  '/webapps/latest-articles.php';
    $data = ob_get_contents();
    ob_end_clean();

    return $data;
}
add_shortcode('home_latest_articles', 'latest_articles');



function faq_app_func($atts = null, $content = null){
    ob_start();
    require dirname(__FILE__) .  '/webapps/faqs-app.php';
    $data = ob_get_contents();
    ob_end_clean();

    return $data;
}
add_shortcode('faq_lists', 'faq_app_func');




function social_media_func($atts = null, $content = null){
    ob_start();
    require dirname(__FILE__) .  '/webapps/social-media-app.php';
    $data = ob_get_contents();
    ob_end_clean(); 

    return $data;
}

add_shortcode('social_media_menu', 'social_media_func');