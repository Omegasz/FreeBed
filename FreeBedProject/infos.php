<?php
session_start();
include("php/connexion.php");

if(isset($_SESSION["userId"])){
$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
$result = mysqli_query($connexion, $query);
$user = mysqli_fetch_array($result);
}

if( isset($_POST["modifier"])){
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
		
	if($pwd == $pwd2){
		$bdd = "UPDATE `User` SET `genre` = '".$genre."', `nom` = '".$nom."', `prenom` = '".$prenom."', `adresse` = '".$adresse."', `cp` = '".$cp."', `ville` = '".$ville."', `pwd` = '".$pwd."', `email` = '".$email."', `telephone` = '".$telephone."' WHERE `user`.`id` = ".$_SESSION['userId'];
		mysqli_query($connexion, $bdd) or die(mysql_error());

		header("location: modifok.php");
	}

}
if(isset($_SESSION["userId"])){
	include('infos.html');
}

else {
	header("location: nonco.php");
}
?>