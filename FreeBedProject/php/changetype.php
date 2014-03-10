<?php
session_start();
include("connexion.php");

	$query =" SELECT * FROM user ";
	$resultat = mysqli_query($connexion, $query);

if(isset($_SESSION["userId"])){
	if(isset($_POST["changer"])){
		$query = "UPDATE user SET user.id_type = user.id_type - 1 WHERE user.id = ".$_SESSION['userId'];
		$res = mysqli_query($connexion, $query);

		header('location: ../redirectiondeco.php');
	}

	else  {
		echo "FUUUUUUUU";
	}
}

else{
	echo "Fuck.";
}
?>