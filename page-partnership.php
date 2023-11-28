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

    <?php if (have_rows('get_involved_sub_links', 'option')) : ?>
        <div class="sub-links-wrap pad-x">
            <?php while (have_rows('get_involved_sub_links', 'option')) : the_row(); ?>
                <?php if (get_sub_field('link')['title'] == get_field('title')) : ?>
                    <a href="<?= get_sub_field('link')['url']; ?>" class="sub-link active">
                        <?= get_sub_field('link')['title']; ?>
                    </a>
                <?php else : ?>
                    <a href="<?= get_sub_field('link')['url']; ?>" class="sub-link">
                        <?= get_sub_field('link')['title']; ?>
                    </a>
                <?php endif; ?>
                
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    
</section>

<!-- Intro section -->
<section class="pad-x py-lg-5 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7 mt-lg-1">
            <div class="sec-text mt-lg-1 mt-1"><?= the_content(); ?></div>
        </div>

        <div class="col-lg-12 mt-lg-3 mt-2">
            <?php if (have_rows('partners')) : ?>
                <div class="logo-carousel">
                    <?php while (have_rows('partners')) : the_row(); ?>
                        <div class="logo-hld">
                            <a href="<?= get_sub_field('link'); ?>" target="_blank">
                                <img src="<?= get_sub_field('logo')['url']; ?>" alt="">
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Mid section -->
<section class="pad-x py-lg-5 py-3 bkg-ft-dark">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 pe-lg-3">
            <div class="sec-hdr wht md"><?= get_field('mid_section_heading'); ?></div>
            <div class="sec-text wht mt-lg-1 mt-1"><?= get_field('mid_section_preamble'); ?></div>
            <?php if (get_field('mid_section_link')['url']) : ?>
                <div class="btn-hld mt-lg-2 mt-2">
                    <a href="<?= get_field('mid_section_link')['url']; ?>" class="btn btn_bold primary_clr">
                        <?= get_field('mid_section_link')['title']; ?> <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="mid-section col-lg-6">
            <div class="mid-section-image lg bkg-std mt-lg-0 mt-3" style="background-image: url('<?= get_field('mid_section_image')['url']; ?>')">
                <div class="overlay"></div>
                <?php if (get_field('mid_section_video')) : ?>
                    <a href="#" id="open-lightbox" class="btn btn_bold transparent video playVid only-desktop">
                        <span><img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/play-fill.svg' ?>" alt="" /></span>
                    </a>
                    <span class="sec-hdr wht sm"><?= get_field('mid_section_video_text'); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Membership Packages section -->
<section class="pad-x py-lg-5 py-3">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="sec-hdr primary lg text-center"><?= get_field('membership_plan_heading'); ?></div>
        </div>

        <div class="col-lg-12">
            <?php if (have_rows('membership_plans')) : ?>
                <div class="packages-wrap">
                    <?php while (have_rows('membership_plans')) : the_row(); ?>
                        <div class="packages-hld">
                            <img class="icon" src="<?= get_sub_field('icon'); ?>" alt="">
                            <div class="price"><?= get_sub_field('price'); ?></div>
                            <div class="benefit"><?= get_sub_field('package_benefits'); ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Membership Benefits section -->
<section class="pad-x py-lg-5 py-3 bkg-ft-dark">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row justify-content-between align-items-center">

                <div class="col-lg-5">

                    <div class="testimonial-wrap lg bkg-std" style="background-image: url('<?= get_field('membership_section_image')['url']; ?>')">
                    </div>

                </div>

                <div class="col-lg-7 px-lg-3 mt-lg-0 mt-3">
                    <div class="sec-hdr wht md"><?= get_field('benefits_heading'); ?></div>
                    <div class="general-benefits">
                        <div class="sec-text wht"><?= get_field('membership_benefits'); ?></div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</section>

<!-- Membership Signup section -->
<section id="membership-signup" class="pad-x py-lg-4 py-3">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="sec-hdr primary md text-center"><?= get_field('signup_form_heading'); ?></div>
            <div class="sec-text text-center"><?= get_field('signup_form_preamble'); ?></div>
        </div>
        <div class="col-lg-7">
            <?= do_shortcode('[wpforms id="926"]') ?>
        </div>
    </div>
</section>

<?php get_footer() ?>