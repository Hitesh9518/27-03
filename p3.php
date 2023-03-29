<?php
// error_reporting(0);

function pre($data){
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

// include('/vendor/autoload.php');

echo "<table border='2'>
<tr>
  <th>Type</th>
  <th>Name</th>
  <th>Value</th>
  <th>Meaning_up</th>
  <th>Meaning_rev</th>
  <th>Desc</th>
</tr>
";

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://tarot-api.onrender.com/api/v1/cards",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    // echo $response;
    $res = json_decode($response,true);
    // echo $res;
}

// pre($res);
$row = $res['cards'];

foreach ($row as $key => $value) {
    echo "<tr>
        <td>".$value['type']."</td>
        <td>".$value['name']."</td>
        <td>".$value['value']."</td>
        <td>".$value['meaning_up']."</td>
        <td>".$value['meaning_rev']."</td>
        <td>".$value['desc']."</td>
      </tr>";
}
echo "</table>";
?>