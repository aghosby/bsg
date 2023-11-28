<?php

/**
 * The single page template for Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Hero section -->
    <section class="hero sub__pages">
        <div class="overlay"></div>
        <?php if (get_field('featured_video')) : ?>
            <video class="hero__video" autoplay muted loop>
                <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
            </video>
            <?php else : ?>
            <img class="hero__img" src="<?= get_field('workshops_page_featured_image', 'option')['url']; ?>" alt="">
        <?php endif; ?>
        
        <div class="caption-cont pad-x">
            <!-- <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            
            </div> -->
            <div class="caption__wrap">
                <h1 class="hero__title">Workshops</h1>
            </div>
        </div>
        
    </section>

    <!-- Details Section -->
    <section class="pad-x py-lg-5 py-3">
        <div class="single-page container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-hdr md primary"><?= the_title(); ?></div>
                    <div class="share d-flex align-items-center pt-lg-1 pt-1">
                        <h4 class="sec-hdr sm dark me-1 me-lg-1">Share this event</h4>
                        <?= get_template_part('template-parts/section', 'share'); ?>
                    </div>
                    <div class="sec-text mt-lg-2 mt-2"><?= the_content() ?></div>

                    <?php if (get_field('vertical_intro_image')) : ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 pt-lg-2 pt-2">
                                <div class="row justify-content-between align-items-center">
                                    <div class="mid-section col-lg-6">
                                        <img src="<?= get_field('vertical_intro_image')['url']; ?>" alt="">
                                    </div>
                                    <div class="col-lg-6 ps-lg-3 mt-lg-0 mt-2">
                                        <div class="sec-text mt-lg-1"><?= get_field('event_info'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('horizontal_intro_image')) : ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-10 pt-lg-2 pt-2">
                                <div class="row justify-content-between align-items-center">
                                    <div class="mid-section col-lg-12">
                                        <img src="<?= get_field('horizontal_intro_image')['url']; ?>" alt="">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sec-text mt-lg-2 mt-2"><?= get_field('event_info'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="sec-text mt-lg-3 mt-2">
                        <?= the_content(); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Dark Background section -->
    <?php if (get_field('dark_background_section')) : ?>

        <!-- Start posts loop -->
            <?php if (have_rows('dark_background_section')) : ?>
                    <?php while (have_rows('dark_background_section')) : the_row(); ?>
                        <section class="pad-x py-lg-5 py-3 bkg-ft-dark">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="row justify-content-between align-items-center">

                                        <div class="col-lg-5">
                                            <div class="testimonial-wrap lg bkg-std" style="background-image: url('<?= get_sub_field('image')['url']; ?>')">
                                            </div>
                                        </div>

                                        <div class="col-lg-7 px-lg-3 mt-lg-0 mt-3">
                                            <div class="sec-hdr wht md"><?= get_sub_field('heading'); ?></div>
                                            <div class="general-benefits">
                                                <div class="sec-text wht"><?= get_sub_field('details'); ?></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </section>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <!-- End posts loop -->

        

    <?php endif; ?>

    <!-- Membership Signup section -->
    <section id="membership-signup" class="pad-x py-lg-4 py-3">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="sec-hdr primary md text-center"><?= get_field('signup_form_heading'); ?></div>
                <div class="sec-text text-center"><?= get_field('signup_form_preamble'); ?></div>
            </div>
            <div class="col-lg-7">
                <?= get_field('form_id'); ?>
            </div>
        </div>
    </section>


    <!-- Other Workshops  Section -->
    <div class="section pad-x py-lg-4 py-3">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="sec-hdr md primary text-center mb-lg-2 mb-2">Other Events</div>
                    <div class="workshops-wrap justify-content-between align-items-start">
                    <?php
                        // Create query
                        $query_args = array(
                            'post_type' => 'workshops',
                            'posts_per_page' => 2,
                            'post__not_in' => array( $post->ID )
                        );

                        $query = new WP_Query($query_args); 

                    ?>
                        
                    <!-- Start posts loop -->
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post();?>
                                <!-- Load Featured News template -->
                                <?php get_template_part('template-parts', workshops_cards()) ?>
                            <?php endwhile; wp_reset_query(); ?>
                        <?php endif; ?>
                    <!-- End posts loop -->
                
                </div>
            </div>
        </div>
    </div>




    <?php
	    endwhile; // End of the loop.
	?>


</main>

<?php get_footer(); ?>