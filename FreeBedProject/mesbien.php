<?php
session_start();
include("php/connexion.php");
if(isset($_POST["email"])){
	$email =$_POST["email"];
	$pwd = $_POST["pwd"];
	$query = "SELECT *, u.id as id_u FROM user u JOIN type t ON t.id = u.id_type WHERE email = '".$email."' AND pwd = '".$pwd."' ; ";
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

$query = "SELECT * FROM bien WHERE id_user=".$_SESSION["userId"]." ORDER BY datedajout DESC";
$result = mysqli_query($connexion, $query);
$bien = NULL;

while($row = mysqli_fetch_array($result)) { 
	$bien  .= 
	'<table style="width:800px;height: 40px;" class="titletable">
		<tr> 
			<td colspan="2"><h2><span class="titlerecherche"> Location ' . $row['type_b'] . ' ' . $row['surface'] . ' m² ' . $row['ville'] . '</span></h2></td>
			<td style="vertical-align: bottom;"> Prix Nuit : ' . $row['prix_n'] . ' € </td>
		</tr>

		<tr>
			<td style="width: 150px;"><div class="photo"><img src="' . $row['photo'] . '"/></div></td>
			<td style="width: 475px;">
				<a href="modifbien.php?id_b='.$row["id_b"].'"><input type="button" name="modifier" value="Modifier le Bien"/></a>
	            <a href="php/deletebien.php?id_b='.$row["id_b"].'"><input type="button" name="delete" value="Supprimer le Bien"/></a></br>
	            <?php
					if($row["dispo"] == "1"){
					    echo "<input type="submit" name="hide" value="Cacher le bien" style="margin-right: 135px; margin-top: 20px;">";
					}else{
					    echo "<input type="submit" name="display" value="Afficher le Bien" style="margin-right: 135px; margin-top: 20px;">";
					}
				?>
            </td>
			<td style="width: 175px;vertical-align: top;"> Prix Semaine : ' . $row['prix_s'] . ' € </td>
		</tr>
	</table>';
}

if(isset($_POST["hide"])){
	$query = "UPDATE bien SET dispo = dispo - 1 WHERE id_b = $id_b";
	$res = mysqli_query($connexion, $query);

	header('location: ../mesbien.php');
}

if(isset($_POST["display"])){
	$query = "UPDATE bien SET dispo = dispo + 1 WHERE id_b = $id_b";
	$res = mysqli_query($connexion, $query);

	header('location: ../mesbien.php');
}

if(isset($_SESSION["userId"])){
	$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
	$result = mysqli_query($connexion, $query);
	$user = mysqli_fetch_array($result);
}

if(isset($_SESSION["userId"])){
	include('mesbien.html');
}
else {
	header("location: nonco.php");
}

?>
