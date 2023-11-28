<?php

/**
 * The archive page template for Resources
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">

    <section class="resources">
        <div class="container">

            <form class="filter-form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-2">
                <ul class="filter-group">

                    <?php if ($terms = get_terms(array('taxonomy' => 'category', 'orderby' => 'name'))) : ?>

                        <li class="filter-item">
                            <input name="categoryfilter" type="radio" value="all" id="filter-all" class="filter-radio" checked>
                            <label for="filter-all">
                                All Resources
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
                <input type="hidden" name="action" value="post">
            </form>


            <!-- Resources loop + Inject AJAX response -->
            <?php if (have_posts()) : ?>

                <div class="resources-wrapper" id="response">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts', article_card()); ?>

                    <?php endwhile; ?>

                </div>

            <?php else : ?>

                <div class="no-posts-found">There are currently no articles to show.</div>

            <?php endif;
            wp_reset_postdata(); ?>
            <!-- end Resources loop -->

            <!-- Custom Bootstrap pagination  -->
            <?= bootstrap_pagination(); ?>

        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>