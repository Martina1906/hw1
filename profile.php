<?php
require_once 'auth.php';
if(!$userid = checkAuth()){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT * FROM users WHERE id = $userid";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);
     ?>
<head>
    <link rel='stylesheet' href='profile.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Marvel">
    <script src='profile.js' defer></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCU - <?php echo $userinfo['name']." ".$userinfo['surname']?></title>
</head>
<body>
<header>
        <nav>
            <div id="logo">
            <img src="hulk2.png"/>
            </div>
            <div id="links">
                <a>HOME</a>
                <a>DISCOVER</a>
                <a>ABOUT</a>
                <div id="linea"></div>
                <a href='profile.php' class='button1'>QUIZ</a>
                <a href='logout.php' class='button'>LOGOUT</a>
</div>
<div id="menu">
<div></div>
<div></div>
<div></div>
</div>

</nav>
<div class="info">
   
    <h1>BENTORNATO!<br><?php echo $userinfo['name']." ".$userinfo['surname']?></h1>
</div>
</header>

<section class="ris_ricerca">
    <div id="results"></div>
</section>


    
</body>
</html>
<?php
 mysqli_close($conn);

?>