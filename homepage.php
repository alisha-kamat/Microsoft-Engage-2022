<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   <!-- Header -->
   <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="homepage" class="logo d-flex align-items-center">
      <img src="assets/img/cardb-logo.svg" alt="">
      <span class="d-none d-lg-block">CarDB Analytics</span>
    </a>
  </div><!-- End Logo -->
<nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <?php 
                if(isset($_SESSION["username"]))
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>".$_SESSION['username']."</span>";
                }
                else
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>Guest</span>";
                }
            ?>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php 
                if(isset($_SESSION["username"]))
                {
                  echo "<h6>".$_SESSION['username']."</h6>";
                  echo "<span>".$_SESSION['email']."</span>";
		            ?>
          	  </li>
            	<li>
              	<hr class="dropdown-divider">
            	</li>

	              <li>
              	  <a class="dropdown-item d-flex align-items-center" href="logout">
                  <i class="bi bi-box-arrow-right"></i>
                 <span>Sign Out</span>
                <?php } 
                else
                {
                  echo "<h6>Guest</h6>";
                  echo "<span>Not logged in</span>";
                  ?>
          	  </li>
            	<li>
              	<hr class="dropdown-divider">
            	</li>

	         <li>
              	  <a class="dropdown-item d-flex align-items-center" href="login">
                  <i class="bi bi-box-arrow-right"></i>
                 <span>Sign In</span>
		        <?php }
              ?>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
<?php  
  require('header2.php'); 
?>

<body>
	<a href="#"><img src="assets/img/logo.jpg" height="50px" alt="Car DB Logo"></a>
	<center><img src="assets/img/cardib-rap.jpg" width="100%" alt="Car DB Home"></center>

  <main>
    <div class="container">
<br/>
    <section class="section">
      <div class="row">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
<p></p>
<h2 align="center">CarDB&#8482; | Data Analytics for the Car Industry</h2>
<p></p>
<img src="assets/img/cardb-logo.svg" alt="CarDB Logo"  style="float:left; padding-right: 20px; padding-bottom: 10px;">
<p>Not to be confused with the rapper with a similar sounding name, CarDB (short for Car Database) is a comprehensive repository with advanced data analytics to give you deep quantitative insights.</p> 

<p>Whether you are a car buyer or someone with an interest in understanding and unravelling the hidden trends in the automotive industry, we have something for you.</p>

<p>Our car research tool helps car buyers cut through the clutter and find the best suited car to buy - from royal white to bodak yellow!</p>

<p>Our data analytics tools help you slice and dice through the big data repository we've collated, filtered and validated to ensure you get the most accurate view of India's most rapidly growing industry.</p>

<p>So, how do you want to start the journey? </p>
            </div>
          </div>

        </div>
      </div>
    </section>

	</div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h3 align="center" class="card-title"><i class="bi bi-search"></i> Planning to buy a car? </h3>
              <p>Use the CarDB (free) research page to select the best car based on your personal preferences e.g. car type, price, mileage and more.</p>
			<a href="cars"><center><button type="button" class="btn btn-success btn-lg">Car Search</button></center></a>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 align="center" class="card-title"><i class="bi bi-bar-chart-line-fill"></i> Interested in the car industry?</h5>
              <p>Use our simple analytics tools (requires registration) to dig into the industry data and gain competitive insights.</p>
			<a href="dashboard"><center><button type="button" class="btn btn-success btn-lg">Analytics Dashboard</center></a>
            </div>
          </div>

        </div>
      </div>
    </section>

      </section>
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>