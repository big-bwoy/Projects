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
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-servicing.php'><i class='fa fa-list'></i>&nbsp;&nbsp;servicing</a></li> <li><a href='add-servicing.php'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;servicing</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new servicing($_GET['id']);
 echo $ss->update_servicing($Animal_ID,$Service_date,$Served_by); }
 else{ 
 $ss=new servicing(); echo $ss->create_servicing($Animal_ID,$Service_date,$Served_by); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp; SERVICING/ info</h3>
 
  </div>

 <div class='card-body'><?php

 
$Animal_ID=$Service_date=$Served_by='';

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=servicing::get_servicing($id); 
 extract($data); 
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>SELECT ANIMAL 
 
  </div>


 <div class='col-12 col-sm-9'>

  <select name='Animal_ID' class='form-control' required='required'>
 <?php

 echo $Animal_ID.$animals; 
 
  ?></select>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>SERVICE DATE
 
  </div>


 <div class='col-12 col-sm-9'><input type='date' name='Service_date' class='form-control' placeholder='Service_date' value='<?php

 echo $Service_date; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

  <div class='row form-group'>
 <div class='col-12 col-sm-3'>SERVED BY
 
  </div>


 <div class='col-12 col-sm-9'> <select name='Served_by' class='form-control' required='required'>
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