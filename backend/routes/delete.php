<?php
try {
	require_once ("functions/connect.php");

	$id = isset($_GET['id']) ? $_GET['id'] : null;

	if (!$id) {
		throw new Exception("Id não informada.");
	}

	$sql = "DELETE FROM distancia WHERE id= $id";

	if ($conn->query($sql) === TRUE) {
		echo json_encode(array("success" => 1, "message" => "Sucesso.", "value" => "Sucesso."));
	} else {
		echo json_encode(array("success" => 0, "message" => "Sucesso.", "value" => "Erro."));
	}
	$conn->close();

} catch (Exception $e) {
	throw $e;
}