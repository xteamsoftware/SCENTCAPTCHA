<?php

$curl = curl_init();

$filetocurl = file_get_contents();

if ( $filetocurl == null )
	die( "video upload issue");



curl_setopt_array($curl, array(
  CURLOPT_URL => "/api/videos",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"json\"\r\n\r\n{\"imageId\":0,\"geoCamCoor\": {\"latitude\":45.217612,\"longitude\":29.194275,\"elevation\":0,\"accuracy\":0},\"takenAt\":".time().",\"angCamOrient\": {\"Az\": 12,\"Alt\": 9},\"source\": {\"type\": \"scentUser\",\"Id\": \"1\",\"crowdURI\":\"https://imagecloudstorage.scent-project.eu/kifisos/image/2176758335.jpg\"},\"status\": \"New\",\"statusDesc\": \"status\",\"classification\": {\"explore\": {\"userId\": 1,\"objects\": [{\"tag\":\"Trees\",\"distanceToObject\":50,\"status\":\"undecided\"}]}}}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"image\"; filename=\"http://www.xteamsoftware.com/scent/wp-content/uploads/delta.jpg\"\r\nContent-Type: image/jpeg\r\n
$filetocurl
------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer b4ad7d5a-e345-463f-8dc3-ff599cf02042",
    "Cache-Control: no-cache",
    "Postman-Token: c68c1354-e5de-4740-883c-2cdf88d3cc2b",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>