<?php

// $file = 'test.txt';

// header('Content-Description: File Transfer');
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="'.basename($file).'"');
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Length: ' . filesize($file));
// readfile($file);

// ignore_user_abort(true);
// unlink($file);

// echo $_SERVER['SERVER_NAME'];
// echo 'https://'.$_SERVER['SERVER_NAME'].'/file=';




















// $long_url = 'https://stackoverflow.com/questions/ask';
// $apiv4 = 'https://api-ssl.bitly.com/v4/bitlinks';
// $genericAccessToken = 'f7b23ac648483e62c87b8681af6787bfdb6a17d3';

// $data = array(
//     'long_url' => $long_url
// );
// $payload = json_encode($data);

// $header = array(
//     'Authorization: Bearer ' . $genericAccessToken,
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($payload)
// );

// $ch = curl_init($apiv4);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
// $result = curl_exec($ch);

// // print_r($result);

// // json_decode($result, true);
// $result = json_decode($result, true);

// if ( array_key_exists( 'link', $result ) ){
//     return $result['link'];
// } else {
//     return $long_url
// }
    































$url = urlencode('https://stackoverflow.com');
$json = file_get_contents('https://cutt.ly/api/api.php?key=2aa8f088ef9ea9912ace5c95b18f433b5efa0&short='.$url);
$data = json_decode($json,true);

// var_dump($data);
// print_r($data);

if( $data['url']['status'] == 7 ){
    return  $data['url']['shortLink'];
} else {
    
}





