<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'client' with the 
 * singular name of your custom post type e.g. 'client'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
 */


/**
 * Custom post type (My Custom Post Type Name) 
 */

add_action('init', 'wp_sbx_register_my_cpts_clients');

function wp_sbx_register_my_cpts_clients()
{

    $labels = [
        "name" => __("Clients", "wp-sbx"),
        "singular_name" => __("Client", "wp-sbx"),
        "menu_name" => __("Clients", "wp-sbx"),
        "all_items" => __("All Clients", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Client", "wp-sbx"),
        "edit_item" => __("Edit Client", "wp-sbx"),
        "new_item" => __("New Client", "wp-sbx"),
        "view_item" => __("View Client", "wp-sbx"),
        "view_items" => __("View Clients", "wp-sbx"),
        "search_items" => __("Search Clients", "wp-sbx"),
        "not_found" => __("No Clients found", "wp-sbx"),
        "not_found_in_trash" => __("No Clients found in trash", "wp-sbx"),
        "parent" => __("Parent Client:", "wp-sbx"),
        "featured_image" => __("Featured image for this Client", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Client", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Client", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Client", "wp-sbx"),
        "archives" => __("Clients", "wp-sbx"),
        "insert_into_item" => __("Insert into Client", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Client", "wp-sbx"),
        "filter_items_list" => __("Filter Clients list", "wp-sbx"),
        "items_list_navigation" => __("Clients list navigation", "wp-sbx"),
        "items_list" => __("Clients list", "wp-sbx"),
        "attributes" => __("Clients attributes", "wp-sbx"),
        "name_admin_bar" => __("Client", "wp-sbx"),
        "item_published" => __("Client published", "wp-sbx"),
        "item_published_privately" => __("Client published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Client reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Client scheduled", "wp-sbx"),
        "item_updated" => __("Client updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Client:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Clients", "wp-sbx"),
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
        "menu_icon" => "dashicons-businessman",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "excerpt", "thumbnail"],
        "has_archive" => false,
        "rewrite" => ["slug" => "clients", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    register_post_type("clients", $args);
}



/**
 * Taxonomy (Tag) 
 */
function taxonomy_tag_clients()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Client Tags',
            'singular_name' => 'Client Tag',
        ),
    );

    register_taxonomy('client-tags', 'clients', $args);
}
add_action('init', 'taxonomy_tag_clients');



/**
 * Taxonomy (Category) 
 */
function taxonomy_category_clients()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Client Categories',
            'singular_name' => 'Client Category',
        ),
    );

    register_taxonomy('client-categories', 'clients', $args);
}
add_action('init', 'taxonomy_category_clients');



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

// add_action('init', 'wp_sbx_register_acf_options_clients');

// function wp_sbx_register_acf_options_clients()
// {

//     if (function_exists('acf_add_options_page'))
//     {
//         acf_add_options_sub_page(array(
//             'page_title'      => 'Clients Archive Page Options',
//             'parent_slug'     => 'edit.php?post_type=clients',
//             'capability' => 'manage_options'
//         ));
//     }
// }