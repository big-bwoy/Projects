<?php include_once 'top.php'; ?>

<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-table"></i> New Sale</h1>
          
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
	$seal_number=$contractor_name=$receipt_number=$receipt_date=$contractor_name=$receipt_date=$receipt_number="";
	$receipt_number=date("Y-m-d")."-".mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9);
	if (isset($_GET['edit'])) {
		$d=new seal($_GET['edit']);
		extract($d->details);
		
		$contractor="<option value='".$contractor_name."'>".$contractor_name."</option>";
	}
	if (isset($_POST['go'])) {
		$xPOST=$_POST;
		extract($_POST);
		if ($contractor_name=="null") {
			echo "<div class='alert alert-danger'>ERROR! CONTRACTOR NAME CANNOT BE EMPTY/NOT SELECTED!</div>";
		}else{
		if (array_key_exists('meter_number', $xPOST)) {
		for ($i=0; $i < count($meter_number); $i++) { 
			app::updateByDetail($meter_number[$i],$contractor_name,$receipt_number,$receipt_date,"meter", "meter_number");
		} 
	} #else{ echo "error";}



		if (array_key_exists('coils_number', $xPOST)) {
		for ($i=0; $i < count($coils_number); $i++) { 
			app::updateByDetail($coils_number[$i],$contractor_name,$receipt_number,$receipt_date,"coil", "coils_number","contractor_id","move_out_receipt_no");
		}}


		if (array_key_exists('seal_number', $xPOST)) {
		for ($i=0; $i < count($seal_number); $i++) { 
			app::updateByDetail($seal_number[$i],$contractor_name,$receipt_number,$receipt_date,"seal", "seal_number","contractor_name");
		} }

		echo "<h3>Successful..</h3>
		<script>window.location.href='receipt.php?contractor_name=".$contractor_name."&receipt_number=".$receipt_number."';</script>";



		if (isset($_GET['edit'])) {
			echo "<div class='alert alert-info'></div>";
		}else{
		echo "<div class='alert alert-info'></div>"; }

	}
}
	
	 ?>
	<form class="form" method="POST" action="<?php if(isset($_GET['edit'])){ echo '?edit='.$_GET['edit']; } ?>">

		<div class="alert alert-info">
			Please use Ctrl+ Left-click to select items in the muliple selection menus below.
		</div>
		
		<div class="row form-group">
			<div class="col-12 col-sm-3">select Contractor:</div>
			<div class="col-12 col-sm-9">
				<select class="form-control" name="contractor_name" required="required">
					<?php echo $contractor_name; ?>
					 
					<?php $s=new contractor(); $arr=$s->listThem();
					for ($i=0; $i < count($arr) ; $i++) { ?>
					 <option value="<?php echo $arr[$i]['contractor_name']; ?>"><?php echo $arr[$i]['contractor_name']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>



		<p><hr><p>

			<div class="row form-group">
			<div class="col-12 col-sm-3">select Meter(s) </div>
			<div class="col-12 col-sm-9">
				<select class="form-control" name="meter_number[]" multiple="multiple">
					

					 
					<?php $s=new meter(); $arr=$s->listThem2();
					for ($i=0; $i < count($arr) ; $i++) { ?>
					 <option value="<?php echo $arr[$i]['meter_number']; ?>"><?php echo $arr[$i]['meter_number']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>




		<div class="row form-group">
			<div class="col-12 col-sm-3">select Coils(s) number </div>
			<div class="col-12 col-sm-9">
				<select class="form-control" name="coils_number[]" multiple="multiple">
					

					 
					<?php $s=new coil(); $arr=$s->listThem2();
					for ($i=0; $i < count($arr) ; $i++) { ?>
					 <option value="<?php echo $arr[$i]['coils_number']; ?>">
					 	<?php echo $arr[$i]['coils_number']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>


		<div class="row form-group">
			<div class="col-12 col-sm-3">select Seal(s) To </div>
			<div class="col-12 col-sm-9">
				<select class="form-control" name="seal_number[]" multiple="multiple">
					

					 
					<?php $s=new seal(); $arr=$s->listThem2();
					for ($i=0; $i < count($arr) ; $i++) { ?>
					 <option value="<?php echo $arr[$i]['seal_number']; ?>"><?php echo $arr[$i]['seal_number']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div> 



		<hr><p>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Receipt No:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="receipt_number" class="form-control" required="required" value="<?php echo $receipt_number; ?>" readonly>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Receipt Date:</div>
			<div class="col-12 col-sm-9">
				<input type="date" name="receipt_date" class="form-control" required="required" value="<?php echo $receipt_date; ?>">
			</div>
		</div>
		<button name="go" type="submit" class="btn btn-default btn-lg" style="background: rgba(12,233,88,.76);"><i class="fa fa-save"></i> OK</button>
		<button type="reset" class="btn btn-danger btn-lg" ><i class="fa fa-save"></i> Clear</button>

	</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once 'bottom.php'; ?>