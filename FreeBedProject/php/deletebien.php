<?php
include_once("connexion.php");

if( isset($_GET['id_b'])){
	$query = "DELETE FROM Bien WHERE id_b = ".$_GET['id_b'];
	$resultat = mysqli_query($connexion, $query);
	if($resultat){
		header("location: ../redirectionsupbien.php");
	}else{
		echo "Tout va mal";
	}
}

?>