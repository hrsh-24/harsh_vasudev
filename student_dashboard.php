<?php include "./includes/header.php"; ?>

<body>
    <!-- ======= Header ======= -->

        <header id="header" style="background-color:black;color:white;" class="fixed-top header-transparent">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="index.php"><span>OES</span></a></h1>
                </div>
                <nav id="navbar"  class="navbar">
                    <ul>
                        <li><a style="color:white;" class="nav-link scrollto" href="student.php">Home</a></li>
                        <li><a style="color:white;" class="nav-link scrollto" href="select_exam.php">Select Exam</a></li>
                        <li><a style="color:white;" class="nav-link scrollto" href="edit_student.php?source=edit&p_id=<?php echo $_SESSION['email']; ?>">Edit</a></li>
                        <li><a style="color:white;" class="nav-link scrollto" href="all_results.php">Results</a></li>
                        <!-- <li><a class="nav-link scrollto" href="./student.php">Student </a></li> -->
                        <li class="dropdown">
                            <a style="color:white;"  href="#">
                                <?php
                                if (!isset($_SESSION['username'])) {
                                    header("Location: index.php ");
                                } else {
                                    $nameofstudent = $_SESSION['username'];
                                }
                                ?>
                                <span><?php echo $nameofstudent; ?></span>
                                <i style="color:white;" class='bi bi-chevron-down'></i>
                            </a>
                            <ul>
                                <li><a  style="color:black;" href="logout.php">Logout</a></li>
                                <li><a style="color:black;"  href="changepass.php">ChangePassword</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->

        <br>
        <br>
        <br>
        <div class="upperlayer text-center">
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
                                        <ul class="breadcome-menu">
                                            <p style="color:black;font-size:30px;padding-top:20px;">Timer
                                            <div id="countdowntimer" style="display:block; font-size:20px;"></div>
                                            </p>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-6 col-lg-push-3">
                <br>
                <div class="row">
                    <br>
                   
                        <div class="container" style="display: flex; height: 100px;">
                            <div style="width: 45%; ">
                                <p style="padding-left:500px;color:black;font-size:30px;">Questions-</p>
                             </div>
                             <div style="flex-grow: 1;padding-left:100px;padding-top:10px; ">
                                <div id="total_que" style="float:right; font-size:20px;">0</div>
                                <div style="float:right; font-size:20px;">/</div>
                                <div id="current_que" style="float:right; font-size:20px;">0</div>
                            </div>
                        </div>
                    <div class="row" style="margin-top:20px">
                        <div class="row">
                            <div class="col-lg-10 col-lg-push-1" style="padding-left:500px; min-height:250px;color:black;" id="load_questions">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px">
                        <div class="" style="min-height:50px">
                            <div class="col-lg-12 " style="padding-left:490px;">
                            <div class="btn-group">
  <button class="btn btn-warning" onclick="load_previous();">Previous</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn btn-success" id="nextButton" onclick="load_next();"> Next</button>
  
</div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  


<script type="text/javascript">
    setInterval(function() {
        timer();
    }, 1000);

    function timer() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "00:00:01") {
                    window.location = "result_student.php";
                }
                document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_timer.php", true);
        xmlhttp.send(null);
    }
</script>
<!-- load Question AJAX -->

<script>
    function load_total_que() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "forajax/load_total_que.php", true);
        xmlhttp.send(null);
    }

    var questionno = '1';
    load_questions(questionno);

    function load_questions(questionno) {
        document.getElementById("current_que").innerHTML = questionno;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == 'over') {
                    window.location = "result_student.php";
                } else {
                    document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
        xmlhttp.send(null);
    }

    function radioclick(radiovalue, questionno) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
        };
        xmlhttp.open("GET", "forajax/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue, true);
        xmlhttp.send(null);
    }

    function load_previous() {
        if (questionno == '1') {
            load_questions(questionno);
        } else {
            questionno = eval(questionno) - 1;
            load_questions(questionno);
        }
    }

    function load_next() {
            questionno = eval(questionno) + 1;
        load_questions(questionno);

    }
</script>
<!-- End Header -->