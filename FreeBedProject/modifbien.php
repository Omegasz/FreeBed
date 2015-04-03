<?php
// Header 
require("header.php");

//GET l'id du Bien
if(isset($_GET['id_b'])){
	$id_b = $_GET['id_b'];
	$sql = "SELECT * FROM Bien WHERE id_b = ". $id_b;
	$result = mysqli_query($connexion, $sql);
	$bien = mysqli_fetch_array($result);
}

if(isset($_SESSION["userId"])){
	echo'<section class="main" style="margin-left:10%; margin-right:10%;">
        <form class="signupformulaire" action="modifbien.php" method="post">
                <h1><span class="titlerecherche">Modifier votre bien</span></h1>
                    <table class="inputs">
                        <tr>
                            <td style="width:125px;"><b>Type :</b></td>
                            <td><input type="radio" name="type_b" value="Villa">Villa <input type="radio" name="type_b" value="Maison" required="required">Maison <input type="radio" name="type_b" value="Appartement">Appartement <input type="radio" name="type_b" value="Chalet">Chalet
                            <td style="border-left:40px solid transparent;width:125px;"><b>Adresse du bien :</b></td>
                            <td><input type="text" name="adresse" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['adresse']; echo '"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Code postal :</b></td>
                            <td><input type="text" name="cp" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['cp']; echo '"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Ville :</b></td>
                            <td><input type="text" name="ville" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['ville']; echo '"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Département :</b></td>
                            <td><input type="text" name="departement" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['departement']; echo '"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Surface en m² :</b></td>
                            <td><input type="text" name="surface" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['surface']; echo '"></td>
                        </tr>
                        
                        <tr>
                            <td style="width:125px;"><b>Prix/semaine :</b></td>
                            <td><input type="text" name="prix_s" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['prix_s']; echo '"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Prix/nuit :</b></td>
                            <td><input type="text" name="prix_n" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['prix_n']; echo '"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Nombre de pièce :</b></td>
                            <td colspan="3"><input type="text" name="nb_piece" style="width:125px;" required="required" value="';if(isset($bien)) echo $bien['nb_piece']; echo '"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Commentaires :</b></td>
                            <td colspan="3"><textarea placeholder="(255 Carac. Max.)" cols="50" rows="5" name="comment" required="required">';if(isset($bien)){ echo $bien['comment'];} echo '</textarea></td>
                        </tr>

                    </table>';

                    if($bien["dispo"] == "1"){
                        echo '<input type="submit" name="hide" value="Cacher le bien" style="margin-left:240px; margin-top:-90px;">';
                    }else{
                        echo '<input type="submit" name="display" value="Afficher le Bien" style="margin-left:240px; margin-top:-90px;">';
                    }
                    echo '
                    <input type="submit" name="modifier" value="Modifier votre bien" style="margin-left:240px; margin-top:-40px;">
                    <input type="hidden" name="id_b" value= "'; echo $id_b; echo'">                    
            </form>​​
        </section>
    </body>
</html>';
}

else {
	echo "<script type='text/javascript'>document.location.replace('nonco.php');</script>";
}

//Php de Modification
if( isset($_POST["modifier"])){

	$adresse = $_POST["adresse"];
	$cp = $_POST["cp"];
	$ville = $_POST["ville"];
	$departement = $_POST["departement"];
	$surface = $_POST["surface"];
	$nb_piece = $_POST["nb_piece"];
	$type_b = $_POST["type_b"];
	$prix_s = $_POST["prix_s"];
	$prix_n = $_POST["prix_n"];
	$comment = $_POST["comment"];
	$id_b = $_POST["id_b"];

	if($type_b != "0"){
		$bdd = "UPDATE `bien` SET `adresse` = '".$adresse."', `cp` = '".$cp."', `ville` = '".$ville."', `departement` = '".$departement."', `surface` = '".$surface."',`nb_piece` = '".$nb_piece."', `type_b` = '".$type_b."', `prix_s` = '".$prix_s."', `prix_n` = '".$prix_n."', `comment` = '".$comment."'   WHERE `bien`.`id_b` = ".$id_b."";
		mysqli_query($connexion, $bdd) or die(mysql_error());

		echo "<script type='text/javascript'>document.location.replace('modifbienok.php');</script>";
	}

}

//Bouton pour cacher le bien
if(isset($_POST["hide"])){
		$id_b = $_POST['id_b'];
		$query = "UPDATE bien SET bien.dispo = bien.dispo - 1 WHERE bien.id_b = ".$id_b."";
		$res = mysqli_query($connexion, $query);

	echo "<script type='text/javascript'>document.location.replace('mesbien.php');</script>";
}

//Bouton pour afficher le bien
if(isset($_POST["display"])){
		$id_b = $_POST['id_b'];
		$query = "UPDATE bien SET bien.dispo = bien.dispo + 1 WHERE bien.id_b = ".$id_b."";
		$res = mysqli_query($connexion, $query);

	echo "<script type='text/javascript'>document.location.replace('mesbien.php');</script>";
}

?>