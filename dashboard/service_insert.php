<?php
include('header.php');

$con = mysqli_connect('localhost', 'root', '', 'jewellarydb');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['store'])) {

    $title = $_POST['title'];
    $desction = $_POST['desction'];

    $image_name = $_FILES['img']['name'];
    $image_tmp  = $_FILES['img']['tmp_name'];

    if (!empty($image_name)) {
        move_uploaded_file($image_tmp, "file/" . $image_name);
    }

    $sql = "INSERT INTO services (title, desction, img)
            VALUES ('$title', '$desction', '$image_name')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('service Inserted Successfully');</script>";
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
                                        <h1 class="h3 mb-0 text-gray-800">Services</h1>
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
                                                                    <h5 class="modal-title text_white">service</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <form method="post" enctype="multipart/form-data">

                                                                     <!-- <div class="form-group"> 
                                                                        <label>Category ID</label>
                                                                         <input type="text" class="form-control" name="cid" required>
                                                                        </div>-->

                                                                       <div class="form-group">
                                                                         <label>Title</label>
                                                                          <input type="text" class="form-control" name="title" required>
                                                                         </div>

                                                                        <div class="form-group">
                                                                         <label>Desction</label>
                                                                          <input type="text" class="form-control" name="desction" required>
                                                                             </div>

                                                                             <!-- <div class="form-group"> 
                                                                                <label>Price</label>
                                                                                 <input type="text" class="form-control" name="price" required>
                                                                                    </div>-->

                                                                                 <div class="form-group">
                                                                                   <label>Image</label>
                                                                                    <input type="file" class="form-control" name="img" required>
                                                                                   </div>

                                                                                   <input type="submit" name="store" value="Store" class="btn btn-primary" style="background:blue; color:white;"> 


                                                                        <!-- <div class="text-center">
                                                                            <a href="#" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                                                        </div> -->
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
                </div>
            </div>
        </div>
        <!-- Page content -->


    </div>

    <?php
     include('footer.php');
    ?> 

















