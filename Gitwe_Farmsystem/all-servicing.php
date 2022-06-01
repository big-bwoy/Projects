<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>
 <div class='row' id='row' style='margin-top:24px;padding:4px;'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-servicing.php'><i class='fa fa-list'></i>&nbsp;&nbsp;All SERVICING</a></li> </ul>
 
  </div>

 
  </div>
 <style>#row{margin-top:24px;}</style>
 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <div class='btn-group'><a href='add-servicing.php' class='btn btn-info'><i class='fa fa-plus'></i> ADD NEW</a><a class='btn btn-primary' href='all-servicing.php' class='btn btn-default'><i class='fa fa-refresh'></i> servicing List</a>
 
  </div>

 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><form class='form-inline'><i class='fa fa-calendar'> Search Between Dates: </i>
 <div class='input-group'><input type='date' name='date1' class='form-control' required='required'><input type='date' name='date2' class='form-control' required='required'><button type='submit' class='btn btn-default'>&nbsp;<i class='fa fa-search'></i>&nbsp;&nbsp;SEARCH</button>
 
  </div>
</form>
 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <form class='form-inline'>
 <div class='input-group'><select name='type' class='form-control' required='required'><option value='Animal_ID'>ANIMAL ID</option><option value='Service_date'>SERVICE DATE</option><option value='Served_by'>SERVED BY</option></select><input type='text' name='query' class='form-control' required='required'><button style='margin-left:4px;border:1px solid lightgrey;' name='check' type='submit' class='btn btn-info'><i class='fa fa-search'></i> SEARCH</button>
 
  </div>
</form>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
<?php

 if(isset($_GET['id'])){ $r=new servicing($_GET['id']); 
 $r->delete_servicing();
 echo '<script>alert("ITEM WAS DELETED!"); window.location.href="all-servicing.php";</script>
';  } 
 $alldata=servicing::read_servicing(); $column=servicing::servicing_constants(); 
 if(isset($_GET['check']) && isset($_GET['type']) && isset($_GET['query'])){ 
 if(in_array($_GET['type'],$column)){ 
 $alldata=servicing::search_servicing($_GET['type'],$_GET['query']); }
 else{
 $alldata=servicing::read_servicing();
} 
 if(isset($_GET['date1']) && isset($_GET['date2'])){
 extract($_GET); 
  $alldata= servicing::check_between_dates_servicing($date1,$date2); 
 } 
 } 
  ?>
<center><b><?php

 echo count($alldata); 
 
  ?> Records Found. <?php

 if(isset($_GET['type']) && isset($_GET['query'])){ echo 'search results for: '.$_GET['type'].' / '.$_GET['query']; }
 
  ?></b></center><p><hr><p>
 <div class='table-responsive'>

<div class='table-responsive'>
<table id='table' style='width:100%;' border='1' cellpadding='2' class='table table-striped table-responsive table-hoverable table-bordered' id='table'>
 <thead>
<tr><th class='Animal_ID'>ANIMAL ID</th><th class='Service_date'>SERVICE DATE</th><th class='Served_by'>SERVED BY</th><td class='Edit'>Edit</td><td class='Delete'>Delete</td></tr>
</thead><tbody>
 <?php

 
 for($i=0; $i<count($alldata); $i++){ 
 $raw=$alldata[$i]; 
 
   ?><tr><td class='Animal_ID'><?php

  $animal_details=animals::get_animals($raw['Animal_ID']);
echo $animal_details['Animal_name'];


 echo " (animal id: ".$raw['Animal_ID'].")"; 
 
  ?></td><td class='Service_date'><?php

 echo $raw['Service_date']; 
 
  ?></td><td class='Served_by'><?php

 $animal_details=animals::get_animals($raw['Served_by']);
echo $animal_details['Animal_name'];


 echo " (animal id: ".$raw['Served_by'].")";
 
  ?></td><td class='Edit'><a href='add-servicing.php?id=<?php

 echo $raw['Service_ID']; 
 
  ?>' class='btn btn-success'><i class='fa fa-edit'></i> EDIT</a></td><td class='Delete'><a href='all-servicing.php?id=<?php

 echo $raw['Service_ID']; 
 
  ?>' class='btn btn-danger'><i class='fa fa-trash'></i> TRASH</a></td> <tr><?php

 } 
 
  ?>
</tbody></table>
</div> 
  </div>

 
  </div>

 
  </div>
<?php

 include_once('foot.php'); 
 
   ?>