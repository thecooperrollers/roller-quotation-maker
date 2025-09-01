<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Crq_Email {
    public static function send_email( $to, $subject, $body, $attachments = [] ) {
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        return wp_mail( $to, $subject, $body, $headers, $attachments );
    }
}
