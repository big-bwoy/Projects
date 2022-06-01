<?php include_once("top.php");

 ?>
  <?php
$con = mysqli_connect("localhost", "root", "","metercontrol");
if(!$con){ 
 echo "connected";
}
?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', ''],
		   <?php
		  
         
		$sql = "
           SELECT  COUNT(*) AS number_meter, name FROM meter WHERE contractor_name = '' 
           UNION 
		  SELECT COUNT(*)AS seal, name  FROM seal WHERE contractor_name = ''
			UNION 
		  SELECT COUNT(*)AS coil, name  FROM coil WHERE contractor_id = '' ";


		

          $fire = mysqli_query($con,$sql);
		  while ($result = mysqli_fetch_assoc($fire)){
			  
          echo"['".$result['name']."',".$result['number_meter']."],";
			  }

		
		  ?>
          
        ]);

        var options = {
          title: 'Available Items'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-home"></i> Welcome!</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
		
</div>




<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" style="min-height: 456px;">


		<div class="tile">
            <div class="tile-body">
		<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
      <h3> <b class='fa fa-dashboard'></b> Dashboard</h3><hr><p>
	  
	  <div id="piechart" style="width: 900px; height: 500px;"></div>

	<div id="container" style="width: 95%;min-height: 450px;">
                                <canvas id="canvas"></canvas>
                            </div>
	</div>
</div>
        </div>
	</div>
</div>


 <script>
        <?php $data=apan::piechartDetails(); ?>
         new Chart(document.querySelector("#canvas"),{
            type: 'pie',
            data: {
                labels: <?php echo $data[0]; ?>,
                datasets: [{
                    label: "DISPATCHED ITEMS",
                    backgroundColor: <?php echo $data[2]; ?>,
                    data: <?php echo $data[1]; ?>
                }]
            },
            options:{
                title: {
                    display:true,
                    text: "Meters Available"
                }
            }
         });
       
    </script> 
	
	


<?php include_once("bottom.php"); ?>