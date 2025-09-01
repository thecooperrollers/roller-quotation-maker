<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Crq_Activator {
    public static function activate() {
        require_once CRQ_PLUGIN_DIR . 'includes/class-crq-database.php';
        Crq_Database::create_tables();
    }
}
