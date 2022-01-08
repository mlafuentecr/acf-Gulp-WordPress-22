<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://data.g2.com/api/v1/products/309cf298-0fa3-4bfb-9e22-ee8c75d4051c/product-rating',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token token=de56f8b17cfed9bd2097f10ff87a998933712c3b6319c6f15986e172c049d602',
    'Content-Type: application/vnd.api+json',
    'Cookie: __cf_bm=i79QnYYti4mncF7bshUfNWNFD4RQDW9BznfQ0_PGMRk-1641586115-0-AZsCYb87sLU7FMK9W3Y9Qx6B1VGzIpXPWkJFxAn3rvEJ2Nm2HUmVqWBM7Pfxq+jz0xEC9BYmd3pcjMCIpzXxEyQ='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
