<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_type extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	public function index()
	{
		$this->load->view('Master/Payment_type');
	}
	
	public function add_payment_type()
	{
		$table = "payment_type";
		$this->form_validation->set_rules('payment_type', 'Payment Type', 'required|trim');
		$this->form_validation->set_rules('credit_value', 'Credit Value', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/Payment_type');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$date =  date('Y-m-d H:i:s'); 
			$data = array('payment_type'=>$this->input->post('payment_type'),
			'credit_value'=>$this->input->post('credit_value'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Masters/Payment_type');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Masters/Payment_type');	
			
		}
		
		$this->load->view('Master/Payment_type');
		
	}
		
		}
	
	public function edit_payment_type()
	{
		$identifier =  $this->uri->segment(4);
		$field = "payment_type_id";
		$table = "payment_type";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Master/edit_payment_type',$data);
		}
	
	public function update_payment_type()
	{
		$identifier =  $this->input->post('payment_type_id');
		$table = "payment_type";
		$this->form_validation->set_rules('payment_type', 'Payment Type', 'required|trim');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/edit_payment_type');
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		
				$field_name = "payment_type_id";
				$date =  date('Y-m-d H:i:s'); 
				$data = array('payment_type'=>$this->input->post('qualification'),
				'credit_value'=>$this->input->post('credit_value'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Masters/Payment_type');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Masters/Payment_type');	
					
				}
				
			$this->load->view('Master/edit_payment_type');
			}
			
		
		}
	
	public function update_payment_type_status()
	{
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "payment_type_id";
		$table = "payment_type";
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
			redirect('Masters/Payment_type');		
		}
		
	public function delete_payment_type()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('payment_type_id', $id);
   			$this->db->delete('payment_type');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Masters/Payment_type'); 
			
		}
}