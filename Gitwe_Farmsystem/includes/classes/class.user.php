<?php

 include_once('autoload.php'); 

 class user{

  
 var $primary_key; 
 function __construct($User_ID=''){ 
 $this->primary_key=$User_ID;
}

public function create_user($Username,$Password,$names){
$q='insert into user(Username,Password,names) values(:Username,:Password,:names)';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Username',$Username);
$stmt->bindParam(':Password',$Password);
$stmt->bindParam(':names',$names);
$stmt->execute();
 $stmt=null;
 return 'ok'; }
 
 
static function read_user($start='0',$limit='1000'){
$q='select * from user limit'.' '.$start.','.$limit;
$data=array();
$stmt=DB::connect()->prepare($q);
$stmt->execute();

 while($s=$stmt->fetch(PDO::FETCH_ASSOC)){


 array_push($data,$s); }
 $stmt=''; 
 return $data;
}


static function login_user($username,$password){ 
$q='select * from user where username=:username and password=:password';
 $data=array();

 $stmt=DB::connect()->prepare($q); 
$stmt->bindParam(':username',$username); 
$stmt->bindParam(':password',$password); 

 $stmt->execute(); 
 $data['rows']=$stmt->fetch(PDO::FETCH_ASSOC); 
 $data['row_count']=$stmt->rowCount(); 
 return $data; 
 }
 
 
static function user_constants(){$const=array('User_ID','Username','Password','names','date');

 return $const;
}
 
 
public function update_user($Username,$Password,$names){
 
$q='update user set Username=:Username,Password=:Password,names=:names where User_ID=:8994_';

$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':Username',$Username);
$stmt->bindParam(':Password',$Password);
$stmt->bindParam(':names',$names);
$stmt->bindParam(':8994_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


public function delete_user(){
$q='delete from user where User_ID=:8994_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':8994_',$this->primary_key);
$stmt->execute();
 $stmt=''; 
 return 'success'; }


static function search_user($col,$value,$start='0',$limit='1000'){
$q='select * from user where '.$col.' like :col limit'.' '.$start.','.$limit;
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
 
 
static function get_user($id){
$q='select * from user where User_ID=:8994_';
$stmt=DB::connect()->prepare($q);
$stmt->bindParam(':8994_',$id);
$stmt->execute();

  $data=$stmt->fetch(PDO::FETCH_ASSOC);
 $stmt=''; 
 return $data;
}
 
 static function check_between_dates_user($date1,$date2){
$q='select * from user where DATE(date) between :date1 and :date2 ';
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