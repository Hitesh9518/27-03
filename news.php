<?php
// error_reporting(0);

function pre($data){
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

echo "<table border='2'>
<tr>
  <th>Author</th>
  <th>Title</th>
  <th>Description</th>
  <th>UrlToImage</th>
  <th>Content</th>
</tr>
";

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://saurav.tech/NewsAPI/top-headlines/category/health/in.json",
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

$row = $res['articles'];

foreach ($row as $key => $value) {
    echo "<tr>
        <td>".$value['author']."</td>
        <td>".$value['title']."</td>
        <td>".$value['description']."</td>
        <td>"."<img src='".$value['urlToImage']."' width='100px' height='100px'>"."</td>
        <td>".$value['content']."</td>
      </tr>";
}

?>

<!-- <img src='' width='100px' height='50px'> -->