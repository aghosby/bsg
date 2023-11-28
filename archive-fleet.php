<?php

/**
 * The archive page template for Fleet
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<!-- Hero section -->
<section class="hero sub__pages">
    <div class="overlay"></div>
    <?php if (get_field('fleet_featured_video', 'option')) : ?>
        <video class="hero__video" autoplay muted loop>
            <source src="<?= get_field('fleet_featured_video', 'option')['url']; ?>" type="video/mp4">
        </video>
        <?php else : ?>
        <img class="hero__img" src="<?= get_field('fleet_featured_image', 'option')['url']; ?>" alt="">
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
                <?php if (get_field('fleet_featured_video', 'option')) : ?>
                    <a href="#" id="open-lightbox" data-video="<?= get_field('fleet_featured_video', 'option')['url']; ?>" class="btn btn_bold transparent video playVid">
                        Continue Watching <img class="norm" src="<?= get_stylesheet_directory_uri() . '/dist/img/play.svg' ?>" alt="" /> <img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/play-fill.svg' ?>" alt="" />
                    </a>
                    
                    <?php else : ?>
                    
                <?php endif; ?>

            </div>
            <h1 class="hero__title"><?= get_field('fleet_title', 'option'); ?></h1>
            <div class="hero__lead-text"><?= get_field('fleet_lead_text', 'option'); ?></div>
        </div>
    </div>
    
</section>

<main id="primary" class="site-main py-2 py-lg-3">

    <section class="fleet">
        <div class="container">

            <div class="row justify-content-center pb-lg-3 pb-2">
                <div class="col-lg-7">
                    <h2 class="sec-hdr med dark text-center"><?= get_field('fleet_page_caption', 'option'); ?></h2>
                    <div class="sec-text text-center"><?= get_field('fleet_page_lead_text', 'option'); ?></div>
                </div>
            </div>

            <form class="filter-form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-2">
                <ul class="filter-group">

                    <?php if ($terms = get_terms(array('taxonomy' => 'fleet-categories', 'orderby' => 'name'))) : ?>

                        <li class="filter-item">
                            <input name="categoryfilter" type="radio" value="all" id="filter-all" class="filter-radio" checked>
                            <label for="filter-all">
                                All Fleet
                            </label>
                        </li>

                        <?php foreach ($terms as $term) : ?>
                            <li class="filter-item">
                                <input name="categoryfilter" type="radio" value="<?= $term->term_id ?>" id="filter-<?= $term->term_id ?>" class="filter-radio">
                                <label for="filter-<?= $term->term_id ?>">
                                    <?= $term->name ?>
                                </label>
                            </li>
                        <?php endforeach; ?>

                    <?php endif; ?>

                </ul>
                <button type="submit" class="d-none" id="submitajax">Submit</button>
                <input type="hidden" name="action" value="fleet">
            </form>


            <!-- Fleet loop + Inject AJAX response -->
            <?php if (have_posts()) : ?>

                <div class="fleet-wrapper mt-3" id="response">

                    <?php while (have_posts()) : the_post(); ?>


                        <?php get_template_part('template-parts', fleet_card()); ?>

                    <?php endwhile; ?>

                </div>

            <?php else : ?>

                <div class="no-posts-found">There are currently no vessels to show.</div>

            <?php endif;
            wp_reset_postdata(); ?>
            <!-- end Fleet loop -->

            <!-- Custom Bootstrap pagination  -->
            <?= bootstrap_pagination(); ?>

        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>