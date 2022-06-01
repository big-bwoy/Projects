<?php include_once("top.php");
 ?>
<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-line-chart"></i> Reports/ Available</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-line-chart fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Reports</a></li>
        </ul>
</div>






<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" style="min-height: 456px;">


		<div class="tile">
            <div class="tile-body">
		<?php
  include_once("autoload.php"); ?>
  <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">

    <div style="margin-bottom: 16px;border-bottom: 1px solid grey;" class="page-header"><h3>Meter  </h3></div>
    <div class="table-responsive">
      <table id="tb1" class="table" style="width: 100%;">
        <thead>
        <tr>
          <th>Meter No.</th>
          <th>Meter size</th>
          <th>Meter Type</th>
          <th>Meter Make</th>
          <th>Meter Year</th>
          <th>Meter Category</th>
          <th>Supplier Name</th>
          <th>Batch Number</th>
          <th>Batch Date</th>
        </tr>
          
        </thead>
        <tbody>
          <?php $b=new meter();
          if (isset($_GET['rem'])) {
            $b->remove($_GET['rem']);
            echo "<script>window.location.href='meter-list.php';</script>";
          }
           $t=app::reportMeter3();
          for ($i=0; $i <count($t) ; $i++) { 
            ?>
            <tr>
              <td><?php echo $t[$i]['meter_number']; ?></td>
              <td><?php echo $t[$i]['meter_size']; ?></td>
              <td><?php echo $t[$i]['meter_type']; ?></td>
              <td><?php echo $t[$i]['meter_make']; ?></td>
              <td><?php echo $t[$i]['meter_year']; ?></td>
              <td><?php echo $t[$i]['meter_category']; ?></td>
              <td><?php echo $t[$i]['supplier_name']; ?></td>
              <td><?php echo $t[$i]['batch_number']; ?></td>
              <td><?php echo $t[$i]['batch_date']; ?></td> 
            </tr>

          <?php } ?>
		  
        </tbody>
		
      </table>
	   <form method="post" action="export_available_meter.php">
     <input type="submit" name="export" class="btn btn-success" value="Export to excel" />
    </form>
	  
    </div> 


<div style="margin-top:34px;margin-bottom: 16px;border-bottom: 1px solid grey;" class="page-header"><h3>Coil  </h3></div>

<div class="table-responsive">
      <table id="tb2" class="table" style="width: 100%;">
        <thead>
        <tr>
          <th>Coils No</th>
          
          <th>Seal No</th>
          <th>Supplier</th>
          
          <th>Batch No.</th>
        </tr>
          
        </thead>
        <tbody>
          <?php $coils_number=$meter_number=$seal_number=$supplier_id=$contractor_id=$move_in_batch_no=$move_out_receipt_no=$contractor=$supplier_name="";
           $b=new coil();
          if (isset($_GET['rem'])) {
            $b->remove($_GET['rem']);
            echo "<script>window.location.href='coil-list.php';</script>";
          }
           $t=app::reportCoil3();
          for ($i=0; $i <count($t) ; $i++) { 
            $su=new supplier($t[$i]['supplier_id']);
            $de=$su->details;
            $sud=new contractor($t[$i]['contractor_id']);
            $ded=$sud->details;
            ?>
            <tr>
              
              <td><?php echo $t[$i]['coils_number']; ?></td>
              <td><?php echo $t[$i]['seal_number']; ?></td>
              
              <td><?php echo $de['supplier_name']; ?> (supplier id: <?php echo $t[$i]['supplier_id']; ?>)</td>
              
              <td><?php echo $t[$i]['move_in_batch_no']; ?></td>
              
            </tr>

          <?php } ?>
        </tbody>
      </table>
	   <form method="post" action="export_available_coil.php">
     <input type="submit" name="export" class="btn btn-success" value="Export to excel" />
    </form>
    </div>

<div style="margin-top:34px;margin-bottom: 16px;border-bottom: 1px solid grey;" class="page-header"><h3>Seals  </h3></div>

<div id="tb3" class="table-responsive">
      <table class="table" style="width: 100%;">
        <thead>
        <tr>
         
          <th>Seal Number</th>
          <th>Supplier Name</th>
          <th>Batch No</th>
          <th>Batch Date</th>
        </tr>
          
        </thead>
        <tbody>
          <?php $b=new seal();
          if (isset($_GET['rem'])) {
            $b->remove($_GET['rem']);
            echo "<script>window.location.href='seal-list.php';</script>";
          }
           $t=app::reportSeal3();
          for ($i=0; $i <count($t) ; $i++) { 
            ?>
            <tr>
              <td><?php echo $t[$i]['seal_number']; ?></td>
              <td><?php echo $t[$i]['supplier_name']; ?></td>
              <td><?php echo $t[$i]['batch_number']; ?></td>
              <td><?php echo $t[$i]['batch_date']; ?></td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
	  <form method="post" action="export_available_seal.php">
     <input type="submit" name="export" class="btn btn-success" value="Export to excel" />
    </form>
	  
    </div> 

  </div>
</div>
        </div>
	</div>
</div>


  


<?php include_once("bottom.php"); ?>