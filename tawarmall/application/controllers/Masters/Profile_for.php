<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_for extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	public function index()
	{
		$this->load->view('Master/Profile_for');
	}
	
	public function add_profile_for()
	{
		$table = "profile_for";
		$this->form_validation->set_rules('profile_for', 'Profile For', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/Profile_for');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$date =  date('Y-m-d H:i:s'); 
			$data = array('profile_for'=>$this->input->post('profile_for'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Masters/Profile_for');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Masters/Profile_for');	
			
		}
		
		$this->load->view('Master/Profile_for');
		
	}
		
		}
	
	public function edit_profile_for()
	{
		$identifier =  $this->uri->segment(4);
		$field = "profile_id";
		$table = "profile_for";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Master/edit_profile_for',$data);
		}
	
	public function update_profile_for()
	{
		$identifier =  $this->input->post('profile_id');
		$table = "profile_for";
		$this->form_validation->set_rules('profile_for', 'Profile For', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/edit_profile_for');
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		
				$field_name = "profile_id";
				$date =  date('Y-m-d H:i:s'); 
				$data = array('profile_for'=>$this->input->post('profile_for'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Masters/Profile_for');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Masters/Profile_for');	
					
				}
				
			$this->load->view('Master/edit_profile_for');
			}
			
		
		}
	
	public function update_profile_for_status()
	{
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "profile_id";
		$table = "religion";
		if($sval=='1')
			{
				$status = 0;
				}else
				{
					$status = 1;
					}
			$data = array('status'=>$status);
			$res = $this->master->update_records($table,$data,$identifier,$field_name);
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Status successfully changed.</span>');
			redirect('Masters/Profile_for');		
		}
		
	public function delete_profile_for()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('profile_id', $id);
   			$this->db->delete('profile_for');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Masters/Profile_for'); 
			
		}
}
