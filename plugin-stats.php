<?php

use WP_CLI\Utils;

global $wpdb;

// This table must exist with the correct schema.
$wpdb->select( 'gutenberg_plugins', $wpdb->dbh );

$original_request_url = 'https://wordpress.org/plugins/wp-json/plugins/v1/query-plugins?s=&posts_per_page=100';
$paged = 1;

do {
	$request_url = $original_request_url . '&paged=' . $paged;
	WP_CLI::log( 'Requesting: ' . $request_url );
	$response = Utils\http_request( 'GET', $request_url );
	$list_body = json_decode( $response->body, true );
	if ( ! empty( $list_body['plugins'] ) ) {
		foreach ( $list_body['plugins'] as $plugin_name ) {
			WP_CLI::log( ' -> ' . $plugin_name );
			$plugin_url = 'https://wordpress.org/plugins/wp-json/plugins/v1/plugin/' . $plugin_name;
			$response = Utils\http_request( 'GET', $plugin_url );
			$plugin = json_decode( $response->body, true );
			$tags = ! empty( $plugin['tags'] ) ? implode( ', ', $plugin['tags'] ) : '';
			$last_updated = human_time_diff( strtotime( $plugin['last_updated'] ), time() );
			$wpdb->query( $wpdb->prepare( 'INSERT INTO plugins (plugin_slug, active_installs, last_updated, short_description, tags) VALUES(%s, %s, %s, %s, %s) ON DUPLICATE KEY UPDATE active_installs=%s, last_updated=%s, short_description=%s, tags=%s', $plugin_name, $plugin['active_installs'], $last_updated, $plugin['short_description'], $tags, $plugin['active_installs'], $last_updated, $plugin['short_description'], $tags ) );
		}
	} else {
		$request_url = false;
	}
	$paged++;
} while( $request_url );

WP_CLI::success( 'All done' );
