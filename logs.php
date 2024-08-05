<?php

include "db.php";

$result = $mysqli->query("SELECT * FROM logs ORDER BY transaction_time DESC");

if ($result) {
    echo "<table border='1'><tr><th>ID</th><th>Time</th><th>Type</th><th>Amount</th><th>Balance</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['transaction_time']}</td><td>{$row['transaction_type']}</td><td>{$row['amount']}</td><td>{$row['remaining_balance']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Error fetching logs.";
}

$mysqli->close();
?>
