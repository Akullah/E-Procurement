<?php

session_start();
if (!isset($_SESSION) && $_SESSION['role'] != 'supplier') {
	header("Location:../");
}
require '../_inc/config.php';
require '../model/crud.php';
require '../model/func.php';

$conn = dbconnect();
if ($conn){ 
	// print_r($_SESSION);
	$idno = $_SESSION['id'];

	$quotes = getSupplierQuotes($conn,$idno);


require '../views/home.view.php';
}else {
	die('Error while connecting to server');
}
?>