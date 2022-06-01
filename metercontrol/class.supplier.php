<?php include_once("autoload.php");

class supplier
{
	var $supplier_id,$details,$supplier_exists,$supplier_exists0,$details0;
	function __construct($supplier_id="")
	{
		$this->db=DB::connect();
		$this->supplier_id=$supplier_id;
		$q="select * from supplier where supplier_id=:supplier_id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":supplier_id",$supplier_id);
		$stmt->execute();
		$this->details=$stmt->fetch(PDO::FETCH_ASSOC);
		$this->supplier_exists=$stmt->rowCount();



		$q0="select * from supplier where supplier_name=:supplier_name";
		$stmt0=$this->db->prepare($q0);
		$stmt0->bindParam(":supplier_name",$supplier_id);
		$stmt0->execute();
		$this->details0=$stmt0->fetch(PDO::FETCH_ASSOC);
		$this->supplier_exists0=$stmt0->rowCount();


	}

	public function addNew($supplier_name,$supplier_mobile,$email,$contact_person){
		$q="insert into supplier(supplier_name,supplier_mobile,email,contact_person) values(:supplier_name,:supplier_mobile,:email,:contact_person)";

		$su=new supplier($supplier_name);
		if ($su->supplier_exists0 >0) {
			return "Failed! supplier already exists in the database.";
		}else{
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":supplier_name",$supplier_name);
		$stmt->bindParam(":supplier_mobile",$supplier_mobile);
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":contact_person",$contact_person);
		$stmt->execute();
		return "success"; }
	}

	public function update($supplier_id,$supplier_name,$supplier_mobile,$email,$contact_person){
		$q="update supplier set supplier_name=:supplier_name,supplier_mobile=:supplier_mobile, email=:email, contact_person=:contact_person where supplier_id=:supplier_id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":supplier_name",$supplier_name);
		$stmt->bindParam(":supplier_mobile",$supplier_mobile);
		$stmt->bindParam(":supplier_id",$supplier_id);
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":contact_person",$contact_person);
		$stmt->execute();
		return "success! updated!";
	}


	public function remove($supplier_id){
		$q="delete from supplier where supplier_id=:supplier_id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":supplier_id",$supplier_id);
		$stmt->execute();
		return "success";
	}

	public function listThem(){
		$q="select * from supplier";
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