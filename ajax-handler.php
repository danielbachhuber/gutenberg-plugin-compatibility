<?php
require_once( 'local-config.php' );

$action     = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : '';
$record_id  = isset( $_REQUEST['plugin_id'] ) ? $_REQUEST['plugin_id'] : '';
$method     = isset( $_SERVER['REQUEST_METHOD'] ) ? $_SERVER['REQUEST_METHOD'] : '';
$filters    = isset( $_REQUEST['filters'] ) ? $_REQUEST['filters'] : '';
$data       = isset( $_REQUEST['data'] ) ? $_REQUEST['data'] : '';


function request_get() {
	$ch = curl_init("https://api.knack.com/v1/objects/object_1/records");
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
		'X-Knack-Application-Id:' . KNACK_APP_ID,
		'X-Knack-REST-API-KEY:' . KNACK_API_KEY,
		'content-type: application/json',
	));
	curl_exec($ch);
	curl_close($ch);
}

function request_put($record_id) {
	$putdata = '';
	$putfp = fopen('php://input', 'r');
	while($data = fread($putfp, 1024)) {
		$putdata .= $data;
	}
	fclose($putfp);

	$ch = curl_init("https://api.knack.com/v1/objects/object_1/records/" . $record_id);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $putdata);

	curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
		'X-Knack-Application-Id:' . KNACK_APP_ID,
		'X-Knack-REST-API-KEY:' . KNACK_API_KEY,
		'content-type:application/json',
	));
	$response = curl_exec($ch);
	curl_close($ch);
	echo $response;
}

if ( 'get_record' == $action ) {
	request_get();
} else if ( 'update_record' == $action ) {
	request_put($record_id);
}
die();
