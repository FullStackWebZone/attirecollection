<?php
require('API/BenefitAPIPlugin.php');

$myObj = new iPayBenefitPipe();
$amt = !empty($_POST['amt']) ? $_POST['amt'] : '1';

// Do NOT change the values of the following parameters at all.
$myObj->setAction("1");
$myObj->setCurrency("048");
$myObj->setLanguage("USA");
$myObj->setType("D");

// modify the following to reflect your "Alias Name", "resource.cgn" file path, "keystore.pooh" file path.
$myObj->setAlias("prod714930801");
$myObj->setResourcePath("attirecollection.com/benefitPay/"); //only the path that contains the file; do not write the file name
$myObj->setKeystorePath("attirecollection.com/benefitPay/"); //only the path that contains the file; do not write the file name

// modify the following to reflect your pages URLs
$myObj->setResponseURL("https://attirecollection.com/benefitPay/Response.php");
$myObj->setErrorURL("https://attirecollection.com/home/benefitPay_cancel/");

// set a unique track ID for each transaction so you can use it later to match transaction response and identify transactions in your system and “BENEFIT Payment Gateway” portal.
$num = random_strings(12);
$myObj->setTrackId($num);

// set transaction amount
$myObj->setAmt($amt);

// The following user-defined fields (UDF1, UDF2, UDF3, UDF4, UDF5) are optional fields.
// However, we recommend setting theses optional fields with invoice/product/customer identification information as they will be reflected in “BENEFIT Payment Gateway” portal where you will be able to link transactions to respective customers. This is helpful for dispute cases. 
$myObj->setUdf2("set value 1");
$myObj->setUdf2("set value 2");
$myObj->setUdf3("set value 3");
$myObj->setUdf4("set value 4");
$myObj->setUdf5("set value 5");

if (trim($myObj->performPaymentInitializationHTTP()) != 0) {
	echo ("ERROR OCCURED! SEE CONSOLE FOR MORE DETAILS");
	return;
} else {
	$url = $myObj->getwebAddress();
	echo "<meta http-equiv='refresh' content='0;url=$url'>";
}

function random_strings($length_of_string)
{

	// String of all alphanumeric character
	$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

	// Shuffle the $str_result and returns substring
	// of specified length
	return substr(
		str_shuffle($str_result),
		0,
		$length_of_string
	);
}
