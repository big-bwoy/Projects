<?php
include_once("autoload.php");
class DB extends app 
{
	function __construct(){
		parent::__construct();
		app::main();

	}
	public static function connect(){
		try{

			$con=new PDO("mysql:host=localhost;dbname=MeterControl","root","viewlink8080");
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $con;
	}
}











 ?>