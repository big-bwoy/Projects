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
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-treatment.php'><i class='fa fa-list'></i>&nbsp;&nbsp;treatment</a></li> <li><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;treatment</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new treatment($_GET['id']);
 echo $ss->update_treatment($Animal_ID,$Drug_name,$Description,$Treatment_date); }
 else{ 
 $ss=new treatment(); echo $ss->create_treatment($Animal_ID,$Drug_name,$Description,$Treatment_date); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp;New treatment info</h3>
 
  </div>

 <div class='card-body'><?php

 
$Animal_ID=$Drug_name=$Description=$Treatment_date='';

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=treatment::get_treatment($id); 
 extract($data); 
 $e=animals::get_animals($Animal_ID);
 $Animal_ID="<option value='".$Animal_ID."'>".$e['Animal_name']."</option>";
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_ID
 
  </div>


 <div class='col-12 col-sm-9'><select name='Animal_ID' class='form-control' required='required'>
 <?php

 echo $Animal_ID.$animals; 
 
  ?></select>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Drug_name
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Drug_name' class='form-control' placeholder='Drug_name' value='<?php

 echo $Drug_name; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Description
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Description' class='form-control' placeholder='Description' value='<?php

 echo $Description; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

<div class='row form-group'>
 <div class='col-12 col-sm-3'>Treatment_date
 
  </div>


 <div class='col-12 col-sm-9'><input type='date' name='Treatment_date' class='form-control' placeholder='Treatment_date' value='<?php

 echo $Treatment_date; 
 
  ?>'>
 
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