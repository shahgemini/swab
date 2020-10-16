<?php

class Distributions extends CI_Controller
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
		$distributions = $this->Members_model->getAll("fund_distribution","distribution_id");
		
		$data['distributions'] = $distributions;
		$this->load->view('includes/header.php');
		$this->load->view('distribution/distributions_listing.php',$data);
		$this->load->view('includes/footer.php');
		
	}


	/* Update Distribution */
	function update_distribution(){

		if($this->input->post("update_id") != ""){

			$data = array(
				'distribution_date' => $this->input->post("distribution_date"),
				'distribution_details' => $this->input->post("distribution_details") ,
				'total_distribution_amount' => $this->input->post("total_distribution_amount")

			 );

			$condition = array(
				'distribution_id =' => $this->input->post("update_id")
			);

			$result = $this->Members_model->update("fund_distribution",$condition,$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Distribution Record Saved Successfully!!");

				redirect('Distributions/distributions_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Distribution Record!!");

				redirect('Distributions/edit/'.$this->input->post("update_id"),'refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Distributions/distributions_listing','refresh');

		}
	}


	/* Add New Distribution */

	function add_new_distribution(){

		if($this->input->post("distribution_date") != ""){

			$data = array(
				'distribution_date' => $this->input->post("distribution_date"),
				'distribution_details' => $this->input->post("distribution_details") ,
				'total_distribution_amount' => $this->input->post("total_distribution_amount")

			 );

			$result = $this->Members_model->addNew("fund_distribution",$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Distribution Record Saved Successfully!!");

				redirect('Distributions/distributions_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Distribution Record!!");

				$this->load->view('includes/header.php');
				$this->load->view('distribution/distribution_form.php',$data);
				$this->load->view('includes/footer.php');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			$this->load->view('includes/header.php');
			$this->load->view('distribution/distribution_form.php');
			$this->load->view('includes/footer.php'); 

		}
	}



	/* All Distributions Listing */

	function distribution_listing(){
		$data = array();
		
		$distributions = $this->Members_model->getAll("fund_distribution","distribution_id");
		$data['distributions'] = $distributions;

		$this->load->view('includes/header.php');
		$this->load->view('distribution/distributions_listing.php',$data);
		$this->load->view('includes/footer.php');
	}

	/* New Distribution View */

	function new_distribution(){

		$this->load->view('includes/header.php');
		$this->load->view('distribution/distribution_form.php');
		$this->load->view('includes/footer.php');

	}

	/* Edit Distribution View */

	function edit_distribution(){
		$data = array();
		$distribution_id = 0;

		if ($this->uri->segment(3) === FALSE)
		{
			
			redirect('Distributions/distributions_listing','refresh');

		}else{
			
			$distribution_id = $this->uri->segment(3);
			$data['distribution'] = $this->Members_model->selectById("fund_distribution","distribution_id",$distribution_id)[0];
			
			$this->load->view('includes/header.php');
			$this->load->view('distribution/distribution_form.php',$data);
			$this->load->view('includes/footer.php');

		}
	}


	/* Delete Distribution */

	function delete_distribution(){

		if($_POST['delete_id']!=""){
			$Id = $_POST['delete_id'];
			$deleted = $this->Members_model->delete('fund_distribution','distribution_id',$Id);
			
			if($deleted){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Distribution Record Deleted Successfully!!");
				redirect('Distributions/distributions_listing','refresh');
			}else{ 
                             
				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Delete Distribution Record!!");
				redirect('Distributions/distributions_listing','refresh');
			}
		}

	}

}
