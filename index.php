<!DOCTYPE html>
<html lang="en">
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <style> 
    body {background-image: url('https://4.bp.blogspot.com/-nl4m3msaHQ4/W8TXh8zgjxI/AAAAAAAAEeg/UXS4btCaqBUXYuB5o-9sk0qjOG70Dhd4gCLcBGAs/s640/1510910455572.png');
                  background-position: center ;
                  background-repeat:no-repeat;
                  background-attachment:fixed;
                  background-size: cover;}
            * {box-sizing: border-box}
            
    </style>
</head>

<body>
<div class="container">
            <div class="card border-0 shadow my-5">
                <div class="card-body p-5">
                    <h1 align="center" >Hotel On Fire</h1>
                    <form action="addroom.php" method="post">
                    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">เลขห้อง</th>
      <th scope="col">ขนาดเตียง</th>
      <th scope="col">ราคา</th>
      <th scope="col">สถานะ</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>
      <input type="text" placeholder="1101" name="room" requireed>
      </th>
      <td>
      <input type="text" placeholder="king size" name="size" requireed>
      </td>
      <td>
      <input type="text" placeholder="100" name="cost" requireed>
      </td>
      <td>
      <input type="text" placeholder="avaliable" name="status" requireed>
      </td>
      <td>
      <button type="submit" class="btn btn-success">ยืนยัน</button>
      </td>
    </tr>
  </tbody>
</table>
                    </form>
<?php
$url = "http://localhost:3002/rooms";
$jsonget = json_decode(file_get_contents($url),true);


// $data = array(
//         "room" => "1103",
//         "bed_size" => "queen size",
//         "cost" => 1000,
//         "status" => "Occupy"
// );

// $jsonpost = curl_init($url);
// print_r($data);
// echo "<br>";
// $payload = json_encode(array("data"=>$data));
// print_r($payload);
// echo "<br>";echo "<br>";
// curl_setopt($jsonpost, CURLOPT_POST, 1);
// curl_setopt($jsonpost,CURLOPT_HEADER,false);
// curl_setopt($jsonpost,CURLOPT_RETURNTRANSFER,true);
// curl_setopt($jsonpost,CURLOPT_POSTFIELDS,$payload);
// curl_setopt($jsonpost,CURLOPT_HTTPHEADER,array('Content-Type:text/plain'));

// $result = curl_exec($jsonpost);
// print_r($result);

// $options = array(
//     'http://127.0.0.1:3002/rooms' => array(
//       'method'  => 'POST',
//       'content' => json_encode( $data ),
//       'header'=>  "Content-Type: application/json\r\n" .
//                   "Accept: application/json\r\n"
//       )
//   );
  
//   $context  = stream_context_create( $options );
//   $result = file_get_contents( $url, false, $context );
//   $response = json_decode( $result );

?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">เลขห้อง</th>
      <th scope="col">ขนาดเตียง</th>
      <th scope="col" style="color: #e0a800">ราคา</th>
      <th scope="col">สถานะ</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
    $i1 = 1;
    for($i=0;$i<count($jsonget["data"]);$i++){
        $room = $jsonget["data"][$i]["room"];
        $bed_size = $jsonget["data"][$i]["bed_size"];
        $cost = $jsonget["data"][$i]["cost"];
        $status = $jsonget["data"][$i]["status"];
      echo "<td>".($i+1)."</td>";
      echo "<td>".$room."</td>";
      echo "<td>".$bed_size."</td>";
      echo "<td>".$cost."</td>";
      if($status=='available'){
      echo "<td style=".'"'."color: #00FF0E".'"'."><a href=deactiveroom.php?&room=".$room.">".$status."</a></td>";}
      elseif($status=='occupy'){
        echo "<td style=".'"'."color: #FF0000".'"'."><a href=activeroom.php?&room=".$room.">".$status."</a></td>";}
        else{echo "<td style=".'"'."color: #00FF0E".'"'."><a href=deactiveroom.php?room=".$room.">available</a></td>";}
      echo "</tr>";
    }
      ?>
    </tr>
  </tbody>
</table>

                </div>
            </div>
        </div>

</body>
</html>
