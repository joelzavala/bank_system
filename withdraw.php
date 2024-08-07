<?php
include "db.php";

// Crear o obtener el semáforo
$sem_key = ftok(__FILE__, 'a');
$sem_id = sem_get($sem_key, 1);
$withdraw_amount = 10.00;

// Intentar adquirir el semáforo
if (sem_acquire($sem_id)) {
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

    // Liberar el semáforo
    sem_release($sem_id);
} else {
    echo "Unable to acquire semaphore.";
}

$mysqli->close();
?>
