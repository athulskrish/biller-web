<!DOCTYPE html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <title>Order Invoice</title>

    <!-- Linking to external and print-specific CSS -->
    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <link rel='stylesheet' type='text/css' href='css/print.css' media="print"/>
    
    <!-- Inline CSS and print styles -->
    <style type="text/css">
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 14px; line-height: 1.4; }
        #page-wrap { max-width: 58mm; margin: 0 auto; padding: 10px; }

        @media print {
            #printbtn { display: none; }
        }

        #header { text-align: center; font-weight: bold; font-size: 18px; padding: 10px 0; border-bottom: 1px dashed #000; }
        #meta, #items { width: 100%; margin-top: 10px; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        table th, table td { padding: 5px; border-bottom: 1px dashed #000; }
        table th { text-align: left; background-color: #f0f0f0; font-weight: bold; }
        .total-line { text-align: right; font-weight: bold; }
        .total-value { text-align: right; }
        #terms { text-align: center; margin-top: 20px; font-size: 12px; }
        .button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; font-size: 14px; }
    </style>

</head>

<body>
<div id="page-wrap">

    <!-- Invoice header -->
    <div id="header">INVOICE</div>

    <!-- Invoice meta details -->
    <table id="meta">
        <tr>
            <td>Invoice #:</td>
            <td><?php echo $_GET['id']; ?></td>
        </tr>
    </table>

    <!-- Database connection and fetching order details -->
    <?php
        include('db_connect.php');
        include("my_function.php");

        $getid = $_GET['id'];
        $result = mysqli_query($con, "SELECT * FROM order_new WHERE order_uid='$getid'");

        $subtotal = 0;
        $taxTotal = 0;
        $final_price = 0;
    ?>

    <!-- Table for item details -->
    <table id="items">
        <tr>
            <th>Item</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Tax (%)</th>
            <th>Item Total</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <?php
                $itemTotal = $row['qty'] * $row['rate'] * (1 + $row['tax'] / 100);
                $subtotal += $row['qty'] * $row['rate'];
                $taxTotal += ($row['qty'] * $row['rate'] * $row['tax']) / 100;
                $final_price = $subtotal + $taxTotal;
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo 'Rs ' . number_format($row['rate'], 2); ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['tax']; ?>%</td>
                <td><?php echo 'Rs ' . number_format($itemTotal, 2); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Subtotal, Tax, and Total calculations -->
    <table id="items">
        <tr>
            <td colspan="3" class="total-line">Subtotal</td>
            <td class="total-value">Rs <?php echo number_format($subtotal, 2); ?></td>
        </tr>
        <tr>
            <td colspan="3" class="total-line">Tax (+)</td>
            <td class="total-value">Rs <?php echo number_format($taxTotal, 2); ?></td>
        </tr>
        <tr>
            <td colspan="3" class="total-line balance">Total Amount =</td>
            <td class="total-value balance">Rs <?php echo number_format($final_price, 2); ?></td>
        </tr>
    </table>

    <!-- Footer terms and print button -->
    <div id="terms">
        <h5>THANK YOU</h5>
    </div>
    <div align='center'>
        <input class="button" id="printbtn" type="button" value="Print Invoice" onclick="window.print();">
    </div>

</div>
</body>
</html>
