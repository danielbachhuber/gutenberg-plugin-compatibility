<?php

if ( empty( $_GET['plugins'] ) ) {
	header( 'HTTP/1.0 400 Bad Request' );
	exit;
}

$curl = curl_init( 'http://wpsandbox.pro/create?src=spotless-dove&key=jkiaIH00a5zATo0m&url=wp-admin/edit.php&plugins=' . $_GET['plugins'] );
curl_setopt( $curl, CURLOPT_NOBODY, true );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $curl, CURLOPT_HEADER, true );
$headers = curl_exec( $curl );
$info = curl_getinfo( $curl );
curl_close( $curl );
header( 'HTTP/1.0 200 OK' );
echo $info['redirect_url'];
exit;
