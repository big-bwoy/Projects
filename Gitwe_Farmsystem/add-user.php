<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 
 
  ?>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-user.php'><i class='fa fa-list'></i>&nbsp;&nbsp;user</a></li> <li><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;user</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new user($_GET['id']);
 echo $ss->update_user($Username,$Password,$names); }
 else{ 
 $ss=new user(); echo $ss->create_user($Username,$Password,$names); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp;New user info</h3>
 
  </div>

 <div class='card-body'><?php

 
$Username=$Password=$names='';

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=user::get_user($id); 
 extract($data); 
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Username
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Username' class='form-control' placeholder='Username' value='<?php

 echo $Username; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Password
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Password' class='form-control' placeholder='Password' value='<?php

 echo $Password; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>names
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='names' class='form-control' placeholder='names' value='<?php

 echo $names; 
 
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