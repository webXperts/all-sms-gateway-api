<?php

// require_once('autoload.php');

// try {

//     // $apiClient->sendThrough('http');
//     $mobile_no = '8801737346122';
//     $message = 'This SMS from API at localhost';
//     $sender_id = 'wed63478u';
//     $gateway = 'mimsms';

//     $response = $apiClient->sendSMSviaHttp($mobile_no, $message, $sender_id, $gateway);

//     print_r($response);

// } catch (Exception $e) {
    
//     echo $e->getMessage();
// }


/*

Output in Success
---------

Array
(
    [status] => Success
    [msg] => queued
)

*/



// require_once('autoload.php');


// try {
    
//     $history = $apiClient->getHistory(array('filterby_send_through' => 'http', 'filterby_gateway' => 'mimsms', 'filterby_from' => '2019-11-29 12:00:00', 'filterby_to' => '2020-11-29 23:59:00'));
//     print_r($history);
// } catch (Exception $e) {
    
//     echo $e->getMessage();
// }


require_once('autoload.php');

try {
    
    $sms_in_queue = $apiClient->getSmsInQueue(array('filterby_send_through' => 'http', 'filterby_gateway' => 'mimsms', 'filterby_from' => '2019-11-29 12:00:00', 'filterby_to' => '2020-11-29 23:59:00'));
    print_r($sms_in_queue);
} catch (Exception $e) {
    
    echo $e->getMessage();
}


