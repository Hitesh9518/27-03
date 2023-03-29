<?php
// // $json = '{"1":"a","20":"b","4":"c"}';
// // $json = '["A","B","C"]';
// $json = '{"name":"Hit","address":{"state":"gujarat","city":"surat"}}';
// // print_r(json_decode($json));

// $str = "hi good morning";
// // print_r(explode(' ',$str));

// $keyword = preg_split('/[\s,]+/','a,b,c');
// // print_r($keyword);

// $str2 = "hello";
// $a = str_split($str2,3);
// // print_r($a);

// $json1 = array("A","B","C");
// print_r(json_encode($json1));
// echo implode('|',$json1);
// array_push($json1,"D","E");
// print_r($json1);
// // echo sizeof($json);
// // echo var_dump($json);

// // echo mb_strtolower('Characters: Ü, É, Ä');

// // echo strcasecmp('Pineapple', 'pineapple');

// echo strlen("✅PHP");
// echo "<br>";
// echo mb_strlen("✅PHP");
// echo "<br>";
// echo "<br>";

// function f1($val){
//     return ($val * 2);
// }
// $array = array(1,2,3,4,5);
// print_r(array_map("f1",$array));

// echo "<br>";

// $str3 = "hi hello good morning";
// $res = substr($str3,4);

// echo $str3."<br>";
// echo $res;

$ch = curl_init();
$url = "http://192.168.29.77/hitesh/other_practice/p1.php";

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo curl_error($ch);
}
else{
    echo $result;
    $decoded = json_decode($result);
    print_r($decoded);
    echo "<br>";
    $decoded = json_decode($result,true);
    print_r($decoded);
}
curl_close($ch);
?>