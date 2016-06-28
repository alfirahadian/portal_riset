<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
			$this->load->view('view_login');
	}
	public function login()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));

		$result=$this->user_model->login($username,$password);
		if($result) 
			redirect ('beranda');
		else        
			$this->load->view('view_login');
			//echo "gagal login";
	}
	public function signup()
	{
		
		$this->load->view('view_register');
	}
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('division', 'Division', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->user_model->add_user();
			//$this->login();
			if ($this->input->post('user_level')=='2'){
			$username = $this->input->post('username');
			mkdir($username,0777);
			redirect ('beranda');
			}
			else {
			$this->load->view('view_login');
			}
		}
	}
	public function logout()
	{
		$newdata = array(
		'user_id'   =>'',
		'user_level'   =>'',
		'fullname'  =>'',
		'username'     => '',
		'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->index();
	}
}
?>