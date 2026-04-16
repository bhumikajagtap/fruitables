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
                                        <h1 class="h3 mb-0 text-gray-800">Testimonial Table</h1>

                                    </div>
                                       <div style="text-align:right;">
                                            <a href="testimonial.php">
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
                                                                        <!-- <th>Cid</th> -->
                                                                        <th>tname</th>
                                                                        <th>Description</th>
                                                                        <!-- <th>price</th> -->
                                                                        <th>img</th>
                                                                        <th colspan='2'><center>Operation</center></th>

                                                                         <!-- <th>Update</th> -->
                                                                         <!-- <th>Delete</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $sql="select * from testimonial";
                                                                    $res=mysqli_query($con,$sql);
                                                                    while($result=mysqli_fetch_row($res))
                                                                    {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $result[0];?></td>
                                                                         <td><?php echo $result[1];?></td>
                                                                         <td><?php echo $result[2];?></td>
                                                                         <!-- <td><?php echo $result[3];?></td> -->
                                                                         <!-- <td><?php echo $result[4];?></td> -->
                                                                         
                                                                         <td><?php echo "<img src='file/".$result[3]."' height='50px' width='50px'>"; ?></td>
                                                                         <td><a href="testimonial_update.php?id=<?php echo $result[0]; ?>">Update</a></td>
                                                                         <td><a href="testimonial_delete.php?id=<?php echo $result[0]; ?>">Delete</a></td>

                                                                           <!-- <td></td> -->
                                                                            <!-- <td> <?php echo $result[0];?></td> -->
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