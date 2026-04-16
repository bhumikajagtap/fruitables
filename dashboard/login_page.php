<?php 

$con=mysqli_connect("localhost","root","","jewellarydb");
session_start();

if(isset($_POST['btn']))
{
    $email=$_POST['email'];
    $password=$_POST['pass'];

    $sql="select count(id) from admin where email='$email' and pass='$password'";

    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_row($res);
   

    if($row[0]== 1)
    {
        $_SESSION['email']=$email;
        // echo $email;
        // exit();
         echo "<script>alert('Login Succeesfully...');
          window.location.href='index.php';</script>";
        //  header("Location: index.php");

    }
    else
    {
        echo "<script>alert('Login Failed...');
          window.location.href='login_page.php';</script>";  
        //  header("Location: registration.php");

        mysqli_error($con); 
    }
}
?>


                                                            <!DOCTYPE html>
                                                            <html>
                                                                <head>
                                                                 <title>Login Page</title>
                                                                 <style>
                                                                     body {
                                                                       margin: 0;
                                                                       padding: 0;
                                                                       height: 100vh;
                                                                        background-image: url("../dashboard/file/5818574-2560x1600-desktop-hd-laptop-wallpaper.jpg");
                                                                       background-size: cover;
                                                                       background-position: center;
                                                                       background-repeat: no-repeat;
                                                                       font-family: Arial, sans-serif;
                                                                     }

                                                                         .form-group{
                                                                               width: 350px;
                                                                               background: rgba(255, 255, 255, 0.9);
                                                                               padding: 25px;
                                                                               margin: 100px auto;
                                                                               border-radius: 10px;
                                                                               box-shadow: 0px 0px 10px black;
                                                                               text-align: center;
                                                                          }

                                                                         input {
                                                                            width: 90%;
                                                                            padding: 8px;
                                                                            margin: 8px 0;
                                                                         }

                                                                         button {
                                                                           background-color: blue;
                                                                           color: white;
                                                                           padding: 10px;
                                                                           border: none;
                                                                           width: 100%;
                                                                           cursor: pointer;
                                                                        }

                                                                         button:hover {
                                                                               background-color: darkblue;
                                                                         }
                                                               </style>
                                                             </head>

                                                         <body>
                                                             <div class="form-group">
                                                                  <h2>Login Form</h2>

                                                                 <form method="POST">

                                                                <label>Email</label><br>
                                                                <input type="email" name="email" placeholder="Enter your email" required>

                                                                <label>Password</label><br>
                                                                <input type="password" name="pass" placeholder="Enter your password" required>

                                                                <br><br>
                                                                <button type="submit" value="Login" name="btn" class="btn btn-primary">Login</button>

                                                                <br><br>
                                                                <a href="registration.php">New User? Register</a>

                                                                 </form>
                                                             </div>
                                                          </body>
                                                      </html>