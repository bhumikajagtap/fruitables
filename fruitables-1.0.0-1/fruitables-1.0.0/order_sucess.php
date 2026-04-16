<?php
include('config.php');

if(!isset($_GET['bill_id'])){
    die("Invalid Request");
}

$bill_id = $_GET['bill_id'];

$sql = "SELECT * FROM bill_detaill WHERE bid = '$bill_id'";
$res = mysqli_query($con, $sql);
$bill = mysqli_fetch_assoc($res);

if(!$bill){
    die("Billing data not found");
}

$sql2 = "SELECT * FROM order_details WHERE bill_id = '$bill_id'";
$res2 = mysqli_query($con, $sql2);
?>

<!DOCTYPE html>
<html>
<head>
    
    <style>
        body{
            font-family:Arial; 
            background:#f5f5f5;
        }
        .container{
            width:800px; 
            margin:auto; 
            background:white; 
            padding:20px;
        }
        h2{
            text-align:center;
            color:green;
        }
        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }
        table, th, td{
            border:1px solid #ccc;
        }
        th, td{
            padding:10px;
            text-align:center;
        }
        .right{
            text-align:right;
        }
    </style>
</head>

<body>

<div class="container">

<h2>Order Successful </h2>

<h3>Billing Details</h3>

<p><b>Name:</b> <?php echo $bill['fname']." ".$bill['lname']; ?></p>
<p><b>Address:</b> <?php echo $bill['address']; ?></p>
<p><b>City:</b> <?php echo $bill['city']; ?></p>
<p><b>Country:</b> <?php echo $bill['country']; ?></p>
<p><b>Pincode:</b> <?php echo $bill['pincode']; ?></p>
<p><b>Mobile:</b> <?php echo $bill['mobileno']; ?></p>
<p><b>Email:</b> <?php echo $bill['email']; ?></p>

<hr>

<h3>Order Details</h3>

<table>
<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
</tr>

<?php
$total = 0;

while($row = mysqli_fetch_assoc($res2)){
    $total += $row['total'];
?>

<tr>
    <td><?php echo $row['product_name']; ?></td>
    <td>₹<?php echo $row['price']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td>₹<?php echo $row['total']; ?></td>
</tr>

<?php } ?>

<tr>
    <td colspan="3" class="right"><b>Grand Total</b></td>
    <td><b>₹<?php echo $total; ?></b></td>
</tr>

</table>

<br>
<div style="text-align:center;">
    <button onclick="window.print()">Print Bill </button>
</div>
<div style="text-align:center; margin-top:15px;">
    <button onclick="window.location.href='index.php'" 
            style="padding:10px 20px; background:green; color:white; border:none; border-radius:5px;">
        Continue Shopping
    </button>
</div>
</div>

</body>
</html>