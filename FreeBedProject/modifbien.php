<?php
session_start();
include("php/connexion.php");

if(isset($_SESSION["userId"])){
$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
$result = mysqli_query($connexion, $query);
$user = mysqli_fetch_array($result);
}

if( isset($_POST["modifier"])){
	$type = $_POST["type"];
	$adresse = $_POST["adresse"];
	$cp = $_POST["cp"];
	$ville = $_POST["ville"];
	$departement = $_POST["departement"];
	$surface = $_POST["surface"];
	$prix_s = $_POST["prix_s"];
	$prix_n = $_POST["prix_n"];
	$nb_piece = $_POST["nb_piece"];
	$id_user = $_SESSION["userId"];
		
		$bdd = "UPDATE `bien` SET '','".$adresse."','".$cp."','".$ville."','".$departement."','".$surface."','".$nb_piece."','".$type_b."','".$prix_s."','".$prix_n."', NOW(), '1', '', ".$id_user."";
		mysqli_query($connexion, $bdd) or die(mysql_error());

		header("location: modifok.php");
	

}
if(isset($_SESSION["userId"])){
	include('modifbien.html');
}

else {
	header("location: nonco.php");
}
?>