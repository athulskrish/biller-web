<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "keramfvp_smartpos";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the arrays from POST data
    $codes=$_POST['code'];

    $names = $_POST['name'];
    $boss=$_POST['bos'];
    $saks=$_POST['sak'];
    $quantities = $_POST['qty'];
    $rates = $_POST['rate'];
    $taxes = $_POST['tax'];
    $totals = $_POST['total'];

    // Loop through the arrays and insert each row into the database
    for ($i = 0; $i < count($names); $i++) {
        $code= $conn->real_escape_string($codes[$i]);
        $name = $conn->real_escape_string($names[$i]);       
        $bos=$conn->real_escape_string($boss[$i]); 
        $sak=$conn->real_escape_string($saks[$i]); 
        $qty = (float)$quantities[$i];
        $rate = (float)$rates[$i];
        $tax = (float)$taxes[$i];
        $total = (float)$totals[$i];

        // Insert query
        $sql = "INSERT INTO order_new (`code`,`name`,`bos`,`sak`, `qty`, `rate`, `tax`,`total`)
                VALUES ('$code','$name','$bos','$sak','$qty',' $rate', '$tax',' $total'  )";

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
<!--  -->
          <!-- Main content -->
          <!-- <section class="content">
                <div class="row">
                    <div class="col-12"> -->

                        <!-- /.card -->

                        <!-- <div class="card">
                        


                          
                                     /.card-body 
                                        <div class="card-footer"> -->

<div class="total-container" width="100%">
    <h2>Product Entry Table</h2>
    <label for="grandTotal">Grand Total:</label>
    <input type="text" id="grandTotal" readonly>
</div>
<form method="POST">
<table id="productTable">
    <thead>
        <tr>
            <th >Code</th>
            <th>Name</th>
            <th>Bos</th>
            <th>Sak</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Tax (%)</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td><input type="text" name="code[]" class="code" ></td>
            <td><input type="text" name="name[]" class="name"></td>
            <td><input type="text" name="bos[]" class="bos" ></td>
            <td><input type="text" name="sak[]" class="sak" ></td>
            <td><input type="number" name="qty[]" class="qty" value="0"></td>
            <td><input type="number" name="rate[]" class="rate" value="0"></td>
            <td><input type="number" name="tax[]" class="tax" value="0"></td>
            <td><input type="text" name="total[]" class="total" readonly></td>
        </tr>
    </tbody>
</table>


<button type="submit">Submit</button>
</form>
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
         <td><input type="text" name="code[]" class="code" ></td>
            <td><input type="text" name="name[]" class="name"></td>
            <td><input type="text" name="bos[]" class="bos" ></td>
            <td><input type="text" name="sak[]" class="sak" ></td>
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
