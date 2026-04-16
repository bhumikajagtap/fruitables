<?php
include('header.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            alert('Invalid Request');
            window.location.href='inword_table.php';
          </script>";
    exit();
}

$id = intval($_GET['id']);

// Fetch pid and qty from inword
$getData = mysqli_query($con, "SELECT pid, qty FROM inword WHERE id=$id");

if (mysqli_num_rows($getData) > 0) {
    $row = mysqli_fetch_assoc($getData);

    $pid = $row['pid'];
    $qty = $row['qty'];

    //Minus qty from STOCK table
    $updateStock = mysqli_query($con, 
        "UPDATE stock SET qty = qty - $qty WHERE pid = $pid"
    );

    //  Delete record from inword
    $delete = mysqli_query($con, "DELETE FROM inword WHERE id=$id");

    if ($delete) {
        echo "<script>
                alert('Record Deleted & Stock Updated');
                window.location.href='inword_table.php';
              </script>";
    } else {
        echo "Delete Error: " . mysqli_error($con);
    }

} else {
    echo "<script>
            alert('Record Not Found');
            window.location.href='inword_table.php';
          </script>";
}

include('footer.php');
?>