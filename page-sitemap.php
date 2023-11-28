<?php

/**
 * The Sitemap page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<main id="primary" class="site-main default">

    <!-- Hero section -->
    <section class="hero sub__pages single rd">
        <div class="overlay"></div>
        
        <div class="container">
            <div class="caption__wrap">
                <h1 class="hero__title"><?php echo get_the_title(); ?></h1>
            </div>
        </div>
        
    </section>


    <div class="container">
        <div class="sitemap">

            <?php
            // Uncomment the code below, copy the result and
            // paste in the 'sitemap_post_type' ACF field choices.

            // echo sbx_get_all_post_types(
            //     ['attachment', 'give_forms', 'tribe_venue', 'tribe_organizer']
            // );
            ?>

            <?php echo sbx_generate_sitemap(); ?>

        </div>
    </div>

</main><!-- #main -->

<?php get_footer(); ?>