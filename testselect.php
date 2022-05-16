                  <?php 
			require('./admin/db.php');
require('header2.php');
                  $performers_query = "select *, sum(Total) from sales where Year in (select max(year) from sales) group by Make order by sum(Total) desc;";
                  $performers_result = mysqli_query($con,$performers_query);
//echo $col;
while($col = mysqli_fetch_assoc($performers_result)){
echo "{
                                  name: '".$col['Make']."',
                                  data: [".$col['Jan'].", ".$col['Feb'].", ".$col['Mar'].", ".$col['Apr'].", ".$col['May'].", ".$col['Jun'].", ".$col['Jul'].", ".$col['Aug'].", ".$col['Sep'].", ".$col['Oct'].", ".$col['Nov'].", ".$col['Dcm']."],
                                }";}
       
                ?>
<body>



<body>

  <main id="main" class="main">

<div class="row">
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
                        $tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        $query = "Select distinct(Demography.Year), Specs.Transmission, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Transmission;";
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
                        $tbl_count = 0;
                        //$colors = ['#897C87', '#82B2B8', '#D9C2BD', '#CA9C95'];
                        $query = "Select distinct(Demography.Year), Specs.Fuel_Type, Demography.Total from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant group by Specs.Fuel_Type;";
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
   
      <div class="row">


          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->



      </div>

  </main><!-- End #main -->


----------------------------------------
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Accordion without outline borders</h5>

              <!-- Accordion without outline borders -->
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <i class="bi bi-grid"></i> 
                       <span>Dashboard</span>
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Accordion Item #2
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Accordion Item #3
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                  </div>
                </div>
              </div><!-- End Accordion without outline borders -->

            </div>
          </div>

        </div>
      </div>





<!---cdb code begin-->
    <h1 align="center">Car Research</h1>
    <p align=center>Fine-tune your search using one or more filters</p>


      <form action="#" method="post">
        <table cellpadding="5px" align="center">
          <tr>
            <th>Make</th>
            <th>Price</th>
            <th>Type</th>
            <th>Mileage</th>
            <th>Transmission</th>
            <th>Fuel</th>
            <th>Seats</th>
          </tr>
          <tr>
            <td>
              <select name="make" id="make">
                <option value="">All</option>
                  <?php
                    $sel_query="Select DISTINCT(Make) from specs;";
  	                $result = mysqli_query($con, $sel_query);
	                  while($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row["Make"]; ?>"><?php echo $row["Make"]; ?></option><?php } ?>
              </select>
            </td>
            <td>
        <select name="price" id="price">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Ex_showroom_price) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Ex_showroom_price"]; ?>"><?php echo $row["Ex_showroom_price"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
        <select name="body_type" id="body_type">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Body_type) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Body_type"]; ?>"><?php echo $row["Body_type"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="mileage" id="mileage">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(City_mileage) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["City_mileage"]; ?>"><?php echo $row["City_mileage"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="transmission" id="transmission">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Transmission) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Transmission"]; ?>"><?php echo $row["Transmission"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="fuel" id="fuel">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Fuel_type) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Fuel_type"]; ?>"><?php echo $row["Fuel_type"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="seating_capacity" id="seating_capacity">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Seating_capacity) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Seating_capacity"]; ?>"><?php echo $row["Seating_capacity"]; ?></option><?php } ?>
       </select>
       </td>
    </tr>
    </table>
        <br><input type="submit" value="Search">
    </form>
    </center>
    <br><br>
    <?php if (isset($_POST['fuel'])) { ?>
      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
    <table class="table datatable">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Make</strong></th>
<th><strong>Model</strong></th>
<th><strong>Variant</strong></th>
<th><strong>Price</strong></th>
<!--th><strong>Cylinders</strong></th>
<th><strong>Drivetrain</strong></th>
<th><strong>Engine Location</strong></th>
<th><strong>Fuel Tank Capacity</strong></th-->
<th><strong>Fuel Type</strong></th>
<th><strong>Body Type</strong></th>
<th><strong>City Mileage</strong></th>
<!--th><strong>Gears</strong></th>
<th><strong>Power</strong></th>
<th><strong>Torque</strong></th>
<th><strong>Seating Capacity</strong></th-->
<th><strong>Transmission</strong></th>
<!--th><strong>Boot Space</strong></th-->
<th><strong>Details</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query = "Select * from specs";
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
   }
}
if(isset($_POST['price'])) 
{
   if(strlen($_POST['price'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Ex_showroom_price = '".$_POST['price']."'";
   }
   else
   {
   $sel_query .= " and Ex_showroom_price = '".$_POST['price']."'";
   }
   }
}
if(isset($_POST['body_type'])) 
{
   if(strlen($_POST['body_type'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Body_type = '".$_POST['body_type']."'";
   }
   else
   {
   $sel_query .= " and Body_type = '".$_POST['body_type']."'";
   }
   }
}
if(isset($_POST['transmission'])) 
{
   if(strlen($_POST['transmission'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Transmission = '".$_POST['transmission']."'";
   }
   else
   {
   $sel_query .= " and Transmission = '".$_POST['transmission']."'";
   }
   }
}
if(isset($_POST['fuel'])) 
{
   if(strlen($_POST['fuel'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Fuel_type = '".$_POST['fuel']."'";
   }
   else
   {
   $sel_query .= " and Fuel_type = '".$_POST['fuel']."'";
   }
   }
}
if(isset($_POST['seating_capacity'])) 
{
   if(strlen($_POST['seating_capacity'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Seating_capacity = '".$_POST['seating_capacity']."'";
   }
   else
   {
   $sel_query .= " and Seating_capacity = '".$_POST['seating_capacity']."'";
   }
   }
}
$sel_query .= ";";
//echo $sel_query;
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["Make"]; ?></td>
<td align="center"><?php echo $row["Model"]; ?></td>
<td align="center"><?php echo $row["Variant"]; ?></td>
<td align="center"><?php echo $row["Ex_showroom_price"]; ?></td>
<!--td align="center"><?php //echo $row["Cylinders"]; ?></td>
<td align="center"><?php //echo $row["Drivetrain"]; ?></td>
<td align="center"><?php //echo $row["Engine_location"]; ?></td>
<td align="center"><?php //echo $row["Fuel_tank_capacity"]; ?></td-->
<td align="center"><?php echo $row["Fuel_type"]; ?></td>
<td align="center"><?php echo $row["Body_type"]; ?></td>
<td align="center"><?php echo $row["City_mileage"]; ?></td>
<!--td align="center"><?php //echo $row["Gears"]; ?></td-->
<!--td align="center"><?php// echo $row["Power"]; ?></td>
<td align="center"><?php //echo $row["Torque"]; ?></td>
<td align="center"><?php //echo $row["Seating_capacity"]; ?></td-->
<td align="center"><?php echo $row["Transmission"]; ?></td>
<!--td align="center"><?php //echo $row["Boot_space"]; ?></td-->
<td>              <!-- Full Screen Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                Click Here
              </button>

              <div class="modal fade" id="fullscreenModal" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">More Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Car Specifications for</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>
                </div>
              </div>

                    <div class="col-lg-9 col-md-8"><?php echo $row["Make"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Model"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Variant"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Ex_showroom_price"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Cylinders"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Drivetrain"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Engine_location"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Fuel_tank_capacity"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Fuel_type"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Body_type"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["City_mileage"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Gears"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Power"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Torque"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Seating_capacity"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Transmission"]; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["Boot_space"]; ?></div>

		<!-- End Bordered Tabs -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Full Screen Modal--></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
<?php } ?>
    <br>
<!--cdb code end-->
  

              <!-- Full Screen Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                Full Screen Modal
              </button>

              <div class="modal fade" id="fullscreenModal" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">More Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Car Specifications for</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>

                </div>


              </div><!-- End Bordered Tabs -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->


<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
<h2 align="center">Stacked Bar Chart</h2>
<canvas id="ctx" width="700"></canvas>
<script>
var stackedbarchart = new Chart(ctx, {
   type: 'bar',
   data: {
      labels: ['East', 'West', 'North', 'South'], // responsible for how many bars are gonna show on the chart
      // create 12 datasets, since we have 12 items
      // data[0] = labels[0] (data for first bar - 'Standing costs') 
      // put 0, if there is no data for the particular bar
      datasets: [ {
         label: 'Diesel',
         data: [5, 2, 5, 13],
         backgroundColor: '#b82e2e'
      },{
         label: 'Electric',
         data: [6, 1, 3, 6],
         backgroundColor: '#0099c6'
      }, {
         label: 'Petrol',
         data: [4, 2, 9, 8],
         backgroundColor: '#3366cc'
      }, {
         label: 'hybrid',
         data: [4, 2, 9, 8],
         backgroundColor: '#0066dd'
      }]
   },
   options: {
      responsive: false,
      legend: {
         position: 'right' // place legend on the right side of chart
      },
      scales: {
         xAxes: [{
            stacked: true // this should be set to make the bars stacked
         }],
         yAxes: [{
            stacked: true // this also..
         }]
      }
   }
});

</script>
</div></div>
</div><?php require('footer2.php'); ?>
</body>
</html>