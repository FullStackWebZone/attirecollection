<?php
	require('iPayBenefitPipe.php');

	$Pipe = new iPayBenefitPipe();
	$Pipe->setendPoint("https://www.test.benefit-gateway.bh/payment/API/tranportal.htm");
	
	// Do NOT change the values of the following parameters at all.
	$Pipe->setaction("8");
	
	// modify the following to reflect your "Tranportal ID", "Tranportal Password ", "Terminal Resourcekey"
	$Pipe->setid("1");
	$Pipe->setpassword("abc@1234");
	$Pipe->setkey("03568299251003568299251003568299");

	// inquiry by (choose one key to be used for inquiry):
    // Track ID         > TrackID
    // Payment ID       > PaymentID
    // Transaction ID   > TransID
    // Reference ID     > SeqNum
	$inquiryBy = "TrackID"; 
	$Pipe->setudf5($inquiryBy);
	$Pipe->settransId("1617694502911"); // set based on value of "inquiryBy"
	
	//set transaction amount
	$Pipe->setamt("2.500");
	
	//set trackID
	$Pipe->settrackId("1617694502911");
	
	$isSuccess = $Pipe->performeInquiry();
	if($isSuccess==1){
		$paymentID = $Pipe->getpaymentId();
		$result = $Pipe->getresult();
		$responseCode = $Pipe->getauthRespCode();
		$transactionID = $Pipe->gettransId();
		$referenceID = $Pipe->getref();
		$trackID = $Pipe->gettrackId();
		$amount = $Pipe->getamt();
		$UDF1 = $Pipe->getudf1();
		$UDF2 = $Pipe->getudf2();
		$UDF3 = $Pipe->getudf3();
		$UDF4 = $Pipe->getudf4();
		$UDF5 = $Pipe->getudf5();
		$authCode = $Pipe->getauthCode();
		$postDate = $Pipe->gettranDate();
		
		echo '<b>paymentID:</b> '.$paymentID.'<br />';
		echo '<b>result:</b> '.$result.'<br />';
		echo '<b>responseCode:</b> '.$responseCode.'<br />';
		echo '<b>transactionID:</b> '.$transactionID.'<br />';
		echo '<b>referenceID:</b> '.$referenceID.'<br />';
		echo '<b>trackID:</b> '.$trackID.'<br />';
		echo '<b>amount:</b> '.$amount.'<br />';
		echo '<b>UDF1:</b> '.$UDF1.'<br />';
		echo '<b>UDF2:</b> '.$UDF2.'<br />';
		echo '<b>UDF3:</b> '.$UDF3.'<br />';
		echo '<b>UDF4:</b> '.$UDF4.'<br />';
		echo '<b>UDF5:</b> '.$UDF5.'<br />';
		echo '<b>authCode:</b> '.$authCode.'<br />';
		echo '<b>postDate:</b> '.$postDate.'<br />';
	}
	else{
		echo 'Error: '.$Pipe->geterror().'<br />Error Text: '.$Pipe->geterrorText();
	}
?>




