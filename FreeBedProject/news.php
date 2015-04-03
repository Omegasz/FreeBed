<?php
// Header 
require("header.php");

//Affichage des Nouveautés
$query = "SELECT * FROM bien WHERE dispo = 1 ORDER BY datedajout DESC";
$result = mysqli_query($connexion, $query);
$bien = NULL;
while($row = mysqli_fetch_array($result)) { 
	$bien  .= 
	'<table style="width:800px;height: 40px;" class="titletable">
		<tr> 
			<td colspan="2"><a href="bien.php?id_b='.$row["id_b"].'"><h2><span class="titlerecherche"> Location ' . $row['type_b'] . ' ' . $row['surface'] . ' m² ' . $row['ville'] . '</span></h2></a></td>
			<td style="vertical-align: bottom;"> Prix Nuit : ' . $row['prix_n'] . ' € </td>
		</tr>

		<tr>
			<td style="width: 150px;"><div class="photo"><img src="' . $row['photo'] . '" alt=""/></div></td>
			<td style="width: 475px;border-right: 20px solid transparent;border-left: 20px solid transparent;">'. $row['comment'] . '</td>
			<td style="width: 175px;vertical-align: top;"> Prix Semaine : ' . $row['prix_s'] . ' € </td>
		</tr>
	</table>';
}
?>

<!-- Html de la page -->
        <section class="main" style="margin-left:10%; margin-right:10%;">
            <form class="fenetresearch" action="recherche.php" method="post">
                <h1><span class="titlerecherche">Nouveautés</span></h1>
                    <?php
                        echo ' '. $bien . ' ';
                    ?>
            </form>
        </section>
    </body>
</html>