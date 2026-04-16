<?php
include('header.php');
$id=$_GET['id'];
$sql="delete from services where id=$id";
if (mysqli_query($con, $sql)){
        echo "<script>alert('Record Delete');
        window.location.href='service_table.php';</script>";
 } else {
        echo "Error: " . mysqli_error($con);
}
include('footer.php');
?>