<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Occupation extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	public function index()
	{
		$this->load->view('Master/Occupation');
	}
	
	public function add_occupation()
	{
		$table = "occupation";
		$this->form_validation->set_rules('Occupation', 'Occupation', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/Occupation');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$date =  date('Y-m-d H:i:s'); 
			$data = array('occupation'=>$this->input->post('Occupation'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Masters/Occupation');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Masters/Occupation');	
			
		}
		
		$this->load->view('Master/Occupation');
		
	}
		
		}
	
	public function edit_occupation()
	{
		$identifier =  $this->uri->segment(4);
		$field = "occupation_id";
		$table = "occupation";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Master/edit_occupation',$data);
		}
	
	public function update_occupation()
	{
		$identifier =  $this->input->post('occupation_id');
		$table = "occupation";
		$this->form_validation->set_rules('Occupation', 'Occupation', 'required|trim');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/edit_occupation');
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		
				$field_name = "occupation_id";
				$date =  date('Y-m-d H:i:s'); 
				$data = array('occupation'=>$this->input->post('Occupation'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Masters/Occupation');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Masters/Occupation');	
					
				}
				
			$this->load->view('Master/edit_occupation');
			}
			
	
		}
	
	public function update_occupation_status()
	{
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "occupation_id";
		$table = "occupation";
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
			redirect('Masters/Occupation');		
		}
		
	public function delete_occupation()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('occupation_id', $id);
   			$this->db->delete('occupation');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Masters/Occupation'); 
			
		}
}
