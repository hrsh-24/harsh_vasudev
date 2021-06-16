<?php include "./includes/header.php"; ?>
<?php include "./includes/teacher_navigation.php"; ?>


<!-- End Header -->
<?php
if (isset($_GET['c_id'])) {
    $the_c_id = $_GET['c_id'];
}
global $connection;
$query = " SELECT * from exam_category WHERE id='{$the_c_id}'";
$display = mysqli_query($connection, $query);
if (!$display) {
    echo "Cannot delete id" . mysqli_error($connection);
}
while ($row = mysqli_fetch_array($display)) {
    $category = $row['category'];
}

?>
<?php
if (isset($_POST['submit'])) {
    global $connection;
    $loop = 0;
    $res = mysqli_query($connection, "SELECT * from questions where category = '{$category}' ORDER BY qid asc") or die(mysqli_error($connection));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $already_exist=$row['qns'];
            $loop = $loop + 1;
            mysqli_query($connection, " UPDATE questions set que_no='$loop' where qid = $row[qid]");
        }
    }
    $loop = $loop + 1;
    $question = $_POST['question'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];
    $answer = $_POST['answer'];
    if($question === $already_exist){
        echo "<script>alert('Question cannot be added')</script>";
        header("Location: ");
    }else{
        $insert_query = mysqli_query($connection, "INSERT into questions values(Null,'$loop','$question','$opt1','$opt2','$opt3','$opt4','$answer','$category')");

        if ($insert_query) {
        echo "<script>alert('Question added successfully')</script>";
        }    else {

         echo "Cannto insert in question table" . die(mysqli_error($connection));
        }
    }
}
?>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h6 style="font-size:30px;color:white;padding:30px;"><b>Add Questions in <?php echo $category; ?></b></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <form action="" method="post">
                                <div class="card">
                                    <div class="card-header">
                                        <p class='text-center'> <strong>Add new Questions</strong></p>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label class=" form-control-label">Add Question</label>
                                            <div class="input-group">
                                                <input class="form-control" name="question" placeholder="enter Question">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Add Option1</label>
                                            <div class="input-group">
                                                <input class="form-control" name="opt1" placeholder="Enter Option 1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Add Option2</label>
                                            <div class="input-group">
                                                <input class="form-control" name="opt2" placeholder="Enter Option 2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Add Option3</label>
                                            <div class="input-group">
                                                <input class="form-control" name="opt3" placeholder="Enter Option 3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Add Option4</label>
                                            <div class="input-group">
                                                <input class="form-control" name="opt4" placeholder="Enter Option 4">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Add Answer</label>
                                            <div class="input-group">
                                                <input class="form-control" name="answer" placeholder="Enter Answer">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="submit" value="Add Question">
                                            <button class="btn btn-danger" style="float:right;"><a style="color:white;"href="teacher.php">Cancel</a></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
