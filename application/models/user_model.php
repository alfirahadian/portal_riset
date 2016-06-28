<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

	public function login($username,$password)
    {
		$this->db->where("username",$username);
        $this->db->where("password",$password);
            
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->user_id,
                        'fullname'   => $rows->fullname,
                    	'username' 	=> $rows->username,
                        'user_level'  => $rows->user_level,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;            
		}
		return false;
    }
    
	public function add_user()
	{
		$data=array(
			'fullname'=>$this->input->post('fullname'),
            'username'=>$this->input->post('username'),
            'division'=>$this->input->post('division'),
            'user_level'=>$this->input->post('user_level'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('user',$data);
	}
}
?>