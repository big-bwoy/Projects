<?php

 include_once('autoload.php'); 

 class farm_inputs{

  
 var $primary_key; 
 function __construct($input_id=''){ 
 $this->primary_key=$input_id;
}

public function create_farm_inputs($name,$quantity,$supplier_name,$md5hash){
$q='insert into farm_inputs(name,quantity,supplier_name,md5hash) values(:name,:quantity,:supplier_name,:md5hash)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':quantity',$quantity);
$stmt->bindParam(':supplier_name',$supplier_name);
$stmt->bindParam(':md5hash',$md5hash);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_farm_inputs($start='0',$limit='1000'){
$q='select * from farm_inputs limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}
 
 
static function farm_inputs_constants(){$const=array('input_id','name','quantity','supplier_name','md5hash');

 return $const;
}
 
 
public function update_farm_inputs($name,$quantity,$supplier_name,$md5hash){
 
$q='update farm_inputs set name=:name,quantity=:quantity,supplier_name=:supplier_name,md5hash=:md5hash where input_id=:0382_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':quantity',$quantity);
$stmt->bindParam(':supplier_name',$supplier_name);
$stmt->bindParam(':md5hash',$md5hash);
$stmt->bindParam(':0382_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_farm_inputs(){
$q='delete from farm_inputs where input_id=:0382_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':0382_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_farm_inputs($col,$value,$start='0',$limit='1000'){
$q='select * from farm_inputs where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_farm_inputs($id){
$q='select * from farm_inputs where input_id=:0382_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':0382_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 

 } 
 
  ?>