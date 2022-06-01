<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>
 <div class='row' id='row' style='margin-top:24px;padding:4px;'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-farm_produce.php'><i class='fa fa-list'></i>&nbsp;&nbsp;All FARM PRODUCE</a></li> </ul>
 
  </div>

 
  </div>
 <style>#row{margin-top:24px;}</style>
 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <div class='btn-group'><a href='add-farm_produce.php' class='btn btn-info'><i class='fa fa-plus'></i> ADD NEW</a><a class='btn btn-primary' href='all-farm_produce.php' class='btn btn-default'><i class='fa fa-refresh'></i> farm_produce List</a>
 
  </div>

 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><form class='form-inline'><i class='fa fa-calendar'> Search Between Dates: </i>
 <div class='input-group'><input type='date' name='date1' class='form-control' required='required'><input type='date' name='date2' class='form-control' required='required'><button type='submit' class='btn btn-default'>&nbsp;<i class='fa fa-search'></i>&nbsp;&nbsp;SEARCH</button>
 
  </div>
</form>
 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <form class='form-inline'>
 <div class='input-group'><select name='type' class='form-control' required='required'><option value='farmers_name'>FARMERS NAME</option><option value='farmers_tel'>FARMERS TEL</option><option value='location'>LOCATION</option><option value='produce_type'>PRODUCE TYPE</option><option value='land_size'>LAND SIZE</option><option value='md5hash'>MD5HASH</option></select><input type='text' name='query' class='form-control' required='required'><button style='margin-left:4px;border:1px solid lightgrey;' name='check' type='submit' class='btn btn-info'><i class='fa fa-search'></i> SEARCH</button>
 
  </div>
</form>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
<?php

 if(isset($_GET['id'])){ $r=new farm_produce($_GET['id']); 
 $r->delete_farm_produce();
 echo '<script>alert("ITEM WAS DELETED!"); window.location.href="all-farm_produce.php";</script>
';  } 
 $alldata=farm_produce::read_farm_produce(); $column=farm_produce::farm_produce_constants(); 
 if(isset($_GET['check']) && isset($_GET['type']) && isset($_GET['query'])){ 
 if(in_array($_GET['type'],$column)){ 
 $alldata=farm_produce::search_farm_produce($_GET['type'],$_GET['query']); }
 else{
 $alldata=farm_produce::read_farm_produce();
} 
 if(isset($_GET['date1']) && isset($_GET['date2'])){
 extract($_GET); 
  $alldata= farm_produce::check_between_dates_farm_produce($date1,$date2); 
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
<tr><th class='farmers_name'>FARMERS NAME</th><th class='farmers_tel'>FARMERS TEL</th><th class='location'>LOCATION</th><th class='produce_type'>PRODUCE TYPE</th><th class='land_size'>LAND SIZE</th><th class='md5hash'>DIGITAL SIGNATURE (MD5HASH)</th><td class='Edit'>Edit</td><td class='Delete'>Delete</td></tr>
</thead><tbody>
 <?php

 
 for($i=0; $i<count($alldata); $i++){ 
 $raw=$alldata[$i]; 
 
  ?><tr><td class='farmers_name'><?php

 echo $raw['farmers_name']; 
 
  ?></td><td class='farmers_tel'><?php

 echo $raw['farmers_tel']; 
 
  ?></td><td class='location'><?php

 echo $raw['location']; 
 
  ?></td><td class='produce_type'><?php

 echo $raw['produce_type']; 
 
  ?></td><td class='land_size'><?php

 echo $raw['land_size']; 
 
  ?></td><td class='md5hash'><?php

 echo $raw['md5hash']; 
 
  ?></td><td class='Edit'><a href='add-farm_produce.php?id=<?php

 echo $raw['receipt_number']; 
 
  ?>' class='btn btn-success'><i class='fa fa-edit'></i> EDIT</a></td><td class='Delete'><a href='all-farm_produce.php?id=<?php

 echo $raw['receipt_number']; 
 
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