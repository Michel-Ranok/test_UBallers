<?php

// CONNEXION VERS LA BASE DE DONNEES AVEC PDO

// Valeurs à modifier selon le SGBD
$host = 'host=localhost';
$user = 'root'; 
$password = ''; 

$db = 'test_uballers'; 

try {

    $PDO = new PDO("mysql:$host;dbname=$db;charset=utf8", $user , $password );
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    echo $e->getMessage();
    $PDO = null;
}