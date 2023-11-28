<?php get_header() ?>


<!-- Hero section -->
<section class="hero sub__pages">
    <div class="overlay"></div>
    <?php if (get_field('featured_video')) : ?>
        <video class="hero__video" autoplay muted loop>
            <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
        </video>
        <?php else : ?>
        <img class="hero__img" src="<?= get_field('workshops_page_featured_image', 'option')['url']; ?>" alt="">
    <?php endif; ?>
    
    <div class="caption-cont pad-x">
        <!-- <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
           
        </div> -->
        <div class="caption__wrap">
            <h1 class="hero__title"><?= get_field('workshops_page_title', 'option'); ?></h1>
        </div>
    </div>

    
</section>


<section class="pad-x py-lg-5 py-3">

    <form class="filter-form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-2">
        <ul class="filter-group">

            <?php if ($terms = get_terms(array('taxonomy' => 'workshop-categories', 'orderby' => 'name'))) : ?>

                <li class="filter-item">
                    <input name="categoryfilter" type="radio" value="all" id="filter-all" class="filter-radio" checked>
                    <label for="filter-all">
                        All Workshops
                    </label>
                </li>

                <?php foreach ($terms as $term) : ?>
                    <li class="filter-item">
                        <input name="categoryfilter" type="radio" value="<?= $term->term_id ?>" id="filter-<?= $term->term_id ?>" class="filter-radio">
                        <label for="filter-<?= $term->term_id ?>">
                            <?= $term->name ?>
                        </label>
                    </li>
                <?php endforeach; ?>

            <?php endif; ?>

        </ul>
        <button type="submit" class="d-none" id="submitajax">Submit</button>
        <input type="hidden" name="action" value="workshops">
    </form>

    <!-- Reports loop + Inject AJAX response -->
    <?php if (have_posts()) : ?>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="workshops-wrap mt-lg-3 mt-2" id="response">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts', workshops_cards()) ?>

                    <?php endwhile; ?>

                </div>
            </div>
        </div>
        

    <?php else : ?>

        <div class="sec-hdr lg clr text-center">There are currently no reports to show.</div>

    <?php endif;
    wp_reset_postdata(); ?>
    <!-- end Reports loop -->

    <!-- Custom Bootstrap pagination  -->
    <?= bootstrap_pagination(); ?>


</section>


<?php get_footer() ?>