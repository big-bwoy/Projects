<?php
 class menu_item{ 
 var $menu_type, $menu; 
 function __construct($menu_type=''){
 $items=array(array('farm_inputs'=>array('create'=>'add-farm_inputs.php','create_name'=>'farm_inputs','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create farm_inputs ','view'=>'all-farm_inputs.php','view_icon'=>'fa fa-list','view_name'=>'view-farm_inputs','view_permission'=>'allow user to view farm_inputs '));,array('farm_produce'=>array('create'=>'add-farm_produce.php','create_name'=>'farm_produce','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create farm_produce ','view'=>'all-farm_produce.php','view_icon'=>'fa fa-list','view_name'=>'view-farm_produce','view_permission'=>'allow user to view farm_produce '));,array('users'=>array('create'=>'add-users.php','create_name'=>'users','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create users ','view'=>'all-users.php','view_icon'=>'fa fa-list','view_name'=>'view-users','view_permission'=>'allow user to view users '));,
 $this->menu_type=$menu_type;
 $this->menu=$items;  
 
 } 
 static function getForDataEntry(){
 $menu=$items=array(array('farm_inputs'=>array('create'=>'add-farm_inputs.php','create_name'=>'farm_inputs','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create farm_inputs ','view'=>'all-farm_inputs.php','view_icon'=>'fa fa-list','view_name'=>'view-farm_inputs','view_permission'=>'allow user to view farm_inputs '));,array('farm_produce'=>array('create'=>'add-farm_produce.php','create_name'=>'farm_produce','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create farm_produce ','view'=>'all-farm_produce.php','view_icon'=>'fa fa-list','view_name'=>'view-farm_produce','view_permission'=>'allow user to view farm_produce '));,array('users'=>array('create'=>'add-users.php','create_name'=>'users','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create users ','view'=>'all-users.php','view_icon'=>'fa fa-list','view_name'=>'view-users','view_permission'=>'allow user to view users ')););
 $menus=array(); 
for($i=0; $i<count($menu); $i++){
 $data=json_decode($menu[$i]);
 if($data['type']=='create'){ 
 array_push($data,$menus); 
} 
 }
 return $menus; }
  
 static function getForDataReports(){
 $menu=$items=array(array('farm_inputs'=>array('create'=>'add-farm_inputs.php','create_name'=>'farm_inputs','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create farm_inputs ','view'=>'all-farm_inputs.php','view_icon'=>'fa fa-list','view_name'=>'view-farm_inputs','view_permission'=>'allow user to view farm_inputs '));,array('farm_produce'=>array('create'=>'add-farm_produce.php','create_name'=>'farm_produce','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create farm_produce ','view'=>'all-farm_produce.php','view_icon'=>'fa fa-list','view_name'=>'view-farm_produce','view_permission'=>'allow user to view farm_produce '));,array('users'=>array('create'=>'add-users.php','create_name'=>'users','create_icon'=>'fa fa-plus','create_permission'=>'allow user to create users ','view'=>'all-users.php','view_icon'=>'fa fa-list','view_name'=>'view-users','view_permission'=>'allow user to view users ')););
 $menus=array(); 

 return $menu; }
 
 } 
 ?>