<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function crq_get_company_info() {
    global $wpdb;
    return $wpdb->get_row("SELECT * FROM {$wpdb->prefix}crq_company ORDER BY id DESC LIMIT 1");
}
