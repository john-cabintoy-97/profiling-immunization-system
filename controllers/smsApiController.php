<?php

class smsApiController {
    private $apicode = "TR-JOHNR062646_98UVW";
    private $passwd = "[dhgc99akk";
    private $ch;

    public function __construct(){
        $this->ch = curl_init();
    }
    public function itexmo($number,$message)
    {
        $itexmo = array('1' => $number, '2' => $message, '3' => $this->apicode, 'passwd' => $this->passwd);
        curl_setopt($this->ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,http_build_query($itexmo));
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec ($this->ch);
        curl_close ($this->ch); 
    
    }
    
}

?>