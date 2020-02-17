<?php
header('Content-Type: application/json');
include('pdo1.php');
$data = array();

if( !empty($_GET['id']) ){
	
	$requete = $pdo->prepare("SELECT DESCRIPTION, STOCK FROM `product` WHERE `ID` LIKE :id");
	$requete->bindParam(':id', $_GET['id']);
	$requete->execute();


$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
	
	
$data["success"]= true;
$data["nombre"] = count($resultats);
$data["produits"]= $resultats;
} 

else {
	
$requete = $pdo->prepare("SELECT * FROM `product`");
$requete->execute();





$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
	
	
$data["success"]= true;



$data["nombre"] = count($resultats);
$data["produits"]= $resultats;
}

echo json_encode($data);


