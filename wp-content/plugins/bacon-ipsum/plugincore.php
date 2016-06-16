<?php
/**
 * @package   Bacon_Ipsum
 * @author    Chris McCoy <chris@lod.com>
 * @license   GPL-2.0+
 * @link      http://github.com/chrismccoy
 * @copyright 2014 Chris McCoy
 *
 * @wordpress-plugin
 * Plugin Name: Bacon Ipsum
 * Plugin URI:  http://github.com/chrismccoy/bacon-ipsum
 * Description: Bacon Ipsum Generator
 * Version:     2.3
 * Author:      Chris McCoy
 * Author URI:  http://github.com/chrismccoy
 * Text Domain: bacon-ipsum
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-bacon-ipsum.php' );

require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-bacon_ipsum_widget.php' );

// Register hooks that are fired when the plugin is activated or deactivated.
// When the plugin is deleted, the uninstall.php file is loaded.
register_activation_hook( __FILE__, array( 'Bacon_Ipsum', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Bacon_Ipsum', 'deactivate' ) );

// Load instance
add_action( 'plugins_loaded', array( 'Bacon_Ipsum', 'get_instance' ) );
//Bacon_Ipsum::get_instance();
?>
