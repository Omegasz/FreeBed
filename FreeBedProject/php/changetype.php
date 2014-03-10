<?php
include_once("connexion.php");

	if( isset($_GET['id'])){
		$query = "UPDATE freebed.user SET id_type = 1 WHERE user.id = ".$_GET['id'];
		$resultat = mysqli_query($connexion, $query);

		if($resultat){
			include("tonpere.php");
		}else{
			echo "Tout va mal";
		}	

	}

?>