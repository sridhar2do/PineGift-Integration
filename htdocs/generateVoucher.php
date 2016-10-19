<?php include "header.php"; ?>

<?php

	include './error.inc.php';
	include './pineAuth.inc.php';

	// $wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?wsdl";
	$wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?singleWsdl";

	$client = new SoapClient( $wsdl );

	echo $server['AccessCode'];

	$params = array (
						"AccessCode" => $server['AccessCode'],
						"ServerId" => $server['ServerId'],
						"RequestId" => 10001,
						"CustomerFirstName" => "Sridhar",
						"CustomerLastName" => "M",
						"CustomerEmailId" => "sridhar.m@shopsup.com",
						"CustomerMobileNumber" => "9986878700",
						"SchemeId" => 889,
						"Quantity" => 1,
						"Denomination" => 100,
						"FaceValue" => 100
					);

	$params = array( "generateVoucherRequest" => $params );

	$response = [];

	echo '<pre>';
	echo '<h2>' . 'GenerateVoucher' . '</h2>';

	// Get the response
	$response = $client->GenerateVoucher( $params );

	if( !empty($response) ) print_r($response);

	echo '</pre>';