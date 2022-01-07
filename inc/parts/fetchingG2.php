<?php
$URLBase = 'https://data.g2.com/api/v1/products/309cf298-0fa3-4bfb-9e22-ee8c75d4051c/product-rating';

$ch1 = curl_init($URLBase);

// set URL and other appropriate options
curl_setopt($ch1, CURLOPT_TIMEOUT, 30);
curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);


//create the multiple cURL handle
$mh = curl_multi_init();

//add the two handles
curl_multi_add_handle($mh,$ch1);


//execute the multi handle
do {
  $status = curl_multi_exec($mh, $active);
  if ($active) {
      curl_multi_select($mh);
  }
} while ($active && $status == CURLM_OK);

//close the handles
curl_multi_remove_handle($mh, $ch1);

curl_multi_close($mh);


// all of our requests are done, we can now access the results
$upcomming = curl_multi_getcontent($ch1);

//insert objs with name for easier manipulation
print_r('{"ended": '.$ended.', "upcomming" : '.$upcomming.'}');
