<?php
include('header.php');

/* Check DB connection */
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

/* Validate ID */
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid Register ID");
}
$id = intval($_GET['id']);

/* Fetch existing record */
$sql1 = "SELECT * FROM registration WHERE id = $id";
$res  = mysqli_query($con, $sql1);

if (mysqli_num_rows($res) == 0) {
    die("Record not found");
}
$row = mysqli_fetch_assoc($res);

/* Update logic */
if (isset($_POST['store'])) {

    $rname   = mysqli_real_escape_string($con, $_POST['rname']);
    $email   = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);

    /* Password update only if entered */
    if (!empty($_POST['pass'])) {
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
        $pass_sql = ", pass='$pass'";
    } else {
        $pass_sql = "";
    }

    $sql = "UPDATE registration SET
                rname='$rname',
                email='$email',
                contact='$contact'
                $pass_sql
            WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Record Updated Successfully');
                window.location='register_table.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

                    <!-- content starts -->
                    <div class="main-content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid px-lg-4">
                            <div class="row">
                                <div class="col-md-12 mt-lg-4 mt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 text-gray-800">Registration</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Begin Page Content -->
                        <div class="inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="white_box mb_30">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-6">
                                                            <!-- sign_in  -->
                                                            <div class="modal-content cs_modal">
                                                                <div class="modal-header theme_bg_1 justify-content-center">
                                                                    <h5 class="modal-title text_white">Register</h5>
                                                                </div>

                                                                 <div class="modal-body">
                                                                  <form method="post" enctype="multipart/form-data">


                                                                           <div class="form-group">
                                                                                 <label>RName</label>
                                                                                 <input type="text" name="rname" class="form-control"
                                                                                        value="<?php echo $row['rname']; ?>" required>
                                                                           </div>

                                                                           <div class="form-group">
                                                                                <label>Email</label>
                                                                                 <input type="email" name="email" class="form-control"
                                                                                        value="<?php echo $row['email']; ?>" required>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                 <label>Contact</label>
                                                                                 <input type="text" name="contact" class="form-control"
                                                                                        value="<?php echo $row['contact']; ?>" required>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                 <label>New Password</label>
                                                                                 <input type="password" name="pass" class="form-control"
                                                                                        placeholder="Leave blank to keep old password">
                                                                            </div>

                                                                            <input type="submit" name="store" value="Update"
                                                                                   class="btn btn-primary">



                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content Ends -->
                     <?php
                    include('footer.php');
                     ?>