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

<!-- Mid section template -->
<section class="pad-x py-lg-5 py-3">
    <div class="row justify-content-center">
        <div class="col-lg-10 pt-lg-3 pt-2">
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

                <div class="col-lg-6 ps-lg-3 mt-lg-0 mt-2">
                    <div class="sec-hdr primary md"><?= get_field('mid_section_heading'); ?></div>
                    <div class="sec-text mt-lg-1 mt-1"><?= get_field('mid_section_preamble'); ?></div>
                    <?php if (get_field('mid_section_link')['url']) : ?>
                        <div class="btn-hld mt-lg-2 mt-2">
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

<!-- Career Vacancies Section -->
<section class="pad-x pb-lg-4 pb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <?php
                // Create query
                $query_args = array(
                    'post_type' => 'careers',
                    'posts_per_page' => -1,
                    'tax_query' => array (
                        array(
                            'taxonomy' => 'career-categories', // The taxonomy name
                            'field' => 'slug', // The field to query
                            'terms' => 'Job', // Get the taxonomy terms
                        )
                    )
                );

                $query = new WP_Query($query_args); 
            ?>

            <!-- Start posts loop -->
            <?php if ($query->have_posts()) : ?>
                <div class="accordion__wrap bkg-sec-light px-lg-2 px-1 py-lg-2 py-2">
                    <div class="sec-hdr md primary text-center mb-lg-1"><?= get_field('vacancies_heading'); ?></div>
                    <?php while ($query->have_posts()) : $query->the_post();?>
                        <!-- Load Vacancies -->
                        <div class="accordion__hld fnb">
                            <div class="intro">
                                <div class="title"><?= the_title(); ?></div>
                                <div class="icon">
                                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="content">
                                <div class="sec-text roles"><?= get_field('job_details'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            <?php endif; ?>
            <!-- End posts loop -->

        </div>
    </div>
</section>

<!-- Coaching & Mentorship Section -->
<section class="pad-x py-lg-5 py-3 bkg-ft-dark">
    <div class="row justify-content-between align-items-start">
        <div class="col-lg-6 pe-lg-4">
            <div class="sec-hdr wht md"><?= get_field('mentorship_section_heading'); ?></div>
            <div class="sec-text wht mt-lg-1 mt-1"><?= get_field('mentorship_section_preamble'); ?></div>
            <?php if (have_rows('mentorship_section_details')) : ?>
                <div class="accordion__wrap">
                    <?php while (have_rows('mentorship_section_details')) : the_row(); ?>
                        <div class="accordion__hld wht">
                            <div class="intro">
                                <div class="title"><?= get_sub_field('title'); ?></div>
                                <div class="icon">
                                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="content">
                                <div class="sec-text"><?= get_sub_field('content'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 

            <div class="info-wrap sm bkg-sec-light mt-lg-3 mt-2">
                <div class="info-hdr">
                    <i class="fas fa-info-circle"></i>
                    <span><?= get_field('mentorship_info_text') ?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-lg-2 mt-2">
            <?= do_shortcode('[wpforms id="1016"]') ?>
        </div>
    </div>
</section>

<!-- Volunteer Section -->
<section class="hm-abt pad-x py-lg-5 py-3">
    <div class="row justify-content-between">
        <div class="col-lg-4">
            <div class="sec-hdr primary md"><?= get_field('volunteer_section_heading'); ?></div>
            <div class="sec-text mt-lg-1 mt-1"><?= get_field('volunteer_section_preamble'); ?></div>
        </div>

        <div class="col-lg-7">
            <div class="tabs-wrap sm mt-lg-0 mt-3">
                <!-- Start posts loop -->
                <?php if (have_rows('volunteer_section_details')) : ?>
                    <div class="tab-links">
                        <?php $tabId = 0 ?>
                        <?php while (have_rows('volunteer_section_details')) : the_row(); ?>
                            <?php $tabId = $tabId + 1 ?>
                            <li>
                                <a href="#tab<?= $tabId ?>" class=""><?= get_sub_field('title'); ?></a>
                            </li>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <!-- End posts loop -->

                <!-- Start posts loop -->
                <?php if (have_rows('volunteer_section_details')) : ?>
                    <div class="tab-content">
                        <?php $tabId = 0 ?>
                        <?php while (have_rows('volunteer_section_details')) : the_row(); ?>
                            <?php $tabId = $tabId + 1 ?>
                            <div id="#tab<?= $tabId ?>" class="tab-text">
                                <div class="desc"><?= get_sub_field('content'); ?></div>
                            </div>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                <?php endif; ?>
                <!-- End posts loop -->

            </div>
        </div>
    </div>
</section>

<!-- Volunteer Vacancies Section -->
<section class="pad-x pb-lg-4 pb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <?php
                // Create query
                $query_args = array(
                    'post_type' => 'careers',
                    'posts_per_page' => -1,
                    'tax_query' => array (
                        array(
                            'taxonomy' => 'career-categories', // The taxonomy name
                            'field' => 'slug', // The field to query
                            'terms' => 'Volunteer', // Get the taxonomy terms
                        )
                    )
                );

                $query = new WP_Query($query_args); 
            ?>

            <!-- Start posts loop -->
            <?php if ($query->have_posts()) : ?>
                <div class="accordion__wrap bkg-sec-light px-lg-2 px-1 py-lg-2 py-2">
                    <div class="sec-hdr md primary text-center mb-lg-1"><?= get_field('volunteer_roles_heading'); ?></div>
                    <?php while ($query->have_posts()) : $query->the_post();?>
                        <!-- Load Vacancies -->
                        <div class="accordion__hld fnb">
                            <div class="intro">
                                <div class="title"><?= the_title(); ?></div>
                                <div class="icon">
                                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="content">
                                <div class="sec-text roles"><?= get_field('job_details'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            <?php endif; ?>
            <!-- End posts loop -->

        </div>
    </div>
</section>

<?php get_footer() ?>