<?php
include('header.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid ID");
}

$id = intval($_GET['id']);

/* FETCH PRODUCT */
$sql1 = "SELECT * FROM inword WHERE id = $id";
$res  = mysqli_query($con, $sql1);
$row  = mysqli_fetch_assoc($res);

/* UPDATE PRODUCT */
if (isset($_POST['store'])) {

    $pid   = $_POST['pid'];
    $qty  = $_POST['qty'];
    

    
    $sql = "UPDATE inword SET
            pid='$pid',
            qty='$qty'
            WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Record Updated Successfully');
                window.location='inword_table.php';
              </script>";
    } else {
        echo "Update Error: " . mysqli_error($con);
    }
}
?>

<!-- content starts -->
<div class="main-content">
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Update Inoword</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="white_box mb_30">
                                <div class="modal-content cs_modal">
                                    <div class="modal-header theme_bg_1 justify-content-center">
                                        <h5 class="modal-title text_white">Update Product</h5>
                                    </div>

                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data">

                                            <!-- Category -->
                                            <div class="form-group">
                                                <label>Product</label>
                                                <select name="pid" class="form-control" required>
                                                    <option value="">Select Product</option>
                                                    <?php
                                                    $p = mysqli_query($con, "SELECT * FROM product");
                                                    while ($pr = mysqli_fetch_assoc($p)) {
                                                        $sel = ($pr['pid'] == $row['pid']) ? "selected" : "";
                                                        echo "<option value='{$pr['pid']}' $sel>{$pr['pname']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Product Name -->
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="number" name="qty" class="form-control"
                                                       value="<?php echo $row['qty']; ?>" required>
                                            </div>

                                            <!-- Submit -->
                                            <input type="submit" name="store" value="Update"
                                                   class="btn btn-primary">

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content ends -->