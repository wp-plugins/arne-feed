<?php
/*
Plugin Name: Arne Feed
Plugin URI: http://arneweb.ir
Description: Show Last posts of <a target=_blank" href="http://Arneweb.ir">Arneweb.ir</a> in your dashboard.
Author: Alireza Nejati
Version: 1.2
Tags: feed, Arneweb, Arneweb feed, wordpress
Author URI: http://alirezanejati.ir
License: GPL
*/
// Add Arneweb.ir feed //
function wp_admin_dashboard_add_news_feed_widget() {
global $wp_meta_boxes;
wp_add_dashboard_widget( 'dashboard_Arne_feed', __("Arneweb Feed", "Arne"), 'dashboard_Arne_feed_output' );
}
add_action('wp_dashboard_setup', 'wp_admin_dashboard_add_news_feed_widget');
function dashboard_Arne_feed_output() {
echo '<div class="Arnefeed">';
wp_widget_rss_output(array(
'url' => 'http://azar3eo.ir/feed',
'title' => __('Show Last posts of Arneweb in your dashboard', 'Arne'),
'items' => 1,
'show_summary' => 1,
'show_author' => 1,
'show_date' => 1
));
wp_widget_rss_output(array(
'url' => 'http://forum.arneweb.ir/feed',
'title' => __('Show Last posts of Arneweb in your dashboard', 'Arne'),
'items' => 1,
'show_summary' => 1,
'show_author' => 1,
'show_date' => 1
));
echo "</div>";
}
// End //
function Arne_action_init() {
load_plugin_textdomain('Arne', false, dirname(plugin_basename(__FILE__) ) . '/lang/' );
}
add_action('init', 'Arne_action_init');
// start //
/** Step 2 (from text above). */
add_action( 'admin_menu', 'Arne_Feed_menu' );

/** Step 1. */
function Arne_Feed_menu() {
	add_options_page( 'Arne Feed Options', 'Arne Feed', 'manage_options', 'my-unique-identifier', 'Arne_Feed_options' );
}

/** Step 3. */
function Arne_Feed_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'Arne' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Upgrading ...</p>';
	echo '</div>';
}
?>