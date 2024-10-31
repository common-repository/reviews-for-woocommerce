<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      1.0.1
 *
 * @package    Reviews_For_Woocommerce
 * @subpackage Reviews_For_Woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Reviews_For_Woocommerce
 * @subpackage Reviews_For_Woocommerce/public
 * @author     iB Softs <support@ibsofts.com>
 */
class REVFWOO_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		wp_enqueue_style( $this->plugin_name.'slick-style', plugin_dir_url( __FILE__ ) . 'css/slick.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'slick-theme', plugin_dir_url( __FILE__ ) . 'css/slick-theme.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/reviews-for-woocommerce-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		wp_enqueue_script( $this->plugin_name.'slick-script', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array(), $this->version, true );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/reviews-for-woocommerce-public.js', array( 'jquery' ), $this->version, true );

	}
	

	function revfwoo_shortcodes( $atts ) {
        
        if ( empty( $atts ) ) return '';
 
        if ( ! isset( $atts['id'] ) ) return '';
        
        $atts = shortcode_atts(
            array(
                'id' => '',
                'style' => 'slider'
            ), $atts
        );
        
        $style = $atts['style'];
        
        $comments = get_comments( 'post_id=' . $atts['id'] );
        
        $total_comments = count( $comments );
        
        if ( ! $comments ) return '';
        
        $total_rating = 0;
        
        if ( ! empty( $style ) && file_exists( plugin_dir_path( __FILE__ ) . 'partials/template-' . $style . '.php' ) ) {
            ob_start();
            include(plugin_dir_path( __FILE__ ) . "partials/template-$style.php");
            $output = ob_get_contents();
            ob_end_clean();
        }else {
            ob_start();
            include(plugin_dir_path( __FILE__ ) . "partials/template-slider.php");
            $output = ob_get_contents();
            ob_end_clean();
        }
        return $output;
    }
    
    function revfwoo_get_star_review($rating) {
        return wc_get_rating_html( $rating );
    }

}
