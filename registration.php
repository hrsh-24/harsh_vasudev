<?php include "./includes/header.php"; ?>
<?php
if (isset($_POST['Register'])) {
    if (
        empty($_POST['username']) ||
        empty($_POST['password']) ||
        empty($_POST['email'])
    ) {

        echo "<script>alert('Please fill all required fields!')</script>";
        
    } else {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = stripslashes($username);
        $username = mysqli_real_escape_string($connection, $username);

        if(preg_match('/^[a-zA-Z0-9]{4,}$/', $username)){
        $email = stripslashes($email);
        $email = mysqli_real_escape_string($connection, $email);
        $password = stripslashes($password);
        $password = mysqli_real_escape_string($connection, $password);
        $options= array("cost"=>5);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $role     = $_POST['role'];
        $contact  = $_POST['contact'];
        $address  = $_POST['address'];
        $query = " INSERT INTO students (student_name,student_email,student_password,student_role,student_contact,student_address) Values ('$username','$email','".$hashPassword."','student',$contact,'$address')";
        $result = mysqli_query($connection, $query);
       if(!$result){
        echo "<script>alert('Student already registered . Please Login')</script>";
        header("Location: login_student.php");
       }
       else{
        echo "<script>alert('Student Registered Successfully')</script>";
       }
    }
    else{
        echo "<script>alert('Username should not contain spaces,cannot be started by alphanumerics')</script>";
    }
    }
} 
?>

<body>
    <!-- ======= Header ======= -->
    <?php include "./includes/navigation.php"; ?>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="fade-up">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-user fa-4x"></i></h3>
                            <h3 style="text-transform: uppercase; font-size:40px; color:#fff;" class="text-center">Register</h3>
                            <div class="panel-body">
                                <form role="form" action="" method="post" id="login-form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="stu_id" class="sr-only"></label>
                                        <input type="text" required name="username" id="stu_id" class="form-control" placeholder="Enter Desired Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="sr-only"></label>
                                        <input type="email"required name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="sr-only"></label>
                                        <input type="password" required name="password" id="key" class="form-control" placeholder="Password">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                    <input type="text"  required name="role" id="address" class="form-control" value="student">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact" class="sr-only"></label>
                                        <input type="tel" required name="contact" id="contact" class="form-control" placeholder="Enter your contact No.">
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="sr-only"></label>
                                        <input type="text"  required name="address" id="address" class="form-control" placeholder="Enter your address">
                                    </div>
                                    <br>
                                    <input type="submit" name="Register" id="btn-login" class="btn btn-custom btn-lg btn-primary" value="Register"> &nbsp;&nbsp;&nbsp;<span> <button class="btn btn-danger"><a style="color:white " href="registration_as_teacher.php">Register as Teacher</a></button></span>
                                </form>
                            </div><!-- Body-->
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- End Hero -->


    <?php include "./includes/footer.php"; ?>