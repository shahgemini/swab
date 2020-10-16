<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		//$this->load->model('Product_model');
		$this->load->model('Login_model');
		$this->load->model('');
		$this->load->model('');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		
	}
  
	public function index()
	{
		//$this->load->view('includes/header.php');
		$this->load->view('login.php');
		//$this->load->view('includes/footer.php');

	}
	public function logout()
	{
		session_destroy();
		$this->load->view('login.php');

	}
	public function forgetpassword()
	{
		//$this->load->view('login.php');
		

	}
	public function login_user()
	{
		
		if($this->input->post("LoginEmail") !== "" && $this->input->post("LoginPassword") !==""){

	 		$user_data = $this->Login_model->check_user_credential($this->input->post("LoginEmail"),$this->input->post("LoginPassword"));
	 		
			if(count($user_data)>0){

				$this->session->user_data = $user_data;
				
				redirect('Home','refresh');
			}else{
				$_SESSION['msg'] = "Invalid Login Password";
				$_SESSION['status'] = "failed";
				redirect('Login','refresh');
			}
		}
		

		// 
		// $this->load->library('form_validation');

		// $this->form_validation->set_rules('email','Email is','required');
		// $this->form_validation->set_rules('password','Password is','required');

		// if($this->form_validation->run()==FALSE)
		// {
		// 	//echo " ia m in if validation";
		// 	//exit;
		// 	redirect('Login');
		// }
		// else
		// {
		// 	//echo "ia m in else";
		// 	//exit;
		// 	$email=$this->input->post('email');
		// 	$password=$this->input->post('password');
		// 	//echo $email;
		// 	//echo $password;
		// 	$data=$this->Login_model->check_user_credential($email,$password);
		// 	//echo " ia m here";
		// 	if($data > 0)
		// 	{
		// 		redirect('Dashboard');
		// 	}
		// 	else
		// 	{
		// 		$this->session->set_flashdata('credientional_not_match');
		// 		redirect('Login','refresh');
		// 	}
		// }
	}
}