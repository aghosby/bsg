<?php

/**
 * The single page template for Resources
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">

    <section class="resources">
        <div class="container">

            <h1 class="h1"><?php echo get_the_title(); ?></h1>

            <div class="wysiwyg">
                <?php echo get_the_content(); ?>
            </div>

        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>