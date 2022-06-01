<?php

 include_once('autoload.php'); 

 class servicing{

  
 var $primary_key; 
 function __construct($Service_ID=''){ 
 $this->primary_key=$Service_ID;
}

public function create_servicing($Animal_ID,$Service_date,$Served_by){
$q='insert into servicing(Animal_ID,Service_date,Served_by) values(:Animal_ID,:Service_date,:Served_by)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Service_date',$Service_date);
$stmt->bindParam(':Served_by',$Served_by);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_servicing($start='0',$limit='1000'){
$q='select * from servicing limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function servicing_constants(){$const=array('Service_ID','Animal_ID','Service_date','Served_by','Date');

 return $const;
}
 
 
public function update_servicing($Animal_ID,$Service_date,$Served_by){
 
$q='update servicing set Animal_ID=:Animal_ID,Service_date=:Service_date,Served_by=:Served_by where Service_ID=:4395_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Service_date',$Service_date);
$stmt->bindParam(':Served_by',$Served_by);
$stmt->bindParam(':4395_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_servicing(){
$q='delete from servicing where Service_ID=:4395_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':4395_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_servicing($col,$value,$start='0',$limit='1000'){
$q='select * from servicing where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_servicing($id){
$q='select * from servicing where Service_ID=:4395_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':4395_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_servicing($date1,$date2){
$q='select * from servicing where DATE(Date) between :date1 and :date2 ';
  $data=array();
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':date1',$date1);
$stmt->bindParam(':date2',$date2);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){
 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 


 } 
 
  ?>