<!-- Header -->
<?php
require("header.php")
?>

<!--Php relatif a la page-->
<?php
if(isset($_GET['id_b'])){
    $id_b = $_GET['id_b'];
    $sql = "SELECT *, b.adresse as adresseb, b.cp as cpb, b.ville as villeb FROM Bien b JOIN User u ON b.id_user = u.id WHERE id_b = ". $id_b;
    $result = mysqli_query($connexion, $sql);
    $bien = mysqli_fetch_array($result);
}
?>

<!-- Html de la page -->

        <section class="main" style="margin-left:10%; margin-right:10%;">
                <form class="signupformulaire" action="modifbien.php" method="post">
                    <h1><span class="titlerecherche" style="font-size:20px;"><?php  echo 'Location ' . $bien['type_b'] . ' ' . $bien['surface'] . ' m² ' . $bien['villeb'] . ''; ?></span></h1>
                        <input type="hidden" name="id_b" value= "<?php echo $id_b;?>"/>
                    <table style="width:800px;height: 40px;" class="titletable">
                        <tr> 
                            <td colspan="2" style="border-bottom: 20px solid transparent;"><div class="photo" style="margin: 0 auto 0 auto;"><?php echo'<img src="' . $bien['photo'] . '" alt=""/>'?></div></td>
                        </tr>

                        <tr>
                            <td style="width: 450px;border-right: 100px solid transparent;border-left: 20px solid transparent;text-align: center;font-size: 20px;"><?php echo ''. $bien["comment"] .''?></td>
                            <td style="width: 350px;font-size: 18px;">Propiétaire : <?php echo ''.$bien["genre"].' '.$bien["nom"].'' ?><br/>Téléphone : <?php echo '0'.$bien["telephone"].'' ?><br/>Département : <?php echo ''.$bien["departement"].'' ?> <br/>Adresse : <?php echo ''.$bien["adresseb"].'' ?><br/>Code Postale : <?php echo ''.$bien["cpb"].'' ?><br/>Ville : <?php echo ''.$bien["villeb"].'' ?><br/> </td>
                        </tr>
                    </table>
                </form>
        </section>
    </body>
</html>
