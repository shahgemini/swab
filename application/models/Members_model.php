<?php 

class Members_model extends CI_Model
{
	public function getAll($table_name,$column_name)
	{
		date_default_timezone_set("Asia/Karachi");
		$date=date('Y-m-d H:i:s');
		
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($column_name,'DESC');

		$query=$this->db->get();
		return $query->result_array();

	}


	
	
	public function addNew($table_name,$params){

		return $result = $this->db->insert($table_name,$params);
	}



	public function delete($table_name,$column_name,$Id){

		$condition=array($column_name.' =' => $Id);
		$this->db->where($condition);
		return $this->db->delete($table_name);
	}

	public function selectById($table_name,$column_name,$Id)
	{
		date_default_timezone_set("Asia/Karachi");
		$date=date('Y-m-d H:i:s');
		
		$condition=array($column_name.' =' =>$Id);
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($column_name,'DESC');
		$this->db->where($condition);

		$query=$this->db->get();
		return $query->result_array();

	}


	public function update($table_name,$condition,$params){

		$this->db->set($params); 
		$this->db->where($condition);
		return $result1 = $this->db->update($table_name);
	}

	public function getJobApplications($job_id){

		$sql = "SELECT * FROM job_applications AS jb 
		INNER JOIN candidate AS cand
		ON 
		cand.Id = jb.CandidateId
		INNER JOIN candidate_education AS cedu
		ON
		cedu.CandidateId = jb.CandidateId
		INNER JOIN  candidate_experience AS cexp 
		ON
		cexp.CandidateId = jb.CandidateId 
		INNER JOIN candidate_skill AS csk 
		ON
		csk.CandidateId = jb.CandidateId
		INNER JOIN candidate_resumes AS candres
		ON 
		candres.CandidateId = cand.Id 
		WHERE
		jb.JobId = ? AND candres.IsDefault = ? "  ;

		$result = $this->db->query($sql, array($job_id,'1'));
		return $result->result_array();
	}

	public function get_totals(){

		$total_distributions = 0;
		$total_donations = 0;
		$total_ambulance_income = 0;
		$total_ambulance_expenditure = 0;
		$total_drivers_salary = 0;
		$total_members= 0;
		$total_amount_recieved= 0;


		$sql = "SELECT SUM(drivers_cut) AS sallary FROM ambulance_trips";
		$result = $this->db->query($sql);
		$response = $result->result_array();
		$total_drivers_salary = $response[0]['sallary'];


		$sql = "SELECT SUM(amount_recieved) AS amount_recieved FROM ambulance_trips";
		$result = $this->db->query($sql);
		$response = $result->result_array();
		$total_amount_recieved = $response[0]['amount_recieved'];


		$sql = "SELECT SUM(total_distribution_amount) AS distribution FROM fund_distribution";
		$result = $this->db->query($sql);
		$response = $result->result_array();
		$total_distributions = $response[0]['distribution'];


		$sql = "SELECT SUM(total_donation) AS donations FROM donations";
		$result = $this->db->query($sql);
		$response = $result->result_array();
		$total_donations = $response[0]['donations'];


		$sql = "SELECT * FROM members";
		$result = $this->db->query($sql);
		$response = $result->result_array();
		$total_members = count($response);


		$sql = "SELECT SUM(amount) AS amount FROM ambulance_expenditures";
		$result = $this->db->query($sql);
		$response = $result->result_array();
		$expenditures = $response[0]['amount'];

		$sql = "SELECT SUM(amount_spent) AS amount_spent, SUM(arrears) AS arrears FROM ambulance_trips";
		$result = $this->db->query($sql);
		$response = $result->result_array();
		$total_spents = $response[0]['amount_spent'];
		$arrears = $response[0]['arrears'];

		$total_ambulance_income = $arrears - $expenditures;
		$total_ambulance_expenditure = $total_spents + $expenditures;

		$array = array(
			'total_ambulance_income' => $total_ambulance_income,
			'total_ambulance_expenditure' => $total_ambulance_expenditure,
			'total_members' => $total_members,
			'total_drivers_salary' => $total_drivers_salary,
			'total_distributions' => $total_distributions,
			'total_donations' => $total_donations,
			'total_amount_recieved' => $total_amount_recieved
		);

		return $array;		
	}
}
