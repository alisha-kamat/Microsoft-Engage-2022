<html>
<h1 align="center">Demo charts</h1>
<h2>Line Graph</h2>
<div style="position: relative; height:10vh; width:20vw; padding: 100px 0px 200px 0px;">
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
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
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
<h2>Pie Graph</h2>
<div style="position: relative; height:10vh; width:20vw; padding: 100px 0px 200px 0px;">
  <canvas id="myChart2"></canvas>
</div>

 <script>
data2 = {
    datasets: [{
        data: [10, 20, 30],
   backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
	hoverOffset: 4
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Red',
        'Yellow',
        'Blue'
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



</html>
