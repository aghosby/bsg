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
                <?php if(get_the_post_thumbnail_url()) : ?>
                    <img class="hero__img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                <?php endif; ?>
        <?php endif; ?>
        
        <div class="caption-cont pad-x">
            <div class="caption__wrap">
                <h1 class="hero__title"><?= the_title() ?></h1>
            </div>
        </div>
        
    </section>

    <!-- Intro Section -->
    <section class="pad-x py-lg-4 py-3">
        <div class="single-page container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <?php if (get_field('intro_title')) : ?>
                        <div class="sec-hdr md primary"><?= get_field('intro_title'); ?></div>
                    <?php endif; ?>
                    <!-- <div class="share d-flex align-items-center pt-lg-1">
                        <h4 class="sec-hdr sm dark me-1 me-lg-1">Share this event</h4>
                    </div> -->
                    <div class="sec-text mt-lg-1 mt-1"><?= the_content(); ?></div>

                    <?php if (get_field('intro_vertical_image')) : ?>
                        <div class="row justify-content-center mb-lg-2">
                            <div class="col-lg-12 pt-lg-2 pt-2">
                                <div class="row justify-content-between align-items-center">
                                    <div class="mid-section col-lg-6">
                                        <img src="<?= get_field('intro_vertical_image')['url']; ?>" alt="">
                                    </div>
                                    <div class="col-lg-6 ps-lg-3">
                                        <div class="sec-text mt-lg-1 mt-1"><?= get_field('intro_vertical_support_text'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('intro_horizontal_image')) : ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 pt-lg-2 pt-2">
                                <div class="row justify-content-between align-items-center">
                                    <div class="mid-section col-lg-12">
                                        <img src="<?= get_field('intro_horizontal_image')['url']; ?>" alt="">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="sec-text mt-lg-2 mt-2"><?= get_field('intro_vertical_support_text'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('intro_conclusion_text')) : ?>
                        <div class="sec-text">
                            <?= get_field('intro_conclusion_text'); ?>
                        </div>
                     <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Sub Items Vertical Section -->
    <?php if (get_field('vertical_sub_items')) : ?>
        <section class="pad-x pb-lg-5 pb-3">
            <!-- Start posts loop -->
            <?php if (have_rows('vertical_sub_items')) : ?>
                <div class="col-template-4 <?= get_field('vertical_items_center') ?>">
                    <?php while (have_rows('vertical_sub_items')) : the_row(); ?>
                        <div class="col-hld">
                            <a href="<?= get_sub_field('link')['url']; ?>">
                                <div class="col-photo bkg-std" style="background-image: url('<?= get_sub_field('image')['url']; ?>')"></div>
                                <div class="overlay"></div>
                                <div class="col-details">
                                    <div class="col-title"><?= get_sub_field('title'); ?></div>
                                    <div class="col-strip">
                                        <span><img src="<?= get_sub_field('icon')['url']; ?>" alt=""></span>
                                        <span><?= get_sub_field('sub_title'); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 
            <!-- End posts loop -->
        </section>
    <?php endif; ?>

    <!-- Sub Items Horizontal Section -->
    <?php if (get_field('horizontal_sub_items')) : ?>
        <section class="pad-x pb-lg-5 pb-3">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Start posts loop -->
                    <?php if (have_rows('horizontal_sub_items')) : ?>
                        <div class="row-template">
                            <?php while (have_rows('horizontal_sub_items')) : the_row(); ?>
                                <div class="col-hld d-flex align-items-center">
                                    <div class="col-photo bkg-std" style="background-image: url('<?= get_sub_field('image')['url']; ?>')"></div>
                                    <div class="col-details">
                                        <div class="sec-hdr md primary"><?= get_sub_field('title'); ?></div>
                                        <div class="sec-text">
                                            <?= get_sub_field('sub_title'); ?></span>
                                        </div>
                                    </div>
                                    <a href="<?= get_sub_field('link')['url']; ?>" class="btn btn_bold primary_clr">
                                        <?= get_sub_field('link')['title']; ?> <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                    <!-- End posts loop -->
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- First Accordion Section -->
    <?php if (get_field('first_accordion_items')) : ?>
        <section class="pad-x pb-lg-4 pb-3">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <!-- Start posts loop -->
                    <?php if (have_rows('first_accordion_items')) : ?>
                        <div class="accordion__wrap bkg-sec-light px-lg-2 px-1 py-lg-2 py-2">
                            <div class="sec-hdr md primary text-center mb-lg-1"><?= get_field('first_accordion_header'); ?></div>
                            <?php while (have_rows('first_accordion_items')) : the_row(); ?>
                                <!-- Load Vacancies -->
                                <div class="accordion__hld fnb">
                                    <div class="intro">
                                        <div class="title"><?= get_sub_field('title'); ?></div>
                                        <div class="icon">
                                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="sec-text roles"><?= get_sub_field('content'); ?></div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- End posts loop -->
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Icon Listed Section -->
    <?php if (get_field('icon_list')) : ?>
        <section class="pad-x pb-lg-4 pb-3 bkg-ft-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <!-- Start posts loop -->
                    <?php if (have_rows('icon_list')) : ?>
                        <div class="icon-list-wrap bkg-sec-light px-lg-2 px-1 py-lg-2 py-2">
                            <div class="sec-hdr md primary text-center mb-lg-1"><?= get_field('icon_listed_heading'); ?></div>
                            <?php while (have_rows('icon_list')) : the_row(); ?>
                                <!-- Load Items -->
                                <div class="list-hld d-flex">
                                    <img src="<?= get_sub_field('icon')['url']; ?>" alt="">
                                    <div class="details">
                                        <div class="sec-hdr wht sm"><?= get_sub_field('title'); ?></div>
                                        <div class="sec-text roles"><?= get_sub_field('content'); ?></div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- End posts loop -->
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Dark Section With Image -->
    <?php if (get_field('dark_section_image')) : ?>
        <section class="pad-x py-lg-5 py-3 bkg-ft-dark">
            <div class="row justify-content-between align-items-center">
                <div class="mid-section col-lg-6">
                    <div class="mid-section-image lg bkg-std" style="background-image: url('<?= get_field('dark_section_image')['url']; ?>')">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-lg-6 px-lg-3">
                    <div class="sec-text wht mt-lg-1 mt-1"><?= get_field('dark_section_text'); ?></div>
                    <?php if (get_field('dark_section_link')['url']) : ?>
                        <div class="btn-hld mt-lg-2 mt-1">
                            <a href="<?= get_field('dark_section_link')['url']; ?>" class="btn btn_bold primary_clr">
                                <?= get_field('dark_section_link')['title']; ?> <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Mid Section Details -->
    <?php if (get_field('mid_section_details')) : ?>
        <section class="pad-x py-lg-5 py-3">
            <div class="single-page container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="sec-text"><?= get_field('mid_section_details') ?></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Mid Section With Image -->
    <?php if (get_field('mid_section_image')) : ?>
        <section class="pad-x pb-lg-5 pb-3">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row justify-content-between align-items-center">
                        <div class="mid-section col-lg-6">
                            <div class="mid-section-image lg bkg-std" style="background-image: url('<?= get_field('mid_section_image')['url']; ?>')">
                                <div class="overlay"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-3">
                            <div class="sec-text mt-lg-1 mt-1"><?= get_field('mid_section_content'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Dark Section Highlights -->
    <?php if (get_field('highlights_section_image')) : ?>
        <section class="pad-x py-lg-5 py-3 bkg-ft-dark">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-5">
                            <div class="testimonial-wrap lg bkg-std" style="background-image: url('<?= get_field('highlights_section_image')['url']; ?>')">
                            </div>
                        </div>
                        <div class="col-lg-7 px-lg-3 mt-lg-0 mt-2">
                            <div class="general-benefits">
                                <div class="sec-text wht"><?= get_field('highlights_section_content'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Dark Section Info -->
    <?php if (get_field('dark_info_image')) : ?>
        <section class="pad-x py-lg-5 py-3 bkg-ft-dark">
            <div class="row justify-content-between align-items-start">
                <div class="col-lg-6 pe-lg-4">
                    <div class="sec-hdr wht md"><?= get_field('dark_info_heading'); ?></div>
                    <div class="sec-text wht mt-lg-1 mt-1"><?= get_field('dark_info_preamble'); ?></div>
                    <?php if (have_rows('dark_info_accordion')) : ?>
                        <div class="accordion__wrap">
                            <?php while (have_rows('dark_info_accordion')) : the_row(); ?>
                                <div class="accordion__hld wht">
                                    <div class="intro">
                                        <div class="title"><?= get_sub_field('title'); ?></div>
                                        <div class="icon">
                                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="sec-text"><?= get_sub_field('content'); ?></div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 

                    <div class="info-wrap sm bkg-sec-light mt-lg-3 mt-2">
                        <div class="info-hdr">
                            <i class="fas fa-info-circle"></i>
                            <span><?= get_field('dark_info_strip') ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-lg-0 mt-3">
                    <div class="testimonial-wrap lg bkg-std" style="background-image: url('<?= get_field('dark_info_image')['url']; ?>')"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Final Section Details -->
    <?php if (get_field('final_section_content')) : ?>
        <section class="pad-x pt-lg-4 pt-3">
            <div class="single-page container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="sec-text"><?= get_field('final_section_content') ?></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Final Accordion Section -->
    <?php if (get_field('final_accordion_items')) : ?>
        <section class="pad-x pb-lg-4 pb-3">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <!-- Start posts loop -->
                    <?php if (have_rows('final_accordion_items')) : ?>
                        <div class="accordion__wrap bkg-sec-light px-lg-2 px-1 py-lg-2 py-2">
                            <div class="sec-hdr md primary text-center mb-lg-1"><?= get_field('final_accordion_header'); ?></div>
                            <?php while (have_rows('final_accordion_items')) : the_row(); ?>
                                <!-- Load Vacancies -->
                                <div class="accordion__hld fnb">
                                    <div class="intro">
                                        <div class="title"><?= get_sub_field('title'); ?></div>
                                        <div class="icon">
                                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="sec-text roles"><?= get_sub_field('content'); ?></div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- End posts loop -->
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Form section -->
    <?php if (get_field('form_id')) : ?>
        <section id="membership-signup" class="pad-x py-lg-4 py-3">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sec-hdr md text-center primary"><?= get_field('form_heading')?></div>
                    <?= get_field('form_id'); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="justify-content-center pad-x mt-lg-2 mt-2 pb-lg-4">
        <div class="sec-hdr md primary text-center">Other Services</div>
        <div class="services-wrap">
            <?php
                // Create query
                $query_args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 3,
                    'order' => 'ASC',
                    'post__not_in' => array( $post->ID )
                );

                $query = new WP_Query($query_args); 

                //var_dump($query);
            ?>
            <!-- Start posts loop -->
            <?php if ($query->have_posts()) : ?>
                <div class="services-archive">
                    <?php while ($query->have_posts()) : $query->the_post();?>
                        <div class="col-hld">
                            <a href="<?php echo the_permalink(); ?>">
                                <div class="card-top">
                                    <div class="col-photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                                    <div class="title"><?= the_title(); ?></div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="card-btm">
                                    <div class="details"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
                                    <div class="arrow d-flex justify-content-between align-items-center">
                                        <span>Learn More</span>
                                        <span><i class="fas fa-arrow-right"></i></span>
                                    </div>
                                </div>                                
                            </a>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            <?php endif; ?>
            <!-- End posts loop -->
        </div>
    </section>


    <?php
	    endwhile; // End of the loop.
	?>


</main>

<?php get_footer(); ?>