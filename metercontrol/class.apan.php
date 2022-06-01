<?php
include_once("autoload.php");
class apan
{
		 static function piechartDetails(){
			$q="select distinct(meter_type) from meter";
			$data=array(); $data2=array(); $data3=array();
			$st=DB::connect()->prepare($q); $st->execute();
			while ($d=$st->fetch(PDO::FETCH_ASSOC)) {
				array_push($data, $d['meter_type']);
				array_push($data2, meter::listThem2Sum($d['meter_type']));
				array_push($data3,"rgb(".mt_rand(0,255).",".mt_rand(0,255).",".mt_rand(0,255).")");
			}
			return array(json_encode($data),json_encode($data2),json_encode($data3));
		}
}
 ?>