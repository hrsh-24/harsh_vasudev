<?php include "./includes/header.php"; ?>
<?php include "./includes/teacher_navigation.php"; ?>
        <br> 
        <!-- ======= Hero Section ======= -->
        <section id="hero">
        <br>
        <div class="breadcrumbs">
        <div class="col-sm-4">
        <div class="page-header float-left">
        <div class="page-title">
        <h6 style="font-size:18px;color:white;padding:30px;text-decoration:underline;"><b>Select exam Categories for add and edit questions</b></h6></div></div></div></div>
      <div class="content mt-3">
        <div class="row">
            <div class="col-lg-12"> 
                <div class="card">  
                    <div class="card-body">
                        
                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                      
                                            <th scope="col">Category</th>
                                            <th scope="col">Time </th>
                                            <th scope="col">Select</th>  
                                            <th scope="col">View</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    global $connection;
                                    $query= " SELECT * from exam_category";
                                    $select_category = mysqli_query($connection,$query);
                                    while($row=mysqli_fetch_array($select_category)){
                                        $id=$row['id'];
                                        $category=$row['category'];
                                        $time=$row['exam_time_in_minutes'];
                                        echo "<tr>";
                                    ?>
                                    
                                    <?php
                                
                                    echo "<td>$category</td>";
                                    echo "<td>$time</td>";
                                    echo "<td><a class='btn btn-primary' href='add_edit_questions.php?source=edit&c_id={$id}'>Select</a></td>"; 
                                    echo "<td><a class='btn btn-primary' href='view_questions.php?source=view&c_id={$id}'>View</a></td>";                                   
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
        <!-- ======= Footer ======= -->
        <?php include "./includes/footer.php"; ?>