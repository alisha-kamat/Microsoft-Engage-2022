<?php 
require('./admin/auth.php'); 
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
<h1 align="center">Gender-wise Sales</h1>
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
              <h5 class="card-title">Line Chart (Annual Gender-wise Sales)</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      <?php 
                      $line_query = "Select Year, Sum(Gender_Male), Sum(Gender_Female), Sum(Gender_Other) from demography group by Year;";
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
                        borderColor: 'rgb(145, 204, 117)',
                        tension: 0.1
                      }, {
                        label: 'Female',
                        data: [<?php echo $female; ?>],
                        fill: false,
                        borderColor: 'rgb(250, 200, 88)',
                        tension: 0.1
                      }, {
                        label: 'Other',
                        data: [<?php echo $other; ?>],
                        fill: false,
                        borderColor: 'rgb(238, 102, 102)',
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
  
        <div class="row"> 
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
      labels: ['Male', 'Female', 'Other'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [           
        <?php 
          $tbl_count = 0;
          $colors = ['#5470C6','#FAC858','#EE6666','#91CC75'];
          $stacked_query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Gender_Male), sum(Gender_Female), sum(Gender_Other), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Fuel_Type;";
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
      <h5 class="card-title">Analysis<span> | From Graph</span></h5>
        <?php  
          $result = mysqli_query($con,$query);
          $gender = "";
          $male=0;$female=0;$other=0;
          while($row = mysqli_fetch_assoc($result)) 
          {
            $male += $row["sum(Gender_Male)"];
            $female += $row["sum(Gender_Female)"];
            $other += $row["sum(Gender_Other)"];
          }
          if($male > $female && $male > $other)
          {
            $gender = "Male";
            echo "<b>Male</b> is leading with a total sales of ".number_format($male).".<br>";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)) 
            {
              if(strcmp($row['Fuel_Type'],"Petrol")==0)
              {
                echo round($row['sum(Gender_Male)']/$male*100)."% Petrol<br>";
              }
              if(strcmp($row['Fuel_Type'],"Diesel")==0)
              {
                echo round($row['sum(Gender_Male)']/$male*100)."% Diesel<br>";
              }
              if(strcmp($row['Fuel_Type'],"Electric")==0)
              {
                echo round($row['sum(Gender_Male)']/$male*100)."% Electric<br>";
              }
            }
          }
          else if($female > $male && $female > $other)
          {
            echo "Female is leading with a total sales of ".number_format($female).".";
          }
          else
          {
            echo "Other is leading with a total sales of ".number_format($other).".";
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
              <h5 class="card-title">Analysis<span> | From Graph</span></h5>
		<?php
			$pie_query = "Select Year, Sum(demography.Gender_Male), specs.Body_Type from demography,specs where Year = 2021 and demography.Variant = specs.Variant group by specs.Body_Type;";
                          $pie_result = mysqli_query($con,$pie_query);
                          $row = mysqli_fetch_assoc($pie_result);
		?>
  		<span><b><?php echo $row['Body_Type'];?></b></span> is leading among Males with a total sales of ₹<?php echo number_format($row['Sum(demography.Gender_Male)']);?><br><br>
This contributes to more than <span><b><?php echo round($row['Sum(demography.Gender_Male)']/$male)*100;?></b></span> % of the total sales among this gender.
<br><br>
<b>Hatchback</b> is leading among Males with a total sales of ₹916,293<br><br>

This contributes to more than <b>80 %</b> of the total sales among this gender.
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
                          $pie_query = "Select Year, Sum(demography.Gender_Male), specs.Body_Type from demography,specs where Year = 2021 and demography.Variant = specs.Variant group by specs.Body_Type;";
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
			  $type = "";$sales="";
                          $pie_query = "Select Year, Sum(demography.Gender_Female), specs.Body_Type from demography,specs where Year = 2021 and demography.Variant = specs.Variant group by specs.Body_Type order by Sum(demography.Gender_Female) asc;";
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
          </div><!-- End Pie Chart -->

            </div>
          </div>
        <div class="col-lg-4">
  <div class="card">

  <div class="card-body">
              <h5 class="card-title">Analysis<span> | From Graph</span></h5>
  		<span><b><?php echo $type;?></b></span> is leading among Females with a total sales of ₹<?php echo number_format($sales);?>.
<br><br>
This contributes to more than <span><b><?php echo round($sales/$female)*100;?></b></span> % of the total sales among this gender.
<br><br>
<b>Hatchback</b> is leading among Males with a total sales of ₹916,293<br><br>

This contributes to more than <b>80 %</b> of the total sales among this gender.
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
<td><?php echo number_format($row["Gender_Male"]); ?></td>
<td><?php echo number_format($row["Gender_Female"]); ?></td>
<td><?php echo number_format($row["Gender_Other"]); ?></td>
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


</html>
  <?php require('footer2.php'); ?>