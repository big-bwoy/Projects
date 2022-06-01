<?php include_once("autoload.php");

class coil extends app
{
	var $id,$details,$coil_exists;
	function __construct($id="")
	{
		$this->db=DB::connect();

		parent::__construct();
		app::main();

		$this->id=$id;
		$q="select * from coil where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$this->details=$stmt->fetch(PDO::FETCH_ASSOC);
		$this->coil_exists=$stmt->rowCount();

		$q0="select * from coil where coils_number=:id";
		$stmt0=$this->db->prepare($q0);
		$stmt0->bindParam(":id",$id);
		$stmt0->execute();
		$this->details0=$stmt0->fetch(PDO::FETCH_ASSOC);
		$this->coil_exists0=$stmt0->rowCount();

	}

	public function addNew($coils_number,$batch_date,$seal_number,$supplier_id,$contractor_id,$move_in_batch_no,$move_out_receipt_no,$receipt_date,$name){
		$q="insert into coil(coils_number,batch_date,seal_number,supplier_id,move_in_batch_no,name) values(:coils_number,:batch_date,:seal_number,:supplier_id,:move_in_batch_no,:name)";
		$co=new coil($coils_number);
		if ($co->coil_exists0 >0) {
			return "Failed! the coil number exists.";
		}else{
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":coils_number",$coils_number);
		$stmt->bindParam(":batch_date",$batch_date);
		$stmt->bindParam(":seal_number",$seal_number);
		$stmt->bindParam(":supplier_id",$supplier_id);
		
		$stmt->bindParam(":move_in_batch_no",$move_in_batch_no);
		$stmt->bindParam(":name",$name);
		
		app::main();
		$stmt->execute();
		return "success"; }
	}

	public function update($id,$coils_number,$batch_date,$seal_number,$supplier_id,$contractor_id,$move_in_batch_no,$move_out_receipt_no,$receipt_date,$name){
		$q="update coil set coils_number=:coils_number,batch_date=:batch_date,seal_number=:seal_number,supplier_id=:supplier_id,contractor_id=:contractor_id,move_in_batch_no=:move_in_batch_no,move_out_receipt_no=:move_out_receipt_no, receipt_date=:receipt_date, name=:name where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":receipt_date",$receipt_date);
		$stmt->bindParam(":coils_number",$coils_number);
		$stmt->bindParam(":batch_date",$batch_date);
		$stmt->bindParam(":seal_number",$seal_number);
		$stmt->bindParam(":supplier_id",$supplier_id);
		$stmt->bindParam(":contractor_id",$contractor_id);
		$stmt->bindParam(":move_in_batch_no",$move_in_batch_no);
		$stmt->bindParam(":move_out_receipt_no",$move_out_receipt_no);
		$stmt->bindParam(":name",$name);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		return "success! updated!";
	}


	public function remove($id){
		$q="delete from coil where id=:id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		return "success";
	}

	public function listThem(){
		$q="select * from coil WHERE contractor_id=''";
		$data=array();
		$stmt=$this->db->prepare($q);
		$stmt->execute();
		while ($s=$stmt->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $s);
		}
		return $data;
	}


	public function listThem2(){
		$q="select * from coil where contractor_id=''";
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