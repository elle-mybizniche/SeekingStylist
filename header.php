<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?php echo MBN_ASSETS_URI ?>/img/favicon.ico">
    <?php wp_head() ?>


</head>

<?php $controlPage = is_front_page() ? 'homepage' : 'innerpage'; ?>
<body <?php body_class($controlPage) ?>>

    <div id="page">
        
        <header id="header" class="header">
            <div class="top-mobile-menu">
                <a href="#">
                    <img class="top-logo" src="<?= get_template_directory_uri(); ?>/resources/img/hair-street-logo.png" alt="<?php echo get_bloginfo(); ?>"  title="<?php echo get_bloginfo(); ?>">
                </a>
                <a href="#main-menu-control" class="hamburger-menu"><span>menu</span></a>
            </div>
            <?php if (is_front_page()): ?>
                <?php 
                    $query = new WP_Query( array(
                        'post_type' => 'home-banner-app',
                        'post_status' => 'publish',
                        'posts_per_page' => 1
                    ));
                    while ($query->have_posts()) : $query->the_post();
                ?>
                    <div class="home-banner">
                        <?php $controlBannerImage = get_field('hbf_banner_image') ?>
                        <img class="banner-image" src="<?= $controlBannerImage['url'] ?>" alt="<?= $controlBannerImage['alt'] ?>"  title="<?= $controlBannerImage['alt'] ?>">
                        <div class="banner-description">
                            <div class="grid-container">
                                <?php $controlBannerLogo = get_field('hbf_banner_logo') ?>
                                <?php if ($controlBannerLogo): ?>
                                    <img class="logo" src="<?= $controlBannerLogo['url'] ?>" alt="<?= $controlBannerLogo['alt'] ?>" title="<?= $controlBannerLogo['alt'] ?>">
                                <?php endif ?>
                                
                                <h2><?= get_field('hbf_banner_heading_main') ?></h2>
                                <p><?= get_field('hbf_banner_heading_sub_heading') ?></p>
                                <form action="<?= get_site_url(); ?>/find-a-stylists/">
                                    <div class="group-fields">
                                        <input type="text" name="search" id="search" placeholder="Search by Location or by Stylist’s Name">
                                        <button type="submit" class="btn btn-black">search</button>
                                    </div>
                                </form>
                                <div class="info">
                                    <p><span>Are You A Stylist?</span> <a href="/sign-up"><span>Register Now</span></a><a href="/stylist-login"><span>Login</span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php endif ?>
            

            <div class="main-menu fixed-header">
                <div class="logo">
                    <a href="/">
                        <img src="<?= get_template_directory_uri(); ?>/resources/img/hair-street-logo-white-menu.png" alt="<?php echo get_bloginfo(); ?>"  title="<?php echo get_bloginfo(); ?>">
                    </a>
                </div>
                <nav>
                    <div id="main-menu-control">
                        <?php
                            wp_nav_menu(
                                array(
                                    'container'=> false,
                                    'theme_location' => 'main-menu',
                                    'menu_id'        => 'main-menu',
                                )
                            );
                        ?>
                    </div>
                    
                    <a href="#main-menu-control" class="hamburger-menu"><span>menu</span></a>
                </nav>
            </div>
        </header>

    