<?php

 include_once('autoload.php'); 

 class animals{

  
 var $primary_key; 
 function __construct($Animal_ID=''){ 
 $this->primary_key=$Animal_ID;
}

public function create_animals($Animal_name,$Animal_sex,$Animal_type,$Animal_breed,$Animal_weight,$Animal_birthdate,$Animal_vaccinationdate,$Animal_deathdate,$Animal_serveddate){
$q='insert into animals(Animal_name,Animal_sex,Animal_type,Animal_breed,Animal_weight,Animal_birthdate,Animal_vaccinationdate,Animal_deathdate,Animal_serveddate) values(:Animal_name,:Animal_sex,:Animal_type,:Animal_breed,:Animal_weight,:Animal_birthdate,:Animal_vaccinationdate,:Animal_deathdate,:Animal_serveddate)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_name',$Animal_name);
$stmt->bindParam(':Animal_sex',$Animal_sex);
$stmt->bindParam(':Animal_type',$Animal_type);
$stmt->bindParam(':Animal_breed',$Animal_breed);
$stmt->bindParam(':Animal_weight',$Animal_weight);
$stmt->bindParam(':Animal_birthdate',$Animal_birthdate);
$stmt->bindParam(':Animal_vaccinationdate',$Animal_vaccinationdate);
$stmt->bindParam(':Animal_deathdate',$Animal_deathdate);
$stmt->bindParam(':Animal_serveddate',$Animal_serveddate);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_animals($start='0',$limit='1000'){
$q='select * from animals limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function animals_constants(){$const=array('Animal_ID','Animal_name','Animal_sex','Animal_type','Animal_breed','Animal_weight','Animal_birthdate','Animal_vaccinationdate','Animal_deathdate','Animal_serveddate','date');

 return $const;
}
 
 
public function update_animals($Animal_name,$Animal_sex,$Animal_type,$Animal_breed,$Animal_weight,$Animal_birthdate,$Animal_vaccinationdate,$Animal_deathdate,$Animal_serveddate){
 
$q='update animals set Animal_name=:Animal_name,Animal_sex=:Animal_sex,Animal_type=:Animal_type,Animal_breed=:Animal_breed,Animal_weight=:Animal_weight,Animal_birthdate=:Animal_birthdate,Animal_vaccinationdate=:Animal_vaccinationdate,Animal_deathdate=:Animal_deathdate,Animal_serveddate=:Animal_serveddate where Animal_ID=:5388_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Animal_name',$Animal_name);
$stmt->bindParam(':Animal_sex',$Animal_sex);
$stmt->bindParam(':Animal_type',$Animal_type);
$stmt->bindParam(':Animal_breed',$Animal_breed);
$stmt->bindParam(':Animal_weight',$Animal_weight);
$stmt->bindParam(':Animal_birthdate',$Animal_birthdate);
$stmt->bindParam(':Animal_vaccinationdate',$Animal_vaccinationdate);
$stmt->bindParam(':Animal_deathdate',$Animal_deathdate);
$stmt->bindParam(':Animal_serveddate',$Animal_serveddate);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_animals(){
$q='delete from animals where Animal_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_animals($col,$value,$start='0',$limit='1000'){
$q='select * from animals where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_animals($id){
$q='select * from animals where Animal_ID=:5388_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':5388_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_animals($date1,$date2){
$q='select * from animals where DATE(date) between :date1 and :date2 ';
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