<?php
include "db.php";

$withdraw_amount = 10.00;

$mysqli->begin_transaction();
$result = $mysqli->query("SELECT balance FROM accounts WHERE id = 1 FOR UPDATE");

if ($result) {
    $row = $result->fetch_assoc();
    if ($row['balance'] >= $withdraw_amount) {
        $new_balance = $row['balance'] - $withdraw_amount;
        $mysqli->query("UPDATE accounts SET balance = $new_balance WHERE id = 1");
        $mysqli->query("INSERT INTO logs (transaction_type, amount, remaining_balance) VALUES ('withdrawal', $withdraw_amount, $new_balance)");
        $mysqli->commit();
        echo "Withdrawal successful. New balance: " . $new_balance;
    } else {
        $mysqli->rollback();
        echo "Insufficient funds.";
    }
} else {
    $mysqli->rollback();
    echo "Transaction failed.";
}

$mysqli->close();
?>
