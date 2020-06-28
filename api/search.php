<?php
//search
	include('connect/connect.php');

	if(isset($_GET['key']) && strlen($_GET['key'])>2){
		$keyword = $_GET['key'];
		$product = array();
		$products = $mysqli->query("SELECT * from product where product.name like '%$keyword%'");
		while ($row = $products->fetch_object()){
			//$assignees = explode(',', $row->images);
			//$row->images = $assignees;
		    $product[] = $row;
		}
		echo (json_encode($product));

	}
	else{
		echo 'NHAP_TU_KHOA';
	}
?>
	