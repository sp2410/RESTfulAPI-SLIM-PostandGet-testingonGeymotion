<?php
function getmovie(){
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="nope";
	$dbname="androidmoviedb";


	$conn= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error . "\n");
		echo "sorry";
	}

	//echo "hello world";
	
	$sql = "SELECT * FROM movies";
	
	//$result = $mysqli->query($sql);
	$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
	//return $result->num_rows;
	
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
		//echo "hello";
	}
	
	return $rows;
	$conn->close();

}
?>