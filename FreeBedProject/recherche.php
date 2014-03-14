<?php
session_start();
include("php/connexion.php");
if(isset($_POST["email"])){
	$email =$_POST["email"];
	$password = $_POST["password"];
	$query = "SELECT *, u.id as id_u FROM user u JOIN type t ON t.id = u.id_type WHERE email = '".$email."' AND password = '".$password."' ; ";
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



if(isset($_POST["rechercher"])){
	$type = $_POST["type"];
	$prix_min = $_POST["prix_min"];
	$prix_max = $_POST["prix_max"];
	$nb_piece = $_POST["nb_piece"];
	$surface_min = $_POST["surface_min"];
	$surface_max = $_POST["surface_max"];
	$departement = $_POST["departement"];
	$bien = NULL;

	$query = "SELECT * FROM bien WHERE (type_b = '".$type."' 
								 AND prix_s BETWEEN '".$prix_min."' AND '".$prix_max."' 
								 OR nb_piece = '".$nb_piece."' 
								 OR surface BETWEEN '".$surface_min."' AND '".$surface_max."' 
								 OR departement = '".$departement."');";

	$resultat = mysqli_query($connexion, $query);


	while($row = mysqli_fetch_array($resultat)) { 
	$bien  .= 
	'<table style="width:800px;height: 40px;" class="titletable">
		<tr> 
			<td colspan="2"><h2><span class="titlerecherche"> Location ' . $row['type_b'] . ' ' . $row['surface'] . ' m² ' . $row['ville'] . '</span></h2></td>
			<td style="vertical-align: bottom;"> Prix Nuit : ' . $row['prix_n'] . ' € </td>
		</tr>

		<tr>
			<td style="width: 150px;"><div class="photo"><img src="' . $row['photo'] . '"/></div></td>
			<td style="width: 475px;border-right: 20px solid transparent;border-left: 20px solid transparent;">'. $row['comment'] . '</td>
			<td style="width: 175px;vertical-align: top;"> Prix Semaine : ' . $row['prix_s'] . ' € </td>
		</tr>
	</table>';
	}

	include('resultat.html');
}else{


//WHERE type_b = 'maison' AND prix_s BETWEEN '50' AND '1000' AND nb_piece = '3' AND surface BETWEEN '5' AND '1000' AND departement = '94'
//SELECT type_b, surface, ville, prix_n, prix_s, photo FROM bien WHERE type_b = '".$type."' AND prix_s BETWEEN '".$prix_min."' AND '".$prix_max."' AND nb_piece = '".$nb_piece"' AND surface BETWEEN '".$surface_min."' AND '".$surface_max."' AND departement = '".$departement."';
//SELECT type_b, surface, ville, prix_n, prix_s, photo FROM bien WHERE type_b = 'maison' AND prix_s BETWEEN '50' AND '1000' AND nb_piece = '3' AND surface BETWEEN '5' AND '1000' AND departement = '94';

include('recherche.html');
}
?>