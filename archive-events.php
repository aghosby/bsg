<?php get_header() ?>


<!-- Hero section -->
<section class="hero sub__pages">
    <div class="overlay"></div>
    <?php if (get_field('featured_video')) : ?>
        <video class="hero__video" autoplay muted loop>
            <source src="<?= get_field('featured_video')['url']; ?>" type="video/mp4">
        </video>
        <?php else : ?>
        <img class="hero__img" src="<?= get_field('events_page_featured_image', 'option')['url']; ?>" alt="">
    <?php endif; ?>
    
    <div class="caption-cont pad-x">
        <!-- <div class="feature__breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
           
        </div> -->
        <div class="caption__wrap">
            <h1 class="hero__title"><?= get_field('events_page_title', 'option'); ?></h1>
        </div>
    </div>

    <!-- <?php if (have_rows('get_involved_sub_links', 'option')) : ?>
        <div class="sub-links-wrap pad-x">
            <?php while (have_rows('get_involved_sub_links', 'option')) : the_row(); ?>
                <?php if (get_sub_field('link')['title'] == get_field('events_page_title', 'option')) : ?>
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
    <?php endif; ?> -->
    
</section>


<section class="pad-x py-lg-5 py-4">

    <form class="filter-form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-2">
        <ul class="filter-group">

            <?php if ($terms = get_terms(array('taxonomy' => 'event-categories', 'orderby' => 'name'))) : ?>

                <li class="filter-item">
                    <input name="categoryfilter" type="radio" value="all" id="filter-all" class="filter-radio" checked>
                    <label for="filter-all">
                        All Events
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
        <input type="hidden" name="action" value="events">
    </form>

    <!-- Events loop + Inject AJAX response -->
    <?php if (have_posts()) : ?>

        <div class="events-wrap mt-lg-3 mt-3" id="response">

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts', events_cards()) ?>

            <?php endwhile; ?>

        </div>

    <?php else : ?>

        <div class="sec-hdr lg clr text-center">There are currently no events to show.</div>

    <?php endif;
    wp_reset_postdata(); ?>
    <!-- end Events loop -->

    <!-- Custom Bootstrap pagination  -->
    <?= bootstrap_pagination(); ?>


</section>


<?php get_footer() ?>