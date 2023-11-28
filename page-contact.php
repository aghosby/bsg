<?php get_header() ?>

<!-- Hero section -->
<section class="hero sub__pages">
    <div class="overlay"></div>
    <?php if (get_field('featured_video')) : ?>
        <video class="hero__video" autoplay muted loop>
            <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
        </video>
        <?php else : ?>
        <img class="hero__img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
    <?php endif; ?>
    
    <div class="caption-cont pad-x">
        <!-- <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
           
        </div> -->
        <div class="caption__wrap">
            <h1 class="hero__title"><?= get_field('title'); ?></h1>
        </div>
    </div>
    
</section>


<!-- Contact Details section -->
<section class="bkg-light pad-x py-lg-5 py-3">
    <div class="row justify-content-between align-items-end">
        <div class="col-lg-6 pe-lg-4 pe-1">
            <div class="sec-hdr md primary js-anime fadeInLeft"><?= get_field('contact_form_heading'); ?></div>
            <div class="sec-text mt-lg-1 mt-1 pe-lg-2 pe-1 js-anime fadeInLeft"><?= get_field('contact_form_preamble'); ?></div>
            <div class="contact-wrap">
                <!-- email -->
                <?php if (have_rows('emails', 'option')) : ?>
                    <div class="contact mail">
                        <div class="contact-list">
                            <?php while (have_rows('emails', 'option')) : the_row(); ?>

                                <a href="mailto:<?= get_sub_field('email', 'option'); ?>" class="d-block js-anime fadeInLeft">
                                    <?= get_sub_field('email', 'option'); ?>
                                </a>

                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- phone -->
                <?php if (have_rows('phones', 'option')) : ?>
                    <div class="contact phone">
                        <div class="contact-list">
                            <?php while (have_rows('phones', 'option')) : the_row(); ?>

                                <a href="tel:<?= get_sub_field('phone', 'option'); ?>" class="d-block js-anime fadeInLeft">
                                    <?= get_sub_field('phone', 'option'); ?>
                                </a>

                            <?php endwhile; ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>

            <div class="map-wrap mt-lg-2 mt-1">
                <div class="sec-hdr md primary js-anime fadeInLeft"><?= get_field('map_heading') ?></div>
                <div class="sec-text py-lg-1 py-1 js-anime fadeInLeft">
                    <?= get_field('address_line_1', 'option', false) ?> <br>
                    <?= get_field('address_line_2', 'option', false) ?> <br>
                </div>
                <iframe class="map js-anime xFlipRight" src="<?= get_field('map_location') ?>" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="col-lg-6">
            <?= do_shortcode('[wpforms id="1132"]') ?>
        </div>
    </div>
</section>



<!-- Contact Form section -->
<!-- <section id="membership-signup" class="pad-x py-lg-4 py-3">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="sec-hdr primary md text-center"></div>
            <div class="sec-text text-center mt-lg-1"></div>
        </div>
        <div class="col-lg-7">
           
        </div>
    </div> 
</section>
-->



<?php get_footer() ?>