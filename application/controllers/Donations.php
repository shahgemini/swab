<?php

class Donations extends CI_Controller
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
		$donations = $this->Members_model->getAll("donations","donation_id");
		
		$data['donations'] = $donations;
		$this->load->view('includes/header.php');
		$this->load->view('donations/donations_listing.php',$data);
		$this->load->view('includes/footer.php');
		
	}


	/* Update Donation */
	function update_donation(){

		if($this->input->post("update_id") != ""){


			$data = array(
				'member_id' => $this->input->post("member_id"),
				'name' => $this->input->post("name") ,
				'father_name' => $this->input->post("father_name"),
				'donation_date' => $this->input->post("donation_date"),
				'donation_nature' => $this->input->post("donation_nature") ,
				'recieved_by' => $this->input->post("recieved_by"),
				'total_donation' => $this->input->post("total_donation"),

			 );

			$condition = array(
				'donation_id =' => $this->input->post("update_id")
			);

			$result = $this->Members_model->update("donations",$condition,$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Donation Record Saved Successfully!!");

				redirect('Donations/donations_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Donation Record!!");

				redirect('Donations/edit/'.$this->input->post("update_id"),'refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Donations/donations_listing','refresh');

		}
	}

	/* Add New Donation */
	function add_new_donation(){

		if($this->input->post("total_donation") != ""){

			
			$data = array(
				'member_id' => $this->input->post("member_id"),
				'name' => $this->input->post("name") ,
				'father_name' => $this->input->post("father_name"),
				'donation_date' => $this->input->post("donation_date"),
				'donation_nature' => $this->input->post("donation_nature") ,
				'recieved_by' => $this->input->post("recieved_by"),
				'total_donation' => $this->input->post("total_donation"),

			 );

			$result = $this->Members_model->addNew("donations",$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Donation Record Saved Successfully!!");

				redirect('Donations/donations_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Donation Record!!");

				redirect('Donations/new_donation','refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Donations/new_donation','refresh');

		}
	}



	/* All donations Listing */

	function donations_listing(){
		$data = array();
		
		$donations = $this->Members_model->getAll("donations","donation_id");
		$data['donations'] = $donations;

		$this->load->view('includes/header.php');
		$this->load->view('donations/donations_listing.php',$data);
		$this->load->view('includes/footer.php');
	}

	/* New Donation View */

	function new_donation(){

		$data = array();

		$members = $this->Members_model->getAll("members","member_id");
		$donation_natures = array(
			'Zakaat','Sadqah','Khairaat','Khamas','Jaheez','Education','Health Aid','Financial Aid'
		);

		$data['members'] = $members;
		$data['donation_natures'] = $donation_natures;

		$this->load->view('includes/header.php');
		$this->load->view('donations/donation_form.php',$data);
		$this->load->view('includes/footer.php');

	}

	/* Edit Donation View */

	function edit(){
		$data = array();
		

		if ($this->uri->segment(3) === FALSE)
		{
			
			redirect('Donations/donations_listing','refresh');

		}else{
			
			$donation_id = $this->uri->segment(3);
			$data['donation'] = $this->Members_model->selectById("donations","donation_id",$donation_id)[0];

			$members = $this->Members_model->getAll("members","member_id");
			$donation_natures = array(
				'Zakaat','Sadqah','Khairaat','Khamas','Jaheez','Education','Health Aid','Financial Aid'
			);
			$data['members'] = $members;
			$data["donation_natures"] = $donation_natures;
			
			$this->load->view('includes/header.php');
			$this->load->view('donations/donation_form.php',$data);
			$this->load->view('includes/footer.php');

		}
	}


	/* Delete Donation */

	function delete(){

		if($_POST['delete_id']!=""){
			$Id = $_POST['delete_id'];
			$deleted = $this->Members_model->delete('donations','donation_id',$Id);
			
			if($deleted){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Donation Record Deleted Successfully!!");
				redirect('donations/donations_listing','refresh');
			}else{ 
                             
				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Delete Donation Record!!");
				redirect('donations/donations_listing','refresh');
			}
		}

	}
}