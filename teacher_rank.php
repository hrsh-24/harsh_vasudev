<?php include "./includes/header.php"; ?>
<?php include "./includes/teacher_navigation.php"; ?>


<!-- ======= Hero Section ======= -->
<section id="hero" style="padding:100px;">
    <br>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h6 style="color:white;padding:15px;font-size:22px;text-decoration:underline;"><b>Ranks according to category</b></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>

                                    <th scope="col">Category</th>

                                    <th scope="col">Rank</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                global $connection;
                                $query = " SELECT * from exam_category";
                                $select_category = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_array($select_category)) {
                                    $id = $row['id'];
                                    $category = $row['category'];

                                    echo "<tr>";
                                ?>

                                <?php

                                    echo "<td>$category</td>";

                                    echo "<td><a class='btn btn-primary' href='rank_category.php?source=rank&c_id={$id}'>Rank</a></td>";

                                    echo "<tr>";
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