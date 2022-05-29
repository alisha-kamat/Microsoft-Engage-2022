<?php 
require('auth.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
 

  <title>Demography - Gender</title>
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
    <h1>Demography - Gender</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Analytics</li>
          <li class="breadcrumb-item active">Gender</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<!---cdb code begin-->
<h1 align="center"><i class="bi bi-gender-trans"></i> Gender-wise Sales</h1>
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
        <br><input type="submit" value="Search"><br>
    </form>
    </center><br>
    </div>
    <?php
$count=1;
$sel_query = "Select * from demography";
$query = "Select Specs.Fuel_Type, sum(Gender_Male), sum(Gender_Female), sum(Gender_Other), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant";// group by Specs.Fuel_type"; 
//echo $query;

$analysis = "";
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
   $analysis = "<center><h4>Analytics for ";
   $analysis .= $_POST['make']." for ";
   $where = " where Make = '".$_POST['make']."'";
   $andwhere .= " and Specs.Make = '".$_POST['make']."'";
   }
   else
   {
   $analysis = "<center><h4>Analytics for all Makes for ";
   }
}
else
{
$analysis = "<center><h4>Analytics for all Makes across all years</h4></center>";
echo $analysis;
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
   if(strlen($where)>0)
   $where .= " and Year = '".$_POST['year']."'";
   else
   $where = " where Year = '".$_POST['year']."'";
   $andwhere = " and Year = '".$_POST['year']."'";
   $analysis .= $_POST['year']."</h4></center>";
   }
   else
   {
   $analysis .= "all Years</h4></center>";
   }
   echo $analysis;

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
              <h5 class="card-title">Gender-wise Annual Sales</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      <?php 
                      $line_query = "Select Year, Sum(Gender_Male), Sum(Gender_Female), Sum(Gender_Other) from demography".$where." group by Year;";
                      $line_result = mysqli_query($con,$line_query);
                      $year = "";
                      $male = "";
                      $female = "";
                      $other = "";
                      $count = 0;
                      while($row = mysqli_fetch_assoc($line_result)) 
                      {
                        if($count>0)
                        {
                          $year .= ", '".$row['Year']."'";
                          $male .= ", '".$row['Sum(Gender_Male)']."'";
                          $female .= ", '".$row['Sum(Gender_Female)']."'";
                          $other .= ", '".$row['Sum(Gender_Other)']."'";
                        }
                        else
                        {
                          $year .= "'".$row['Year']."'";
                          $male .= "'".$row['Sum(Gender_Male)']."'";
                          $female .= "'".$row['Sum(Gender_Female)']."'";
                          $other .= "'".$row['Sum(Gender_Other)']."'";
                        }
                        $count++;
                      }
                      ?>
                      labels: [<?php echo $year; ?>],
                      datasets: [{
                        label: 'Male',
                        data: [<?php echo $male; ?>],
                        fill: false,
                        borderColor: 'rgb(84, 112, 198)',
                        tension: 0.1
                      }, {
                        label: 'Female',
                        data: [<?php echo $female; ?>],
                        fill: false,
                        borderColor: 'rgb(145, 204, 117)',
                        tension: 0.1
                      }, {
                        label: 'Other',
                        data: [<?php echo $other; ?>],
                        fill: false,
                        borderColor: 'rgb(250, 200, 88)',
                        tension: 0.1
                      },  ]
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
              <h5 class="card-title">Gender-wise Market Share</h5>

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
                        $breakup_query = "Select Sum(Gender_Male), Sum(Gender_Female), Sum(Gender_Other) from demography".$where.";";
                        $breakup_result = mysqli_query($con,$breakup_query);
			$row = mysqli_fetch_assoc($breakup_result);
                        $data = "";
                        ?>                        
                        {
                          value: <?php echo $row['Sum(Gender_Male)']; ?>,
                          name: 'Male'
                        },
			{
			  value: <?php echo $row['Sum(Gender_Female)']; ?>,
                          name: 'Female'
			},
			{
                          value: <?php echo $row['Sum(Gender_Other)']; ?>,
                          name: 'Other'
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
      <h5 class="card-title">Fuel Type Preferences by Gender</h5>

      <!-- Stacked Bar Chart -->
<canvas id="stackedchart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(stackedchart, {
   type: 'bar',
   data: {
      labels: ['Male', 'Female', 'Other'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];
          $stacked_query = "Select Specs.Fuel_Type, sum(Gender_Male), sum(Gender_Female), sum(Gender_Other), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Fuel_Type;";
          $result = mysqli_query($con,$query);
          $data = "";
          while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>
          {
            label: '<?php echo $row["Fuel_Type"]; ?>',
            data: [<?php echo $row["sum(Gender_Male)"].", ".$row["sum(Gender_Female)"].", ".$row["sum(Gender_Other)"]; ?>],
            backgroundColor: '<?php echo $colors[$tbl_count]; ?>'
          }<?php $tbl_count++; } ?>
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
                      data: [{
                          value: [10, 20, 30, 40],
                          name: 'Hatchback'
                        },
                        {
                          value: [20, 10, 40, 30],
                          name: 'SUV'
                        },
                        {
                          value: [40, 30, 20, 10],
                          name: 'Sedan'
                        },
                        {
                          value: [30, 40, 10, 20],
                          name: 'MUV'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div--><!-- End Market Share by Body Type -->      
<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Car Body Type Preferences by Gender</h5>

      <!-- Stacked Bar Chart -->
<canvas id="bodychart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(bodychart, {
   type: 'bar',
   data: {
      labels: ['Male','Female','Other'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $query = "Select Specs.Body_Type, sum(Gender_Male), sum(Gender_Female), sum(Gender_Other), Body_Type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Body_Type;"; 
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
            data: [<?php echo $row["sum(Gender_Male)"].", ".$row["sum(Gender_Female)"].", ".$row["sum(Gender_Other)"]; ?>],
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


<div class="row">        
<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Transmission Type Preferences by Gender</h5>

      <!-- Stacked Bar Chart -->
<canvas id="transmissionChart" width="450"></canvas>
<script>
var stackedbarchart = new Chart(transmissionChart, {
   type: 'bar',
   data: {
      labels: ['Male','Female','Other'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $query = "Select Specs.Transmission, sum(Gender_Male), sum(Gender_Female), sum(Gender_Other), Transmission from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Transmission;"; 
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
            data: [<?php echo $row["sum(Gender_Male)"].", ".$row["sum(Gender_Female)"].", ".$row["sum(Gender_Other)"]; ?>],
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

          <!-- Market Share by Transmission Type -->
<div class="col-lg-6">
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
                          name: 'Male',
                          max: 60
                        },
                        {
                          name: 'Female',
                          max: 50
                        },
                        {
                          name: 'Other',
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
          		$query = "Select Specs.Transmission, sum(Gender_Male), sum(Gender_Female), sum(Gender_Other), Transmission from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant".$andwhere." group by Specs.Transmission;"; 
			$result = mysqli_query($con,$query);
			while($row = mysqli_fetch_assoc($result))
			{
			    $sum = $row['sum(Gender_Male)'] + $row['sum(Gender_Female)'] + $row['sum(Gender_Other)'];
			    $male = round($row['sum(Gender_Male)']*100/$sum);
			    $female = round($row['sum(Gender_Female)']*100/$sum);
			    $other = 100-($male+$female);
			    if($count>0) echo ", ";
			?>
			{
                          value: [<?php echo $male.", ".$female.", ".$other; ?>],
                          name: '<?php echo $row['Transmission']; ?>'
                        }<?php $count++;} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div></div>
          </div><!-- End Market Share by Transmission Type --> 

</div>


        
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
                          $pie_query = "Select Sum(demography.Gender_Male), specs.Body_Type from demography,specs where Year = 2021 and demography.Variant = specs.Variant group by specs.Body_Type;";
                          $pie_result = mysqli_query($con,$pie_query);
                          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];
                          $count = 0;
                          while($row = mysqli_fetch_assoc($pie_result)) { if($count>0) echo ",";?>
                        {
                          value: '<?php echo $row['Sum(demography.Gender_Male)'];?>',
                          name: '<?php echo $row['Body_Type'];?>'
                        }<?php $count++;} ?>
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
              </div>


              <div class="row">        
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
			  $type = "";$sales="";
                          $pie_query = "Select Sum(demography.Gender_Female), specs.Body_Type from demography,specs where Year = 2021 and demography.Variant = specs.Variant group by specs.Body_Type order by Sum(demography.Gender_Female) asc;";
                          $pie_result = mysqli_query($con,$pie_query);
                          $colors = ['#FAC858','#91CC75','#5470C6','#EE6666'];
                          $count = 0;
                          while($row = mysqli_fetch_assoc($pie_result)) { if($count>0) echo ",";?>
                        {
                          value: '<?php echo $row['Sum(demography.Gender_Female)'];?>',
                          name: '<?php echo $row['Body_Type'];?>'
                        }<?php $count++; 
			      $type=$row['Body_Type'];
			      $sales=$row['Sum(demography.Gender_Female)'];
				} ?>
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div--><!-- End Pie Chart -->

            <!--/div-->
          </div>
 
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
<th><strong>Male</strong></th>
<th><strong>Female</strong></th>
<th><strong>Other</strong></th>
<th><strong>Total</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query = "Select * from demography";
$query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Gender_Male), sum(Gender_Female), sum(Gender_Other), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant";// group by Specs.Fuel_type"; 
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
<td><?php echo number_format($row["Gender_Male"]); ?></td>
<td><?php echo number_format($row["Gender_Female"]); ?></td>
<td><?php echo number_format($row["Gender_Other"]); ?></td>
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


</html>
  <?php //require('footer2.php'); ?>
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