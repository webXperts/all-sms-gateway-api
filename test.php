<?php

// Send Singe SMS Via HTTP / SMPP Gateway

// require_once('autoload.php');

// try {

// 	$mobile_no = '11110346122';
// 	$message = 'do you like sport?';
// 	$sender_id = 'dfewrty56yu';
// 	$country_id = 14;
// 	$gateway = 'mimsms';
// 	$data_type = 'Plain'; // Plain/Unicode
// 	$response = $apiClient->sendSMSviaHttp($mobile_no, $message, $sender_id, $country_id, $gateway, $data_type);

// 	dd($response);

// } catch (Exception $e) {
    
//     echo $e->getMessage();
// }


/*

Response in Failed
---------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------

Array
(
    [status] => Success
    [msg] => Message Send to Queue for Processing
)

*/


// Send Multiple SMS Via HTTP / SMPP Gateway

// require_once('autoload.php');

// try {

// 	$mobile_numbers = array(
//         '11110346122',
//         '11113595747',
//     );
//     $message = 'Do you like sport?';
//     $sender_id = 'dfewrty56yu';
//     $country_id = 14;
//     $gateway = 'mimsms';
//     $data_type = 'Plain'; // Plain/Unicode
//     $send_at = 'now';
//     $response = $apiClient->sendMultipleSMSviaHttp($mobile_numbers, $message, $sender_id, $country_id, $gateway, $data_type, $send_at);

//     dd($response);

// } catch (Exception $e) {
    
//     echo $e->getMessage();
// }


/*

Response in Success
---------

Array
(
    [status] => Success
    [msg] => 1 Messages Send to Queue for Processing
    [data] => Array
        (
            [1] => Array
                (
                    [schedule_at] => 2020-06-04 21:21:55
                    [queue_id] => 1591284115b4f3
                    [gateway] => mimsms
                    [sender_id] => dfewrty56yu
                    [mobile_no] => 11110346122
                    [data_type] => Plain
                    [message] => Do you like sport?
                    [created_at] => 2020-06-04 21:21:55
                    [status] => Failed
                    [response_text] => Mobile Number was Blocked
                )

            [2] => Array
                (
                    [schedule_at] => 2020-06-04 21:21:55
                    [queue_id] => 15912841157673
                    [gateway] => mimsms
                    [sender_id] => dfewrty56yu
                    [mobile_no] => 11113595747
                    [data_type] => Plain
                    [message] => Do you like sport?
                    [created_at] => 2020-06-04 21:21:55
                    [status] => Success
                    [response_text] => Message Successfully Send for Processing
                )

        )

    [total] => 2
    [failed] => 1
    [success] => 1
) 

*/



// Send Singe SMS Via Android Gateway

require_once('autoload.php');

try {

	$mobile_no = '11110346122';
	$message = 'do you like sport?';
	$device_id = 5;
	$sim_id = 1;
	$data_type = 'Plain';
    $response = $apiClient->sendSMS($mobile_no, $message, $device_id, $sim_id, $data_type);
    
    dd($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}

/*

Response in Failed
--------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------

Array
(
    [status] => Success
    [data] => Array
        (
            [0] => Array
                (
                    [response] => Array
                        (
                            [multicast_id] => 9.1266008746554E+17
                            [success] => 1
                            [failure] => 0
                            [canonical_ids] => 0
                            [results] => Array
                                (
                                    [0] => Array
                                        (
                                            [message_id] => 0:1575039780719480%26645a09f9fd7ecd
                                        )

                                )

                        )

                    [payload] => Array
                        (
                            [username] => admin.sms@ntechpark.com
                            [firebase_access_key] => 
                            [device_model] => 1
                            [device_token] => 
                            [sim_id] => 2
                            [created_by] => 1
                            [bulk] => yes
                            [message] => This SMS from API at localhost
                            [created_at] => 2019-11-29 21:03:00
                            [mobile_no] => 14156661234
                            [msgID] => 23
                        )

                )

        )

)


*/


// Send Multiple SMS Via Android Gateway


// require_once('autoload.php');

// try {

//     $mobile_numbers = array(
//         '11110346122',
//         '11113595747',
//     );

//     $message = 'do you like sport?';
// 	$device_id = 1;
// 	$sim_id = 1;
// 	$data_type = 'Plain';
// 	$send_at = 'now';
//     $response = $apiClient->sendMultipleSMS($mobile_numbers, $message, $device_id, $sim_id, $data_type, $send_at);

//     dd($response);

// } catch (Exception $e) {
    
//     echo $e->getMessage();
// }

/*

Response in Failed
--------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------

Array
(
    [status] => Success
    [msg] => 1 Messages Send to Queue for Processing
    [data] => Array
        (
            [1] => Array
                (
                    [schedule_at] => 2020-06-04 22:03:48
                    [queue_id] => 1591286628c9f3
                    [device_id] => 1
                    [sim_id] => 99
                    [mobile_no] => 11110346122
                    [data_type] => Plain
                    [message] => do you like sport?
                    [status] => Failed
                    [response_text] => Mobile Number was Blocked
                )

            [2] => Array
                (
                    [schedule_at] => 2020-06-04 22:03:48
                    [queue_id] => 159128662854f3
                    [device_id] => 1
                    [sim_id] => 99
                    [mobile_no] => 11113595747
                    [data_type] => Plain
                    [message] => do you like sport?
                    [created_at] => 2020-06-04 22:03:48
                    [status] => Success
                    [response_text] => Message Successfully Send for Processing
                )

        )

    [total] => 2
    [failed] => 1
    [success] => 1
)


*/




// Fetch SMS History


// require_once('autoload.php');


// try {
    
//     $history = $apiClient->getHistory(array('filterby_send_through' => 'Http', 'filterby_gateway_id' => 'mimsms', 'filterby_from' => '2019-11-29 12:00:00', 'filterby_to' => '2020-11-29 23:59:00'));

//     dd($history);
// } catch (Exception $e) {
    
//     echo $e->getMessage();
// }

/*


Response in Success
---------

Array
(
    [status] => Success
    [data] => Array
        (
            [0] => Array
                (
                    [id] => 93
                    [send_through] => Http
                    [gateway_id] => mimsms
                    [sender_id] => wed63478u
                    [country_id] => 14
                    [response_id] => 957593
                    [status] => Delivered
                    [device_id] => 
                    [sim_id] => 
                    [mobile_no] => 11110346122
                    [data_type] => Plain
                    [message] => This is very good morning...
                    [campaign_id] => 
                    [user_id] => 3
                    [created_by] => 3
                    [updated_at] => 2020-05-30 17:41:32
                    [created_at] => 2020-05-30 17:41:01
                )

        )

)


*/



// Fetch SMS in Queue

// require_once('autoload.php');

// try {
    
//     $sms_in_queue = $apiClient->getSmsInQueue(array('filterby_send_through' => 'Http', 'filterby_gateway_id' => 'mimsms', 'filterby_from' => '2019-11-29 12:00:00', 'filterby_to' => '2020-11-29 23:59:00'));
    
//     dd($sms_in_queue);
// } catch (Exception $e) {
    
//     echo $e->getMessage();
// }


/*


Response in Success
---------

Array
(
    [status] => Success
    [data] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [schedule_at] => 2020-06-04 21:21:55
                    [queue_id] => 15912841157673
                    [send_through] => Http
                    [mobile_no] => 11113595747
                    [device_id] => 
                    [sim_id] => 
                    [country_id] => 14
                    [gateway_id] => mimsms
                    [sender_id] => dfewrty56yu
                    [user_id] => 3
                    [message] => Do you like sport?
                    [data_type] => Plain
                    [process_status] => 0
                    [total_try] => 0
                    [response_text] => 
                    [delivery_status] => Pending
                    [created_by] => 3
                    [created_at] => 2020-06-04 21:21:55
                )

        )

)

*/


// OTP generate

// require_once('autoload.php');

// try {

// 	$lifetime = 18800; // in second
// 	$response = $apiClient->generateOtp($lifetime);
// 	if (!isset($response['otp']))
// 	{
// 		throw new Exception("Unable to generate an OTP");
// 	}

// 	$otp = $response['otp'];
// 	dd($response);
	
// } catch (Exception $e) {
	
// 	echo $e->getMessage();
// }


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



// OTP validation

// require_once('autoload.php');

// $otp = '98fde1';

// try {

// 	if (!$otp)
// 	{
// 		throw new Exception("Invalid OTP");
// 	}

// 	$response = $apiClient->validateOtp($otp);

// 	dd($response);
	
// } catch (Exception $e) {
	
// 	echo $e->getMessage();
// }

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

*/