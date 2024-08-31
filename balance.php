<?php
// Define the path to the balance file
define('BALANCE_FILE', 'balance.txt');

// Function to get the current balance
function getBalance() {
    if (!file_exists(BALANCE_FILE)) {
        // Initialize balance if file does not exist
        file_put_contents(BALANCE_FILE, '0');
    }
    return (float)file_get_contents(BALANCE_FILE);
}

// Function to update the balance
function updateBalance($newBalance) {
    file_put_contents(BALANCE_FILE, number_format($newBalance, 2));
}
?>
