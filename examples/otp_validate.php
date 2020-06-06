<?php

// Validate OTP
// ============================

require_once('../autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

$otp = ''; // Generated OTP

try {

	if (!$otp)
	{
		throw new Exception("Invalid OTP");
	}

	$response = $apiClient->validateOtp($otp);

	dd($response);
	
} catch (Exception $e) {
	
	echo $e->getMessage();
}

/*

Response in Failed

Failed | Invalid Otp | HTTP Error Code : 422

Response is Success
------------------

Array
(
    [status] => Success
    [msg] => Otp Successfully Validated
    [otp] => 98fde1
)
