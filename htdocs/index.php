<?php include "header.php"; ?>

<?php

	include './error.inc.php';
	include './pineAuth.inc.php';

	// $wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?wsdl";
	$wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?singleWsdl";

	$client = new SoapClient( $wsdl );

	echo '<pre>';

	var_dump($client->__getFunctions());
	echo "\n";
	var_dump($client->__getTypes());

	echo '</pre>';