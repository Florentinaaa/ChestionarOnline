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
               <a href="index.html"><img border="0" src="css/logo.png" ></a>
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
            <img src="css/qmark.png" alt="qmark">
            <p>Acest site a fost creat pentru a va testa o parte din cunostintele generale.</p>
         </div>
         <div id="footer">2020 Mitroi Florentina. All rights reserved.</div>
      </div>
   </body>
</html>