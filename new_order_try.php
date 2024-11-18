<?php


session_start();
if (isset($_SESSION['email']) AND isset($_SESSION['user_type']) AND isset($_SESSION['key']) )
    echo " ";
else {
    header("location:index.php");

}


include('db_connect.php');
$user_type = $_SESSION['user_type'];


// Query to get the last order_uid
$sql = "SELECT order_uid FROM order_new ORDER BY order_new_id DESC LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Fetch the last order_uid
    $row = $result->fetch_assoc();
    $last_order_uid = $row['order_uid'];

    // Assuming order_uid is numeric, increment it by 1
    $new_order_uid = (int)$last_order_uid + 1;
} else {
    // If no previous order_uid exists, start with a default value
    $new_order_uid = 1; // Or any other starting value
}

echo "The new order_uid is: " . $new_order_uid;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "database";

    // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

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
        $code= $con->real_escape_string($codes[$i]);
        $name = $con->real_escape_string($names[$i]);       
        $bos=$con->real_escape_string($boss[$i]); 
        $sak=$con->real_escape_string($saks[$i]); 
        $qty = (float)$quantities[$i];
        $rate = (float)$rates[$i];
        $tax = (float)$taxes[$i];
        $total = (float)$totals[$i];

        if( empty($code) ||empty($name) ||empty($bos)||empty($sak) || empty($qty)|| empty($rate) || empty($tax) ){
        }
        else{
        // Insert query
        $sql = "INSERT INTO order_new (`code`,`name`,`bos`,`sak`, `qty`, `rate`, `tax`,`total`,`order_uid`)
                VALUES ('$code','$name','$bos','$sak','$qty',' $rate', '$tax',' $total'  ,'$new_order_uid')";

        if (!$con->query($sql)) {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    }

    echo "Records inserted successfully.";
//    echo' <script>
//     window.location="invoice_new_try.php?id=" . $new_order_uid . "\";</script>';
header("Location: invoice_new_try.php?id=" . $new_order_uid);
exit();


    // Close the connection
    $con->close();
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
<?php echo"
<a class='btn btn-primary' href=\"invoice_new_try.php?id=" . $new_order_uid . "\" target='_blank'><button  >Submit</button></a>";
?>
</form>
<button id="addRow">Add Row</button>
<?php echo "<a class='btn btn-primary'  href=\"invoice_new_try.php?id=" . $new_order_uid . "\" target='_blank'><button><i class='fas fa-receipt'>Print</i></button></a> ";
                             ?>

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
