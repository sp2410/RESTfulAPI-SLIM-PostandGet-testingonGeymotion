<?php
function fundelete($x){
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="nope";
	$dbname="androidmoviedb";


	$conn= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error . "\n");
		echo "sorry";
	}
	
	
	if($sql = $conn->prepare("DELETE FROM movies WHERE id = ?")){
	
	$sql->bind_param("s",$x);
	$sql->execute();
	//$result = $sql->get_result();
//	$rows = array();

	return true;
	}
	
	else{
		
		return false;
	}
	
	
	$conn->close();


}
?>