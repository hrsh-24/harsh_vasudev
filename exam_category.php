<?php include "./includes/header.php"; ?>
<?php include "./includes/teacher_navigation.php"; ?>
<?php 
if(isset($_POST['submit1'])){
    global $connection;
    $examcategory = $_POST['examcategory'];
    $examtime = $_POST['examtime'];
    $query=" INSERT into exam_category(category,exam_time_in_minutes) VALUES ('$examcategory','$examtime')";
    $result=mysqli_query($connection,$query);
    if(!$result){
        echo "not inserted".mysqli_error($connection);
    }
    else{
        echo "<script>alert('category added successfully')</script>";
    }
    header("Location: exam_category.php");
}
?>     
        <!-- ======= Hero Section ======= -->
        <section id="hero">
        <br>
        <br>
        <div class="content mt-3" >
            <div class="animated fadeIn">
                <div class="row ">                               
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                        <form action="" name='form1' method='post'>
                            <div class="card-header">
                               <p class='text-center'> <strong>Add Category</strong></p> 
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">New Exam Category</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" name="examcategory" placeholder="enter new exam category">
                                    </div>                                   
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class=" form-control-label">Exam time in Minutes</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" name="examtime" placeholder="enter time in minutes">
                                    </div>                                     
                                </div>
                                <br>
                                <div class="form-group">
                                   <input class="btn btn-primary" type = "submit" name = "submit1" value="Add new category">
                                  <button class="btn btn-danger" style="float:right;"><a style="color:white;"href="teacher.php">Cancel</a></button>
                                </div> 
                                
                                </span>                                   
                            </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Category</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                           
                                            <th scope="col">Category</th>
                                            <th scope="col">Time </th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
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
                                    echo "<td><a class='btn btn-primary' href='edit_category.php?source=edit&c_id={$id}'>Edit</a></td>";
                                    echo "<td><a class='btn btn-danger' href='delete.php?delete={$id}'>Delete</a></td>";
                                        echo "<tr>";
                                    }
                                    ?>                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                               
                    </div>
                    </form>                  
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
       <br>
        <br> 
        </section><!-- End Hero -->
<br>
<br>


      