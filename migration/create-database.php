<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "dbPaymentService";

    //Create connection
	$conn = new mysqli($servername, $username, $password);

	//Check connection
	if(!$conn) {
		die("Connection failed: " . $conn->connection_error);
	}

	/* Create Database */
	$sql = "CREATE DATABASE " . $database;
	if($conn->query($sql) === TRUE) {
		echo "Database created successfully \n";
	} else {
		echo "Error creating database: " . $conn->error . "\n";
	}

    $conn->close();
?>