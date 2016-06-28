<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Beranda_admin_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
	public function get_members(){
        $list_beranda = $this->db->order_by("user_id", "desc")->get('user');
        return $list_beranda->result();
    }

    public function get_members_only(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_level', '2');
        $query = $this->db->get();
        //$list_tasks = $this->db->order_by("task_id", "desc")->get('task');
        return $query->result();
    }

    public function get_all_tasks(){
        $this->db->select('*');
        $this->db->from('task');
        $this->db->order_by("task_id","desc");
        $query = $this->db->get();
        //$list_tasks = $this->db->order_by("task_id", "desc")->get('task');
        return $query->result();
    }

    public function get_tasks(){
        $this->db->select('*');
        $this->db->from('task');
        $this->db->join('user', 'user.fullname = task.receiver');
        $user_level = $this->session->userdata('fullname');
        $this->db->where('fullname', $user_level);
        $this->db->order_by("task_id","desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_your_created_tasks(){
        $this->db->select('*');
        $this->db->from('task');
        $this->db->join('user', 'user.user_id = task.creator_id');
        $user_level = $this->session->userdata('user_id');
        $this->db->where('creator_id', $user_level);
        $this->db->order_by("task_id","desc");
        $query = $this->db->get();
        //$list_tasks = $this->db->order_by("task_id", "desc")->get('task');
        return $query->result();
    }

    public function get_uncompleted_tasks(){
        $this->db->select('*');
        $this->db->from('task');
        $this->db->join('user', 'user.fullname = task.receiver');
        $user_level = $this->session->userdata('fullname');
        $this->db->where('fullname', $user_level);
        $this->db->where('status', '0');
        $this->db->order_by("task_id","desc");
        $query = $this->db->get();
        //$list_tasks = $this->db->order_by("task_id", "desc")->get('task');
        return $query->result();
    }

    public function new_task()
	{
		$data=array(
			'title'=>$this->input->post('title'),
            'detail'=>$this->input->post('detail'),
            'deadline'=>$this->input->post('deadline'),
            'creator'=>$this->input->post('creator'),
            'creator_id'=>$this->input->post('creator_id'),
            'receiver'=>$this->input->post('receiver')
			);
		$this->db->insert('task',$data);
	}

    public function upload_file($data) 
    {
    extract($data);
    //print_r($data);
    $this->db->where('task_id', $task_id);
    $this->db->update($task, array('upload_date' => $upload_date,'note' => $note, 'file_path' => $path, 'status' => $status));
    return true;
    }

    public function do_delete_task($task_id){
    $this->db-> where('task_id', $task_id);
    $this->db-> delete('task');
}
}
?>