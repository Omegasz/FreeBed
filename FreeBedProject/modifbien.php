<?php
session_start();
include("php/connexion.php");

if(isset($_SESSION["userId"])){
	$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
	$result = mysqli_query($connexion, $query);
	$user = mysqli_fetch_array($result);
}

if(isset($_GET['id_b'])){
	$id_b = $_GET['id_b'];
	$sql = "SELECT * FROM Bien WHERE id_b = ". $id_b;
	$result = mysqli_query($connexion, $sql);
	$bien = mysqli_fetch_array($result);
}


if( isset($_POST["modifier"])){

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
	$id_b = $_POST["id_b"];

	if($type_b != "0"){
		$bdd = "UPDATE `bien` SET `adresse` = '".$adresse."', `cp` = '".$cp."', `ville` = '".$ville."', `departement` = '".$departement."', `surface` = '".$surface."',`nb_piece` = '".$nb_piece."', `type_b` = '".$type_b."', `prix_s` = '".$prix_s."', `prix_n` = '".$prix_n."', `comment` = '".$comment."'   WHERE `bien`.`id_b` = ".$id_b."";
		mysqli_query($connexion, $bdd) or die(mysql_error());

		header("location: modifbienok.php");
	}

}

if(isset($_POST["hide"])){
		$id_b = $_POST['id_b'];
		$query = "UPDATE bien SET bien.dispo = bien.dispo - 1 WHERE bien.id_b = ".$id_b."";
		$res = mysqli_query($connexion, $query);

	header('location: mesbien.php');
}

if(isset($_POST["display"])){
		$id_b = $_POST['id_b'];
		$query = "UPDATE bien SET bien.dispo = bien.dispo + 1 WHERE bien.id_b = ".$id_b."";
		$res = mysqli_query($connexion, $query);

	header('location: mesbien.php');
}

if(isset($_SESSION["userId"])){
	include('modifbien.html');
}

else {
	header("location: nonco.php");
}
?>