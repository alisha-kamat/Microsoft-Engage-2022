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
              <h5 class="card-title">Line Chart (Annual Age-wise Sales)</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      <?php 
                      $line_query = "Select Year, Sum(Age_Young), Sum(Age_Middle), Sum(Age_Senior) from demography group by Year;";
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
                        borderColor: 'rgb(145, 204, 117)',
                        tension: 0.1
                      }, {
                        label: 'Middle',
                        data: [<?php echo $middle; ?>],
                        fill: false,
                        borderColor: 'rgb(250, 200, 88)',
                        tension: 0.1
                      }, {
                        label: 'Senior',
                        data: [<?php echo $senior; ?>],
                        fill: false,
                        borderColor: 'rgb(238, 102, 102)',
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
        <div class="col-lg-8">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Fuel Type</h5>

      <!-- Stacked Bar Chart -->
<canvas id="stackedchart" width="450"></canvas>
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
          $stacked_query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Fuel_Type;";
          $result = mysqli_query($con,$query);
          $data = "";
          while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>
          {
            label: '<?php echo $row["Fuel_Type"]; ?>',
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

</script>
      <!-- End Stacked Bar Chart -->
    </div>
  </div>
</div>
<div class="col-lg-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Transmission Type <span>| 2021</span></h5>
        <?php  
          $result = mysqli_query($con,$query);
          $gender = "";
          $young=0;
          $middle=0;
          $senior=0;
          while($row = mysqli_fetch_assoc($result)) 
          {
            $young += $row["sum(Age_Young)"];
            $middle += $row["sum(Age_Middle)"];
            $senior += $row["sum(Age_Senior)"];
          }
          if($young > $senior && $young > $middle)
          {
            $gender = "Young";
            echo "Young is leading with a total sales of ".number_format($young).".<br>";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)) 
            {
              if(strcmp($row['Fuel_Type'],"Petrol")==0)
              {
                echo round($row['sum(Age_Young)']/$young*100)."% Petrol<br>";
              }
              if(strcmp($row['Fuel_Type'],"Diesel")==0)
              {
                echo round($row['sum(Age_Young)']/$young*100)."% Diesel<br>";
              }
              if(strcmp($row['Fuel_Type'],"Electric")==0)
              {
                echo round($row['sum(Age_Young)']/$young*100)."% Electric<br>";
              }
            }
          }
          else if($senior > $young && $senior > $middle)
          {
            echo "Senior is leading with a total sales of ".number_format($senior).".";

          }
          else
          {
            echo "Middle is leading with a total sales of ".number_format($middle).".<br>";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)) 
            {
              if(strcmp($row['Fuel_Type'],"Petrol")==0)
              {
                echo round($row['sum(Age_Middle)']/$middle*100)."% Petrol<br>";
              }
              if(strcmp($row['Fuel_Type'],"Diesel")==0)
              {
                echo round($row['sum(Age_Middle)']/$middle*100)."% Diesel<br>";
              }
              if(strcmp($row['Fuel_Type'],"Electric")==0)
              {
                echo round($row['sum(Age_Middle)']/$middle*100)."% Electric<br>";
              }
            }
          }
            ?>
   
      </div>
    </div>
  </div>
</div>

<div class="row"> 
<div class="col-lg-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Transmission Type <span>| 2021</span></h5>
       </div>
  </div>
</div>       
<div class="col-lg-8">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Car Body Type Preferences by Gender</h5>

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
          $query = "Select distinct(Demography.Year), Specs.Body_Type, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Body_Type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Body_Type;"; 
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


<div class="row">        
<div class="col-lg-8">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Transmission Type Preferences by Gender</h5>

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
          $query = "Select distinct(Demography.Year), Specs.Transmission, sum(Age_Young), sum(Age_Middle), sum(Age_Senior), Transmission from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Transmission;"; 
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

<div class="col-lg-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Transmission Type <span>| 2021</span></h5>
       
   
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-lg-4">
  <div class="card">

  <div class="card-body">
              <h5 class="card-title">Transmission Type <span>| 2021</span></h5>
  
      <!-- End Stacked Bar Chart -->
    </div>
  </div>
</div>

        
<div class="col-lg-8">
          <div class="card">
            <div class="card-body">

          <!-- Pie Chart -->

            <div class="card-body pb-0">
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
          </div><!-- End Pie Chart -->

            </div>
          </div>
        </div>
              </div>


              <div class="row">        
<div class="col-lg-8">
          <div class="card">
            <div class="card-body">

          <!-- Pie Chart -->

            <div class="card-body pb-0">
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
          </div><!-- End Pie Chart -->

            </div>
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
<td><?php echo number_format($row["Age_Young"]); ?></td>
<td><?php echo number_format($row["Age_Middle"]); ?></td>
<td><?php echo number_format($row["Age_Senior"]); ?></td>
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