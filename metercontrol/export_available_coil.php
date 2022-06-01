<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "metercontrol");
$output = '';
if(isset($_POST["export"]))
{
 $query = ("SELECT * FROM coil  WHERE contractor_id =''  ORDER BY id DESC ");
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <caption> <b>Available Coils</b></caption>
					<tr>  
                        <th>Coils No</th>
						<th>Seal No</th>
						<th>Supplier</th>
          
						<th>Batch No.</th>
                       
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["coils_number"].'</td>  
                         <td>'.$row["seal_number"].'</td> 
						 <td>'.$row["supplier_id"].'</td>  
						 <td>'.$row["move_in_batch_no"].'</td> 
                      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=availablecoils.xls');
  echo $output;
 }
}
?>
