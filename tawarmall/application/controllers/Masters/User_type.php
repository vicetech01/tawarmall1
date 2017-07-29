<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_type extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	public function index()
	{
		$this->load->view('Master/User_type');
	}
	
	public function add_slider()
	{
		$table = "slider";
		$this->form_validation->set_rules('name', 'Image Name', 'required|trim');
		//$this->form_validation->set_rules('upload', 'Image', 'required|trim');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Master/Banner');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$image=$_FILES['upload']['name'];

		if($image<>'')
		{
					$image1=explode('.',$image);
					$cat_image=end($image1);
					$newname=time().'.'.$cat_image;
					move_uploaded_file($_FILES["upload"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].'/classified_matrimony/catalog/slider/' . $newname);
		}else
		{
			$newname="";
			}
		$date =  date('Y-m-d H:i:s'); 
			$data = array('banner_name'=>$this->input->post('name'),
			'banner'=>$newname,
			'link_on_banner'=>$this->input->post('url'),
			'banner_status'=>$this->input->post('status'),
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Master/Slider');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Master/Slider');	
			
		}
		
		$this->load->view('Master/Slider/add_slider');
		
	}
		
		}
	
	public function edit_slider()
	{
		$identifier =  $this->uri->segment(4);
		$field = "banner_id";
		$table = "slider";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Master/Slider/add_slider',$data);
		}
	
	public function update_slider()
	{
		$identifier =  $this->input->post('banner_id');
		$old_img = $this->input->post('old_image');
		$table = "slider";
		$this->form_validation->set_rules('name', 'Image Name', 'required|trim');
		//$this->form_validation->set_rules('upload', 'Image', 'required|trim');
		$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Masters/Slider/add_slider');
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		$varification_field = "category_name";
		
		$image=$_FILES['upload']['name'];

		if($image<>'')
		{
					$image1=explode('.',$image);
					$cat_image=end($image1);
					$newname=time().'.'.$cat_image;
					move_uploaded_file($_FILES["upload"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].'/plant/catalog/slider/' . $newname);
		}else
		{
			$newname= $old_img;
			}
				$field_name = "banner_id";
				$date =  date('Y-m-d H:i:s'); 
				$data = array('banner_name'=>$this->input->post('name'),
				'banner'=>$newname,
				'link_on_banner'=>$this->input->post('url'),
				'banner_status'=>$this->input->post('status'),
				'updated_on'=>$date,
				'added_by'=>$employee_ID);
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Master/Slider');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Master/Slider');	
					
				}
				
			$this->load->view('Master/Slider/add_slider');
			}
			
		
		}
	
	public function update_slider_status()
	{
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "banner_id";
		$table = "slider";
		if($sval=='1')
			{
				$status = 0;
				}else
				{
					$status = 1;
					}
			$data = array('banner_status'=>$status);
			$res = $this->master->update_records($table,$data,$identifier,$field_name);
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Status successfully changed.</span>');
			redirect('Master/Slider');		
		}
		
	public function delete_slider()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('banner_id', $id);
   			$this->db->delete('slider');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Master/Slider'); 
			
		}
}
