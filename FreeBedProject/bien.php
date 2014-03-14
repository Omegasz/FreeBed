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

if(isset($_GET['id_b'])){
    $id_b = $_GET['id_b'];
    $sql = "SELECT *, b.adresse as adresseb, b.cp as cpb, b.ville as villeb FROM Bien b JOIN User u ON b.id_user = u.id WHERE id_b = ". $id_b;
    $result = mysqli_query($connexion, $sql);
    $bien = mysqli_fetch_array($result);
}





if(isset($_SESSION["userId"])){
    $query = "SELECT * FROM user WHERE id=".$_SESSION["userId"]."";
    $result = mysqli_query($connexion, $query);
    $user = mysqli_fetch_array($result);
}

include('bien.html');

?>