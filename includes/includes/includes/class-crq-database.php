<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Crq_Database {
    public static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $tables = [];

        // Machines & Models
        $tables[] = "CREATE TABLE {$wpdb->prefix}crq_machines (
            id BIGINT AUTO_INCREMENT PRIMARY KEY,
            machine_name VARCHAR(255),
            model_name VARCHAR(255),
            type_of_roller VARCHAR(255),
            roller_name VARCHAR(255),
            quantity INT,
            diameter FLOAT,
            rubber_length FLOAT,
            total_length FLOAT,
            colour VARCHAR(100)
        ) $charset_collate;";

        // Rubber Rates
        $tables[] = "CREATE TABLE {$wpdb->prefix}crq_rubbers (
            id BIGINT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            slug VARCHAR(255),
            rate FLOAT
        ) $charset_collate;";

        // Spindle Costs
        $tables[] = "CREATE TABLE {$wpdb->prefix}crq_spindles (
            id BIGINT AUTO_INCREMENT PRIMARY KEY,
            machine_name VARCHAR(255),
            model_name VARCHAR(255),
            cost FLOAT
        ) $charset_collate;";

        // Employees
        $tables[] = "CREATE TABLE {$wpdb->prefix}crq_employees (
            id BIGINT AUTO_INCREMENT PRIMARY KEY,
            emp_code VARCHAR(10) UNIQUE,
            emp_name VARCHAR(255)
        ) $charset_collate;";

        // Company Info
        $tables[] = "CREATE TABLE {$wpdb->prefix}crq_company (
            id BIGINT AUTO_INCREMENT PRIMARY KEY,
            company_name VARCHAR(255),
            info TEXT,
            gst VARCHAR(50),
            phone VARCHAR(50),
            footer TEXT
        ) $charset_collate;";

        // Email Settings
        $tables[] = "CREATE TABLE {$wpdb->prefix}crq_settings (
            id BIGINT AUTO_INCREMENT PRIMARY KEY,
            setting_key VARCHAR(255),
            setting_value TEXT
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        foreach ( $tables as $sql ) {
            dbDelta( $sql );
        }
    }
}
