<?php

session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
	header("Location:../admin");die();
}
require '../_inc/config.php';
require '../model/crud.php';
require '../model/func.php';


$conn = dbconnect();

if ($conn) {
	$categories = getCategories($conn);
} else {
	die('Error while connecting!');
}

require '../views/tenders.view.php';
?>