<?php
/**
 * Plugin Functions
 *
 * @package Secretum
 * @subpackage SecretumHF
 */


namespace SecretumHF\Functions {
	/**
	 * Display Custom Header Posttype Content
	 *
	 * @example echo do_action('secretum_hf', 'headers');
	 * @example echo do_action('secretum_hf', 'headers', array('orderby' => 'rand', 'slug' => 'test-name'));
	 * @example echo do_action('secretum_hf', 'footers');
	 * @example echo do_action('secretum_hf', 'footers', array('post_id' => '101'));
	 *
	 * @param string $type headers|footers
	 * @param array $args orderby|slug|post_id
	 * @return html Filtered Content
	 */
	function display($type = '', $args = array()) {
		$type = !empty($type) ? sanitize_key($type) : '';

		// Do Display
        if (!empty($type) && post_type_exists('secretum_' . $type)) {
			// Build Vars From Args
			$orderby = isset($args['orderby']) ? sanitize_key($args['orderby']) : 'date';
			$slug = isset($args['slug']) ? sanitize_key($args['slug']) : '';
			$post_id = isset($args['post_id']) ? absint($args['post_id']) : '';

        	// Build Query Array
        	$wp_query = array_merge(
        		// Args
				array(
	                'post_type'      => 'secretum_' . $type,
	                'post_status'    => 'publish',
	                'order'          => 'DESC',
	                'orderby'        => $orderby,
	                'posts_per_page' => 1,
	            ),
	            (!empty($post_id)) ? array('p' => $post_id) : array(),
	            (!empty($slug)) ? array('tax_query' => array(array('taxonomy' => 'secretum' . $type . 'group', 'field' => 'slug', 'terms' => sanitize_key($slug)))) : array()
        	);

            // Build Custom Header Query
            $query = new \WP_Query($wp_query);

            // If Query
            if ($query->have_posts()) {
                // Display Custom Header
                while ($query->have_posts()) {
                    $query->the_post();

                    // Return Content
                    echo do_shortcode(get_the_content(NULL, false));
                }

                // Clear Post Data
                wp_reset_postdata();
            }
        }
	}
}
