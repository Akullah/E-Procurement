<?php

session_start();
require '_inc/config.php';
require 'model/crud.php';
require 'model/func.php';

$conn = dbconnect();
if ($conn) {

$target_dir = "uploads/" ;
//profile
$target_profile = $target_dir.'profile_'.date('YmdHis').rand(10000, 1000000).".".strtolower(pathinfo(basename($_FILES['company-profile']['name']),PATHINFO_EXTENSION));
;
move_uploaded_file( $_FILES['company-profile']['tmp_name'], $target_profile);

//PIN
$target_pin = $target_dir.'pin_'.date('YmdHis').rand(10000, 1000000).".".strtolower(pathinfo(basename($_FILES['company-pin']['name']),PATHINFO_EXTENSION));
move_uploaded_file( $_FILES['company-pin']['tmp_name'], $target_pin);

//Certificate
$target_cert = $target_dir.'cert_'.date('YmdHis').rand(10000, 1000000).".".strtolower(pathinfo(basename($_FILES['company-cert']['name']),PATHINFO_EXTENSION));
move_uploaded_file( $_FILES[ 'company-cert']['tmp_name'], $target_cert);

	$data = array(
		'company_name' => $_POST['company-name'],
		'company_address' => $_POST['company-address'],
		'company_email' => $_POST['company-email'],
		'pin' => $target_pin,
		'cert' => $target_cert,
		'profile' => $target_profile,
		'first_name' => $_POST['first-name'],
		'last_name' => $_POST['last-name'],
		'idnumber' => $_POST['idnumber'],
		'phone' => $_POST['phone'],
		'password' => $_POST['pass'],
		'reg_date' => date('Y-m-d h:i:s')
	);
	
	

	$result = addSupplierDetails($conn,$data);

	if ($result) {
			
		header("Location:./?state=1");
		die();

	} else {
		header("Location:./?state=0");
		die();
	}

} else {	
	header("Location:./?state=0");
	die();
}




?>