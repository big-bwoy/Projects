<?php session_start();
 include_once("autoload.php");
$receipt_number=$contractor_name="";
if (isset($_GET['receipt_number']) && isset($_GET['contractor_name'])) {
	$receipt_number=$_GET['receipt_number'];
	$contractor_name=$_GET['contractor_name'];
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Receipt Number: <?php echo $receipt_number; ?></title>

</head>
<body>




<center><img src="logo.png">

	<h1>RECEIPT</h1><p>

<table border="1" style="width: 70%;border-collapse: collapse;" cellpadding="12">
	<thead>
		<tr><th>RECEIPT NUMBER:</th> <th><?php echo $receipt_number; ?></th></tr>
		<tr><th>RECEIPT DATE:</th> <th><?php echo date('Y-m-d'); ?></th></tr>
		<tr><th>CONTRACTROR NAME:</th> <th><?php echo $contractor_name; ?></th></tr>

	</thead>
</table>

<h2>ITEMS</h2>

	
<?php if (count(app::reportMeter34P($receipt_number)) >0) {
 ?>


 	<table id="tb1" class="table" style="width: 80%;border-collapse: collapse;" border="1" cellspacing="3">
        <thead>
        <tr>
          <th>Batch Number</th>
          <th>Meter No.</th>
          <th>Meter size</th>
          <th>Meter Make</th>
        </tr>
          
        </thead>
        <tbody>
          <?php $b=new meter();
          
           $t=app::reportMeter34P($receipt_number);
          for ($i=0; $i <count($t) ; $i++) { 
            ?>
            <tr>
              <td><?php echo $t[$i]['batch_number']; ?></td>
              <td><?php echo $t[$i]['meter_number']; ?></td>
              <td><?php echo $t[$i]['meter_size']; ?></td>
              <td><?php echo $t[$i]['meter_make']; ?></td>
            </tr>

          <?php } ?>
        </tbody>
      </table>

<?php } ?>


<?php if (count(app::reportSeal34P($receipt_number)) >0) {
 ?>
<table id="tb1" class="table" style="width: 80%;margin:4%;border-collapse: collapse;" border="1" cellspacing="3">
        <thead>
        <tr>
          <th>Batch No</th>
          <th>Seal Number</th>
          
        </tr>
          
        </thead>
        <tbody>
          <?php $b=new seal();
          
           $t=app::reportSeal34P($receipt_number);
          for ($i=0; $i <count($t) ; $i++) { 
            ?>
            <tr>
            <td><?php echo $t[$i]['batch_number']; ?></td>
              <td><?php echo $t[$i]['seal_number']; ?></td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
 
<?php } ?>



<?php if (count(app::reportCoil34P($receipt_number)) >0) {
 ?>
  <table id="tb1" class="table" style="width: 80%;border-collapse: collapse;" border="1" cellspacing="3">
        <thead>
        <tr>
          <th>Batch No.</th>
          <th>Coils No</th>
          <th>Seal No</th>
          
        </tr>
          
        </thead>
        <tbody>
          <?php $coils_number=$meter_number=$seal_number=$supplier_id=$contractor_id=$move_in_batch_no=$move_out_receipt_no=$contractor=$supplier_name="";
           $b=new coil();
          
           $t=app::reportCoil34P($receipt_number);
          for ($i=0; $i <count($t) ; $i++) { 
            $su=new supplier($t[$i]['supplier_id']);
            $de=$su->details;
            $sud=new contractor($t[$i]['contractor_id']);
            $ded=$sud->details;
            ?>
            <tr>
              
              <td><?php echo $t[$i]['move_in_batch_no']; ?></td>
              <td><?php echo $t[$i]['coils_number']; ?></td>
              <td><?php echo $t[$i]['seal_number']; ?></td>
              
              
            </tr>

          <?php } ?>
        </tbody>
      </table>
 
<?php } ?>

<p><hr><p>
	Staff: <?php $u=new users($_SESSION['staff_id']); $r=$u->details; echo $r['staff_name']; ?>
</center><p>
<script type="text/javascript">
	window.onload=function(){
		window.print();
	};
</script>
</body>
</html>