<?php  
include('config.php');                                                      
if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $sql= "select * from category
        WHERE id LIKE '%$search%' 
        OR cname LIKE '%$search%'";
}else{
    $sql="select * from category";
}

// $res=mysqli_query($con,$sql);

?>

<html>
    <head></head>
    <body>
    <form method="GET" action="">
    <input type="text" name="search" placeholder="Search here...">
    <button type="submit">Search</button>
</form><br>
</body>
</html>