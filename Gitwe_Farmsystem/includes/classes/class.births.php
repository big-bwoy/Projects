<?php

 include_once('autoload.php'); 

 class births{

  
 var $primary_key; 
 function __construct($Birth_No=''){ 
 $this->primary_key=$Birth_No;
}

public function create_births($Birth_Date,$Child_ID,$Mother_ID){
$q='insert into births(Birth_Date,Child_ID,Mother_ID) values(:Birth_Date,:Child_ID,:Mother_ID)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Birth_Date',$Birth_Date);
$stmt->bindParam(':Child_ID',$Child_ID);
$stmt->bindParam(':Mother_ID',$Mother_ID);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_births($start='0',$limit='1000'){
$q='select * from births limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function births_constants(){$const=array('Birth_No','Birth_Date','Child_ID','Mother_ID','date');

 return $const;
}
 
 
public function update_births($Birth_Date,$Child_ID,$Mother_ID){
 
$q='update births set Birth_Date=:Birth_Date,Child_ID=:Child_ID,Mother_ID=:Mother_ID where Birth_No=:5388_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Birth_Date',$Birth_Date);
$stmt->bindParam(':Child_ID',$Child_ID);
$stmt->bindParam(':Mother_ID',$Mother_ID);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_births(){
$q='delete from births where Birth_No=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_births($col,$value,$start='0',$limit='1000'){
$q='select * from births where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_births($id){
$q='select * from births where Birth_No=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_births($date1,$date2){
$q='select * from births where DATE(date) between :date1 and :date2 ';
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