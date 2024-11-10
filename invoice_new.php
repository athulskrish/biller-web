<!-- edited from invoice.php -->
<!DOCTYPE html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>

    <title>Order Invoice</title>

    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <link rel='stylesheet' type='text/css' href='css/print.css' media="print"/>
    <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='js/example.js'></script>
    
      <style type="text/css">
        @media print {
            #printbtn {
                display :  none;
            }
        }


        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }


    </style>

    <script>
        function printpage()
        {
            window.print()
        }
    </script>
    
    

</head>

<body>

<div id="page-wrap">

    <textarea id="header">INVOICE</textarea>
    <table id="meta">
            <tr>
                <td class="meta-head">Invoice #</td>
                <td><p><?php echo  $_GET['id'] ?></p></td>
            </tr>
    </table>

    <div id="identity">

        <?php
        include('db_connect.php');
        include("my_function.php");
        $getid = $_GET['id'];
        $my_result = mysqli_query($con, "SELECT * FROM order_new WHERE order_uid='$getid'");
        
        // echo "The new order_uid is: " . $getid;
        $data = mysqli_fetch_array($my_result)

        ?>


        
            
          

      

    </div>



    <table id="items">

        <tr>
            <th>Item</th>
            <!-- <th>Description</th> -->
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Item Total</th>
        </tr>


        <?php

        $currency = getCurrency();

        $result = mysqli_query($con, "SELECT * FROM order_new WHERE order_uid='$getid'");

        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='item-row'>";
            echo "<td class='item-name'>" . $i . '.  ' . $row['name'] . "</td>";
              // echo "<td class='description'>" . $row['product_name'] . "- Weight:".$row['product_weight']."</td>";
            // echo "<td class='cost'>" . getCurrency().' ' . $row['product_price'] . "</td>";
            // echo "<td class='cost'>" . $row['product_quantity'] . "</td>";
            echo "<td class='item-name'>"  . $row['rate'] . "</td>";
            echo "<td class='item-name'>"  . $row['qty'] . "</td>";
            echo "<td class='item-name'>"    . $row['tax'] . "</td>";
            echo "<td class='cost'>" .'Rs ' . $row['qty'] * $row['rate'] *$row['tax']. "</td>";


            $i++;
        }

        ?>


        <tr>
            <td colspan="2" class="blank"></td>
            <td colspan="2" class="total-line">Subtotal</td>
            <td class="total-value">
                <div id="subtotal"> <?php echo 'Rs '.$data['rate'] ?></div>
            </td>
        </tr>



        <tr>
            <td colspan="2" class="blank"></td>
            <td colspan="2" class="total-line">Tax (+)</td>
            <td class="total-value">
                <div id="subtotal"><?php echo 'Rs '.$data['tax'] ?></div>
            </td>
        </tr>

        <!-- <tr>
            <td colspan="2" class="blank"></td>
            <td colspan="2" class="total-line">Discount (-)</td>
            <td class="total-value">
                <div id="subtotal"><?php
                //  echo getCurrency().' '.$data['discount']
                  ?></div>
            </td>
        </tr> -->


        <tr>
            <td colspan="2" class="blank"></td>
            <td colspan="2" class="total-line balance">Total Amount = </td>
            <td class="total-value balance">
                <div class="due"><?php
                    $final_price=$data['rate']+$data['tax'] ;
                    echo "<b>".' Rs '; echo $final_price ?></b></div>
            </td>
        </tr>

    </table>

    <div id="terms">
        <h5>THANK YOU</h5>
<!--        <p>--><?php //echo strtoupper(getAmountInWord($final_price)) . ' ONLY' ?><!--</p>-->
    </div>
    
    
     <div align='center'>
        <input class="button" id ="printbtn" type="button" value="Print Invoice" onclick="window.print();" >
    </div>

    <br>
    <br>
    <br>

</div>

</body>

</html>