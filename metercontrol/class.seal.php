<?php include_once("autoload.php");

class seal extends app
{
	var $id,$details,$seal_exists,$details0,$seal_exists0;
	function __construct($id="")
	{
		$this->db=DB::connect();
		$this->id=$id;
		$q="select * from seal where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$this->details=$stmt->fetch(PDO::FETCH_ASSOC);
		$this->seal_exists=$stmt->rowCount();


		$q0="select * from seal where seal_number=:id";
		$stmt0=$this->db->prepare($q0);
		$stmt0->bindParam(":id",$id);
		$stmt0->execute();
		$this->details0=$stmt0->fetch(PDO::FETCH_ASSOC);
		$this->seal_exists0=$stmt0->rowCount();
		parent::__construct();
	}

	public function addNew($seal_number,$supplier_name,$batch_number,$batch_date,$contractor_name,$receipt_number,$receipt_date,$name){
		$q="insert into seal(seal_number,supplier_name,batch_number,batch_date,contractor_name,receipt_number,receipt_date,name) values(:seal_number,:supplier_name,:batch_number,:batch_date,:contractor_name,:receipt_number,:receipt_date,:name)";

		$se=new seal($seal_number);
		if ($se->seal_exists0 >0) {
			return "Failed seal number already exists.";
		}else{
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":seal_number",$seal_number);
		$stmt->bindParam(":supplier_name",$supplier_name);
		$stmt->bindParam(":batch_number",$batch_number);
		$stmt->bindParam(":contractor_name",$contractor_name);
		$stmt->bindParam(":batch_date",$batch_date);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->bindParam(":receipt_date",$receipt_date);
		$stmt->bindParam(":name",$name);
		$stmt->execute();
		return "success";
		}
	}



	public function update($id,$seal_number,$supplier_name,$batch_number,$batch_date,$contractor_name,$receipt_number,$receipt_date,$name){
		$q="update seal set seal_number=:seal_number,supplier_name=:supplier_name,batch_number=:batch_number, batch_date=:batch_date, contractor_name=:contractor_name, receipt_number=:receipt_number, receipt_date=:receipt_date, name=:name where id=:id";
		$stmt=$this->db->prepare($q);
		app::main();
		
		$stmt->bindParam(":seal_number",$seal_number);
		$stmt->bindParam(":supplier_name",$supplier_name);
		$stmt->bindParam(":batch_number",$batch_number);
		$stmt->bindParam(":id",$id);
		$stmt->bindParam(":batch_date",$batch_date);
		$stmt->bindParam(":contractor_name",$contractor_name);
		$stmt->bindParam(":receipt_number",$receipt_number);
		$stmt->bindParam(":receipt_date",$receipt_date);
		$stmt->bindParam(":name",$name);
		$stmt->execute();
		return "success! updated!";
	}



	


	public function remove($id){
		$q="delete from seal where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		return "success";
	}

	public function listThem(){
		$q="select * from seal WHERE contractor_name=''";
		$data=array();
		$stmt=$this->db->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}


public function listThem2(){
		$q="select * from seal where contractor_name=''";
		$data=array();
		$stmt=$this->db->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}


}








 ?>