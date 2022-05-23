<?php 
require('./admin/auth.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <title>Demography - Age</title>
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
    <h1>Demography - Age</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Analytics</li>
          <li class="breadcrumb-item active">Age</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<!---cdb code begin-->
<h1 align="center">Age-wise Sales</h1>
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
<br>
    <?php
$count=1;
$sel_query = "Select * from demography";
$query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant";// group by Specs.Fuel_type"; 
//echo $query;

$where = "";
$andwhere = "";
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
   $query .= " and Demography.Year = '".$_POST['year']."'";
   $where =  " where Year = '".$_POST['year']."'";
   $andwhere = " and Year = '".$_POST['year']."'";
   }
}
/*else if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])>0 && strlen($_POST['to_year'])<=0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year >= '".$_POST['year']."'";
   }
   else
   {
   $sel_query .= " and Year >= '".$_POST['year']."'";
   }
   $query .= " and Demography.Year = ".$_POST['year'];
   }
}
else if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])<=0 && strlen($_POST['to_year'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year <= '".$_POST['year']."'";
   }
   else
   {
   $sel_query .= " and Year <= '".$_POST['year']."'";
   }
   $query .= " and Demography.Year = ".$_POST['year'];
   }
}*/
/*else if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])<=0 && strlen($_POST['to_year'])<=0)
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
else
{
   if(strlen($_POST['from_year'])>0 && strlen($_POST['to_year'])>0)
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
}*/

$sel_query .= ";";
$query .=  " group by Specs.Fuel_type;";
//echo $sel_query;
//echo $query; 
$tbl_count=0;
?>
<!---cdb code end-->

    <section class="section">
    <div class="row">

    <div class="col-lg-8">
      
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Age-wise Annual Sales</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      <?php 
                      $line_query = "Select Year, Sum(Age_Young), Sum(Age_Middle), Sum(Age_Senior) from demography".$where." group by Year;";
                      $line_result = mysqli_query($con,$line_query);
                      $year = "";
                      $young = "";
                      $middle = "";
                      $senior = "";
                      $count = 0;
                      while($row = mysqli_fetch_assoc($line_result)) 
                      {
                        if($count>0)
                        {
                          $year .= ", '".$row['Year']."'";
                          $young .= ", '".$row['Sum(Age_Young)']."'";
                          $middle .= ", '".$row['Sum(Age_Middle)']."'";
                          $senior .= ", '".$row['Sum(Age_Senior)']."'";
                        }
                        else
                        {
                          $year .= "'".$row['Year']."'";
                          $young .= "'".$row['Sum(Age_Young)']."'";
                          $middle .= "'".$row['Sum(Age_Middle)']."'";
                          $senior .= "'".$row['Sum(Age_Senior)']."'";
                        }
                        $count++;
                      }
                      ?>
                      labels: [<?php echo $year; ?>],
                      datasets: [{
                        label: 'Young',
                        data: [<?php echo $young; ?>],
                        fill: false,
                        borderColor: 'rgb(84, 112, 198)',
                        tension: 0.1
                      }, {
                        label: 'Middle',
                        data: [<?php echo $middle; ?>],
                        fill: false,
                        borderColor: 'rgb(145, 204, 117)',
                        tension: 0.1
                      }, {
                        label: 'Senior',
                        data: [<?php echo $senior; ?>],
                        fill: false,
                        borderColor: 'rgb(250, 200, 88)',
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
    <div class="col-lg-4">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Age-wise Market Share</h5>

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
                        $breakup_query = "Select Sum(Age_Young), Sum(Age_Middle), Sum(Age_Senior) from demography".$where.";";
                        $breakup_result = mysqli_query($con,$breakup_query);
			$row = mysqli_fetch_assoc($breakup_result);
                        $data = "";
                        ?>                        
                        {
                          value: <?php echo $row['Sum(Age_Young)']; ?>,
                          name: 'Young'
                        },
			{
			  value: <?php echo $row['Sum(Age_Middle)']; ?>,
                          name: 'Middle'
			},
			{
                          value: <?php echo $row['Sum(Age_Senior)']; ?>,
                          name: 'Senior'
                        }
                      ]
                    }]
                  });
                });
              </script>
            </div>
          </div><!-- Car Body Type - End Pie Chart -->
              </div>
        </div>









<div class="row">
<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Fuel Type Preferences by Age</h5>

      <!-- Stacked Bar Chart -->
<canvas id="fuelChart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(fuelChart, {
   type: 'bar',
   data: {
      labels: ['Young','Middle','Senior'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $query = "Select Specs.Fuel_Type, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Fuel_Type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Fuel_Type;"; 
          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];//['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
          $result = mysqli_query($con,$query);
          $data = "";
          $north = 0;
          $south = 0;
          $east = 0;
          $west = 0;
          while($row = mysqli_fetch_assoc($result)) { 
           
            if($tbl_count>0) {echo ",";} ?>
          {
            label: '<?php echo $row["Fuel_Type"]; ?>',
            data: [<?php echo $row["sum(Age_Young)"].", ".$row["sum(Age_Middle)"].", ".$row["sum(Age_Senior)"]; ?>],
            backgroundColor: '<?php echo $colors[$tbl_count]; ?>'
          }<?php $tbl_count++; 
          } ?>
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
        <!--div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Fuel Type Preferences by Age</h5-->

      <!-- Stacked Bar Chart -->
<!--canvas id="stackedchart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(stackedchart, {
   type: 'bar',
   data: {
      labels: ['Young', 'Middle', 'Senior'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];
          $stacked_query = "Select Specs.Transmission, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Transmission from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Transmission;";
          $result = mysqli_query($con,$query);
          $data = "";
          while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>
          {
            label: '<?php echo $row["Transmission"]; ?>',
            data: [<?php echo $row["sum(Age_Young)"].", ".$row["sum(Age_Middle)"].", ".$row["sum(Age_Senior)"]; ?>],
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

</script-->
      <!-- End Stacked Bar Chart -->
    <!--/div>
  </div>
</div-->
<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Transmission Type Preferences by Age</h5>

      <!-- Stacked Bar Chart -->
<canvas id="transmissionChart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(transmissionChart, {
   type: 'bar',
   data: {
      labels: ['Young','Middle','Senior'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $query = "Select Specs.Transmission, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Transmission from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Transmission;"; 
          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];//['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
          $result = mysqli_query($con,$query);
          $data = "";
          $north = 0;
          $south = 0;
          $east = 0;
          $west = 0;
          while($row = mysqli_fetch_assoc($result)) { 
           
            if($tbl_count>0) {echo ",";} ?>
          {
            label: '<?php echo $row["Transmission"]; ?>',
            data: [<?php echo $row["sum(Age_Young)"].", ".$row["sum(Age_Middle)"].", ".$row["sum(Age_Senior)"]; ?>],
            backgroundColor: '<?php echo $colors[$tbl_count]; ?>'
          }<?php $tbl_count++; 
          } ?>
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
          <!-- Market Share by Fuel Type -->
<!--div class="col-lg-6">
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Market Share of Fuel Type<span>| Percentage</span></h5>

              <div id="fuelTypeChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#fuelTypeChart")).setOption({
                    legend: {
                      data: ['Petrol', 'Diesel', 'Electric', 'Hybrid']
                    },
                    radar: {
                       shape: 'circle',
                      indicator: [{
                          name: 'East',
                          max: 50
                        },
                        {
                          name: 'West',
                          max: 50
                        },
                        {
                          name: 'North',
                          max: 50
                        },
                        {
                          name: 'South',
                          max: 50
                        }
                      ]
                    },
		    tooltip: {},
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [10, 20, 30, 40],
                          name: 'Petrol'
                        },
                        {
                          value: [20, 10, 40, 30],
                          name: 'Diesel'
                        },
                        {
                          value: [40, 30, 20, 10],
                          name: 'Electric'
                        },
                        {
                          value: [30, 40, 10, 20],
                          name: 'Hybrid'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div--><!-- End Market Share by Fuel Type --> 
</div>

<div class="row"> 
          <!-- Market Share by Body Type -->
<div class="col-lg-6">
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Market Share of Body Type <span>| Percentage</span></h5>

              <div id="bodyTypeChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#bodyTypeChart")).setOption({
                    legend: {
                      data: ['Hatchback', 'MUV', 'Sedan', 'SUV']
                    },
                    radar: {
                       shape: 'circle',
                      indicator: [{
                          name: 'Young',
                          max: 50
                        },
                        {
                          name: 'Middle',
                          max: 50
                        },
                        {
                          name: 'Senior',
                          max: 50
                        }
                      ]
                    },
		    tooltip: {},
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [<?php 
			$count = 0;
			$sum = 0;
          		$query = "Select Specs.Body_Type, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Body_Type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Body_Type;"; 
			$result = mysqli_query($con,$query);
			while($row = mysqli_fetch_assoc($result))
			{
			    $sum = $row['sum(Age_Young)'] + $row['sum(Age_Middle)'] + $row['sum(Age_Senior)'];
			    $young = round($row['sum(Age_Young)']*100/$sum);
			    $middle = round($row['sum(Age_Middle)']*100/$sum);
			    $old = 100-($young+$middle);
			    if($count>0) echo ", ";
			?>
			{
                          value: [<?php echo $young.", ".$middle.", ".$old; ?>],
                          name: '<?php echo $row['Body_Type']; ?>'
                        }<?php $count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div><!-- End Market Share by Body Type -->        
<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Car Body Type Preferences by Age</h5>

      <!-- Stacked Bar Chart -->
<canvas id="bodychart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(bodychart, {
   type: 'bar',
   data: {
      labels: ['Young','Middle','Senior'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $query = "Select Specs.Body_Type, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Body_Type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Body_Type;"; 
          $colors = ['#5470C6','#91CC75','#FAC858','#EE6666'];//['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
          $result = mysqli_query($con,$query);
          $data = "";
          $north = 0;
          $south = 0;
          $east = 0;
          $west = 0;
          while($row = mysqli_fetch_assoc($result)) { 
           
            if($tbl_count>0) {echo ",";} ?>
          {
            label: '<?php echo $row["Body_Type"]; ?>',
            data: [<?php echo $row["sum(Age_Young)"].", ".$row["sum(Age_Middle)"].", ".$row["sum(Age_Senior)"]; ?>],
            backgroundColor: '<?php echo $colors[$tbl_count]; ?>'
          }<?php $tbl_count++; 
          } ?>
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


<!--div class="row"-->        
   

          <!-- Market Share by Transmission Type -->
<!--div class="col-lg-6">
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Market Share of Transmission Type<span>| Percentage</span></h5>

              <div id="transmissionTypeChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#transmissionTypeChart")).setOption({
                    legend: {
                      data: ['Automatic', 'DCT', 'Manual']
                    },
                    radar: {
                       shape: 'circle',
                      indicator: [{
                          name: 'East',
                          max: 50
                        },
                        {
                          name: 'West',
                          max: 50
                        },
                        {
                          name: 'North',
                          max: 50
                        },
                        {
                          name: 'South',
                          max: 50
                        }
                      ]
                    },
		    tooltip: {},
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [10, 20, 30, 40],
                          name: 'Automatic'
                        },
                        {
                          value: [20, 10, 40, 30],
                          name: 'DCT'
                        },
                        {
                          value: [40, 30, 20, 10],
                          name: 'Manual'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div--><!-- End Market Share by Transmission Type --> 


<!--div class="row">
<div class="col-lg-4">
  <div class="card">

  <div class="card-body">
              <h5 class="card-title">Transmission Type <span>| 2021</span></h5-->
  
      <!-- End Stacked Bar Chart -->
    <!--/div>
  </div>
</div-->

        
<!--div class="col-lg-8">
          <div class="card">
            <div class="card-body"-->

          <!-- Pie Chart -->

            <!--div class="card-body pb-0">
              <h5 class="card-title">Car Body Type popular among Males <span>| 2021</span></h5>

              <div id="bodyType" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#bodyType")).setOption({
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
                          /*$line_query = "Select Year, Sum(Region_East), Sum(Region_West), Sum(Region_North), Sum(Region_South) from demography group by Body_Type;";
                          $line_result = mysqli_query($con,$line_query);
                          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];
                          $year = "";
                          $east = "";
                          $west = "";
                          $north = "";
                          $south = "";
                          $count = 0;
                          while($row = mysqli_fetch_assoc($line_result)) */?>
                        {
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
          </div--><!-- End Pie Chart -->

            <!--/div>
          </div>
        </div>
              </div-->


              <!--div class="row">        
<div class="col-lg-8">
          <div class="card">
            <div class="card-body"-->

          <!-- Pie Chart -->

            <!--div class="card-body pb-0">
              <h5 class="card-title">Car Body Type popular among Females <span>| 2021</span></h5>

              <div id="femaleCarType" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#femaleCarType")).setOption({
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
                          /*$line_query = "Select Year, Sum(Region_East), Sum(Region_West), Sum(Region_North), Sum(Region_South) from demography group by Body_Type;";
                          $line_result = mysqli_query($con,$line_query);
                          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];
                          $year = "";
                          $east = "";
                          $west = "";
                          $north = "";
                          $south = "";
                          $count = 0;
                          while($row = mysqli_fetch_assoc($line_result)) */?>
                        {
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
          </div--><!-- End Pie Chart -->

            <!--/div>
          </div>
        <div class="col-lg-4">
  <div class="card">

  <div class="card-body">
              <h5 class="card-title">Transmission Type <span>| 2021</span></h5>
  
      <!-- End Stacked Bar Chart -->
    </div>
  </div>
</div>
              </div>

    </section-->
    <?php //if (isset($_POST['make'])) { ?>
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
<th><strong>Young</strong></th>
<th><strong>Middle</strong></th>
<th><strong>Senior</strong></th>
<th><strong>Total</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query = "Select * from demography";
$query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant";// group by Specs.Fuel_type"; 
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
   $query .= " and Demography.Year = '".$_POST['year']."'";
   }
}
/*else if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])>0 && strlen($_POST['to_year'])<=0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year >= '".$_POST['year']."'";
   }
   else
   {
   $sel_query .= " and Year >= '".$_POST['year']."'";
   }
   $query .= " and Demography.Year = ".$_POST['year'];
   }
}*/
/*else if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])<=0 && strlen($_POST['to_year'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year <= '".$_POST['year']."'";
   }
   else
   {
   $sel_query .= " and Year <= '".$_POST['year']."'";
   }
   $query .= " and Demography.Year = ".$_POST['year'];
   }
}
else if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])<=0 && strlen($_POST['to_year'])<=0)
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
else
{
   if(strlen($_POST['from_year'])>0 && strlen($_POST['to_year'])>0)
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
}*/


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
<td><?php echo number_format($row["Age_Young"]); ?></td>
<td><?php echo number_format($row["Age_Middle"]); ?></td>
<td><?php echo number_format($row["Age_Senior"]); ?></td>
<td><?php echo number_format($row["Total"]); ?></td>


</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<?php //} ?>
   </div>
   </div>
   </div>
   </div>
   </section>
  </main><!-- End #main -->

  <?php //require('footer2.php'); ?>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CarDB</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by BootstrapMade
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