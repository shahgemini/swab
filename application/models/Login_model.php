<?php 

class Login_model extends CI_Model
{
	public function check_user_credential($email,$password)
	{
		$query="SELECT * FROM users WHERE email='$email' AND password ='$password'";
		$result=$this->db->query($query);
		return $result->result_array();
	}

	public function getEmployerData($Id){
		$condition=array('Id =' =>$Id);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('Id','DESC');
		$this->db->where($condition);

		$query=$this->db->get();
		return $query->result_array();
	}
}