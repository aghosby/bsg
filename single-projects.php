<?php

/**
 * The single page template for Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SBX_Starter_Theme
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

    <!-- Hero section -->
    <section class="hero sub__pages">
        <div class="overlay"></div>
        <?php if (get_field('featured_video')) : ?>
            <video class="hero__video" autoplay muted loop>
                <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
            </video>
            <?php else : ?>
            <img class="hero__img" src="<?= get_field('projects_featured_image', 'option')['url']; ?>" alt="">
        <?php endif; ?>
        
        <div class="caption-cont pad-x">
            <!-- <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            
            </div> -->
            <div class="caption__wrap">
                <h1 class="hero__title">Projects</h1>
            </div>
        </div>
        
    </section>



    <!-- Details Section -->
    <section class="pad-x py-lg-5 py-3">
        <div class="single-page pad-x">
            <div class="row single-project justify-content-center">

                <div class="col-lg-7">
                    <div class="tag mb-lg-1 mb-1 <?= get_field('status');?>"><?= get_field('status');?></div>
                    <div class="sec-hdr md primary"><?= the_title(); ?></div>
                    <div class="project-info mt-lg-1 mt-1">
                        <div class="info">
                            <span><i class="fas fa-calendar-days"></i></span>
                            <?php $date = get_field('date')?>
                            <span class="date"><?php echo date('F Y', strtotime($date)); ?></span>
                        </div>
                        <div class="info">
                            <span><i class="fas fa-briefcase"></i></span>
                            <span><?= get_field('client');?></span>
                        </div>
                        <div class="info">
                            <span><i class="fas fa-clock"></i></span>
                            <span><?= get_field('duration');?></span>
                        </div>
                    </div>
                    <div class="share d-flex align-items-center pt-lg-1 pt-1">
                        <h4 class="sec-hdr sm dark me-1 me-lg-1 text-capitalize">Share this project</h4>
                        <?= get_template_part('template-parts/section', 'share'); ?>
                    </div>
                    <div class="sec-text mt-lg-3 mt-2">
                        <img class="content-img" src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                        <?= the_content(); ?>
                    </div>
                </div>

                <div class="col-lg-12">

                    <!-- <div class="section-hdr clr lg gs__reveal gs__reveal--fromRight">See Other Services</div> -->
                    <?php $images = get_field('project_photos'); ?>
                    <div class="gallery-wrap">
                        <div class="gallery-cont">
                            <?php if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                    <a class="gallery-hld grid-item" href="<?php echo $image['url']; ?>" data-fancybox="gallery" data-caption="<?php echo the_title(); ?>">
                                        <img class="js-anime xflip" src="<?php echo $image['url']; ?>" alt="" />
                                    </a>
                                    <!-- <div class="gallery-hld grid-item <?php echo strtolower($filter); ?>" style="background-image: url('<?php echo $image['url']; ?>');"></div> -->
                                <?php endforeach; ?>
                            <?php
                            endif;?>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 mt-lg-5 mt-3">
                    <div class="sec-hdr md primary text-center mb-lg-1 mb-1">Other Projects</div>
                    <div class="home projects-wrap md row justify-content-center align-items-start">

                        <?php
                            // Create query
                            $query_args = array(
                                'post_type' => 'projects',
                                'posts_per_page' => 2,
                                'post__not_in' => array( $post->ID )
                            );

                            $query = new WP_Query($query_args); 

                        ?>

                        <div class="projects-archive">
                            <!-- Start posts loop -->
                                <?php if ($query->have_posts()) : ?>
                                    <?php while ($query->have_posts()) : $query->the_post();?>
                                        <!-- Load Featured News template -->
                                        <?php get_template_part('template-parts', projects_cards()) ?>
                                    <?php endwhile; wp_reset_query(); ?>
                                <?php endif; ?>
                            <!-- End posts loop -->
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>




    <?php
	    endwhile; // End of the loop.
	?>


</main>

<?php get_footer(); ?>