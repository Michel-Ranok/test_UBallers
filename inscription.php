<?php

include("pdo.php");

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$telMail = $_POST["telMail"];
$conf_telMail = $_POST["confirm_telMail"];
// Hash du mot de passe pour plus de sécurité
$mdp = hash("sha256",$_POST["nouvMdp"]);
// Date de naissance mise au format du SGBD : AAAA-MM-JJ
$dateNaiss = $_POST["aNaiss"] . "-" . $_POST["mNaiss"] . "-" . $_POST["jNaiss"];
$sexe = $_POST["sexe"];

if ($telMail == $conf_telMail) {
    $insert_values = $PDO->prepare("INSERT INTO compte (`nom`, `prenom`, `mail/mobile`, `mdp`, `date_naiss`, `sexe`) VALUES (:nom, :prenom, :numMail, :mdp, :dateNaiss, :sexe)");
    $insert_values->execute(array(':nom' => $nom, ':prenom' =>$prenom, ':numMail' =>$telMail, ':mdp' => $mdp, ':dateNaiss' => $dateNaiss, ':sexe' => $sexe));
    header("Location: inscription-success.html");
}
else {
    header("Location: index.html");
}