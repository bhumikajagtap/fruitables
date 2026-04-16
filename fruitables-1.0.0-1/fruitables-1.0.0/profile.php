<?php
session_start();

include ('header.php');
include('config.php');

// Check login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch logged-in user data
$query = "SELECT * FROM registration WHERE email='$email'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
?>
        <!-- Single Page Header start-->
         <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Profile</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">My Profile</h2>

    <table class="table table-bordered table-striped">
        <tr>
            <th>User ID</th>
            <td><?php echo $user['id']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $user['rname']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <tr>
            <th>Contact</th>
            <td><?php echo $user['contact']; ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $user['pass']; ?></td>
        </tr>
    </table>

     <div class="text-center"> 
        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
</body>
</html>

<?php
include('footer.php');
?>