<?php

/**
 * The single page template for Careers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Hero section -->
    <section class="hero sub__pages single rd">
        <div class="overlay"></div>
        <?php if (get_field('featured_video')) : ?>
            <video class="hero__video" autoplay muted loop>
                <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
            </video>
            <?php else : ?>
            <!-- <img class="hero__img" src="" alt=""> -->
        <?php endif; ?>

        <div class="caption-cont pad-x">
            <div class="caption__wrap">
                <h1 class="hero__title"><?= get_field('careers_title', 'option'); ?></h1>
            </div>
        </div>
        
    </section>

    <section class="careers py-lg-5 py-3">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7">

                    <div class="sec-hdr primary md mb-lg-1 mb-1"><?php echo get_the_title(); ?></div>

                    <div class="sec-text">
                        <?= get_field('job_details'); ?>
                    </div>

                    <div class="closing-date">
                        Closing Date: <?= get_field('closing_date'); ?>
                    </div>

                    <div class="application-info">
                        <h3 class="sec-hdr reg dark">Interested in this role?</h3>

                        <a href="<?php echo esc_url(add_query_arg('job_position', get_the_title(), site_url('/apply'))); ?>" class="btn primary lg">
                            Apply for this role
                        </a>

                        <!-- <a href="javascript:window.print()" class="btn secondary clr_sec">
                            Export as PDF
                        </a> -->

                        <div class="share mt-lg-2 mb-0">
                            <h4 class="sec-hdr sm dark">Share this job advert</h4>
                            <?php get_template_part('template-parts/section', 'share'); ?>
                        </div>
                    </div>

                    

                </div>
            </div>

            

        </div>


    </section>

    <?php
	    endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php get_footer(); ?>