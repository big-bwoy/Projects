<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "metercontrol");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM seal  ORDER BY id DESC ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <caption> <b>All Seals Recived </b></caption>
					<tr>  
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
                        
						 <td>'.$row["seal_number"].'</td> 
						 
                         <td>'.$row["supplier_name"].'</td> 
						 <td>'.$row["batch_number"].'</td>  
						 <td>'.$row["batch_date"].'</td> 
                      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=recivedseals.xls');
  echo $output;
 }
}
?>
