<?php
    include "config/connection.php";

	/* Insert Data Dummy */
	$numberVA = rand(); 
	$sql = "INSERT INTO transactions (invoice_id, number_va, item_name, amount, payment_type, customer_name, merchant_id) VALUES ('IVC0001', $numberVA, 'Monitor 24inc', 2, 'virtual_account', 'Asep', 1)";

	if ($conn->query($sql) === TRUE) {

        $reference_id = $conn->insert_id;
        $sql = "INSERT INTO transaction_histories (reference_id) VALUES ($reference_id)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully \n";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "\n";
        }
        
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error . "\n";
    }
    
    $sql = "INSERT INTO transactions (invoice_id, number_va, item_name, amount, payment_type, customer_name, merchant_id) VALUES ('IVC0002', NULL, 'Laptop 24inc', 1, 'credit_card', 'Wahyudin', 2)";

    if ($conn->query($sql) === TRUE) {

        $reference_id = $conn->insert_id;
        $sql = "INSERT INTO transaction_histories (reference_id) VALUES ($reference_id)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully \n";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "\n";
        }
        
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error . "\n";
    }

?>