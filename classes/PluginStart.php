<?php
namespace SecretumHF;


/**
 * Start SecretumHF Plugin
 * 
 * @method init()       Init Plugin
 * @method instance()   Class Instance
 * 
 * @package Secretum
 * @subpackage SecretumHF
 */
class PluginStart
{
    // Holds Instance Object
    protected static $instance = NULL;


    /**
     * Initiate Plugin
     */
    final public function init()
    {
        // Register Post Types
        add_action('init', array('\SecretumHF\Posttypes', 'init'));

        // Register Taxonomies
        add_action('init', array('\SecretumHF\Taxonomies', 'init'));

        // Register Display Headers/Footers Action
        // @see secretum-hf/functions.php
        add_action('secretum_hf', 'display', 10, 2);

        if (is_admin()) {
            // Inject Plugin Links
            add_filter('plugin_row_meta', array('\SecretumHF\PluginLinks', 'add'), 10, 2);

            // Display Taxonomy Submenu Links Under Appearance Menu
            add_action('admin_menu', array('\SecretumHF\TaxonomyMenus', 'instance'));

            // Add Post Type Column Names
            add_filter('manage_secretum_headers_posts_columns', array('\SecretumHF\PosttypeColumns', 'setColumns'));
            add_filter('manage_secretum_footers_posts_columns', array('\SecretumHF\PosttypeColumns', 'setColumns'));

            // Add Post Type Column Content
            add_action('manage_secretum_headers_posts_custom_column' , array('\SecretumHF\PosttypeColumns','headerColumnContent'), 10, 2);
            add_action('manage_secretum_footers_posts_custom_column' , array('\SecretumHF\PosttypeColumns','footerColumnContent'), 10, 2);
        }
    }


    /**
    * Create Instance
    */
    final public static function instance()
    {
        if (! self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }

        return self::$instance;
    }
}
