<?php
$destination = $_POST['destination'];
$courier = $_POST['courier'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=151&destination=".$destination."&weight=1&courier=".$courier,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 6f6b111416b076a6a4a5efe8de4b4bbf"
    ),
  ));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);
  $a = $data['rajaongkir']['results'];
  foreach ($a as $b) {
    $c = $b;
    // foreach ($c as $d) {
    //   # code...
    //   echo "<option value='".$d['service']."'>".$d['service']."</option>";
    // }
  }
  // print_r($c);
  echo $tes = json_encode($c, true);

}