<?php

/**
 * The archive page template for Careers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<!-- Hero section -->
<section class="hero sub__pages">
    <div class="overlay"></div>
    <?php if (get_field('featured_video')) : ?>
        <video class="hero__video" autoplay muted loop>
            <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
        </video>
        <?php else : ?>
        <img class="hero__img" src="<?= get_field('careers_featured_image', 'option')['url']; ?>" alt="">
    <?php endif; ?>

    <div class="caption-cont pad-x">
        <div class="caption__wrap">
            <h1 class="hero__title"><?= get_field('careers_title', 'option'); ?></h1>
        </div>
    </div>
    
</section>

<main id="primary" class="site-main">

    <!-- <section class="pad-x pt-lg-4 pt-2">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="sec-text js-anime fadeInLeft"><?= the_content(); ?></div>
            </div>
        </div>
    </section> -->

    <section class="careers">
        <div class="pad-x">

            <div class="row justify-content-center pt-lg-5 pt-3 pb-3">
                <div class="col-lg-7">
                    <h2 class="sec-hdr md primary"><?= get_field('job_listings_header', 'option'); ?></h2>
                    <div class="sec-text"><?= get_field('careers_lead_text', 'option'); ?></div>
                </div>
            </div>


            <!-- Careers loop + Inject AJAX response -->
            <?php if (have_posts()) : ?>

                <div class="careers-wrapper" id="response">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts', careers_card()); ?>

                    <?php endwhile; ?>

                </div>

            <?php else : ?>

                <div class="no-posts-found">We currently don’t have any open vacancies, but you can still <a href="<?php echo site_url('/contact'); ?>">register your interest</a> to work with us.</div>

            <?php endif;
            wp_reset_postdata(); ?>
            <!-- end Careers loop -->

            <!-- Custom Bootstrap pagination  -->
            <?= bootstrap_pagination(); ?>

        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>