<?php

/**
 *
 * Add an AJAX filter for a custom post type here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'compliance' with the 
 * singular name of your custom post type e.g. 'service'.
 *
 */


add_action('wp_ajax_compliances', 'compliances_filter_function');
add_action('wp_ajax_nopriv_compliances', 'compliances_filter_function');

function compliances_filter_function()
{

    /**
     * Set query arguments 
     */
    $args = array(
        'orderby' => 'date',
        'order' => $_POST['date'] ?? '',
        'posts_per_page' => 12, // Change this to match the standard loop pagination
        'post_type' => 'compliances', // The post type to filter
        's' => sanitize_text_field($_POST['input'] ?? '')
    );

    /**
     * Modify for taxonomies / categories 
     */
    if (isset($_POST['categoryfilter']) && $_POST['categoryfilter'] !== 'all')
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'compliance-categories', // The taxonomy name
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
            get_template_part('template-parts', compliance_card());
        endwhile;
    else :
        echo '<div class="no-posts-found">There are currently no articles to show.</div>';
    endif;
    wp_reset_postdata();

    /**
     * End posts loop 
     */

    die();
}
