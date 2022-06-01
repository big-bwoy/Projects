<?php include_once 'top.php'; ?>

<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-database"></i> NEW COIL</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">New</a></li>
        </ul>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
		<div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
	<?php
	include_once("autoload.php");
	$coils_number=$meter_number=$seal_number=$supplier_id=$contractor_id=$move_in_batch_no=$move_out_receipt_no=$contractor=$supplier_name=$receipt_date=$name=$batch_date="";
	if (isset($_GET['edit'])) {
		$d=new coil($_GET['edit']);
		extract($d->details);
		$contract=new contractor($contractor_id);
		$det=$contract->details;
		$contractor="<option value='".$contractor_id."'>".$det['contractor_name']."</option>";
		$supply=new supplier($supplier_id);
		$detx=$supply->details;
		$supplier_name="<option value='".$supplier_id."'>".$detx['supplier_name']."</option>";
	}
	if (isset($_POST['go'])) {
		extract($_POST);
		$sup=new coil();
		if (isset($_GET['edit'])) {
			echo "<div class='alert alert-info'>".$sup->update($_GET['edit'],$coils_number,$batch_date,$seal_number,$supplier_id,$contractor_id,$move_in_batch_no,$move_out_receipt_no,$receipt_date,$name)."</div>";
		}else{
		echo "<div class='alert alert-info'>".$sup->addNew($coils_number,$batch_date,$seal_number,$supplier_id,$contractor_id,$move_in_batch_no,$move_out_receipt_no,$receipt_date,$name)."</div>"; }
	}
	 ?>
	<form class="form" method="POST" action="<?php if(isset($_GET['edit'])){ echo '?edit='.$_GET['edit']; } ?>">
	<input type="hidden" name="name" class="form-control" required="required" value="coil">
	<input type="hidden" name="name" class="form-control" required="required" value="coil">
		<div class="row form-group">
			<div class="col-12 col-sm-3">Coils No:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="coils_number" class="form-control" required="required" value="<?php echo $coils_number; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Seal Number:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="seal_number" class="form-control" required="required" value="<?php echo $seal_number; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Supplier Name:</div>
			<div class="col-12 col-sm-9">
				<select class="form-control" name="supplier_id" required="required">
					<?php echo $supplier_name; ?>
					<option></option>
					<?php $s=new supplier(); $arr=$s->listThem();
					for ($i=0; $i < count($arr) ; $i++) { ?>
					 <option value="<?php echo $arr[$i]['supplier_id']; ?>"><?php echo $arr[$i]['supplier_name']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		

		<div class="row form-group">
			<div class="col-12 col-sm-3"> Batch No:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="move_in_batch_no" class="form-control" required="required" value="<?php echo $move_in_batch_no; ?>">
			</div>
		</div>




		<div class="row form-group">
			<div class="col-12 col-sm-3">Batch Date:</div>
			<div class="col-12 col-sm-9">
				<input type="date" name="batch_date" class="form-control" required="required" value="<?php echo $batch_date; ?>">
			</div>
		</div>

		<button name="go" type="submit" class="btn btn-default btn-lg" style="background: rgba(12,233,88,.76);"><i class="fa fa-save"></i> SAVE DETAILS</button>

		<button name="go" type="submit" class="btn btn-default btn-lg" style="background: rgba(12,233,18,.76);"><i class="fa fa-save"></i> save & add another</button>
		
		<button type="reset" class="btn btn-danger btn-lg" <i class="fa fa-save"></i> Clear</button>
	</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once 'bottom.php'; ?>