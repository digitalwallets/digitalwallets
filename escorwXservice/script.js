async function fetchBalance() {
    try {
        const response = await fetch('https://your-backend-url.com/api/balance'); // Fetches the balance from the backend
        const data = await response.json(); // Parses the response as JSON
        return data.balance; // Returns the balance
    } catch (error) {
        console.error('Error fetching balance:', error); // Logs an error if the fetch fails
    }
}

async function updateBalance() {
    const balance = await fetchBalance(); // Calls fetchBalance to get the balance
    if (balance !== undefined) {
        document.getElementById('balance').innerText = balance.toFixed(2); // Updates the balance on the page
    }
}

document.getElementById('withdrawBtn').addEventListener('click', async () => {
    try {
        const response = await fetch('https://your-backend-url.com/api/withdraw', {
            method: 'POST', // Specifies the HTTP method as POST
            headers: { 'Content-Type': 'application/json' }, // Sets the request headers
        });
        const result = await response.json(); // Parses the response as JSON

        if (result.success) {
            alert('Withdrawal successful!'); // Alerts the user if the withdrawal is successful
            updateBalance(); // Updates the balance after withdrawal
        } else {
            alert('Error: ' + result.message); // Alerts the user if there’s an error
        }
    } catch (error) {
        console.error('Error during withdrawal:', error); // Logs any error that occurs during withdrawal
        alert('An error occurred during withdrawal.'); // Alerts the user if an error occurs
    }
});

updateBalance(); // Calls updateBalance when the page loads to display the current balance
