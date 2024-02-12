<?php
$conn = new mysqli("localhost", "root","", "list_app");
$idOfSelected = $_REQUEST["id"];


$query = $conn->prepare("UPDATE `list_content` SET `striked` = '0' WHERE `list_content`.`item_id` = ?");
			$query->bind_param("i", $idOfSelected);
			$query->execute();
			$result = $query->get_result();
?>