<?php

// Header 
require("header.php");

//Page
if(isset($_SESSION["userId"])){
	echo '<section class="main" style="margin-left:10%; margin-right:10%;">
            <form class="inscriptionb" method="post" action="php/changetype.php">
                <h1><span class="titlerecherche">Changement de statut.</span></h1>
                <b>Actuellement vous êtes un utilisateur normale, si vous voulez pouvoir publier vos biens, veuillez cliquer sur le bouton ci-dessous.</b>
                <input type="submit" name="changer" value="Changer">  
            </form>​​
        </section>
    </body>
</html>';
}else{
	echo "<script type='text/javascript'>document.location.replace('nonco.php');</script>";
}
?>