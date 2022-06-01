<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-farm_produce.php'><i class='fa fa-list'></i>&nbsp;&nbsp;farm_produce</a></li> <li><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;farm_produce</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new farm_produce($_GET['id']);
 echo $ss->update_farm_produce($farmers_name,$farmers_tel,$location,$produce_type,$land_size,$md5hash); }
 else{ 
 $ss=new farm_produce(); echo $ss->create_farm_produce($farmers_name,$farmers_tel,$location,$produce_type,$land_size,$md5hash); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp; FARM PRODUCE/ info</h3>
 
  </div>

 <div class='card-body'><?php

 
$farmers_name=$farmers_tel=$location=$produce_type=$land_size=$md5hash='';
$md5hash=md5(mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9));
 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=farm_produce::get_farm_produce($id); 
 extract($data); 
 $produce_type="<option value='".$produce_type."'>".$produce_type."</option>"; 
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>FARMERS NAME
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='farmers_name' class='form-control' placeholder='farmers_name' value='<?php

 echo $farmers_name; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>FARMERS TEL
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='farmers_tel' class='form-control' placeholder='farmers_tel' value='<?php

 echo $farmers_tel; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>LOCATION
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='location' class='form-control' placeholder='location' value='<?php

 echo $location; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>PRODUCE TYPE
 
  </div>


 <div class='col-12 col-sm-9'><select name='produce_type' class='form-control' placeholder='produce_type' required='required'>
  <option>SELECT</option>
  <?php

 echo $produce_type;
 
  ?>
  <option value="CERIALS">CERIALS</option>
  <option value="BEANS">BEANS</option>
  <option value="OTHER PRODUCE">OTHER PRODUCE</option>
 </select>
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>LAND SIZE
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='land_size' class='form-control' placeholder='land_size' value='<?php

 echo $land_size; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>DIGITAL SIGNATURE (MD5HASH)
 
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