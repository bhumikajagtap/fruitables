<?php 
$con = mysqli_connect("localhost","root","","jewellarydb");

if(isset($_POST['btn'])) {
    $rname   = $_POST['rname'];
    $email   = $_POST['email'];
    $contact = $_POST['contact'];
    $password= $_POST['pass'];

    $check = "SELECT COUNT(id) FROM registration WHERE email='$email'";
    $res   = mysqli_query($con,$check);
    $count = mysqli_fetch_row($res);

    if($count[0] == 1) {
        echo "<script>
                alert('Email already exists! Please login.');
                window.location.href='login.php';
              </script>";
    } else {
        $sql = "INSERT INTO registration (rname,email,contact,pass)
                VALUES ('$rname','$email','$contact','$password')";
        if(mysqli_query($con,$sql)) {
            echo "<script>
                    alert('Registration successful!');
                    window.location.href='login.php';
                  </script>";
        } else {
            echo mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Jewellery</title>
    <style>
        body{
            margin:0;
            height:100vh;
            /* background:url("images/B1.jpg") center/cover no-repeat; */
            background-image: url("../fruitables-1.0.0/img/Collection-Banner.jpg");

            display:flex;
            align-items:center;
            justify-content:center;
            font-family: Arial, sans-serif;
        }

        .register-box{
            width:333px;
            background:yellow;
            padding:30px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.3);
        }

        .register-box h2{
            text-align:center;
            margin-bottom:20px;
            color:black;
        }

        .input-group{
            margin-bottom:15px;
        }

        .input-group label{
            display:block;
            margin-bottom:5px;
            font-weight:bold;
            color:black;
        }

        .input-group input{
            width:91%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:6px;
            font-size:14px;
        }

        .btn{
            width:100%;
            padding:10px;
            background:red;
            border:none;
            color:black;
            font-size:16px;
            border-radius:47px;
            cursor:pointer;
        }

        .btn:hover{
            background:red;
        }

        .login-link{
            text-align:center;
            margin-top:15px;
        }

        .login-link a{
            color:red;
            text-decoration:none;
            font-weight:bold;
        }

        .login-link a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>Registration</h2>

    <form method="POST">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="rname" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Contact</label>
            <input type="text" name="contact" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="pass" required>
        </div>

        <input type="submit" name="btn" value="Register" class="btn">
    </form>

    <div class="login-link">
        Already have an account? <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>