<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		
	}

	public function index()
	{
		$this->load->view('login');
	}
	
	public function authenticate()
	{
		
		$this->form_validation->set_rules('uname', 'Username', 'required|trim');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_error_delimiters('<div style="color:blue;">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
		$this->load->view('login');
		}else
		{
			$username = $this->input->post('uname');
			$password = $this->input->post('password');
			$result=$this->user->authentication($username,$password);
			if($result)
			{
				$data = array();
             foreach($result as $row) {
				 
				 if(isset($row->user_id)){                 
				 $data = array('user_id' => $row->user_id,
			                 'user_name' => 'Admin',
					 'email'=>$row->email,
					 'role'=>$row->user_role_id);
}else
					 {
if(isset($row->tenant_id)){
					$data = array('user_id' => $row->tenant_id,
				     'employee_id'=>$row->tenant_id,
                     'user_name' => $row->fullname,
					 'email'=>$row->email,
					 'role'=>'',
                     'status'=>$row->status);}
						 }

					//echo "<pre>";print_r($data);exit;
                 $this->session->set_userdata('logged_in',$data);
					
			 }
			 //$employee_ID=$row->employee_ID;
			 redirect(page_url.'Dashboard');
			
			}
			else
			{
				$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Invalid username/password combination</span><br/>');
				 redirect(page_url);	
			}
			
		}
	}
	
function signout()
{

$user_id=$this->session->userdata['logged_in']['user_id'];
$user_name=$this->session->userdata['logged_in']['user_name'];
 $email=$this->session->userdata['logged_in']['email'];
$log_array = array('user_id' => $user_id, 'user_name' =>$user_name,'email'=>$email);
$this->session->unset_userdata($log_array);
       $this->session->sess_destroy();
redirect(page_url);
}
}
