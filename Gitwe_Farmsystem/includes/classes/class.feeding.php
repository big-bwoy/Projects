<?php

 include_once('autoload.php'); 

 class feeding{

  
 var $primary_key; 
 function __construct($Feeding_ID=''){ 
 $this->primary_key=$Feeding_ID;
}

public function create_feeding($Feed_Name,$Animal_ID){
$q='insert into feeding(Feed_Name,Animal_ID) values(:Feed_Name,:Animal_ID)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Feed_Name',$Feed_Name);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_feeding($start='0',$limit='1000'){
$q='select * from feeding limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function feeding_constants(){$const=array('Feeding_ID','Feed_Name','Animal_ID','date');

 return $const;
}
 
 
public function update_feeding($Feed_Name,$Animal_ID){
 
$q='update feeding set Feed_Name=:Feed_Name,Animal_ID=:Animal_ID where Feeding_ID=:5388_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Feed_Name',$Feed_Name);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_feeding(){
$q='delete from feeding where Feeding_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_feeding($col,$value,$start='0',$limit='1000'){
$q='select * from feeding where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_feeding($id){
$q='select * from feeding where Feeding_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_feeding($date1,$date2){
$q='select * from feeding where DATE(date) between :date1 and :date2 ';
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