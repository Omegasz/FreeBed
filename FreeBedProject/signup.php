<?php
include_once("php/connexion.php");

	$query =" SELECT * FROM Type ";
	$resultat = mysqli_query($connexion, $query);

if( isset($_POST["inscription"])){
	$genre = $_POST["genre"];
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$adresse = $_POST["adresse"];
	$cp = $_POST["cp"];
	$ville = $_POST["ville"];
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];
	$email = $_POST["email"];
	$telephone = $_POST["telephone"];
	$type = 2;

	if($pwd == $pwd2 && $type != "0"){
		//Enregistrement en BDD
		$query ="INSERT INTO User VALUES ('','".$genre."','".$nom."','".$prenom."','".$adresse."','".$cp."','".$ville."','".$pwd."','".$email."','".$telephone."',".$type.")";
		$res = mysqli_query($connexion, $query);
	}

	header('location: redirection.php');

}
	include('signup.html');
?>