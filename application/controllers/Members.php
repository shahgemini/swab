<?php

class Members extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		//$this->load->model('Product_model');
		$this->load->model('Members_model');
		$this->load->model('');
		$this->load->model('');
		$this->load->library('form_validation');
		$this->load->library('session');
       $this->load->library('email');
       $this->load->library('encryption');
       if(!$this->session->user_data){
			redirect('Login/logout','refresh');
		}
	}

	function index()
	{
		$data = array();
		$members = $this->Members_model->getAll("members","member_id");
		
		$data['members'] = $members;
		$this->load->view('includes/header.php');
		$this->load->view('members/members_listing.php',$data);
		$this->load->view('includes/footer.php');
		
	}


	/* Update Member */
	function update_member(){

		if($this->input->post("update_id") != ""){

			$data = array(
				'reference_no' => $this->input->post("reference_no"),
				'name' => $this->input->post("name") ,
				'father_name' => $this->input->post("father_name"),
				'cnic' => $this->input->post("cnic"),
				'mobile_number' => $this->input->post("mobile_number") ,
				'address' => $this->input->post("address"),
				'membership_date' => $this->input->post("membership_date"),

			 );

			$condition = array(
				'member_id =' => $this->input->post("update_id")
			);

			$result = $this->Members_model->update("members",$condition,$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Member Record Saved Successfully!!");

				redirect('Members/members_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Member Record!!");

				redirect('Members/edit/'.$this->input->post("update_id"),'refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Members/members_listing','refresh');

		}
	}


	/* Add New Member */

	function add_new_member(){

		if($this->input->post("name") != ""){

			$data = array(
				'reference_no' => $this->input->post("reference_no"),
				'name' => $this->input->post("name") ,
				'father_name' => $this->input->post("father_name"),
				'cnic' => $this->input->post("cnic"),
				'mobile_number' => $this->input->post("mobile_number") ,
				'address' => $this->input->post("address"),
				'membership_date' => $this->input->post("membership_date"),

			 );

			$result = $this->Members_model->addNew("members",$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Member Record Saved Successfully!!");

				redirect('Members/members_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Member Record!!");

				$this->load->view('includes/header.php');
				$this->load->view('members/member_form.php',$data);
				$this->load->view('includes/footer.php');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			$this->load->view('includes/header.php');
			$this->load->view('members/member_form.php');
			$this->load->view('includes/footer.php'); 

		}
	}



	/* All members Listing */

	function members_listing(){
		$data = array();
		
		$members = $this->Members_model->getAll("members","member_id");
		$data['members'] = $members;

		$this->load->view('includes/header.php');
		$this->load->view('members/members_listing.php',$data);
		$this->load->view('includes/footer.php');
	}

	/* New Member View */

	function new_member(){

		$this->load->view('includes/header.php');
		$this->load->view('members/member_form.php');
		$this->load->view('includes/footer.php');

	}

	/* Edit Member View */

	function edit(){
		$data = array();
		$memberid = 0;

		if ($this->uri->segment(3) === FALSE)
		{
			
			redirect('Members/members_listing','refresh');

		}else{
			
			$member_id = $this->uri->segment(3);
			$data['member'] = $this->Members_model->selectById("members","member_id",$member_id)[0];
			
			$this->load->view('includes/header.php');
			$this->load->view('members/member_form.php',$data);
			$this->load->view('includes/footer.php');

		}
	}


	/* Members Details */

	function details(){
		$data = array();
		$memberid = 0;

		if ($this->uri->segment(3) === FALSE)
		{		
			redirect('Members/members_listing','refresh');

		}else{

			$memberid = $this->uri->segment(3);
			$member  = $this->Members_model->selectById('members','member_id',$memberid);
			$data['member'] = $member[0];
			$this->load->view('includes/header.php');
			$this->load->view('members/member_details.php',$data);
			$this->load->view('includes/footer.php');

		}
	}

	/* Get a Member By MemberId*/

	function member_name_by_id(){

		$memberid = $this->input->post("member_id");

		$member  = $this->Members_model->selectById('members','member_id',$memberid);
		
		$value = $member[0]["name"]."+".$member[0]['father_name'];
		echo $value;
		exit;
	}

	/* Delete Member */

	function delete(){

		if($_POST['delete_id']!=""){
			$Id = $_POST['delete_id'];
			$deleted = $this->Members_model->delete('members','member_id',$Id);
			
			if($deleted){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Member Record Deleted Successfully!!");
				redirect('members/members_listing','refresh');
			}else{ 
                             
				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Delete Member Record!!");
				redirect('members/members_listing','refresh');
			}
		}

	}

}
