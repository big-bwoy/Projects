<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>
 <div class='row' id='row' style='margin-top:24px;padding:4px;'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-treatment.php'><i class='fa fa-list'></i>&nbsp;&nbsp;All treatment</a></li> </ul>
 
  </div>

 
  </div>
 <style>#row{margin-top:24px;}</style>
 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <div class='btn-group'><a href='add-treatment.php' class='btn btn-info'><i class='fa fa-plus'></i> ADD NEW</a><a class='btn btn-primary' href='all-treatment.php' class='btn btn-default'><i class='fa fa-refresh'></i> treatment List</a>
 
  </div>

 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><form class='form-inline'><i class='fa fa-calendar'> Search Between Dates: </i>
 <div class='input-group'><input type='date' name='date1' class='form-control' required='required'><input type='date' name='date2' class='form-control' required='required'><button type='submit' class='btn btn-default'>&nbsp;<i class='fa fa-search'></i>&nbsp;&nbsp;SEARCH</button>
 
  </div>
</form>
 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <form class='form-inline'>
 <div class='input-group'><select name='type' class='form-control' required='required'><option value='Animal_ID'>Animal_ID</option><option value='Drug_name'>Drug_name</option><option value='Description'>Description</option><option value='Description'>Treatment_date</option></select><input type='text' name='query' class='form-control' required='required'><button style='margin-left:4px;border:1px solid lightgrey;' name='check' type='submit' class='btn btn-info'><i class='fa fa-search'></i> SEARCH</button>
 
  </div>
</form>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
<?php

 if(isset($_GET['id'])){ $r=new treatment($_GET['id']); 
 $r->delete_treatment();
 echo '<script>alert("ITEM WAS DELETED!"); window.location.href="all-treatment.php";</script>
';  } 
 $alldata=treatment::read_treatment(); $column=treatment::treatment_constants(); 
 if(isset($_GET['check']) && isset($_GET['type']) && isset($_GET['query'])){ 
 if(in_array($_GET['type'],$column)){ 
 $alldata=treatment::search_treatment($_GET['type'],$_GET['query']); }
 else{
 $alldata=treatment::read_treatment();
} 
 if(isset($_GET['date1']) && isset($_GET['date2'])){
 extract($_GET); 
  $alldata= treatment::check_between_dates_treatment($date1,$date2); 
 } 
 } 
  ?>
<center><b><?php

 echo count($alldata); 
 
  ?> Records Found.</b></center><p><hr><p>
 <div class='table-responsive'>

<div class='table-responsive'>
<table id='table' style='width:100%;' border='1' cellpadding='2' class='table table-striped table-responsive table-hoverable table-bordered' id='table'>
 <thead>
<tr><th class='Animal_ID'>Animal_ID</th><th class='Drug_name'>Drug_name</th><th class='Description'>Description</th><th class='Treatment_date'>Treatment_date</th><td class='Edit'>Edit</td><td class='Delete'>Delete</td></tr>
</thead><tbody>
 <?php

 
 for($i=0; $i<count($alldata); $i++){ 
 $raw=$alldata[$i]; 
 
  ?><tr><td class='Animal_ID'><?php

  $animal_details=animals::get_animals($raw['Animal_ID']);
echo $animal_details['Animal_name'];


 echo " (animal id: ".$raw['Animal_ID'].")"; 
 
  ?></td><td class='Drug_name'><?php

 echo $raw['Drug_name']; 
 
  ?></td><td class='Description'><?php

 echo $raw['Description']; 

 ?></td><td class='Treatment_date'><?php

 echo $raw['Treatment_date'];
 
  ?></td><td class='Edit'><a href='add-treatment.php?id=<?php

 echo $raw['Treatment_ID']; 
 
  ?>' class='btn btn-success'><i class='fa fa-edit'></i> EDIT</a></td><td class='Delete'><a href='all-treatment.php?id=<?php

 echo $raw['Treatment_ID']; 
 
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