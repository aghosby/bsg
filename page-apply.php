<?php

/**
 * The single page template for the job application page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<!-- Hero section -->
<section class="hero sub__pages single">
    <div class="overlay"></div>
    <?php if (get_field('featured_video')) : ?>
        <video class="hero__video" autoplay muted loop>
            <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
        </video>
        <?php else : ?>
        <img class="hero__img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
    <?php endif; ?>
    
    <div class="caption-cont pad-x">
        <div class="caption__wrap">
            <h1 class="hero__title">Job Application</h1>
        </div>
    </div>
    
</section>

<main id="primary" class="site-main">

    <section class="careers bkg-light py-lg-5 py-3">
        <div class="pad-x">

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h2 class="sec-hdr md primary text-center"><?= get_field('application_heading'); ?></h2>
                    <div class="sec-text text-center"><?= get_field('application_lead_text'); ?></div>
                    <!-- Application Form -->
                    <?= do_shortcode('[forminator_form id="364"]'); ?>
                </div>
            </div>
            
        </div>

    </section>

</main><!-- #main -->

<?php get_footer(); ?>