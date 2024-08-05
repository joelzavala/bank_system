for ((i = 0 ; i < 10 ; i++)); do
  curl "http://localhost/withdraw.php" & #-d amount=$((i + 1) * 10) -H "Content-Type: application/x-www-form-urlencoded" &
done
