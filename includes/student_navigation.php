<body>
    <!-- ======= Header ======= -->

        <header id="header" class="fixed-top header-transparent">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="index.php"><span>OES</span></a></h1>
                </div>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="student.php">Home</a></li>
                        <li><a class="nav-link scrollto" href="select_exam.php">Select Exam</a></li>
                        <li><a class="nav-link scrollto" href="edit_student.php?source=edit&p_id=<?php echo $_SESSION['email']; ?>">Edit</a></li>
                        <li><a class="nav-link scrollto" href="all_results.php">Results</a></li>
                        <!-- <li><a class="nav-link scrollto" href="./student.php">Student </a></li> -->
                        <li class="dropdown">
                            <a href="#">
                                <?php
                                if (!isset($_SESSION['username'])) {
                                    header("Location: index.php ");
                                } else {
                                    $nameofstudent = $_SESSION['username'];
                                }
                                ?>
                                <span><?php echo $nameofstudent; ?></span>
                                <i class='bi bi-chevron-down'></i>
                            </a>
                            <ul>
                                <li><a href="logout.php">Logout</a></li>
                                <li><a href="changepass.php">ChangePassword</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->