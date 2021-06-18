<?php
   session_start();
   //verifica daca esti admin
   if (!isset($_SESSION["usernamex"])) {
       header("location: loginAdministrator.php");
   }
   ?>
   
   <?php 
   include "connect.php";
   include("antiinject.php");
if (isset($_POST['submit'])){
   //Get Post variables
   $id_intrebare = $_POST['id_intrebare'];      
   $intrebare = $_POST['intrebare'];
   $corect_raspuns = $_POST['corect_raspuns'];
   $raspunsuri = array();
   $raspunsuri[1] = $_POST['raspuns1'];
   $raspunsuri[2] = $_POST['raspuns2'];
   $raspunsuri[3] = $_POST['raspuns3'];
   

   //Question query
   $query="insert into intrebari (id_intrebare, intrebare) 
   	 values('$id_intrebare','$intrebare')";
   $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);

   //VALIDATE INSERT
   if($insert_row){
      foreach($raspunsuri as $raspuns => $valoare){
        if($valoare != ''){
	       if($corect_raspuns == $raspuns){
	          $raspuns_corect = 1;
	       } else {
	         $raspuns_corect = 0;
	       }
              $query="insert into raspunsuri (id_intrebare,raspuns,raspuns_corect) 
   	          values('$id_intrebare','$valoare','$raspuns_corect')";
              $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);
	          if($insert_row){
	            continue;
				
	          }else {
	      		die("Eroare: (".$mysqli->errno.") ".$mysqli->eerror);
	    	}
        }
    }
   $msg="Intrebarea a fost adaugata!";
  
}
}
//get total questions
$query = "select * from intrebari";
$intrebari = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$total=$intrebari->num_rows;
$next=$total+1;
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
	     <form method="post" action="inserare_intrebare.php">
	     	   <p>
			<label>Numarul intrebarii &nbsp;</label>
			<input type="number" value="<?php echo $next; ?>" name="id_intrebare" />
		   </p>
	     	   <p>
			<label>Intrebare &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="intrebare" />
		   </p>
	     	   <p>
			<label>Raspunsul 1: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="raspuns1" />
		   </p>
	     	   <p>
			<label>Raspunsul 2: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="raspuns2" />
		   </p>
	     	   <p>
			<label>Raspunsul 3: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="raspuns3" />
		   </p>
	     	   <p>
			<label>Numarul raspunsului corect </label>
			<input type="number" min="1" max="3" name="corect_raspuns" />
		   </p>
		   <p>
			<input type="submit" name="submit" value="Submit" />
		   </p>
	     </form>
		 
            
         </div>
         <div id="footer">2020 Mitroi Florentina. All rights reserved.</div>
      </div>
   </body>
</html>