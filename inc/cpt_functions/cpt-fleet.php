<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'fleet' with the 
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

add_action('init', 'wp_sbx_register_my_cpts_fleet');

function wp_sbx_register_my_cpts_fleet()
{

    $labels = [
        "name" => __("Fleet", "wp-sbx"),
        "singular_name" => __("Vessel", "wp-sbx"),
        "menu_name" => __("Fleet", "wp-sbx"),
        "all_items" => __("All Vessels", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Vessel", "wp-sbx"),
        "edit_item" => __("Edit Vessel", "wp-sbx"),
        "new_item" => __("New Vessel", "wp-sbx"),
        "view_item" => __("View Vessel", "wp-sbx"),
        "view_items" => __("View Vessels", "wp-sbx"),
        "search_items" => __("Search Fleet", "wp-sbx"),
        "not_found" => __("No Vessels found", "wp-sbx"),
        "not_found_in_trash" => __("No Vessels found in trash", "wp-sbx"),
        "parent" => __("Parent Vessel:", "wp-sbx"),
        "featured_image" => __("Featured image for this Vessel", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Vessel", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Vessel", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Vessel", "wp-sbx"),
        "archives" => __("Fleet", "wp-sbx"),
        "insert_into_item" => __("Insert into Vessel", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Vessel", "wp-sbx"),
        "filter_items_list" => __("Filter Fleet list", "wp-sbx"),
        "items_list_navigation" => __("Fleet list navigation", "wp-sbx"),
        "items_list" => __("Fleet list", "wp-sbx"),
        "attributes" => __("Fleet attributes", "wp-sbx"),
        "name_admin_bar" => __("Vessel", "wp-sbx"),
        "item_published" => __("Vessel published", "wp-sbx"),
        "item_published_privately" => __("Vessel published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Vessel reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Vessel scheduled", "wp-sbx"),
        "item_updated" => __("Vessel updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Vessel:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Fleet", "wp-sbx"),
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
        "menu_icon" => "dashicons-shield-alt",
        "capability_type" => "post",
        "capabilities" => [],
        "map_meta_cap" => true,
        "supports" => ["title", "editor", "author", "excerpt", "thumbnail"],
        "has_archive" => true,
        "rewrite" => ["slug" => "fleet", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    register_post_type("fleet", $args);
}



/**
 * Taxonomy (Tag) 
 */
function taxonomy_tag_fleet()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Fleet Tags',
            'singular_name' => 'Fleet Tag',
        ),
    );

    register_taxonomy('fleet-tags', 'fleet', $args);
}
add_action('init', 'taxonomy_tag_fleet');



/**
 * Taxonomy (Category) 
 */
function taxonomy_category_fleet()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Fleet Categories',
            'singular_name' => 'Fleet Category',
        ),
    );

    register_taxonomy('fleet-categories', 'fleet', $args);
}
add_action('init', 'taxonomy_category_fleet');




/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

add_action('init', 'wp_sbx_register_acf_options_fleet');

function wp_sbx_register_acf_options_fleet()
{

    if (function_exists('acf_add_options_page'))
    {
        acf_add_options_sub_page(array(
            'page_title'      => 'Fleet Archive Page Options',
            'parent_slug'     => 'edit.php?post_type=fleet',
            'capability' => 'manage_options'
        ));
    }
}




/**
 *  Custom label for excerpt
 * 
 * @hook gettext
 * @hooked wp_sbx_fleet_excerpt_rename
 * @return string
 * @package SBX_Starter_Theme
*/

add_filter('gettext', 'wp_sbx_fleet_excerpt_rename', 10, 2);

function wp_sbx_fleet_excerpt_rename($translation, $original)
{
    if (get_post_type() == 'fleet')
    {
        if ('Excerpt' == $original)
        {
            return 'Description';
        }
        else
        {
            $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
            if ($pos !== false)
            {
                return  'Add a vessel description in the box above';
            }
        }
    }

    return $translation;
}


/**
 * Modify the WP Query
 * 
 * @hook pre_get_posts
 * @hooked wp_sbx_pre_get_fleet
 * @return void
 * @package SBX_Starter_Theme
 */
add_action('pre_get_posts', 'wp_sbx_pre_get_fleet');

function wp_sbx_pre_get_fleet($query)
{

    if (!is_admin() && $query->is_main_query())
    {
        $query->query_vars['orderby'] = 'name';
        $query->query_vars['order'] = 'ASC';
        $query->query_vars['posts_per_page'] = '18';
    }
}
