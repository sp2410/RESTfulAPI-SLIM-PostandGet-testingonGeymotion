<?php
function fundadd($x,$y,$z,$i){
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="nope";
	$dbname="androidmoviedb";


	$conn= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error . "\n");
		echo "sorry";
	}
	
	
	if($sql = $conn->prepare("INSERT INTO movies (id, name, description, url) VALUES (?,?,?,?)")){
		
		//INSERT INTO movies VALUES ($x1,$x,$y,$z,$q,$w,$r,$t,$y,$u,$i)
	
	$sql->bind_param("ssss",$x,$y,$z,$i);
	$sql->execute();
	
	return true;
	}
	
	else{
		
		return false;
	}
	
	
	$conn->close();


}
?>