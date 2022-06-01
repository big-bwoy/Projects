<?php include_once("autoload.php");
class users 
{
	var $rows, $details,$detailsn,$staff_id,$db;
	function __construct($staff_id=""){
		$this->staff_id=$staff_id;
		$this->db=DB::connect();
		$q="select *from users where staff_id=:staff_id";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":staff_id",$staff_id);
		$stmt->execute();
		$this->details=$stmt->fetch(PDO::FETCH_ASSOC);

		
	}



	public function login($password){
		$q="select *from users where (email=:email or staff_id=:staff_id) and password=:password";
		$active="YES";
		$stmt=$this->db->prepare($q);
		$stmt->bindParam(":staff_id",$this->staff_id);
		$stmt->bindParam(":email",$this->staff_id);
		$stmt->bindParam(":password",$password);
		$stmt->execute();
		$rows=$stmt->rowCount();

		$login="0";
		if ($rows >0) {
			$login="1";
		}
		return $login;
	}







}
 ?>