<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>
 <div class='row' id='row' style='margin-top:24px;padding:4px;'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-animals.php'><i class='fa fa-list'></i>&nbsp;&nbsp;All animals</a></li> </ul>
 
  </div>

 
  </div>
 <style>#row{margin-top:24px;}</style>
 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <div class='btn-group'><a href='add-animals.php' class='btn btn-info'><i class='fa fa-plus'></i> ADD NEW</a><a class='btn btn-primary' href='all-animals.php' class='btn btn-default'><i class='fa fa-refresh'></i> animals List</a>
 
  </div>

 
  <center class="title">
            <h1>Animal List</h1>
            </center>
<p align="right"><button type="button" name="print" value="print" onclick="getPrinter()" style="border-radius: 10px; border: none; text-align: center; color: navy-blue;" > Print</button></p>
 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><form class='form-inline'><i class='fa fa-calendar'> Search Between Dates: </i>
 <div class='input-group'><input type='date' name='date1' class='form-control' required='required'><input type='date' name='date2' class='form-control' required='required'><button type='submit' class='btn btn-default'>&nbsp;<i class='fa fa-search'></i>&nbsp;&nbsp;SEARCH</button>
 
  </div>
</form>
 
  </div></div>

 <div class='row' id='row'><div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
 <form class='form-inline'>
 <div class='input-group'><select name='type' class='form-control' required='required'><option value='Animal_name'>Animal_name</option><option value='Animal_sex'>Animal_sex</option><option value='Animal_type'>Animal_type</option><option value='Animal_breed'>Animal_breed</option><option value='Animal_weight'>Animal_weight</option><option value='Animal_birthdate'>Animal_birthdate</option><option value='Animal_vaccinationdate'>Animal_vaccinationdate</option><option value='Animal_deathdate'>Animal_deathdate</option><option value='Animal_serveddate'>Animal_serveddate</option></select><input type='text' name='query' class='form-control' required='required'><button style='margin-left:4px;border:1px solid lightgrey;' name='check' type='submit' class='btn btn-info'><i class='fa fa-search'></i> SEARCH</button>
 
  </div>
</form>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'>
<?php

 if(isset($_GET['id'])){ $r=new animals($_GET['id']); 
 $r->delete_animals();
 echo '<script>alert("ITEM WAS DELETED!"); window.location.href="all-animals.php";</script>
';  } 
 $alldata=animals::read_animals(); $column=animals::animals_constants(); 
 if(isset($_GET['check']) && isset($_GET['type']) && isset($_GET['query'])){ 
 if(in_array($_GET['type'],$column)){ 
 $alldata=animals::search_animals($_GET['type'],$_GET['query']); }
 else{
 $alldata=animals::read_animals();
} 
 if(isset($_GET['date1']) && isset($_GET['date2'])){
 extract($_GET); 
  $alldata= animals::check_between_dates_animals($date1,$date2); 
 } 
 } 
  ?>
<center><b><?php

 echo count($alldata); 
 
  ?> Records Found.</b></center><p><hr><p>
 <div class='table-responsive'>

<div class='table-responsive'>
<table  cellpadding="1" cellspacing="2" border="0" width="100%" class="table table-bordered" id="nope">
<thead>
<tr><th class='Animal_name'>Animal_name</th><th class='Animal_sex'>Animal_sex</th><th class='Animal_type'>Animal_type</th><th class='Animal_breed'>Animal_breed</th><th class='Animal_weight'>Animal_weight</th><th class='Animal_birthdate'>Animal_birthdate</th><th class='Animal_vaccinationdate'>Animal_vaccinationdate</th><th class='Animal_deathdate'>Animal_deathdate</th><th class='Animal_serveddate'>Animal_serveddate</th><td class='Edit'>Edit</td><td class='Delete'>Delete</td></tr>
</thead><tbody>
 <?php

 
 for($i=0; $i<count($alldata); $i++){ 
 $raw=$alldata[$i]; 
 
  ?><tr><td class='Animal_name'><?php

 echo $raw['Animal_name']; 
 
  ?></td><td class='Animal_sex'><?php

 echo $raw['Animal_sex']; 
 
  ?></td><td class='Animal_type'><?php

 echo $raw['Animal_type']; 
 
  ?></td><td class='Animal_breed'><?php

 echo $raw['Animal_breed']; 
 
  ?></td><td class='Animal_weight'><?php

 echo $raw['Animal_weight']; 
 
  ?></td><td class='Animal_birthdate'><?php

 echo $raw['Animal_birthdate']; 
 
  ?></td><td class='Animal_vaccinationdate'><?php

 echo $raw['Animal_vaccinationdate']; 
 
  ?></td><td class='Animal_deathdate'><?php
if ($raw['Animal_deathdate']!=="") {
 echo $raw['Animal_deathdate']; 
}else{
  echo "N/A";
}
 
 
  ?></td><td class='Animal_serveddate'><?php

 echo $raw['Animal_serveddate']; 
 
  ?></td><td class='Edit'><a href='add-animals.php?id=<?php

 echo $raw['Animal_ID']; 
 
  ?>' class='btn btn-success'><i class='fa fa-edit'></i> EDIT</a></td><td class='Delete'><a href='all-animals.php?id=<?php

 echo $raw['Animal_ID']; 
 
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
   <script type="text/javascript">
    
    document.getElementById('nope');
    

   </script>