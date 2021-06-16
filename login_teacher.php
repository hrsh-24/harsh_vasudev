<?php include "./includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<body>
    <!-- ======= Header ======= -->
    <?php include "./includes/navigation.php"; ?>
    <!-- End Header -->
    <?php
    if (isset($_POST['login'])) {
        global $connection;


        $data = $_POST;

        if (
            empty($data['username']) ||
            empty($data['password'])
        ) {

            die('Please fill all required fields!');
        } else {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $username = trim($username);
            $password = trim($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            $query = " SELECT * from teachers where teacher_name = '".$username."'";
            $result = mysqli_query($connection, $query);
           
            if (!$result) {
                echo "cannot logged in " . mysqli_error($connection);
            }
            $numrows =mysqli_num_rows($result);
            if($numrows == 1){
                while ($row = mysqli_fetch_array($result)) {
                    $login_username = $row['teacher_name'];
                    $login_email = $row['teacher_email'];
                    $login_password = $row['teacher_password'];
                    $login_role = $row['teacher_role'];
                }
                
            }
            if (password_verify($password,$login_password)) {
                $_SESSION['username'] = $login_username;
                $_SESSION['email'] = $login_email;
                $_SESSION['studentrole'] = $login_role;

                header("Location: teacher.php");
            } else {

                header("location: index.php");
            }
        }
    }
    ?>

   
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
                            <h3 style="text-transform: uppercase; font-size:40px; color:#fff; " class="text-center">Login as Teacher</h3>
                            <div class="panel-body">
                                <form id="login-form" action="" role="form" autocomplete="off" class="form " method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input name="username" type="text" class="form-control" placeholder="Enter Username">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit"><span class="psw"><a style="color:white;padding-left:20px;text-decoration:underline;" href="forgotpassword.php"><b>Forgot password ?</b></a></span>
                                    </div>
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