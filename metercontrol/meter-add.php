<?php include_once 'top.php'; ?>

<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-plus"></i> New Meter</h1>
          
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
	$meter_number=$meter_size=$meter_type=$meter_make=$meter_year=$meter_category=$seal_1=$seal_2=$seal_3=$coil_1=$coil_2=$coil_3=$seal_coil_1=$seal_coil_2=$seal_coil_3=$supplier_name=$batch_number=$receipt_number=$batch_date=$receipt_date=$contractor_name=$name="";
	if (isset($_GET['edit'])) {
		$d=new meter($_GET['edit']);
		extract($d->details);
		$meter_type="<option value='".$meter_type."'>".$meter_type."</option>";

		$meter_size="<option value='".$meter_size."'>".$meter_size."</option>";

		$meter_make="<option value='".$meter_make."'>".$meter_make."</option>";
		$supplier_name="<option value='".$supplier_name."'>".$supplier_name."</option>";
		$contractor="<option value='".$contractor_name."'>".$contractor_name."</option>";
	}
	if (isset($_POST['go'])) {
		extract($_POST);
		$sup=new meter();
		if (isset($_GET['edit'])) {
			echo "<div class='alert alert-info'>".$sup->update($_GET['edit'],$meter_number,$meter_size,$meter_type,$meter_make,$meter_year,$meter_category,$supplier_name,$batch_number,$receipt_number,$batch_date,$receipt_date,$contractor_name,$name)."</div>";
		}else{
		echo "<div class='alert alert-info'>".$sup->addNew($meter_number,$meter_size,$meter_type,$meter_make,$meter_year,$meter_category,$supplier_name,$batch_number,$receipt_number,$batch_date,$receipt_date,$contractor_name,$name)."</div>"; }
	}
	 ?>
	<form class="form" method="POST" action="<?php if(isset($_GET['edit'])){ echo '?edit='.$_GET['edit']; } ?>">
	<input type="hidden" name="name" class="form-control" required="required" value="meter">
		<div class="row form-group">
			<div class="col-12 col-sm-3">Meter No:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="meter_number" class="form-control" required="required" value="<?php echo $meter_number; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Meter Size:</div>
			<div class="col-12 col-sm-9">
				<select name="meter_size" class="form-control" required="required">
					<?php echo $meter_size; ?>
					<option></option>
					<option value="100amps">100amps</option>
					<option value="3*300">3*300</option>
					<option value="200/5A">200/5A</option>
					<option value="400/5A">400/5A</option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-12 col-sm-3">Meter Type:</div>
			<div class="col-12 col-sm-9">
				<select name="meter_type" class="form-control" required="required"><?php echo $meter_type; ?>
				<option></option>
				<option value="1SP">1SP</option>
				<option value="3PH">3PH</option>
				<option value="CT">CT</option>
			</select>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Meter Make:</div>
			<div class="col-12 col-sm-9">
				<select name="meter_make" class="form-control" required="required"><?php echo $meter_make; ?>
				<option></option>
				<option value="secure">secure</option>
				<option value="ISKARA">ISKARA</option>
				<option value="segomcom">segomcom</option>
			</select>
				
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Meter Year</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="meter_year" class="form-control" required="required" value="<?php echo $meter_year; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Meter Category:</div>
			<div class="col-12 col-sm-9">
				<select name="meter_category" class="form-control" required="required">
					<?php echo $meter_category; ?>
						<option></option>
						<option value="Prepaid">Prepaid</option>
						<option value="Postpaid">Postpaid</option>
					</select>
			</div>
		</div>

		


		<div class="row form-group">
			<div class="col-12 col-sm-3">select supplier:</div>
			<div class="col-12 col-sm-9">
				<select class="form-control" name="supplier_name" required="required">
					<?php echo $supplier_name; ?>
					<option></option>
					<?php $s=new supplier(); $arr=$s->listThem();
					for ($i=0; $i < count($arr) ; $i++) { ?>
					 <option value="<?php echo $arr[$i]['supplier_name']; ?>"><?php echo $arr[$i]['supplier_name']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Batch No:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="batch_number" class="form-control" required="required" value="<?php echo $batch_number; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Batch Date:</div>
			<div class="col-12 col-sm-9">
				<input type="date" name="batch_date" class="form-control" required="required" value="<?php echo $batch_date; ?>">
			</div>
		</div>

		
		
		<button name="go" type="submit" class="btn btn-default btn-lg" style="background: rgba(12,233,88,.76);"><i class="fa fa-save"></i> OK</button> 

		<button name="go" type="submit" class="btn btn-default btn-lg" style="background: rgba(12,233,18,.76);"><i class="fa fa-save"></i> save & add another</button>
		<button type="reset" class="btn btn-danger btn-lg" ><i class="fa fa-save"></i> Clear</button>
	</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once 'bottom.php'; ?>