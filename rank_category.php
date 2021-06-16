<?php include "./includes/header.php"; ?>
<?php include "./includes/teacher_navigation.php"; ?>

<?php
if (isset($_GET['c_id'])) {
    $the_c_id = $_GET['c_id'];
global $connection;
$query = " SELECT * from exam_category WHERE id='{$the_c_id}'";
$display = mysqli_query($connection, $query);
if (!$display) {
    echo "Cannot delete id" . mysqli_error($connection);
}
while ($row = mysqli_fetch_array($display)) {
    $id = $row['id'];
    $category = $row['category'];
}
}
?>
        <br> 
        <!-- ======= Hero Section ======= -->
        <section id="hero">
        <br>
        <div class="breadcrumbs">
        <div class="col-sm-4">
        <div class="page-header float-left">
        <div class="page-title">
     
        <h6 style="color:white;padding-left:30px;font-size:28px;text-decoration:underline;"><b>Rank of student in <?php echo $category; ?></b></h6></div></div></div></div>
        <?php
        $count = 0;
        $query = "SELECT * FROM results where exam_type='$category' order by correct_answer desc  ";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);
        if ($count == 0) {
            echo "<h3 class='text-center' style='color:white;font-size:30px'>No User</h3>";
        ?>
        <?php
        } else {
        ?>
      <div class="content mt-3">
        <div class="row">
            <div class="col-lg-12"> 
                <div class="card">  
                    <div class="card-body">
                        
                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th style=padding:10px;>Username</th>
                                            <th style=padding:10px;>Exam</th>
                                            <th style=padding:10px;>Total Questions</th>
                                            <th style=padding:10px;>Correct Answer</th>  
                                          
                                            <th style=padding:10px;>Wrong Answer</th>  
                                            <th style=padding:10px;>Exam date</th>  
                                              
                                           
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
                        echo "<td style='color:black; font-size:14px; '><b>{$username}</b></td>";
                        echo "<td style='color:black; font-size:14px; '><b>{$exam_type}</b></td>";
                        echo "<td style='color:black; font-size:14px; '><b>{$total_question}</b></td>";
                        echo "<td style='color:black; font-size:14px; '><b>{$correct_answer}</b></td>";
                        echo "<td style='color:black; font-size:14px; '><b>{$wrong_answer}</b></td>";
                        echo "<td style='color:black; font-size:14px; '><b>{$exam_time}</b></td>";
                        echo "<tr>";
                    }
                }
                    ?>
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section><!-- End Hero -->
        <!-- ======= Footer ======= -->
      
   