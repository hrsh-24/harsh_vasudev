<?php include "./includes/header.php"; ?>
<?php
if (isset($_GET['c_id'])) {
    $the_c_id = $_GET['c_id'];
}
global $connection;
$query = " SELECT * from exam_category WHERE id='{$the_c_id}'";
$display = mysqli_query($connection, $query);
if (!$display) {
    echo "Cannot delte id" . mysqli_error($connection);
}
while ($row = mysqli_fetch_array($display)) {
    $category = $row['category'];
    $time = $row['exam_time_in_minutes'];
}

if (isset($_POST['update'])) {

    global $connection;
    $examcategory = $_POST['examcategory'];
    $examtime = $_POST['examtime'];
    $query = " UPDATE exam_category SET category ='{$examcategory}' ,exam_time_in_minutes ='{$examtime}' WHERE id ={$the_c_id}";
    $update = mysqli_query($connection, $query);
    if (!$update) {
        echo "not inserted" . mysqli_error($connection);
    } else {
        header("Location: exam_category.php");
    }
}

?>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="index.php"><span>Duofree</span></a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="teacher.php">Home</a></li>
                    <li class="dropdown">
                        <a class="nav-link scrollto" href="teacher_dash.php">Dash <i class='bi bi-chevron-down'></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="exam_category.php">Add exam</a></li>
                            <li><a class="nav-link scrollto" href="add_edit_exam_questions.php">Add Questions</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="teacher_user.php">Users</a></li>
                    <li><a class="nav-link scrollto" href="teacher_rank.php">Ranks</a></li>
                    <li class="dropdown">
                        <a href="#">
                            <!-- view who is logged in  -->
                            <?php
                            if (!isset($_SESSION['username'])) {
                                header("Location: index.php ");
                            } else {
                                $nameofteacher = $_SESSION['username'];
                            }
                            ?>
                            <span><?php echo $nameofteacher; ?></span>
                            <!-- view who is logged in  -->
                            <i class='bi bi-chevron-down'></i>
                        </a>
                        <ul>
                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="#">ChangePassword</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <br>
        <br>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row ">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <form action="" name='form1' method='post'>
                                <div class="card-header">
                                    <p class='text-center'> <strong>Edit Category</strong></p>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label class=" form-control-label">Edit Exam Category</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input class="form-control" value="<?php echo $category; ?>" name="examcategory" placeholder="enter new exam category">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class=" form-control-label"> Edit Exam time in Minutes</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input class="form-control" value="<?php echo $time; ?>" name="examtime" placeholder="enter time in minutes">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="update" value="Edit new category">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- .animated -->
        </div><!-- .content -->
        <br>
        <br>
    </section><!-- End Hero -->
    <br>
    <br>
    <!-- ======= Footer ======= -->
<?php include "./includes/footer.php"; ?>