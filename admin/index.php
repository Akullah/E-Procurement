<?php

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
	die("Error 500: forbiden Access - You are not allowed to access this area <a href='../'>Go back Home</a> ");
}
require '../_inc/config.php';
require '../model/crud.php';
require '../model/func.php';

$conn = dbconnect();

if ($conn) {
	
	$products = getProducts($conn);
	$tenders = getAllTenders($conn);
	$suppliers = getAllSuppliers($conn,1);
	$new_sups = getAllSuppliers($conn,0);
	$quotations = getAllQuotations($conn);
	$categories = getCategories($conn);
	$admins = getAdmins($conn);

	require '../views/admin.view.php';
} else {
	die('Error while connecting to server');
}


?>