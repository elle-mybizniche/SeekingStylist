<?php 
/* Template Name: Sign Up Page */
?>

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
    

    <div id="page" class="sign-template">
        <main class="child-page">
            <div class="grid-container">
                <div class="form-box">
                    <?php if(have_posts()): ?>
                        <?php while(have_posts()): the_post() ?>
                            <?php the_content() ?>
                        <?php endwhile ?>
                    <?php endif ?>

                    <div class="form-content">
                        <div class="form-item">
                            <input type="text" placeholder="First Name*">
                        </div>

                        <div class="form-item">
                            <input type="text" placeholder="Last Name*">
                        </div>

                        <div class="form-item">
                            <input type="email" placeholder="Email Address*">
                        </div>

                        <div class="form-item">
                            <button id="submit" class="btn-block btn btn-violet">SIGN UP</button>
                        </div>
                    </div>


                    <div class="divider-text">
                        <span>OR</span>
                    </div>

                    <div class="grid-x grid-margin-x mb-3">
                        <div class="cell large-6 mb-3">
                            <a href="#" class="btn btn-icon btn-fb btn-block"><span>SIGN UP WITH FACEBOOK</span></a>
                        </div>
                        <div class="cell large-6 mb-3">
                            <a href="#" class="btn btn-icon btn-google btn-block"><span>SIGN UP WITH GOOGLE</span></a>
                        </div>
                    </div>

                    <p class="text-upper"><a href="<?= get_site_url(); ?>/stylist-login/">Sign In</a> if you are already a member.</p>
                    <p class="text-lower">By registering, I accept the HairStreet <a href="/terms-of-use">Terms of Use</a>.</p>


                </div>
            </div>
        </main>
    </div>


    <?php wp_footer() ?>

</body>
</html>