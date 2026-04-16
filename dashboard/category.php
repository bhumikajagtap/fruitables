<?php 
include('header.php');

if(!$con){
    die("Database connection failed: " . mysqli_connect_error());
}

if(isset($_POST['store']))
{
    $cname = $_POST['cname'];

    $image_name = $_FILES['image']['name'];
    $image_tmp  = $_FILES['image']['tmp_name'];

    if(!empty($image_name)){
        $upload_path = "file/" . $image_name;
        move_uploaded_file($image_tmp, $upload_path);
    } else {
        $image_name = NULL;
    }

    $sql = "INSERT INTO category (cname, img) VALUES ('$cname', '$image_name')";

    if(mysqli_query($con, $sql)){
        echo "<script>alert('Record Inserted Successfully');</script>";
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
                                        <h1 class="h3 mb-0 text-gray-800">Category</h1>
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
                                                                    <h5 class="modal-title text_white">Category</h5>
                                                                </div>

                                                                 <div class="modal-body">
                                                                  <form method="post" enctype="multipart/form-data">
                                            
                                                                      <div class="form-group">
                                                                        <label>Name</label>
                                                                         <input type="text" name="cname" class="form-control" placeholder="Enter category name" required>
                                                                          </div>

                                                                            <div class="form-group">
                                                                              <label>Image</label>
                                                                               <input type="file" name="image" class="form-control"placeholder="Choice img" required>
                                                                                </div>

                                                                            <div class="form-group">
                                                                                 <!-- <input type="submit" name="store" value="Store"  
                                                                                     style="background-color:blue;"
                                                                                     class="btn btn-primary">-->
                                                                              <center><button type="submit" value="Store" name="store" class="btn btn-primary">Store</button></center>

                                                                            </div>


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