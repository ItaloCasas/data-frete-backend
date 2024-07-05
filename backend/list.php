<?php
function formatCEP($cep) {
	return substr_replace(substr_replace($cep,".",2, 0), "-", 6, 0);
}

function formatDate($date) {
	return date_format($date,"d/m/Y H:i:s");
}
try {
	require_once ("./connect.php");

	$sql = "SELECT * FROM distancia";
	$result = $conn->query($sql);

	$arr = array();
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$line = array(
				"id" => $row["id"],
				"cep_ori" => formatCEP($row["cep_ori"]),
				"cep_des" => formatCEP($row["cep_des"]),
				"dist_calculada" => number_format($row["dist_calculada"], 2, ',', '.'),
				"dt_cadastro" => formatDate(new DateTime($row["dt_cadastro"])),
				"dt_alteracao" => formatDate(new DateTime($row["dt_alteracao"]))
			);
			array_push($arr, $line);
		}
	}
	$conn->close();
	echo json_encode(array("success" => 1, "message" => "Sucesso.", "value" => $arr));
} catch (Exception $e) {
	throw $e;
}