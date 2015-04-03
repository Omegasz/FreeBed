<!-- Php de connexion -->
    <?php
        session_start();
        include("php/connexion.php");
        if(isset($_POST["email"])){
            $email =$_POST["email"];
            $pwd = $_POST["pwd"];
            $query = "SELECT *, u.id as id_u FROM user u JOIN type t ON t.id = u.id_type WHERE email = '".$email."' AND pwd = '".$pwd."' ; ";
            $result = mysqli_query($connexion, $query);

            if(mysqli_num_rows($result) != 0){
                $user = mysqli_fetch_array($result);
                $_SESSION["userId"] = $user['id_u'];
                $_SESSION["typeId"] = $user["id_type"];
            }else{
                function myFunction()
                {
                    alert("Mauvais mot de passe et/ou login.");
                }
            }
        }


        if(isset($_SESSION["userId"])){
            $query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
            $result = mysqli_query($connexion, $query);
            $user = mysqli_fetch_array($result);
        }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
            <title>FreeBed</title>
            <link rel="stylesheet" type="text/css" href="css/style.css"/>
            <link rel="stylesheet" type="text/css" href="css/menu_login.css"/>
            <link rel="stylesheet" href="css/styleslide.css" type="text/css" media="screen" />
            <link rel="icon" type="image/png" href="pictures/favicon.png" />
            <script src="js/modernizr.custom.js"></script>
            <script src="js/modernizr.custom.63321.js"></script>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script type="text/javascript">var _siteRoot='index.html',_root='index.html';</script>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript">
            if(!window.slider) var slider={};slider.data=
                [{"id":"slide-img-1","client":"événement","desc":"Football Américain"},
                {"id":"slide-img-2","client":"événement","desc":"Baseball"},
                {"id":"slide-img-3","client":"événement","desc":"Basketball"},
                {"id":"slide-img-4","client":"événement","desc":"Hockey sur glace"}];
        </script>   
        <script type="text/javascript">
            $(function(){
                $(".showpassword").each(function(index,input) {
                    var $input = $(input);
                    $("<p class='opt'/>").append(
                        $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
                            var change = $(this).is(":checked") ? "text" : "password";
                            var rep = $("<input placeholder='Password' type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                            $input.remove();
                            $input = rep;
                        })
                    ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
                });

                $('#showPassword').click(function(){
                    if($("#showPassword").is(":checked")) {
                        $('.icon-lock').addClass('icon-unlock');
                        $('.icon-unlock').removeClass('icon-lock');    
                    } else {
                        $('.icon-unlock').addClass('icon-lock');
                        $('.icon-lock').removeClass('icon-unlock');
                    }
                });
            });
        </script>
        <script>
            //  The function to change the class
            var changeClass = function (r,className1,className2) {
                var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
                if( regex.test(r.className) ) {
                    r.className = r.className.replace(regex,' '+className2+' ');
                }
                else{
                    r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
                }
                return r.className;
            };  
            //  Creating our button in JS for smaller screens
            var menuElements = document.getElementById('menu');
            menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');
            //  Toggle the class on click to show / hide the menu
            document.getElementById('menutoggle').onclick = function() {
                changeClass(this, 'navtoogle active', 'navtoogle');
            }
            // http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
            document.onclick = function(e) {
                var mobileButton = document.getElementById('menutoggle'),
                    buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;
                if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
                    changeClass(mobileButton, 'navtoogle active', 'navtoogle');
                }
            }
        </script>
    </head>

    <!-- Header -->
    <body>
        <header>
            <div id="logo">
                <a href="index.php"><img src="pictures/logo.png" alt=""/></a>
            </div>
            <!-- Barre Navigation -->
            <div class="mainnav">
                <nav id="menu" class="nav">                 
                    <ul>
                        <li>
                            <a href="index.php">
                                <span class="icon">
                                    <i aria-hidden="true" class="icon-accueil"></i>
                                </span>
                                <span>Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a href="news.php">
                                <span class="icon"> 
                                    <i aria-hidden="true" class="icon-star"></i>
                                </span>
                                <span>Nouveautés</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon">
                                    <i aria-hidden="true" class="icon-location"></i>
                                </span>
                                <span>Location</span>
                            </a>
                        </li>

                        <?php
                        if(isset($_SESSION["typeId"])){
                            if($_SESSION["typeId"] == 2){
                                echo '<li>
                                    <a href="inscriptionbailleur.php">
                                        <span class="icon">
                                            <i aria-hidden="true" class="icon-proposer"></i>
                                        </span>
                                        <span>Proposer un bien</span>
                                    </a>
                                </li>';
                            }

                            else {
                                echo '<li>
                                    <a href="proposer.php">
                                        <span class="icon">
                                            <i aria-hidden="true" class="icon-proposer"></i>
                                        </span>
                                        <span>Proposer un bien</span>
                                    </a>
                                </li>';                                        
                            }
                        }

                        else {
                            echo '<li>
                                <a href="inscriptionbailleur.php">
                                    <span class="icon">
                                        <i aria-hidden="true" class="icon-proposer"></i>
                                    </span>
                                    <span>Proposer un bien</span>
                                </a>
                            </li>';
                        }

                        ?>

                        <li>
                            <a href="recherche.php">
                                <span class="icon">
                                    <i aria-hidden="true" class="icon-recherche"></i>
                                </span>
                                <span>Rechercher un bien</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <?php
            if(isset($_SESSION["userId"])){
                echo '<section class="mainwindow">
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
            }else {
                echo '<section class="mainwindow">
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
        </header>
        <br/>
        <br/>
        <br/>
        <br/>

        <!-- Page include -->
