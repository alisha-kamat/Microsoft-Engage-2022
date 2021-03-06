<?php
  require('db.php');
  include("auth.php");
  $status = "";
  if(isset($_POST['new']) && $_POST['new']==1)
  {
    $Year =$_REQUEST['year'];
    $Jan =$_REQUEST['Jan'];
    $Feb =$_REQUEST['Feb'];
    $Mar =$_REQUEST['Mar'];
    $Apr =$_REQUEST['Apr'];
    $May =$_REQUEST['May'];
    $Jun =$_REQUEST['Jun'];
    $Jul =$_REQUEST['Jul'];
    $Aug =$_REQUEST['Aug'];
    $Sep =$_REQUEST['Sep'];
    $Oct =$_REQUEST['Oct'];
    $Nov =$_REQUEST['Nov'];
    $Dcm =$_REQUEST['Dcm'];
    $Total =$_REQUEST['Total'];
    $ins_query="INSERT INTO Sales(Year,Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dcm,Total) VALUES
      ('$Year','$Jan','$Feb','$Mar','$Apr','$May','$Jun','$Jul','$Aug','$Sep','$Oct','$Nov','$Dcm','$Total')";
      mysqli_query($con,$ins_query);
    $status = "New Record Added Successfully.
    </br></br><a href='salesView'>View Added Record</a>";
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Sales Record</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="../assets/img/cardb-logo.svg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- Chart JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

   <!-- Header -->
   <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="../homepage" class="logo d-flex align-items-center">
      <img src="../assets/img/cardb-logo.svg" alt="">
      <span class="d-none d-lg-block">CarDB Analytics</span>
    </a>
  </div><!-- End Logo -->
<span class="d-none d-lg-block"><p><a <p><a href="adminHome">Admin Dashboard</a> 
| <a href="salesView">View Sale Records</a> 
| <a href="adminLogout">Logout</a></p></span>

<nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <?php 
                if(isset($_SESSION["admin_username"]))
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>".$_SESSION['admin_username']."</span>";
                }
                else
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>Guest</span>";
                }
            ?>
          </a><!-- End Profile Section -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php 
                if(isset($_SESSION["admin_username"]))
                {
                  echo "<h6>".$_SESSION['admin_username']."</h6>";
                  //echo "<span>".$_SESSION['admin_email']."</span>";
                }
                else
                {
                  echo "<h6>Guest</h6>";
                  echo "<span>Not logged in</span>";
                }
              ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!--li>
              <a class="dropdown-item d-flex align-items-center" href="faq">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li-->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="adminLogout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
</head>
<body>
<div class="form">

  <div>
  <br><br><br>
  <center>
  <h1>Add New Sales Record</h1>
  <form name="form" method="post" action=""> 
  <input type="hidden" name="new" value="1" />

  <br>
  <table>
    <tr>
      <td><p>Year: </td><td><input type="text" name="year" placeholder="Enter Username" 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Jan: </td><td><input type="text" name="Jan" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Feb: </td><td><input type="text" name="Feb" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Mar: </td><td><input type="text" name="Mar" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Apr: </td><td><input type="text" name="Apr" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>May: </td><td><input type="text" name="May" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Jun: </td><td><input type="text" name="Jun" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Jul: </td><td><input type="text" name="Jul" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Aug: </td><td><input type="text" name="Aug" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Sep: </td><td><input type="text" name="Sep" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Oct: </td><td><input type="text" name="Oct" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Nov: </td><td><input type="text" name="Nov" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Dec: </td><td><input type="text" name="Dcm" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
    <tr>
      <td><p>Total: </td><td><input type="text" name="Total" placeholder="Enter Sales " 
      required /></p></td>
    </tr>
  </table>
  <p><input name="submit" type="submit" value="Submit" /></p>
  </form>
  <p style="color:#FF0000;"><?php echo $status; ?></p>
  </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/chart.js/chart.min.js"></script>
<script src="../assets/vendor/echarts/echarts.min.js"></script>
<script src="../assets/vendor/quill/quill.min.js"></script>
<script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
</body>
</html>
