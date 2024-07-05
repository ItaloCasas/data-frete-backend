<?php
try {
	$action = isset($_GET["action"]) ? $_GET["action"] : $_POST["action"];

	if ($action) {
		switch ($action) {
			case "validateCEP":
				require_once "routes/validateCEP.php";
				break;
			case "calculateDistance":
				require_once "routes/calculateDistance.php";
				break;
			case "persist":
				require_once "routes/persist.php";
				break;
			case "list":
				require_once "routes/list.php";
				break;
			case "update":
				require_once "routes/update.php";
				break;
			case "delete":
				require_once "routes/delete.php";
				break;
			case "import":
				require_once "routes/persist.php";
				break;

			default:
				throw new Exception("Ação inválida.");
		}
	}
} catch (Exception $e) {
	echo json_encode(array("success" => 0, "message" => $e->getMessage(), "value" => null));
	die();
}
