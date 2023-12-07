<?php get_header() ?>


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
            <h1 class="hero__title"><?= get_field('projects_title', 'option'); ?></h1>
        </div>
    </div>
    
</section>


<section class="pad-x py-lg-5 py-3 bkg-light">

    <!-- Projects loop + Inject AJAX response -->
    <?php if (have_posts()) : ?>

        <section class="row justify-content-between">

            <div class="col-lg-9 col-12">
                <div class="projects-wrap md pt-lg-0 pe-lg-3 pe-0" id="response">

                    <div class="projects-archive">
                        <?php while (have_posts()) : the_post(); ?>

                            <?php get_template_part('template-parts', projects_cards()) ?>

                        <?php endwhile; ?>
                    </div>
                    

                </div>
            </div>

            <div class="col-lg-3">
                <div class="sec-hdr primary sm">Service Categories</div>
                <form class="filter-form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-2">
                    <ul class="filter-group">

                        <?php if ($terms = get_terms(array('taxonomy' => 'project-categories', 'orderby' => 'name'))) : ?>

                            <li class="filter-item">
                                <input name="categoryfilter" type="radio" value="all" id="filter-all" class="filter-radio" checked>
                                <label for="filter-all">
                                    All Projects <i class="fas fa-chevron-right"></i>
                                </label>
                            </li>

                            <?php foreach ($terms as $term) : ?>
                                <li class="filter-item">
                                    <input name="categoryfilter" type="radio" value="<?= $term->term_id ?>" id="filter-<?= $term->term_id ?>" class="filter-radio">
                                    <label for="filter-<?= $term->term_id ?>">
                                        <?= $term->name ?> <i class="fas fa-chevron-right"></i>
                                    </label>
                                </li>
                            <?php endforeach; ?>

                        <?php endif; ?>

                    </ul>
                    <button type="submit" class="d-none" id="submitajax">Submit</button>
                    <input type="hidden" name="action" value="projects">
                </form>

                <div class="projects-aside">
                    <img src="<?= get_field('projects_featured_image', 'option')['url']; ?>" alt="">
                    <div class="details py-lg-2 py-1 px-lg-2 px-1">
                        <div class="sec-hdr dark md text-center"><?= get_field('projects_caption', 'option');?></div>
                        <div class="sec-text dark text-center"><?= get_field('projects_page_lead_text', 'option');?></div>
                        <div class="btn primary lg mt-lg-1 mt-1">Enquire Today</div>
                    </div>
                </div>
            </div>

            

        </section>

    <?php else : ?>

        <div class="sec-hdr lg clr text-center">There are currently no projects to show.</div>

    <?php endif;
    wp_reset_postdata(); ?>
    <!-- end Projects loop -->

    <!-- Custom Bootstrap pagination  -->
    <?= bootstrap_pagination(); ?>


</section>


<?php get_footer() ?>