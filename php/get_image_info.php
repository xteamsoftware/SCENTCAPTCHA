<?php
$ch = curl_init();

$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = 'Content-Type: application/json';
$headr[] = 'Authorization: Bearer';

curl_setopt($ch, CURLOPT_URL, "api/images?id=".$_GET["id"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

?>