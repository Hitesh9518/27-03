<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<?php

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
        $res = json_decode($response, true);
        // echo $res;
    }

    $row = $res['articles'];

    foreach ($row as $key => $value) {
        
    echo    '<div class="container-fluid d-flex justify-content-center mt-5">
                <div class="card mb-1" style="max-width: 640px;">
                    <div class="row g-0 p-3">
                        <div class="col-md-12">
                            <h5 class="card-title mt-1 mb-2">'.$value['title'].'</h5>
                        </div>
                        <div class="col-md-4 mt-auto mb-auto">
                            <img src="'.$value['urlToImage'].'" class="img-fluid rounded-start" width="200px" height="200px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><small class="text-muted">'.$value['author'].'</small></p>
                                <p class="card-text">'.$value['description'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }

    ?>
    
    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>