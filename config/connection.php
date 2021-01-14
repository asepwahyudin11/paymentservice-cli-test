<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
    $database = "dbPaymentService";

    //Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	//Check connection
	if(!$conn) {
		die("Connection failed: " . $conn->connection_error);
    }
?>