<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'workshop' with the 
 * singular name of your custom post type e.g. 'workshop'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
*/


/**
 * Custom post type (My Custom Post Type Name) 
*/

add_action('init', 'wp_sbx_register_my_cpts_workshops');

function wp_sbx_register_my_cpts_workshops()
{

    $labels = [
        "name" => __("Workshops", "wp-sbx"),
        "singular_name" => __("Workshop", "wp-sbx"),
        "menu_name" => __("Workshops", "wp-sbx"),
        "all_items" => __("All Workshops", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new Workshop", "wp-sbx"),
        "edit_item" => __("Edit Workshop", "wp-sbx"),
        "new_item" => __("New Workshop", "wp-sbx"),
        "view_item" => __("View Workshop", "wp-sbx"),
        "view_items" => __("View Workshops", "wp-sbx"),
        "search_items" => __("Search Workshops", "wp-sbx"),
        "not_found" => __("No Workshops found", "wp-sbx"),
        "not_found_in_trash" => __("No Workshops found in trash", "wp-sbx"),
        "parent" => __("Parent Workshop:", "wp-sbx"),
        "featured_image" => __("Featured image for this Workshop", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this Workshop", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this Workshop", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this Workshop", "wp-sbx"),
        "archives" => __("Workshops", "wp-sbx"),
        "insert_into_item" => __("Insert into Workshop", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this Workshop", "wp-sbx"),
        "filter_items_list" => __("Filter Workshops list", "wp-sbx"),
        "items_list_navigation" => __("Workshops list navigation", "wp-sbx"),
        "items_list" => __("Workshops list", "wp-sbx"),
        "attributes" => __("Workshops attributes", "wp-sbx"),
        "name_admin_bar" => __("Workshop", "wp-sbx"),
        "item_published" => __("Workshop published", "wp-sbx"),
        "item_published_privately" => __("Workshop published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("Workshop reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("Workshop scheduled", "wp-sbx"),
        "item_updated" => __("Workshop updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent Workshop:", "wp-sbx"),
    ];

    $args = [
        "label" => __("Workshops", "wp-sbx"),
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
        "rewrite" => ["slug" => "workshops", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    // $args = []

    register_post_type("workshops", $args);
}



/**
 * Taxonomy (Tag) 
 */
add_action('init', 'taxonomy_tag_workshops');

function taxonomy_tag_workshops()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Workshop Tags',
            'singular_name' => 'Workshop Tag',
        ),
    );

    register_taxonomy('workshop-tags', 'workshops', $args);
}



/**
 * Taxonomy (Category) 
*/
add_action('init', 'taxonomy_category_workshops');

function taxonomy_category_workshops()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'Workshops Categories',
            'singular_name' => 'Workshop Category',
        ),
    );

    register_taxonomy('workshop-categories', 'workshops', $args);
}



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

add_action('init', 'wp_sbx_register_acf_options_workshops');

function wp_sbx_register_acf_options_workshops()
{

    if (function_exists('acf_add_options_page'))
    {
        acf_add_options_sub_page(array(
            'page_title'      => 'Workshops Archive Page Options',
            'parent_slug'     => 'edit.php?post_type=workshops',
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

add_filter('gettext', 'wp_sbx_workshops_excerpt_rename', 10, 2);

function wp_sbx_workshops_excerpt_rename($translation, $original)
{
    if (get_post_type() == 'workshops')
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
                return  'Add an workshop description in the box above';
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
add_action('pre_get_posts', 'wp_sbx_pre_get_workshops');

function wp_sbx_pre_get_workshops($query)
{

    if (!is_admin() && $query->is_main_query())
    {
        $query->query_vars['orderby'] = 'name';
        $query->query_vars['order'] = 'ASC';
        $query->query_vars['posts_per_page'] = '18';
    }
}
