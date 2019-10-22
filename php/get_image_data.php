<?php
	$headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
              
    $headers[] = 'Connection: Keep-Alive';         
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8'; 
	$headers[] = 'Authorization:';        
    $user_agent = 'php';         
    $process = curl_init($_GET["sorg"]);         
    
curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
    curl_setopt($process, CURLOPT_HEADER, 0);         
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent); //check here         
    curl_setopt($process, CURLOPT_TIMEOUT, 30);         
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
    $return = curl_exec($process);         
    curl_close($process);         

	file_put_contents( $_GET["dest"] , $return); 

	echo $_GET["sorg"];
	echo "<br>";
	echo $_SERVER['SCRIPT_FILENAME'].$_GET["dest"];
	//write
	echo	"ok";
?>