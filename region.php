<?php 
require('./admin/db.php'); 
require('header2.php'); 
?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
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
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <?php require('menu.php'); ?>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Chart.js</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Charts</li>
          <li class="breadcrumb-item active">Chart.js</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<!---cdb code begin-->
<h1 align="center">Region-wise Sales</h1>
    <p align=center>Fine-tune your search using one or more filters</p>

<div>
    <center>
    <form action="#" method="post">
       <table cellpadding="5px" align="center">
       <tr>
       <th>Make</th>
       <th>Year</th>
       </tr>
       <tr>
       <td>
        <select name="make" id="make">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Make) from Demography;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Make"]; ?>"><?php echo $row["Make"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="year" id="year">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Year) from Demography;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Year"]; ?>"><?php echo $row["Year"]; ?></option><?php } ?>
       </select>
       </td>
    </tr>
    </table>
        <br><input type="submit" value="Search">
    </form>
    </center>
    </div>
    <?php
$count=1;
$sel_query = "Select * from demography";
$query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant";// group by Specs.Fuel_type"; 
//echo $query;


$flag = 0;
if(isset($_POST['make'])) 
{
   if(strlen($_POST['make'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Make = '".$_POST['make']."'";
   }
   else
   {
   $sel_query .= " and Make = '".$_POST['make']."'";
   }
   $query .= " and Demography.Make = '".$_POST['make']."'";
   }
}
if(isset($_POST['year'])) 
{
   if(strlen($_POST['year'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year = '".$_POST['year']."'";
   }
   else
   {
   $sel_query .= " and Year = '".$_POST['year']."'";
   }
   $query .= " and Demography.Year = ".$_POST['year'];
   }
}


$sel_query .= ";";
$query .=  " group by Specs.Fuel_type;";
//echo $sel_query;
//echo $query; 
$tbl_count=0;
?>
<!---cdb code end-->

    <section class="section">
    <div class="row">

    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Line Chart (Annual Region-wise Sales)</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      <?php 
                      $line_query = "Select Year, Sum(Region_East), Sum(Region_West), Sum(Region_North), Sum(Region_South) from demography group by Year;";
                      $line_result = mysqli_query($con,$line_query);
                      $year = "";
                      $east = "";
                      $west = "";
                      $north = "";
                      $south = "";
                      $count = 0;
                      while($row = mysqli_fetch_assoc($line_result)) 
                      {
                        if($count>0)
                        {
                          $year .= ", '".$row['Year']."'";
                          $east .= ", '".$row['Sum(Region_East)']."'";
                          $west .= ", '".$row['Sum(Region_West)']."'";
                          $north .= ", '".$row['Sum(Region_North)']."'";
                          $south .= ", '".$row['Sum(Region_South)']."'";
                        }
                        else
                        {
                          $year .= "'".$row['Year']."'";
                          $east .= "'".$row['Sum(Region_East)']."'";
                          $west .= "'".$row['Sum(Region_West)']."'";
                          $north .= "'".$row['Sum(Region_North)']."'";
                          $south .= "'".$row['Sum(Region_South)']."'";
                        }
                        $count++;
                      }
                      ?>
                      labels: [<?php echo $year; ?>],
                      datasets: [{
                        label: 'East',
                        data: [<?php echo $east; ?>],
                        fill: false,
                        borderColor: 'rgb(75, 92, 192)',
                        tension: 0.1
                      }, {
                        label: 'West',
                        data: [<?php echo $west; ?>],
                        fill: false,
                        borderColor: 'rgb(75, 192, 12)',
                        tension: 0.1
                      }, {
                        label: 'North',
                        data: [<?php echo $north; ?>],
                        fill: false,
                        borderColor: 'rgb(192, 192, 192)',
                        tension: 0.1
                      }, {
                        label: 'South',
                        data: [<?php echo $south; ?>],
                        fill: false,
                        borderColor: 'rgb(125, 85, 32)',
                        tension: 0.1
                      }, ]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Grouped Bar Chart</h5>

      <!-- Grouped Bar Chart -->
<div>
<canvas id="bar-chart-grouped" style="max-height: 400px;"></canvas>

<script>
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["East", "West", "North", "South"],
      datasets: [
          <?php 
            $stacked_query = "Select Year, Sum(Region_East), Sum(Region_West), Sum(Region_North), Sum(Region_South) from demography group by Year;";
            $stacked_result = mysqli_query($con,$stacked_query);
            $data = "";
            while($row = mysqli_fetch_assoc($stacked_result)) { if($tbl_count>0) {echo ",";} ?>
            {
              label: "<?php echo $row["Fuel_Type"]; ?>",
              backgroundColor: "#3e95cd",
              data: [<?php echo $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"]; ?>]
            }<?php $tbl_count++; } ?>
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Region-wise Fuel'
      }
    }
});

</script>
</div>
      <!-- End Grouped Bar Chart -->
    </div>
  </div>
</div>
</div>

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Fuel Type</h5>

      <!-- Stacked Bar Chart -->
<canvas id="stackedchart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(stackedchart, {
   type: 'bar',
   data: {
      labels: ['East', 'West', 'North', 'South'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
          $result = mysqli_query($con,$query);
          $data = "";
          while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>
          {
            label: '<?php echo $row["Fuel_Type"]; ?>',
            data: [<?php echo $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"]; ?>],
            backgroundColor: '<?php echo $colors[$tbl_count]; ?>'
          }<?php $tbl_count++; } ?>
        ]
   },
   options: {
      responsive: false,
      legend: {
         position: 'right' 
      },
      scales: {
         xAxes: [{
            stacked: true
         }],
         yAxes: [{
            stacked: true 
         }]
      }
   }
});

</script>
      <!-- End Stacked Bar Chart -->
    </div>
  </div>
</div>
</div>      

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">

          <!-- Pie Chart -->

            <div class="card-body pb-0">
              <h5 class="card-title">Car Body Type <span>| 2021</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Pie Chart -->

            </div>
          </div>
        </div>

    </section>
    <?php if (isset($_POST['make'])) { ?>
      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
    <table class="table datatable">
<thead>
<tr>
<th><strong></strong></th>
<th><strong>Make</strong></th>
<th><strong>Model</strong></th>
<th><strong>Variant</strong></th>
<th><strong>Year</strong></th>
<th><strong>East</strong></th>
<th><strong>West</strong></th>
<th><strong>North</strong></th>
<th><strong>South</strong></th>
<th><strong>Total</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query = "Select * from demography";
$query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant";// group by Specs.Fuel_type"; 
//echo $query;
$flag = 0;
if(isset($_POST['make'])) 
{
   if(strlen($_POST['make'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Make = '".$_POST['make']."'";
   }
   else
   {
   $sel_query .= " and Make = '".$_POST['make']."'";
   }
   $query .= " and Demography.Make = '".$_POST['make']."'";
   }
}
if(isset($_POST['year'])) 
{
   if(strlen($_POST['year'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year = '".$_POST['year']."'";
   }
   else
   {
   $sel_query .= " and Year = '".$_POST['year']."'";
   }
   $query .= " and Demography.Year = ".$_POST['year'];
   }
}


$sel_query .= ";";
$query .=  " group by Specs.Fuel_type;";
//echo $sel_query;
//echo $query; 
$tbl_count=0;
?>

<?php

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td><?php echo $row["Make"]; ?></td>
<td><?php echo $row["Model"]; ?></td>
<td><?php echo $row["Variant"]; ?></td>
<td><?php echo $row["Year"]; ?></td>
<td><?php echo number_format($row["Region_East"]); ?></td>
<td><?php echo number_format($row["Region_West"]); ?></td>
<td><?php echo number_format($row["Region_North"]); ?></td>
<td><?php echo number_format($row["Region_South"]); ?></td>
<td><?php echo number_format($row["Total"]); ?></td>


</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<?php } ?>
   </div>
   </div>
   </div>
   </div>
   </section>

  </main><!-- End #main -->

  <?php require('footer2.php'); ?>