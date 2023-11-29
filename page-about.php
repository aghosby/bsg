<?php get_header() ?>


<!-- Hero section -->
<section class="hero sub__pages">
    <div class="overlay"></div>
    <img class="hero__img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
    
    <div class="caption-cont pad-x">
        <div class="caption__wrap">
            <h1 class="hero__title"><?= get_field('title'); ?></h1>
        </div>
    </div>

    <?php if (have_rows('about_sub_links', 'option')) : ?>
        <div class="sub-links-wrap pad-x">
            <?php while (have_rows('about_sub_links', 'option')) : the_row(); ?>
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

<!-- About section -->
<section class="pad-x pt-lg-4 pt-2">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="sec-text js-anime fadeInLeft"><?= the_content(); ?></div>
        </div>
    </div>
</section>

<!-- Stripe section -->
<section class="pad-x pb-3">
    <div class="row justify-content-center">
        <div class="stripe-sec col-lg-8 mt-lg-2 mt-2 js-anime xFlipRight">
            <div class="sec-hdr sm"><?= get_field('stripe_title'); ?></div>
            <div class="sec-text mt-lg-1 mt-1"><?= get_field('stripe_text'); ?></div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-sec pad-x">
    <div class="row justify-content-center">
        <div class="col-lg-7 mt-lg-1 mt-0">
            <div class="sec-hdr primary md js-anime fadeInLeft"><?= get_field('mission_title'); ?></div>
            <div class="sec-text mt-lg-1 mt-1 js-anime fadeInLeft"><?= get_field('mission_text'); ?></div>
        </div>
    </div>
</section>

<!-- Partner Section -->
<div class="section pad-x col-lg-12 mt-lg-2 mt-0">
    <div class="row justify-content-center">
        <div class="col-lg-7 mt-lg-1 mt-2">
            <div class="sec-hdr primary md js-anime fadeInLeft"><?= get_field('partner_title'); ?></div>
            <div class="sec-text mt-lg-1 mt-1 js-anime fadeInLeft"><?= get_field('partner_text'); ?></div>
        </div>
    </div>
    <?php if (have_rows('partners')) : ?>
        <div class="logo-carousel mt-lg-2 mt-1">
            <?php while (have_rows('partners')) : the_row(); ?>
                <div class="logo-hld">
                    <a href="<?= get_sub_field('link'); ?>">
                        <img src="<?= get_sub_field('logo')['url']; ?>" alt="">
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Mid section -->
<section class="pad-x py-lg-4 py-3">
    <div class="mid-section abt">
        <div class="mid-section-image lg bkg-std js-anime xFlipRight" style="background-image: url('<?= get_field('mid_section_image')['url']; ?>')">
            <div class="overlay"></div>
            <div class="col-lg-6 col-12">
                <div class="sec-hdr wht lg js-anime fadeInLeft"><?= get_field('mid_section_heading'); ?></div>
                <div class="sec-text wht lg mt-lg-1 mt-1 js-anime fadeInLeft"><?= get_field('mid_section_preamble'); ?></div>
                <?php if (get_field('mid_section_link')['url']) : ?>
                    <div class="btn-hld mt-lg-2 mt-1">
                        <a href="<?= get_field('mid_section_link')['url']; ?>" class="btn primary lg js-anime fadeInLeft">
                            <?= get_field('mid_section_link')['title']; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</section>

<!-- Safety section -->
<section class="safety pad-x mt-lg-1 mt-1 pb-lg-1">
    <div class="row justify-content-between">
        <div class="col-lg-6 pe-lg-4">
            <!-- <div class="sec-hdr sm primary js-anime fadeInLeft"><?= get_field('about_section_heading'); ?></div> -->
            <div class="sec-hdr lg js-anime fadeInLeft"><?= get_field('safety_heading'); ?></div>
            <div class="sec-text js-anime fadeInLeft mt-lg-1 mt-1">
                <?= get_field('safety_text_content'); ?>
            </div>
        </div>

        <div class="col-lg-6 mt-lg-0 mt-2">
            <div class="sec-hdr sm js-anime fadeInLeft"><?= get_field('values_heading'); ?></div>
            <div class="values-wrap">
                <?php while (have_rows('company_values')) : the_row(); ?>
                    <div class="values-hld">
                        <div class="heading">
                            <img class="icon js-anime fadeInLeft" src="<?= get_sub_field('icon')['url']; ?>" alt="">
                            <div class="title js-anime fadeInLeft"><?= get_sub_field('title'); ?></div>
                        </div>
                        <div class="desc js-anime fadeInLeft"><?= get_sub_field('content'); ?></div>                            
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<!-- Info section -->

<!-- FAQ SECTION -->
<section id="faqs" class="pad-x py-lg-4 py-3">
    <div class="row d-flex justify-content-center">
        
        <div class="col-lg-8">
            <div class="sec-hdr md primary text-center"><?= get_field('faq_heading'); ?></div>
        </div>

        <div class="col-lg-7">
            <?php if (have_rows('faqs')) : ?>
                <div class="accordion__wrap bkg-sec-light">
                    <?php while (have_rows('faqs')) : the_row(); ?>
                        <div class="accordion__hld">
                            <div class="intro">
                                <div class="title"><?= get_sub_field('question'); ?></div>
                                <div class="icon">
                                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="content">
                                <div class="sec-text"><?= get_sub_field('answer'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</section>

<?php get_footer() ?>