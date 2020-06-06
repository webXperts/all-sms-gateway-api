<?php


// Get SMS History
// --------------------

require_once('autoload.php');

$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);


try {
    
    $history = $apiClient->getHistory(array('filterby_send_through' => 'Http', 'filterby_gateway_id' => 'mimsms', 'filterby_from' => '2019-11-29 12:00:00', 'filterby_to' => '2020-11-29 23:59:00'));

    print_r($history);

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