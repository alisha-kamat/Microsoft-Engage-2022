<?php 
require('./admin/auth.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <title>Demography - Region</title>
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
      <h1>Demography - Region</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Analytics</li>
          <li class="breadcrumb-item active">Region</li>
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
       <th>From Year</th>
       <th>To Year</th>
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
       <select name="from_year" id="from_year">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Year) from Demography;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Year"]; ?>"><?php echo $row["Year"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="to_year" id="to_year">
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
    </div><br>
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
if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])>0 && strlen($_POST['to_year'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year BETWEEN '".$_POST['from_year']."' AND '".$_POST['to_year']."'";
   }
   else
   {
   $sel_query .= " and Year = '".$_POST['year']."'";
   }
   $query .= " and Demography.Year BETWEEN '".$_POST['from_year']."' AND '".$_POST['to_year']."'";
   }
}
else if(isset($_POST['from_year'])) 
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
}
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
              <h5 class="card-title">Region-wise Annual Sales</h5>

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
                      $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];
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
                        borderColor: 'rgb(145, 204, 117)',
                        tension: 0.1
                      }, {
                        label: 'West',
                        data: [<?php echo $west; ?>],
                        fill: false,
                        borderColor: 'rgb(250, 200, 88)',
                        tension: 0.1
                      }, {
                        label: 'North',
                        data: [<?php echo $north; ?>],
                        fill: false,
                        borderColor: 'rgb(238, 102, 102)',
                        tension: 0.1
                      }, {
                        label: 'South',
                        data: [<?php echo $south; ?>],
                        fill: false,
                        borderColor: 'rgb(84, 112, 198)',
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
          <!-- Car Body Type - Pie Chart -->
          
    <div class="col-lg-4">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Region-wise Market Share</h5>

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
                        $breakup_query = "Select Year, Sum(Region_East), Sum(Region_West), Sum(Region_North), Sum(Region_South) from demography;";
                        $breakup_result = mysqli_query($con,$breakup_query);
			$row = mysqli_fetch_assoc($breakup_result);
                        $data = "";
                        ?>                        
                        {
                          value: <?php echo $row['Sum(Region_East)']; ?>,
                          name: 'East'
                        },
			{
			  value: <?php echo $row['Sum(Region_West)']; ?>,
                          name: 'West'
			},
			{
                          value: <?php echo $row['Sum(Region_North)']; ?>,
                          name: 'North'
                        },
			{
			  value: <?php echo $row['Sum(Region_South)']; ?>,
                          name: 'South'
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
      <h5 class="card-title">Fuel Type Preferences by Region</h5>

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
            data: [<?php echo $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"]; ?>],
            backgroundColor: '<?php echo $colors[$tbl_count]; ?>'
          }<?php $tbl_count++; 
          } ?>
        ]
   },
   options: {
      responsive: false,
      legend: {
         position: 'bottom' 
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
<div class="col-lg-6">
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
                          max: 40
                        },
                        {
                          name: 'West',
                          max: 40
                        },
                        {
                          name: 'North',
                          max: 40
                        },
                        {
                          name: 'South',
                          max: 40
                        }
                      ]
                    },
		    tooltip: {},
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [
			<?php 
			$count = 0;
			$sum = 0;
			$result = mysqli_query($con,$query);
			while($row = mysqli_fetch_assoc($result))
			{
			    $sum = $row['sum(Region_East)'] + $row['sum(Region_West)'] + $row['sum(Region_North)'] + $row['sum(Region_South)'];
			    $north = round($row['sum(Region_East)']*100/$sum);
			    $south = round($row['sum(Region_West)']*100/$sum);
			    $east = round($row['sum(Region_North)']*100/$sum);
			    $west = 100-($north+$south+$east);
			    if($count>0) echo ", ";
			?>
			{
                          value: [<?php echo $east.", ".$west.", ".$north.", ".$south; ?>],
                          name: '<?php echo $row['Fuel_type']; ?>'
                        }<?php $count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div><!-- End Market Share by Fuel Type --> 


          <!-- Market Share by Body Type -->
<!--div class="col-lg-6">
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
                      data: [<?php 
			/*$count = 0;
			$sum = 0;
          		$query = "Select distinct(Demography.Year), Specs.Body_Type, sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South), Body_Type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Body_Type;"; 
			$result = mysqli_query($con,$query);
			while($row = mysqli_fetch_assoc($result))
			{
			    $sum = $row['sum(Region_East)'] + $row['sum(Region_West)'] + $row['sum(Region_North)'] + $row['sum(Region_South)'];
			    $north = round($row['sum(Region_East)']*100/$sum);
			    $south = round($row['sum(Region_West)']*100/$sum);
			    $east = round($row['sum(Region_North)']*100/$sum);
			    $west = 100-($north+$south+$east);
			    if($count>0) echo ", ";*/
			?>
			{
                          value: [<?php //echo $east.", ".$west.", ".$north.", ".$south; ?>],
                          name: '<?php //echo $row['Body_Type']; ?>'
                        }<?php //$count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div--><!-- End Market Share by Body Type --> 
<div class="row">
<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Car Body Type Preferences by Region</h5>

      <!-- Stacked Bar Chart -->
<canvas id="bodychart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(bodychart, {
   type: 'bar',
   data: {
      labels: ['East', 'West', 'North', 'South'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $query = "Select distinct(Demography.Year), Specs.Body_Type, sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South), Body_Type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Body_Type;"; 
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
            data: [<?php echo $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"]; ?>],
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

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Transmission Type Preferences by Region</h5>

      <!-- Stacked Bar Chart -->
<canvas id="stackchart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(stackchart, {
   type: 'bar',
   data: {
      labels: ['East', 'West', 'North', 'South'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $query = "Select distinct(Demography.Year), Specs.Transmission, sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South), Transmission from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Transmission;"; 
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
            data: [<?php echo $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"]; ?>],
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
                      data: [<?php 
			/*$count = 0;
			$sum = 0;
          		$query = "Select distinct(Demography.Year), Specs.Transmission, sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South), Transmission from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Transmission;"; 
			$result = mysqli_query($con,$query);
			while($row = mysqli_fetch_assoc($result))
			{
			    $sum = $row['sum(Region_East)'] + $row['sum(Region_West)'] + $row['sum(Region_North)'] + $row['sum(Region_South)'];
			    $north = round($row['sum(Region_East)']*100/$sum);
			    $south = round($row['sum(Region_West)']*100/$sum);
			    $east = round($row['sum(Region_North)']*100/$sum);
			    $west = 100-($north+$south+$east);
			    if($count>0) echo ", ";*/
			?>
			{
                          value: [<?php //echo $east.", ".$west.", ".$north.", ".$south; ?>],
                          name: '<?php //echo $row['Transmission']; ?>'
                        }<?php //$count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div--><!-- End Market Share by Transmission Type --> 

<!--/div-->
             
    </section>
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
if(isset($_POST['from_year'])) 
{
   if(strlen($_POST['from_year'])>0 && strlen($_POST['to_year'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year BETWEEN '".$_POST['from_year']."' AND '".$_POST['to_year']."'";
   }
   else
   {
   $sel_query .= " and Year = '".$_POST['year']."'";
   }
   $query .= " and Demography.Year BETWEEN '".$_POST['from_year']."' AND '".$_POST['to_year']."'";
   }
}
else if(isset($_POST['from_year'])) 
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