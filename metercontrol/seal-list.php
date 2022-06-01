<?php include_once 'top.php'; ?>

<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa  fa-stack-overflow"></i> All Seals</h1>
          
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
					<th>Seal Number</th>
					<th>Supplier Name</th>
					<th>Batch No</th>
					<th>Batch Date</th>
					
					<th>Update</th>
					<th>Remove</th>
				</tr>
					
				</thead>
				<tbody>
					<?php $b=new seal();
					if (isset($_GET['rem'])) {
						$b->remove($_GET['rem']);
						echo "<script>window.location.href='seal-list.php';</script>";
					}
					 $t=$b->listThem();
					for ($i=0; $i <count($t) ; $i++) { 
					 	?>
					 	<tr>
					 		
					 		<td><?php echo $t[$i]['seal_number']; ?></td>
					 		<td><?php echo $t[$i]['supplier_name']; ?></td>
					 		<td><?php echo $t[$i]['batch_number']; ?></td>
					 		<td><?php echo $t[$i]['batch_date']; ?></td>
					 		
					 		
					 		<td><a class="btn btn-primary" href="seal-add.php?edit=<?php echo $t[$i]['id']; ?>"><b class="fa fa-edit"></b> Edit</a></td>
					 		<td><a class="btn btn-danger" href="seal-list.php?rem=<?php echo $t[$i]['id']; ?>"><b class="fa fa-trash-o"></b> Delete</a></td>
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