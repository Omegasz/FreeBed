<?php
session_start();
include("php/connexion.php");
	header ("Refresh: 3;url=index.php");

	if(isset($_SESSION["userId"])){
	$query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
	$result = mysqli_query($connexion, $query);
	$user = mysqli_fetch_array($result);
}

	include('redirection.html')
?>