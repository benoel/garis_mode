<?php
$_POST['destination'];
$_POST['courier'];
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"key: 6f6b111416b076a6a4a5efe8de4b4bbf"
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