<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Crq_Admin {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
    }

    public function register_menu() {
        add_menu_page(
            'Roller Quotation Maker',
            'Roller Quotation',
            'manage_options',
            'crq-main',
            [ $this, 'render_import_export' ],
            'dashicons-media-spreadsheet'
        );

        add_submenu_page( 'crq-main', 'Import Export', 'Import Export', 'manage_options', 'crq-main', [ $this, 'render_import_export' ] );
        add_submenu_page( 'crq-main', 'Rubber Rates', 'Rubber Rates', 'manage_options', 'crq-rubber-rates', [ $this, 'render_rubber_rates' ] );
        add_submenu_page( 'crq-main', 'Spindle Costs', 'Spindle Costs', 'manage_options', 'crq-spindle-costs', [ $this, 'render_spindle_costs' ] );
        add_submenu_page( 'crq-main', 'PDF & Company', 'PDF & Company', 'manage_options', 'crq-pdf-company', [ $this, 'render_pdf_company' ] );
        add_submenu_page( 'crq-main', 'Data Browser', 'Data Browser', 'manage_options', 'crq-data-browser', [ $this, 'render_data_browser' ] );
        add_submenu_page( 'crq-main', 'Email Settings', 'Email Settings', 'manage_options', 'crq-email-settings', [ $this, 'render_email_settings' ] );
    }

    public function enqueue_admin_assets() {
        wp_enqueue_style( 'crq-admin', CRQ_PLUGIN_URL . 'assets/css/admin.css', [], CRQ_PLUGIN_VERSION );
        wp_enqueue_script( 'crq-admin', CRQ_PLUGIN_URL . 'assets/js/admin.js', ['jquery'], CRQ_PLUGIN_VERSION, true );
    }

    public function render_import_export() {
        include CRQ_PLUGIN_DIR . 'admin/views/import-export.php';
    }
    public function render_rubber_rates() {
        include CRQ_PLUGIN_DIR . 'admin/views/rubber-rates.php';
    }
    public function render_spindle_costs() {
        include CRQ_PLUGIN_DIR . 'admin/views/spindle-costs.php';
    }
    public function render_pdf_company() {
        include CRQ_PLUGIN_DIR . 'admin/views/pdf-company.php';
    }
    public function render_data_browser() {
        include CRQ_PLUGIN_DIR . 'admin/views/data-browser.php';
    }
    public function render_email_settings() {
        include CRQ_PLUGIN_DIR . 'admin/views/email-settings.php';
    }
}
