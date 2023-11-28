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

<!-- Mid section template -->
<section class="pad-x py-lg-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 pt-lg-3">
             <div class="row justify-content-between align-items-center">
                <div class="mid-section col-lg-6">
                    <div class="mid-section-image lg bkg-std" style="background-image: url('<?= get_field('mid_section_image')['url']; ?>')">
                        <div class="overlay"></div>
                        <?php if (get_field('mid_section_video')) : ?>
                            <a href="#" id="open-lightbox" class="btn btn_bold transparent video playVid only-desktop">
                                <span><img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/play-fill.svg' ?>" alt="" /></span>
                            </a>
                            <span class="sec-hdr wht sm"><?= get_field('mid_section_video_text'); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6 ps-lg-3">
                    <div class="sec-hdr primary md"><?= get_field('mid_section_heading'); ?></div>
                    <div class="sec-text mt-lg-1"><?= get_field('mid_section_preamble'); ?></div>
                    <?php if (get_field('mid_section_link')['url']) : ?>
                        <div class="btn-hld mt-lg-2">
                            <a href="<?= get_field('mid_section_link')['url']; ?>" class="btn btn_bold primary_clr">
                                <?= get_field('mid_section_link')['title']; ?> <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- CIA Advisory Board section -->
<section class="pad-x py-lg-5 bkg-ft-dark">
    <div class="row">
        <div class="sec-hdr wht md text-center"><?= get_field('advisory_board_heading'); ?></div>

        <div class="row justify-content-between">
            <?php if (have_rows('advisory_board')) : ?>
                <div class="col-wrap row-4 py-3">
                    <?php while (have_rows('advisory_board')) : the_row(); ?>
                        
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</section>

<?php get_footer(); ?>