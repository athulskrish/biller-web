<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the arrays from POST data
    $names = $_POST['name'];
    $quantities = $_POST['qty'];
    $rates = $_POST['rate'];
    $taxes = $_POST['tax'];
    $totals = $_POST['total'];

    // Loop through the arrays and insert each row into the database
    for ($i = 0; $i < count($names); $i++) {
        $name = $conn->real_escape_string($names[$i]);
        $qty = (float)$quantities[$i];
        $rate = (float)$rates[$i];
        $tax = (float)$taxes[$i];
        $total = (float)$totals[$i];

        // Insert query
        $sql = "INSERT INTO products (name, qty, rate, tax, total)
                VALUES ('$name', $qty, $rate, $tax, $total)";

        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    echo "Records inserted successfully.";

    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table with Total Calculation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        .total-container {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="total-container">
    <h2>Product Entry Table</h2>
    <label for="grandTotal">Grand Total:</label>
    <input type="text" id="grandTotal" readonly>
</div>

<table id="productTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Tax (%)</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="name[]" class="name"></td>
            <td><input type="number" name="qty[]" class="qty" value="0"></td>
            <td><input type="number" name="rate[]" class="rate" value="0"></td>
            <td><input type="number" name="tax[]" class="tax" value="0"></td>
            <td><input type="text" name="total[]" class="total" readonly></td>
        </tr>
    </tbody>
</table>
<button id="addRow">Add Row</button>

<script>
$(document).ready(function() {
    // Function to calculate total for a row
    function calculateTotal(row) {
        let qty = parseFloat($(row).find('.qty').val()) || 0;
        let rate = parseFloat($(row).find('.rate').val()) || 0;
        let tax = parseFloat($(row).find('.tax').val()) || 0;
        
        let total = qty * rate + (qty * rate * tax / 100);
        $(row).find('.total').val(total.toFixed(2));

        updateGrandTotal();
    }

    // Function to update the grand total by summing all row totals
    function updateGrandTotal() {
        let grandTotal = 0;
        $('#productTable .total').each(function() {
            grandTotal += parseFloat($(this).val()) || 0;
        });
        $('#grandTotal').val(grandTotal.toFixed(2));
    }

    // Calculate total whenever qty, rate, or tax changes
    $('#productTable').on('input', '.qty, .rate, .tax', function() {
        let row = $(this).closest('tr');
        calculateTotal(row);
    });

    // Add a new row when needed
    $('#addRow').click(function() {
        let newRow = `<tr>
            <td><input type="text" name="name[]" class="name"></td>
            <td><input type="number" name="qty[]" class="qty" value="0"></td>
            <td><input type="number" name="rate[]" class="rate" value="0"></td>
            <td><input type="number" name="tax[]" class="tax" value="0"></td>
            <td><input type="text" name="total[]" class="total" readonly></td>
        </tr>`;
        $('#productTable tbody').append(newRow);
    });

    // Automatically add a new row when last row is filled
    $('#productTable').on('input', '.name, .qty, .rate, .tax', function() {
        let lastRow = $('#productTable tbody tr:last');
        let isFilled = lastRow.find('.name').val() && lastRow.find('.qty').val() && lastRow.find('.rate').val() && lastRow.find('.tax').val();

        if (isFilled) {
            $('#addRow').click();
        }
    });

    // Recalculate the grand total whenever a row is removed or updated
    $('#productTable').on('input', '.qty, .rate, .tax', function() {
        updateGrandTotal();
    });
});
</script>

</body>
</html>
