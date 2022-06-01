<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>
 <div class='row' id='row' style='margin-top:24px;padding:4px;'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-farm_inputs.php'><i class='fa fa-list'></i>&nbsp;&nbsp;All FARM INPUTS</a></li> </ul>
 
  </div>

 
  </div>
 <style>#row{margin-top:24px;}</style>
 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <div class='btn-group'><a href='add-farm_inputs.php' class='btn btn-info'><i class='fa fa-plus'></i> ADD NEW</a><a class='btn btn-primary' href='all-farm_inputs.php' class='btn btn-default'><i class='fa fa-refresh'></i> farm_inputs List</a>
 
  </div>

 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><form class='form-inline'><i class='fa fa-calendar'> Search Between Dates: </i>
 <div class='input-group'><input type='date' name='date1' class='form-control' required='required'><input type='date' name='date2' class='form-control' required='required'><button type='submit' class='btn btn-default'>&nbsp;<i class='fa fa-search'></i>&nbsp;&nbsp;SEARCH</button>
 
  </div>
</form>
 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <form class='form-inline'>
 <div class='input-group'><select name='type' class='form-control' required='required'><option value='name'>NAME</option><option value='quantity'>QUANTITY</option><option value='supplier_name'>SUPPLIER NAME</option><option value='md5hash'>MD5HASH</option></select><input type='text' name='query' class='form-control' required='required'><button style='margin-left:4px;border:1px solid lightgrey;' name='check' type='submit' class='btn btn-info'><i class='fa fa-search'></i> SEARCH</button>
 
  </div>
</form>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
<?php

 if(isset($_GET['id'])){ $r=new farm_inputs($_GET['id']); 
 $r->delete_farm_inputs();
 echo '<script>alert("ITEM WAS DELETED!"); window.location.href="all-farm_inputs.php";</script>
';  } 
 $alldata=farm_inputs::read_farm_inputs(); $column=farm_inputs::farm_inputs_constants(); 
 if(isset($_GET['check']) && isset($_GET['type']) && isset($_GET['query'])){ 
 if(in_array($_GET['type'],$column)){ 
 $alldata=farm_inputs::search_farm_inputs($_GET['type'],$_GET['query']); }
 else{
 $alldata=farm_inputs::read_farm_inputs();
} 
 if(isset($_GET['date1']) && isset($_GET['date2'])){
 extract($_GET); 
  $alldata= farm_inputs::check_between_dates_farm_inputs($date1,$date2); 
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
<tr><th class='name'>NAME</th><th class='quantity'>QUANTITY</th><th class='supplier_name'>SUPPLIER NAME</th><th class='md5hash'>DIGITAL SIGNATURE (MD5HASH)</th><td class='Edit'>Edit</td><td class='Delete'>Delete</td></tr>
</thead><tbody>
 <?php

 
 for($i=0; $i<count($alldata); $i++){ 
 $raw=$alldata[$i]; 
 
  ?><tr><td class='name'><?php

 echo $raw['name']; 
 
  ?></td><td class='quantity'><?php

 echo $raw['quantity']; 
 
  ?></td><td class='supplier_name'><?php

 echo $raw['supplier_name']; 
 
  ?></td><td class='md5hash'><?php

 echo $raw['md5hash']; 
 
  ?></td><td class='Edit'><a href='add-farm_inputs.php?id=<?php

 echo $raw['input_id']; 
 
  ?>' class='btn btn-success'><i class='fa fa-edit'></i> EDIT</a></td><td class='Delete'><a href='all-farm_inputs.php?id=<?php

 echo $raw['input_id']; 
 
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