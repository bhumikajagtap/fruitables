<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'jagtapbhumika284@gmail.com';   // your gmail
$mail->Password   = 'ncyvlyprdgsztmgm';     // app password
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;

$mail->setFrom('jagtapbhumika284@gmail.com', 'Fruitables');
$mail->addAddress('jagtapbhumika284@gmail.com');

$mail->Subject = 'Test';
$mail->Body    = 'Test mail';

$mail->send();

echo "Mail Sent";
?>