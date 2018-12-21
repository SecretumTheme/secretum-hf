<?php
namespace SecretumHF;

/**
 * Plugin Name: Secretum Custom Headers & Footers
 * Plugin URI: https://github.com/SecretumTheme/secretum-hf
 * Description: Secretum HF (Headers & Footers) allows developers to provide custom header and footer post types for any adapted theme.
 * Version: 0.0.2
 * License: GNU GPLv3
 * Copyright (c) 2018 Secretum Theme
 * Author: Secretum Theme
 * Author URI: https://github.com/SecretumTheme
 * Text Domain: secretum-hf
 *
 * @package Secretum
 * @subpackage SecretumHF
 */


// Constants
define('SECRETUM_HF',                   '0.0.2');
define('SECRETUM_HF_WP_MIN_VERSION',    '3.8');
define('SECRETUM_HF_PLUGIN_FILE',       __FILE__);
define('SECRETUM_HF_PLUGIN_DIR',        dirname(SECRETUM_HF_PLUGIN_FILE));
define('SECRETUM_HF_PLUGIN_BASE',       plugin_basename(SECRETUM_HF_PLUGIN_FILE));


// Activate Plugin
register_activation_hook(SECRETUM_HF_PLUGIN_FILE, array('\SecretumHF\PluginRegister', 'activate'));

// Deactivate Plugin
register_deactivation_hook(SECRETUM_HF_PLUGIN_FILE, array('\SecretumHF\PluginRegister', 'deactivate'));


/**
 * Register Classes
 *
 * @param string $class Fully-qualified class name
 * @return void
 */
spl_autoload_register(function ($class) {
    // Namespace Prefix
    $prefix = 'SecretumHF\\';

    // Base Dir For Namespace Prefix
    $base_dir = __DIR__ . '/classes/';

    // Move To Next Rgistered autoloader
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Build Class Name
    $relative_class = substr($class, $len);

    // Replace Dir Separators & Replace Namespace with Base Dir
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Include File
    if (file_exists($file)) {
        require $file;
    }
});

// Include Functions
require SECRETUM_HF_PLUGIN_DIR . '/functions.php';

// Run Plugin
add_action('after_setup_theme', array('\SecretumHF\PluginStart', 'instance'), 0);

// Secretum Updater Plugin
if (file_exists(WP_PLUGIN_DIR . '/secretum-updater/puc/plugin-update-checker.php')) {
    include_once(WP_PLUGIN_DIR . '/secretum-updater/puc/plugin-update-checker.php');
    $secretum_hf_updater = \Puc_v4_Factory::buildUpdateChecker(
        'https://raw.githubusercontent.com/SecretumTheme/secretum-hf/master/updates.json',
        SECRETUM_HF_PLUGIN_FILE,
        'secretum-hf'
    );
}
