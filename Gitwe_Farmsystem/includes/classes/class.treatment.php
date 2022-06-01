<?php

 include_once('autoload.php'); 

 class treatment{

  
 var $primary_key; 
 function __construct($Treatment_ID=''){ 
 $this->primary_key=$Treatment_ID;
}

public function create_treatment($Animal_ID,$Drug_name,$Description,$Treatment_date){
$q='insert into treatment(Animal_ID,Drug_name,Description,Treatment_date) values(:Animal_ID,:Drug_name,:Description,:Treatment_date)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Drug_name',$Drug_name);
$stmt->bindParam(':Description',$Description);
$stmt->bindParam(':Treatment_date',$Treatment_date);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_treatment($start='0',$limit='1000'){
$q='select * from treatment limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function treatment_constants(){$const=array('Treatment_ID','Animal_ID','Drug_name','Description','Treatment_date','date');

 return $const;
}
 
 
public function update_treatment($Animal_ID,$Drug_name,$Description,$Treatment_date){
 
$q='update treatment set Animal_ID=:Animal_ID,Drug_name=:Drug_name,Description=:Description,Treatment_date=:Treatment_date where Treatment_ID=:5388_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Drug_name',$Drug_name);
$stmt->bindParam(':Description',$Description);
$stmt->bindParam(':Treatment_date',$Treatment_date);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_treatment(){
$q='delete from treatment where Treatment_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_treatment($col,$value,$start='0',$limit='1000'){
$q='select * from treatment where '.$col.' like :col limit'.' '.$start.','.$limit;
 $value='%'.$value.'%'; 
 $data=array();
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':col',$value);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){
 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function get_treatment($id){
$q='select * from treatment where Treatment_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 

 } 
 
  ?>