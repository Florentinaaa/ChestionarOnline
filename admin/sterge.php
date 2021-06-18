<?php
   include_once 'connect.php';
   $result = mysqli_query($mysqli,"SELECT * FROM intrebari, raspunsuri");
  
   
   $sql= "DELETE intrebari , raspunsuri  FROM intrebari  INNER JOIN raspunsuri  
WHERE intrebari.id_intrebare= raspunsuri.id_intrebare and intrebari.id_intrebare = '" . $_GET["id_intrebare"] . "'";
   
   

    
	
     if (mysqli_query($mysqli, $sql)) {
       echo "Intrebarea a fost stearsa!";
   	header('refresh:2;url=intrebariAdmin.php');
   } else {
       echo "Incercati din nou!" . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);
   ?>