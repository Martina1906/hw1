<?php
header('Content-Type: application/json');


function omdb(){
   
    $query = urlencode($_GET["q"]);
    $url= 'http://www.omdbapi.com/?apikey=b508cfd5&s='.$query;


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $res= curl_exec($ch);



    $json = json_decode($res, true);

    curl_close($ch);

    echo json_encode($json);


}

omdb();









?>