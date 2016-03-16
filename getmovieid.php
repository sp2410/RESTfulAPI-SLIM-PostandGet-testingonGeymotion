<?php
function getmovieid($x){
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="nope";
	$dbname="androidmoviedb";


	$conn= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error . "\n");
		echo "sorry";
	}
	
	
	if($sql = $conn->prepare("SELECT * FROM movies WHERE id = ? ORDER BY rating DESC")){
	
	$sql->bind_param("s",$x);
	$sql->execute();
	
	$result = $sql->get_result();
	
	
	$rows = array();
	while($r = $result->fetch_assoc()) {
		array_push($rows,$r);
		//echo "hello";
	}
	
	$sql->close();
	
	return $rows;
	
	}
	
	
	$conn->close();


}
?>