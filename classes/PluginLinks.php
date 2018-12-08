<?php
namespace SecretumHF;


/**
 * Inject Links Into Plugin Admin
 * 
 * @method add() Add Links
 * 
 * @package Secretum
 * @subpackage SecretumHF
 */
class PluginLinks
{
    /**
     * Add Links
     *
     * @param array $links Default links for this plugin
     * @param string $file The name of the plugin being displayed
     * @return array $links The links to inject
     */
    final public static function add($links, $file)
    {
        // Get Current URL
        $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);

        // Only this plugin and on plugins.php page
        if ($file == SECRETUM_HF_PLUGIN_BASE && strpos($request_uri, "plugins.php") !== false) {
            // Links To Inject
            $links[] = '<a href="https://github.com/SecretumTheme/secretum-hf/issues" target="_blank">'. __('Report Issues', 'secretum-hf') .'</a>';
        }

        return $links;
    }
}
