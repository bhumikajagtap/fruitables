<?php
session_start();

session_unset(); // removes all variables

session_destroy(); // destroys session

                 echo "<script>alert('Thank you for visiting');
                 window.location.href='index.php';</script>";

exit();
?>