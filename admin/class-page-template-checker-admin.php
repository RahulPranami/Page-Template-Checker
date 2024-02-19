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
class Page_Template_Checker_Admin
{

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
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook)
	{

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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/page-template-checker-admin.css', array(), $this->version, 'all');

		// Load only on ?page=page-template-statistics.
		if ('tools_page_page-template-statistics' == $hook) {
			// wp_enqueue_style('tailwindcss', plugin_dir_url(__FILE__) . 'css/output.css', array(), microtime(), 'all');
			wp_enqueue_style('tailwindcss-min', plugin_dir_url(__FILE__) . 'css/output.min.css', array(), $this->version, 'all');
			// // Load the required WordPress packages.

			// // Automatically load imported dependencies and assets version.
			// $asset_file = include plugin_dir_path(__FILE__) . 'partials/page-template-statistics/build/index.asset.php';

			// // Enqueue CSS dependencies.
			// foreach ($asset_file['dependencies'] as $style) {
			// 	wp_enqueue_style($style);
			// }

			// // Load our style.css.
			// wp_register_style(
			// 	'page-template-statistics',
			// 	plugins_url('partials/page-template-statistics/build/style-index.css', __FILE__),
			// 	array(),
			// 	$asset_file['version']
			// );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook)
	{

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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/page-template-checker-admin.js', array('jquery'), $this->version, false);

		// Load only on ?page=page-template-statistics.
		if ('tools_page_page-template-statistics' == $hook) {
			// wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com' );
			// wp_enqueue_script('tailwindcss', plugin_dir_url(__FILE__) . 'js/tailwindcss.min.js', array(), '3.4.1', false);
			// wp_enqueue_script( 'htmx', 'https://unpkg.com/htmx.org@1.9.10' );
			wp_enqueue_script('htmx', plugin_dir_url(__FILE__) . 'js/htmx.min.js', array(), '1.9.10', false);
		}
	}

	public function page_template_checker_page()
	{
		add_submenu_page('tools.php', 'Page Templates Statistics', 'Page Templates Statistics', 'manage_options', 'page-template-statistics', [$this, 'template_page_statistics']);
	}

	// Function that renders the page added above
	public function template_page_statistics()
	{
		require_once plugin_dir_path(__FILE__) . 'partials/template.php';
	}

	public function display_current_page_template($wp_admin_bar)
	{
		// Check if user is logged in and has the capability to edit posts
		if (is_user_logged_in() && current_user_can('edit_posts')) {

			// Get current page template
			$current_page_template = get_page_template_slug();

			// error_log(print_r($current_page_template,true));

			if ($current_page_template) {

				// Remove .php extension
				$current_page_template = str_replace(['.php', '.blade'], '', basename($current_page_template));

				// Add item to admin bar
				$wp_admin_bar->add_node(array(
					'id'     => 'current-page-template',
					'title' => 'Page Template: ' . $current_page_template,
					'parent' => 'top-secondary',
				));
			}
		}
	}

	public function handle_search_shortcode()
	{
		global $wpdb;

		$contact_form_7_pattern = '%[' . esc_sql($_POST['searchQuery']) . '%'; // Define the pattern for contact-form-7
		// $contact_form_7_pattern = '%[' . esc_sql($_POST['searchQuery']) . '%'; // Define the pattern for contact-form-7

		$query_to_retrieve_shortcode_acf_fields = $wpdb->prepare("SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE %s AND pm.meta_value LIKE %s AND p.post_status <> 'inherit';", array('_%', $contact_form_7_pattern));
		$query_to_retrieve_shortcode_pages = $wpdb->prepare("SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE %s AND post_status <> 'inherit';", $contact_form_7_pattern);

		$result_from_pages_in_acf = $wpdb->get_results($query_to_retrieve_shortcode_acf_fields);
		$result_from_pages = $wpdb->get_results($query_to_retrieve_shortcode_pages);

		ob_start();
		if ($result_from_pages) : ?>

			<div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
				<div class="flex justify-between container mx-auto p-2 mb-2 items-center">
					<h4 class="text-xl text-slate-300">
						Pages that Have Shortcode In the Content
					</h4>
				</div>

				<ul class="list-none pl-5">
					<?php foreach ($result_from_pages as $page) : ?>
						<li>
							<a href="<?php echo get_permalink($page->ID, false); ?>" class="text-base text-blue-300 hover:text-blue-500">
								<?php echo $page->post_title; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php
		endif;
		if ($result_from_pages_in_acf) :
		?>
			<div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
				<div class="flex justify-between container mx-auto p-2 mb-2 items-center">
					<h4 class="text-xl text-slate-300">
						Pages that Have Shortcode In the ACF Field
					</h4>
				</div>

				<ul class="list-none pl-5">
					<?php foreach ($result_from_pages_in_acf as $page) : ?>
						<li>
							<a href="<?php echo get_permalink($page->ID, false); ?>" class="text-base text-blue-300 hover:text-blue-500">
								<?php echo $page->post_title; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php
		endif;
		if (!$result_from_pages_in_acf && !$result_from_pages) :
		?>
			<div class="rounded-md border border-slate-400 p-2 my-2">
				<div class="flex justify-center align-items-center container mx-auto p-2">
					<h4 class="text-xl text-center text-red-300">
						There are no Pages that have this shortcode in the content or acf fields.
					</h4>
				</div>
			</div>
<?php
		endif;

		echo ob_get_clean();
		exit();
	}

	public function handle_search_all()
	{
		global $wpdb;

		$pattern = '%' . esc_sql($_POST['searchQuery']) . '%'; // Define the pattern for contact-form-7
		// $pattern = '%[' . esc_sql($_POST['searchQuery']) . '%'; // Define the pattern for contact-form-7

		$query_to_retrieve_acf_fields = $wpdb->prepare("SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE %s AND pm.meta_value LIKE %s AND p.post_status <> 'inherit';", array('_%', $pattern));
		$query_to_retrieve_pages = $wpdb->prepare("SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE %s AND post_status <> 'inherit';", $pattern);

		$result_from_pages_in_acf = $wpdb->get_results($query_to_retrieve_acf_fields);
		$result_from_pages = $wpdb->get_results($query_to_retrieve_pages);

		ob_start();
		if ($result_from_pages) : ?>

			<div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
				<div class="flex justify-between container mx-auto p-2 mb-2 items-center">
					<h4 class="text-xl text-slate-300">
						Pages that Have Search Query In the Content
					</h4>
				</div>

				<ul class="list-none pl-5">
					<?php foreach ($result_from_pages as $page) : ?>
						<li>
							<a href="<?php echo get_permalink($page->ID, false); ?>" class="text-base text-blue-300 hover:text-blue-500">
								<?php echo $page->post_title; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php
		endif;
		if ($result_from_pages_in_acf) :
		?>
			<div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
				<div class="flex justify-between container mx-auto p-2 mb-2 items-center">
					<h4 class="text-xl text-slate-300">
						Pages that Have Search Query In the ACF Field
					</h4>
				</div>

				<ul class="list-none pl-5">
					<?php foreach ($result_from_pages_in_acf as $page) : ?>
						<li>
							<a href="<?php echo get_permalink($page->ID, false); ?>" class="text-base text-blue-300 hover:text-blue-500">
								<?php echo $page->post_title; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php
		endif;
		if (!$result_from_pages_in_acf && !$result_from_pages) :
		?>
			<div class="rounded-md border border-slate-400 p-2 my-2">
				<div class="flex justify-center align-items-center container mx-auto p-2">
					<h4 class="text-xl text-center text-red-300">
						There are no Pages that have this Search Query in the content or acf fields.
					</h4>
				</div>
			</div>
<?php
		endif;

		echo ob_get_clean();
		exit();
	}
}
