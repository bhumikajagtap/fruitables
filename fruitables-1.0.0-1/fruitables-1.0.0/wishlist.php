<?php
session_start();
include('config.php');

if(!$con){
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">My Wishlist ❤️</h2>

<?php

if(isset($_SESSION['wishlist']) && count($_SESSION['wishlist']) > 0) {

    foreach($_SESSION['wishlist'] as $id) {

        $id = intval($id);
        $query = mysqli_query($con, "SELECT * FROM product WHERE pid='$id'");

        if(mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
?>

<div class="card mb-3 p-3">
    <div class="row align-items-center">
        
        <div class="col-md-3">
            <img src="../../dashboard/file/<?php echo $row['img']; ?>" 
                 class="img-fluid" style="height:120px;">
        </div>

        <div class="col-md-6">
            <h5><?php echo $row['pname']; ?></h5>
            <p>Price: ₹<?php echo $row['price']; ?></p>
        </div>

        <div class="col-md-3">
            <div class="d-flex justify-content-end gap-2">

                <form action="addtocart.php" method="POST">
                    
                    <!-- Important Fix -->
                    <input type="hidden" name="id" value="<?php echo $row['pid']; ?>">

                    <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>">
                    <input type="hidden" name="desction" value="<?php echo $row['desction']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="img" value="<?php echo $row['img']; ?>">

                    <button type="submit" class="btn btn-success btn-sm">
                        Add to Cart
                    </button>

                </form>

                <a href="del_wishlist.php?id=<?php echo $row['pid']; ?>" 
                   class="btn btn-danger btn-sm">
                   Remove
                </a>

            </div>
        </div>

    </div>
</div>

<?php
        }
    }

} else {
    echo "<h4 class='text-center text-danger'>Your Wishlist is Empty!</h4>";
}
?>

</div>

</body>
</html>