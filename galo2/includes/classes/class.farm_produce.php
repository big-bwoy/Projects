<?php

 include_once('autoload.php'); 

 class farm_produce{

  
 var $primary_key; 
 function __construct($receipt_number=''){ 
 $this->primary_key=$receipt_number;
}

public function create_farm_produce($farmers_name,$farmers_tel,$location,$produce_type,$land_size,$md5hash){
$q='insert into farm_produce(farmers_name,farmers_tel,location,produce_type,land_size,md5hash) values(:farmers_name,:farmers_tel,:location,:produce_type,:land_size,:md5hash)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':farmers_name',$farmers_name);
$stmt->bindParam(':farmers_tel',$farmers_tel);
$stmt->bindParam(':location',$location);
$stmt->bindParam(':produce_type',$produce_type);
$stmt->bindParam(':land_size',$land_size);
$stmt->bindParam(':md5hash',$md5hash);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_farm_produce($start='0',$limit='1000'){
$q='select * from farm_produce limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function farm_produce_constants(){$const=array('receipt_number','farmers_name','farmers_tel','location','produce_type','land_size','md5hash','date');

 return $const;
}
 
 
public function update_farm_produce($farmers_name,$farmers_tel,$location,$produce_type,$land_size,$md5hash){
 
$q='update farm_produce set farmers_name=:farmers_name,farmers_tel=:farmers_tel,location=:location,produce_type=:produce_type,land_size=:land_size,md5hash=:md5hash where receipt_number=:0382_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':farmers_name',$farmers_name);
$stmt->bindParam(':farmers_tel',$farmers_tel);
$stmt->bindParam(':location',$location);
$stmt->bindParam(':produce_type',$produce_type);
$stmt->bindParam(':land_size',$land_size);
$stmt->bindParam(':md5hash',$md5hash);
$stmt->bindParam(':0382_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_farm_produce(){
$q='delete from farm_produce where receipt_number=:0382_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':0382_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_farm_produce($col,$value,$start='0',$limit='1000'){
$q='select * from farm_produce where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_farm_produce($id){
$q='select * from farm_produce where receipt_number=:0382_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':0382_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_farm_produce($date1,$date2){
$q='select * from farm_produce where DATE(date) between :date1 and :date2 ';
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