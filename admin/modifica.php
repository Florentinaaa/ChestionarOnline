<?php
   session_start();
  
   //verifica daca esti admin
   if (!isset($_SESSION["usernamex"])) {
       header("location: loginAdministrator.php");
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
            <h2>Adaugare intrebare</h2>
	     <?php 
	     	   if(isset($msg)) {
	     	      echo "<p>".$msg."</p>";
	     }
	     ?>
		
		  
		  <?php

$idintrebare = $_POST['intr'];
include "connect.php";
include("antiinject.php");

$sql="SELECT * FROM intrebari WHERE intrebari.id_intrebare='$idintrebare'";
$rez=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($rez);
?>

	     <form method="post" action="modifica_intrebare.php">
		 <p>
			<label>Intrebare </label>
			
			<input type="text" name="intreb" value="<?php echo $row['intrebare'] ?>" />
		   </p>
	     	   
		   
	     	
		   <p>
		   <input type="hidden" name="intr" value=<?php echo $idintrebare;?> />
			<input type="submit" name="submit" value="Submit" />
		   </p>
	     </form>
		 
            
         </div>
         <div id="footer">2020 Mitroi Florentina. All rights reserved.</div>
      </div>
   </body>
</html>