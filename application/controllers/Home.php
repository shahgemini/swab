<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		//$this->load->model('Product_model');
		$this->load->model('Login_model');
		$this->load->model('Members_model');
		$this->load->model('');
		$this->load->model('');
		$this->load->library('form_validation');
		$this->load->library('session');
       $this->load->library('email');
       if(!$this->session->user_data){
			redirect('Login/logout','refresh');
		}
	}

	function index()
	{
		$data = array();
		$summary = $this->Members_model->get_totals();
		$data['summary'] = $summary;

		$this->load->view('includes/header.php');
		$this->load->view('dashboard.php', $data);
		$this->load->view('includes/footer.php');
	}
	
}

?>