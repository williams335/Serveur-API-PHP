<?php
include('pdo1.php');
header('Content-Type: application/json');
$data = array();

if( !empty($_GET['id']) ){
	

	$requete = $pdo->prepare("DELETE FROM `product` WHERE `ID` = :id");
	$requete->bindParam(':id', $_GET['id']);

	$requete->execute();


	$requete = $pdo->prepare("SELECT * FROM `product`");
	$requete->execute();





	$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
		
		
	$data["success"]= true;



	$data["nombre"] = count($resultats);
	$data["produits"]= $resultats;
}

echo json_encode($data);