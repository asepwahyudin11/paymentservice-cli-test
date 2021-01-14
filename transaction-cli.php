<?php
    include "config/connection.php";
    
    if ($argc == 3) {
        if ($argv[2] == "Pending" || $argv[2] == "Paid" || $argv[2] == "Failed") {
            $sql = "INSERT INTO transaction_histories (reference_id, status) VALUES ($argv[1], '$argv[2]')";
            if ($conn->query($sql) === TRUE) {
                echo "Transaction history created successfully \n";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error . "\n";
            }
        } else {
            echo "Transaction history status is not available \n";
        }
    }else {
        echo "No query was executed, there was a formatting error \n";
    }

?>