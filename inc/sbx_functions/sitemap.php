<?php

/**
 * SBX Sitemap Generator
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SBX_Starter_Theme
 */



/**
 * Generates a HTML sitemap from selected post types
 *
 * @return string The sitemap HTML
 * @package SBX_Starter_Theme
 */
function sbx_generate_sitemap(): string
{
    // Initialise output variables
    $output = '';
    $error = false;
    $sitemap_config = [];

    // Validate ACF input - 'sitemap_list_sort_type'
    if (!get_field('sitemap_list_sort_type'))
    {
        $error = true;
        $output .= 'SBX Sitemap Error: The list sort parameter is not set.<br>';
    }
    $sitemap_config['orderby'] = sanitize_text_field(get_field('sitemap_list_sort_type'));

    // Validate ACF input - 'sitemap_list_sort_order'
    if (!get_field('sitemap_list_sort_order'))
    {
        $error = true;
        $output .= 'SBX Sitemap Error: The list sort order is not set.<br>';
    }
    $sitemap_config['order'] = sanitize_text_field(get_field('sitemap_list_sort_order'));

    // Validate ACF input - 'sitemap_post_type_list'
    if (!get_field('sitemap_post_type_list'))
    {
        $error = true;
        $output .= 'SBX Sitemap Error: No post types set. Select at least one post type to display a sitemap.<br>';
    }
    $sitemap_config['post_types'] = get_field('sitemap_post_type_list');

    // Stop sitemap generation and return error messages if error
    if ($error)
    {
        $output = '<div class="alert alert-danger" role="alert">' . $output . '</div>';
        return $output;
    }

    // Destructure parameters array
    $post_types = $sitemap_config['post_types'];
    $orderby = $sitemap_config['orderby'];
    $order = $sitemap_config['order'];

    // Loop through post types
    foreach ($post_types as $post_type)
    {
        $output .= sbx_list_posts($post_type, $orderby, $order);
    }

    // Return output HTML
    return $output;
}


/**
 * Generates a list of posts for a given post type
 *
 * @param array $post_type Contains the post type slug and optional label
 * @param string $orderby WordPress query sort parameter
 * @param string $order WordPress query sort order
 * @return string The HTML list
 * @see https://developer.wordpress.org/reference/functions/wp_list_pages/
 * @package SBX_Starter_Theme
 */
function sbx_list_posts(array $post_type, string $orderby, string $order): string
{

    // Destructure $post_type array
    $post_type_slug = sanitize_text_field($post_type['sitemap_post_type']);
    $post_type_title = sanitize_text_field($post_type['sitemap_post_type_title']);
    $post_to_exclude = sanitize_text_field($post_type['exclude_posts']);

    // Exit if post type has no posts
    $query = new WP_Query(['post_type' => $post_type_slug]);

    if (!($query->have_posts()))
    {
        return '';
    }

    unset($query);

    // Initialise output
    $output = '';

    // Get the post type object
    $post_type_object = get_post_type_object($post_type_slug);

    // Use the default post type label as title if !$post_type_title
    if (!$post_type_title && $post_type_object->labels->name)
    {
        $post_type_title = $post_type_object->labels->name;
    }
    $output .= '<div class="sitemap-list">';
    $output .= '<h2 class="sitemap-list-label">' . $post_type_title . '</h2>';
    $output .= '<ul class="sitemap-list-posts">';

    // Check if the post type is hierarchical (e.g page) or not (e.g. post)
    if ($post_type_object->hierarchical)
    {

        // Generate hierarchical list of pages with sub-pages
        $output .= wp_list_pages(array(
            'title_li' => '',
            'echo' => false,
            'depth' => 0, // -1 => Collapsed, 1 => Top-level
            'post_type' => $post_type_slug,
            'sort_column' => $orderby,
            'sort_order' => $order,
            'exclude' => $post_to_exclude,
        ));
    }
    else
    {

        // Generate (non-hierarchical) list of posts
        $args = array(
            'post_type' => $post_type_slug,
            'orderby' => $orderby,
            'order' => $order,
            'posts_per_page' => -1,
            'post__not_in' => $post_to_exclude,
        );

        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $output .= '<li class="page_item page-item-' . get_the_ID() . '">';
                $output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                $output .= '</li>';
            endwhile;
            wp_reset_postdata();
        endif;

        unset($query);
    }

    $output .= '</ul>
</div>';

    // Return output HTML
    return $output;
}


/**
 * Lists all public post types to be loaded in the
 * sitemap ACF select field choices
 *
 * @param array $exclude_list The post types to exclude
 * @return string $output The list of post types
 * @package SBX_Starter_Theme
 */
function sbx_get_all_post_types(array $exclude_list = []): string
{
    // Get post types
    $post_types = get_post_types([
        'public' => true,
        'show_ui' => true,
    ]);

    // Initialize output string
    $output = '';

    // Assign post types to $choices array
    foreach ($post_types as $slug)
    {
        if (!in_array($slug, $exclude_list, true))
        {

            $post_object = get_post_type_object($slug);
            $label = $post_object->labels->name ?: $post_object->label;
            $label = ucwords(str_replace("_", " ", $label));
            $output .= "$slug : $label<br>";
        }
    }

    return $output;
}
