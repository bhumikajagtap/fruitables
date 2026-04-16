<?php
session_start();  

include('config.php');  

if(isset($_GET['id'])) {

    $id = intval($_GET['id']);

    if(!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }

    if(!in_array($id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $id;
    }

    header("Location: wishlist.php");
    exit();
}
?>