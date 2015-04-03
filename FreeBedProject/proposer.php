<!-- Header -->
<?php
require("header.php")
?>

<!-- Page -->
<?php
if(isset($_SESSION["userId"])){
    echo'<section class="main" style="margin-left:10%; margin-right:10%;">
            <form class="signupformulaire" action="proposer.php" method="post">
                <h1><span class="titlerecherche">Proposer un bien</span></h1>
                    <table class="inputs">
                        <tr>
                            <td style="width:125px;"><b>Type :</b></td>
                            <td><input type="radio" name="type_b" value="Villa">Villa <input type="radio" name="type_b" value="Maison">Maison <input type="radio" name="type_b" value="Appartement">Appartement <input type="radio" name="type_b" value="Chalet">Chalet
                            <td style="border-left:40px solid transparent;width:125px;"><b>Adresse du bien :</b></td>
                            <td><input type="text" name="adresse" style="width:125px;" required="required"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Code postal :</b></td>
                            <td><input type="text" name="cp" style="width:125px;" required="required"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Ville :</b></td>
                            <td><input type="text" name="ville" style="width:125px;" required="required"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Département :</b></td>
                            <td><input type="text" name="departement" style="width:125px;" required="required"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Surface en m² :</b></td>
                            <td><input type="text" name="surface" style="width:125px;" required="required"></td>
                        </tr>
                        
                        <tr>
                            <td style="width:125px;"><b>Prix/semaine :</b></td>
                            <td><input type="text" name="prix_s" style="width:125px;" required="required"></td>
                            <td style="border-left:40px solid transparent;width:125px;"><b>Prix/nuit :</b></td>
                            <td><input type="text" name="prix_n" style="width:125px;" required="required"></td>
                        </tr>

                        <tr>
                            <td style="width:125px;"><b>Nombre de pièce :</b></td>
                            <td colspan="3"><input type="text" name="nb_piece" style="width:125px;" required="required"></td>
                        </tr>
                        <tr>
                            <td style="width:125px;"><b>Commentaires :</b></td>
                            <td colspan="3"><textarea placeholder="(255 Carac. Max.)" cols="50" rows="5" name="comment" required="required"></textarea></td>
                        </tr>

                    </table>
                    <input type="submit" name="proposer" value="Proposer votre bien" style="margin-left:240px; margin-top:-40px;">                     
            </form>​​
        </section>
    </body>
</html>';

}
else {
	echo "<script type='text/javascript'>document.location.replace('nonco.php');</script>";
}
?>

<!-- Php relatif a la page -->
<?php
if( isset($_POST["proposer"])){
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
	$id_user = $_SESSION["userId"];

	
		$query ="INSERT INTO bien VALUES ('','".$adresse."','".$cp."','".$ville."','".$departement."','".$surface."','".$nb_piece."','".$type_b."','".$prix_s."','".$prix_n."', NOW(), '1', '".$comment."', '', ".$id_user.")";
		$res = mysqli_query($connexion, $query);
	

	echo "<script type='text/javascript'>document.location.replace('ajoutbienok.php');</script>";

}

?>