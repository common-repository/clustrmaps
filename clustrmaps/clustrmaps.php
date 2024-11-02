<?php
/*
Plugin Name: Clustr Maps
Plugin URI: http://wordpress.org/extend/plugins/ClustrMaps/
Description: Enables <a href="http://www.clustrmaps.com">www.clustrmaps.com</a> on all pages.
Version: 0.2
Author: Marco Ratto
Author URI: http://marcoratto.co.uk/blog
*/

function activate_clustrmaps() {
  add_option('userid', '');
  add_option('site', '');
}

function deactivate_clustrmaps() {
  delete_option('userid');
  delete_option('site');
}

function admin_init_clustrmaps() {
  register_setting('clustrmaps', 'userid');
  register_setting('clustrmaps', 'site');
}

function admin_menu_clustrmaps() {
  add_options_page('Clustr Maps', 'Clustr Maps', 8, 'clustrmaps', 'options_page_clustrmaps');
}

function options_page_clustrmaps() {
  include(WP_PLUGIN_DIR . '/clustrmaps/options.php');  
}

function enable_clustrmaps($userid, $site) {
?>
<a href="http://www4.clustrmaps.com/user/<?php echo $userid; ?>"><img src="http://www4.clustrmaps.com/stats/maps-no_clusters/<?php echo $site; ?>-thumb.jpg" alt="Locations of visitors to this page" />
</a>
<?php
}

function clustrmaps() { 
  
  $userid = get_option('userid');
  $site = get_option('site');
  
  enable_clustrmaps($userid, $site);

}

register_activation_hook(__FILE__, 'activate_clustrmaps');
register_deactivation_hook(__FILE__, 'deactivate_clustrmaps');

if (is_admin()) {
  add_action('admin_init', 'admin_init_clustrmaps');
  add_action('admin_menu', 'admin_menu_clustrmaps');
}

if (!is_admin()) {
	add_action('wp_footer', 'clustrmaps');
}

?>
