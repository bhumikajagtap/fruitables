<?php
include('header.php');

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            alert('Invalid Request');
            window.location.href='wishlist.php';
          </script>";
    exit();
}

$id = intval($_GET['id']);

// ✅ Use PRIMARY KEY (id)
$sql = "DELETE FROM wishlist WHERE id = $id";

if (mysqli_query($con, $sql)) {
    echo "<script>
            alert('Item removed from wishlist');
            window.location.href='wishlist.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($con);
}

include('footer.php');
?>