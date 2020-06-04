<?php
/**
 * @package		All SMS Gateway Api
 * @author		Najmul Hossaiin (contact@ntechpark.com)
 * @copyright	Copyright (c) 2019, nTechpark Technologies Ltd.
 * @link		http://ntechpark.com
*/

/**
 * @param string $data  String data
 *
 * @return string
 */
function dd($data)
{
	echo "<pre>".print_r($data,true)."</pre>"; exit;
}

/* SMSGatewayApi class */

class SMSGatewayApi 
{
	private $authKey;

	private $server;

	private $sendThrough;

	public function __construct($authKey, $server)
	{
		$this->authKey = $authKey;
		$this->server = $server;

		$this->sendThrough = 'android';
	}

	/**
	 * @param $gateway 	android | http
	 *
	 * @return void
	 */
	public function sendThrough($gateway)
	{
		if (!in_array($gateway, array('Android', 'Http')))
		{
			throw new Exception("Invalid gateway", 1);
		}
		$this->sendThrough = $gateway;
	}

	/**
	 * @param string     $mobile_no  The mobile number where message will be sent.
	 * @param string     $message The message txt that will be sent.
	 * @param int        $device_id The id of the device to messgae will be sent.
	 * @param int 		 $sim_id  The id  of the sim to where message will be sent.
	 *
	 * @return array     Returns The array containing information about the message.
	 * @throws Exception If there is an error while sending a message.
	 */
	public function sendSMS($mobile_no, $message, $device_id, $sim_id = 99, $data_type = 'Plain')
	{
	    $url = SERVER . "/sms/send";
	    $postData = array('mobile_no' => $mobile_no, 'message' => $message, 'device_id' => $device_id, 'sim_id' => $sim_id, 'data_type' => $data_type);
	    return $this->sendRequest($url, $postData);
	}

	/**
	 * @param string     $mobile_no  The mobile number where message will be sent.
	 * @param string     $message The message txt that will be sent.
	 * @param string     $sender_id The sender_id through which to where message will be sent.
	 * @param int        $country_id The country_id to which to where message will be sent.
	 * @param striing 	 $gateway  The smsgatewaty to where message will be sent.
	 * @param striing 	 $data_type  The data_type of the message (Plain/Unicode)
	 *
	 * @return array     Returns The array containing information about the message.
	 * @throws Exception If there is an error while sending a message.
	 */
	public function sendSMSviaHttp($mobile_no, $message, $sender_id, $country_id, $gateway, $data_type = 'Plain')
	{
	    $url = SERVER . "/sms/sendViaHttp";
	    $postData = array('mobile_no' => $mobile_no, 'message' => $message, 'sender_id' => $sender_id, 'country_id' => $country_id, 'gateway_id' => $gateway, 'data_type' => $data_type);
	    return $this->sendRequest($url, $postData);
	}

	/**
	 * @param array         $mobile_numbers The mobile number where message will be sent.
	 * @param string        $message The message txt that will be sent.
	 * @param string        $device_id The model of the device to where message will be sent.
	 * @param int    		$sim_id  The id  of the sim to where message will be sent.
	 * @param string        $send_at | tomorrow | after_5_days | 30 | 60 | 120 | 300 | 1800 | 3600 | 18000
	 *
	 * @return array     Returns The array containing information about the message.
	 * @throws Exception If there is an error while sending a message.
	 */
	public function sendMultipleSMS($mobile_numbers, $message, $device_id, $sim_id = 99, $data_type = 'Plain', $send_at = 'now')
	{
	    $url = SERVER . "/sms/sendMultipleSms";
	    $postData = array('mobile_numbers' => $mobile_numbers, 'message' => $message, 'device_id' => $device_id, 'sim_id' => $sim_id, 'data_type' => $data_type, 'send_at' => $send_at);
	    return $this->sendRequest($url, $postData);
	}

	/**
	 * @param array      $mobile_numbers The mobile number where message will be sent.
	 * @param string     $message The message txt that will be sent.
	 * @param string     $sender_id The sender_id nane to where message will be sent.
	 * @param int        $country_id The country_id to which to where message will be sent.
	 * @param striing 	 $gateway  The smsgatewaty to where message will be sent.
	 * @param striing 	 $data_type  The data_type of the message (Plain/Unicode)
	 * @param string     $send_at | tomorrow | after_5_days | 30 | 60 | 120 | 300 | 1800 | 3600 | 18000
	 *
	 * @return array     Returns The array containing information about the message.
	 * @throws Exception If there is an error while sending a message.
	 */
	public function sendMultipleSMSviaHttp($mobile_numbers, $message, $sender_id, $country_id, $gateway, $data_type = 'Plain', $send_at = 'now')
	{
	    $url = SERVER . "/sms/sendMultipleViaHttp";
	    $postData = array('mobile_numbers' => $mobile_numbers, 'message' => $message, 'sender_id' => $sender_id, 'country_id' => $country_id, 'gateway_id' => $gateway, 'data_type' => $data_type, 'send_at' => $send_at);
	    return $this->sendRequest($url, $postData);
	}

	/**
	 * @param int $filter_data The data for filtering sms in queue you want to retrieve.
	 *
	 * @return array     The array containing a message.
	 * @throws Exception If there is an error while getting a message.
	 *
	 *
	 * Example
	 *
	 * $filter_data = array(
	 *  'filterby_id' => $id,
	 *  'filterby_queue_id' => $queue_id,
	 *  'filterby_send_through' => $send_through,
	 *  'filterby_mobile_no' => $mobile_no,
	 *  'filterby_gateway_id' => $gateway_id,
	 *  'filterby_sender_id' => $sender_id,
	 *  'filterby_device_id' => $device_id,
	 *  'filterby_sim_id' => $sim_id,
	 *  'filterby_status' => $status,
	 *  'filterby_schedule_from' => '2019-11-11 00:00:00',
	 *  'filterby_schedule_to' => '2019-11-12 00:00:00',
	 *  'filterby_from' => '2019-11-11 00:00:00',
	 *  'filterby_to' => '2019-11-12 00:00:00',
	 *  'limit' => $limit,
	 * );
	 */
	public function getSmsInQueue($filter_data)
	{
	    $url = SERVER . "/sms/getSmsInQueue";
	    return $this->sendRequest($url, $filter_data);
	}

	/**
	 * @param int $filter_data The data for filtering sms history you want to retrieve.
	 *
	 * @return array     The array containing a message.
	 * @throws Exception If there is an error while getting a message.
	 *
	 *
	 * Example
	 *
	 * $filter_data = array(
	 *  'filterby_id' => $id,
	 *  'filterby_status' => $status,
	 *  'filterby_send_through' => $send_through,
	 *  'filterby_gateway_id' => $gateway_id,
	 *  'filterby_sender_id' => $sender_id,
	 *  'filterby_device_id' => $device_id,
	 *  'filterby_sim_id' => $sim_id,
	 *  'filterby_mobile_no' => $mobile_no,
	 *  'filterby_from' => '2019-11-11 00:00:00',
	 *  'filterby_to' => '2019-11-12 00:00:00',
	 *  'limit' => $limit,
	 * );
	 */
	public function getHistory($filter_data)
	{
	    $url = SERVER . "/sms/getHistory";
	    return $this->sendRequest($url, $filter_data);
	}

	public function generateOtp($lifetime = null)
	{
		$url = SERVER . "/otp/generate";
	    return $this->sendRequest($url, array('lifetime' => $lifetime));
	}

	public function validateOtp($otp)
	{
		$url = SERVER . "/otp/validate";
	    return $this->sendRequest($url, array('otp' => trim($otp)));
	}

	/**
	 * @param string $url The url of request destination
	 * @param array $postData The array of post data
	 *
	 * @return mixed     The result containing mixed data
	 * @throws Exception If there is an error while sending request.
	 */
	public function sendRequest($url, $postData = array())
	{
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
	    $response = curl_exec($ch);
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    if (curl_errno($ch))
	    {
	        throw new Exception(curl_error($ch));
	    }
	    curl_close($ch);
	    if ($httpCode == 200)
	    {
	        $json = json_decode($response, true);
	        if ($json == false)
	        {
	            if (empty($response))
	            {
	                throw new Exception('Failed | Missing data in request. Please provide all the required information');

	            } 
	            else {
	                throw new Exception($response);
	            }

	        } else {
	            if ($json["status"] == 'Success')
	            {
	                return $json;

	            } 
	            else {

	                throw new Exception('Failed | ' . $json["errorMsg"]);
	            }
	        }
	    } 
	    else {

	    	$json = @json_decode($response, true);
	    	$msg = isset($json['errorMsg']) ? $json['errorMsg'] .' | ': '';
	        throw new Exception('Failed | ' . $msg . "HTTP Error Code : {$httpCode}");
	    }
	}
}