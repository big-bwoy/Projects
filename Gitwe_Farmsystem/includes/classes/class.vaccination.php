<?php

 include_once('autoload.php'); 

 class vaccination{

  
 var $primary_key; 
 function __construct($Vaccination_ID=''){ 
 $this->primary_key=$Vaccination_ID;
}

public function create_vaccination($Vaccination_Date,$Animal_ID){
$q='insert into vaccination(Vaccination_Date,Animal_ID) values(:Vaccination_Date,:Animal_ID)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Vaccination_Date',$Vaccination_Date);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_vaccination($start='0',$limit='1000'){
$q='select * from vaccination limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function vaccination_constants(){$const=array('Vaccination_ID','Vaccination_Date','Animal_ID','date');

 return $const;
}
 
 
public function update_vaccination($Vaccination_Date,$Animal_ID){
 
$q='update vaccination set Vaccination_Date=:Vaccination_Date,Animal_ID=:Animal_ID where Vaccination_ID=:5388_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Vaccination_Date',$Vaccination_Date);
$stmt->bindParam(':Animal_ID',$Animal_ID);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_vaccination(){
$q='delete from vaccination where Vaccination_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_vaccination($col,$value,$start='0',$limit='1000'){
$q='select * from vaccination where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_vaccination($id){
$q='select * from vaccination where Vaccination_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_vaccination($date1,$date2){
$q='select * from vaccination where DATE(date) between :date1 and :date2 ';
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