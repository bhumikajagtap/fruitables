<?php
$con = mysqli_connect('localhost','root','','jewellarydb');
session_start();

$name="";
if (!isset($_SESSION['email'])) {
     header("Location: login_page.php");
 }
 $email=$_SESSION['email'];
 $sql1="select * from admin where email='$email' ";
 $res=mysqli_query($con,$sql1);
 $row=mysqli_fetch_row($res);
 $name=$row[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://www.jsdelivr.com/package/npm/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/@icon/themify-icons/themify-icons.css"> -->
    <!--  <link rel="stylesheet" href="@icon/themify-icons/themify-icons.css"> -->
    <link rel="stylesheet" href="@icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/@icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="@icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

<body class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
    <div class="wrapper">
        <div class="overlay"></div>
        <!-- sidebar -->
<nav class="sidebar dark_sidebar">
            <div class="logo d-flex justify-content-between">
                <a class="large_logo" href="index.html">Vertex Technosys</a>
                <!-- <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div> -->
            </div>
            <ul id="sidebar_menu" class="metismenu">
                <li class="">
                    <a href="index.php" aria-expanded="false" class="active">
                        <div class="nav_icon_small">
                            <i class="fas fa-home menu-icon"></i>
                        </div>
                        <div class="nav_title">
                            <span>Dashboard </span>
                        </div>
                    </a>
                </li>
               
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_icon_small">
                            <i class="fas fa-user menu-icon"></i>
                        </div>
                        <div class="nav_title">
                            <span>Pages</span>
                        </div>
                    </a>
                    <ul class="mm-collapse">
                        <li><a href="category.php">Category</a></li>
                        <li><a href="product.php">Product</a></li>
                        <!-- <li><a href="contact.php">Contact</a></li> -->
                        <!-- <li><a href="registration.php">Register</a></li> -->
                        <li><a href="testimonial.php">testimonial</a></li>
                        <li><a href="inword.php">Inword</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="Service_insert.php">Service</a></li>

                    </ul>
                </li>
                
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="nav_icon_small">
                            <i class="far fa-border-none menu-icon"></i>
                        </div>
                        <div class="nav_title">
                            <span>Table</span>
                        </div>
                    </a>
                    <ul class="mm-collapse">
                        <li><a href="cat_table.php">Category Table</a></li>
                        <li><a href="product_table.php" class="active">Product Tables</a></li>
                        <!-- <li><a href="reg_table.php">Register Table</a></li> -->
                         <li><a href="contact_table.php">Contact Table</a></li>
                         <li><a href="testimonial_table.php">Testimonial Table</a></li>
                         <li><a href="register_table.php">Register Table</a></li>
                         <li><a href="inword_table.php">Inword Table</a></li>
                         <li><a href="service_table.php">Service Table</a></li>
                         <li><a href="stock_table.php">Stock Table</a></li>


                    </ul>
                </li>
                
            </ul>
        </nav>
        <!-- sidebar wrapper -->

        <!-- Page-content -->
        <div id="page-content-wrapper">
            <div id="content">
                <div class="container-fluid p-0 px-lg-0 px-md-0">
                    <div class="main-content pt-0">
                        <nav class="navbar navbar-expand navbar-light my-navbar">
                            <div type="button" id="bar" class="nav-icon1 humburger animated fadeInLeft sidebar_icon" data-toggle="offcanvas">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <!-- Top bar Search -->
                            <form class="d-none d-sm-inline-block form-inline navbar-search px-3">
                                <div class="input-group">
                                    <!-- <input type="text" name="search" class="form-control bg-light" placeholder="Search for.."> -->
                                    <div class="input-group-append">
                                        <!-- <button class="btn btn-primary" type="button"><i class="far fa-search fa-sm"></i></button> -->
                                    </div>
                                        
                                </div>
                            </form>

                            <!-- Top Bar nav -->
                            <div class="header_right d-flex justify-content-end align-items-center">
                                <!-- <div class="header_notification_warp d-flex align-items-center"> -->
                                    <li>
                                        <!-- <a class="CHATBOX_open nav-link-notify" href="#"> <i class="far fa-envelope"></i> </a> -->
                                    </li>
                                    <li>
                                        <!-- <a class="bell_notification_clicker nav-link-notify" href="#"> <i class="far fa-bell fa-fw"></i> -->
                                            <!-- <span>2</span> -->
                                        </a>
                                    </li>

                                </div>
                                <!-- <div class="profile_info d-flex align-items-center"> 
                                    <div class="profile_thumb mr_20">
                                        <img src="images/1.png" alt="#">
                                    </div>
                                    <div class="author_name">
                                        <h4 class="f_s_15 f_w_500 mb-0">Jiue Anderson</h4>
                                        <p class="f_s_12 f_w_400">Manager</p>
                                    </div>
                                    <div class="profile_info_iner">
                                        <div class="profile_author_name">
                                            <p>Manager</p>
                                            <h5>Jiue Anderson</h5>
                                        </div>
                                        
                                        <div class="profile_info_details">
                                            <a href="#">My Profile </a>
                                            <a href="#">Settings</a>
                                            <a href="#">Log Out </a>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <!-- Top Bar nav -->
                            <!-- Top bar Search -->
                                   <!-- <div class="input-group-append"> 
                                         <a href="logout.php">
                                    <button type="button" style="background-color:blue; padding:10px; color:white;"> Logout </button>
                                   </a>
                                   </div>-->
                            <?php

                            if(isset($_SESSION['email']))
                            {
                            ?>
                            <a href="logout.php">
                                <button class="btn btn-primary">Logout</button></a> &nbsp  <?php echo $name;?>
                            <?php
                            }
                            else
                            {
                            ?>
                            <a href="login_page.php">
                                <button class="btn btn-primary">Login</button></a>   
                            <?php
                            }
                            ?>
                        </nav>
                    </div>
                    