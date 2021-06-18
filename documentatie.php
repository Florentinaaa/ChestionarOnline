<?php
   session_start();
   
       
      // verifica tipul utilizatorului
   if (!isset($_SESSION["username"]) && !isset($_SESSION["usernamex"])) {
       header("location: loginUser.php");
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Cultura Generala</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" href="css/styles.css" type="text/css" />
   </head>
   <body>
      <div id="wrapper">
         <div id="header">
            <div id="logo">
               <a href="index.html"><img border="0" alt="logo" src="css/logo.png" ></a>
               </div>
         </div>
         <div id="navcontainer">
            <ul>
               <li><a href="meniuUser.php"><span>Acasa</span></a></li>
               <li><a href="despre.php"><span>Despre</span></a></li>
               <li><a href="documentatie.php"><span>Documentatie</span></a></li>
               <li><a href="intrebari.php"><span>Intrebari</span></a></li>
               <li><a href="http://csac.ulbsibiu.ro"><span>CSAC</span></a></li>
               <li><a href="contact.php"><span>Contact</span></a></li>
            </ul>
         </div>
         <div id="left-column">
            <strong>Bine ai venit, <?php echo $_SESSION['username']; ?>!</strong>
            <ul>
               <li> <a href="logout.php">Logout</a>
            </ul>
         </div>
         <div id="right-column">
            <h1>Website-uri utile pentru crearea unui website:</h1>
            <p><a href="https://www.w3schools.com/">W3SCHOOLS</a></p>
            <p><a href="http://www.google.ro/">GOOGLE</a></p>
            <p><a href="https://stackoverflow.com/">STACKOVERFLOW</a></p>
            <p><a href="http://www.youtube.com/">YOUTUBE</a></p>
         </div>
         <div id="flex-container">
            <img src="css/google.png" alt="google">
            <img src="css/youtube.png" alt="youtube">
            <img src="css/stackoverflow.png" alt="stackoverflow">
            <img src="css/w3schools.png" alt="w3schools">
         </div>
         <div id="footer">2020 Mitroi Florentina. All rights reserved.</div>
      </div>
   </body>
</html>