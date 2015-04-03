<?php

// Header 
require("header.php");

//Page
if(isset($_SESSION["userId"])){
	echo '<section class="main" style="margin-left:10%; margin-right:10%;">
            	<form class="signupformulaire" action="infos.php" method="post">
                	<h1><span class="titlerecherche">Vos informations personnelles</span></h1>
                		<table class="inputs">
                        	<tr>
                            	<td style="width:170px;">Genre</td>
                            	<td style="width:170px;"><input type="radio" name="genre" value="M." required="required">M. <input type="radio" name="genre" value="Mme.">Mme. <input type="radio" name="genre" value="Mlle.">Mlle.</td>
                            	<td style="width:170px;border-left:40px solid transparent;">Nom</td>
                            	<td style="width:170px;"><input type="text" name="nom" required="required" value="';if(isset($user)) echo $user['nom']; echo '""></td>
                        	</tr>
                        	<tr>
                            	<td style="width:125px;">Prénom</td>
                            	<td style="width:150px;"><input type="text" name="prenom" required="required" value="';if(isset($user)) echo $user["prenom"]; echo '"></td>
                            	<td style="width:125px;border-left:40px solid transparent;">Adresse</td>
                            	<td style="width:125px;"><input type="text" name="adresse" required="required" value="';if(isset($user)) echo $user["adresse"]; echo '"></td>
                        	</tr>
                        	<tr>
                            	<td style="width:125px;">Code Postale</td>
                            	<td style="width:125px;"><input type="text" name="cp" required="required" value="';if(isset($user)) echo $user["cp"]; echo '"></td>
                            	<td style="width:125px;border-left:40px solid transparent;">Ville</td>
                            	<td style="width:125px;"><input type="text" name="ville" required="required" value="';if(isset($user)) echo $user["ville"]; echo '"></td>
                        	</tr>
                        	<tr>
                            	<td style="width:125px;">Mot de passe</td>
                            	<td style="width:125px;"><input type="password" required="required" name="pwd" value=""/></td>
                            	<td style="width:125px;border-left:40px solid transparent;">Confirmation</td>
                            	<td style="width:125px;"><input type="password" required="required" name="pwd2" value=""/></td>
                        	</tr> 
                        	<tr>
                            	<td style="width:125px;">Email</td>
                            	<td style="width:125px;"><input type="text" name="email" required="required" value="';if(isset($user)) echo $user["email"]; echo '"></td>                        
                            	<td style="width:125px;border-left:40px solid transparent;">Téléphone</td>
                            	<td style="width:125px;"><input type="text" name="telephone" required="required" value="0';if(isset($user)) echo $user["telephone"]; echo '"></td>
                        	</tr>
                		</table>
                		<input type="submit" name="modifier" value="Modifier"/>
                		';echo '<a href="php/delete.php?id="'.$user["id"].'">';echo '<input type="button" name="delete" value="Supprimer le Compte"/></a>
            	</form>
        	</section>
    	</body>
	</html>';
}else {
	echo "<script type='text/javascript'>document.location.replace('nonco.php');</script>";
}

//Modification Infos
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

		echo "<script type='text/javascript'>document.location.replace('modifok.php');</script>";
	}
}

?>