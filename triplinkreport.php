<?php
//The host + port where the ScanBanServer is running
$host = "http://localhost:8080";
//The port to report eg. 80,443
$port = 80;
//The token to report (64bit)
$token = "<tokenHere>";

function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

//Prepare ip obj
$prt = array("p"=>$port, "t"=>array(0));
$ip = array("ip"=>getUserIP(), "prt"=>array($prt));
$ips = array($ip);

//Generate root obj for json
$reportObj->tk = $token;
$reportObj->st = time();
$reportObj->ips = $ips;

//Report function
function report($url, $data){
    $curl = curl_init($url."/reportnew");
    curl_setopt($curl, CURLOPT_POST, true);
    $data = json_encode($data);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}

//Do the report and check the result
$resp = report($host, $reportObj);
if (trim($resp) == "1") {

    //Success

}

?>