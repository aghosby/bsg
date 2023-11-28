<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'career' with the 
 * singular name of your custom post type e.g. 'career'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
*/


/**
 * Custom post type (My Custom Post Type Name) 
*/

add_action('init', 'wp_sbx_register_my_cpts_careers');

function wp_sbx_register_my_cpts_careers()
{

    $labels = [
        "name" => __("Careers", "wp-sbx"),
        "singular_name" => __("Career", "wp-sbx"),
        "menu_name" => __("Careers", "wp-sbx"),
        "all_items" => __("All Careers", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Career", "wp-sbx"),
        "edit_item" => __("Edit Career", "wp-sbx"),
        "new_item" => __("New Career", "wp-sbx"),
        "view_item" => __("View Career", "wp-sbx"),
        "view_items" => __("View Careers", "wp-sbx"),
        "search_items" => __("Search Careers", "wp-sbx"),
        "not_found" => __("No Careers found", "wp-sbx"),
        "not_found_in_trash" => __("No Careers found in trash", "wp-sbx"),
        "parent" => __("Parent Career:", "wp-sbx"),
        "featured_image" => __("Featured image for this Career", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Career", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Career", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Career", "wp-sbx"),
        "archives" => __("Careers", "wp-sbx"),
        "insert_into_item" => __("Insert into Career", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Career", "wp-sbx"),
        "filter_items_list" => __("Filter Careers list", "wp-sbx"),
        "items_list_navigation" => __("Careers list navigation", "wp-sbx"),
        "items_list" => __("Careers list", "wp-sbx"),
        "attributes" => __("Careers attributes", "wp-sbx"),
        "name_admin_bar" => __("Career", "wp-sbx"),
        "item_published" => __("Career published", "wp-sbx"),
        "item_published_privately" => __("Career published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Career reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Career scheduled", "wp-sbx"),
        "item_updated" => __("Career updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Career:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Careers", "wp-sbx"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "hierarchical" => true,
        "exclude_from_search" => false,
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
        "menu_icon" => "dashicons-id",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "thumbnail"],
        "has_archive" => true,
        "rewrite" => ["slug" => "careers", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    // $args = []

    register_post_type("careers", $args);
}



/**
 * Taxonomy (Tag) 
 */
add_action('init', 'taxonomy_tag_careers');

function taxonomy_tag_careers()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Contract Types',
            'singular_name' => 'Contract Type',
        ),
    );

    register_taxonomy('career-tags', 'careers', $args);
}



/**
 * Taxonomy (Category) 
 */
add_action('init', 'taxonomy_category_careers');

function taxonomy_category_careers()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Career Types',
            'singular_name' => 'Career Type',
        ),
    );

    register_taxonomy('career-categories', 'careers', $args);
}



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

add_action('init', 'wp_sbx_register_acf_options_careers');

function wp_sbx_register_acf_options_careers()
{

    if (function_exists('acf_add_options_page'))
    {
        acf_add_options_sub_page(array(
            'page_title'      => 'Careers Archive Page Options',
            'parent_slug'     => 'edit.php?post_type=careers',
            'capability' => 'manage_options'
        ));
    }
}
