<?php
session_start();
include('config.php');

$id = $_POST['id'];
$action = $_POST['action'];

foreach ($_SESSION['cart'] as $key => $item) {

    if ($item['id'] == $id) {

        $quantity = $item['quantity'];

        // 🔹 stock fetch
        $res = mysqli_query($con, "SELECT qty FROM stock WHERE pid = $id");
        $row = mysqli_fetch_assoc($res);

        // 🔹 Increase
        if ($action == "increase") {

            if ($quantity + 1 > $row['qty']) {
                echo "<script>
                        alert('Only ".$row['qty']." items available');
                        window.location='cart.php';
                      </script>";
                exit();
            }

            $_SESSION['cart'][$key]['quantity']++;

        }

        // 🔹 Decrease
        if ($action == "decrease") {

            if ($quantity > 1) {
                $_SESSION['cart'][$key]['quantity']--;
            }
        }
    }
}

header("Location: cart.php");
exit();
?>