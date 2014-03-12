<?php
session_start();
include_once("php/connexion.php");

	$query =" SELECT * FROM User ";
	$resultat = mysqli_query($connexion, $query);

if( isset($_POST["proposer"])){
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

	
		$query ="INSERT INTO bien VALUES ('','".$adresse."','".$cp."','".$ville."','".$departement."','".$surface."','".$nb_piece."','".$type_b."','".$prix_s."','".$prix_n."', NOW(), '1', ".$id_user.")";
		$res = mysqli_query($connexion, $query);
	

	header('location: redirection.php');

}

if(isset($_SESSION["userId"])){
	$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
	$result = mysqli_query($connexion, $query);
	$user = mysqli_fetch_array($result);
}

	include('proposer.html');
?>