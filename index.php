<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Management</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Fund Management</h1>

    <?php
    require 'balance.php';
    // Display current balance
    $balance = getBalance();
    echo "<p>Current Balance: CAD " . number_format($balance, 2) . "</p>";
    ?>

    <form id="withdraw-form" action="withdraw.php" method="post">
        <label for="withdraw-amount">Withdraw Amount (CAD):</label>
        <input type="number" id="withdraw-amount" name="withdraw-amount" step="0.01" required>
        <button type="submit">Withdraw</button>
    </form>
</body>
</html>
