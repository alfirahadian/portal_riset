<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('beranda_admin_model');
	}

	public function index()
	{
		if(($this->session->userdata('user_level')=="1"))
		{
		$data['list_member'] = $this->beranda_admin_model->get_members_only();
		$data['tasks'] = $this->beranda_admin_model->get_your_created_tasks();
		$this->load->view('view_admin_history',$data);
		}
		elseif ($this->session->userdata('user_level')=="2") {
			redirect ('beranda');
		}
		else{
			$this->load->view('view_login');
		}
	}

	public function new_task()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('title', 'Title task', 'required');
		$this->form_validation->set_rules('detail', 'Detail task', 'required');
		$this->form_validation->set_rules('deadline', 'Deadline', 'required');
		$this->form_validation->set_rules('receiver', 'receiver', 'required');
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->beranda_admin_model->new_task();
			//$this->login();
			redirect ('beranda_admin');
		}
	}

	public function all_tasks()
	{
		if(($this->session->userdata('user_level')=="1"))
		{
		$data['tasks'] = $this->beranda_admin_model->get_all_tasks();
		$this->load->view('view_admin',$data);
		}
		elseif (($this->session->userdata('user_level')=="2")) {
			redirect ('beranda');
		}
		else{
			$this->load->view('view_login');
		}
	}

	public function delete_task($task_id) 
	{   
    $this->load->model("beranda_admin_model");
    $this->beranda_admin_model->do_delete_task($task_id);
    redirect ('beranda_admin');
    }
}