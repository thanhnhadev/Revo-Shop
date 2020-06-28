<?php
//collection
	include('connect/connect.php');
	
	$limit = 3;
	$page = isset($_GET['page'])?$_GET['page']:1;
	settype($page, "int");
	$offset = ($page - 1) * $limit;

	$collection = $mysqli->query("SELECT * FROM product WHERE product.inCollection = 1 and product.xoa=0 LIMIT $offset,$limit ");
	
	while ($row = $collection->fetch_object()){
	//	$assignees = explode(',', $row->images);
	//	$row->images = $assignees;
	    $product[] = $row;
	}

	echo (json_encode($product));
	
?>