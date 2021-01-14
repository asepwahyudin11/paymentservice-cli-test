<?php
    include "../config/connection.php";

    $invoice_id = addslashes(htmlentities($_POST['invoice_id']));
    $item_name = addslashes(htmlentities($_POST['item_name']));
    $amount = addslashes(htmlentities($_POST['amount']));
    $payment_type = addslashes(htmlentities($_POST['payment_type']));
    $customer_name = addslashes(htmlentities($_POST['customer_name']));
    $merchant_id = addslashes(htmlentities($_POST['merchant_id']));
    if($payment_type == "virtual_account") {
        $numberVA = rand();
    } else {
        $numberVA = NULL;
    }

    $sql = "INSERT INTO transactions (invoice_id, number_va, item_name, amount, payment_type, customer_name, merchant_id) VALUES ('$invoice_id', '$numberVA', '$item_name', $amount, '$payment_type', '$customer_name', $merchant_id)";

    $response = array();

	if ($conn->query($sql) === TRUE) {

        $reference_id = $conn->insert_id;
        $sql = "INSERT INTO transaction_histories (reference_id) VALUES ($reference_id)";
        if ($conn->query($sql) === TRUE) {
            $response['reference_id'] = $reference_id;
            $response['number_va'] = $numberVA;
            $response['status'] = "Pending";
        } else {
            $response['message'] = "Error: " . $sql . $conn->error;
        }
        
	} else {
		$response['message'] = "Error: " . $sql . $conn->error;
    }

    echo json_encode($response);
?>