<?php
include_once("connexion.php");

if( isset($_GET['id'])){
	$query = "DELETE FROM User WHERE id = ".$_GET['id'];
	$resultat = mysqli_query($connexion, $query);
	if($resultat){
		header("location: ../redirectiondeco.php");
	}else{
		echo "Tout va mal";
	}
}

?>