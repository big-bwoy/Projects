<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-farm_inputs.php'><i class='fa fa-list'></i>&nbsp;&nbsp;farm_inputs</a></li> <li><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;farm_inputs</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new farm_inputs($_GET['id']);
 echo $ss->update_farm_inputs($name,$quantity,$supplier_name,$md5hash); }
 else{ 
 $ss=new farm_inputs(); echo $ss->create_farm_inputs($name,$quantity,$supplier_name,$md5hash); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp; FARM INPUTS/ info</h3>
 
  </div>

 <div class='card-body'><?php

 
$name=$quantity=$supplier_name=$md5hash='';
$md5hash=md5(mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9));

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=farm_inputs::get_farm_inputs($id); 
 extract($data); 
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>NAME
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='name' class='form-control' placeholder='name' value='<?php

 echo $name; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>QUANTITY
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='quantity' class='form-control' placeholder='quantity' value='<?php

 echo $quantity; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>SUPPLIER NAME
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='supplier_name' class='form-control' placeholder='supplier_name' value='<?php

 echo $supplier_name; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>DIGITAL SIGNATURE(MD5HASH)
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='md5hash' class='form-control' placeholder='md5hash' value='<?php

 echo $md5hash; 
 
  ?>' required='required'>
 
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