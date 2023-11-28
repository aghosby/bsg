<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SBX_Starter_Theme
 */


// Get the 404 page background image
$bg_image = '';

if (get_field('404_page_image', 'options'))
{
    //$bg_image = get_field('404_page_image', 'options')['url'];
}
?>


<?php get_header() ?>

<main id="primary" class="">

    <!-- Hero section -->
    <section class="hero sub__pages">
        <div class="overlay"></div>
        <img class="hero__img" src="<?= get_field('404_page_image', 'options')['url']?>" alt="">
        <div class="container">
            
            <div class="caption__wrap">
                
                
                <h1 class="hero__title">We can’t find the page...</h1>
                <div class="hero__lead-text">Sorry, the page you are looking for was either not found or does not exist. Try refreshing the page, or making sure the correct url was used. If you have found an issue we should be aware of, we’d be grateful if you could report it to us by emailing <a href="mailto:<?= get_field('emails', 'option')[0]['email']; ?>">
                <?= get_field('emails', 'option')[0]['email']; ?>
            </a></div>
                <div class="btn__hld">
                    <a href="<?= site_url('home'); ?>" class="btn btn_bold primary_clr">
                        Back to homepage <img class="norm" src="<?= get_stylesheet_directory_uri() . '/dist/img/white-arrow.svg' ?>" alt="" /> <img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                    </a>

                </div>
            </div>
        </div>
        
    </section>

</main>

<?php get_footer() ?>