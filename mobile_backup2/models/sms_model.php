<?php
class Sms_model extends Model
{   
    private static $table = 'tbl_parent';

	function __construct()
	{
		parent::__construct();
    }
    public function addMessage(){

        if($_POST['patient'] == 'all'){
            $patient = Db::loadAll(DATABASE_NAME, 'tbl_patient');
            foreach($patient as $each){
                // $this->text($each['contact_no'], $_POST['message'], 'TR-JILLI733926_LNU2X');
               $this->sms($each['contact_no'], $_POST['message'], 'TR-JILLI733926_LNU2X');
            }
        } else {
            $this->sms($_POST['patient'], $_POST['message'], 'TR-JILLI733926_LNU2X');
        }
    }
    public function allMessage(){
        $model = new Patient_model;
        $patient = $model->all();
        foreach($patient as $each){
            $this->sms($each['contact_no'], $_POST['message'], 'TR-JANLA036046_4PY3W');
        }
    }
    public function sms($number,$message,$apicode){
        $ch = curl_init();
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, 
                  http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec ($ch);
        curl_close ($ch);
    }

    function itexmo($number,$message,$apicode){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }
        
    function text($number,$message,$apicode){
            $apiKey = urlencode($apicode);
            
            // Message details
            $numbers = $number;
            $sender = urlencode('CCLinic');
            $message = rawurlencode($message);
        
            $numbers = $number;
        
            // Prepare data for POST request
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        
            // Send the POST request with cURL
            $ch = curl_init('https://api.txtlocal.com/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if(curl_errno($ch))
             echo 'Curl error: '.curl_error($ch);
            curl_close($ch);
            
            // Process your response here
            echo $response;
    }
        
}