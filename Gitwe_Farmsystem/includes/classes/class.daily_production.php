<?php

 include_once('autoload.php'); 

 class daily_production{

  
 var $primary_key; 
 function __construct($Production_ID=''){ 
 $this->primary_key=$Production_ID;
}

public function create_daily_production($Animal_ID,$Product_name,$Quantity,$Total){
$q='insert into daily_production(Animal_ID,Product_name,Quantity,Total) values(:Animal_ID,:Product_name,:Quantity,:Total)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Product_name',$Product_name);
$stmt->bindParam(':Quantity',$Quantity);
$stmt->bindParam(':Total',$Total);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_daily_production($start='0',$limit='1000'){
$q='select * from daily_production limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function daily_production_constants(){$const=array('Production_ID','Animal_ID','Product_name','Quantity','Total');

 return $const;
}
 
 
public function update_daily_production($Animal_ID,$Product_name,$Quantity,$Total){
 
$q='update daily_production set Animal_ID=:Animal_ID,Product_name=:Product_name,Quantity=:Quantity,Total=:Total where Production_ID=:5388_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Product_name',$Product_name);
$stmt->bindParam(':Quantity',$Quantity);
$stmt->bindParam(':Total',$Total);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_daily_production(){
$q='delete from daily_production where Production_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_daily_production($col,$value,$start='0',$limit='1000'){
$q='select * from daily_production where '.$col.' like :col limit'.' '.$start.','.$limit;
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


static function search_daily_production_between_2_dates($date1,$date2,$start='0',$limit='1000'){
$q='select * from daily_production where Time between DATE(:date1) and DATE(:date2) limit'.' '.$start.','.$limit;
 $data=array();
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(":date1",$date1);
$stmt->bindParam(":date2",$date2);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){
 array_push($data,$s); }
 $stmt=''; 
 return $data;
}


static function search_daily_production_between_2_dates_per_animal($Animal_ID,$date1,$date2,$start='0',$limit='1000'){
$q='select SUM(Quantity) as yote from daily_production where Animal_ID=:Animal_ID and Time between DATE(:date1) and DATE(:date2) limit'.' '.$start.','.$limit;
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(":date1",$date1);
$stmt->bindParam(":date2",$date2);
$stmt->bindParam(":Animal_ID",$Animal_ID);
$stmt->execute();
$s=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=null; 

 return $s['yote'];
}


static function analyze($date1,$date2){ //analyzing all animals --each each each..
$q='select distinct(Animal_ID) as mnyama from daily_production';
 $wanyama=array(); 
 $maziwa_total=array();

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(":date1",$date1);
$stmt->bindParam(":date2",$date2);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){ 
  $mnyama_personal_details=animals::get_animals($s['mnyama']);
  $jina_ya_mnyama=$mnyama_personal_details['Animal_name'];
 array_push($wanyama,$jina_ya_mnyama); 
 //each animal in this wile loop we push to the array stack
$mnyama_mmoja_maziwa_total=daily_production::search_daily_production_between_2_dates_per_animal($s['mnyama'],$date1,$date2);

if (empty($mnyama_mmoja_maziwa_total)) {
  $mnyama_mmoja_maziwa_total=0;
}
array_push($maziwa_total,$mnyama_mmoja_maziwa_total);
}
 $stmt=''; 
  $production=array('wanyama'=>$wanyama,'maziwa_total'=>$maziwa_total);
 return $production;
} 
 
static function get_daily_production($id){
$q='select * from daily_production where Production_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 

 } 
 
  ?>