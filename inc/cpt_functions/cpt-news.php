<?php

/**
 *
 * Add a new custom post type and taxonomy here
 * 
 * *********************** HOW TO USE *******************************
 * Use VS Code Find and Replace feature to replace 'news' with the 
 * singular name of your custom post type e.g. 'news'.
 * Please ensure that you select the 'Preserve Case' setting (Alt + P)
 * when doing the find and replace. You may need to manually replace 
 * post type names that don't follow standard English plural/singular 
 * rules e.g. 'news'. 
 *
*/


/**
 * Custom post type (My Custom Post Type Name) 
*/

add_action('init', 'wp_sbx_register_my_cpts_news');

function wp_sbx_register_my_cpts_news()
{

    $labels = [
        "name" => __("News", "wp-sbx"),
        "singular_name" => __("News", "wp-sbx"),
        "menu_name" => __("News", "wp-sbx"),
        "all_items" => __("All News", "wp-sbx"),
        "add_new" => __("Add new", "wp-sbx"),
        "add_new_item" => __("Add new News", "wp-sbx"),
        "edit_item" => __("Edit News", "wp-sbx"),
        "new_item" => __("New News", "wp-sbx"),
        "view_item" => __("View News", "wp-sbx"),
        "view_items" => __("View News", "wp-sbx"),
        "search_items" => __("Search News", "wp-sbx"),
        "not_found" => __("No News found", "wp-sbx"),
        "not_found_in_trash" => __("No News found in trash", "wp-sbx"),
        "parent" => __("Parent News:", "wp-sbx"),
        "featured_image" => __("Featured image for this News", "wp-sbx"),
        "set_featured_image" => __("Set featured image for this News", "wp-sbx"),
        "remove_featured_image" => __("Remove featured image for this News", "wp-sbx"),
        "use_featured_image" => __("Use as featured image for this News", "wp-sbx"),
        "archives" => __("News", "wp-sbx"),
        "insert_into_item" => __("Insert into News", "wp-sbx"),
        "uploaded_to_this_item" => __("Upload to this News", "wp-sbx"),
        "filter_items_list" => __("Filter News list", "wp-sbx"),
        "items_list_navigation" => __("News list navigation", "wp-sbx"),
        "items_list" => __("News list", "wp-sbx"),
        "attributes" => __("News attributes", "wp-sbx"),
        "name_admin_bar" => __("News", "wp-sbx"),
        "item_published" => __("News published", "wp-sbx"),
        "item_published_privately" => __("News published privately.", "wp-sbx"),
        "item_reverted_to_draft" => __("News reverted to draft.", "wp-sbx"),
        "item_scheduled" => __("News scheduled", "wp-sbx"),
        "item_updated" => __("News updated.", "wp-sbx"),
        "parent_item_colon" => __("Parent News:", "wp-sbx"),
    ];

    $args = [
        "label" => __("News", "wp-sbx"),
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
        "rewrite" => ["slug" => "news", "with_front" => true],
        "query_var" => true,
        "can_export" => true,
        "delete_with_user" => false,
        "show_in_graphql" => false,
    ];

    // $args = []

    register_post_type("news", $args);
}



/**
 * Taxonomy (Tag) 
 */
add_action('init', 'taxonomy_tag_news');

function taxonomy_tag_news()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'News Tags',
            'singular_name' => 'News Tag',
        ),
    );

    register_taxonomy('news-tags', 'news', $args);
}



/**
 * Taxonomy (Category) 
*/
add_action('init', 'taxonomy_category_news');

function taxonomy_category_news()
{
    $args = array(
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capabilities' => array('edit_terms' => 'manage_categories'),
        'labels' => array(
            'name' => 'News Categories',
            'singular_name' => 'News Category',
        ),
    );

    register_taxonomy('news-categories', 'news', $args);
}



/**
 * Custom options page for ACF in archive
 * 
 * This adds an ACF options page for the custom post type (CPT).
 * We can use this page as a walk around to set ACF fields
 * in the CPT archive page.
 */

add_action('init', 'wp_sbx_register_acf_options_news');

function wp_sbx_register_acf_options_news()
{

    if (function_exists('acf_add_options_page'))
    {
        acf_add_options_sub_page(array(
            'page_title'      => 'News Archive Page Options',
            'parent_slug'     => 'edit.php?post_type=news',
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

add_filter('gettext', 'wp_sbx_news_excerpt_rename', 10, 2);

function wp_sbx_news_excerpt_rename($translation, $original)
{
    if (get_post_type() == 'news')
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
                return  'Add a news description in the box above';
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
add_action('pre_get_posts', 'wp_sbx_pre_get_news');

function wp_sbx_pre_get_news($query)
{

    if (!is_admin() && $query->is_main_query())
    {
        $query->query_vars['orderby'] = 'name';
        $query->query_vars['order'] = 'ASC';
        $query->query_vars['posts_per_page'] = '18';
    }
}
