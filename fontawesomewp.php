<?php
/**
 * Plugin Name: Font Awesome for WordPress
 * Plugin URI: http://mediabox.lv/#utm_source=wordpress&utm_medium=plugin&utm_campaign=draugiemsaypoga_widget&utm_content=v01
 * Description: WordPress spraudnis "Draugiem.lv/say" pogas pievienošana satura apakšā ar integrētu bit.ly saišu saīsināšanu
 * Version: 1.0.0
 * Requires at least: 2.6
 * Author: Rolands Umbrovskis
 * Author URI: http://umbrovskis.com
 * License: GPL
 */

/**
 * Add function to widgets_init that will load meblog fontawesomewp.
 * @since 1.0.0
 */
// add_action( 'widgets_init', 'meblogfrypepage_load_widgets' );

define('FAMWPV','1.0.0'); // version @since 1.0.0
define('FAMWPF','fontawesomewp'); // folder @since 1.0.0
define('FAMWPL',dirname(__FILE__)); // location @since 1.0.0
define('FAMWPCSS',plugins_url(FAMWPF).'/css'); // CSS location @since 1.0.0
define('FAMWPFONTF',plugins_url(FAMWPF).'/font'); // font location @since 1.0.0

/**
* Loading language files
* @version 1.0.0
* @since 1.0.0
*/

load_plugin_textdomain( 'fontawesomewp', false, dirname(plugin_basename(__FILE__)) . '/lang/' ); 


/**
* Meta info for Plugin list page
* @version 1.0.0
* @todo Plugin page http://mediabox.lv/ OR http://simplemediacode.com , Support Forum
*/
function fontawesomewp_set_plugin_meta($links, $file) {
	$plugin = plugin_basename(__FILE__);
	if ($file == $plugin) {
		return array_merge( $links, array( 
			'<a href="http://umbrovskis.com/ziedo/">' . __('Donate','fontawesomewp') . '</a>'
		));
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'fontawesomewp_set_plugin_meta', 10, 2 );


function fontawesomewp_init() {
	if( !is_admin()){
		global $wp_styles;
		// STYLES
		wp_register_style('font-awesome', FAMWPCSS.'/font-awesome.css', array(), '2.0', 'all');
		wp_enqueue_style('font-awesome');
		wp_register_style('font-awesome-social', FAMWPCSS.'/font-awesome-social.css', array('font-awesome'), '2.0', 'all');
		wp_enqueue_style('font-awesome-social');
		wp_register_style('font-awesome-corp', FAMWPCSS.'/font-awesome-corp.css', array('font-awesome'), '2.0', 'all');
		wp_enqueue_style('font-awesome-corp');
		wp_register_style('font-awesome-ext', FAMWPCSS.'/font-awesome-ext.css', array('font-awesome'), '2.0', 'all');
		wp_enqueue_style('font-awesome-ext');

		wp_register_style('font-awesome-ie7', FAMWPCSS.'/font-awesome-ie7.min.css', array('font-awesome'), '2.0', 'all');
		wp_enqueue_style('font-awesome-ie7');
			$wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'IE 7' );
			
		wp_register_style('font-awesome-more-ie7', FAMWPCSS.'/font-awesome-more-ie7.min.css', array('font-awesome'), '2.0', 'all');
		wp_enqueue_style('font-awesome-more-ie7');
			$wp_styles->add_data( 'font-awesome-more-ie7', 'conditional', 'IE 7' );

	}

}    

add_action('init', 'fontawesomewp_init');

