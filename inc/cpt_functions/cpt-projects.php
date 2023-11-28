<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'project' with the 
 * singular name of your custom post type e.g. 'project'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
 */


/**
 * Custom post type (My Custom Post Type Name) 
 */

add_action('init', 'wp_sbx_register_my_cpts_projects');

function wp_sbx_register_my_cpts_projects()
{

    $labels = [
        "name" => __("Projects", "wp-sbx"),
        "singular_name" => __("Project", "wp-sbx"),
        "menu_name" => __("Projects", "wp-sbx"),
        "all_items" => __("All Projects", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Project", "wp-sbx"),
        "edit_item" => __("Edit Project", "wp-sbx"),
        "new_item" => __("New Project", "wp-sbx"),
        "view_item" => __("View Project", "wp-sbx"),
        "view_items" => __("View Projects", "wp-sbx"),
        "search_items" => __("Search Projects", "wp-sbx"),
        "not_found" => __("No Projects found", "wp-sbx"),
        "not_found_in_trash" => __("No Projects found in trash", "wp-sbx"),
        "parent" => __("Parent Project:", "wp-sbx"),
        "featured_image" => __("Featured image for this Project", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Project", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Project", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Project", "wp-sbx"),
        "archives" => __("Projects", "wp-sbx"),
        "insert_into_item" => __("Insert into Project", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Project", "wp-sbx"),
        "filter_items_list" => __("Filter Projects list", "wp-sbx"),
        "items_list_navigation" => __("Projects list navigation", "wp-sbx"),
        "items_list" => __("Projects list", "wp-sbx"),
        "attributes" => __("Projects attributes", "wp-sbx"),
        "name_admin_bar" => __("Project", "wp-sbx"),
        "item_published" => __("Project published", "wp-sbx"),
        "item_published_privately" => __("Project published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Project reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Project scheduled", "wp-sbx"),
        "item_updated" => __("Project updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Project:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Projects", "wp-sbx"),
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
        "menu_icon" => "dashicons-portfolio",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "thumbnail"],
        "has_archive" => true,
        "rewrite" => ["slug" => "projects", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    // $args = []

    register_post_type("projects", $args);
}



/**
 * Taxonomy (Tag) 
 */
add_action('init', 'taxonomy_tag_projects');

function taxonomy_tag_projects()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Project Tags',
            'singular_name' => 'Project Tag',
        ),
    );

    register_taxonomy('project-tags', 'projects', $args);
}



/**
 * Taxonomy (Category) 
 */
add_action('init', 'taxonomy_category_projects');

function taxonomy_category_projects()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Project Categories',
            'singular_name' => 'Project Category',
        ),
    );

    register_taxonomy('project-categories', 'projects', $args);
}



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

add_action('init', 'wp_sbx_register_acf_options_projects');

function wp_sbx_register_acf_options_projects()
{

    if (function_exists('acf_add_options_page'))
    {
        acf_add_options_sub_page(array(
            'page_title'      => 'Projects Archive Page Options',
            'parent_slug'     => 'edit.php?post_type=projects',
            'capability' => 'manage_options'
        ));
    }
}
