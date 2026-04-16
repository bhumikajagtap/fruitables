<?php
session_start();

session_unset();

session_destroy();

echo"<script>alert('Thank you for visiting');
window.location.href='login_page.php';</script>";

exit();
?>