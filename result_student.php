<?php include "./includes/header.php"; ?>
<?php
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+ $_SESSION[exam_time] minutes"));
?>


<?php include "./includes/student_navigation.php"; ?>
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="hero-container" data-aos="fade-up">

    <?php
    $correct = 0;
    $wrong = 0;
    if (isset($_SESSION['answer'])) {
      global $connection;
      for ($i = 1; $i <= sizeof($_SESSION['answer']); $i++) {
        $answer = "";
        $query = " SELECT * from questions where category ='$_SESSION[exam_category]' && que_no='$i' ";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)) {
          $answer = $row['ans'];
        }
        if (isset($_SESSION['answer'][$i])) {
          if ($answer == $_SESSION['answer'][$i]) {
            $correct = $correct + 1;
          } else {
            $wrong = $wrong + 1;
          }
        } else {
          $wrong = $wrong + 1;
        }
      }
    }
    $count = 0;
    $query = "SELECT * from questions where category = '$_SESSION[exam_category]'   ";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    $wrong = $count - $correct;
    echo "<br>";
    echo "<br>";
    echo "<center>";
    echo "<p style='color:white; font-size:50px;'>Total Question:" . $count . "</p>";
    echo "<br>";
    echo "<p style='color:white; font-size:50px;'>Correct Answer:" . $correct . "</p>";
    echo "<br>";
    echo "<p style='color:white; font-size:50px;'>Wrong Answer:" . $wrong . "</p>";
    echo "</center>";
    ?>

    <?php
    if (isset($_SESSION["exam_start"])) {
      global $connection;
      $date = date("Y-m-d");
      $query = " INSERT INTO results(id,username,exam_type ,total_question ,correct_answer,wrong_answer,exam_time) VALUES (NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date') ";
      $result = mysqli_query($connection, $query);
    }
    if (isset($_SESSION['exam_start'])) {
      unset($_SESSION['exam_start']);
    ?>
      <script type="text/javascript">
        window.location.href = window.location.href;
      </script>
    <?php
    }
    ?>
  </div>
</section>
<?php include "./includes/footer.php"; ?>