# Secretum Custom Headers & Footers
* **Plugin Name:** Secretum Custom Headers & Footers
* **Contributors:** SecretumTheme
* **Tags:** post type, post types, custom-post-type, custom post types, taxonomy, taxonomies, custom taxonomy, custom taxonomies
* **Requires at least:** 4.6
* **Tested up to:** 4.8.1
* **Stable tag:** 0.0.1
* **License:** GNU GPLv3
* **License URI:** https://github.com/SecretumTheme/secretum-hf/blob/master/LICENSE

Custom Headers & Footers Manager


## Description

Secretum HF (Headers & Footers) allows developers to provide custom header and footer post types for any adapted theme. This gives website managers complete and total design control over headers and footers, along with the ability to schedule updates or show off different looks for different pages.

Designed for the Classic WordPress Editor, works perfectly with Gutenberg.


## LICENSE

This is a freemium plugin. The Secretum HF plugin is licensed under GNU GPLv3 under all conditions accept when the plugin is packaged and sold with other premium themes/plugins/services. More information coming soon about commercial licenses.

** This plugin can not packaged with themes within the WordPress repo. Add the action hooks below to your theme, then recommend this plugin for download/activation.


## Example Calls

Using the action hook 'secretum_hf' allows developers to easily integrate Secretum HF without having to worry about errors displaying if the plugin is not active.

The action hook 'secretum_hf' accepts two arguments, $type and $args. The string $type is required and accepts either: headers|footers. The array $args is not required, when used it checks for 3 possible keys: orderby (date|rand|name|title|author|ID) slug (taxonomy slug)|post_id. 

The 'orderby' key accepts all allowed WP_Query sortby parameters. Default is 'date' with rand|name|title|ID returning the best expected results. Using 'date' allows for the newest published header/footer to be used.

The 'slug' key accepts a valid taxonomy (group/category) slug, forcing the hook to only return headers/footers registered to that slug.

The 'post_id' slug overrides both the orderby and slug keys. When the 'post_id' slug is only, only that post will be displayed, if the post is published.

```
echo do_action('secretum_hf', string $type, array $args);
```

Examples:

```
echo do_action('secretum_hf', $type, $args);
echo do_action('secretum_hf', 'headers');
echo do_action('secretum_hf', 'headers', array('orderby' => 'rand', 'slug' => 'test-name'));
echo do_action('secretum_hf', 'footers');
echo do_action('secretum_hf', 'footers', array('post_id' => '101'));
```

The example checks to see if a local setting is active, if so it displays a published header, else it displays the default content.

```
if (get_option('some-local-setting-name')) {
	echo do_action('secretum_hf', 'headers');

} else {
	// Do default header stuff
}
```


## Coming Soon

* Finish custom columns
* Shortcodes for posts/taxonomies, logo, nav, widgets?
* Shortcodes as Gutenberg blocks
* Assign headers/footers to posts/pages/post types/taxonomies
* Templates / layouts


## Changelog

= 0.0.1 2018-12-7 =

Alpha Release - Ready For Public Use
