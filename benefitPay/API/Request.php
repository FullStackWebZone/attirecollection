<?php
require('BenefitAPIPlugin.php');

$Pipe = new iPayBenefitPipe();
$amt = !empty($_POST['amt']) ? $_POST['amt'] : '';

// modify the following to reflect your "Tranportal ID", "Tranportal Password ", "Terminal Resourcekey"
$Pipe->setkey("20601755176020601755176020601755");
$Pipe->setid("714930801");
$Pipe->setpassword("714930801");

// Do NOT change the values of the following parameters at all.
$Pipe->setaction("1");
$Pipe->setcardType("D");
$Pipe->setcurrencyCode("048");

// modify the following to reflect your pages URLs
$Pipe->setresponseURL("https://attirecollection.com/benefitPay/API/Response.php");
$Pipe->seterrorURL("https://attirecollection.com/home/benefitPay_cancel/");


// set a unique track ID for each transaction so you can use it later to match transaction response and identify transactions in your system and “BENEFIT Payment Gateway” portal.
$num = random_strings(12);
$Pipe->settrackId($num);

// set transaction amount
$Pipe->setamt($amt);

// The following user-defined fields (UDF1, UDF2, UDF3, UDF4, UDF5) are optional fields.
// However, we recommend setting theses optional fields with invoice/product/customer identification information as they will be reflected in “BENEFIT Payment Gateway” portal where you will be able to link transactions to respective customers. This is helpful for dispute cases. 
$Pipe->setudf1("set value 1");
$Pipe->setudf2("set value 2");
$Pipe->setudf3("set value 3");
$Pipe->setudf4("set value 4");
$Pipe->setudf5("set value 5");
$isSuccess = $Pipe->performeTransaction();

if ($isSuccess == 1) {
	header('location:' . $Pipe->getresult());
} else {
	echo 'Error: ' . $Pipe->geterror() . '<br />Error Text: ' . $Pipe->geterrorText();
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
