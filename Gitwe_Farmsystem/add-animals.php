<?php

include_once('head.php'); 
 
  ?><?php

 include_once('autoload.php');
 $Animal_serveddate="";
 
  ?>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><ul class='breadcrumb'><li><a href='all-animals.php'><i class='fa fa-list'></i>&nbsp;&nbsp;animals</a></li> <li><a href='#'><i class='fa fa-list'></i>&nbsp;&nbsp;New&nbsp;animals</a></li> </ul>
 
  </div>

 
  </div>

 <div class='row' id='row'>
 <div class='col-sm-12 col-md-12 col-xs-12 col-lg-12'><?php

 
 if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){ 
 extract($_POST);

 
  ?> 
 <div class='alert alert-info'><?php

 
 if(isset($_GET['id'])){ $ss=new animals($_GET['id']);
 echo $ss-> update_animals($Animal_name,$Animal_sex,$Animal_type,$Animal_breed,$Animal_weight,$Animal_birthdate,$Animal_vaccinationdate,$Animal_deathdate,$Animal_serveddate); }
 else{ 
 $ss=new animals(); echo $ss->create_animals($Animal_name,$Animal_sex,$Animal_type,$Animal_breed,$Animal_weight,$Animal_birthdate,$Animal_vaccinationdate,$Animal_deathdate,$Animal_serveddate); 
  } 
 
  ?> 
 
  </div>
<?php

  
 } 
 
  ?><form class='form' method='POST' id='form'>
 <div class='card'>
 <div class='card-header'><h3><i class='fa fa-info-circle'></i>&nbsp;&nbsp;&nbsp;New animals info</h3>
 
  </div>

 <div class='card-body'><?php

 
$Animal_name=$Animal_sex=$Animal_type=$Animal_breed=$Animal_weight=$Animal_birthdate=$Animal_vaccinationdate=$Animal_deathdate=$Animal_serveddate='';

 if(isset($_GET['id'])){ 
 $id=$_GET['id'];
$data=animals::get_animals($id); 
 extract($data); 
 } 
 
 
 
  ?>
 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_name
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Animal_name' class='form-control' placeholder='Animal_name' value='<?php

 echo $Animal_name; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_sex
 
  </div>


 <div class='col-12 col-sm-9'>
  <select name='Animal_sex' class='form-control'>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_type
 
  </div>


 <div class='col-12 col-sm-9'>
  <select name='Animal_type' class='form-control'>
    <option value="Cow">Cow</option>
    <option value="Goat">Goat</option>
    <option value="Sheep">Sheep</option>
    <option value="Chicken">Chicken</option>
    <option value="pig">pig</option>
    <option value="Rabbit">Rabbit</option>
    <option value="Duck">Duck</option>
    <option value="Camel">Camel</option>
    <option value="Horse">Horse</option>
  </select>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_breed
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Animal_breed' class='form-control' placeholder='Animal_breed' value='<?php

 echo $Animal_breed; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_weight
 
  </div>


 <div class='col-12 col-sm-9'><input type='text' name='Animal_weight' class='form-control' placeholder='Animal_weight' value='<?php

 echo $Animal_weight; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_birthdate
 
  </div>


 <div class='col-12 col-sm-9'><input type='date' name='Animal_birthdate' class='form-control' placeholder='Animal_birthdate' value='<?php

 echo $Animal_birthdate; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_vaccinationdate
 
  </div>


 <div class='col-12 col-sm-9'><input type='date' name='Animal_vaccinationdate' class='form-control' placeholder='Animal_vaccinationdate' value='<?php

 echo $Animal_vaccinationdate; 
 
  ?>' required='required'>
 
  </div>
 

 
  </div>

 <div class='row form-group'>
 <div class='col-12 col-sm-3'>Animal_deathdate
 
  </div>


 <div class='col-12 col-sm-9'><input type='date' name='Animal_deathdate' class='form-control' placeholder='Animal_deathdate' value='<?php

 echo $Animal_deathdate; 
 
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