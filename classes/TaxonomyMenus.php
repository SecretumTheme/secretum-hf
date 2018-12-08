<?php
namespace SecretumHF;


/**
 * Display Taxonomy Submenu Links Under Appearance Menu
 * 
 * @method init()       Init Admin Menus
 * @method menu()       Add Submenu Links
 * @method instance()   Class Instance
 * 
 * @package Secretum
 * @subpackage SecretumHF
 */
class TaxonomyMenus
{
    // Holds Instance Object
    protected static $instance = NULL;


    /**
     * Init Admin Menus
     */
    final public function init()
    {
        // Load Menus
        $this->menus();

        // Force Menu To Open On Taxonomies
        add_filter('parent_file', function($file) {
            $screen = get_current_screen();

            if ('edit-tags' === $screen->base && ('secretum_headers' === $screen->post_type || 'secretum_footers' === $screen->post_type)) {   
                $file = 'themes.php';
            }

            return $file;
        });
    }


    /**
     * Add Submenu Links
     */
    final private function menus()
    {
        /**
         * - Header groups
         *
         * @param $parent_slug string The slug name for the parent menu
         * @param $page_title string The text to be displayed in the title tags of the page when the menu is selected
         * @param $menu_title string The text to be used for the menu
         * @param $capability string The capability required for this menu to be displayed to the user
         * @param $menu_slug string The slug name to refer to this menu by
         * @param $function string The function to be called to output the content for this page
         */
        add_submenu_page(
            'themes.php',
            '',
            __('Header groups', 'secretum-hf'),
            'manage_options',
            'edit-tags.php?taxonomy=secretumheadersgroup&post_type=secretum_headers'
        );

        /**
         * - Header groups
         *
         * @param $parent_slug string The slug name for the parent menu
         * @param $page_title string The text to be displayed in the title tags of the page when the menu is selected
         * @param $menu_title string The text to be used for the menu
         * @param $capability string The capability required for this menu to be displayed to the user
         * @param $menu_slug string The slug name to refer to this menu by
         * @param $function string The function to be called to output the content for this page
         */
        add_submenu_page(
            'themes.php',
            '',
            __('Footer groups', 'secretum-hf'),
            'manage_options',
            'edit-tags.php?taxonomy=secretumfootersgroup&post_type=secretum_footers'
        );
    }


    /**
     * @about Create Instance
     */
    public static function instance()
    {
        if (! self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }

        return self::$instance;
    }
}
