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
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-births.php'><i class='fa fa-list'></i>&nbsp;&nbsp;births</a></li> <li><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;births</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new births($_GET['id']);
 echo $ss->update_births($Birth_Date,$Child_ID,$Mother_ID); }
 else{ 
 $ss=new births(); echo $ss->create_births($Birth_Date,$Child_ID,$Mother_ID); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp;New births info</h3>
 
  </div>

 <div class='card-body'><?php

 
$Birth_Date=$Child_ID=$Mother_ID='';

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=births::get_births($id); 
 extract($data); 
 $e=animals::get_animals($Mother_ID);
 $Mother_ID="<option value='".$Mother_ID."'>".$e['Animal_name']."</option>";
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Birth_Date
 
  </div>


 <div class='col-12 col-sm-9'><input type='date' name='Birth_Date' class='form-control' placeholder='Birth_Date' value='<?php

 echo $Birth_Date; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Child_ID
 
  </div>


 <div class='col-12 col-sm-9'><select name='Child_ID' class='form-control' placeholder='Child_ID' required='required'>
   <?php

 echo $Child_ID.$animals; 
 
  ?>
</select>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Mother
 
  </div>


 <div class='col-12 col-sm-9'><select name='Mother_ID' class='form-control' placeholder='Mother_ID' required='required'>
 <?php

 echo $Mother_ID.$animals; 
 
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