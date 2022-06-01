<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "metercontrol");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM meter  where contractor_name NOT in('')  
 ORDER BY id DESC ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <caption> <b>Disptached Meters</b></caption>
					<tr>  
                       <th>Receipt Date</th>
						<th>Receipt Number</th>
						<th>Contractor Name</th>
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["receipt_date"].'</td>  
                         <td>'.$row["recipet_number"].'</td> 
						 <td>'.$row["contractor_name"].'</td>  
						 <td>'.$row["meter_number"].'</td> 
						 <td>'.$row["meter_size"].'</td>  
                         <td>'.$row["meter_type"].'</td> 
						 <td>'.$row["meter_make"].'</td>  
						 <td>'.$row["meter_year"].'</td> 
						 <td>'.$row["meter_category"].'</td>  
                         <td>'.$row["supplier_name"].'</td> 
						 <td>'.$row["batch_number"].'</td>  
						 <td>'.$row["batch_date"].'</td> 
                      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=disptachedmeters.xls');
  echo $output;
 }
}
?>
