<?php
session_start();
include('header.php');

// Check login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$session_email = $_SESSION['email'];

// Fetch user details
$userQuery = "SELECT rname, email, contact, pass FROM registration WHERE email='$session_email'";
$userResult = mysqli_query($con, $userQuery);
$user = mysqli_fetch_assoc($userResult);

if (isset($_POST['store'])) {

    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check current password
    if ($user['pass'] != $current_password) {
        echo "<script>alert('Current password is incorrect');</script>";
    }
    // Confirm password match
    elseif ($new_password != $confirm_password) {
        echo "<script>alert('New password and Confirm password do not match');</script>";
    }
    else {
        // Update ONLY password
        $update = "UPDATE registration SET pass='$new_password' WHERE email='$session_email'";
        if (mysqli_query($con, $update)) {
            echo "<script>
                    alert('Password updated successfully');
                    window.location.href='profile.php';
                  </script>";
        } else {
            echo "<script>alert('Password update failed');</script>";
        }
    }
}
?>

        <!-- Single Page Header start-->
         <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Edit_Profile</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Edit_Profile</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <h3 class="text-center mb-4">Change Password</h3>

            <form method="POST">

                <!-- Display only (readonly) -->
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" 
                           value="<?php echo $user['rname']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" 
                           value="<?php echo $user['email']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Contact</label>
                    <input type="text" class="form-control" 
                           value="<?php echo $user['contact']; ?>" required>
                </div>

                <!-- Password change -->
                <div class="mb-3">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control" value="<?php echo $user['pass']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" name="store" class="btn btn-primary">
                        Update Password
                    </button>
                    <a href="profile.php" class="btn btn-secondary">Cancel</a>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>

<?php include('footer.php'); ?>