<?php 
include('header.php');

?>

 <!-- content starts -->
                    <div class="main-content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid px-lg-4">
                            <div class="row">
                                <div class="col-md-12 mt-lg-4 mt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 text-gray-800">Stock Table</h1>

                                    </div>
                                       <div style="text-align:right;">
                                            <a href="inword.php">
                                                  <button type="button" style="background-color:skyblue; padding:10px; color:black;"> Send </button>
                                            </a>
                                   </div>

                            </div>
                        </div>
                        <!-- Begin Page Content -->
                    </div>
 <!-- content Ends -->
                    <div class="main-content pt-0">
                        <div class="inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="white_card card_height_100 mb_30">
                                                    <div class="white_card_body pt-3">
                                                        <div class="QA_section">
                                                            <table id="example" class="display" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>id</th>
                                                                        <th>Pid</th>
                                                                        <th>Qty</th>
                                                                        <th colspan='1'>Operation</th>

                                                                        <!-- <th>Update</th> -->
                                                                        <!-- <th>Delete</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                            $sql = "SELECT stock.*, product.pname 
                                                            FROM stock 
                                                            INNER JOIN product ON stock.pid = product.pid";

                                                            $res = mysqli_query($con,$sql);
                                                            while($result = mysqli_fetch_assoc($res))
                                                              {
                                                              ?>
                                                             <tr>
                                                                <td><?php echo $result['id']; ?></td>
                                                                <td><?php echo $result['pname']; ?></td> <!-- pname show -->
                                                                <td><?php echo $result['qty']; ?></td>

                                                                <td>
                                                                    <a href="stock_delete.php?id=<?php echo $result['id']; ?>">Delete</a>
                                                                </td>
                                                                </tr>
                                                                <?php
                                                                   }
                                                                  ?> 
                                                                </tbody>                                                                   
                                                            </table>
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
              
<?php
include('footer.php');
?>