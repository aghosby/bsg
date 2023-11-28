<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'location' with the 
 * singular name of your custom post type e.g. 'location'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
 */


/**
 * Custom post type (My Custom Post Type Name) 
 */

add_action('init', 'wp_sbx_register_my_cpts_locations');

function wp_sbx_register_my_cpts_locations()
{

    $labels = [
        "name" => __("Locations", "wp-sbx"),
        "singular_name" => __("Location", "wp-sbx"),
        "menu_name" => __("Locations", "wp-sbx"),
        "all_items" => __("All Locations", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Location", "wp-sbx"),
        "edit_item" => __("Edit Location", "wp-sbx"),
        "new_item" => __("New Location", "wp-sbx"),
        "view_item" => __("View Location", "wp-sbx"),
        "view_items" => __("View Locations", "wp-sbx"),
        "search_items" => __("Search Locations", "wp-sbx"),
        "not_found" => __("No Locations found", "wp-sbx"),
        "not_found_in_trash" => __("No Locations found in trash", "wp-sbx"),
        "parent" => __("Parent Location:", "wp-sbx"),
        "featured_image" => __("Featured image for this Location", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Location", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Location", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Location", "wp-sbx"),
        "archives" => __("Locations", "wp-sbx"),
        "insert_into_item" => __("Insert into Location", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Location", "wp-sbx"),
        "filter_items_list" => __("Filter Locations list", "wp-sbx"),
        "items_list_navigation" => __("Locations list navigation", "wp-sbx"),
        "items_list" => __("Locations list", "wp-sbx"),
        "attributes" => __("Locations attributes", "wp-sbx"),
        "name_admin_bar" => __("Location", "wp-sbx"),
        "item_published" => __("Location published", "wp-sbx"),
        "item_published_privately" => __("Location published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Location reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Location scheduled", "wp-sbx"),
        "item_updated" => __("Location updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Location:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Locations", "wp-sbx"),
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
        "menu_icon" => "dashicons-location",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "excerpt", "thumbnail"],
        "has_archive" => false,
        "rewrite" => ["slug" => "locations", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    register_post_type("locations", $args);
}



/**
 * Taxonomy (Tag) 
 */
function taxonomy_tag_locations()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Location Tags',
            'singular_name' => 'Location Tag',
        ),
    );

    register_taxonomy('location-tags', 'locations', $args);
}
add_action('init', 'taxonomy_tag_locations');



/**
 * Taxonomy (Category) 
 */
function taxonomy_category_locations()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Location Categories',
            'singular_name' => 'Location Category',
        ),
    );

    register_taxonomy('location-categories', 'locations', $args);
}
add_action('init', 'taxonomy_category_locations');



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

// add_action('init', 'wp_sbx_register_acf_options_locations');

// function wp_sbx_register_acf_options_locations()
// {

//     if (function_exists('acf_add_options_page'))
//     {
//         acf_add_options_sub_page(array(
//             'page_title'      => 'Locations Archive Page Options',
//             'parent_slug'     => 'edit.php?post_type=locations',
//             'capability' => 'manage_options'
//         ));
//     }
// }