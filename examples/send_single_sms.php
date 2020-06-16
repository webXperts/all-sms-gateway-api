<?php


// Send Single SMS Android gateway
// --------------------


require_once('autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

 $mobile_no = '11110346122';
 $message = 'do you like sport?';
 $device_id = 1;
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


// Send Single SMS through Http/SMPP gateway
// --------------------


require_once('autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

    $mobile_no = '11110346122';
    $message = 'do you like sport?';
    $sender_id = 'dfewrty56yu';
    $country_id = 14;
    $gateway = 'mimsms';
    $data_type = 'Plain'; // Plain/Unicode
    $response = $apiClient->sendSMSviaHttp($mobile_no, $message, $sender_id, $country_id, $gateway, $data_type);

    dd($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}


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