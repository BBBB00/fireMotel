<?php 
$room = $_POST["room"];
$size = $_POST["size"];
$cost = $_POST["cost"];
$status = $_POST["status"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost:3002/rooms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "room" : "'.$room.'",
    "bed_size" : "'.$size.'",
    "cost" : '.$cost.',
    "status" : "'.$status.'"
}
',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
header("refresh:0;url=/fireMotel/index.php");exit(0);
?>