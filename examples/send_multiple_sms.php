<?php


// Send Multiple SMS from Android
// ----------------------


require_once('autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

    $mobile_numbers = array(
        '11110346122',
        '11113595747',
    );

    $message = 'do you like sport?';
    $device_id = 1;
    $sim_id = 1;
    $data_type = 'Plain';
    $send_at = 'now';
    $response = $apiClient->sendMultipleSMS($mobile_numbers, $message, $device_id, $sim_id, $data_type, $send_at);

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


// Example 02: for Http/Smpp

require_once('autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

 $mobile_numbers = array(
        '11110346122',
        '11113595747',
    );
    $message = 'Do you like sport?';
    $sender_id = 'dfewrty56yu';
    $country_id = 14;
    $gateway = 'mimsms';
    $data_type = 'Plain'; // Plain/Unicode
    $send_at = 'now';
    $response = $apiClient->sendMultipleSMSviaHttp($mobile_numbers, $message, $sender_id, $country_id, $gateway, $data_type, $send_at);

    dd($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}


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
