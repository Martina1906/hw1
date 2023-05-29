<?php

require_once 'auth.php';

if(!$userid = checkAuth()) exit;

header('Content-Type: application/json');


$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$userid = mysqli_real_escape_string($conn, $userid);


$next = isset($_GET['from']) ? 'AND film.id < '.mysqli_real_escape_string($conn, $_GET['from']).' ' :'';



$query = "SELECT user as userid, id AS filmid, content AS content FROM films WHERE user = $userid ORDER BY filmid";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$filmArray = array();
while($entry = mysqli_fetch_assoc($res)) {

    $filmArray[] = array('userid' => $entry['userid'],
                         'filmid' => $entry['filmid'], 'content' => json_decode($entry['content']));
}


echo json_encode($filmArray);

exit;








?>