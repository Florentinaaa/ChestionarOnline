

<?php
$intrebare=$_POST['intreb'];
$id=$_POST['intr'];

include "connect.php";
$sql_insert="UPDATE intrebari SET intrebare='$intrebare' WHERE id_intrebare='$id'";



$rez_insert=mysqli_query($mysqli, $sql_insert);
if(!$rez_insert)
{
	echo"problema la insert!!!!!";
	die();
}
else{
header("location:intrebariAdmin.php");
}


?>