<?php
   session_start();
   
   //verifica tipul utilizatorului
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
               
                  <a href="meniuAdministrator.php"><img border="0" alt="logo" src="css/logo.png" ></a>
               
            </div>
         </div>
         <div id="navcontainer">
            <ul>
               <li><a href="meniuAdministrator.php"><span>Acasa</span></a></li>
               <li><a href="despre.php"><span>Despre</span></a></li>
               <li><a href="documentatie.php"><span>Documentatie</span></a></li>
               <li><a href="intrebariAdmin.php"><span>Intrebări</span></a></li>
               <li><a href="http://csac.ulbsibiu.ro"><span>CSAC</span></a></li>
               <li><a href="contact.php"><span>Contact</span></a></li>
            </ul>
         </div>
         <div id="left-column">
            <strong>Bine ati venit, domnule Administrator!</strong>
            <ul>
               <li> <a href="logout.php">Logout</a>
            </ul>
         </div>
         <div id="right-column">
            <p>Lasa un mesaj cu parerea ta:</p>
            <form action="contact.php" method="post">
               <table>
                  <tr>
                     <td>Numele tau:</td>
                     <td><input type="text" name="numePentruFeedback"></td>
                  </tr>
                  <tr>
                     <td>Email-ul tau:</td>
                     <td><input type="email" name="emailPentruFeedback"></td>
                  </tr>
                  <tr>
                     <td>Mesajul tau:</td>
                     <td><textarea name="mesajPentruFeedback"></textarea></td>
                  </tr>
                  <tr>
                     <td><input type="submit" name="feedback" value="Trimite"></td>
                     <td><input type="reset" value="Reseteaza"></td>
                  </tr>
               </table>
               <?php
                  include_once("connect.php");
                  include("antiinject.php");
                  
                  if (isset($_POST['feedback'])) {
                  $nume_expeditor = inject_checker($mysqli, ucwords($_POST['numePentruFeedback']));
                  $email_expeditor = inject_checker($mysqli, ucwords($_POST['emailPentruFeedback']));
                  $mesaj_expeditor = inject_checker($mysqli, ucwords($_POST['mesajPentruFeedback']));
                  
                  
                  $sql = "INSERT INTO feedback (nume_expeditor, email_expeditor, mesaj_expeditor) VALUES ('$nume_expeditor', '$email_expeditor', '$mesaj_expeditor')";
                  $rez = mysqli_query($mysqli, $sql);
                  
                  if(!$rez) {
                  echo "Mesajul tau nu a putut fi adaugat în baza de date!";
                  }
                  else {
                  echo "Mesajul tau a fost transmis cu succes!";
                  header('refresh:2;url=contact.php');
                  
                  }
                  }
                  
                  ?>
            </form>
         </div>
         <div id="footer">2020 Mitroi Florentina. All rights reserved.</div>
      </div>
   </body>
</html>