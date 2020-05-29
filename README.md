# All SMS Gateway API Client

### Developed by [nTechpark Technologies Ltd.](http://ntechpark.com)
### Email: admin@ntechpark.com


## Send SMS through Android Gateway

Rename `config.dist.php` file into `config.php` and
Open `config.php` and change `AUTH_KEY` and `SERVER` value  


```require_once('autoload.php');
$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

    $response = $apiClient->sendSMS('14156661234', 'This SMS from API at localhost', 'ARS-L22', 2);
    print_r($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}



/*


Output
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
                            [device_model] => ARS-L22
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
```


## Send SMS through Http gateway


```require_once('autoload.php');
$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

    $apiClient->sendThrough('http');
    $mobile_no = '8801303595747';
    $message = 'This SMS from API at localhost';
    $sender_id = 'wed63478u';
    $gateway = 'mimsms';
    $response = $apiClient->sendSMSviaHttp($mobile_no, $message, $sender_id, $gateway);
    print_r($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}



/*


Output
---------


Array
(
    [status] => Success
    [msg] => queued
)

*/
```

## OTP Generate


```require_once('autoload.php');
$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

    $response = $apiClient->generateOtp();
    if (!isset($response['otp']))
    {
        throw new Exception("Faile to generate an OTP");
    }

    $otp = $response['otp'];
    print_r($response);

    // Send SMS
    /*
    $apiClient->sendThrough('Http');
    $mobile_no = '14156661234';
    $message = 'OTP: ' . $otp;
    $sender_id = 'wed63478u';
    $gateway = 'mimsms';
    $response = $apiClient->sendSMSviaHttp($mobile_no, $message, $sender_id, $gateway);
    print_r($response);
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
```

## OTP Validate


```require_once('autoload.php');
$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

$otp = ''; // See OTP Generate section, above

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
```



## For more examples browse inside /examples folder.