<?php
include('header.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid Product ID");
}

$id = intval($_GET['id']);

/* FETCH PRODUCT */
$sql1 = "SELECT * FROM category WHERE id = $id";
$res  = mysqli_query($con, $sql1);
$row  = mysqli_fetch_assoc($res);

/* UPDATE PRODUCT */
if (isset($_POST['store'])) {

    $cname  = $_POST['cname'];
    $img_name = $_POST['img'];

    // Image handling
    if (!empty($_FILES['img']['name'])) {
        $image_name = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "file/" . $image_name);
    } else {
        $image_name = $row['img'];
    }

    $sql = "UPDATE category SET
            cname='$cname',
            img='$image_name'
            WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Record Updated Successfully');
                window.location='cat_table.php';
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
                    <h1 class="h3 mb-0 text-gray-800">Update category</h1>
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
                                        <h5 class="modal-title text_white">Update Category</h5>
                                    </div>

                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data">

                                            <!-- Category 
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="cid" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    $cat = mysqli_query($con, "SELECT * FROM category");
                                                    while ($c = mysqli_fetch_assoc($cat)) {
                                                        $sel = ($c['pid'] == $row['cid']) ? "selected" : "";
                                                        echo "<option value='{$c['id']}' $sel>{$c['cname']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>-->

                                            <!-- Product Name -->
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="cname" class="form-control"
                                                       value="<?php echo $row['cname']; ?>" required>
                                            </div>

                                            <!-- Description
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="desction" class="form-control"
                                                       value="<?php echo $row['desction']; ?>" required>
                                            </div>

                                             Price
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="price" class="form-control"
                                                       value="<?php echo $row['price']; ?>" required>
                                            </div>-->

                                            <!-- Current Image -->
                                            <div class="form-group">
                                                <label>Current Image</label><br>
                                                <img src="file/<?php echo $row['img']; ?>" width="80">
                                            </div>

                                            <!-- Change Image -->
                                            <div class="form-group">
                                                <label>Change Image</label>
                                                <input type="file" name="img" class="form-control">
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
