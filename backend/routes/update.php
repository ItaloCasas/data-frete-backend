<?php
try {
	require_once ("functions/connect.php");

	$id = isset($_GET['id']) ? $_GET['id'] : null;

	$cepOri = isset($_GET['cepOri']) ? $_GET['cepOri'] : null;
	$cepDes = isset($_GET['cepDes']) ? $_GET['cepDes'] : null;
	$distCalculada = isset($_GET['distCalc']) ? $_GET['distCalc'] : 0;

	if (!$id) {
		throw new Exception("Id não informada.");
	}

	$sql = "UPDATE distancia set cep_ori=$cepOri, cep_des=$cepDes, dist_calculada=$distCalculada, dt_alteracao=now() WHERE id= $id";

	if ($conn->query($sql) === TRUE) {
		echo json_encode(array("success" => 1, "message" => "Sucesso.", "value" => "Sucesso."));
	} else {
		echo json_encode(array("success" => 0, "message" => "Sucesso.", "value" => "Erro."));
	}
	$conn->close();

} catch (Exception $e) {
	throw $e;
}