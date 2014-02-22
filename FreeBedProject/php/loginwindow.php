<?php
            if(isset($_SESSION["userId"])){
                echo '<section class="main">
                        <form class="form-2" method="post" action="php/deco.php">
                            <h1><span class="welcome"> Bonjour, '.$user["genre"].' '.$user["nom"].' '.$user["prenom"].'</span></h1>
                            <br/>
                            <input type="submit" name="deco" value="Se Déconnecter" class="btn btn-primary btn-blocka btn-large"/>
                        </form>​​
                    </section>';
            }

            else {
                echo '<section class="main">
                        <form class="form-2" action="index.php" method="post">
                            <h1><span class="log-in">Log in</span> or <span class="sign-up">sign up</span></h1>
                            <p class="float1">
                                <label for="login"><i class="icon-user"></i>E-Mail</label>
                                <input type="text" name="email" placeholder="E-Mail" required="required">
                            </p>
                            <p class="float2">
                                <label for="password"><i class="icon-lock"></i>Password</label>
                                <input type="password" name="password" placeholder="Password" class="showpassword" required="required">
                            </p>
                            <p class="clearfix"> 
                                <input type="submit" name="submit" value="Log in" id="loginbtn">
                            </p>
                        </form>​​
                    </section>';
            }
?>