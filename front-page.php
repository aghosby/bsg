<?php get_header() ?>

<!-- Hero section -->
<section class="hero">
    <div class="flexslider">
        <?php if (have_rows('banner')) : ?>
            <ul class="slides">
                <?php while (have_rows('banner')) : the_row(); ?>
                    <li>
                        <div class="overlay"></div>
                        <?php if (get_sub_field('video')) : ?>
                            <video class="hero__video" autoplay muted loop>
                                <source src="<?= get_sub_field('video')['url']; ?>" type="video/mp4">
                            </video>
                            <?php else : ?>
                            <img src="<?= get_sub_field('image')['sizes']['large']; ?>" alt="">
                        <?php endif; ?>

                        <div class="flex-caption">
                            <div class="captions">
                                <div class="slide_header"><?= get_sub_field('caption'); ?></div>
                                <div class="slide_desc"><?= get_sub_field('lead_text'); ?></div>
                                <div class="btn-hld">
                                    <a href="<?= get_sub_field('primary_link')['url']; ?>" class="btn primary bold lg"><?= get_sub_field('primary_link')['title']; ?> </a>
                                    <?php if (get_sub_field('secondary_link')) : ?>
                                        <!-- <a href="<?= get_sub_field('secondary_link')['url']; ?>" class="btn secondary"><?= get_sub_field('secondary_link')['title']; ?> </a> -->
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?> 
    </div>

    <div class="scroll">
        <a href="">
            <span class="scroll-indicator"></span>
        </a>
    </div>
    <!-- <div class="overlay"></div>
    <img class="hero__img only-mobile" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
    <?php if (get_field('featured_background_video')) : ?>
        <video class="hero__video only-desktop" autoplay muted loop>
            <source src="<?= get_field('featured_background_video')['url']; ?>" type="video/mp4">
        </video>
        <?php else : ?>
        <img class="hero__img only-desktop" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
    <?php endif; ?>

    <div class="container">
        <div class="caption__wrap">
            <h1 class="hero__title"><?= get_field('title'); ?></h1>
            <div class="hero__lead-text"><?= get_field('lead_text'); ?></div>
            <div class="btn__hld">
                <?php if (get_field('featured_background_video')) : ?>
                    
                    <a href="#" id="open-lightbox" data-video="<?= get_field('featured_full_video')['url']; ?>" class="btn btn_bold transparent video playVid">
                        <span><img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/play-fill.svg' ?>" alt="" /></span>Watch Video
                    </a>
                    
                    <?php else : ?>
                    
                <?php endif; ?>

                <a href="<?= get_field('cta')['url']; ?>" class="btn btn_bold primary_clr">
                    <?= get_field('cta')['title']; ?> <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                </a>
                
            </div>

        </div>
    </div> -->
    
</section>


<!-- About section -->
<section class="about pad-x py-lg-5 bkg-light">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <div class="section-image bkg-standard js-anime xFlipRight" style="background-image: url('<?= get_field('about_photo')['url']; ?>')"></div>
        </div>
        <div class="col-lg-5">
            <div class="sec-hdr sm primary js-anime fadeInLeft"><?= get_field('about_section_heading'); ?></div>
            <div class="sec-hdr dark-grey lg mt-lg-1 js-anime fadeInLeft"><?= get_field('about_section_caption'); ?></div>
            <div class="sec-text js-anime fadeInLeft mt-lg-1">
                <?= get_field('about_section_preamble'); ?>
            </div>
            <div class="btn-hld js-anime fadeInLeft mt-lg-2">
                <a href="<?= get_field('about_section_link')['url']; ?>" class="btn primary bold lg"><?= get_field('about_section_link')['title']; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Services section -->
<section class="pad-x pb-lg-5 bkg-light">
    <div class="inner border-divider">
        <!-- <div class="section-hdr sm"><?= get_field('services_section_heading'); ?></div> -->
        <!-- <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="sec-hdr primary lg mt-lg-1"><?= get_field('services_section_heading'); ?></div>
                <div class="sec-text">
                    <?= get_field('services_section_preamble'); ?>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-end">
                <div class="btn-hld mt-lg-2">
                    <a href="<?= get_field('services_section_cta')['url']; ?>" class="btn primary bold lg"><?= get_field('services_section_cta')['title']; ?></a>
                </div>
            </div>
        </div> -->

        <div class="services-wrap mt-lg-2">
            <?php
                // Create query
                $query_args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 5,
                    'order' => 'ASC'
                );

                $query = new WP_Query($query_args); 

                //var_dump($query);
            ?>
            <!-- Start posts loop -->
            <?php if ($query->have_posts()) : ?>
                <div class="services-carousel">
                    <?php while ($query->have_posts()) : $query->the_post();?>
                        <div class="col-hld">
                            <a href="<?php echo the_permalink(); ?>">
                                <div class="card-top">
                                    <div class="col-photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                                    <div class="title"><?= the_title(); ?></div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="card-btm">
                                    <div class="details"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
                                    <div class="arrow d-flex justify-content-between align-items-center">
                                        <span>Learn More</span>
                                        <span><i class="fas fa-arrow-right"></i></span>
                                    </div>
                                </div>                                
                            </a>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            <?php endif; ?>
            <!-- End posts loop -->

            <div class="btn-hld mt-lg-3">
                <a href="<?= get_field('services_section_cta')['url']; ?>" class="btn primary bold lg"><?= get_field('services_section_cta')['title']; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Mid Page Section -->
<section class="mid-section pad-x py-lg-5 py-3" style="background-image: url('<?= get_field('mid_section_left_image')['url']; ?>')">
    <div class="overlay"></div>
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <div class="sec-hdr wht sm mb-lg-1 mb-1 js-anime fadeInLeft"><?= get_field('mid_section_left_header'); ?></div>
            <div class="sec-hdr wht lg js-anime fadeInLeft"><?= get_field('mid_section_left_caption'); ?></div>
            <div class="sec-text wht mt-lg-1 mt-1 js-anime fadeInLeft"><?= get_field('mid_section_left_text_content'); ?></div>
            <div class="btn-hld mt-lg-2 mt-1">
                <a href="<?= get_field('mid_section_left_link')['url']; ?>" class="btn primary bold lg js-anime fadeInLeft">
                    <?= get_field('mid_section_left_link')['title']; ?>
                </a>
            </div>
        </div>

        <div class="col-lg-10 mt-3 mt-lg-3">
            <?php if (have_rows('company_results')) : ?>
                <div class="stats-wrap">
                    <?php while (have_rows('company_results')) : the_row(); ?>
                        <div class="stats-hld">
                            <img class="icon" src="<?= get_sub_field('icon')['url']; ?>" alt="">
                            <div class="top">
                                <div class="count"><span class="counter"><?= get_sub_field('count'); ?></span><span><?= get_sub_field('suffix'); ?></span></div>
                            </div>
                            <div class="title"><?= get_sub_field('title'); ?></div>                            
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 
            <!-- <div class="col-bkg">
                <div class="col-details">
                    <div class="sec-hdr sm"><?= get_field('mid_section_right_header'); ?></div>
                    <div class="sec-hdr primary md mt-lg-1 mt-1"><?= get_field('mid_section_right_caption'); ?></div>
                    <div class="sec-text mt-lg-1 mt-1"><?= get_field('mid_section_right_text_content'); ?></div>
                    <div class="btn-hld mt-lg-2 mt-1">
                        <a href="<?= get_field('mid_section_right_link')['url']; ?>" class="btn btn_bold primary_clr">
                            <?= get_field('mid_section_right_link')['title']; ?> <img src="<?= get_stylesheet_directory_uri() . '/dist/img/arrow-right-wht.svg' ?>" alt="" />
                        </a>
                    </div>
                </div>
                
                <div class="mid-section-image bkg-std mt-lg-1" style="background-image: url('<?= get_field('mid_section_right_image')['url']; ?>')"></div>
            </div> -->
        </div>
    </div>
</section>

<!-- Projects section -->
<section class="pad-x py-lg-4">
    <div class="inner border-divider">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="sec-hdr primary lg mt-lg-1 js-anime fadeInLeft"><?= get_field('projects_section_heading'); ?></div>
            </div>
            <div class="col-lg-5 d-flex justify-content-end">
                <div class="btn-hld mt-lg-2">
                    <a href="<?= get_field('projects_section_cta')['url']; ?>" class="btn primary bold lg"><?= get_field('projects_section_cta')['title']; ?></a>
                </div>
            </div>
        </div>

        <div class="projects-wrap mt-lg-2">
            <?php
                // Create query
                $query_args = array(
                    'post_type' => 'projects',
                    'posts_per_page' => 6,
                    'order' => 'ASC'
                );

                $query = new WP_Query($query_args); 

                //var_dump($query);
            ?>
            <!-- Start posts loop -->
            <?php if ($query->have_posts()) : ?>
                <div class="projects-carousel">
                    <?php while ($query->have_posts()) : $query->the_post();?>
                        <div class="col-hld">
                            <a href="<?php echo the_permalink(); ?>">
                                <div class="overlay"></div>
                                <div class="col-photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                                <div class="details">
                                    <?php $date = get_field('date')?>
                                    <div class="date"><?php echo date('F Y', strtotime($date)); ?></div>
                                    <div class="title"><?php echo the_title(); ?></div>
                                </div>
                                
                                <span class="tag <?= get_field('status'); ?>"><?= get_field('status'); ?></span>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            <?php endif; ?>
            <!-- End posts loop -->

        </div>
    </div>
</section>

<!-- News Section -->
<section class="pad-x mt-lg-3 mt-2 pb-lg-5 pb-4">
    <div class="row justify-content-between align-items-end">
        <div class="col-lg-8">
            <div class="sec-hdr primary lg mb-lg-1 js-anime fadeInLeft"><?= get_field('news_section_heading'); ?></div>
        </div>
        <div class="col-lg-3 d-flex justify-content-end">
            <!-- <img class="only-desktop" src="<?= get_field('news_section_image'); ?>" alt="" /> -->
            <div class="btn-hld mt-lg-2 mt-2">
                <a href="<?= get_field('news_section_link')['url']; ?>" class="btn bold primary lg">
                    <?= get_field('news_section_link')['title']; ?>
                </a>
            </div>
        </div>
    </div>

    <div class="home news-wrap row justify-content-between align-items-start mt-lg-2 mt-2">

        <div class="col-lg-6 lg">
            <?php
                // Create query
                $query_args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 3,
                    //'meta_key' => 'featured_news',
                    //'orderby' => array('featured_news' => 'DESC'),
                    'meta_query' => array(
                        array('key' => 'featured_news', 'value' => '1')
                    )
                );

                $query = new WP_Query($query_args); 


            ?>
                
            <!-- Start posts loop -->
                <?php if ($query->have_posts()) : ?>
                    <?php $postId = the_post()->ID ?>
                    <?php while ($query->have_posts()) : $query->the_post();?>
                        <!-- Load Featured News template -->
                        <?php get_template_part('template-parts', news_cards()) ?>
                    <?php endwhile; wp_reset_query(); ?>
                <?php endif; ?>
            <!-- End posts loop -->
        </div>

        <div class="col-lg-5 sm">
            <?php
                // Create query
                $query_args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 3,
                    //'post__not_in' => array( $postId )
                    //'meta_key' => 'featured_news',
                    //'orderby' => array('featured_news' => 'DESC'),
                    'meta_query' => array(
                        array('key' => 'featured_news', 'value' => '0')
                    )
                );

                $query = new WP_Query($query_args); 

            ?>
                
            <!-- Start posts loop -->
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post();?>
                        <!-- Load Featured News template -->
                        <?php get_template_part('template-parts', news_cards()) ?>
                    <?php endwhile; wp_reset_query(); ?>
                <?php endif; ?>
            <!-- End posts loop -->
        </div>
       
    </div>
</section>


<?php get_footer() ?>