<?php include "./includes/header.php"; ?>
<?php include "./includes/student_navigation.php"; ?>
<!-- ======= Hero Section ======= -->
<section id="hero" style="padding:100px;">
    <div class="container">
        <div class="row">
            <br>
            <h3 style="color:white;">All results student</h3>
            <br>
        </div>

    </div>
    <?php
    $count = 0;
    $query = "SELECT * FROM results Where username='$_SESSION[username]' order by id desc ";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        echo "<h3 class='text-center' style='color:white;font-size:30px'>No User</h3>";
    ?>

    <?php
    } else {
    ?>

        <div class="table-responsive-lg">
            <table class="text-center table table-bordered table-hover table-normal">
                <thead>
                    <tr>
                        <th style="background-color:black;color:white;padding:15px;">Username</th>
                        <th style="background-color:black;color:white;padding:15px;">Exam</th>
                        <th style="background-color:black;color:white;padding:15px;">Total Questions</th>
                        <th style="background-color:black;color:white;padding:15px;">Correct Answer</th>
                        <th style="background-color:black;color:white;padding:15px;">Wrong Answer</th>
                        <th style="background-color:black;color:white;padding:15px;">Exam Date</th>
                    </tr>
                </thead>
                <tbody>               
                <?php
                while ($row = mysqli_fetch_array($result)) {

                    $username = $row["username"];
                    $exam_type = $row["exam_type"];
                    $total_question = $row["total_question"];
                    $correct_answer = $row["correct_answer"];
                    $wrong_answer = $row["wrong_answer"];
                    $exam_time = $row["exam_time"];

                    echo "<tr>";
                    echo "<td style='color:white; font-size:18px; '><b>{$username}</b></td>";
                    echo "<td style='color:white; font-size:18px; '><b>{$exam_type}</b></td>";
                    echo "<td style='color:white; font-size:18px; '><b>{$total_question}</b></td>";
                    echo "<td style='color:white; font-size:18px; '><b>{$correct_answer}</b></td>";
                    echo "<td style='color:white; font-size:18px; '><b>{$wrong_answer}</b></td>";
                    echo "<td style='color:white; font-size:18px; '><b>{$exam_time}</b></td>";
                    echo "<tr>";
                }
            }
                ?>
                </tbody>
            </table>

</section><!-- End Hero -->
<?php include "./includes/footer.php"; ?>