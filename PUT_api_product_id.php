

<?php
include('pdo1.php');
header('Content-Type: application/json');
$data = array();

if( !empty($_GET['id']) ){
	$id = $_GET['id'];

	if( !empty($_GET['name'])) {
		$name = $_GET['name'];
		$requete = $pdo->prepare("UPDATE product SET NAME=? WHERE id=?");

		$requete->execute([$name, $id]);

	}
	if(!empty($_GET['description']) ){


		$description= $_GET['description'];
		$requete = $pdo->prepare("UPDATE product SET DESCRIPTION=? WHERE id=?");


		$requete->execute([$description, $id]);


		}
	if(!empty($_GET['stock']) ){


		$stock= $_GET['stock'];

		$requete = $pdo->prepare("UPDATE product SET STOCK=? WHERE id=?");
		$requete->execute([$stock, $id]);


		 }
$data["success"]= true;


		}
	
else {
	

$requete = $pdo->prepare("SELECT * FROM `product`");
$requete->execute();





$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
	
	
$data["success"]= false;



$data["nombre"] = count($resultats);
$data["produits"]= $resultats;
}

echo json_encode($data);


