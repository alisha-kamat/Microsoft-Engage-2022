<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <title>Team</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<?php 
  require('./admin/db.php'); 
  require('header2.php'); 
?>

<body>


  <?php require('menu.php'); ?>  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Team</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Team</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
              <h2>Alisha Kamat</h2>
              <h3>Founder & CEO</h3>
              <div class="social-links mt-2">
                <a href="https://github.com/alisha-kamat" class="github"><i class="bi bi-github"></i></a>
                <a href="https://www.linkedin.com/in/alishakamat/" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">A second year Computer Engineering student at VJTI, Mumbai.</p>

                  <h5 class="card-title">Team Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">Alisha Kamat</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">CarDB Analytics</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8">Founder & CEO</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">India</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">alishakamat@gmail.com</div>
                  </div>

                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="section dashboard">
      <div class="row">


          <!-- Project Timeline -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Project Timeline <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">Week 1</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Initiated project related research and creating the dataset
                  </div>
                </div><!-- End project item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">Week 2</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Created datasets for the automobile industry and developing the admin screens to access them
                  </div>
                </div><!-- End project item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">Week 2</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Analysed possible hosting options including Heroku, Vercel, and AWS
                  </div>
                </div><!-- End project item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">Week 3</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Started with the basic design and built the minimum functioning website for CarDB
                  </div>
                </div><!-- End project item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">Week 3</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Completed all planned features for B2C and B2B 
                  </div>
                </div><!-- End project item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">Week 4</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                   Improved the site's UI and added additional features
                  </div>
                </div><!-- End project item-->


              </div>

            </div>
          </div><!-- End Project Timeline -->
</div>
</section>
    
  </main><!-- End #main -->
  <!-- Footer -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CarDB</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

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