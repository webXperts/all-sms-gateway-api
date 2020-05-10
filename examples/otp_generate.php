<?php

// Generate OTP
// ===========================

require_once('../autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

	$response = $apiClient->generateOtp();
	if (!isset($response['otp']))
	{
		throw new Exception("Faile to generate an OTP");
	}

	$otp = $response['otp'];
	dd($response);

	// Send SMS
	/*
	$apiClient->sendThrough('Http');
	$mobile_no = '8801737346122';
	$message = 'OTP: ' . $otp;
	$sender_id = 'wed63478u';
	$gateway = 'mimsms';
	$response = $apiClient->sendSMSviaHttp($mobile_no, $message, $sender_id, $gateway);
	dd($response);
	*/
	
} catch (Exception $e) {
	
	die($e->getMessage());
}


/*

Output in Success
----------

Array
(
    [status] => Success
    [msg] => Otp Successfully Generated
    [otp] => e67c1e
)
*/