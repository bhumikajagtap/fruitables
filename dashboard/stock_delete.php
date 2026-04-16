<?php
include('header.php');

if(!isset($_GET['id'])){
    die("ID not found");
}

$id = intval($_GET['id']);

$sql = "DELETE FROM stock WHERE product_id=$id";

if (mysqli_query($con, $sql)) {
    echo "<script>
            alert('Record Deleted');
            window.location.href='stock_table.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($con);
}

include('footer.php');
?>