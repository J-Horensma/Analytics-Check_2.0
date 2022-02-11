<?php
/*ANALYTICS 2.0*/
/*LIGHTER CODE THAN THE ORIGINAL*/"\r\n";
/*AND MORE OPTIONS*/"\r\n";
/*BY: JOEL HORENSMA*/"\r\n";
/*LAST UPDATED: FEB 10/2022*/"\r\n";
/*USAGE:*/"\r\n";
/*ADD HEADER BELOW IN HEAD SECTION OF PHP OR HTML*/"\r\n";
/*SEND SEC-CH REQUEST HEADERS##########################################*/"\r\n";
/*IN PHP: #############################################################*/"\r\n";
/*SIMPLY USE THIS PAGE WITH REQUIRE, IN THE TOP OF ANOTHER PHP PAGE,*/"\r\n"; 
/*LIKE SO:*/"\r\n";
/*  require 'path/to/this/page/analytics_2.0.php';  */"\r\n";
/*IN PHP, WITH HTML: ###################################################*/"\r\n";
/*<?php require 'path/to/this/page/analytics_2.0.php';  ?>*/"\r\n";
/*HTML HERE, BELOW THE REQUIRE CALL*/"\r\n";
/*THEN, REFERENCE THE VARIABLE WHEREVER, IN THE OTHER PAGE, TO DISPLAY IT*/"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/*    DESCRIPTION:      //         VARIABLE :         */"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/*USERAGENT:            //$UA                         */"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/*DATE AND TIME:        //$full_date                  */"\r\n";
/*DATE ONLY:            //$date                       */"\r\n";
/*TIME:                 //$time                       */"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/*DEVICE NAME:          //$device                     */"\r\n";
/*OS:                   //$OS                         */"\r\n";
/*OS VERSION:           //$OS_version                 */"\r\n";
/*OS BIT AMOUNT:        /$OS_bits                     */"\r\n";
/*RAM AMOUNT (8GB  MAX)://$RAM                        */"\r\n";
/*BROWSER :             //$browser                    */"\r\n";
/*IP :                  //$ip                         */"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/*SIGN UP FOR A FREE ACCOUNT AT :                     */"\r\n";
/*https://ipinfo.io/signup                            */"\r\n";
/*FOR API ACCESS, TO THE CITY, REGION, AND COUNTRY    */"\r\n";
/*VARIABLES, BELOW, THEN ADD YOUR API KEY, ON LINE    */"\r\n";
/*163.                                                */"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/*CITY:                 //$city                       */"\r\n";
/*REGION:               //$region                     */"\r\n";
/*COUNTRY:              //$country                    */"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/*LANGUAGE:             //$language                   */"\r\n";
/*CURRENT PAGE:         //$current_page               */"\r\n";
/*REFERRER:             //$referrer                   */"\r\n";
/*SCREEN RESOLUTION:    //$resolution                 */"\r\n";
/*COOKIES ENABLED?:     //$cookies                    */"\r\n";
/*////////////////////////////////////////////////////*/"\r\n";
/**/"\r\n";
/**/"\r\n";
/*REQUEST SEC-CH HEADERS###############################################*/"\r\n";
header("Accept-CH: Downlink, Sec-Ch-Ua-Model, Sec-Ch-Ua-Platform, Sec-Ch-Ua-Platform-Version, Sec-Ch-Ua-Bitness, Device-Memory, Sec-Ch-Ua");
/*////////////*/"\r\n";
/*SET TIMEZONE*/"\r\n";
/*////////////*/"\r\n";
/*USE OWN TIMEZONE*/"\r\n";
date_default_timezone_set('America/Toronto');
/*///////////////////////*/"\r\n";
/*     GET FULL DATE     */"\r\n";
/*///////////////////////*/"\r\n";
$full_date=date('Y-m-d h:i:s');
/*//////////////////*/"\r\n";
/*     GET DATE     */"\r\n";
/*//////////////////*/"\r\n";
$date=date('Y-m-d');
/*//////////////////*/"\r\n";
/*     GET TIME     */"\r\n";
/*//////////////////*/"\r\n";
$time=date('h:i:sa');
/*USERAGENT############################################################*/"\r\n";
$UA=preg_replace( '/[\W]/', ' ', apache_request_headers()['Sec-Ch-Ua']);
if(!empty($UA)){
/*IF SEC-CH USERAGENT RECIEVED#########################################*/"\r\n";
/*IF NOT APPLE, NOKIA, BLACKBERRY, LUMIA, KINDLE, JIOPHONE####*/"\r\n";
$client_network_speed=preg_replace('/[\W]/', ' ',apache_request_headers()['Downlink']).'Mbps';
/*CLIENT DEVICE MODEL*/"\r\n";
$model=preg_replace( '/[\W]/', ' ',apache_request_headers()['Sec-Ch-Ua-Model']);
/*IF SAMSUNG MODEL*/"\r\n";
if(str_contains($model,'SM T')){$device='Samsung Galaxy Tab';}
else if(str_contains($model,'GT N')){$device='Samsung Galaxy Note';}
else if(str_contains($model,'SM N')){$device='Samsung Galaxy Note';}
else if(str_contains($model,'GT I')){$device='Samsung Galaxy Phone';}
else if(str_contains($model,'SM G')){$device='Samsung Galaxy Phone';}
else if(str_contains($model,'LG')){$device='LG';}
else{$device=$model;}
/*CLIENT DEVICE OS*/"\r\n";
$OS=preg_replace( '/[\W]/', '',apache_request_headers()['Sec-Ch-Ua-Platform']);
/*CLIENT DEVICE OS VERSION#############################################*/"\r\n";
$OS_version=preg_replace( '/[\W]/', ' ',apache_request_headers()['Sec-Ch-Ua-Platform-Version']);
if(preg_match('/14 0 0/',$OS_version)){
/*IF WINDOWS 11 OS*/"\r\n";    
$OS_version='11';}
if(preg_match('/Android/i',$OS)){
/*IF ANDROID OS*/"\r\n";    
$OS_version=str_replace(' ','.',trim($OS_version));}
/*CLIENT BROWSER*/"\r\n";
if(str_contains($UA, 'Microsoft Edge')){$browser='Edge';}
else if(str_contains($UA, 'Google Chrome')){$browser='Chrome';}
else if(str_contains($UA, 'Opera')){$browser='Opera';}
/*FIREFOX DOES NOT WORK WITH SEC-CH HEADERS*/"\r\n";
/*BIT AMOUNT###########################################################*/"\r\n";
$OS_bits=preg_replace( '/[\W]/', '',apache_request_headers()['Sec-Ch-Ua-Bitness']);
/*RAM*/"\r\n";
$RAM=preg_replace( '/[\W]/', '',apache_request_headers()['Sec-Ch-Device-Memory']);
}
else if(empty($UA)&&isset($_SERVER['HTTP_USER_AGENT'])){$UA=$_SERVER['HTTP_USER_AGENT'];
/*IF SEC-CH USERAGENT NOT RECIEVED#####################################*/"\r\n";
/*IF APPLE, NOKIA, BLACKBERRY, MICROSOFT LUMIA#########################*/"\r\n";
if(str_contains($UA, 'iPhone')){
/*IF iPHONE############################################################*/"\r\n";
preg_match("/(?<=OS ).*?(?=[ ])/s", $UA, $OS_version);
$device='iPhone';$OS='iOS';$OS_version=str_replace('_','.',$OS_version[0]);}
else if(str_contains($UA, 'iPod')){
/*IF iPOD##############################################################*/"\r\n";
$device='iPod';$OS='iOS';$OS_version=str_replace('_','.',$OS_version[0]);}
else if(str_contains($UA, 'iPad')){
/*IF iPAD##############################################################*/"\r\n";
$device='iPad';$OS='iOS';$OS_version=str_replace('_','.',$OS_version[0]);}
else if(str_contains($UA, 'Nokia')){
/*IF NOKIA#############################################################*/"\r\n";
$device='Nokia';}
else if(str_contains($UA, 'BB')|str_contains($UA, 'RIM')){
/*IF BLACKBERRY########################################################*/"\r\n";
if(str_contains($UA, 'PlayBook')){$device='Blackberry Playbook';}
else{$device='Blackberry';}
if(preg_match("/(?<=OS ).*?(?=[ ])/s", $UA, $OS_version)){
$OS='Blackberry OS';$OS_version=str_replace(';','',$OS_version[0]);}
}
else if(preg_match("/(?<=Microsoft; Lumia ).*?(?=[ ])/s", $UA, $device)){
/*IF MICROSOFT LUMIA###################################################*/"\r\n";
$device='Microsoft Lumia '.str_replace(')','',$device[0]);
if(preg_match("/(?<=Android ).*?(?=[ ])/s", $UA, $OS_version)){
$OS='Android';
$OS_version=str_replace(';','',$OS_version[0]);}
}
else if(preg_match("/(?<=NOKIA; Lumia).*?(?=[ ])/s", $UA, $device)){
/*IF NOKIA LUMIA#######################################################*/"\r\n";
$device='Nokia Lumia '.str_replace(')','',$device[0]);
if(preg_match("/(?<=Windows Phone ).*?(?=[ ])/s", $UA, $OS_version)){
$OS='Windows Phone OS';
$OS_version=str_replace(';','',$OS_version[0]);}
}
}
/*//////////////////*/"\r\n";
/*  GET IP ADDRESS  */"\r\n";
/*//////////////////*/"\r\n";
if(isset($_SERVER['HTTP_CLIENT_IP'])){$ip=$_SERVER['HTTP_CLIENT_IP'];}
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];}
else if(isset($_SERVER['HTTP_X_FORWARDED'])){$ip=$_SERVER['HTTP_X_FORWARDED'];}
else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){$ip=$_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];}
else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){$ip=$_SERVER['HTTP_FORWARDED_FOR'];}
else if(isset($_SERVER['HTTP_FORWARDED'])){$ip=$_SERVER['HTTP_FORWARDED'];}
else if(isset($_SERVER['REMOTE_ADDR'])){$ip = $_SERVER['REMOTE_ADDR'];}
/*/////////////////////*/"\r\n";
/*   GET IP LOCATION   */"\r\n";
/*/////////////////////*/"\r\n";
/*SIGN UP FOR A FREE ACCOUNT AT: https://ipinfo.io/signup*/"\r\n";
/*COMMERCIAL USE WITH A FREE ACCOUNT ALLOWED*/"\r\n";
/*UP TO 50,000 REQUEST/MONTH WITH A FREE ACCOUNT*/"\r\n";
/*SET YOUR API TOKEN*/"\r\n";
$token="YOUR API TOKEN, HERE";
$ipinfo=file_get_contents("https://ipinfo.io/".$ip."?token=". $token);
$json=json_decode($ipinfo);
$city=$json->city;
$region=$json->region;
$country=$json->country;
/*//////////////////////////////////*/"\r\n";
/*  GET CLIENT BROWSERS LANGUAGE    */"\r\n";
/*//////////////////////////////////*/"\r\n";
$language="<script>document.write(navigator.language);</script>";
if(isset($language)){$language=$language;}
/*//////////////////*/"\r\n";
/*   GET REFERRER   */"\r\n";
/*//////////////////*/"\r\n";
$referrer=$_SERVER['HTTP_REFERER'];
/*//////////////////*/"\r\n";
/* GET CURRENT PAGE */"\r\n";
/*//////////////////*/"\r\n";
$current_page=$_SERVER['PHP_SELF'];
/*////////////////////*/"\r\n";
/*  GET SCREEN SIZE   */"\r\n";
/*////////////////////*/"\r\n";
$resolution="<script>document.write(screen.width + ' ' + 'X' + ' ' + screen.height);</script>";
/*/////////////////////*/"\r\n";
/*  COOKIES ENABLED?   */"\r\n";
/*/////////////////////*/"\r\n";
$cookies="<script>document.write(navigator.cookieEnabled);</script>";
if(isset($_SERVER['HTTP_USER_AGENT'])){
if(str_contains($UA, 'Firefox')){$browser='Firefox';}
if(str_contains($UA,'Opera')){$browser='Opera';}
else if(str_contains($UA,'OPR')){$browser='Opera';}  
}
/*IF UNKNOWN###########################################################*/"\r\n";
if(empty($UA)){$UA='Unknown';}if(empty($device)){$device='Unknown';}
if(empty($OS)){$OS='Unknown';}if(empty($OS_version)){$OS_version='Unknown';}
if(empty($OS_bits)){$OS_bits='Unknown';}if(empty($RAM)){$RAM='Unknown';}
if(empty($browser)){$browser='Unknown';}if(empty($model)){$model='Unknown';}
if(empty($ip)){$ip='Unknown';}if(empty($city)){$city='Unknown';}
if(empty($region)){$region='Unknown';}if(empty($country)){$country='Unknown';}
if(empty($language)){$language='Unknown';}if(empty($referrer)){$referrer='Unknown';}if(empty($current_page)){$current_page='Unknown';}
if(empty($resolution)){$resolution='Unknown';}if(empty($cookies)){$cookies='Unknown';}
?>
