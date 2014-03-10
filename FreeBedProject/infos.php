<?php
session_start();
include("php/connexion.php");

$query ="SELECT * FROM user";
$resultat = mysqli_query($connexion, $query);

if(isset($_SESSION["userId"])){
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
			//Enregistrement en BDD
			$query = "UPDATE user SET genre = ".$genre.", nom = ".$nom.", prenom = ".$prenom.", adresse = ".$adresse.", cp = ".$cp.", ville = ".$ville.", email = ".$email.", pwd = ".$pwd.", telephone = ".$telephone." WHERE user.id = ".$_SESSION['userId'];
			$res = mysqli_query($connexion, $query);

			header('location: index.php');
		}

		else {
			echo "Fuck";
		}
	}
}

if(isset($_SESSION["userId"])){
	$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
	$result = mysqli_query($connexion, $query);
	$user = mysqli_fetch_array($result);
}

include('infos.html');
?>