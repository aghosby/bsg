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


                    <!-- <div class="hdr-actions menu-icon">
                        <div class="text">Menu</div>
                        <div class="menu-burger">
                            <div class="burger"></div>
                        </div>
                    </div> -->
                </div>
            </nav>


            <div class="mega-menu pad-x">
                <div class="menu-wrap d-flex py-lg-2 py-4">
                    <div class="col-4 col-lg-3">
                        <nav>
                            <?php
                                wp_nav_menu(array(
                                    'menu'         => 'mega-menu',
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

                    <div class="col-6 col-lg-5">
                        <nav>
                            <?php
                                wp_nav_menu(array(
                                    'menu'         => 'mega-menu-services',
                                    'depth'             => 4, // 1 = no dropdowns, 2 = with dropdowns.
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
                    <div class="col-4 menu-contact">
                        <div class="menu-hdr">Let's Talk</div>
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

                        <div class="menu-hdr mt-lg-1">Follow Us</div>
                        <?php get_template_part('template-parts/section', 'social-links'); ?>

                        <div class="hdr-actions mt-lg-3">
                            <a href="<?= get_field('book_appointment_link', 'option')?>" target="_blank">
                                <div class="action secondary">
                                    <div class="icon">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                            width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                            preserveAspectRatio="xMidYMid meet">

                                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                            stroke="none">
                                            <path d="M1079 5093 c-90 -46 -128 -120 -129 -250 l0 -61 -197 -4 c-173 -3
                                            -205 -7 -251 -25 -104 -42 -190 -129 -224 -226 -16 -49 -17 -162 -18 -2133 0
                                            -2297 -5 -2131 63 -2231 45 -65 119 -119 196 -143 62 -20 97 -20 2041 -20
                                            1944 0 1979 0 2041 20 77 24 151 78 196 143 68 100 63 -66 63 2227 0 2313 6
                                            2130 -70 2232 -43 57 -128 120 -188 139 -21 7 -123 14 -234 16 l-198 5 0 61
                                            c0 34 -5 80 -10 101 -39 168 -271 236 -402 118 -59 -53 -78 -100 -78 -199 l0
                                            -83 -1120 0 -1120 0 0 83 c0 99 -19 146 -78 199 -73 66 -189 78 -283 31z m185
                                            -144 c24 -19 26 -26 26 -95 l0 -74 -95 0 -95 0 0 60 c0 61 18 114 42 123 33
                                            13 96 6 122 -14z m2717 8 c28 -21 39 -54 39 -116 l0 -61 -95 0 -95 0 0 74 c0
                                            69 2 76 26 95 30 24 99 28 125 8z m-3029 -469 c3 -124 6 -149 25 -185 39 -72
                                            120 -123 197 -123 39 0 62 15 74 49 18 51 -11 84 -93 108 -45 13 -55 43 -55
                                            176 l0 117 1290 0 1290 0 0 -137 c0 -112 4 -145 19 -178 51 -111 194 -172 256
                                            -110 14 13 25 36 25 50 0 33 -41 75 -73 75 -13 0 -36 9 -51 21 -26 20 -26 22
                                            -26 150 l0 129 336 0 c211 0 351 -4 379 -11 55 -14 122 -70 146 -123 17 -37
                                            19 -73 19 -413 l0 -373 -1611 -2 -1611 -3 -24 -28 c-29 -34 -30 -56 -3 -91
                                            l20 -26 1615 0 1614 0 0 -995 c0 -1084 3 -1021 -57 -1076 -49 -45 -77 -49
                                            -384 -49 -270 0 -292 -1 -346 -21 -68 -26 -138 -92 -173 -164 -24 -49 -25 -56
                                            -30 -370 -3 -224 -9 -326 -17 -341 -21 -36 -81 -83 -115 -89 -18 -3 -706 -4
                                            -1528 -3 l-1495 3 -48 28 c-33 19 -56 44 -77 80 l-30 52 0 1473 0 1472 420 0
                                            c407 0 421 1 440 20 25 25 26 71 1 101 l-19 24 -421 3 -421 3 0 372 c0 340 2
                                            376 19 413 23 50 90 109 139 122 21 6 114 10 209 11 l171 1 4 -142z m3658
                                            -3191 c0 -1 -168 -170 -372 -375 l-373 -372 5 313 c7 447 -19 420 410 427 162
                                            3 303 7 313 8 9 1 17 1 17 -1z m72 -1031 c-20 -34 -45 -61 -77 -81 l-48 -30
                                            -1987 -3 -1987 -2 -54 28 c-42 21 -61 40 -86 82 -18 30 -33 67 -33 83 l0 29
                                            33 -20 c88 -55 9 -53 1733 -50 l1589 3 65 32 c57 28 115 82 470 438 l405 405
                                            3 -431 2 -432 -28 -51z"/>
                                            <path d="M825 3251 c-48 -12 -75 -30 -95 -64 -18 -29 -20 -52 -20 -257 0 -248
                                            3 -259 66 -301 26 -17 50 -19 254 -19 208 0 227 2 258 20 62 38 72 79 72 300
                                            0 183 -1 199 -22 240 -40 78 -62 85 -288 87 -107 1 -208 -2 -225 -6z m383
                                            -318 l2 -173 -175 0 -175 0 0 175 0 175 173 -2 172 -3 3 -172z"/>
                                            <path d="M1845 3251 c-48 -12 -75 -30 -95 -64 -18 -29 -20 -52 -20 -255 0
                                            -247 4 -266 63 -302 29 -18 51 -20 257 -20 330 0 325 -5 325 320 0 198 -2 218
                                            -20 250 -40 68 -66 75 -285 77 -107 1 -208 -2 -225 -6z m383 -318 l2 -173
                                            -175 0 -175 0 0 175 0 175 173 -2 172 -3 3 -172z"/>
                                            <path d="M2863 3251 c-47 -12 -80 -36 -100 -74 -16 -28 -18 -60 -18 -247 0
                                            -325 -5 -320 325 -320 330 0 320 -9 320 322 0 324 2 322 -300 325 -107 1 -210
                                            -2 -227 -6z m377 -316 l0 -175 -175 0 -175 0 0 168 c0 93 3 172 7 175 3 4 82
                                            7 175 7 l168 0 0 -175z"/>
                                            <path d="M3883 3251 c-47 -12 -80 -36 -100 -74 -16 -28 -18 -60 -18 -247 0
                                            -325 -5 -320 325 -320 204 0 228 2 254 19 63 42 66 53 66 301 0 327 3 324
                                            -300 327 -107 1 -210 -2 -227 -6z m377 -316 l0 -175 -175 0 -175 0 0 168 c0
                                            93 3 172 7 175 3 4 82 7 175 7 l168 0 0 -175z"/>
                                            <path d="M815 2323 c-33 -9 -74 -43 -91 -74 -12 -25 -15 -68 -12 -259 3 -228
                                            3 -228 28 -255 49 -52 63 -55 292 -55 240 0 264 6 303 71 18 31 20 52 20 256
                                            0 208 -1 223 -21 249 -50 68 -55 69 -287 71 -117 0 -221 -1 -232 -4z m393
                                            -320 l2 -173 -175 0 -175 0 0 175 0 175 173 -2 172 -3 3 -172z"/>
                                            <path d="M1826 2320 c-15 -5 -37 -17 -48 -27 -45 -40 -48 -61 -48 -293 0 -241
                                            2 -253 58 -295 25 -18 45 -20 249 -23 252 -3 275 1 315 67 22 34 23 45 23 251
                                            0 197 -2 218 -20 249 -11 19 -33 43 -48 55 -27 20 -42 21 -240 23 -117 1 -225
                                            -2 -241 -7z m402 -317 l2 -173 -175 0 -175 0 0 175 0 175 173 -2 172 -3 3
                                            -172z"/>
                                            <path d="M2834 2316 c-40 -18 -71 -58 -85 -109 -7 -25 -9 -114 -7 -231 3 -178
                                            5 -194 26 -227 39 -64 63 -69 302 -69 237 0 263 6 300 65 18 30 20 49 20 256
                                            0 204 -2 227 -20 256 -39 65 -51 68 -290 70 -165 2 -222 0 -246 -11z m406
                                            -311 l0 -175 -175 0 -175 0 0 168 c0 93 3 172 7 175 3 4 82 7 175 7 l168 0 0
                                            -175z"/>
                                            <path d="M3883 2301 c-47 -12 -80 -36 -100 -74 -16 -28 -18 -60 -18 -247 0
                                            -325 -5 -320 325 -320 204 0 228 2 254 19 63 42 66 53 66 301 0 327 3 324
                                            -300 327 -107 1 -210 -2 -227 -6z m377 -316 l0 -175 -175 0 -175 0 0 168 c0
                                            93 3 172 7 175 3 4 82 7 175 7 l168 0 0 -175z"/>
                                            <path d="M790 1382 c-19 -9 -45 -32 -57 -51 -22 -33 -23 -42 -23 -256 0 -214
                                            1 -223 23 -256 42 -63 66 -69 303 -69 202 0 212 1 244 23 74 50 75 53 75 302
                                            0 249 -1 252 -75 303 -32 21 -42 22 -244 22 -181 0 -216 -3 -246 -18z m420
                                            -307 l0 -175 -175 0 -175 0 0 175 0 175 175 0 175 0 0 -175z"/>
                                            <path d="M1815 1386 c-16 -7 -41 -26 -55 -41 l-25 -27 0 -243 0 -244 30 -31
                                            c45 -46 78 -52 307 -48 226 3 232 5 282 72 20 26 21 41 21 251 0 249 -1 252
                                            -75 303 -32 21 -41 22 -244 22 -153 -1 -219 -4 -241 -14z m415 -311 l0 -175
                                            -175 0 -175 0 0 175 0 175 175 0 175 0 0 -175z"/>
                                            <path d="M2820 1378 c-63 -43 -75 -70 -75 -168 0 -105 14 -130 75 -130 55 0
                                            70 23 70 103 l0 67 175 0 175 0 0 -175 0 -175 -173 0 -173 0 -11 30 c-20 54
                                            -104 53 -127 -2 -17 -39 -6 -91 26 -125 43 -48 72 -53 288 -53 217 0 244 5
                                            290 55 l25 27 0 243 0 243 -25 27 c-46 50 -72 55 -298 55 -200 0 -210 -1 -242
                                            -22z"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="details">
                                        <div class="minor">Have an enquiry?</div>
                                        <div class="major">Book Appointment</div>
                                    </div>
                                </div>
                            </a>
                            

                        </div>
                    </div>
                </div>
                
            </div>
            

        </header>