<?php

require_once 'auth.php';

if(!$userid = checkAuth()) exit;

omdb();



function omdb(){
    global $dbconfig, $userid;

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    


    



    $userid = mysqli_real_escape_string($conn, $userid);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $runtime = mysqli_real_escape_string($conn, $_POST['runtime']);
    $poster = mysqli_real_escape_string($conn, $_POST['poster']);


    $query = "SELECT * FROM films WHERE user = '$userid' AND film_id = '$id'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if(mysqli_num_rows($res) > 0){
        echo json_encode(array('ok' => true));
        exit;
    }

    #eseguo

    $query = "INSERT INTO films(user, film_id, content) VALUES('$userid', '$id', JSON_OBJECT('id', '$id', 'title', '$title', 'year', '$year', 'genre', '$genre', 'runtime', '$runtime', 'poster', '$poster'))";
    error_log($query);


    if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
        exit;
    }

    mysqli_close($conn);
    echo json_encode(array('ok' => false));
}









?>