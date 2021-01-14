<?php
    include "../config/connection.php";

    $reference_id = addslashes(htmlentities($_POST['reference_id']));
    $merchant_id = addslashes(htmlentities($_POST['merchant_id']));

    $sql = "SELECT t.invoice_id, h.status FROM transactions t INNER JOIN transaction_histories h ON t.reference_id=h.reference_id WHERE t.reference_id=" . $reference_id . " AND merchant_id=" . $merchant_id . " ORDER BY h.created_at DESC LIMIT 0, 1";
    $result = $conn->query($sql);

    $response = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $response['reference_id'] = $reference_id;
            $response['invoice_id'] = $row['invoice_id'];
            $response['status'] = $row['status'];
        }
    } else {
        $response['message'] = "Transaction data with reference_id " . $reference_id . " and merchant_id " . $merchant_id . " is not available";
    }

    echo json_encode($response);
?>