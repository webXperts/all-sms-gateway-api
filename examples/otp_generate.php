<?php

// Generate OTP
// ===========================

require_once('../autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

	$lifetime = 18800; // in second
	$response = $apiClient->generateOtp($lifetime);
	if (!isset($response['otp']))
	{
		throw new Exception("Unable to generate an OTP");
	}

	$otp = $response['otp'];
	dd($response);
	
} catch (Exception $e) {
	
	echo $e->getMessage();
}


/*

Response in Success
----------

Array
(
    [status] => Success
    [msg] => Otp Successfully Generated
    [otp] => b10df7
)
*/