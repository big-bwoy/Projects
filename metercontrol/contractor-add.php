<?php include_once 'top.php'; ?>

<div class="app-title" style="margin-top: 0.33px;">
        <div>
          <h1><i class="fa fa-user"></i> Contractor Registeration</h1>
          
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
	<?php
	include_once("autoload.php");
	$contractor_name=$contractor_mobile=$email=$contact_person="";
	if (isset($_GET['edit'])) {
		$d=new contractor($_GET['edit']);
		extract($d->details);
	}
	if (isset($_POST['go'])) {
		extract($_POST);
		$sup=new contractor();
		if (isset($_GET['edit'])) {
			echo "<div class='alert alert-info'>".$sup->update($_GET['edit'],$contractor_name,$contractor_mobile,$email,$contact_person)."</div>";
		}else{
		echo "<div class='alert alert-info'>".$sup->addNew($contractor_name,$contractor_mobile,$email,$contact_person)."</div>"; }
	}
	 ?>
	<form class="form" method="POST" action="<?php if(isset($_GET['edit'])){ echo '?edit='.$_GET['edit']; } ?>">
		<div class="row form-group">
			<div class="col-12 col-sm-3">Contractor Names:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="contractor_name" class="form-control" required="required" value="<?php echo $contractor_name; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Contractor Mobile:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="contractor_mobile" class="form-control" required="required" value="<?php echo $contractor_mobile; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Email:</div>
			<div class="col-12 col-sm-9">
				<input type="email" name="email" class="form-control" required="required" value="<?php echo $email; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-12 col-sm-3">Contact Person:</div>
			<div class="col-12 col-sm-9">
				<input type="text" name="contact_person" class="form-control" required="required" value="<?php echo $contact_person; ?>">
			</div>
		</div>
		<button name="go" type="submit" class="btn btn-default btn-lg" style="background: rgba(12,233,88,.76);"><i class="fa fa-save"></i> Add</button>
		
		<button type="reset" class="btn btn-danger btn-lg" ><i class="fa fa-save"></i> Clear</button>
	</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once 'bottom.php'; ?>