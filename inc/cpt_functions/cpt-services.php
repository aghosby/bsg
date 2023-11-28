<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'service' with the 
 * singular name of your custom post type e.g. 'service'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
 */


/**
 * Custom post type (My Custom Post Type Name) 
 */

add_action('init', 'wp_sbx_register_my_cpts_services');

function wp_sbx_register_my_cpts_services()
{

    $labels = [
        "name" => __("Services", "wp-sbx"),
        "singular_name" => __("Service", "wp-sbx"),
        "menu_name" => __("Services", "wp-sbx"),
        "all_items" => __("All Services", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Service", "wp-sbx"),
        "edit_item" => __("Edit Service", "wp-sbx"),
        "new_item" => __("New Service", "wp-sbx"),
        "view_item" => __("View Service", "wp-sbx"),
        "view_items" => __("View Services", "wp-sbx"),
        "search_items" => __("Search Services", "wp-sbx"),
        "not_found" => __("No Services found", "wp-sbx"),
        "not_found_in_trash" => __("No Services found in trash", "wp-sbx"),
        "parent" => __("Parent Service:", "wp-sbx"),
        "featured_image" => __("Featured image for this Service", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Service", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Service", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Service", "wp-sbx"),
        "archives" => __("Services", "wp-sbx"),
        "insert_into_item" => __("Insert into Service", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Service", "wp-sbx"),
        "filter_items_list" => __("Filter Services list", "wp-sbx"),
        "items_list_navigation" => __("Services list navigation", "wp-sbx"),
        "items_list" => __("Services list", "wp-sbx"),
        "attributes" => __("Services attributes", "wp-sbx"),
        "name_admin_bar" => __("Service", "wp-sbx"),
        "item_published" => __("Service published", "wp-sbx"),
        "item_published_privately" => __("Service published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Service reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Service scheduled", "wp-sbx"),
        "item_updated" => __("Service updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Service:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Services", "wp-sbx"),
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
        "menu_icon" => "dashicons-building",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "excerpt", "thumbnail"],
        "has_archive" => true,
        "rewrite" => ["slug" => "services", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    register_post_type("services", $args);
}



/**
 * Taxonomy (Tag) 
 */
function taxonomy_tag_services()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Service Tags',
            'singular_name' => 'Service Tag',
        ),
    );

    register_taxonomy('service-tags', 'services', $args);
}
add_action('init', 'taxonomy_tag_services');



/**
 * Taxonomy (Category) 
 */
function taxonomy_category_services()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Service Categories',
            'singular_name' => 'Service Category',
        ),
    );

    register_taxonomy('service-categories', 'services', $args);
}
add_action('init', 'taxonomy_category_services');




/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

add_action('init', 'wp_sbx_register_acf_options_services');

function wp_sbx_register_acf_options_services()
{

    if (function_exists('acf_add_options_page'))
    {
        acf_add_options_sub_page(array(
            'page_title'      => 'Services Archive Page Options',
            'parent_slug'     => 'edit.php?post_type=services',
            'capability' => 'manage_options'
        ));
    }
}


/**
 * Modify the WP Query
 * 
 * @hook pre_get_posts
 * @hooked wp_sbx_pre_get_services
 * @return void
 * @package SBX_Starter_Theme
 */
add_action('pre_get_posts', 'wp_sbx_pre_get_services');

function wp_sbx_pre_get_services($query)
{

    if (!is_admin() && $query->is_main_query())
    {
        $query->query_vars['orderby'] = 'name';
        $query->query_vars['order'] = 'ASC';
        $query->query_vars['posts_per_page'] = '-1';
    }
}
