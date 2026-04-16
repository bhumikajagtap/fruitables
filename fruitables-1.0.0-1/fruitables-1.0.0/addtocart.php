<?php 
session_start();
include('config.php');

if(isset($_SESSION['email'])){

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $product_id = $_POST['id'];
        $product_pname = $_POST['pname'];
        $product_desction = $_POST['desction'];
        $product_price = $_POST['price'];
        $product_qty = $_POST['quantity'];
        $product_img = $_POST['img'];

        $checkStock = "SELECT qty FROM stock WHERE pid = '$product_id'"; //check stock
        $res = mysqli_query($con, $checkStock);

if(!$res){
    die("Stock Query Error: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($res);

if(!$row){
    echo "<script>
            alert('Product not found in stock');
            window.location.href='shop.php';
          </script>";
    exit();
}

$available_qty = $row['qty'];

if($product_qty > $available_qty){

    echo "<script>
            alert('Only $available_qty items available');
            window.location.href='index.php';
          </script>";
    exit();
}   

        $product = [
            'id' => $product_id,
            'pname' => $product_pname,
            'desction' => $product_desction,
            'price' => $product_price,
            'quantity' => $product_qty,
            'img' => $product_img
        ];

        $product_exists = false;

        foreach($_SESSION['cart'] as $item){
            if($item['id'] == $product_id){
                $product_exists = true;
                break;
            }
        }

        if(!$product_exists){

            $_SESSION['cart'][] = $product;

            if(isset($_SESSION['wishlist'])){
                $key = array_search($product_id, $_SESSION['wishlist']);

                if($key !== false){
                    unset($_SESSION['wishlist'][$key]);
                    $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
                }
            }

            echo "<script>
                    alert('Product Added to Cart');
                    window.location.href='cart.php';
                  </script>";

        }else{

            echo "<script>
                    alert('Already Exists in Cart');
                    window.location.href='cart.php';
                  </script>";
        }

    }

}else{

    echo "<script>
            alert('Please Login First');
            window.location.href='login.php';
          </script>";
}
?>