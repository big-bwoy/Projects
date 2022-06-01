<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "metercontrol");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM seal  where contractor_name NOT in('')   
 ORDER BY id DESC ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <caption> <b>Disptached Seals</b></caption>
					<tr>  
                        <th>Receipt Date</th>
          <th>Receipt Number</th>
          <th>Contractor Name</th>
          <th>Seal Number</th>
          <th>Supplier Name</th>
          <th>Batch No</th>
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
						 <td>'.$row["seal_number"].'</td> 
                         <td>'.$row["supplier_name"].'</td> 
						 <td>'.$row["batch_number"].'</td>  
						 <td>'.$row["batch_date"].'</td> 
                      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=disptachedseals.xls');
  echo $output;
 }
}
?>
