<?php
namespace SecretumHF;


/**
 * Register Custom Taxonomies
 * 
 * @method init() Register Taxonomies
 * 
 * @package Secretum
 * @subpackage SecretumHF
 */
class Taxonomies
{
    /**
     * Register Taxonomies
     */
    final public static function init()
    {
        // Header Groups
        register_taxonomy('secretumheadersgroup', 'secretum_headers', apply_filters('secretum_headers_group_taxonomy_array', array(
            'public'            => true,
            'show_in_nav_menus' => true,
            'query_var'         => false,
            'show_ui'           => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'secretumheadersgroup', 'with_front' => false),
            'labels'            => array(
                'name'              => _x('Header Groups', 'taxonomy general name', 'secretum-hf'),
                'singular_name'     => _x('Header Group', 'taxonomy singular name', 'secretum-hf'),
                'new_item_name'     => __('New Header Group', 'secretum-hf'),
                'edit_item'         => __('Edit Header Groups', 'secretum-hf'),
                'update_item'       => __('Update Header Groups', 'secretum-hf'),
                'add_new_item'      => __('Add New Header Group', 'secretum-hf'),
                'search_items'      => __('Search Header Groups', 'secretum-hf'),
                'all_items'         => __('All Header Groups', 'secretum-hf'),
                'parent_item'       => __('Parent Header Groups', 'secretum-hf'),
                'parent_item_colon' => __('Parent Header Groups:', 'secretum-hf'),
                'not_found'         => __('No Header Groups Found', 'secretum-hf'),
            )
        ), 10, 1));

        // Footer Groups
        register_taxonomy('secretumfootersgroup', 'secretum_footers', apply_filters('secretum_footers_group_taxonomy_array', array(
            'public'            => true,
            'show_in_nav_menus' => true,
            'query_var'         => false,
            'show_ui'           => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'secretumfootersgroup', 'with_front' => false),
            'labels'            => array(
                'name'              => _x('Footer Groups', 'taxonomy general name', 'secretum-hf'),
                'singular_name'     => _x('Footer Group', 'taxonomy singular name', 'secretum-hf'),
                'new_item_name'     => __('New Footer Group', 'secretum-hf'),
                'edit_item'         => __('Edit Footer Groups', 'secretum-hf'),
                'update_item'       => __('Update Footer Groups', 'secretum-hf'),
                'add_new_item'      => __('Add New Footer Group', 'secretum-hf'),
                'search_items'      => __('Search Footer Groups', 'secretum-hf'),
                'all_items'         => __('All Footer Groups', 'secretum-hf'),
                'parent_item'       => __('Parent Footer Groups', 'secretum-hf'),
                'parent_item_colon' => __('Parent Footer Groups:', 'secretum-hf'),
                'not_found'         => __('No Footer Groups Found', 'secretum-hf'),
            )
        ), 10, 1));
    }
}
