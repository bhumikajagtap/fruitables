<?php
// session_start();

include('header.php');
include('config.php');

?>
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <a href="clear_cart.php" class="btn btn-warning">
                    Clear cart
                 </a>

                <div class="table-responsive">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Update</th>

                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $total=0;
                              $subtotal=0;
                              if (!empty($_SESSION['cart'])) 
                                {
                              foreach ($_SESSION['cart'] as $item) 
                                {
                             $subtotal = $item['price'] * $item['quantity'];
                             $total+=$subtotal;
                            ?>
        
            
                                
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="../../dashboard/file/<?php echo $item['img'];?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $item['pname'];?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $item['price'];?></p>
                                </td>

                                <td>
                                    <p class="mb-0 mt-4"><?php echo $item['quantity'];?></p>
                                    
                                </td>

                                <td>
                                    <p class="mb-0 mt-4"><?php echo $subtotal?></p>
                                </td>
                                <td>
                                <div class="d-flex align-items-center mt-3">
                                    <form method="post" action="update_qty.php" class="d-flex align-items-center">

                                    <input type="hidden" name="id" value="<?php echo $item['id'];?>">

                                    <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline-secondary">
                                        -
                                </button>

                                <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline-secondary">
                                        +
                                </button>
                              </form>
                        </div>
                            </td>

                            <td>
                             <a href="delete.php?id=<?php echo $item['id'];?>" style="font-size:20px;"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                                }
                             }
                                ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div>-->
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0"><?php echo $total ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $5.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4"><?php echo $total+5.00 ?></p>
                            </div>
                            <!-- <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button> -->
                        <a href ="checkout.php?id=<?php echo $item['id']; ?>"
                        class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">
                        Proceed checkout
                       </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->
<?php
include('footer.php');
?>