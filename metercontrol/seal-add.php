<?php include_once 'top.php'; ?>

<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-plus"></i> new seal</h1>
          
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
	$seal_number=$supplier_name=$batch_number=$batch_date=$contractor_name=$receipt_date=$receipt_number=$name="";
	if (isset($_GET['edit'])) {
		$d=new seal($_GET['edit']);
		extract($d->details);
		$supplier_name="<option value='".$supplier_name."'>".$supplier_name."</option>";
		$contractor="<option value='".$contractor_name."'>".$contractor_name."</option>";
	}
	if (isset($_POST['go'])) {
		extract($_POST);
		$sup=new seal();
		if (isset($_GET['edit'])) {
			echo "<div class='alert alert-info'>".$sup->update($_GET['edit'],$seal_number,$supplier_name,$batch_number,$batch_date,$contractor_name,$receipt_number,$receipt_date,$name)."</div>";
		}else{
		echo "<div class='alert alert-info'>".$sup->addNew($seal_number,$supplier_name,$batch_number,$batch_date,$contractor_name,$receipt_number,$receipt_date,$name)."</div>"; }
	}
	 ?>
	<form class="form" method="POST" action="<?php if(isset($_GET['edit'])){ echo '?edit='.$_GET['edit']; } ?>">
	<input type="hidden" name="name" class="form-control" required="required" value="seal">
		<div class="row form-group">
			<div class="col-12 col-sm-3">Seal No:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="seal_number" class="form-control" required="required" value="<?php echo $seal_number; ?>">
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