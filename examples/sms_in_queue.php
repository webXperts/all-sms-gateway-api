<?php


// Get SMS in Queue
// ---------------------

require_once('autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {
    
    $sms_in_queue = $apiClient->getSmsInQueue(array('filterby_send_through' => 'Http', 'filterby_gateway_id' => 'mimsms', 'filterby_from' => '2019-11-29 12:00:00', 'filterby_to' => '2020-11-29 23:59:00'));
    
    print_r($sms_in_queue);

} catch (Exception $e) {
    
    echo $e->getMessage();
}


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