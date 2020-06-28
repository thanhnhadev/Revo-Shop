<?php

	include('connect/connect.php');
	$id_type = $_GET['id_type'];

	$limit = 3;
	$page = isset($_GET['page'])?$_GET['page']:1;
	settype($page, "int");
	$offset = ($page - 1) * $limit;
	
	$products =  $mysqli->query("SELECT * FROM product WHERE product.id_type='$id_type' LIMIT $offset,$limit ");
	
	while ($row = $products->fetch_object()){
	 //   $assignees = explode(',', $row->images);
	//	$row->images = $assignees;
	$product[] = $row;
	}

	echo json_encode($product);


?>