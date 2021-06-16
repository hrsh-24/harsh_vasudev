<?php include "./includes/header.php"; ?>
<?php
if (isset($_POST['Register'])) {
    if(isset($_GET['token']))
    {
        $token = $_GET['token'];
        $newpassword =mysqli_real_escape_string($connection, $_POST['password']);
        
        if(preg_match('/^[a-zA-Z0-9]{3,}$/', $newpassword)){
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
        $pass=$newpassword;
        if($newpassword === $cpassword)
        {            
            $options= array("cost"=>5);
            $hashPassword = password_hash($newpassword,PASSWORD_BCRYPT,$options);
          $update = " UPDATE students set student_password = '".$hashPassword."' where token= '$token' ";
          $result = mysqli_query($connection, $update);
          if($result)
          {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Your password is updated')
            window.location.href='login_student.php';
            </SCRIPT>");  
          }else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Your password is not updated')
            window.location.href='reset_password.php';
            </SCRIPT>");
          }
        } 
        else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Password does not match')
            window.location.href='reset_password.php';
            </SCRIPT>");
        }

    }}
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('No token found')
            window.location.href='login_student.php';
            </SCRIPT>");
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

            <!-- <div class="container">
		<div class="row"> -->
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            <h3><i class="fa fa-user fa-4x"></i></h3>
                            <h3 style="text-transform: uppercase; font-size:40px; color:#fff;" class="text-center">Reset Password</h3>
                            <div class="panel-body">

                                <form role="form" action="" method="post" id="login-form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="password" class="sr-only"></label>
                                        <input type="password" name="password" id="key" class="form-control" placeholder="New Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpassword" class="sr-only"></label>
                                        <input type="password" name="cpassword" id="key" class="form-control" placeholder="Confirm New Password" required>
                                    </div>
                                    <br>
                                    <input type="submit" name="Register" id="btn-login" class="btn btn-custom btn-lg btn-primary" value="Reset password">
                                </form>


                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
            <!-- </div>

    </div> -->
    </section><!-- End Hero -->
    <?php include "./includes/footer.php"; ?>