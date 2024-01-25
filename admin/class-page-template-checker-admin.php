<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rahulpranami.co
 * @since      1.0.0
 *
 * @package    Page_Template_Checker
 * @subpackage Page_Template_Checker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Page_Template_Checker
 * @subpackage Page_Template_Checker/admin
 * @author     Rahul Pranami <rahulpranami101@gmail.com>
 */
class Page_Template_Checker_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( $hook ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Page_Template_Checker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Page_Template_Checker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/page-template-checker-admin.css', array(), $this->version, 'all' );

		// Load only on ?page=page-template-statistics.
		if ('tools_page_page-template-statistics' == $hook) {
			// Load the required WordPress packages.

			// Automatically load imported dependencies and assets version.
			$asset_file = include plugin_dir_path(__FILE__) . 'partials/page-template-statistics/build/index.asset.php';

			// Enqueue CSS dependencies.
			foreach ($asset_file['dependencies'] as $style) {
				wp_enqueue_style( $style );
			}

			// Load our style.css.
			wp_register_style(
				'page-template-statistics',
				plugins_url('partials/page-template-statistics/build/style-index.css', __FILE__),
				array(),
				$asset_file['version']
			);

		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Page_Template_Checker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Page_Template_Checker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/page-template-checker-admin.js', array( 'jquery' ), $this->version, false );

		// Load only on ?page=page-template-statistics.
		if ('tools_page_page-template-statistics' == $hook) {
			// Load the required WordPress packages.

			// Automatically load imported dependencies and assets version.
			$asset_file = include plugin_dir_path(__FILE__) . 'partials/page-template-statistics/build/index.asset.php';

			// Load our app.js.
			wp_enqueue_script(
				'page-template-statistics',
				plugins_url('partials/page-template-statistics/build/index.js', __FILE__),
				$asset_file['dependencies'],
				$asset_file['version']
			);

		}

	}

	public function page_template_checker_page() {
		add_submenu_page( 'tools.php', 'Page Templates Statistics', 'Page Templates Statistics', 'manage_options', 'page-template-statistics', [$this,'template_page_statistics'] );
		// add_submenu_page(
		// 	'tools.php',
		// 	'Page Templates Statistics',
		// 	'Page Templates Statistics',
		// 	'manage_options',
		// 	'page-template-statistics',
		// 	function () {
		// 		echo '<div class="wrap" id="page-template-statistics"></div>';
		// 	}
		// );

	}

	// Function that renders the page added above
	function template_page_statistics() {

		// Method 1 :
		$templates = wp_get_theme()->get_page_templates();
		$report = array();

		// echo '<pre>';
		// print_r($templates);
		// echo '</pre>';

		echo '<div class="wrap">';

		echo '<h1>Page Template Usage Report</h1>';
		echo "<p>This report will show you any pages in your WordPress site that are using one of your theme's custom templates.</p>";

		foreach ($templates as $file => $name) {
			$q = new WP_Query(array(
				'post_type' => 'page',
				'posts_per_page' => -1,
				'meta_query' => array(array(
					'key' => '_wp_page_template',
					'value' => $file
				))
			));

			$page_count = sizeof($q->posts);

			if ($page_count > 0) {
				// echo '<p style="color:green">' . $file . ': <strong>' . sizeof($q->posts) . '</strong> pages are using this template:</p>';
				// echo "<ul>";
				// foreach ($q->posts as $p) {
				// 	echo '<li><a href="' . get_permalink($p, false) . '">' . $p->post_title . '</a></li>';
				// }
				// echo "</ul>";
			} else {
				echo '<p style="color:red">' . $file . ': <strong>0</strong> pages are using this template, you should be able to safely delete it from your theme.</p>';
			}

			foreach ($q->posts as $p) {
				$report[$file][$p->ID] = $p->post_title;
			}
		}

		foreach ($templates as $file => $name) {
			$q = new WP_Query(array(
				'post_type' => 'page',
				'posts_per_page' => -1,
				'meta_query' => array(array(
					'key' => '_wp_page_template',
					'value' => $file
				))
			));

			$page_count = sizeof($q->posts);

			if ($page_count > 0) {
				echo '<p style="color:green">' . $file . ': <strong>' . sizeof($q->posts) . '</strong> pages are using this template:</p>';
				echo "<ul>";
				foreach ($q->posts as $p) {
					echo '<li><a href="' . get_permalink($p, false) . '">' . $p->post_title . '</a></li>';
				}
				echo "</ul>";
			} else {
				// echo '<p style="color:red">' . $file . ': <strong>0</strong> pages are using this template, you should be able to safely delete it from your theme.</p>';
			}

			foreach ($q->posts as $p) {
				$report[$file][$p->ID] = $p->post_title;
			}
		}

		echo '</div>';

		// Method 2 :

		// Get available templates within active theme
		$available_templates = get_page_templates();

		// Get used templates from database
		global $wpdb;

		$query = "SELECT DISTINCT( meta.meta_value ) FROM {$wpdb->prefix}postmeta as meta JOIN {$wpdb->prefix}posts as posts ON posts.ID = meta.post_id WHERE meta.meta_key LIKE '_wp_page_template' AND posts.post_type = 'page';";
		$query_with_count = "SELECT meta.meta_value, COUNT(*) as count FROM {$wpdb->prefix}postmeta as meta JOIN {$wpdb->prefix}posts as posts ON posts.ID = meta.post_id WHERE meta.meta_key LIKE '_wp_page_template' AND posts.post_type = 'page' GROUP BY meta.meta_value;";

		$result = $wpdb->get_results($query);

		$used_templates = array();
		foreach ($result as $template) {
			$used_templates[] = $template->meta_value;
		}

		/**
		 * Compare available templates against used templates
		 * Result is an array with the unused templates
		 */
		$unused_templates = array_diff($available_templates, $used_templates);

		// Draw page to show unused templates
	?>
		<div class="wrap">
			<h1>Page Template Statistics</h1>
			The following templates are not being used:
			<table>
				<tr>
					<th>Template name</th>
					<th>Filename</th>
				</tr>
				<?php foreach ($unused_templates as $name => $file) : ?>
					<tr>
						<td><?php echo $name; ?></td>
						<td><?php echo $file; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	<?php
	}

}
