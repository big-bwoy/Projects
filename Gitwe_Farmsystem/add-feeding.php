<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 $animals="";
 $a=animals::read_animals();
 for ($i=0; $i <count($a); $i++) { 
   $animals.="<option value='".$a[$i]['Animal_ID']."'>".$a[$i]['Animal_name']."</option>";
 }

 
 
  ?>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-feeding.php'><i class='fa fa-list'></i>&nbsp;&nbsp;feeding</a></li> <li><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;feeding</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new feeding($_GET['id']);
 echo $ss->update_feeding($Feed_Name,$Animal_ID); }
 else{ 
 $ss=new feeding(); echo $ss->create_feeding($Feed_Name,$Animal_ID); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp;New feeding info</h3>
 
  </div>

 <div class='card-body'><?php

 
$Feed_Name=$Animal_ID='';

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=feeding::get_feeding($id); 
 extract($data); 
 $e=animals::get_animals($Animal_ID);
 $Animal_ID="<option value='".$Animal_ID."'>".$e['Animal_name']."</option>";
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Feed_Name
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Feed_Name' class='form-control' placeholder='Feed_Name' value='<?php

 echo $Feed_Name; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_ID
 
  </div>


 <div class='col-12 col-sm-9'>
  <select name='Animal_ID' class='form-control' required='required'>
 <?php

 echo $Animal_ID.$animals; 
 
  ?></select>
 
  </div>
 

 
  </div>

 
  </div>

 <div class='card-footer'><button type='submit' name='save' class='btn btn-primary'><i class='fa fa-save'></i> OKAY</button>
 
  </div>

 
  </div>
</form>
 
  </div>

 
  </div>
<?php

 include_once('foot.php'); 
 
  ?>