<?php include "./includes/db.php" ; ?>
<?php   
    if(isset($_GET['delete'])){
            global $connection;
            $id=$_GET['delete'];
            $query=" DELETE FROM exam_category WHERE id='{$id}'";
            $delete=mysqli_query($connection,$query);
            header("Location: exam_category.php");

    }
?>
