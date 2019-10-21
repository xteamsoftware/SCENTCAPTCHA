<?php
$ch = curl_init();

$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = 'Content-Type: application/json';
$headr[] = 'Authorization: Bearer ';

$link	=	"toManuallyAnnotate";	

if ( !isset( $_GET["pilot"] ) )
{

}
else
{
	$var	= 	trim($_GET["pilot"]);

	if ( strcmp($var,"test") == 0 )
		$link =	"toManuallyAnnotate?pilot=test";
	else if ( strcmp($var,"danube") == 0 )
		$link =	"toManuallyAnnotate?pilot=danube";
	else if ( strcmp($var,"kifisos") == 0 )
		$link =	"toManuallyAnnotate?pilot=kifisos";
	else
		$link =	"toManuallyAnnotate";
}


curl_setopt($ch, CURLOPT_URL, $link );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
?>