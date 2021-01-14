<?php
    include "config/connection.php";

	/* Create Table Transactions */
	$sql = "CREATE TABLE transactions (
		reference_id INT(6) AUTO_INCREMENT PRIMARY KEY,
		invoice_id VARCHAR(25),
		number_va VARCHAR(50) DEFAULT NULL,
		item_name VARCHAR(125),
		amount INT(6),
		payment_type ENUM('virtual_account', 'credit_card'),
		customer_name VARCHAR(125),
		merchant_id INT(6)
	)";

	if($conn->query($sql) === TRUE) {
		echo "Table transactions created successfully \n";
	} else {
		echo "Error creating table: " . $conn->error . "\n";
	}

	/* Create Table Transaction Histories */
	$sql = "CREATE TABLE transaction_histories (
		reference_id INT(6) NOT NULL,
		status ENUM('Pending', 'Paid', 'Failed') NOT NULL DEFAULT 'Pending',
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		FOREIGN KEY (reference_id) REFERENCES transactions(reference_id)
	)";

	if($conn->query($sql) === TRUE) {
		echo "Table transactions created successfully \n";
	} else {
		echo "Error creating table: " . $conn->error . "\n";
	}

?>