<!-- Header -->
<?php
require("header.php");
?>

<!-- HTML de la page -->
        <section class="main" style="margin-left:10%; margin-right:10%;">
            <form class="signupformulaire" action="signup.php" method="post">
                <h1><span class="titlerecherche">Inscription</span></h1>
                    <table class="inputs">
                        <tr>
                            <td style="width:125px;"><b>Genre :</b></td>
                            <td><input type="radio" name="genre" value="M." required="required">M. <input type="radio" name="genre" value="Mme.">Mme. <input type="radio" name="genre" value="Mlle.">Mlle.
                            <td style="border-left:40px solid transparent;width:125px;"><b>Nom :</b></td>
                            <td><input type="text" name="nom" style="width:125px;" required="required"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Prénom :</b></td>
                            <td><input type="text" name="prenom" style="width:125px;" required="required"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Adresse :</b></td>
                            <td><input type="text" name="adresse" style="width:125px;" required="required"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Code Postal :</b></td>
                            <td><input type="text" name="cp" style="width:125px;" required="required"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Ville :</b></td>
                            <td><input type="text" name="ville" style="width:125px;" required="required"></td>
                        </tr>
                        
                        <tr>
                            <td style="width:125px;"><b>Mot de Passe :</b></td>
                            <td><input type="password" name="pwd" style="width:125px;" required="required"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Confirmation :</b></td>
                            <td><input type="password" name="pwd2" style="width:125px;" required="required"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Mail :</b></td>
                            <td><input type="text" name="email" style="width:125px;" required="required"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Téléphone :</b></td>
                            <td><input type="text" name="telephone" style="width:125px;" required="required"></td>
                        </tr>

                    </table>
                    <input type="submit" name="inscription" value="Inscription" style="margin-left:340px; margin-top:-40px;">                     
            </form>​​
        </section>
    </body>
</html>

<!-- Php de l'inscription -->
<?php
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
		//Script de redirection
		echo "<script type='text/javascript'>document.location.replace('signupok.php');</script>";
	}
}
?>