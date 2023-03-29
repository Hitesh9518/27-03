<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
        <p>Search By : smartphones ,laptops ,fragrances ,skincare ,groceries ,home-decoration ,furniture ,tops ,womens-dresses ,womens-shoes ,mens-shirts ,mens-shoes ,mens-watches ,womens-watches ,womens-bags ,womens-jewellery ,sunglasses ,automotive ,motorcycle ,lighting ...</p>
    <br>
    <form method="post">
        Search : <input type="text" id="search" name="search">
        <input type="submit" name="submit">
    </form><br><br>
</body>
</html>
<?php
error_reporting(0);

if(isset($_POST['submit'])){
    $search = $_POST['search'];

function pre($data){
    echo "<pre>";
        print_r($data);
    echo "</pre>";
}

echo "<table border='2'>
<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Price</th>
    <th>Brand</th>
    <th>Thumbnail</th>
    <th>Category</th>
    <th>Other Images</th>
</tr>
";

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://dummyjson.com/products/category/$search",
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
// echo $res['products'];
$row = $res['products'];

foreach ($row as $key => $value) {
    echo "<tr>
        <td>".$value['title']."</td>
        <td>".$value['description']."</td>
        <td>".$value['price']."</td>
        <td>".$value['brand']."</td>
        <td>"."<img src='".$value['thumbnail']."' width='100px' height='100px'>"."</td>
        <td>".$value['category']."</td>";
    foreach ($value['images'] as $key => $img) {
        echo "<td>"."<img src='".$img."' width='100px' height='100px'>"."</td>";
    }
      echo "</tr>";
}
}