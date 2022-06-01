<?php
/*---------------------------------------Server Connection------------------------------*/
$con=mysql_connect('localhost','root','');
if($con===false){
die('could not establish connection'.mysql_error());
}
/*---------------------------------------end Server Connection--------------------------*/

/*---------------------------------------Database Selection--------------------------*/
$db=mysql_select_db('world',$con);
if($db===false){
die('could not connect to database'.mysql_error());
}
/*---------------------------------------end Database Selection--------------------------*/

 $sql= 
	
	
	"SELECT COUNT(DISTINCT countrycode) AS countries  from city    ";
 
 $result=mysql_query($sql);
    while( $sub=mysql_fetch_assoc($result)){
		   echo"<table width=500  border=1>";
		    echo"<tr>";
		     
			    echo"<td width=90>".strtoupper($sub['countries'])."</td>";
				echo"<td width=90>".$sub['value_occurrence']."</td>";
				echo"<td width=90>".$sub['price']."</td>";
				echo"<td width=90>".$sub['pprice']."</td>";
				echo"<td width=90>".strtoupper($sub['date'])."</td>";
				echo '<td><a href="edit.php?id=' . $sub['id'] . '">Edit</a></td>';
		       echo '<td><a href="deleti.php?id=' . $sub['id'] . '">Delete</a></td>';
				
			
			echo"</tr>";
			    
			    
		
			    
				
					   
		   echo"</table>";
		   }
?>