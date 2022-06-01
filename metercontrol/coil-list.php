<?php include_once 'top.php'; ?>

<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-database"></i> All Coils' Info</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">all</a></li>
        </ul>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
		<div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
	<?php
	include_once("autoload.php"); ?>
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
		<div class="table-responsive">
			<table class="table" style="width: 100%;">
				<thead>
				<tr>
					<th>Coils No</th>
					
					<th>Seal No</th>
					<th>Supplier</th>
					
					<th>Batch No.</th>
					<th>Batch Date</th>
					
					<th>Update</th>
					<th>Remove</th>
				</tr>
					
				</thead>
				<tbody>
					<?php $coils_number=$meter_number=$seal_number=$supplier_id=$contractor_id=$move_in_batch_no=$move_out_receipt_no=$contractor=$supplier_name="";
					 $b=new coil();
					if (isset($_GET['rem'])) {
						$b->remove($_GET['rem']);
						echo "<script>window.location.href='coil-list.php';</script>";
					}
					 $t=$b->listThem();
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

					 		<td><?php echo $t[$i]['batch_date']; ?></td>
					 		
					 		
					 		<td><a class="btn btn-primary" href="coil-add.php?edit=<?php echo $t[$i]['id']; ?>"><b class="fa fa-edit"></b> Edit</a></td>
					 		<td><a class="btn btn-danger" href="coil-list.php?rem=<?php echo $t[$i]['id']; ?>"><b class="fa fa-trash"></b> Delete</a></td>
					 	</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>
<?php include_once 'bottom.php'; ?>