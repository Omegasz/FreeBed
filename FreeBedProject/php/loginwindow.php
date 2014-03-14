<?php

            if(isset($_SESSION["userId"])){
                echo '<section class="main">
                        <form class="form-2" method="post" action="php/deco.php">
                            <h1><span class="welcome"> Bonjour, '.$user["genre"].' '.$user["nom"].' '.$user["prenom"].'</span></h1>
                            <br/>
                            <div class="comptel">
                                <ul>
                                    <li>
                                        <a href="infos.php">Mes Infos Perso</a>
                                    </li>
                                    <li>
                                        <a href="biens.php">Mes Réservations</a>
                                    </li>';

                                    if(isset($_SESSION["typeId"])){
                                        if($_SESSION["typeId"] == 2){
                                            echo '<li>
                                                <a href="inscriptionbailleur.php">Proposer un bien</a>
                                            </li>';
                                        }

                                        else {
                                            echo '<li>
                                                <a href="mesbien.php">Mes biens</a>
                                            </li>';                                        
                                        }
                                    }

                                echo '</ul>
                            </div>
                            <input type="submit" name="deco" value="Se Déconnecter" id="decobtn"/>
                        </form>​​
                    </section>';
            }

            else {
                echo '<section class="main">
                        <form class="form-2" action="index.php" method="post">
                            <h1><span class="log-in">Log in</span> or <a href="signup.php"><span class="sign-up">sign up</span></a></h1>
                            <p class="float1">
                                <label for="mail"><i class="icon-user"></i>E-Mail</label>
                                <input type="text" id="mail" name="email" placeholder="E-Mail" required="required">
                            </p>
                            <p class="float2">
                                <label for="pwd"><i class="icon-lock"></i>Password</label>
                                <input type="password" id="pwd" name="pwd" placeholder="Password" class="showpassword" required="required">
                            </p>
                            <p class="clearfix"> 
                                <input type="submit" name="submit" value="Log in" id="loginbtn">
                            </p>
                        </form>​​
                    </section>';
            }

?>