<?php

session_start();
	if(isset($_POST["deco"])){
		$_SESSION =array();
		unset($_SESSION);
		session_destroy();
		header("location:../index.php");
}

?>