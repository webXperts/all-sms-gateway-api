# All SMS Gateway API Client

### Developed by [nTechpark Technologies Ltd.](http://ntechpark.com)
### Email: admin@ntechpark.com


## Send SMS through Android Gateway

Rename `config.dist.php` file into `config.php` and
Open `config.php` and change `AUTH_KEY` and `SERVER` value  


```require_once('autoload.php');
$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

 $mobile_no = '01737346122';
 $message = 'do you like sport?';
 $device_id = 1;
 $sim_id = 99;
 $data_type = 'Plain';
    $response = $apiClient->sendSMS($mobile_no, $message, $device_id, $data_type);
    
    print_r($response);

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
```


## Send SMS through Http/SMPP gateway


```require_once('autoload.php');
$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

 $mobile_no = '01737346122';
 $message = 'do you like sport?';
 $sender_id = 'dfewrty56yu';
 $country_id = 14;
 $gateway = 'mimsms';
 $data_type = 'Plain'; // Plain/Unicode
 $response = $apiClient->sendSMSviaHttp($mobile_no, $message, $sender_id, $country_id, $gateway, $data_type);

 print_r($response);

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
```

## OTP Generate


```require_once('autoload.php');
$apiClient = new SMSGatewayApi(AUTH_KEY, SERVER);

try {

    $lifetime = 18800; // in second
    $response = $apiClient->generateOtp($lifetime);
    if (!isset($response['otp']))
    {
        throw new Exception("Unable to generate an OTP");
    }

    $otp = $response['otp'];
    print_r($response);
    
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
```

## OTP Validation


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
    
    echo $e->getMessage();
}

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
```



## For more examples browse inside /examples folder.