<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

// =========================================================

if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'edit_user'){
	$save = $crud->edit_user();
	if($save)
		echo $save;
}
if($action == 'save_page_img'){
	$save = $crud->save_page_img();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}


// =========================================================



if($action == "save_donor"){
	$save = $crud->save_donor();
	if($save)
		echo $save;
}

if($action == "update_donor"){
	$update = $crud->update_donor();
	if($update)
		echo $update;
}

if($action == "delete_donor"){
	$delsete = $crud->delete_donor();
	if($delsete)
		echo $delsete;
}











ob_end_flush();
