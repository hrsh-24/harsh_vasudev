<?php include "./includes/header.php"; ?>
 <!-- Vendor JS Files -->
 <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<?php
if (isset($_GET['p_id'])) {
    $the_p_id = $_GET['p_id'];
}

    global $connection;
    $query = " SELECT * from students WHERE student_email='{$the_p_id}'";
    $display = mysqli_query($connection, $query);
    if (!$display) {
        echo "Cannot display email" . mysqli_error($connection);
    }
    while ($row = mysqli_fetch_array($display)) {
    $name =$row['student_name'];
    $email =$row['student_email'];
    $contact =$row['student_contact'];
    $address =$row['student_address'];
    $password =$row['student_password'];
   
}



if (isset($_POST['edit_student'])) {

    global $connection;
    $name=$_POST['username'];
    $contact=$_POST['student_mobile'];
    $address=$_POST['student_address'];
    $password=$_POST['student_password'];
    $options= array("cost"=>5);
    $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
    $query = " UPDATE students SET 	student_name ='{$name}' ,student_password ='$hashPassword', student_contact ='{$contact}', student_address ='{$address}' WHERE student_email = '{$the_p_id}' ";
    $update = mysqli_query($connection, $query);
    if (!$update) {
        echo "not inserted" . mysqli_error($connection);
    } else {
        header("Location: student.php");
    }
}
?>

<?php include "./includes/student_navigation.php";?>
<!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container" data-aos="fade-up">
                <div class="container">
                    <section id="login">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6 col-xs-offset-3">
                                    <div class="form-wrap">
                                        <h1>Edit Student Details</h1>
                                        <form action="" method="post" id="login-form" autocomplete="off">
                                            <div class="form-group">
                                                <label for="stu_id" class="sr-only"><b></b></label>
                                                <input type="text" name="username" id="stu_id" value="<?php echo $name?>" class="form-control" placeholder="Enter Desired Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="sr-only"><b></b></label>
                                                <input type="email" name="email" value="<?php echo $email?>" id="email" class="form-control" placeholder="somebody@example.com">
                                            </div>
                                            <div class="form-group">
                                                <label for="student_mobile" class="sr-only"><b></b></label>
                                                <input type="integer" name="student_mobile" value="<?php echo $contact?>" id="student_mobile" class="form-control" placeholder="Enter Mobile Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="student_address" class="sr-only"><b></b></label>
                                                <input type="student_address" value="<?php echo $address?>"name="student_address" id="student_address" class="form-control" placeholder="Enter address">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="sr-only"><b></b></label>
                                                <input type="text" name="student_password" id="key" value="<?php echo $password?>" class="form-control" placeholder="Password">
                                            </div>
                                            <br>
                                            <input type="submit" name="edit_student" id="btn-login" class="btn btn-custom btn-lg btn-primary" value="Edit">
                                        </form>
                                    </div>
                                </div> <!-- /.col-xs-12 -->
                            </div> <!-- /.row -->
                        </div>
                    </section><!-- End Hero -->

                   