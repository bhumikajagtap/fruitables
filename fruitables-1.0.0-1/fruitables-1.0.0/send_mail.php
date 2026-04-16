<?php
session_start();

// ==========================
// CUSTOMER DATA
// ==========================
$to       = "rajeshwariganji1979@gmail.com";   // Customer Email
$fname    = "Rajeshwari";                  // Customer Name
$order_id = rand(1000,9999);             // Order ID
$total    = 0;

// ==========================
// BUILD EMAIL MESSAGE
// ==========================
$message = "
<html>
<head>
<title>Order Confirmation</title>
<style>
table {border-collapse: collapse; width: 100%;}
th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}
th {background-color: #AB7442; color: white;}
</style>
</head>
<body>

<h2>Thank you for your order, $fname!</h2>
<p>Your order has been placed successfully.</p>
<p><strong>Order ID:</strong> #$order_id</p>

<h3>Products Purchased:</h3>
<table>
<tr>
    <th>Products</th>
    <th>Img</th>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
</tr>
";

$i = 1;

foreach ($_SESSION['cart'] as $item) {
     $img = $item['img'];
    $product_name = $item['pname'];
    $price        = $item['price'];
    $quantity     = $item['quantity'];
    $item_total   = $price * $quantity;

    $total += $item_total;

    $message .= "
    <tr>
        <td>$i</td>
        <td>$img</td>
        <td>$product_name</td>
        <td>₹$price</td>
        <td>$quantity</td>
        <td>₹$item_total</td>
    </tr>
    ";

    $i++;
}

$message .= "
</table>

<h3>Order Total: ₹$total</h3>

<p>We will notify you once your order is shipped.</p>

</body>
</html>
";

// ==========================
// SEND EMAIL USING PHPMailer
// ==========================

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'jagtapbhumika284@gmail.com';   // YOUR GMAIL
    $mail->Password   = 'ncyvlyprdgsztmgm';     // GMAIL APP PASSWORD
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('jagtapbhumika284@gmail.com', 'Bhumi jewellers');
    $mail->addAddress($to);

    $mail->isHTML(true);
    $mail->Subject = "Order Confirmation - Bhumi jewellers ";
    $mail->Body    = $message;

    $mail->send();

    echo "<script>alert('✅ Email Sent Successfully');</script>";

} catch (Exception $e) {

    echo "<script>alert('❌ Mailer Error: {$mail->ErrorInfo}');</script>";
}

?>