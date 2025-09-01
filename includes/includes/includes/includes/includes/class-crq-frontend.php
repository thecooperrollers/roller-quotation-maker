<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Crq_Frontend {
    public function __construct() {
        add_shortcode( 'roller_quotation_maker', [ $this, 'render_form' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function enqueue_assets() {
        wp_enqueue_style( 'crq-frontend', CRQ_PLUGIN_URL . 'assets/css/frontend.css', [], CRQ_PLUGIN_VERSION );
        wp_enqueue_script( 'crq-frontend', CRQ_PLUGIN_URL . 'assets/js/frontend.js', ['jquery'], CRQ_PLUGIN_VERSION, true );
    }

    public function render_form() {
        ob_start();
        include CRQ_PLUGIN_DIR . 'frontend/views/quotation-form.php';
        return ob_get_clean();
    }
}
