<?php
session_start();
include_once("php/connexion.php");

	$query =" SELECT * FROM User ";
	$resultat = mysqli_query($connexion, $query);

if( isset($_POST["proposer"])){
	$adresse = $_POST["adresse"];
	$cp = $_POST["cp"];
	$ville = $_POST["ville"];
	$departement = $_POST["departement"];
	$surface = $_POST["surface"];
	$nb_piece = $_POST["nb_piece"];
	$type_b = $_POST["type_b"];
	$prix_s = $_POST["prix_s"];
	$prix_n = $_POST["prix_n"];
	$comment = $_POST["comment"];
	$id_user = $_SESSION["userId"];

	
		$query ="INSERT INTO bien VALUES ('','".$adresse."','".$cp."','".$ville."','".$departement."','".$surface."','".$nb_piece."','".$type_b."','".$prix_s."','".$prix_n."', NOW(), '1', '".$comment."', '', ".$id_user.")";
		$res = mysqli_query($connexion, $query);
	

	header('location: ajoutbienok.php');

}

if(isset($_SESSION["userId"])){
	$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
	$result = mysqli_query($connexion, $query);
	$user = mysqli_fetch_array($result);
}

	include('proposer.html');
?>