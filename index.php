<?php
require_once('config.php');

if(isset($_REQUEST['htaccess']) && ! empty($_REQUEST['htaccess'])){
	echo '<h1>Copy the following into your .htaccess file</h1>';
	foreach($ERROR_LIBRARY as $key=>$val){
		echo 'ErrorDocument '.$key.' '.$_REQUEST['htaccess'].'index.php?error='.$key.'<br />';
	}
	die();
}

// Tries to determine the error status code encountered by the server
$AA_STATUS_CODE = (!isset($_REQUEST['error'])) ? '404' : $_REQUEST['error'];
if(isset($_SERVER['REDIRECT_STATUS']) && $_SERVER['REDIRECT_STATUS']!='200') $AA_STATUS_CODE = $_SERVER['REDIRECT_STATUS'];
$AA_REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
$AA_THE_REQUEST = htmlentities(strip_tags($_SERVER['REQUEST_URI']));

$TO_RECORD = array(
	'time' => TIME,
	'http_host' => $_SERVER['HTTP_HOST'],
	'server_name' => $_SERVER['SERVER_NAME'],
	'uri' => $_SERVER['REQUEST_URI'],
	'server_ip' => $_SERVER['SERVER_ADDR'],
	'remote_ip' => $_SERVER['REMOTE_ADDR'],
	'method' => $_SERVER['REQUEST_METHOD'],
	'https' => (! isset($_SERVER['HTTPS']) && ! empty($_SERVER['HTTPS'])) ? true : false,
	'user_agent' => $_SERVER['HTTP_USER_AGENT'],
	'referer' => (isset($_SERVER["HTTP_REFERER"])) ? $_SERVER["HTTP_REFERER"] : '',
	'languate' => $_SERVER['HTTP_ACCEPT_LANGUAGE']
);

/*
	Remember for behind a proxy statistics
	If you are serving from behind a proxy server, you will almost certainly save time by looking at what these $_SERVER variables do on your machine behind the proxy.   

	$_SERVER['HTTP_X_FORWARDED_FOR'] in place of $_SERVER['REMOTE_ADDR']

	$_SERVER['HTTP_X_FORWARDED_HOST'] and 
	$_SERVER['HTTP_X_FORWARDED_SERVER'] in place of (at least in our case,) $_SERVER['SERVER_NAME']
*/

if(isset($ERROR_LIBRARY[$AA_STATUS_CODE])){
	$AA_REASON_PHRASE = $ERROR_LIBRARY[$AA_STATUS_CODE][0];
	$AA_M_SR=array(array('INTERROR','THEREQUESTURI','THEREQMETH'), array('The server encountered an internal error or misconfiguration and was unable to complete your request.',$AA_THE_REQUEST,$AA_REQUEST_METHOD));
	$AA_MESSAGE=str_replace($AA_M_SR[0],$AA_M_SR[1],$ERROR_LIBRARY[$AA_STATUS_CODE][1]);
}else{
	$AA_REASON_PHRASE = 'Undefined';
	$AA_M_SR = 'Undefiend';
	$AA_MESSAGE = 'Undefined';
}

@header("HTTP/1.1 $AA_STATUS_CODE $AA_REASON_PHRASE",1);
@header("Status: $AA_STATUS_CODE $AA_REASON_PHRASE",1);

if(TRACK) logError($TO_RECORD);

if(SHOWMESSAGE) require_once(DOC_ROOT . '/theme.php');
?>
