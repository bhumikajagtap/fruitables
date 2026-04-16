<?php 
include('header.php');

if(!$con){
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">About Us</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active text-white">About Us</li>
    </ol>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-5">

                <!-- Image Section -->
                <div class="col-lg-6">
                    <!-- <img src="../admindashboard/dashboard/file/he4.jpg" class="img-fluid rounded w-100" alt="STAC Jewellery"> -->
                      <img src="../../dashboard/file/nri-gold-jewellery-213.jpg" class="img-fluid rounded w-100" alt="STAC Jewellery">

                </div>

                <!-- Our Story -->
                <div class="col-lg-6 d-flex align-items-center">
                    <div>
                        <h2 class="text-primary mb-4">Our Story</h2>
                        <p>
                            At <strong>Bhumika</strong>, we believe fine jewellery should move with you — from work to play,
                            dressed up or dressed down, and everything in between. Minimal everyday fine jewellery
                            is at the heart of everything we create.
                        </p>
                        <p>
                            Designed for those who appreciate the beauty of simplicity, our pieces are crafted
                            to feel effortless yet refined. Jewellery at Swarnika isn’t meant to stay locked away —
                            it’s made to be worn, loved, and lived in.
                        </p>
                        <p>
                            Crafted in 14kt and 18kt gold, each design balances durability with timeless elegance.
                            We offer both natural and lab-grown diamonds, ensuring the same brilliance, sparkle,
                            and strength — giving you the freedom to choose what matters most to you.
                        </p>
                    </div>
                </div>

                <!-- Why STAC -->
                <div class="row g-5 align-items-center mt-5">

                <!-- Information Left -->
                <div class="col-lg-6">
                 <h2 class="text-primary mb-4">Why Bhumika</h2>
                  <p>
                 Our stores have been instrumental in spreading the shine of BlueStone and bringing us closer to you.
                  With world class experience, friendly staff and the dazzling beauty of exquisite jewellery, every store is a sparkling gem.
                  </p>
                   <p>
                    With an award-winning design team that pays great attention to detail, each of our products are a symbol of perfection. With cutting edge innovation and latest technology,
                     we make sure the brilliance is well reflected in all our jewellery from the process till it reaches your door.
                    </p>
                   <p>
                    We also offer a 30 Day Money Back guarantee, Certified Jewellery from independent establishments like GSI, IGI & SGL offering total grading transparency, 
                    as well as Lifetime Exchange policy to align with our ethos of customer centricity. You can even customize your jewellery with us!
                   </p>
                   <!-- <p> 
                    brilliance, sparkle, and strength. Every design is thoughtfully created to be light, versatile, 
                    and meaningful- jewellery that doesn’t sit in your bank locker, but jewellery you’ll want to wear Every. Single. Day.
                   </p>-->
                 </div>

                 <!-- Image Right -->
                    <div class="col-lg-6">
                    <img src="../../dashboard/file/Collection-Banner.jpg"
                     class="img-fluid rounded w-100"
                      alt="STAC Jewellery Banner">
                  </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- About End -->

<?php include('footer.php'); ?>