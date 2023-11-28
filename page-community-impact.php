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

    <?php if (have_rows('resources_sub_links', 'option')) : ?>
        <div class="sub-links-wrap pad-x">
            <?php while (have_rows('resources_sub_links', 'option')) : the_row(); ?>
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


<!-- Community Impact section -->
<section class="pad-x py-lg-5 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="sec-hdr primary md text-center mt-lg-1 mt-1"><?= get_field('caption'); ?></div>
            <?php if (have_rows('community_impact')) : ?>
                <div class="impact-full-wrap mt-lg-3 mt-2">
                    <?php while (have_rows('community_impact')) : the_row(); ?>
                        <div class="mid-section">
                            <div class="mid-section-image lg bkg-std" style="background-image: url('<?= get_sub_field('featured_image')['url']; ?>')">
                                <div class="overlay"></div>
                                <div class="main"><?= get_sub_field('title'); ?></div>
                                <div class="details">
                                    <div class="sec-hdr wht sm"><?= get_sub_field('sub_title'); ?></div>
                                    <div class="btn-hld">
                                        <?php if (get_sub_field('featured_video')) : ?>
                                            <a href="#" id="open-lightbox" class="btn btn_bold transparent video playVid only-desktop">
                                                <span><img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/play-fill.svg' ?>" alt="" /></span>
                                            </a>
                                            <span class="sec-hdr wht xs">Watch Video</span>
                                        <?php endif; ?>
                                        <?php $images = get_sub_field('gallery'); ?>
                                        <div class="gallery-cont">
                                            <?php if( $images ): ?>
                                                <?php foreach( $images as $image ): ?>
                                                    <a class="gallery-hld cta" href="<?= $image['url']; ?>" data-fancybox="gallery" data-caption="<?= get_sub_field('sub_title'); ?>">
                                                        <span>View Gallery</span>
                                                    </a>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</section>

<?php get_footer() ?>