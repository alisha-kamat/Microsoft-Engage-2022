                  <?php 
			require('./admin/db.php');
                  $performers_query = "select *, sum(Total) from sales where Year in (select max(year) from sales) group by Make order by sum(Total) desc;";
                  $performers_result = mysqli_query($con,$performers_query);
echo $col;
while($col = mysqli_fetch_assoc($performers_result)){
echo "{
                                  name: '".$col['Make']."',
                                  data: [".$col['Jan'].", ".$col['Feb'].", ".$col['Mar'].", ".$col['Apr'].", ".$col['May'].", ".$col['Jun'].", ".$col['Jul'].", ".$col['Aug'].", ".$col['Sep'].", ".$col['Oct'].", ".$col['Nov'].", ".$col['Dcm']."],
                                }";}
       
                ?>