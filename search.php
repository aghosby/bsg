<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package SBX_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero section -->
    <section class="hero sub__pages rd">
        <div class="overlay"></div>
        
        <div class="container">
            <div class="caption__wrap">
                <h1 class="hero__title h1 search-found"><?php
            /* translators: %s: search query. */
            printf(esc_html__('Search Results for: %s', 'sbx-starter-theme'), '<span>' . get_search_query() . '</span>');
            ?></h1>
            </div>
        </div>
        
    </section>

    <div class="container">

        <?php if (have_posts()) : ?>

            

            <!-- <header class="page-header">
                <h1 class="page-title h1 search-found">
                    
                </h1>
            </header> -->

            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();

                // Get the post featured image
                $image_class = '';
                $image_url = '';
                if (wp_get_attachment_url(get_post_thumbnail_id()))
                {
                    $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                    $image_class = 'search-cards-image';
                }
            ?>

                <div class="search-cards">
                    <div class="<?= $image_class; ?>" style="background: url('<?= $image_url; ?>') no-repeat center center; background-size: cover;" data-link="<?= get_the_permalink(); ?>"></div>

                    <div class="search-cards-content">
                        <h2 class="search-cards-title">
                            <a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
                        </h2>

                        <p class="search-cards-description">
                            <?= get_the_excerpt(); ?>
                            <a href="<?= get_the_permalink(); ?>" class="search-cards-link">Read more →</a>
                        </p>
                    </div>
                </div>

            <?php endwhile; ?>

            <!-- Custom Bootstrap pagination  -->
            <?= bootstrap_pagination($wp_query); ?>

        <?php else : ?>

            <header class="page-header">
                <h1 class="page-title h1">
                    <?php
                    /* translators: %s: search query. */
                    printf(esc_html__('Search Results for: %s', 'sbx-starter-theme'), '<span>' . get_search_query() . '</span>');
                    ?>
                </h1>

                <p>
                    <?php
                    /* translators: %s: search query. */
                    printf(esc_html__('We couldn\'t find a match for: %s. Please try again with some different keywords.', 'sbx-starter-theme'), '<span>' . get_search_query() . '</span>');
                    ?>
                </p>
            </header><!-- .page-header -->

        <?php endif; ?>

    </div>
</main><!-- #main -->

<?php
get_footer();
