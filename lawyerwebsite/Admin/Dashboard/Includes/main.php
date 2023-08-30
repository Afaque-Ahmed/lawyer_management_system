<?php include "../connection.php";
session_start();
error_reporting(0);

?>
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- Left side columns -->
<div class="col-lg-12">
  <div class="row">

    <!-- Sales Card -->
    <div class="col-md-3">

      <?php
      $cases_won = "";
      $show = "SELECT sum(lawyer_case_done)  FROM `lawyer_details` ";
      $pdo_statement = $pdo_con->prepare($show);
      $pdo_statement->execute();
      $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $cases_won = $row['sum(lawyer_case_done)'];

      ?>

        <div class="card info-card" style="background-color: #D7B679;">
          <div class="card-body">
            <h3 class="card-title text-center fw-bolder">Cases Won</h3>
            <div class="d-flex text-center flex-column">
              <div class="">
                <h4 class="fw-bolder"><?php echo $cases_won ?></h4>
              </div>
            </div>
          </div>

        </div>
      <?php   }
      ?>


    </div><!-- End Sales Card -->

    <!-- Revenue Card -->
    <?php
    $Lawyers = "";
    $show = "SELECT count(*) FROM `lawyer_details`";
    $pdo_statement = $pdo_con->prepare($show);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
      $Lawyers = $row['count(*)'];
    ?>
    <div class="col-md-3">

      <div class="card info-card" style="background-color: #D7B679;">
        <div class="card-body">
          <h3 class="card-title text-center fw-bolder">Lawyers </h3>
          <div class="d-flex flex-column text-center">
            <div class="">
              <h4 class="fw-bolder"><?php echo $Lawyers ?></h4>
            </div>
          </div>
        </div>

      </div>
    </div><!-- End Revenue Card -->

    <?php } ?>

    <!-- Customers Card -->
    <?php
    $Clients = "";
    $show = "SELECT count(*) FROM `users` WHERE user_role = 'Client'";
    $pdo_statement = $pdo_con->prepare($show);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
      $Clients = $row['count(*)'];
    
    
    ?>
    <div class=" col-md-3">

      <div class="card info-card " style="background-color: #D7B679;">
        <div class="card-body">
          <h3 class="card-title text-center fw-bolder">Clients
          </h3>
          <div class="d-flex flex-column text-center">
            <h4 class="fw-bolder"><?php echo $Clients ?></h4>
          </div>
        </div>

      </div>
    </div><!-- End Customers Card -->

    <?php } ?>

    <?php
    $appoinment = "";
    $show = "SELECT count(*) FROM `appoinments` ";
    $pdo_statement = $pdo_con->prepare($show);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
      $appoinment = $row['count(*)'];
    
    ?>
    <div class=" col-md-3">
      <div class="card info-card" style="background-color: #D7B679;">
        <div class="card-body">
          <h3 class="card-title fw-bolder text-center">Appoinments</h3>
          <div class="d-flex flex-column text-center">
            <h4 class="fw-bolder"><?php echo $appoinment ?></h4>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php } ?>
  <!-- End Left side columns -->