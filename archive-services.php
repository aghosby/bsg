<?php

/**
 * The archive page template for Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<!-- Hero section -->
<section class="hero sub__pages">
    <div class="overlay"></div>
    <img class="hero__img" src="<?= get_field('services_featured_image', 'option')['url']; ?>" alt="">
    
    <div class="caption-cont pad-x">
        <!-- <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
           
        </div> -->
        <div class="caption__wrap">
            <h1 class="hero__title"><?= get_field('services_title', 'option'); ?></h1>
        </div>
    </div>
</section>

<!-- <section class="hero__support">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3">
                <div class="sec-hdr reg"><?= get_field('services_hero_bottom_section_title', 'option'); ?></div>
            </div>
            <div class="col-lg-9">
                <div class="sec-text"><?= get_field('services_hero_bottom_section_lead_text', 'option'); ?></div>
            </div>
        </div>
    </div>
</section> -->

<main id="primary" class="site-main">

    <div class="services-wrap pad-x mt-lg-2 mt-2 pb-lg-4">
        <?php
            // Create query
            $query_args = array(
                'post_type' => 'services',
                'posts_per_page' => 5,
                'order' => 'ASC'
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

</main>

<?php get_footer(); ?>