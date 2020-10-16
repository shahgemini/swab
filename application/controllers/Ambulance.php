<?php

class Ambulance extends CI_Controller
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
		$this->load->helper('My_helper');
       $this->load->library('email');
       $this->load->library('encryption');
       if(!$this->session->user_data){
			redirect('Login/logout','refresh');
		}
	}

	function index()
	{
		$data = array();
		$ambulance_trips = $this->Members_model->getAll("ambulance_trips","trip_id");
		
		$data['ambulance_trips'] = $ambulance_trips;
		$this->load->view('includes/header.php');
		$this->load->view('ambulance/ambulance_trips_listing.php',$data);
		$this->load->view('includes/footer.php');
		
	}


	/* Update Trip */
	function update_trip(){

		if($this->input->post("update_id") != ""){

			$data = array(
				'trip_date' => $this->input->post("trip_date"),
				'trip_reason' => $this->input->post("trip_reason") ,
				'destination' => $this->input->post("destination"),
				'distance_km' => $this->input->post("distance_km"),
				'situation' => $this->input->post("situation") ,
				'amount_recieved' => $this->input->post("amount_recieved"),
				'amount_spent' => $this->input->post("amount_spent"),				
				'amount_spent_reason' => $this->input->post("amount_spent_reason"),				
				'drivers_cut' => $this->input->post("drivers_cut"),
				'arrears' => $this->input->post("arrears")

			 );

			$condition = array(
				'trip_id =' => $this->input->post("update_id")
			);

			$result = $this->Members_model->update("ambulance_trips",$condition,$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Trip Record Saved Successfully!!");

				redirect('Ambulance/ambulance_trips_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Trip Record!!");

				redirect('Ambulance/edit/'.$this->input->post("update_id"),'refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Ambulance/ambulance_trips_listing','refresh');

		}
	}


	/* Add New Trip */

	function add_new_trip(){

		if($this->input->post("trip_date") != ""){

			$data = array(
				'trip_date' => $this->input->post("trip_date"),
				'trip_reason' => $this->input->post("trip_reason") ,
				'destination' => $this->input->post("destination"),
				'distance_km' => $this->input->post("distance_km"),
				'situation' => $this->input->post("situation") ,
				'amount_recieved' => $this->input->post("amount_recieved"),
				'amount_spent' => $this->input->post("amount_spent"),				
				'amount_spent_reason' => $this->input->post("amount_spent_reason"),				
				'drivers_cut' => $this->input->post("drivers_cut"),
				'arrears' => $this->input->post("arrears")

			 );

			$result = $this->Members_model->addNew("ambulance_trips",$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Trip Record Saved Successfully!!");

				redirect('Ambulance/ambulance_trips_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Trip Record!!");

				redirect('Ambulance/new_trip','refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Ambulance/new_trip','refresh');

		}
	}



	/* All ambulance Listing */

	function ambulance_trips_listing(){
		$data = array();
		
		$ambulance_trips = $this->Members_model->getAll("ambulance_trips","trip_id");
		$data['ambulance_trips'] = $ambulance_trips;

		$this->load->view('includes/header.php');
		$this->load->view('ambulance/ambulance_trips_listing.php',$data);
		$this->load->view('includes/footer.php');
	}

	/* New Trip View */

	function new_trip(){
		$data = array();
		$reasons = get_enum_values("ambulance_trips", "trip_reason");
		$data['reasons'] = $reasons;

		$this->load->view('includes/header.php');
		$this->load->view('ambulance/trip_form.php', $data);
		$this->load->view('includes/footer.php');

	}

	/* Edit Trip View */

	function edit(){
		$data = array();
		$memberid = 0;

		if ($this->uri->segment(3) === FALSE)
		{
			
			redirect('Ambulance/ambulance_trips_listing','refresh');

		}else{
			
			$trip_id = $this->uri->segment(3);
			$data['ambulance_trip'] = $this->Members_model->selectById("ambulance_trips","trip_id",$trip_id)[0];
			$reasons = get_enum_values("ambulance_trips", "trip_reason");
			$data['reasons'] = $reasons;

			$this->load->view('includes/header.php');
			$this->load->view('ambulance/trip_form.php',$data);
			$this->load->view('includes/footer.php');

		}
	}



	/* Delete Trip */

	function delete(){

		if($_POST['delete_id']!=""){
			$Id = $_POST['delete_id'];
			$deleted = $this->Members_model->delete('ambulance_trips','trip_id',$Id);
			
			if($deleted){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Trips Record Deleted Successfully!!");
				redirect('ambulance/ambulance_trips_listing','refresh');
			}else{ 
                             
				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Delete Trips Record!!");
				redirect('ambulance/ambulance_trips_listing','refresh');
			}
		}

	}




	/* Update Expenditure */
	function update_expenditure(){

		if($this->input->post("update_id") != ""){

			$data = array(
				'expenditure_date' => $this->input->post("expenditure_date"),				
				'expenditure_details' => $this->input->post("expenditure_details"),				
				'situation' => $this->input->post("situation"),
				'amount' => $this->input->post("amount")
			 );

			$condition = array(
				'expenditure_id =' => $this->input->post("update_id")
			);

			$result = $this->Members_model->update("ambulance_expenditures",$condition,$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Expenditure Record Saved Successfully!!");

				redirect('Ambulance/ambulance_expenditures_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Expenditure Record!!");

				redirect('Ambulance/edit_expenditure/'.$this->input->post("update_id"),'refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Ambulance/ambulance_expenditures_listing','refresh');

		}
	}


	/* Add New Expenditure */

	function add_new_expenditure(){

		if($this->input->post("expenditure_date") != ""){

			$data = array(
				'expenditure_date' => $this->input->post("expenditure_date"),				
				'expenditure_details' => $this->input->post("expenditure_details"),				
				'situation' => $this->input->post("situation"),
				'amount' => $this->input->post("amount")

			 );

			$result = $this->Members_model->addNew("ambulance_expenditures",$data);
			if($result){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Expenditure Record Saved Successfully!!");

				redirect('Ambulance/ambulance_expenditures_listing','refresh');

			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Save Expenditure Record!!");

				redirect('Ambulance/new_expenditure','refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "warning");
			$this->session->set_flashdata("title" , "Warning");
			$this->session->set_flashdata("msg" , "Insufficient Data, Cannot Save Record!!");
			
			redirect('Ambulance/new_expenditure','refresh');

		}
	}



	/* All ambulance expenditure Listing */

	function ambulance_expenditures_listing(){
		$data = array();
		
		$ambulance_expenditures = $this->Members_model->getAll("ambulance_expenditures","expenditure_id");
		$data['ambulance_expenditures'] = $ambulance_expenditures;

		$this->load->view('includes/header.php');
		$this->load->view('ambulance/ambulance_expenditures_listing.php',$data);
		$this->load->view('includes/footer.php');
	}

	/* New Expenditure View */

	function new_expenditure(){
		$data = array();

		$this->load->view('includes/header.php');
		$this->load->view('ambulance/expenditure_form.php', $data);
		$this->load->view('includes/footer.php');

	}

	/* Edit Expenditure View */

	function edit_expenditure(){
		$data = array();
		$expenditure_id = 0;

		if ($this->uri->segment(3) === FALSE)
		{
			
			redirect('Ambulance/ambulance_expenditures_listing','refresh');

		}else{
			
			$expenditure_id = $this->uri->segment(3);
			$data['expenditure'] = $this->Members_model->selectById("ambulance_expenditures","expenditure_id",$expenditure_id)[0];
			
			$this->load->view('includes/header.php');
			$this->load->view('ambulance/expenditure_form.php',$data);
			$this->load->view('includes/footer.php');

		}
	}



	/* Delete Ambulance Expidenture */

	function delete_expenditure(){

		if($_POST['delete_id']!=""){
			$Id = $_POST['delete_id'];
			$deleted = $this->Members_model->delete('ambulance_expenditures','expenditure_id',$Id);
			
			if($deleted){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Expenditure Record Deleted Successfully!!");
				redirect('ambulance/ambulance_expenditures_listing','refresh');
			}else{ 
                             
				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Delete Expenditure Record!!");
				redirect('ambulance/ambulance_expenditures_listing','refresh');
			}
		}

	}

}
