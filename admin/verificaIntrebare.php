<?php

	include_once ("connect.php");
	
	$rasp=$_POST['raspuns'];
	
	$sql="SELECT *FROM raspunsuri WHERE id_raspuns = '$rasp'";
	$rez=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_array($rez);
	
	
	if($row['raspuns_corect'] == 1){
		
		echo "Raspuns corect!";
		header('refresh:2;url=intrebariAdmin.php');
	}
	else
	{
		echo "Raspuns incorect!";
		header('refresh:2;url=intrebariAdmin.php');
	}
	
	

?>