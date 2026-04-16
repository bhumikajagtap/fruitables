<?php
include('header.php');

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid Service ID");
}

$id = intval($_GET['id']);

$sql1 = "SELECT * FROM services WHERE id = $id";
$res  = mysqli_query($con, $sql1);

if (mysqli_num_rows($res) == 0) {
    die("Service not found");
}

$row = mysqli_fetch_assoc($res);

if (isset($_POST['store'])) {

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $desc  = mysqli_real_escape_string($con, $_POST['desction']);

    if (!empty($_FILES['img']['name'])) {
        $image_name = time() . "_" . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "file/" . $image_name);
    } else {
        $image_name = $row['img'];
    }

    $sql = "UPDATE services SET
            title='$title',
            desction='$desc',
            img='$image_name'
            WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Record Updated Successfully'); window.location='service_table.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
                    <!-- content starts -->
                    <div class="main-content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid px-lg-4">
                            <div class="row">
                                <div class="col-md-12 mt-lg-4 mt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 text-gray-800">Service</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Begin Page Content -->
                        <div class="inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="white_box mb_30">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-6">
                                                            <!-- sign_in  -->
                                                            <div class="modal-content cs_modal">
                                                                <div class="modal-header theme_bg_1 justify-content-center">
                                                                    <h5 class="modal-title text_white">Service</h5>
                                                                </div>

                                                                 <div class="modal-body">
                                                                    <form method="post" enctype="multipart/form-data">


                                                                        <div class="form-group">
                                                                             <label>Title</label>
                                                                              <input type="text" name="title" class="form-control"
                                                                                 value="<?php echo $row['title']; ?>" required>
                                                                        </div>

                                                                           <div class="form-group">
                                                                               <label>Description</label>
                                                                               <input type="text" name="desction" class="form-control"
                                                                                  value="<?php echo $row['desction']; ?>" required>
                                                                            </div>


                                                                            <div class="form-group">
                                                                                 <label>Current Image</label><br>
                                                                                 <img src="file/<?php echo $row['img']; ?>" width="80">
                                                                             </div>

                                                                            <div class="form-group">
                                                                                 <label>Change Image</label>
                                                                                 <input type="file" name="img" class="form-control">
                                                                            </div>

                                                                         <input type="submit" name="store" value="Update" class="btn btn-primary">

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
                        </div>
                    </div>
                    <!-- content Ends -->
                     <?php
                    include('footer.php');
                     ?>