<?php

// Validate OTP
// ============================

require_once('../autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

$otp = ''; // This value get from "otp_generate.php" file

try {

	if (!$otp)
	{
		throw new Exception("Invalid OTP");
		
	}

	$response = $apiClient->validateOtp($otp);
	print_r($response);
	
} catch (Exception $e) {
	
	die($e->getMessage());
}

/*

Output is Success
------------------

Array
(
    [status] => Success
    [msg] => Otp Successfully Validated
    [otp] => bb796d
)

*/