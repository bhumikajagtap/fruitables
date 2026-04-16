<?php
session_start();
include('config.php');

if (isset($_POST['btn'])) {

    $email = $_POST['email'];
    $password=$_POST['pass'];

    $sql = "SELECT * FROM registration WHERE email='$email' AND pass='$password'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['login_success'] = true;

        header("Location: index.php");
        exit();
    } else {
                echo "<script>
                alert('Login failed! Please register first.');
                window.location.href='registration.php';
              </script>";
        exit();

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
                                                                        background-image: url("../fruitables-1.0.0/img/2344707-1920x1080-desktop-full-hd-diamond-jewelry-wallpaper-photo (1).jpg");
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