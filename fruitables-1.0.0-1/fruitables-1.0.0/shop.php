<?php 
include('header.php');

if(!$con){
    die("Database connection failed: " . mysqli_connect_error());
    
}
$id=$_GET['id'];
?>

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">

            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Best Jewels shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <!-- <div class="input-group w-100 mx-auto d-flex"> 
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>-->
                            </div>
                            <div class="col-6"></div>
                            <!-- <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="volvo">Nothing</option>
                                        <option value="saab">Popularity</option>
                                        <option value="opel">Organic</option>
                                        <option value="audi">Fantastic</option>
                                    </select>
                                </div>
                            </div>-->
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                              <?php
                                             $sql="select * from category";
                                              $res=mysqli_query($con,$sql);
                                             while($row=mysqli_fetch_row($res)){
                                               ?>

                                            <ul class="list-unstyled fruite-categorie">

                                               <li>
                                                       <div class="d-flex justify-content-between fruite-name">
                                                        <a href= "shop.php?id=<?php echo $row[0]; ?>"><i class="fas fa-apple-alt me-2"></i><?php echo $row[1];?></a>
                                                        <span>(5)</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php
                                              }
                                            ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                           <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                <?php

                                $sql1 = "SELECT product.*, stock.*, category.*
                                FROM product
                                INNER JOIN stock ON product.pid = stock.pid
                                INNER JOIN category ON product.cid = category.id
                                WHERE product.cid = '$id'";
                                $res = mysqli_query($con, $sql1);

                                while ($row = mysqli_fetch_row($res)) {
                                ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4 d-flex align-items-stretch">
                                        <div class="rounded position-relative fruite-item w-100">
                                            <div class="fruite-img" style="width:100%; height:300px; overflow:hidden;">
                                                <img src="../../dashboard/file/<?php echo $row[5]; ?>" 
                                                    style="width:100%; height:100%; object-fit:cover;" 
                                                    alt="">
                                            </div>
                                            <div class="p-4 border border-second]ary border-top-0 rounded-bottom">
                                                <h4>
                                                    <a href="shop-detail.php?id=<?php echo $row[0]; ?>">
                                                        <?php echo $row[2]; ?>
                                                    </a>
                                                </h4>
                                                <p><?php echo $row[3]; ?></p>
                                                <div class="d-flex justify-content-between flex-lg-wrap mb-2">
                                                    <p class="text-dark fs-5 fw-bold mb-0">RS.<?php echo $row[4]; ?></p>
                                                </div>

                                                <form method="post" action="addtocart.php">
                                                    <input type="hidden" name="id" value="<?php echo $row[0]; ?>"> 
                                                    <input type="hidden" name="pname" value="<?php echo $row[2]; ?>">
                                                    <input type="hidden" name="desction" value="<?php echo $row[3]; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $row[4]; ?>">
                                                    <input type="hidden" name="img" value="<?php echo $row[5]; ?>"> 
                                                    
                                                    <div class="mb-2">
                                                    <?php if($row[8] > 0){ ?>   <!-- stock available -->
                                                    <input type="number" name="quantity" value="1" min="1" 
                                                      max="<?php echo $row[8]; ?>" 
                                                     style="width:80px;" class="form-control">

                                                    <?php } else { ?>   <!-- out of stock -->
                                                   <p style="color:red;">Not available</p>
                                                    <?php } ?>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <a href="heart.php?id=<?php echo $row[0]; ?>" class="btn btn-light">
                                                            <i class="bi bi-heart text-danger fs-5"></i>
                                                        </a>

                                                        <button class="btn btn-primary"
                                                        <?php if($row[8] == 0){?>
                                                        onclick="alert('This product is out of stock'); return false;"
                                                        <?php }?>>
                                                         Add to cart
                                                        </button>
                                                    </div>
                                                    <?php
                                                    if($row[8] == 0){
                                                    ?>
                                                    <button type="button" class="btn btn-danger mt-2" disabled>
                                                    Out of stock
                                                    </button>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php   
                                }
                                ?>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


                     <?php
                    include('footer.php');
                     ?>
                    