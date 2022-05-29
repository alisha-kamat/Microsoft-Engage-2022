<?php 
  require('auth.php'); 
  require('./admin/db.php'); 
//require('header2'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Analytics Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/cardb-logo.svg" rel="icon">
  <!--link href="assets/img/cardb-logo.svg" rel="apple-touch-icon"-->

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

</head>

<body>



      <?php require('./menu.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <?php 
		              $maxyear_query = "select max(year) as MaxYear from sales;";
                  $maxyear_result = mysqli_query($con,$maxyear_query);
                  $maxyear_row = mysqli_fetch_assoc($maxyear_result);
                  $maxyear  = $maxyear_row['MaxYear'];
                  $sales = "Select sum(total) as sales, year from sales where year =" . $maxyear . ";";
                  $sales_result = mysqli_query($con,$sales);
                  $year = "";
                  $row = mysqli_fetch_assoc($sales_result);
                  $total_sales  = $row['sales'];
                  $old_sales = "Select sum(Total), year from sales where Year !=" . $maxyear . " group by Year order by Year desc;";
                  $old_result = mysqli_query($con,$old_sales);
                  $row2 = mysqli_fetch_assoc($old_result);
                  $sales_percent = (($row['sales']-$row2['sum(Total)'])/$row2['sum(Total)'])*100;
                ?>
                <div class="card-body">
                  <h5 class="card-title">Annual Car Sales <span>| <?php echo $maxyear; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-bar-graph"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo number_format($total_sales); ?></h6>
                      <?php 
                      if($sales_percent > 0)
                      { 
                        ?>
                        <span class="text-success small pt-1 fw-bold"><?php echo (int)$sales_percent; ?>%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                        <?php
                      } 
                      else
                      {
                        ?>
                        <span class="text-danger small pt-1 fw-bold"><?php echo (int)$sales_percent*-1; ?>%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Popular company Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
              <?php 
                  //$popular_query = "Select Make, Model, Variant, SUM(Total), year from sales where Year =" . $maxyear . " GROUP BY Make ORDER BY SUM(Total) DESC;";
		              $popular_query = "Select Make, Model, Variant, Total from sales where Year=" . $maxyear . " order by Total desc;";
                  $popular_result = mysqli_query($con,$popular_query);
                  $row = mysqli_fetch_assoc($popular_result);
                  $popular  = $row['Make'];//." ".$row['Model']." ".$row['Variant'];
                  
                ?>


                <div class="card-body">
                  <h5 class="card-title">Most Popular Company <span>| <?php echo $maxyear; ?></span></h5>

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

            <!--  Revenue Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

              <?php 
                  $revenue_query = "Select sum(sales.total*specs.Ex_showroom_price) as revenue, year from sales, specs where sales.year =" . $maxyear . " and sales.Make = specs.Make and sales.Model = specs.Model and sales.Variant = specs.Variant;";
                  $revenue_result = mysqli_query($con,$revenue_query);
                  $row = mysqli_fetch_assoc($revenue_result);
                  $total_revenue  = $row['revenue'];
                  $old_revenue = "Select sum(sales.total*specs.Ex_showroom_price) as revenue, year from sales, specs where sales.year !=" . $maxyear . "  and sales.Make = specs.Make and sales.Model = specs.Model and sales.Variant = specs.Variant group by Year order by Year desc;";
                  $old_result = mysqli_query($con,$old_revenue);
                  $old = mysqli_fetch_assoc($old_result);
                  $revenue_percent = (($row['revenue']-$old['revenue'])/$old['revenue'])*100;
                ?>


                <div class="card-body">
                  <h5 class="card-title">Car Industry Revenue <span>| <?php echo $maxyear; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="ps-3">
                      <h6> ₹ <?php echo number_format($total_revenue); ?></h6>
                      <?php 
                      if($revenue_percent > 0)
                      { 
                      ?>
                      <span class="text-success small pt-1 fw-bold"><?php echo (int)$revenue_percent; ?>%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                      <?php
                      } 
                      else
                      {
                      ?>
                      <span class="text-danger small pt-1 fw-bold"><?php echo (int)$revenue_percent*-1; ?>%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                      <?php
                      }
                      ?>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Revenue Card -->

            <!-- Top 5 -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Top 5 Performers <span>| <?php echo $row['year']; ?></span></h5>

                  <?php 
                  //$performers_query = "select *, sum(Total) from sales where Year =" . $maxyear . " group by Make order by sum(Total) desc;";
	
		              $performers_query = "Select Make, SUM(Jan) as Jan, SUM(Feb) as Feb, SUM(Mar) as Mar, SUM(Apr) as Apr, SUM(May) as May, SUM(Jun) as Jun, SUM(Jul) as Jul, SUM(Aug) as Aug, SUM(Sep) as Sep, SUM(Oct) as Oct, SUM(Nov) as Nov, SUM(Dcm) as Dcm, SUM(Total) from Sales where Year=" . $maxyear. " Group By Make Order by SUM(Total) DESC;";
                  $performers_result = mysqli_query($con,$performers_query);    
                  $count = 0;
                ?>


                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [
                          <?php
                            $count = 0;
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
                            } 
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
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->


            <!-- Top 5 Selling cars -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                 <?php 
                  //$top_query = "Select Sales.Make, sum(Sales.Total), Sum(Sales.Total*Specs.Ex_showroom_price) as revenue, Year from Sales, Specs where Year =" . $maxyear . " and Sales.Make = Specs.Make and Sales.Model = Specs.Model group by Sales.Make order by sum(Sales.Total) desc;";

		              $top_query = "Select Sales.Make as Make, SUM(Sales.Total) as Total, SUM(Sales.Total*Specs.Ex_showroom_price) as Revenue, Year from Sales INNER JOIN Specs ON Sales.Year =" . $maxyear . " and Sales.Make = Specs.Make and Sales.Model = Specs.Model GROUP BY Make ORDER BY SUM(Sales.Total) DESC;";
                  $result = mysqli_query($con,$top_query);
                  ?>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling Companies <span>| 2021</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <!--th scope="col">Price</th-->
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
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
                            <td><?php echo $row['Make']; ?></td>
                            <!--td>₹<?php //echo number_format($row['Ex_showroom_price']); ?></td-->
                            <td class="fw-bold"><?php echo number_format($row['Total']); ?></td>
                            <td>₹<?php echo number_format($row['Revenue']); ?></td>
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
          
    <div class="col-lg-6">
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
                      name: 'Distribution',
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
                        $tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        //$query = "Select distinct(Demography.Year), Specs.Transmission, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Transmission;";

			                  $query = "Select Specs.Transmission as Transmission, SUM(Demography.Total) as Total FROM Specs INNER JOIN Demography ON Demography.Year=" . $maxyear . " AND Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant GROUP BY Transmission ORDER BY Total ASC;";
                        $result = mysqli_query($con,$query);
                        $data = "";
                        while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>                        
                        {
                          value: <?php echo $row['Total']; ?>,
                          name: '<?php echo $row['Transmission']; ?>'
                        }
                        <?php $tbl_count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- Car Body Type - End Pie Chart -->
              </div>

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
                      name: 'Distribution',
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
                        $tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        //$query = "Select distinct(Demography.Year), Specs.Fuel_Type, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Fuel_Type;";

			                  $query = "Select Specs.Fuel_Type as Fuel_Type, SUM(Demography.Total) as Total FROM Specs INNER JOIN Demography ON Demography.Year=" . $maxyear . " AND Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant GROUP BY Fuel_Type ORDER BY Total ASC;";
                        $result = mysqli_query($con,$query);
                        $data = "";
                        while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>                        
                        {
                          value: <?php echo $row['Total']; ?>,
                          name: '<?php echo $row['Fuel_Type']; ?>'
                        }
                        <?php $tbl_count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- Car Body Type - End Pie Chart -->
          </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Car Body Type - Pie Chart -->
          <div class="card">


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
                      name: 'Distribution',
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
                        $tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        $query = "Select Specs.Body_Type as Body_Type, SUM(Demography.Total) as Total FROM Specs INNER JOIN Demography ON Demography.Year=" . $maxyear . " AND Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant GROUP BY Body_Type ORDER BY Total DESC;";
		                    $result = mysqli_query($con,$query);
                        $data = "";
                        while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>                        
                        {
                          value: <?php echo $row['Total']; ?>,
                          name: '<?php echo $row['Body_Type']; ?>'
                        }
                        <?php $tbl_count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- Car Body Type - End Pie Chart -->        


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

                <div class="post-item clearfix">
                  <img src="assets/img/news-5.jpg" alt="">
                  <h4><a href="https://www.forbes.com/sites/markminevich/2020/07/13/the-automotive-industry-and-the-data-driven-approach/" rel="nofollow">The Automotive Industry And The Data Driven Approach</a></h4>
                  <p>Leveraging data on millions of individual vehicle histories...</p>
                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->


        </div><!-- End Right side columns -->

      </div>
    </section>


    
  </main><!-- End #main -->


  <!--  Footer  -->
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