<?php include "./includes/header.php"; ?>
<?php include "./includes/student_navigation.php"; ?>
<!-- ======= Hero Section ======= -->
<section id="hero">
  <br>
  <h3 class="" style="padding-left:400px;color:white;text-transform:capitalize;text-decoration:underline;">Select particular Subject of which you want to give test</h3>

  <div style="padding-left:700px;" class="col-sm-3 text-center" data-aos="fade-up">
    <?php
    global $connection;
    $query = " SELECT * from exam_category";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
      $exam_category = $row['category'];
    ?>
      <br>
      <input type="button" style="width:150px;font-size:18px" class=" btn btn-sm btn-primary form-control text-center " value="<?php echo $exam_category; ?>" onclick="set_exam_type_session(this.value);">
      <br>
    <?php
    }
    ?>
  </div>
</section><!-- End Hero -->

<?php include "./includes/footer.php"; ?>

<script type="text/javascript">
  function set_exam_type_session(exam_category) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        window.location = "student_dashboard.php";
      }
    };
    xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + exam_category, true);
    xmlhttp.send(null);
  }
</script>