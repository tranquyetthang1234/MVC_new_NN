<?php session_start();
require_once "config.php";

$cname = $action ='';
$params = NULL;
$url = $_SERVER['REQUEST_URI'];
$kq = tach_url($url, $cname, $action, $params);
if (class_exists($cname,true)==true) $c = new $cname($action, $params);
else die('Khong co controller ' . $cname);	

if (method_exists($c,$action)) $c ->$action();
else die('Không có action '.$action);	



function __autoload($class_name) {
   $filename = "class/".$class_name . '.php';	
   if (file_exists($filename)) require_once($filename); 
}//autoload
function tach_url($url, &$cname, &$action, &$params){
$arr = explode("/", $url); if (count($arr)<=2) return FALSE;
$cname = $arr[2]; 						
if ($cname=="") {  
   $cname=DEFAULT_CONTROLLER; $action=DEFAULT_ACTION; $params=NULL;return TRUE;
}	
$action = $arr[3]; 
if ($action==""){ $action=DEFAULT_ACTION;	$params=NULL; return TRUE; }
array_shift($arr); array_shift($arr);
array_shift($arr); array_shift($arr);
$params=$arr; 
return TRUE;
} //tach_url
