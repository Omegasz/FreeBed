<?php

// Header 
require("header.php");

//Affichage des biens
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
			<td style="width: 150px;"><div class="photo"><img src="' . $row['photo'] . '" alt=""/></div></td>
			<td style="width: 475px;">
				<a href="modifbien.php?id_b='.$row["id_b"].'"><input type="button" name="modifier" value="Modifier le Bien"/></a>
	            <a href="php/deletebien.php?id_b='.$row["id_b"].'"><input type="button" name="delete" value="Supprimer le Bien"/></a><br/>
            </td>
			<td style="width: 175px;vertical-align: top;"> Prix Semaine : ' . $row['prix_s'] . ' € </td>
		</tr>
	</table>';
}

//Page
if(isset($_SESSION["userId"])){
    echo'<section class="main" style="margin-left:10%; margin-right:10%;">
            <form class="fenetresearch" action="proposer.php" method="post">
                <h1><span class="titlerecherche">Mes Biens</span></h1>
                    ';echo ' '. $bien . ' ';echo'        
            </form>​​
        </section>
    </body>
</html>';

}
else {
	echo "<script type='text/javascript'>document.location.replace('nonco.php');</script>";
}

?>

