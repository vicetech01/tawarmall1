<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mother_tongue extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	public function index()
	{
		$this->load->view('Master/Mother_tongue');
	}
	
	public function add_mother_tongue()
	{
		$table = "mother_tongue";
		
		$this->form_validation->set_rules('cast', 'Mother Tongue', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/Mother_tongue');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$date =  date('Y-m-d H:i:s'); 
			$data = array(
			'religion_cast'=>$this->input->post('cast'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Masters/Mother_tongue/add_mother_tongue');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Masters/Mother_tongue/add_mother_tongue');	
			
		}
		
		$this->load->view('Master/Mother_tongue');
		
	}
		
		}
	
	public function edit_religion_cast()
	{
		$identifier =  $this->uri->segment(4);
		$field = "religion_cast_id";
		$table = "religion_cast";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Master/edit_religion_cast',$data);
		}
	
	public function update_religion_cast()
	{
		$identifier =  $this->input->post('religion_cast_id');
		$table = "religion_cast";
		$this->form_validation->set_rules('religion', 'Religion', 'required|trim');
		$this->form_validation->set_rules('cast', 'Cast', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/edit_religion_cast');
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		
				$field_name = "religion_cast_id";
				$date =  date('Y-m-d H:i:s'); 
				$data = array('religion'=>$this->input->post('religion'),
				'religion_cast'=>$this->input->post('cast'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Masters/Mother_tongue');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Masters/Mother_tongue');	
					
				}
				
			$this->load->view('Master/edit_religion_cast');
			}
			
		
		}
	
	public function update_religion_cast_status()
	{
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "religion_cast_id";
		$table = "religion_cast";
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
			redirect('Masters/Mother_tongue');		
		}
		
	public function delete_religion_cast()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('religion_cast_id', $id);
   			$this->db->delete('religion_cast');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Masters/Mother_tongue'); 
			
		}
}
