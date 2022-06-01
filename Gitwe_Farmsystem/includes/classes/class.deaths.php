<?php

 include_once('autoload.php'); 

 class deaths{

  
 var $primary_key; 
 function __construct($Death_No=''){ 
 $this->primary_key=$Death_No;
}

public function create_deaths($Animal_ID,$Death_Date){
$q='insert into deaths(Animal_ID,Death_Date) values(:Animal_ID,:Death_Date)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Death_Date',$Death_Date);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_deaths($start='0',$limit='1000'){
$q='select * from deaths limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function deaths_constants(){$const=array('Death_No','Animal_ID','Death_Date','date');

 return $const;
}
 
 
public function update_deaths($Animal_ID,$Death_Date){
 
$q='update deaths set Animal_ID=:Animal_ID,Death_Date=:Death_Date where Death_No=:5388_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':Death_Date',$Death_Date);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_deaths(){
$q='delete from deaths where Death_No=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_deaths($col,$value,$start='0',$limit='1000'){
$q='select * from deaths where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_deaths($id){
$q='select * from deaths where Death_No=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_deaths($date1,$date2){
$q='select * from deaths where DATE(date) between :date1 and :date2 ';
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