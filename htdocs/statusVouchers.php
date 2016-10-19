<?php include "header.php"; ?>

<?php

	include './error.inc.php';
	include './pineAuth.inc.php';

	// $wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?wsdl";
	$wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?singleWsdl";

	$client = new SoapClient( $wsdl );

	$params = array( "getStatusOfGeneratedVouchersRequest" => $statusVoucher );

	$response = [];

	echo '<pre>';
	echo '<h2>' . 'GetStatusOfGeneratedVouchers' . '</h2>';

	// Get the response
	$response = $client->GetStatusOfGeneratedVouchers( $params );

	if( !empty($response) ) print_r($response);

	echo '</pre>';