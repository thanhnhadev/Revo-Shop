<?php
	include('connect/connect.php');
	
	
    $contact = $mysqli->query("Select * from contact");
	while ($Contact = $contact->fetch_object()){
	   $page_contact[] = $Contact;
	}
	
	$array = array('contact'=>$page_contact);
	echo json_encode($array);


?>