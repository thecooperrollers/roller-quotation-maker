<?php
/**
 * Plugin Name: Roller Quotation Maker
 * Description: Cooper Rollers Quotation Generator (Frontend + Backend + PDF + Email).
 * Version: 1.0.0
 * Author: Cooper Rollers
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'CRQ_PLUGIN_VERSION', '1.0.0' );
define( 'CRQ_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CRQ_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once CRQ_PLUGIN_DIR . 'includes/class-crq-activator.php';
require_once CRQ_PLUGIN_DIR . 'includes/class-crq-deactivator.php';
require_once CRQ_PLUGIN_DIR . 'includes/class-crq-database.php';
require_once CRQ_PLUGIN_DIR . 'includes/class-crq-admin.php';
require_once CRQ_PLUGIN_DIR . 'includes/class-crq-frontend.php';
require_once CRQ_PLUGIN_DIR . 'includes/class-crq-pdf.php';
require_once CRQ_PLUGIN_DIR . 'includes/class-crq-email.php';
require_once CRQ_PLUGIN_DIR . 'includes/helpers.php';

function crq_activate() {
    Crq_Activator::activate();
}
function crq_deactivate() {
    Crq_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'crq_activate' );
register_deactivation_hook( __FILE__, 'crq_deactivate' );

// Init admin + frontend
add_action( 'plugins_loaded', function() {
    if ( is_admin() ) {
        new Crq_Admin();
    } else {
        new Crq_Frontend();
    }
});
