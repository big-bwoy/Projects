<?php
 class menu_item{ 
 var $menu_type, $menu; 
 function __construct($menu_type=''){
 $items=array(array('animals'=>array('create'=>'add-animals.php','create_name'=>'animals','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create animals ','view'=>'all-animals.php','view_icon'=>'fa fa-list','view_name'=>'view-animals','view_permission'=>'allow user to view animals '));,array('births'=>array('create'=>'add-births.php','create_name'=>'births','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create births ','view'=>'all-births.php','view_icon'=>'fa fa-list','view_name'=>'view-births','view_permission'=>'allow user to view births '));,array('daily_production'=>array('create'=>'add-daily_production.php','create_name'=>'daily_production','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create daily_production ','view'=>'all-daily_production.php','view_icon'=>'fa fa-list','view_name'=>'view-daily_production','view_permission'=>'allow user to view daily_production '));,array('deaths'=>array('create'=>'add-deaths.php','create_name'=>'deaths','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create deaths ','view'=>'all-deaths.php','view_icon'=>'fa fa-list','view_name'=>'view-deaths','view_permission'=>'allow user to view deaths '));,array('feeding'=>array('create'=>'add-feeding.php','create_name'=>'feeding','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create feeding ','view'=>'all-feeding.php','view_icon'=>'fa fa-list','view_name'=>'view-feeding','view_permission'=>'allow user to view feeding '));,array('treatment'=>array('create'=>'add-treatment.php','create_name'=>'treatment','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create treatment ','view'=>'all-treatment.php','view_icon'=>'fa fa-list','view_name'=>'view-treatment','view_permission'=>'allow user to view treatment '));,array('user'=>array('create'=>'add-user.php','create_name'=>'user','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create user ','view'=>'all-user.php','view_icon'=>'fa fa-list','view_name'=>'view-user','view_permission'=>'allow user to view user '));,array('vaccination'=>array('create'=>'add-vaccination.php','create_name'=>'vaccination','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create vaccination ','view'=>'all-vaccination.php','view_icon'=>'fa fa-list','view_name'=>'view-vaccination','view_permission'=>'allow user to view vaccination '));,
 $this->menu_type=$menu_type;
 $this->menu=$items;  
 
 } 
 static function getForDataEntry(){
 $menu=$items=array(array('animals'=>array('create'=>'add-animals.php','create_name'=>'animals','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create animals ','view'=>'all-animals.php','view_icon'=>'fa fa-list','view_name'=>'view-animals','view_permission'=>'allow user to view animals '));,array('births'=>array('create'=>'add-births.php','create_name'=>'births','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create births ','view'=>'all-births.php','view_icon'=>'fa fa-list','view_name'=>'view-births','view_permission'=>'allow user to view births '));,array('daily_production'=>array('create'=>'add-daily_production.php','create_name'=>'daily_production','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create daily_production ','view'=>'all-daily_production.php','view_icon'=>'fa fa-list','view_name'=>'view-daily_production','view_permission'=>'allow user to view daily_production '));,array('deaths'=>array('create'=>'add-deaths.php','create_name'=>'deaths','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create deaths ','view'=>'all-deaths.php','view_icon'=>'fa fa-list','view_name'=>'view-deaths','view_permission'=>'allow user to view deaths '));,array('feeding'=>array('create'=>'add-feeding.php','create_name'=>'feeding','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create feeding ','view'=>'all-feeding.php','view_icon'=>'fa fa-list','view_name'=>'view-feeding','view_permission'=>'allow user to view feeding '));,array('treatment'=>array('create'=>'add-treatment.php','create_name'=>'treatment','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create treatment ','view'=>'all-treatment.php','view_icon'=>'fa fa-list','view_name'=>'view-treatment','view_permission'=>'allow user to view treatment '));,array('user'=>array('create'=>'add-user.php','create_name'=>'user','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create user ','view'=>'all-user.php','view_icon'=>'fa fa-list','view_name'=>'view-user','view_permission'=>'allow user to view user '));,array('vaccination'=>array('create'=>'add-vaccination.php','create_name'=>'vaccination','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create vaccination ','view'=>'all-vaccination.php','view_icon'=>'fa fa-list','view_name'=>'view-vaccination','view_permission'=>'allow user to view vaccination ')););
 $menus=array(); 
for($i=0; $i<count($menu); $i++){
 $data=json_decode($menu[$i]);
 if($data['type']=='create'){ 
 array_push($data,$menus); 
} 
 }
 return $menus; }
  
 static function getForDataReports(){
 $menu=$items=array(array('animals'=>array('create'=>'add-animals.php','create_name'=>'animals','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create animals ','view'=>'all-animals.php','view_icon'=>'fa fa-list','view_name'=>'view-animals','view_permission'=>'allow user to view animals '));,array('births'=>array('create'=>'add-births.php','create_name'=>'births','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create births ','view'=>'all-births.php','view_icon'=>'fa fa-list','view_name'=>'view-births','view_permission'=>'allow user to view births '));,array('daily_production'=>array('create'=>'add-daily_production.php','create_name'=>'daily_production','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create daily_production ','view'=>'all-daily_production.php','view_icon'=>'fa fa-list','view_name'=>'view-daily_production','view_permission'=>'allow user to view daily_production '));,array('deaths'=>array('create'=>'add-deaths.php','create_name'=>'deaths','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create deaths ','view'=>'all-deaths.php','view_icon'=>'fa fa-list','view_name'=>'view-deaths','view_permission'=>'allow user to view deaths '));,array('feeding'=>array('create'=>'add-feeding.php','create_name'=>'feeding','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create feeding ','view'=>'all-feeding.php','view_icon'=>'fa fa-list','view_name'=>'view-feeding','view_permission'=>'allow user to view feeding '));,array('treatment'=>array('create'=>'add-treatment.php','create_name'=>'treatment','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create treatment ','view'=>'all-treatment.php','view_icon'=>'fa fa-list','view_name'=>'view-treatment','view_permission'=>'allow user to view treatment '));,array('user'=>array('create'=>'add-user.php','create_name'=>'user','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create user ','view'=>'all-user.php','view_icon'=>'fa fa-list','view_name'=>'view-user','view_permission'=>'allow user to view user '));,array('vaccination'=>array('create'=>'add-vaccination.php','create_name'=>'vaccination','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create vaccination ','view'=>'all-vaccination.php','view_icon'=>'fa fa-list','view_name'=>'view-vaccination','view_permission'=>'allow user to view vaccination ')););
 $menus=array(); 

 return $menu; }
 
 } 
 ?>