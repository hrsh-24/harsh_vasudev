 <!-- Vendor JS Files -->
 <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top header-transparent">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="index.php"><span>OES</span></a></h1>
                </div>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="teacher.php">Home</a></li>   
                        <li class="dropdown">
                        <a class="nav-link scrollto" href="teacher_dash.php">Dashboard <i class='bi bi-chevron-down'></i></a>
                            <ul>
                            <li><a class="nav-link scrollto" href="exam_category.php">Add exam</a></li>
                            <li><a class="nav-link scrollto" href="add_edit_exam_questions.php">Add Questions</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link scrollto" href="teacher_user.php">Students</a></li>
                        <li><a class="nav-link scrollto" href="teacher_rank.php">Ranking</a></li>
                        <li class="dropdown">
                            <a href="#">
                                <!-- view who is logged in  -->
                                <?php
                                if (!isset($_SESSION['username'])) {
                                    header("Location: index.php ");
                                } else {
                                    $nameofteacher = $_SESSION['username'];
                                }
                                ?>
                                <span><?php echo $nameofteacher; ?></span>
                                <!-- view who is logged in  -->
                                <i class='bi bi-chevron-down'></i>
                            </a>
                            <ul>
                                <li><a href="logout.php">Logout</a></li>
                                <li><a href="changepassteacher.php">ChangePassword</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar --> 
            </div>
        </header><!-- End Header -->
       
        <!-- End Header -->