<?php

/**
 * The single post template for Fleet
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Hero section -->
    <section class="hero sub__pages single">
        <div class="overlay"></div>
        <?php if (get_field('video')) : ?>
            <video class="hero__video" autoplay muted loop>
                <source src="<?= get_field('video')['url']; ?>" type="video/mp4">
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
                    <?php if (get_field('video')) : ?>
                        <a href="#" id="open-lightbox" data-video="<?= get_field('video')['url']; ?>" class="btn btn_bold transparent video playVid">
                            Continue Watching <img class="norm" src="<?= get_stylesheet_directory_uri() . '/dist/img/play.svg' ?>" alt="" /> <img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/play-fill.svg' ?>" alt="" />
                        </a>
                        
                        <?php else : ?>
                        
                    <?php endif; ?>

                </div>
                <h1 class="hero__title"><?php echo get_the_title(); ?></h1>
                <div class="hero__lead-text"><?php echo get_the_excerpt(); ?></div>
            </div>
        </div>
        
    </section>

    <section class="vessel">
        <div class="row justify-content-center pt-3">
            <div class="col-lg-7">
                <h2 class="sec-hdr med dark text-center">Specifications</h2>
            </div>
        </div>

        <div class="container">

            <div class="row justify-content-center py-lg-3 py-3">
                <div class="col-lg-7">
                    <?php if (have_rows('specifications')) : ?>

                        <div class="accordion vessel-specs" id="VesselSpecs">

                            <?php while (have_rows('specifications')) : the_row(); ?>

                                <?php // Create unique IDs
                                $id = sanitize_title(get_sub_field('heading')) . uniqid(); ?>

                                <div class="accordion-item">
                                    <h3 class="accordion-header" id="<?php echo $id; ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $id; ?>">
                                            <?php echo get_sub_field('heading'); ?>
                                            <span class="add">+</span>
                                            <span class="remove">-</span>
                                        </button>
                                    </h3>
                                    <div id="collapse<?php echo $id; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $id; ?>" data-bs-parent="#VesselSpecs">
                                        <div class="accordion-body">

                                            <?php if (have_rows('fields')) : ?>

                                                <?php while (have_rows('fields')) : the_row(); ?>

                                                    <div class="accordion-body-row">

                                                        <span class="name">
                                                            <?php echo get_sub_field('name'); ?>
                                                        </span>

                                                        <div class="gap"></div>

                                                        <span class="value">
                                                            <?php echo get_sub_field('value'); ?>
                                                        </span>

                                                    </div>

                                                <?php endwhile; ?>

                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="gallery-wrap">
                    <div class="gallery-carousel">
                        <?php 
                            $images = get_field('photos');                                    
                            if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                    <div class="image-hld" style="background-image: url('<?php echo $image['url']; ?>');"></div>
                                <?php endforeach; ?>
                            <?php
                            
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <?php
        $page_video = get_field('video')['url'];
        if( $page_video ): ?>
            <section class="video__wrap">
                <div class="overlay"></div>
                <video onclick="this.play()" class="video__hld" muted loop>
                    <source src="<?= get_field('video')['url']; ?>" type="video/mp4">
                </video>
                <img src="<?= get_stylesheet_directory_uri() . '/dist/img/video-play.svg' ?>" alt="" />
            </section>
        <?php
        
        endif;
    ?>
    

    <section class="bkg-dark py-lg-3 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <h2 class="sec-hdr reg lg wht">Need to find out more about this vessel?</h2>
                </div>
                <div class="col-lg-2">
                    <a href="/contact" class="btn btn_bold primary_clr mt-lg-0 mt-1">
                        Contact Us <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Vessels Section -->
    <section class="py-lg-5 py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h2 class="sec-hdr med dark text-center">Other Vessels</h2>
                </div>


                <div class="fleet col-lg-12">
                    <?php
                        // Create query
                        $query_args = array(
                            'post_type' => 'fleet',
                            'posts_per_page' => 4,
                            'order' => 'ASC',
                            'post__not_in' => array( $post->ID )
                            // 'meta_key'      => 'upcoming',
                            // 'meta_value'    => 'Yes'
                        );
                        $query = new WP_Query($query_args); 
                    ?>

                    <!-- Start posts loop -->
                        <?php if ($query->have_posts()) : ?>
                            <div class="fleet-wrapper">
                                <?php while ($query->have_posts()) : $query->the_post();?>
                                    <?php $image = wp_get_attachment_url(get_post_thumbnail_id()); ?>

                                    <div class="fleet-cards normal-state <?= $featured_class; ?>" style="background: linear-gradient(180deg, #24000280 0%, #26010380 19%, #0D000180 100%) 0% 0%, url('<?= $image; ?>') no-repeat center center; background-size: cover;" data-link="<?= $link; ?>">
                                        <a href="<?= $link; ?>" class="fleet-cards-link">
                                            <video onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;">
                                                <source src="<?= get_field('video')['url']; ?>" type="video/mp4"></source>
                                            </video>
                                            <div class="details">
                                                <div class="title"><?= the_title(); ?></div>
                                                <div class="info">
                                                    <div class="det">Year - <span><?= get_field('year'); ?></span></div>
                                                    <div class="det">Overall Length - <span><?= get_field('length'); ?></span>M</div>
                                                    <div class="det">Tonnage - <span><?= get_field('grt'); ?></span>GRT</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php endwhile; wp_reset_query(); ?>
                            </div>
                        <?php endif; ?>
                    <!-- End posts loop -->
                </div>
            </div>

            <div class="row justify-content-center align-items-center mt-2 mt-lg-4">
                <a href="/fleet" class="btn btn_bold auto primary_clr">
                    Explore Service Vessels <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                </a>
            </div>
        </div>
    </section>

    <?php
	    endwhile; // End of the loop.
	?>

</main>

<?php get_footer(); ?>