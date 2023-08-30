<?php include "../connection.php";
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lawyers Website - Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .nav-item .nav-content span {
      color: black;
    }

    .nav-item span {
      color: black;
    }

    .nav-item span:hover {
      color: white;
    }

    .nav-item .nav-content span:hover {
      color: white;
    }

    .card-title {
      color: black;
    }
  </style>

</head>

<body class="bg-white">

  <?php
  if (isset($_SESSION['role']) == "Admin") { ?>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center bg-black">

      <div class="d-flex align-items-center justify-content-center ">
        <a href="./index.php" class="logo d-flex align-items-center ">
          <img src="assets/img/header3-logo.svg" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn" style="color: #D7B679;"></i>
      </div><!-- End Logo -->

      <!-- <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search" style="color: #D7B679;"></i></button>
        </form>
      </div>
      
        End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->

         

          </li><!-- End Notification Nav -->

          <li class="nav-item dropdown">
            <?php
            $messages = "";
            $show = "SELECT count(*) FROM `contact_us`";
            $pdo_statement = $pdo_con->prepare($show);
            $pdo_statement->execute();
            $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
              $messages = $row['count(*)'];


            ?>

              <a class="nav-link nav-icon" style="color: #D7B679;" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-danger fw-bolder text-white badge-number"><?php echo $messages ?></span>
              </a><!-- End Messages Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <li class="dropdown-header fw-bolder">
                  You have <?php echo $messages ?> new messages
                  <a href="./Contact_us_messages.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
              <?php } ?>
              <li>
                <hr class="dropdown-divider">
              </li>

              <?php
              $show = "SELECT * FROM `contact_us` limit 5";
              $pdo_statement = $pdo_con->prepare($show);
              $pdo_statement->execute();
              $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
              foreach ($result as $row) { ?>
                <li class="message-item">
                
                    <!-- <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle"> -->
                    <div>
                      <h4><?php echo $row['Name'] ?></h4>
                      <p><?php echo $row['Message'] ?></p>
                      
                    </div>
                  
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

              <?php   }
              ?>





              

              <li class="dropdown-footer">
                <a href="./Contact_us_messages.php">Show all messages</a>
              </li>

              </ul><!-- End Messages Dropdown Items -->

          </li><!-- End Messages Nav -->

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2" style="color: #D7B679;"><?php echo $_SESSION['username'] ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $_SESSION['username'] ?></h6>
                <span style="cursor: pointer;"><?php echo $_SESSION['role'] ?></span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

          
           
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="./logout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar" style="background-color: black;">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679;" href="index.php">
            <i class="bi bi-grid" style="color: black;"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679;" href="Contact_us_messages.php">
            <i class="bi bi-postage-fill" style="color: black;"></i>
            <span>Messages</span>
          </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679; " data-bs-target="#Practice" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button" style="color: black;"></i><span>Practice Areas</span><i style="color: black;" class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="Practice" style="background-color: #D7B679;" class="nav-content collapse rounded-3 " data-bs-parent="#sidebar-nav">
            <li>
              <a href="practice_area_create.php">
                <span>Create Practice</span>
              </a>
            </li>
            <li>
              <a href="practice_area_show.php">
                <span>Show Practice</span>
              </a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679;" href="lawyers.php">
            <i class="bi bi-person-fill" style="color: black;"></i><span>Lawyers</span>
          </a>
        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679; color: black;"  href="client.php">
            <i class="bi bi-people-fill" style="color: black;"></i><span>Clients</span>
          </a>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679; color: black;" href="appoinment.php">
            <i class="bi bi-database-fill-check" style="color: black;"></i><span>Appoinments</span>
          </a>
        </li><!-- End Tables Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679; " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button" style="color: black;"></i><span>Dropdown</span><i style="color: black;" class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" style="background-color: #D7B679;" class="nav-content collapse rounded-3 " data-bs-parent="#sidebar-nav">
            <li>
              <a href="charts-chartjs.html">
                <span>Chart.js</span>
              </a>
            </li>
            <li>
              <a href="charts-apexcharts.html">
                <span>ApexCharts</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <span>ECharts</span>
              </a>
            </li>
          </ul>
        </li>End Charts Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679;" href="pages-contact.html">
            <i class="bi bi-envelope" style="color:black"></i>
            <span>Contact</span>
          </a>
        </li>End Contact Page Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679;" href="pages-register.html">
            <i class="bi bi-card-list" style="color: black;"></i>
            <span>Register</span>
          </a>
        </li>End Register Page Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" style="background-color: #D7B679;" href="pages-login.html">
            <i class="bi bi-box-arrow-in-right" style="color: black;"></i>
            <span>Login</span>
          </a>
        </li>End Login Page Nav -->

      </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
    <?php  } else {
    header("location:../admin_login.php");
  }
    ?>