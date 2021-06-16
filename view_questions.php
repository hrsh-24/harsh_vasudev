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

                    <h6 style="color:white;padding:30px;"><b>View questions <?php echo $category; ?></b></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style=padding:4px;>Question no.</th>
                                    <th style=padding:4px;>Question</th>
                                    <th style=padding:4px;>opt1 </th>
                                    <th style=padding:4px;>opt2</th>
                                    <th style=padding:4px;>opt3</th>
                                    <th style=padding:4px;>opt4</th>
                                    <th style=padding:4px;>Answer</th>
                                    <th style=padding:4px;>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                global $connection;
                                $query = " SELECT * from questions where category='$category' ";
                                $select_category = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_array($select_category)) {
                                    $qid = $row['qid'];
                                    $que_no = $row['que_no'];
                                    $qns = $row['qns'];
                                    $opt1 = $row['opt1'];
                                    $opt2 = $row['opt2'];
                                    $opt3 = $row['opt3'];
                                    $opt4 = $row['opt4'];
                                    $ans = $row['ans'];
                                    $category = $row['category'];
                                    echo "<tr>";
                                ?>

                                <?php
                                    echo "<td>$que_no</td>";
                                    echo "<td>$qns</td>";
                                    echo "<td>$opt1</td>";
                                    echo "<td>$opt2</td>";
                                    echo "<td>$opt3</td>";
                                    echo "<td>$opt4</td>";
                                    echo "<td>$ans</td>";
                                    echo "<td><a class='btn btn-danger' href='view_questions.php?source=delete&q_id={$qid}&c_id={$id}'>Delete</a></td>";

                                    echo "<tr>";
                                }
                                ?>

                                <?php
                                if (isset($_GET['q_id'])) {
                                    $the_q_id = $_GET['q_id'];

                                    global $connection;
                                    $query = " DELETE from questions WHERE qid='{$the_q_id}'";
                                    $display = mysqli_query($connection, $query);
                                    if (!$display) {
                                        echo "Cannot delete id" . mysqli_error($connection);
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