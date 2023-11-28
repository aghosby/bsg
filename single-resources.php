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
            <img class="hero__img" src="<?= get_field('resources_featured_image', 'option')['url']; ?>" alt="">
        <?php endif; ?>
        
        <div class="caption-cont pad-x">
            <!-- <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            
            </div> -->
            <div class="caption__wrap">
                <h1 class="hero__title">News</h1>
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
                        <h4 class="sec-hdr sm dark me-1 me-lg-1">Share this</h4>
                        <?= get_template_part('template-parts/section', 'share'); ?>
                    </div>
                    <div class="sec-text mt-lg-3 mt-2">
                        <img class="content-img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                        <?= get_field('content'); ?>
                    </div>
                </div>

                <div class="col-lg-12 mt-lg-5 mt-3">
                    <div class="sec-hdr md primary text-center mb-lg-2 mb-2">Other News</div>
                    <div class="home news-wrap md row justify-content-center align-items-start">

                    <?php
                        // Create query
                        $query_args = array(
                            'post_type' => 'resources',
                            'posts_per_page' => 3,
                            'post__not_in' => array( $post->ID )
                        );

                        $query = new WP_Query($query_args); 

                    ?>
                        
                    <!-- Start posts loop -->
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post();?>
                                <!-- Load Featured News template -->
                                <?php get_template_part('template-parts', news_cards()) ?>
                            <?php endwhile; wp_reset_query(); ?>
                        <?php endif; ?>
                    <!-- End posts loop -->
                
                </div>
                </div>
            </div>
        </div>
    </section>




    <?php
	    endwhile; // End of the loop.
	?>


</main>

<?php get_footer(); ?>