<?php
   require_once 'auth.php';
    if(!$userid = checkAuth()){
       header("Location: login.php");
    }


?>







<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="home.css">
<script src="home.js" defer="true"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME MCU</title>
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
                <a href='profile.php'>PROFILO</a>
                <a href='logout.php' class='button'>LOGOUT</a>
</div>
<div id="menu">
<div></div>
<div></div>
<div></div>
</div>
</nav>
</header>
<h1>Abbiamo selezionato una lista film Marvel per te</h1>

<section id="main">


    

    <div id="avengers">
        
        <img src="Avengers2.png">
        <a href="html2.html">Clicca qui!</a>
</div>

</section>

<h1>Se non sei ancora soddisfatto qui puoi cercare il film che preferisci</h1>
  
  <form id="films">
    <h3>Titolo: </h3>
    <input type="text" id="film" />
    <input type="submit" id="submit0" value="Cerca" />
  </form>

  <section id="ris_ricerca"></section>



<footer>
    <span> Powered by Martina Pirri O46001617</span>


</footer>
</body>
</html>