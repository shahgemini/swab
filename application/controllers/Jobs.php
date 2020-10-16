<?php

class Jobs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		//$this->load->model('Product_model');
		$this->load->model('Jobs_model');
		$this->load->model('Credit_model');
		$this->load->model('');
		$this->load->model('');
		$this->load->library('form_validation');
		$this->load->library('session');
       $this->load->library('email');
       $this->load->library('encryption');
       if(!$this->session->employer_id){
			redirect('Login/logout','refresh');
		}
	}
	function index()
	{
		$data = array();
		$employer_id = $this->session->employer_id;	
		$jobs = $this->Jobs_model->getJobs($employer_id);
		$data['jobs'] = $jobs;
		$this->load->view('includes/header.php');
		$this->load->view('jobs/jobs_listing.php',$data);
		$this->load->view('includes/footer.php');
		
	}


	function change_job_status(){

		if(isset($_POST['JobStatusId']) && isset($_POST['JobStatus'])){

			$updated = $this->Jobs_model->UpdateJobStatus($_POST['JobStatusId'], $_POST['JobStatus']);
			
			if($updated){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Job Status Updated Successfully!!");
				redirect('Jobs/jobs_listing','refresh');
			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Update Job Status!!");
				redirect('Jobs/jobs_listing','refresh');
			}

		}else{

			$this->session->set_flashdata("type" , "error");
			$this->session->set_flashdata("title" , "Failed");
			$this->session->set_flashdata("msg" , "Failed to Update Job Status!!");
			redirect('Jobs/jobs_listing','refresh');
		}

	}
	/* All Jobs Listing */

	function jobs_listing(){
		$data = array();
		$employer_id = $this->session->employer_id;	
		$jobs = $this->Jobs_model->getJobs($employer_id);
		$data['jobs'] = $jobs;

		$data['feature_credits'] = $this->Credit_model->getCreditConfigByName();
		$this->load->view('includes/header.php');
		$this->load->view('jobs/jobs_listing.php',$data);
		$this->load->view('includes/footer.php');
	}

	/* New Job View */

	function new_job(){

		$this->load->view('includes/header.php');
		$this->load->view('jobs/job_form.php');
		$this->load->view('includes/footer.php');

	}

	/* Edit Job View */

	function edit(){
		$data = array();
		$jobid = 0;

		if ($this->uri->segment(3) === FALSE)
		{
			
			redirect('Jobs/jobs_listing','refresh');

		}else{
			
			$jobid = $this->uri->segment(3);
			$job  = $this->Jobs_model->select_by_id($jobid);
			$data['job'] = $job[0];
			$job_categories = $this->Jobs_model->getJobsCategories();
			$data['job_categories'] = $job_categories; 
			$data['job_types'] = array('Full Time','Part Time','Contract','Intern','Temporary');
			$this->load->view('includes/header.php');
			$this->load->view('jobs/job_form.php',$data);
			$this->load->view('includes/footer.php');

		}
	}


	/* Job Details */

	function details(){
		$data = array();
		$jobid = 0;

		if ($this->uri->segment(3) === FALSE)
		{		
			redirect('Jobs/jobs_listing','refresh');

		}else{

			$jobid = $this->uri->segment(3);
			$job  = $this->Jobs_model->select_by_id($jobid);
			$data['job'] = $job[0];
			$this->load->view('includes/header.php');
			$this->load->view('jobs/job_details.php',$data);
			$this->load->view('includes/footer.php');

		}
	}

	/* Job  Applicants */

	function applicants(){
		$job_id = 0;

		if ($this->uri->segment(3) === FALSE)
		{
			redirect('Jobs/jobs_listing','refresh');		
		}else{
			$job_id = $this->uri->segment(3);
			$job  = $this->Jobs_model->select_by_id($job_id);
			$job_applicants = $this->Jobs_model->getJobApplications($job_id);

			$data['job_applicants'] = $job_applicants;
			
			$data['job'] = $job[0];
			$this->load->view('includes/header.php');
			$this->load->view('jobs/job_applicants.php',$data);
			$this->load->view('includes/footer.php');
		}
	}

	/* Delete Job */

	function delete(){

		if($_POST['delete_id']!=""){
			$Id = $_POST['delete_id'];
			$deleted = $this->Jobs_model->delete($Id);
			
			if($deleted){

				$this->session->set_flashdata("type" , "success");
				$this->session->set_flashdata("title" , "Success");
				$this->session->set_flashdata("msg" , "Job Record Deleted Successfully!!");
				redirect('Jobs/jobs_listing','refresh');
			}else{

				$this->session->set_flashdata("type" , "error");
				$this->session->set_flashdata("title" , "Failed");
				$this->session->set_flashdata("msg" , "Failed to Delete Jobs Record!!");
				redirect('Jobs/jobs_listing','refresh');
			}
		}

	}




}
