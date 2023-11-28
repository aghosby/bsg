<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'compliance' with the 
 * singular name of your custom post type e.g. 'compliance'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
 */


/**
 * Custom post type (My Custom Post Type Name) 
 */

add_action('init', 'wp_sbx_register_my_cpts_compliances');

function wp_sbx_register_my_cpts_compliances()
{

    $labels = [
        "name" => __("Compliance", "wp-sbx"),
        "singular_name" => __("Compliance", "wp-sbx"),
        "menu_name" => __("Compliance", "wp-sbx"),
        "all_items" => __("All Compliances", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Compliance", "wp-sbx"),
        "edit_item" => __("Edit Compliance", "wp-sbx"),
        "new_item" => __("New Compliance", "wp-sbx"),
        "view_item" => __("View Compliance", "wp-sbx"),
        "view_items" => __("View all Compliances", "wp-sbx"),
        "search_items" => __("Search all Compliances", "wp-sbx"),
        "not_found" => __("No Compliance found", "wp-sbx"),
        "not_found_in_trash" => __("No Compliance found in trash", "wp-sbx"),
        "parent" => __("Parent Compliance:", "wp-sbx"),
        "featured_image" => __("Featured image for this Compliance", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Compliance", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Compliance", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Compliance", "wp-sbx"),
        "archives" => __("Compliance", "wp-sbx"),
        "insert_into_item" => __("Insert into Compliance", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Compliance", "wp-sbx"),
        "filter_items_list" => __("Filter Compliance list", "wp-sbx"),
        "items_list_navigation" => __("Compliances list navigation", "wp-sbx"),
        "items_list" => __("Compliances list", "wp-sbx"),
        "attributes" => __("Compliances attributes", "wp-sbx"),
        "name_admin_bar" => __("Compliance", "wp-sbx"),
        "item_published" => __("Compliance published", "wp-sbx"),
        "item_published_privately" => __("Compliance published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Compliance reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Compliance scheduled", "wp-sbx"),
        "item_updated" => __("Compliance updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Compliance:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Compliance", "wp-sbx"),
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
        "menu_icon" => "dashicons-format-aside",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "excerpt", "thumbnail"],
        "has_archive" => true,
        "rewrite" => ["slug" => "compliance", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    register_post_type("compliances", $args);
}



/**
 * Taxonomy (Tag) 
 */
function taxonomy_tag_compliances()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Compliance Tags',
            'singular_name' => 'Compliance Tag',
        ),
    );

    register_taxonomy('compliance-tags', 'compliances', $args);
}
add_action('init', 'taxonomy_tag_compliances');



/**
 * Taxonomy (Category) 
 */
function taxonomy_category_compliances()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Compliance Categories',
            'singular_name' => 'Compliance Category',
        ),
    );

    register_taxonomy('compliance-categories', 'compliances', $args);
}
add_action('init', 'taxonomy_category_compliances');



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
*/

add_action('init', 'wp_sbx_register_acf_options_compliances');

function wp_sbx_register_acf_options_compliances()
{

    if (function_exists('acf_add_options_page'))
    {
        acf_add_options_sub_page(array(
            'page_title'      => 'Compliances Archive Page Options',
            'parent_slug'     => 'edit.php?post_type=compliances',
            'capability' => 'manage_options'
        ));
    }
}



/**
 * Modify the WP Query
 * 
 * @hook pre_get_posts
 * @hooked wp_sbx_pre_get_compliances
 * @return void
 * @package SBX_Starter_Theme
*/
add_action('pre_get_posts', 'wp_sbx_pre_get_compliances');

function wp_sbx_pre_get_compliances($query)
{

    if (!is_admin() && $query->is_main_query())
    {
        $query->query_vars['orderby'] = 'name';
        $query->query_vars['order'] = 'ASC';
        $query->query_vars['posts_per_page'] = '12';
    }
}
