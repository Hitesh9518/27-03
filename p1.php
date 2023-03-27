<?php
    // $url = "https://google.com";  

    // $ch = curl_init();
    // curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    // curl_setopt($ch,CURLOPT_URL,$url);
    // $result = curl_exec($ch);
    // echo $result;
?>

<?php

    $data = array(
        'name' => 'hitesh'
    );
    echo json_encode($data);
?>