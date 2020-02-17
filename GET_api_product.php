<?php


header('Content-Type: application/json');



include('pdo1.php');



$data = array();

$requete = $pdo->prepare("SELECT * FROM `product`");

$requete->execute();



$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);



$data["success"]= true;
$data["nombre"] = count($resultats);

$data["produits"]= $resultats;
echo json_encode($data,JSON_UNESCAPED_UNICODE);











