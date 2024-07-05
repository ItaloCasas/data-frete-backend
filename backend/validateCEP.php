<?php
try {
	require_once("./fnValidateCEP.php");

	$value = isset($_GET['value']) ? $_GET['value'] : null;
	if ($value) {
		echo json_encode(array("success" => 1, "message" => "Sucesso.", "value" => validateCEP($value)));
	} else {
		throw new Exception ("CEP não informado.");
	}
} catch(Exception $e) {
	throw $e;
}