<?php


function post($x=$_POST["id"]){
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="nope";
	$dbname="androidmoviedb";
	

	$conn= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error . "\n");
		echo "sorry";
	}
	
	

	
	if($sql = $conn->prepare("DELETE FROM movies WHERE id='$x'")){
	//$sql->bind_param("s",$x);
	$sql->execute();
	
	
	$conn->close();


}}
?>