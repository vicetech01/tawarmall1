<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Religion extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	public function index()
	{
		$this->load->view('Master/Religion');
	}
	
	public function add_religion()
	{
		$table = "religion";
		$this->form_validation->set_rules('religion', 'Religion', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/Religion');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$date =  date('Y-m-d H:i:s'); 
			$data = array('religion'=>$this->input->post('religion'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Masters/Religion');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Masters/Religion');	
			
		}
		
		$this->load->view('Master/Religion');
		
	}
		
		}
	
	public function edit_religion()
	{
		$identifier =  $this->uri->segment(4);
		$field = "religion_id";
		$table = "religion";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Master/edit_religion',$data);
		}
	
	public function update_religion()
	{
		$identifier =  $this->input->post('religion_id');
		$table = "religion";
		$this->form_validation->set_rules('religion', 'Religion', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/edit_religion');
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		
				$field_name = "religion_id";
				$date =  date('Y-m-d H:i:s'); 
				$data = array('religion'=>$this->input->post('religion'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Masters/Religion');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Masters/Religion');	
					
				}
				
			$this->load->view('Master/edit_religion');
			}
			
		
		}
	
	public function update_religion_status()
	{
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "religion_id";
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
			redirect('Masters/Religion');		
		}
		
	public function delete_religion()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('religion_id', $id);
   			$this->db->delete('religion');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Masters/Religion'); 
			
		}
}
