<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<?php 
  require('./admin/db.php');
  require('header2.php');
?>

<body>



  <?php require('./menu.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Overview</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

          <!-- Popular car Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
              <?php 
		              $maxyear_query = "select max(year) as MaxYear from sales;";
                  $maxyear_result = mysqli_query($con,$maxyear_query);
                  $maxyear_row = mysqli_fetch_assoc($maxyear_result);
                  $maxyear  = $maxyear_row['MaxYear'];
                  $popular_query = "Select Make, Model, Variant, Total from sales where Year=" . $maxyear . " order by Total desc;";

                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Make']." ".$row['Model']." ".$row['Variant'];
                  
                ?>


                <div class="card-body">
                  <h5 class="card-title">Most Popular Car <span>| <?php echo $maxyear; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $popular; ?></h6>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Most popular car card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

              <?php 
                  $popular_query = "Select Specs.Body_Type, SUM(Demography.Total) as STotal from Demography INNER JOIN Specs ON Demography.Make = Specs.Make AND Demography.Model = Specs.Model AND Demography.Variant = Specs.Variant AND Demography.Year = " . $maxyear . " group by Specs.Body_Type ORDER BY STotal DESC;";

                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Body_Type'];
                  
                ?>
                <div class="card-body">
                  <h5 class="card-title">Popular Car Body Type <span>| <?php echo $maxyear; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hdd-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $popular; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          <!-- FUel type Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
              <?php 
                  $popular_query = "Select Specs.Fuel_Type, SUM(Demography.Total) as STotal from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant and Demography.Year = " . $maxyear . " group by Specs.Fuel_Type order by STotal DESC;";
                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Fuel_Type'];
                  
                ?>


                <div class="card-body">
                  <h5 class="card-title">Popular Car Fuel Type<span> | <?php echo $maxyear; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-droplet-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $popular; ?></h6>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Fuel type card -->

            <!-- Transmission type Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

              <?php 
                  $popular_query = "Select Specs.Transmission, sum(Total) as STotal from Sales,Specs where Year = " . $maxyear . " group by Specs.Transmission order by STotal DESC;";
                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Transmission'];
                  
                ?>
                <div class="card-body">
                  <h5 class="card-title">Top Transmission Type <span>| <?php echo $maxyear; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-joystick"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $popular; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Transmission type Card -->            
	
          <div class="col-lg-12">
           <div class="card">
             <div class="card-body">
	            <center><h2><br>Car Variants available in the market<br></h2></center></div></div></div>

          <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Based on Seating Capacity</h5>

              <!-- Bar Chart -->
              <div id="seatsChart" style="min-height: 400px;" class="echart"></div>

              <script>
              <?php 
                $count = 0;
                $capacity_query = "SELECT COUNT(*), Seating_capacity FROM Specs GROUP BY Seating_capacity ORDER BY Seating_capacity asc;";
                $capacity_result = mysqli_query($con,$capacity_query);
                $data = "";
                $cols = "";
                while($row = mysqli_fetch_assoc($capacity_result))
                {
                    if($count>0) 
                    {
                      $data .= ", ";
                      $cols .= ", ";
                    }
                    $data .= $row['COUNT(*)'];
                    $cols .= "'".$row['Seating_capacity']."'";
                    $count++;
                }
              ?>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#seatsChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: [<?php echo $cols;?>]
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php echo $data;?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->
          </div>
          </div>
        </div>

          <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Based on Fuel Type</h5>

              <!-- Bar Chart -->
              <div id="fuelChart" style="min-height: 400px;" class="echart"></div>

              <script>
              <?php 
                $count = 0;
                $capacity_query = "SELECT COUNT(*), Fuel_Type FROM Specs GROUP BY Fuel_Type ORDER BY Fuel_Type asc;";
                $capacity_result = mysqli_query($con,$capacity_query);
                $data = "";
                $cols = "";
                while($row = mysqli_fetch_assoc($capacity_result))
                {
                    if($count>0) 
                    {
                      $data .= ", ";
                      $cols .= ", ";
                    }
                    $data .= $row['COUNT(*)'];
                    $cols .= "'".$row['Fuel_Type']."'";
                    $count++;
                }
              ?>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#fuelChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: [<?php echo $cols;?>]
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php echo $data;?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
        </div>

  


            <!-- Reports -->
            <!--div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Top 5 Performers <span>/<?php echo $row['year']; ?></span></h5-->

                  <?php 
                  /*$performers_query = "select *, sum(Total) from sales where Year in (select max(year) from sales) group by Make order by sum(Total) desc;";
                  $performers_result = mysqli_query($con,$performers_query);    
                  $count = 0;*/
                ?>


                  <!-- Line Chart -->
                  <!--div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [
                          <?php
                            /*$count = 0;
                            while($row = mysqli_fetch_assoc($performers_result))
                            {
                              if($count == 0 && $count<5)
                              {
                                echo "{
                                  name: '".$row['Make']."',
                                  data: [".$row['Jan'].", ".$row['Feb'].", ".$row['Mar'].", ".$row['Apr'].", ".$row['May'].", ".$row['Jun'].", ".$row['Jul'].", ".$row['Aug'].", ".$row['Sep'].", ".$row['Oct'].", ".$row['Nov'].", ".$row['Dcm']."],
                                }";
                              }
                              else if($count>0 && $count<5)
                              {
                                echo "\n,{
                                  name: '".$row['Make']."',
                                  data: [".$row['Jan'].", ".$row['Feb'].", ".$row['Mar'].", ".$row['Apr'].", ".$row['May'].", ".$row['Jun'].", ".$row['Jul'].", ".$row['Aug'].", ".$row['Sep'].", ".$row['Oct'].", ".$row['Nov'].", ".$row['Dcm']."],
                                }";
                              }
                               $count++;
                            } */
                            ?>],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#5470C6','#FAC858','#EE6666','#91CC75', '#698396'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'category',
                          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                        },
                        tooltip: {
                          x: {
                            //format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script-->
                  <!-- End Line Chart -->

                <!--/div>

              </div>
            </div--><!-- End Reports -->


            <!-- Top 5 Selling cars -->
            <!--div class="col-12">
              <div class="card top-selling overflow-auto">

                 <?php 
                  $top_query = "Select Sales.Make, Sales.Model, Sales.Variant, Specs.Ex_showroom_price, SUM(Sales.Total) as STotal from Specs INNER JOIN Sales ON Sales.Year = " . $maxyear . " and Sales.Make = Specs.Make and Sales.Model = Specs.Model and Sales.Variant = Specs.Variant group by Sales.Make order by STotal DESC;";
//echo $top_query;
                  $result = mysqli_query($con,$top_query);
                  ?>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling Companies and their Prices<span>| 2021</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Model</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        $count = 0;
                        while($row = mysqli_fetch_assoc($result))
                        {                     
                          if($count<5)
                          {
                        ?>
                        <td><a href="#" class="text-primary fw-bold"><?php echo $row['Make']; ?></a></td>
                        <td class="fw-bold"><?php echo $row['Model']; ?></td>
                        <td>₹<?php echo number_format($row['Ex_showroom_price']); ?></td>
                      </tr>
                          <?php $count++;
                          }
                        } 
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div--><!-- End Top 5 Selling Cars  -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">      
          <!-- News & Updates Traffic -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="https://www.careerizma.com/blog/data-analytics-automotive-industry/">Data analytics for Automotive Industry - Careerizma </a></h4>
                  <p>Today, automotive innovations like electric and self-driving cars have completely changed the world...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-2.jpg" alt="">
                  <h4><a href="https://www.dataiku.com/stories/automotive-industry/" rel="nofollow">The Automotive Industry: Driving the Future of AI</a></h4>
                  <p>Automobile data analytics isn't just about self-driving cars; data science and machine learning technologies can help...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-3.jpg" alt="">
                  <h4><a href="https://www.industryarc.com/Report/17997/automotive-data-analytics-market.html" rel="nofollow">Automotive Data Analytics Market - Forecast</a></h4>
                  <p>Google Inc., Microsoft Corporation, Drust, Sight Machine and ZenDrive are considered to be the key...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-4.jpg" alt="">
                  <h4><a href="https://www.techtarget.com/searchbusinessanalytics/feature/Customer-centric-automotive-data-analytics-proves-maturity" rel="nofollow">Automotive analytics drives consumer-focused industry</a></h4>
                  <p> Analytics of consumer trends can help automakers identify purchase patterns, optimize vehicle manufacturing...</p>
                </div>

                <!--div class="post-item clearfix">
                  <img src="assets/img/news-5.jpg" alt="">
                  <h4><a href="https://www.forbes.com/sites/markminevich/2020/07/13/the-automotive-industry-and-the-data-driven-approach/" rel="nofollow">The Automotive Industry And The Data Driven Approach</a></h4>
                  <p>Leveraging data on millions of individual vehicle histories...</p>
                </div-->

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->


        </div><!-- End Right side columns -->

      </div>
	      <div class="row">
          <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Based on Car Body Type</h5>

              <!-- Bar Chart -->
              <div id="bodyChart" style="min-height: 400px;" class="echart"></div>

              <script>
                  <?php 
                    $count = 0;
                    $capacity_query = "SELECT COUNT(*), Body_Type FROM Specs GROUP BY Body_Type ORDER BY Body_Type asc;";
                    $capacity_result = mysqli_query($con,$capacity_query);
                    $data = "";
                    $cols = "";
                    while($row = mysqli_fetch_assoc($capacity_result))
                    {
                        if($count>0) 
                        {
                          $data .= ", ";
                          $cols .= ", ";
                        }
                        $data .= $row['COUNT(*)'];
                        $cols .= "'".$row['Body_Type']."'";
                        $count++;
                    }
                  ?>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#bodyChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: [<?php echo $cols;?>]
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php echo $data;?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
        </div>

          <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Based on Transmission Type</h5>

              <!-- Bar Chart -->
              <div id="transmissionChart" style="min-height: 400px;" class="echart"></div>

              <script>
                <?php 
                  $count = 0;
                  $capacity_query = "SELECT COUNT(*), Transmission FROM Specs GROUP BY Transmission ORDER BY Transmission asc;";
                  $capacity_result = mysqli_query($con,$capacity_query);
                  $data = "";
                  $cols = "";
                  while($row = mysqli_fetch_assoc($capacity_result))
                  {
                      if($count>0) 
                      {
                        $data .= ", ";
                        $cols .= ", ";
                      }
                      $data .= $row['COUNT(*)'];
                      $cols .= "'".$row['Transmission']."'";
                      $count++;
                  }
                ?>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#transmissionChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: [<?php echo $cols;?>]
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php echo $data;?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
        </div>
       </div>
	    <div class="row">
        <div class="col-lg-10">
         <div class="card">
         <div class="card-body">
        <br>
        <h3>Number of options for various budget ranges</h3>
        <br><br>
            <table class="table datatable">
        <thead>
        <tr>
          <th></th>
          <th>Budget Range</th>
          <th>Number of Options</th>
        </tr>
        </thead>
        <?php
                $min_query="Select MIN(Ex_showroom_price) from specs;";
                $max_query="Select MAX(Ex_showroom_price) from specs;";
                $min_result = mysqli_query($con,$min_query);
                $min_row = mysqli_fetch_assoc($min_result);
                $max_result = mysqli_query($con,$max_query);
                $max_row = mysqli_fetch_assoc($max_result);
                $analysis = "";
                $range = round(($max_row['MAX(Ex_showroom_price)']-$min_row['MIN(Ex_showroom_price)'])/10);
                $iter = 10;
                $count = 1;
                      for($i = 1; $i<$iter;$i++)
                      {   
                echo "<tr>";
                $lower = round(($i-1)*$range/100000)*100000;
                $upper = round($i*$range/100000)*100000;
                //echo "₹".($lower/100000)." lakh  - "; 
                //echo "₹".($upper/100000)." lakh"; 
                $budget_query = "Select COUNT(*) as carCount from Specs where Ex_showroom_price between ".$lower." and ".$upper.";";
                $budget_result = mysqli_query($con,$budget_query);
                      $budget_row = mysqli_fetch_assoc($budget_result);
                //echo " --->  ".$budget_row['carCount'];
                echo "<td>".$count."</td>";
                echo "<td>₹".($lower/100000)." lakh - ₹".($upper/100000)." lakh</td>";
                echo "<td>".$budget_row['carCount']."</td>";
                      echo "</tr>";
                $count++;
                } 
                echo "</table></div></div></div></div>";
          ?>
    </section>


    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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