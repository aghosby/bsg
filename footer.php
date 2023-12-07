<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SBX_Starter_Theme
 */

?>

<footer id="colophon" class="footer site-footer bg-light">

    <section class="footer pad-x pt-lg-3 pt-0">
        <div class="footer-cont py-lg-2 py-2">

            <div class="row justify-content-between">

                <div class="col-lg-3 mt-lg-0 mt-2">

                    <div class="footer-brand">
                        <div class="footer-brand-top">
                            <a href="<?php echo home_url(); ?>">

                                <?php $footer_logo = get_theme_mod('my_custom_footer_logo'); ?>

                                <?php
                                    $custom_logo_id = get_theme_mod('custom_logo');
                                    $logo = wp_get_attachment_image_src($custom_logo_id); 
                                ?>

                                <?php if ($logo) :  ?>

                                    <div class="brand-image" style="background-image: url('<?= esc_url($logo[0]); ?>');"></div>

                                <?php else : ?>

                                    <span><?= get_bloginfo('name'); ?></span>

                                <?php endif; ?>

                            </a>

                        </div>
                    </div>

                    <!-- phone -->
                    <?php if (have_rows('phones', 'option')) : ?>
                        <div class="footer__contact phone">
                            <span><i class="fas fa-phone"></i></span>
                            <div class="footer__contact-list">
                                <?php while (have_rows('phones', 'option')) : the_row(); ?>

                                    <a href="tel:<?= get_sub_field('phone', 'option'); ?>" class="d-block">
                                        <?= get_sub_field('phone', 'option'); ?>
                                    </a>

                                <?php endwhile; ?>
                            </div>

                        </div>
                    <?php endif; ?>

                    <!-- email -->
                    <?php if (have_rows('emails', 'option')) : ?>
                        <div class="footer__contact mail">
                            <span><i class="fas fa-envelope"></i></span>

                            <div class="footer__contact-list">
                                <?php while (have_rows('emails', 'option')) : the_row(); ?>

                                    <a href="mailto:<?= get_sub_field('email', 'option'); ?>" class="d-block">
                                        <?= get_sub_field('email', 'option'); ?>
                                    </a>

                                <?php endwhile; ?>
                            </div>

                        </div>
                    <?php endif; ?>

                    <!-- address -->
                    <div class="footer__contact">
                        <span><i class="fas fa-location-dot"></i></span>
                        <div class="footer__contact-list">
                            <p class="footer-address">
                                <?= get_field('address_line_1', 'option', false) ?> <br>
                                <?= get_field('address_line_2', 'option', false) ?> <br>
                            </p>
                        </div>

                    </div>
                    
                </div>

                <!-- Footer links -->
                <div class="col-lg-3 pe-lg-3 footer-links">
                    <h3>Explore</h3>

                    <!-- footer-main -->
                    <div class="footer-links-group">

                        <?php
                        wp_nav_menu(array(
                            'menu'              => 'footer-main',
                            'menu_class'        => 'footer-menu',
                            'container'         => ''
                        ));
                        ?>

                    </div>

                </div>

                <div class="col-lg-3 pe-lg-3">
                    <h3>Quicklinks</h3>
                    <!-- footer-misc -->
                    <div class="footer-links-group">

                        <?php
                        wp_nav_menu(array(
                            'menu'              => 'footer-misc',
                            'menu_class'        => 'footer-menu',
                            'container'         => ''
                        ));
                        ?>

                    </div>
                </div>

                <div class="col-lg-3 mt-lg-0 mt-3">
                    <div class="newsletter-hdr d-flex justify-content-between">
                        <h3>Newsletter</h3>
                        <img src="<?= get_field('newsletter_image', 'option') ?>" alt="" />
                    </div>
                    <form class="cta-form validate" action="<?= get_field('cta_section_form_url', 'option') ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                        <div class="cta-form-field">
                            <input type="email" value="" name="EMAIL" class="form-control email" id="mce-EMAIL" placeholder="Enter your email" required>
                        </div>
                        <div class="cta-form-button">
                            <button type="submit" class="newsletter-cta" name="subscribe" id="mce-EMAIL"><i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>

                    <div class="social-wrap mt-lg-2 mt-2">
                        <h3>Follow Us</h3>
                        <!-- Social icons -->
                        <?php get_template_part('template-parts/section', 'social-links'); ?>
                    </div>
                </div>
            </div>

            <div class="footer-bottom row justify-content-between">
                <div class="col-lg-6">
                    <div class="footer-legal">
                        <!-- Copyright text -->
                        <span class="copyright-text">© <?= get_field('company_name_full', 'option') ?> <?= date('Y'); ?>. All rights reserved.</span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="footer-policy d-flex flex-column justify-content-lg-end align-items-lg-end">
                        <!-- footer-contact -->
                        <div class="footer-links-group">

                            <?php
                            wp_nav_menu(array(
                                'menu'              => 'footer-policies',
                                'menu_class'        => 'footer-menu',
                                'container'         => ''
                            ));
                            ?>

                        </div>
                        <!-- Scroll to top icon -->
                        <!-- <div id="scroll-to-top">
                            <i class="fa-solid fa-chevron-up"></i>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>