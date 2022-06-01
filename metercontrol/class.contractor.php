<?php include_once("autoload.php");

class contractor extends app
{
	var $contractor_id,$details,$contractor_exists,$details0,$contractor_exists0;
	function __construct($contractor_id="")
	{
		$this->db=DB::connect();
		$this->contractor_id=$contractor_id;
		$q="select * from contractor where contractor_id=:contractor_id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":contractor_id",$contractor_id);
		$stmt->execute();
		$this->details=$stmt->fetch(PDO::FETCH_ASSOC);
		$this->contractor_exists=$stmt->rowCount();


		$q0="select * from contractor where contractor_name=:contractor_id";
		$stmt0=$this->db->prepare($q0);
		$stmt0->bindParam(":contractor_id",$contractor_id);
		$stmt0->execute();
		$this->details0=$stmt0->fetch(PDO::FETCH_ASSOC);
		$this->contractor_exists0=$stmt0->rowCount();



		parent::__construct();
		app::main();
	}

	public function addNew($contractor_name,$contractor_mobile,$email,$contact_person){
		$q="insert into contractor(contractor_name,contractor_mobile,email,contact_person) values(:contractor_name,:contractor_mobile,:email,:contact_person)";

		$r=new contractor($contractor_name);
		if ($r->contractor_exists0 >0) {
			return "Failed! the contractor already exists.";
		}else{
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":contractor_name",$contractor_name);
		$stmt->bindParam(":contractor_mobile",$contractor_mobile);
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":contact_person",$contact_person);
		$stmt->execute();
		return "success";
	}

	}

	public function update($contractor_id,$contractor_name,$contractor_mobile,$email,$contact_person){
		$q="update contractor set contractor_name=:contractor_name,contractor_mobile=:contractor_mobile, email=:email, contact_person=:contact_person where contractor_id=:contractor_id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":contractor_name",$contractor_name);
		$stmt->bindParam(":contractor_mobile",$contractor_mobile);
		$stmt->bindParam(":contractor_id",$contractor_id);
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":contact_person",$contact_person);
		$stmt->execute();
		return "success! updated!";
	}


	public function remove($contractor_id){
		$q="delete from contractor where contractor_id=:contractor_id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":contractor_id",$contractor_id);
		$stmt->execute();
		return "success";
	}





	public function listThem(){
		$q="select * from contractor";
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