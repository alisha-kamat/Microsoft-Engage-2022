<?php
require('./admin/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Sadi Gaddi</title>
    <?php include('header.php'); ?>
</head>
<body>
    <br><br>
    <h1 align="center">Industry Analytics Dashboard</h1>
    <p align=center>Overall</p>
    <!--Bar - company sales, Pie - fuel,region,transmission , Line - annual sales, Grid- monthly sales-->
      <?php
          $sel_query="Select * from sales where Make='Maruti Suzuki' and Model='Alto' and Variant='Std' and year=2021;";
  	  $result = mysqli_query($con,$sel_query);
          while($row = mysqli_fetch_assoc($result)) {
          $data = $row["Jan"].", ".$row["Feb"].", ".$row["Mar"].", ".$row["Apr"].", ".$row["May"].", ".$row["Jun"].", ".$row["Jul"].", ".$row["Aug"].", ".$row["Sep"].", ".$row["Oct"].", ".$row["Nov"].", ".$row["Dcm"];
          }
      ?>
    <div align="center">
    <div style="position: relative; height:20vh; width:40vw; padding: 0px 0px 50px 0px;">
  <canvas id="myChart"></canvas>
 
</div>
<script src="chart.js"></script>
<script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
  ];


  const data = {
    labels: labels,
    datasets: [{
      label: 'Monthly Sales Volume',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?php echo $data; ?>],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</div>
<br><br><br><br>



      <?php
          $sel_query1="Select Transmission,count(Transmission) from specs group by Transmission;";
          $sel_query2="Select count(*) from specs;";
  	  $result = mysqli_query($con,$sel_query1);
  	  $result2 = mysqli_query($con,$sel_query2);
          $data2 = "";
	  $label2 = "";
          $current_count = 0;
          $row2 = mysqli_fetch_assoc($result2);
          $row_count = $row2["count(*)"];
          while($row = mysqli_fetch_assoc($result)) {
	  if(strlen($data2)==0){
          $data2 .= $row["count(Transmission)"];
          $label2 .= "'".$row["Transmission"]."'";
	  }
          else{
          $data2.= ", ".$row["count(Transmission)"]; 
          $label2 .= ", '".$row["Transmission"]."'";
	  }
          }
          //echo $label2;
      ?>

<div align="center">
    
<div style="position: relative; height:10vh; width:20vw; padding: 100px 0px 200px 0px;">
  <canvas id="myChart2"></canvas>

</div>

 <script>
data2 = {
    datasets: [{

        data: [<?php echo $data2; ?>],
   backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
	hoverOffset: 4
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        <?php echo $label2; ?>
    ]
};
  const config2 = {
    type: 'doughnut',
    data: data2,
  };
</script>
<script>
  const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );
</script>
</div>
    <br>
<br><br><br>


    <div align="center">
    <div style="position: relative; height:20vh; width:40vw; padding: 0px 0px 50px 0px;">
  <canvas id="myChart3"></canvas>
 
</div>
<script>
  const labels3 = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
  ];


  const data3 = {
    labels: labels3,
    datasets: [{
      label: 'Monthly Sales Volume',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?php echo $data; ?>],
    }]
  };

  const config3 = {
    type: 'bar',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config3
  );
</script>
</div>

<br><br><br><br>


      <?php
          $sel_query1="Select sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South) from Demography;";
  	  $result = mysqli_query($con,$sel_query1);
          $data4 = "";
          while($row = mysqli_fetch_assoc($result)) {
          $data4 .= $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"];
	  }
          echo $data4;
      ?>

<div align="center">
    <div style="position: relative; height:20vh; width:40vw; padding: 100px 0px 50px 0px;">
  <canvas id="myChart4"></canvas>
 
</div>
<script>
  const labels4 = [
    'East',
    'West',
    'North',
    'South',
  ];


  const data4 = {
    labels: labels4,
    datasets: [{
      label: 'Region-wise Sales Volume',
      backgroundColor: [
        "#57C5C8", "#57C5C8", "#57A5C8", "#57C5A9"
      ]
      borderColor: 'rgb(0, 0, 0)',
      data: [<?php echo $data4; ?>],
    }]
  };

  const config4 = {
    type: 'polarArea',
    data: data4,
    options: {}
  };
</script>
<script>
  const myChart4 = new Chart(
    document.getElementById('myChart4'),
    config4
  );
</script>
</div>


</body>
<!--section class="bg-dark text-light p-5 p-lg-3 pt-lg-5 text-center text-sm-start"-->
<?php //include('footer.php'); ?>
</section>
</html>