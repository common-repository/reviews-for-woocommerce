<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      1.0.1
 *
 * @package    Reviews_For_Woocommerce
 * @subpackage Reviews_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Reviews_For_Woocommerce
 * @subpackage Reviews_For_Woocommerce/admin
 * @author     iB Softs <support@ibsofts.com>
 */
class REVFWOO_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.1
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
	 * @since    1.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Reviews_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reviews_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/reviews-for-woocommerce-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Reviews_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reviews_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/reviews-for-woocommerce-admin.js', array( 'jquery' ), $this->version, false );

	}


	//setting menu
	public function rfw_create_menu_page() {
		$page_title   = __('Reviews For Woo', 'reviews-for-woocommerce');
		$menu_title   = __('Reviews For Woo', 'reviews-for-woocommerce');
		$capability   = 'manage_options';
		$menu_slug    = 'ib-rfw';
		$callback     = array($this, 'rfw_page_content');
		$icon_url     = 'dashicons-format-quote';
		add_menu_page($page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url);
	}
	function rfw_page_content(){
		?>
			<div class="rfw-header">
				<div class="logo">
					<img src="https://ps.w.org/reviews-for-woocommerce/assets/icon-128x128.png" alt="rfw-Logo" />
				</div>
			<h1>Reviews For Woocommerce</h1>
			</div>
		<?php
		require_once plugin_dir_path( __FILE__ )."partials/plugin-info.php";
	}

	//add info link
	public function rfw_add_settings_link( $links ) {
		$newlink = sprintf( "<a href='%s'>%s</a>" , admin_url( 'admin.php?page=ib-rfw') , __( 'Info' , 'reviews-for-woocommerce' ) );
		$links[] = $newlink;
		return $links;
	}

}
