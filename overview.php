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

<!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
              <?php 
                  $popular_query = "Select Make, Model, Variant, sum(Total), year from sales where Year in (select max(year) from sales) group by Make order by sum(Total) desc;";
                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Make']." ".$row['Model']." ".$row['Variant'];
                  
                ?>


                <div class="card-body">
                  <h5 class="card-title">Most Popular Car <span>| <?php echo $row['year']; ?></span></h5>

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
                  $popular_query = "Select distinct(Demography.Year), Specs.Body_Type, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Body_Type;";
                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Body_Type'];
                  
                ?>
                <div class="card-body">
                  <h5 class="card-title">Popular Car Body Type <span>| <?php echo $row['Year']; ?></span></h5>

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

<!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
              <?php 
                  $popular_query = "Select distinct(Demography.Year), Specs.Fuel_Type, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Fuel_Type order by Specs.Fuel_Type desc;";
                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Fuel_Type'];
                  
                ?>


                <div class="card-body">
                  <h5 class="card-title">Popular Car Fuel Type<span> | <?php echo $row['Year']; ?></span></h5>

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
            </div><!-- End Most popular car card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

              <?php 
                  $popular_query = "Select Specs.Transmission, sum(Total), year from Sales,Specs where Year in (select max(year) from sales) group by Specs.Transmission order by sum(Total) desc;";
                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Transmission'];
                  
                ?>
                <div class="card-body">
                  <h5 class="card-title">Top Transmission Type <span>| <?php echo $row['year']; ?></span></h5>

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
            </div><!-- End Sales Card -->            


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
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                 <?php 
                  $top_query = "Select Sales.Make, Sales.Model, Sales.Variant, Specs.Ex_showroom_price, Year from Sales, Specs where Year in (select max(Year) from sales) and Sales.Make = Specs.Make and Sales.Model = Specs.Model and Sales.Variant = Specs.Variant group by Sales.Make order by sum(Sales.Total) desc;";
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
            </div><!-- End Top 5 Selling Cars  -->

          <!-- Car Body Type - Pie Chart -->
          
    <!--div class="col-lg-6">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Transmission Type <span>| 2021</span></h5>

              <div id="pieChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
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
                      data: [
                        <?php 
                        /*$tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        $query = "Select distinct(Demography.Year), Specs.Transmission, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Transmission;";
                        $result = mysqli_query($con,$query);
                        $data = "";
                        while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} */?>                        
                        {
                          value: <?php// echo $row['Total']; ?>,
                          name: '<?php //echo $row['Transmission']; ?>'
                        }
                        <?php //$tbl_count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div--><!-- Car Body Type - End Pie Chart -->
              <!--/div>

              <div class="col-lg-6">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Fuel Type <span>| 2021</span></h5>

              <div id="piChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#piChart")).setOption({
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
                      data: [
                        <?php 
                        /*$tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        $query = "Select distinct(Demography.Year), Specs.Fuel_Type, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Fuel_Type;";
                        $result = mysqli_query($con,$query);
                        $data = "";
                        while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} */ ?>                        
                        {
                          value: <?php //echo $row['Total']; ?>,
                          name: '<?php //echo $row['Fuel_Type']; ?>'
                        }
                        <?php //$tbl_count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div--><!-- Car Body Type - End Pie Chart -->
              <!--/div-->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Car Body Type - Pie Chart -->
          <!--div class="card">


            <div class="card-body pb-0">
              <h5 class="card-title">Car Body Type <span>| 2021</span></h5>

              <div id="bodyChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#bodyChart")).setOption({
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
                      data: [
                        <?php 
                        /*$tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        $query = "Select distinct(Demography.Year), Specs.Body_Type, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Body_Type;";
                        $result = mysqli_query($con,$query);
                        $data = "";
                        while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";}*/ ?>                        
                        {
                          value: <?php //echo $row['Total']; ?>,
                          name: '<?php //echo $row['Body_Type']; ?>'
                        }
                        <?php //$tbl_count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div--><!-- Car Body Type - End Pie Chart -->        


          <!-- News & Updates Traffic -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="https://www.lhpes.com/blog/how-does-big-data-impact-automotive-industry" rel="nofollow">How Does Big Data Impact the Automotive Industry? </a></h4>
                  <p>In general, data is collected in a number of different ways. Again, keeping the automotive industry in focus...</p>
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
    </section>


    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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