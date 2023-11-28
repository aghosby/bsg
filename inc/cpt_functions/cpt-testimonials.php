<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'testimonial' with the 
 * singular name of your custom post type e.g. 'testimonial'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
 */


/**
 * Custom post type (My Custom Post Type Name) 
 */

add_action('init', 'wp_sbx_register_my_cpts_testimonials');

function wp_sbx_register_my_cpts_testimonials()
{

    $labels = [
        "name" => __("Testimonials", "wp-sbx"),
        "singular_name" => __("Testimonial", "wp-sbx"),
        "menu_name" => __("Testimonials", "wp-sbx"),
        "all_items" => __("All Testimonials", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Testimonial", "wp-sbx"),
        "edit_item" => __("Edit Testimonial", "wp-sbx"),
        "new_item" => __("New Testimonial", "wp-sbx"),
        "view_item" => __("View Testimonial", "wp-sbx"),
        "view_items" => __("View Testimonials", "wp-sbx"),
        "search_items" => __("Search Testimonials", "wp-sbx"),
        "not_found" => __("No Testimonials found", "wp-sbx"),
        "not_found_in_trash" => __("No Testimonials found in trash", "wp-sbx"),
        "parent" => __("Parent Testimonial:", "wp-sbx"),
        "featured_image" => __("Featured image for this Testimonial", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Testimonial", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Testimonial", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Testimonial", "wp-sbx"),
        "archives" => __("Testimonials", "wp-sbx"),
        "insert_into_item" => __("Insert into Testimonial", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Testimonial", "wp-sbx"),
        "filter_items_list" => __("Filter Testimonials list", "wp-sbx"),
        "items_list_navigation" => __("Testimonials list navigation", "wp-sbx"),
        "items_list" => __("Testimonials list", "wp-sbx"),
        "attributes" => __("Testimonials attributes", "wp-sbx"),
        "name_admin_bar" => __("Testimonial", "wp-sbx"),
        "item_published" => __("Testimonial published", "wp-sbx"),
        "item_published_privately" => __("Testimonial published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Testimonial reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Testimonial scheduled", "wp-sbx"),
        "item_updated" => __("Testimonial updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Testimonial:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Testimonials", "wp-sbx"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "hierarchical" => true,
        "exclude_from_search" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "show_in_admin_bar" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_namespace" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "menu_position" => null,
        "menu_icon" => "dashicons-format-quote",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "excerpt", "thumbnail"],
        "has_archive" => false,
        "rewrite" => ["slug" => "testimonials", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    register_post_type("testimonials", $args);
}



/**
 * Taxonomy (Tag) 
 */
function taxonomy_tag_testimonials()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Testimonial Tags',
            'singular_name' => 'Testimonial Tag',
        ),
    );

    register_taxonomy('testimonial-tags', 'testimonials', $args);
}
add_action('init', 'taxonomy_tag_testimonials');



/**
 * Taxonomy (Category) 
 */
function taxonomy_category_testimonials()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Testimonial Categories',
            'singular_name' => 'Testimonial Category',
        ),
    );

    register_taxonomy('testimonial-categories', 'testimonials', $args);
}
add_action('init', 'taxonomy_category_testimonials');



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

// add_action('init', 'wp_sbx_register_acf_options_testimonials');

// function wp_sbx_register_acf_options_testimonials()
// {

//     if (function_exists('acf_add_options_page'))
//     {
//         acf_add_options_sub_page(array(
//             'page_title'      => 'Testimonials Archive Page Options',
//             'parent_slug'     => 'edit.php?post_type=testimonials',
//             'capability' => 'manage_options'
//         ));
//     }
// }