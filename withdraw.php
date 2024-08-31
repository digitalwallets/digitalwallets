<?php
require 'config.php';
require 'balance.php';

// Retrieve the withdrawal amount from the form
$amount = $_POST['withdraw-amount'] * 100; // Convert to cents
$amount_cad = $_POST['withdraw-amount']; // Amount in CAD

// Get the current balance
$currentBalance = getBalance();

// Check if the amount to withdraw is less than or equal to the current balance
if ($amount_cad > $currentBalance) {
    echo "Error: Insufficient balance.";
    exit;
}

// Assume you have a user ID and connected account ID
$userId = 'user_connected_account_id'; // Replace with actual connected account ID

try {
    // Create a payout
    $payout = \Stripe\Payout::create([
        'amount' => intval($amount), // Amount in cents
        'currency' => 'cad',
        'destination' => 'your_bank_account_or_card_id', // Replace with actual bank account or card ID
        'transfer_group' => 'group_' . uniqid(), // Optional: Use for grouping transfers
    ], [
        'stripe_account' => $userId, // Specify the connected account
    ]);

    // Update the balance
    $newBalance = $currentBalance - $amount_cad;
    updateBalance($newBalance);

    echo "Payout successful! Payout ID: " . $payout->id;
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Handle API errors
    echo "Error: " . $e->getMessage();
}
?>
