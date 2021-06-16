<?php include "./includes/header.php"; ?>
<?php include "./includes/teacher_navigation.php"; ?>
<!-- ======= Hero Section ======= -->
<section id="hero" style="padding:100px;">
    <div class="container">
        <div class="row">
            <br>
            <h3 style="color:white;">Students Registered Table</h3>
            <br>
        </div>

    </div>
    <?php
    global $connection;
    $select = "SELECT * from students ";
    $result = mysqli_query($connection, $select);
    if (!$result) {
        echo "Cannot display " . mysqli_error($connection);
    }
    echo   '<div class="panel">
                    <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped title1">
                            <thead style="background-color:white;color:black;">
                                 <tr>
                                    <td ><b>S.N.</b></td>
                                    <td ><b>Name</b></td>
                                     <td ><b>Email</b></td>
                                    <td ><b>Mobile</b></td>
                                    <td ><b>Address</b></td>                                         
                                </tr>
                                </thead>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['student_name'];
        $email = $row['student_email'];
        $contact = $row['student_contact'];
        $address = $row['student_address'];

        echo '<tbody>
            <tr>
      <td style="background-color:white;color:black;"><b>' . $c++ . '</b></td>
      <td style="background-color:white;color:black;"><b>' . $name . '</b></td>
      <td style="background-color:white;color:black;"><b>' . $email . '</b></td>
      <td style="background-color:white;color:black;"><b>' . $contact . '</b></td>
      <td style="background-color:white;color:black;"><b>' . $address . '</b></td>
      </tr>
      </tbody>';
    }
    $c = 0;
    echo '</table></div></div>';
    ?>
</section><!-- End Hero -->