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
            <img class="hero__img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        <?php endif; ?>
        
        <div class="container">
            <!-- SEO breadcrumbs -->
            <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>
            <div class="caption__wrap">
                
                <div class="btn__hld">
                    <?php if (get_field('featured_video')) : ?>
                        <a href="#" class="btn video">
                            Continue Watching <img src="<?= get_stylesheet_directory_uri() . '/dist/img/play.svg' ?>" alt="" />
                        </a>
                        
                        <?php else : ?>
                        
                    <?php endif; ?>

                </div>
                <h1 class="hero__title"><?php echo get_the_title(); ?></h1>
                <div class="hero__lead-text"></div>
            </div>
        </div>
        
    </section>

    <!-- About Office section -->
    <section class="about">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 py-lg-5 py-3">
                    <h2 class="sec-hdr med dark mt-2 mt-lg-3">Our Office</h2>
                    <div class="sec-text"><?php echo get_the_content(); ?></div>

                </div>

                <div class="col-lg-5">
                    <div class="section-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                </div>
            </div>

            <div class="row justify-content-center mt-lg-2 pt-lg-5 pt-3">
                <div class="col-lg-7">
                    <h2 class="sec-hdr med dark text-center">Get in Touch</h2>
                </div>
                <div class="col-lg-12">
                    <div class="values-wrap">
                        <div class="values-hld">
                            <div class="details mob-center">
                                <img class="mb-1 mb-lg-2" src="http://mnl.local/wp-content/uploads/2023/03/yin-yang-3.svg">
                                <h5 class="sec-hdr sm dark">Address</h5>
                                <div class="sec-text"><?= get_field('address'); ?></div>
                            </div>
                        </div>

                        <div class="values-hld">
                            <div class="details mob-center">
                                <img class="mb-1 mb-lg-2" src="http://mnl.local/wp-content/uploads/2023/03/yin-yang-5.svg">
                                <h5 class="sec-hdr sm dark">Email</h5>
                                <div class="sec-text">
                                    <?php while (have_rows('emails')) : the_row(); ?>

                                        <a href="mailto:<?= get_sub_field('email'); ?>" class="d-block">
                                            <?= get_sub_field('email'); ?>
                                        </a>

                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>

                        <div class="values-hld">
                            <div class="details mob-center">
                                <img class="mb-1 mb-lg-2" src="http://mnl.local/wp-content/uploads/2023/03/yin-yang-6.svg">
                                <h5 class="sec-hdr sm dark">Call</h5>
                                <div class="sec-text">
                                    <?php while (have_rows('phone')) : the_row(); ?>

                                        <a href="tel:<?= get_sub_field('phone_number'); ?>" class="d-block">
                                            <?= get_sub_field('phone_number'); ?>
                                        </a>

                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Details Section -->
    <section class="py-lg-5 py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 mb-lg-4 mb-2">
                    <h2 class="sec-hdr med dark text-center">Directions</h2>
                    
                </div>
                <div class="col-lg-12">

                    <iframe class="map" src="<?= get_field('map_location') ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCINHyvamD8qS4UkEabVgTBYspQAXgYuvM"></script>
                    <script>
                        var myCenter = new google.maps.LatLng();
                        function initialize(){
                            var mapProp = {
                                center:myCenter,
                                zoom:19,
                                mapTypeId:google.maps.MapTypeId.ROADMAP
                            };

                        var map = new google.maps.Map(document.getElementById("map"),mapProp);

                        var marker = new google.maps.Marker({
                            position:myCenter,
                        });

                        marker.setMap(map);
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
                    </script> -->
                </div>
            </div>
        </div>
    </section>


    <section class="bkg-light py-3 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h2 class="sec-hdr med dark text-center">Enquiries</h2>
                    <div class="sec-text text-center mb-2 mb-lg-4">Connect with Multiplan Nigeria Ltd by completing the form below.</div>
                    <?= do_shortcode('[forminator_form id="589"]'); ?>
                </div>
            </div>
        </div>
    </section>


    <?php
	    endwhile; // End of the loop.
	?>


</main>

<?php get_footer(); ?>