<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SBX_Starter_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site" data-scroll-container>

        <?php get_template_part('template-parts/section', 'notice'); ?>

        <header id="masthead" class="site-header" data-scroll-section>

            <!-- Header content here -->
            <nav class="navbar navbar-expand-md navbar-dark" role="navigation">
                <div class="hdr">
                    <!-- Header logo -->
                    <div class="brand">
                        <a href="<?php echo home_url(); ?>">
                            <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id); 
                            ?>
                            <?php 
                                $footer_logo = get_theme_mod('my_custom_footer_logo'); 
                            ?>
                            <img class="brand-image wht" src="<?= esc_url($logo[0]); ?>" alt="<?= get_bloginfo( 'name' ) ?>"/>
                            <img class="brand-image clr" src="<?= esc_url($footer_logo); ?>" alt="<?= get_bloginfo( 'name' ) ?>"/>
                        </a>
                    </div>

                    <nav class="navbar">
                        <?php
                            wp_nav_menu(array(
                                'menu'         => 'navbar-top',
                                'depth'             => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container'         => 'div',
                                // 'container_class'   => 'collapse navbar-collapse',
                                'container_id'      => 'navbarNav',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ));
                        ?>
                    </nav>

                    <div class="hdr-actions">
                        <div class="action">
                            <a href="" class="d-flex">
                                <div class="icon">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                        width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                        preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        stroke="none">
                                        <path d="M2861 5104 c-13 -9 -29 -32 -37 -50 -12 -29 -12 -39 0 -68 21 -50 50
                                        -66 122 -66 34 0 108 -5 165 -10 950 -97 1702 -849 1799 -1799 5 -57 10 -131
                                        10 -165 0 -72 16 -101 66 -122 29 -12 39 -12 68 0 69 29 78 76 56 297 -67 679
                                        -433 1277 -1012 1653 -121 79 -350 188 -495 235 -269 88 -677 140 -742 95z"/>
                                        <path d="M2863 4501 c-55 -34 -63 -110 -15 -152 26 -23 40 -27 138 -33 727
                                        -46 1284 -603 1330 -1330 6 -99 10 -112 33 -139 47 -52 133 -34 161 33 27 66
                                        -12 347 -76 545 -147 452 -530 842 -980 998 -127 44 -253 73 -376 86 -138 15
                                        -178 14 -215 -8z"/>
                                        <path d="M664 4382 c-28 -10 -69 -32 -91 -50 -86 -68 -314 -315 -372 -403
                                        -201 -304 -253 -668 -145 -1011 49 -155 249 -525 442 -818 220 -334 436 -596
                                        741 -901 300 -299 523 -483 846 -699 235 -156 544 -333 701 -399 308 -131 638
                                        -131 947 -1 94 40 187 97 282 173 110 89 327 313 350 362 27 57 31 160 10 227
                                        -16 49 -47 83 -454 491 -487 489 -490 491 -610 491 -112 0 -140 -19 -366 -243
                                        -110 -109 -216 -207 -235 -217 -22 -11 -56 -18 -92 -18 -54 1 -64 5 -160 69
                                        -57 37 -150 104 -208 149 -94 72 -110 81 -148 81 -36 0 -48 -5 -68 -28 -28
                                        -33 -32 -91 -9 -123 29 -42 333 -262 431 -312 62 -32 160 -46 229 -33 119 22
                                        153 46 374 266 125 123 216 206 232 210 17 4 38 1 55 -8 16 -9 212 -199 437
                                        -424 401 -403 407 -409 407 -449 0 -39 -6 -46 -163 -200 -170 -168 -230 -213
                                        -354 -271 -135 -62 -248 -86 -408 -86 -220 -1 -325 31 -595 176 -735 397
                                        -1310 889 -1807 1547 -250 331 -542 825 -612 1035 -72 218 -65 460 22 675 58
                                        142 106 209 276 383 91 92 175 170 188 173 13 4 36 1 51 -5 16 -7 214 -198
                                        440 -425 401 -401 412 -413 412 -451 0 -37 -9 -48 -204 -244 -180 -181 -209
                                        -215 -237 -275 -25 -54 -34 -87 -37 -146 -7 -115 13 -167 120 -326 122 -182
                                        144 -204 197 -204 34 0 49 6 72 29 50 50 42 78 -62 226 -107 151 -128 194
                                        -129 253 0 77 22 107 239 326 229 232 241 251 241 366 0 113 -13 129 -487 601
                                        -294 294 -442 434 -473 449 -61 31 -150 36 -216 12z"/>
                                        <path d="M2873 3906 c-63 -28 -76 -111 -25 -157 24 -22 42 -27 112 -33 284
                                        -25 508 -164 649 -403 55 -94 89 -203 103 -330 10 -92 15 -111 38 -136 20 -22
                                        34 -29 63 -29 87 0 114 53 98 195 -39 350 -243 643 -556 799 -160 80 -406 128
                                        -482 94z"/>
                                        <path d="M2853 3295 c-25 -17 -42 -67 -35 -102 8 -40 49 -71 105 -78 108 -14
                                        178 -84 192 -192 11 -82 60 -120 132 -101 46 12 66 47 64 111 -3 145 -90 276
                                        -229 344 -69 34 -194 44 -229 18z"/>
                                        <path d="M1709 1942 c-54 -48 -39 -130 28 -158 27 -12 42 -13 69 -4 70 23 88
                                        108 35 161 -40 39 -89 40 -132 1z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="details">
                                    <div class="minor">Call us on</div>
                                    <div class="major">7900 553 369</div>
                                </div>
                            </a>
                        </div>
                        <div class="action">
                            <div class="btn primary semi-bold">
                                <a href="<?php echo home_url(); ?>/contact">Contact Us</a>
                            </div>
                        </div>
                    </div>


                    <div class="hdr-actions menu-icon only-mobile">
                        <div class="text">Menu</div>
                        <div class="menu-burger">
                            <div class="burger"></div>
                        </div>
                    </div>
                </div>
            </nav>


            <div class="mega-menu pad-x">
                <div class="menu-wrap d-flex justify-content-center">
                    <div class="col-lg-12">
                        <nav>
                            <?php
                                wp_nav_menu(array(
                                    'menu'         => 'navbar-top',
                                    'depth'             => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                    'container'         => 'div',
                                    // 'container_class'   => 'collapse navbar-collapse',
                                    'container_id'      => 'mega-navbarNav',
                                    'menu_class'        => 'mega-nav',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker(),
                                ));
                            ?>
                        </nav>
                    </div>

                </div>
                
            </div>
            

        </header>