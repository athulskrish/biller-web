<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $code = $_POST['code'];
    $name = $_POST['name'];
    $bos = $_POST['bos'];
    $sak = $_POST['sak'];
    $qty = $_POST['qty'];
    $rate = $_POST['rate'];
    $tax = $_POST['tax'];

    // Calculate total before tax
    $subtotal = $qty * $rate;

    // Calculate tax amount
    $taxAmount = ($subtotal * $tax) / 100;

    // Calculate total after tax
    $total = $subtotal + $taxAmount;

    // Display the result
    echo "<h2>Invoice Details</h2>";
    echo "Code: $code <br>";
    echo "Name: $name <br>";
    echo "BOS: $bos <br>";
    echo "SAK: $sak <br>";
    echo "Quantity: $qty <br>";
    echo "Rate: $rate <br>";
    echo "Tax: $tax% <br>";
    echo "Subtotal: $" . number_format($subtotal, 2) . "<br>";
    echo "Tax Amount: $" . number_format($taxAmount, 2) . "<br>";
    echo "Total: $" . number_format($total, 2) . "<br>";
}
?>

<!-- HTML form for input -->
<!DOCTYPE html>
<html>
<head>
    <title>Calculate Total</title>
</head>
<body>
    <form method="post" action="">
        Code: <input type="text" name="code" required><br><br>
        Name: <input type="text" name="name" required><br><br>
        BOS: <input type="text" name="bos" required><br><br>
        SAK: <input type="text" name="sak" required><br><br>
        Quantity: <input type="number" name="qty" required><br><br>
        Rate: <input type="number" name="rate" step="0.01" required><br><br>
        Tax (%): <input type="number" name="tax" step="0.01" required><br><br>
        <input type="submit" value="Calculate Total">
    </form>
</body>
</html>
