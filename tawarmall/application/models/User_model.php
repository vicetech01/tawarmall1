<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
	}

	public function authentication($username,$password)
	{
		$this->db->select('*')->where('user_name',$username)->where('password',$password);
		 $res = $this->db->get('backend_user');
		 $res1 = $res->result();
		 if(empty($res1))
		 {
			 $this->db->select('*')->where('tenant_id',$username)->where('password',$password);
			 $res = $this->db->get('hoosk_tenant');
			 $res1 = $res->result();
			 }		 
			 return $res1;
		
	}
	
	public function recover_pass($email_ID)
	{
		$this->db->select('*');
		$this->db->from('lms_users');
		$this->db->where('email',$email_ID);
		$query = $this->db->get();
		return $query->result();
		
		
	}
	
	

}
	
	