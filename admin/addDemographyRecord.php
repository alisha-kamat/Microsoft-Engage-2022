<?php
  require('db.php');
  include("auth.php");

  $status = "";
  if(isset($_POST['new']) && $_POST['new']==1)
  {
    $Year =$_REQUEST['Year'];
    $Total =$_REQUEST['Total'];
    $Region_East =$_REQUEST['Region_East'];
    $Region_West =$_REQUEST['Region_West'];
    $Region_North =$_REQUEST['Region_North'];
    $Region_South =$_REQUEST['Region_South'];
    $Age_Young =$_REQUEST['Age_Young'];
    $Age_Middle =$_REQUEST['Age_Middle'];
    $Age_Senior=$_REQUEST['Age_Senior'];
    $Colour_Dull =$_REQUEST['Colour_Dull'];
    $Colour_Bright =$_REQUEST['Colour_Bright'];
    $Colour_Neutral =$_REQUEST['Colour_Neutral'];
    $Gender_Male =$_REQUEST['Gender_Male'];
    $Gender_Female =$_REQUEST['Gender_Female'];
    $Gender_Other =$_REQUEST['Gender_Other'];
    $ins_query="INSERT INTO Demography(Year,Total,Region_East,Region_West,Region_North,Region_South,Age_Young,Age_Middle,Age_Senior,Colour_Dull,Colour_Bright,Colour_Neutral,Gender_Male,Gender_Female,Gender_Other) VALUES ('$Year','$Total','$Region_East','$Region_West','$Region_North','$Region_South','$Age_Young','$Age_Middle','$Age_Senior','$Colour_Dull','$Colour_Bright','$Colour_Neutral','$Gender_Male','$Gender_Female','$Gender_Other')";
    mysqli_query($con,$ins_query);
    $status = "New Record Added Successfully.
    </br></br><a href='demographyView'>View Added Record</a>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insert New Demography Record</title>
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
    <!--link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"-->
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    
    <!-- Chart JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!--  Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../homepage" class="logo d-flex align-items-center">
        <img src="../assets/img/cardb-logo.svg" alt="">
        <span class="d-none d-lg-block">CarDB Analytics</span>
      </a>
    </div><!-- End Logo -->
  <span class="d-none d-lg-block"><p><a <p><a href="adminHome">Admin Dashboard</a> 
  | <a href="demographyView">View Demography Records</a> 
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
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php 
                // For header bar
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
<h1>Add New Demography Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<br>
<table>
  <tr>
    <td><p>Year: </td><td><input type="text" name="Year" placeholder="Enter Year" 
    required /></p></td>
  </tr>
  <tr>
    <td><p>Total: </td><td><input type="text" name="Total" placeholder="Enter Total" 
    required /></p></td>
  </tr>
    <td><p>Region East: </td><td><input type="text" name="Region East" placeholder="Enter Region East" 
    required /></p></td>
  </tr>
    <td><p>Region West: </td><td><input type="text" name="Region West" placeholder="Enter Region West" 
    required /></p></td>
  </tr>
    <td><p>Region North: </td><td><input type="text" name="Region North" placeholder="Enter Region North" 
    required /></p></td>
  </tr>
    <td><p>Region South: </td><td><input type="text" name="Region South" placeholder="Enter Region South" 
    required /></p></td>
  </tr>
    <td><p>Age Young: </td><td><input type="text" name="Age Young" placeholder="Enter Age Young" 
    required /></p></td>
  </tr>
    <td><p>Age Middle: </td><td><input type="text" name="Age Middle" placeholder="Enter Age Middle" 
    required /></p></td>
  </tr>
    <td><p>Age Senior: </td><td><input type="text" name="Age Senior" placeholder="Enter Age Senior" 
    required /></p></td>
  </tr>
    <td><p>Colour Dull: </td><td><input type="text" name="Colour Dull" placeholder="Enter Colour Dull" 
    required /></p></td>
  </tr>
    <td><p>Colour Bright: </td><td><input type="text" name="Colour Bright" placeholder="Enter Colour Bright" 
    required /></p></td>
  </tr>
    <td><p>Colour Neutral: </td><td><input type="text" name="Colour Neutral" placeholder="Enter Colour Neutral" 
    required /></p></td>
  </tr>
    <td><p>Gender Male: </td><td><input type="text" name="Gender Male" placeholder="Enter Gender Male" 
    required /></p></td>
  </tr>
    <td><p>Gender Female: </td><td><input type="text" name="Gender Female" placeholder="Enter Gender Female" 
    required /></p></td>
  </tr>
    <td><p>Gender Other: </td><td><input type="text" name="Gender Other" placeholder="Enter Gender Other" 
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
