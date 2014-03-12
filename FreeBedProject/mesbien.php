<?php
session_start();
include("php/connexion.php");
if(isset($_POST["email"])){
	$email =$_POST["email"];
	$password = $_POST["password"];
	$query = "SELECT *, u.id as id_u FROM user u JOIN type t ON t.id = u.id_type WHERE email = '".$email."' AND pwd = '".$password."' ; ";
	$result = mysqli_query($connexion, $query);

	if(mysqli_num_rows($result) != 0){
		$user = mysqli_fetch_array($result);
		$_SESSION["userId"] = $user['id_u'];
		$_SESSION["typeId"] = $user["id_type"];
	}else{
		function myFunction()
		{
			alert("Mauvais mot de passe et/ou login.");
		}
	}
}


if(isset($_SESSION["userId"])){
	$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
	$result = mysqli_query($connexion, $query);
	$user = mysqli_fetch_array($result);
}


include('mesbien.html');

// lancement de la requete

$sql = 'SELECT * FROM bien WHERE id_user = ".$_SESSION['userId']. '; //texte de la requete SQL
$resultat=mysql_query($sql) or die("Pb avec la requette: ".mysql_error());
//Execute la requete SQL sur la connection actuel et la base de donnee semectionne par mysql_select_db et envoie les réponses dans $resultat

//la les résultats sont stockés en mémoire il faut aller les lire ligne par ligne avec une boucle while et mysql_fetch...

while($donnees=mysql_fetch_array($resultat){
	//et les afficher chaque ligne est contenue dans un array $donnees, chaque index de l'array est accessible par le nom du champ de ta table
	echo "premier champ de ta table ":$donnees['type']."<br />";
	echo "deuxieme champ de ta table ":$donnees['ville']."<br />";
	//etc....

}
mysql_close($conn);

?>