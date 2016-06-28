<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('beranda_admin_model');
	}

	public function index()
	{
		if(($this->session->userdata('user_level')=='2'))
		{
		$data['tasks'] = $this->beranda_admin_model->get_tasks();
		$data['tasks_title'] = $this->beranda_admin_model->get_uncompleted_tasks();
		$this->load->view('view_beranda',$data);
		}
		elseif(($this->session->userdata('user_level')=='1'))
		{
		redirect ('beranda_admin');
		}
		else{
			redirect ('user/login');
		}
	}

	public function all_task()
	{
		if(($this->session->userdata('user_level')=="2"))
		{
		$data['tasks'] = $this->beranda_admin_model->get_all_tasks();
		$this->load->view('view_beranda_all_tasks',$data);
		}
		elseif(($this->session->userdata('user_level')=="1"))
		{
		redirect ('beranda_admin');
		}
		else{
			$this->load->view('view_login');
		}
	}

	public function upload_file() 
	{   
		$username = $this->session->userdata('username');
		$config["allowed_types"] ="*";
		$config['upload_path'] = './'.$username;
	 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('view_upload', $error);
				print_r($error);
				redirect ('beranda');
		}
		else {
		//$upload_data = $this->upload->data(); 
  		//$file_name =   $upload_data['file_name'];

  		$image_data = $this->upload->data();
    	$fname=$image_data['file_name'];
    	$fpath=$username.'/'.$fname;
  		}

	    $data = array
	      (
	      	'task' => 'task',
	      	'status' => '1',
	      	'path' => $fpath,
	      	'task_id' => $this->input->post('task_id'),
	        'note' => $this->input->post('note'),
	        'upload_date' => $this->input->post('upload_date')
	      );

	    if($this->beranda_admin_model->upload_file($data))
	    {
	        redirect ('beranda');
	    }
	    else
	    {
	        echo "error uploading";
	    }

}

}
