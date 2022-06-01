<?php include_once("autoload.php");

class meter extends app
{
	var $id,$details,$meter_exists,$details0,$meter_exists0;
	function __construct($id="")
	{
		$this->db=DB::connect();
		$this->id=$id;
		$q="select * from meter where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$this->details=$stmt->fetch(PDO::FETCH_ASSOC);
		$this->meter_exists=$stmt->rowCount();


		$q0="select * from meter where meter_number=:id";
		$stmt0=$this->db->prepare($q0);
		$stmt0->bindParam(":id",$id);
		$stmt0->execute();
		$this->details0=$stmt0->fetch(PDO::FETCH_ASSOC);
		$this->meter_exists0=$stmt0->rowCount();


		parent::__construct();
	}

	public function addNew($meter_number,$meter_size,$meter_type,$meter_make,$meter_year,$meter_category,$supplier_name,$batch_number,$receipt_number,$batch_date,$receipt_date,$contractor_name,$name){
		$q="insert into meter(meter_number,meter_size,meter_type,meter_make,meter_year,meter_category,supplier_name,batch_number,receipt_number,batch_date,receipt_date,contractor_name,name) 
		values
		(:meter_number,:meter_size,:meter_type,:meter_make,:meter_year,:meter_category,:supplier_name,:batch_number,:receipt_number,:batch_date,:receipt_date,:contractor_name,:name)";

		$me=new meter($meter_number);
		if ($me->meter_exists0 >0) {
			return "Failed! Meter number already exists in the system.";
		}else{
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":meter_number",$meter_number);
		$stmt->bindParam(":meter_size",$meter_size);
		$stmt->bindParam(":meter_type",$meter_type);
		$stmt->bindParam(":meter_make",$meter_make);
		$stmt->bindParam(":meter_year",$meter_year);
		$stmt->bindParam(":meter_category",$meter_category);
		$stmt->bindParam(":supplier_name",$supplier_name);
		$stmt->bindParam(":batch_number",$batch_number);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->bindParam(":batch_date",$batch_date);
		$stmt->bindParam(":receipt_date",$receipt_date);
		$stmt->bindParam(":contractor_name",$contractor_name);
		$stmt->bindParam(":name",$name);
		
		$stmt->execute();
		return "success"; }
	}

	public function update($id,$meter_number,$meter_size,$meter_type,$meter_make,$meter_year,$meter_category,$supplier_name,$batch_number,$receipt_number,$batch_date,$receipt_date,$contractor_name,$name){
		$q="update meter set meter_number=:meter_number,meter_size=:meter_size,meter_type=:meter_type,meter_make=:meter_make,meter_year=:meter_year,meter_category=:meter_category,supplier_name=:supplier_name,batch_number=:batch_number,receipt_number=:receipt_number, batch_date=:batch_date, receipt_date=:receipt_date, contractor_name=:contractor_name,name=:name where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":id",$id);
		$stmt->bindParam(":meter_number",$meter_number);
		$stmt->bindParam(":meter_size",$meter_size);
		$stmt->bindParam(":meter_type",$meter_type);
		$stmt->bindParam(":meter_make",$meter_make);
		$stmt->bindParam(":meter_year",$meter_year);
		$stmt->bindParam(":meter_category",$meter_category);
		$stmt->bindParam(":supplier_name",$supplier_name);
		$stmt->bindParam(":batch_number",$batch_number);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->bindParam(":batch_date",$batch_date);
		$stmt->bindParam(":receipt_date",$receipt_date);
		$stmt->bindParam(":contractor_name",$contractor_name);
		$stmt->bindParam(":name",$name);
		$stmt->execute();
		return "success! updated!";
	}


	public function remove($id){
		$q="delete from meter where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		return "success";
	}

	public function listThem(){
		$q= "select * from meter WHERE contractor_name=''";
		$data=array();
		$stmt=$this->db->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}




	public function listThem2(){
		$q="select * from meter where contractor_name=''";
		$data=array();
		$stmt=$this->db->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}


	 static function listThem2Sum($meter_make){
		$q="select count(*) as total from meter where contractor_name='' and meter_type=:meter_make";
		$data=array();
		$stmt=DB::connect()->prepare($q);
		$stmt->bindParam(":meter_make",$meter_make);
		$stmt->execute();
	$s=$stmt->fetch(PDO::FETCH_ASSOC);
		return $s["total"];
	}




	






}








 ?>