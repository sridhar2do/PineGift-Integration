<?php

	include './error.inc.php';
	include './pineAuth.inc.php';

	$wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?wsdl";

	$client = new SoapClient( $wsdl );

	$params = array (
		"AccessCode" => $accessCode,
		"ServerId" => $accessCode
	);

	// Get the response
	$response = $client->GetBrandConfiguration( $params );

	// Output from the response
	print_r( $response );

	echo "\n\n\n";
	

	// Get the available Functions and Type
	echo '<pre>';
	var_dump($client->__getFunctions()); 
	echo "\n\n\n";
	var_dump($client->__getTypes()); 
	echo '</pre>';