<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	public function index()
	{
		$this->load->view('Master/Education');
	}
	
	public function add_education()
	{
		$table = "education";
		$this->form_validation->set_rules('qualification', 'Qualification', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/Education');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$date =  date('Y-m-d H:i:s'); 
			$data = array('education'=>$this->input->post('qualification'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Masters/Education');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Masters/Education');	
			
		}
		
		$this->load->view('Master/Education');
		
	}
		
		}
	
	public function edit_education()
	{
		$identifier =  $this->uri->segment(4);
		$field = "education_id";
		$table = "education";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Master/edit_education',$data);
		}
	
	public function update_education()
	{
		$identifier =  $this->input->post('education_id');
		$table = "education";
		$this->form_validation->set_rules('qualification', 'Qualification', 'required|trim');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/edit_education');
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		
				$field_name = "education_id";
				$date =  date('Y-m-d H:i:s'); 
				$data = array('education'=>$this->input->post('qualification'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Masters/Education');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Masters/Education');	
					
				}
				
			$this->load->view('Master/edit_education');
			}
			
		
		}
	
	public function update_education_status()
	{
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "education_id";
		$table = "education";
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
			redirect('Masters/Education');		
		}
		
	public function delete_education()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('education_id', $id);
   			$this->db->delete('education');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Masters/Education'); 
			
		}
}
