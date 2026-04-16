<?php
include('header.php');


if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['store'])) {

    $cid = isset($_POST['cid']) ? $_POST['cid'] : '';
    $name = $_POST['pname'];
    $desction = $_POST['desction'];
    $price = $_POST['price'];

    $image_name = $_FILES['img']['name'];
    $image_tmp  = $_FILES['img']['tmp_name'];

    if (!empty($image_name)) {
        move_uploaded_file($image_tmp, "file/" . $image_name);
    } else {
        $image_name = "";
    }

    $sql = "INSERT INTO product (cid, pname, desction, price, img)
            VALUES ('$cid', '$name', '$desction', '$price', '$image_name')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Product Inserted Successfully');</script>";
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
                                        <h1 class="h3 mb-0 text-gray-800">Product</h1>
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
                                                                    <h5 class="modal-title text_white">Product</h5>
                                                                </div>

                                                                 <div class="modal-body">
                                                                  <form method="post" enctype="multipart/form-data">

                                                                     <div class="form-group">
                                                                         <label>CID:</label>

                                                                        <select name="cid" class="form-control" required>
                                                                         <option>select Category Name</option>
                                                                                     <?php 
                                                                                       $con = mysqli_connect('localhost', 'root', '', 'jewellarydb');
                                                                                         $sql="select * from category";
                                                                                             $res=mysqli_query($con,$sql);
                                                                                              while($rw=mysqli_fetch_row($res))
                                                                                                      {
                                                                                                       ?>
                                                                             <option value="<?php echo $rw[0]?>"><?php echo $rw[1];?></option>
                                                                                     <?php 
                                                                                      }
                                                                                       ?>
                                                                               </select><br><br>
                                                                        </div>

                                                                       <div class="form-group">
                                                                         <label>Product Name</label>
                                                                          <input type="text" class="form-control" name="pname" placeholder="Enter Name" required>
                                                                         </div>

                                                                        <div class="form-group">
                                                                         <label>Desction</label>
                                                                          <input type="text" class="form-control" name="desction" placeholder="Enter Descption" required>
                                                                             </div>

                                                                             <div class="form-group">
                                                                                <label>Price</label>
                                                                                 <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
                                                                                    </div>

                                                                                 <div class="form-group">
                                                                                   <label>Image</label>
                                                                                    <input type="file" class="form-control" name="img" placeholder="Enter Image" required>
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