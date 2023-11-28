<?php

/**
 *
 * Add an AJAX filter for a custom post type here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'career' with the 
 * singular name of your custom post type e.g. 'service'.
 *
 */


add_action('wp_ajax_careers', 'careers_filter_function');
add_action('wp_ajax_nopriv_careers', 'careers_filter_function');

function careers_filter_function()
{

    /**
     * Set query arguments 
     */
    $args = array(
        'orderby' => 'date',
        'order' => $_POST['date'] ?? 'DESC',
        'posts_per_page' => 6, // Change this to match the standard loop pagination
        'post_type' => 'careers', // The post type to filter
        's' => sanitize_text_field($_POST['input'] ?? '')
    );

    /**
     * Modify for taxonomies / categories 
     */
    if (isset($_POST['categoryfilter']) && $_POST['categoryfilter'] !== 'all')
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'career-categories', // The taxonomy name
                'field' => 'id', // The field to query
                'terms' => $_POST['categoryfilter'], // Get the taxonomy terms
            )
        );


    $query = new WP_Query($args);


    /**
     * Start posts loop 
     */

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts', careers_card());
        endwhile;
    else :
        echo '<div class="no-posts-found">We currently don’t have any open vacancies, but you can still <a href="' . site_url('/contact') . '">register your interest</a>  to work with us.</div>';
    endif;
    wp_reset_postdata();

    /**
     * End posts loop 
     */

    die();
}
