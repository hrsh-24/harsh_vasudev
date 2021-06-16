<?php
session_start();
include "../includes/db.php";

$question_no = "";
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";

$queno = $_GET['questionno'];
if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}
$query = " SELECT * FROM questions where category = '$_SESSION[exam_category]' && que_no = $_GET[questionno] order by rand()  ";
$result = mysqli_query($connection, $query);
$count = mysqli_num_rows($result);

if ($count == 0) {
    
    echo "<b><p style='color:black;font-size:16px;'></b> Test is Completed , test will automatically generate result when time is over" . "</p>";
  
} else {
    while ($row = mysqli_fetch_array($result)) {
        $question_no = $row["que_no"];
        $question = $row["qns"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
    }
?>

<div class="card  " style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php echo "( " . $question_no . " ) &nbsp;  " . $question; ?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> <input type="radio" name="r1" id="r1"  value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" <?php
                                                                                                                                               ?>>&nbsp;<?php echo $opt1; ?></li>
    <li class="list-group-item">  <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" <?php
                                                                                                                                               ?>>&nbsp;<?php echo $opt2; ?></li>
    <li class="list-group-item">   <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" <?php
                                                                                                                                               ?>>&nbsp;<?php echo  $opt3; ?></li>
    <li class="list-group-item"> <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value,<?php echo $question_no; ?>)" <?php
                                                                                                                                              ?>>&nbsp;<?php echo $opt4; ?></li>
  </ul>
</div>

<?php
}
?>