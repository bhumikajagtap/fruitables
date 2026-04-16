<?php
include('header.php');

if (isset($_POST['store'])) {

    $pid = $_POST['pid'];   // ✅ correct
    $qty = $_POST['qty'];   // ✅ correct

    $sql = "INSERT INTO inword (pid,qty)
            VALUES ('$pid', '$qty')";

    if (mysqli_query($con, $sql)) {

        $check = mysqli_query($con,"SELECT * FROM stock WHERE pid = '$pid'");

        if(mysqli_num_rows($check) > 0){

            $query="UPDATE stock SET qty = qty + $qty WHERE pid = '$pid'";
            mysqli_query($con,$query);

        }else{

            $query1= "INSERT INTO stock (pid,qty) VALUES ('$pid','$qty')";
            mysqli_query($con,$query1);

        }

        echo "<script>
        alert('Inword Added successfully');
        window.location='inword_table.php';
        </script>";

    }else{
        echo "Error!";
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
                                        <h1 class="h3 mb-0 text-gray-800">Inword</h1>
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
                                                                    <h5 class="modal-title text_white">Inword</h5>
                                                                </div>

                                                                 <div class="modal-body">
                                                                  <form method="post" enctype="multipart/form-data">

                                                                     <div class="form-group">
                                                                         <label>PID:</label>

                                                                        <select name="pid" class="form-control" required>
                                                                         <option value="">select product Id</option>
                                                                                     <?php 
                                                                                       $con = mysqli_connect('localhost', 'root', '', 'jewellarydb');
                                                                                         $sql="select * from product";
                                                                                             $res=mysqli_query($con,$sql);
                                                                                              while($rw=mysqli_fetch_row($res))
                                                                                                      {
                                                                                                       ?>
                                                                             <option value="<?php echo $rw[0]?>"><?php echo $rw[2];?></option>
                                                                                     <?php 
                                                                                      }
                                                                                       ?>
                                                                               </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                         <label>Quantity</label>
                                                                          <input type="number" class="form-control" name="qty" placeholder="Enter qty" required>
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