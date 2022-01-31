<?php
session_start();
if ($_SESSION['role'] != 'admin') {
	die('Error 500: forbiden Access - You are not allowed to access this area');
}
require '../_inc/config.php';
require '../model/crud.php';

$conn = dbconnect();
if ($conn) {
	$id = $_GET['id'];

	$sql = "UPDATE users SET state=1 WHERE id=\"$id\"";
	if(addData($conn,$sql)) {
		$sql = "UPDATE supplier SET state=1 WHERE idno=\"$id\"";
		addData($conn,$sql);
	}

	header("Location:./#supplier");
}
?>