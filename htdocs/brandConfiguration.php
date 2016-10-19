<?php include "header.php"; ?>

<?php

	include './error.inc.php';
	include './pineAuth.inc.php';

	// $wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?wsdl";
	$wsdl = "https://novaserviceuat.pinelabs.com/Nova/PineGiftWebService.svc?singleWsdl";

	$client = new SoapClient( $wsdl );

	$params = array( "brandConfigurationRequest"=> $server );

	$response = [];

	echo '<pre>';
	echo '<h2>' . 'GetBrandConfiguration' . '</h2>';

	// Get the response
	$response = $client->GetBrandConfiguration( $params );

	echo 'Response Result: ';

	$result = $response->GetBrandConfigurationResult;

	// Brand list response
	$responseCode = $result->ResponseCode;
	$responseMessage = $result->ResponseMessage;
	$responseBrandList = $result->BrandList;

	// Get list of brands
	$brands = $responseBrandList->Brand;

	$i = 0;
	foreach ($brands as $brandResult) {

		$items[$brandResult->BrandId] = $brandResult->BrandName;

		$brand[$i]['brandId']     = $brandResult->BrandId;
		$brand[$i]['brandName']   = $brandResult->BrandName;
		$brand[$i]['description'] = $brandResult->BrandDescription;
		$brand[$i]['detailUrl']   = $brandResult->BrandDetailUrl;
		$schemeList               = $brandResult->SchemeList->Scheme;

		$j = 0;
		foreach ($schemeList as $schemeResult) {
			$brand[$i]['scheme'][$j]['schemeId'] = $schemeResult->SchemeId;
			$brand[$i]['scheme'][$j]['schemeName'] = $schemeResult->SchemeName;
			$brand[$i]['scheme'][$j]['schemeDescription'] = $schemeResult->SchemeDescription;
			$brand[$i]['scheme'][$j]['schemeDetailUrl'] = $schemeResult->SchemeDetailUrl;
			$brand[$i]['scheme'][$j]['schemeMessage'] = $schemeResult->SchemeMessage;
			$brand[$i]['scheme'][$j]['isOtpEnabled'] = $schemeResult->IsOtpEnabled;
			$brand[$i]['scheme'][$j]['isEvvScheme'] = $schemeResult->IsEvvScheme;
			// $brand[$i]['scheme'][$j]['termsAndConditions'] = $schemeResult->TermsAndConditions;
			$brand[$i]['scheme'][$j]['denomination'] = $schemeResult->DenominationList->Denomination;

			$j++;
		}

		$i++;
	}

	foreach ($items as $key => $value) {
		echo '<br>' . $key . " => " . $value;
	}
	echo '<br><br>';

	print_r($brand);

	echo '<br>';
	echo 'Response Code : ' . $responseCode;
	echo '<br>';
	echo 'Response Message : ' . $responseMessage;
	echo '<br>';
	echo '<hr>';

	echo '</pre>';