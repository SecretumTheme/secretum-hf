<?php
namespace SecretumHF;


/**
 * Activate & Deactivate Requirements
 * 
 * @method activate()   Activate Plugin
 * @method deactivate() Deactivate Plugin
 * 
 * @package Secretum
 * @subpackage SecretumHF
 */
class PluginRegister
{
    /**
     * Activate Plugin
     */
    final public static function activate()
    {
        // Wordpress Version Check
        global $wp_version;

        // Version Check
        if(version_compare($wp_version, SECRETUM_HF_WP_MIN_VERSION, "<")) {
            wp_die(__('Activation Failed: The ' . SECRETUM_HF_PAGE_NAME . ' plugin requires WordPress version ' . SECRETUM_HF_WP_MIN_VERSION . ' or higher. Please Upgrade Wordpress, then try activating this plugin again.', 'secretum-hf'));
        }

        // Flush Rewrite Rules
        add_action('after_switch_theme', 'PluginRegister::deactivate');
    }


    /**
     * Deactivate Plugin
     */
    final public static function deactivate()
    {
        // Clear Plugin Permalinks
        flush_rewrite_rules();
    }
}
