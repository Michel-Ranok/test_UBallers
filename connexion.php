<?php

include("pdo.php");


$login = $_POST["login"];
$mdp = hash("sha256",$_POST["mdp"]);


$getMdp = $PDO->prepare("SELECT mdp FROM compte WHERE `mail/mobile` = :numMail");
$getMdp->execute(array(':numMail' =>$login));
$mdpBon = $getMdp->fetch()[0];

if ($mdp == $mdpBon) {
    header("Location: accueil.html");
}
else header("Location: index.html");
