<?php
ob_start();
include "includes/header.php";
include "includes/student_navigation.php";
include "includes/db.php";
?>
<?php
function ifItIsMethod($method = null)
{
    if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
        return true;
    }
    return false;
}

function email_exists($email)
{
    global $connection;
    $query = "SELECT student_email FROM students WHERE student_email = '$email' ";
    $result  = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
?>


<?php
if (!ifItIsMethod('get') && isset($_GET['forgot'])) {
    header("Location: index.php");
}
if (ifItIsMethod('post')) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));

        if (email_exists($email)) {
            if ($stmt = mysqli_prepare($connection, " UPDATE students SET token='{$token}' WHERE student_email = ?")); {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }
}

?>

<?php
if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $sel_query = "SELECT * FROM students WHERE student_email='$email'";
    $results = mysqli_query($connection, $sel_query);
    $row = mysqli_num_rows($results);

    if ($row) {
        $userdata = mysqli_fetch_array($results);
        $student_name = $userdata['student_name'];
        $token = $userdata['token'];
        $subject = "Password reset";
        $body    = "Hi , $student_name. Click here to reset your password http://localhost/Squadfree/reset_password.php?token=$token ";
        $sender_email = "From: vasudav.rana@gmail.com@gmail.com";
        if (mail($email, $subject, $body, $sender_email)) {
            $_SESSION['msg'] = "check mail to reset password $email";
            echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Check your mail for reset password link to change password')
         window.location.href='student.php';
         </SCRIPT>");
        } else {
            echo "failed to send email";
        }
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('No user is registered with this email address!')
         window.location.href='changepass.php';
         </SCRIPT>");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="hero">
        <div class="hero-container">

            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            <h3><i class="fa fa-user fa-4x"></i></h3>
                            <h3 style="text-transform: uppercase; font-size:40px; color:#fff;" class="text-center">Change Password</h3>
                            <div class="panel-body">

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="password" class="sr-only"></label>
                                        <input type="email" name="email" id="key" class="form-control" placeholder="Enter your email" required>
                                    </div>
                                    <br>
                                    <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-primary" value="Send Mail">
                                </form>
                            </div><!-- Body-->
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>