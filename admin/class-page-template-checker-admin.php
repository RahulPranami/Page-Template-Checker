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
			// wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com' );
			wp_enqueue_script( 'tailwindcss', plugin_dir_url( __FILE__ ) . 'js/tailwindcss.min.js', array(), '3.4.1', false );
			// wp_enqueue_script( 'htmx', 'https://unpkg.com/htmx.org@1.9.10' );
			wp_enqueue_script( 'htmx', plugin_dir_url( __FILE__ ) . 'js/htmx.min.js', array(), '1.9.10', false );
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
			require_once plugin_dir_path( __FILE__ ) . 'partials/template.php';
	}

	public function handle_my_custom_action() {
    	// Handle the request here...

    	// Then return a response. For example:
    	$response = array('status' => 'ok', 'data' => 'Some data');
    	wp_send_json($response);
	}


}
