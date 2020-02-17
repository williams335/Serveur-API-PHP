<?php
$hote = 'localhost';
$port = "3306";
$nom_bdd = 'api';
$utilisateur = 'root';
$mot_de_passe ='';

try {
	//On test la connexion à la base de donnée
	$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	  );
    $pdo = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe, $options);
  

} catch(Exception $e) {
	//Si la connexion n'est pas établie
	echo 'Connexion impossible';
    exit();

}