<?php
function getDistance($cepOri, $cepDes)
{
	$locationOri = json_decode(validateCEP($cepOri))->location->coordinates;
	$locationDes = json_decode(validateCEP($cepDes))->location->coordinates;
	return calculateDistance($locationOri->latitude, $locationOri->longitude, $locationDes->latitude, $locationDes->longitude, false);
}
try {
	
	require_once "functions/connect.php";
	require_once "functions/fnValidateCEP.php";
	require_once "functions/fnCalculateDistance.php";

	$cepOri = isset($_GET["cepOri"]) ? $_GET["cepOri"] : null;
	$cepDes = isset($_GET["cepDes"]) ? $_GET["cepDes"] : null;
	$distCalc = isset($_GET["distCalc"]) ? $_GET["distCalc"]: getDistance($cepOri, $cepDes);

	$sql = "INSERT INTO distancia (cep_ori, cep_des, dist_calculada, dt_cadastro, dt_alteracao) VALUES ($cepOri, $cepDes, $distCalc, now(), now());";

	if ($conn->query($sql) === TRUE) {
		echo json_encode(array("success" => 1, "message" => "Sucesso.", "value" => "Sucesso"));
	} else {
		throw new Exception("Erro ao inserir.");
	}

	$conn->close();
} catch (Exception $e) {
	throw $e;
}