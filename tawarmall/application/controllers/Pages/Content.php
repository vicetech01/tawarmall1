<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Master_model','master');
	}

	
	public function add_page()
	{
		$data = array();
		$table = "informational_pages";
		$this->form_validation->set_rules('name', 'Page Name', 'required|trim');
		$this->form_validation->set_rules('show_on', 'Select Option', 'required|trim');
		$this->form_validation->set_rules('content', 'Description', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Pages/content',$data);
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$varification_field = "Page_name";
		$varify_data = $this->input->post('name');
		$res = $this->master->varification($table,$varification_field,$varify_data);
		if($res)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry, this record already exits.</span><br/>');
			redirect(page_url.'Pages/Content/add_page');
		}else{
			
        $date =  date('Y-m-d H:i:s'); 
			$data = array('Page_name'=>$this->input->post('name'),
			'page_title'=>$this->input->post('page_title'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
			'meta_description'=>$this->input->post('meta_description'),
			'description'=>$this->input->post('content'),
			'show_on_top'=>$this->input->post('show_on'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Pages/Content/add_page');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Pages/Content/add_page');	
			
		}
		}
		$this->load->view('Pages/content');
		
	}
	
		}
		
		
	public function edit_page()
	{
		$identifier =  $this->uri->segment(4);
		$field = "id";
		$table = "informational_pages";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Pages/edit_content',$data);
		}
		
	public function update_page()
	{
		$identifier =  $this->input->post('page_id');
		$table = "informational_pages";
		$this->form_validation->set_rules('name', 'Page Name', 'required|trim');
		$this->form_validation->set_rules('show_on', 'Select Option', 'required|trim');
		$this->form_validation->set_rules('content', 'Description', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Pages/content',$data);
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		$varification_field = "Page_name";
		
		$varify_data = $this->input->post('name');
		$res = $this->master->varification($table,$varification_field,$varify_data);
		if($res)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry, this record already exits.</span><br/>');
			redirect(page_url.'Pages/Content/add_page');
		}else{
				$field_name = "id";
				$date = date('Y-m-d H:i:s');
				$data = array('Page_name'=>$this->input->post('name'),
				'page_title'=>$this->input->post('page_title'),
				'meta_keyword'=>$this->input->post('meta_keyword'),
				'meta_description'=>$this->input->post('meta_description'),
				'description'=>$this->input->post('content'),
				'show_on_top'=>$this->input->post('show_on'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				//echo "<pre>"; print_r($data); exit;
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Pages/Content/add_page');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Pages/Content/add_page');	
					
				}
				}
			$this->load->view('Pages/content',$data);
			}
		}
		
	public function update_page_status()
	{
		
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "id";
		$table = "informational_pages";
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
			redirect('Pages/Content/add_page');
		
		}
		
	public function delete_page()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('id', $id);
   			$this->db->delete('informational_pages');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Pages/Content/add_page');
			
		}
		
	
	/**********About Us**********/
	public function About_us()
	{
		$table = "about_us";
		$this->form_validation->set_rules('name', 'Page Name', 'required|trim');
		$this->form_validation->set_rules('content', 'Description', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Pages/about_us');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$varification_field = "Page_name";
		$varify_data = $this->input->post('name');
		$res = $this->master->varification($table,$varification_field,$varify_data);
		if($res)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry, this record already exits.</span><br/>');
			redirect(page_url.'Pages/Content/about_us');
		}else{
			
        $date =  date('Y-m-d H:i:s'); 
			$data = array('Page_name'=>$this->input->post('name'),
			'page_title'=>$this->input->post('page_title'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
			'meta_description'=>$this->input->post('meta_description'),
			'description'=>$this->input->post('content'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Pages/Content/About_us');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Pages/Content/About_us');	
			
		}
		}
		$this->load->view('Pages/about_us');
		
	}
		
}

public function edit_about_us()
	{
		$identifier =  $this->uri->segment(4);
		$field = "id";
		$table = "about_us";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Pages/edit_about_us',$data);
		}
		
public function update_about_us()
	{
		$identifier =  $this->input->post('page_id');
		$table = "about_us";
		$this->form_validation->set_rules('name', 'Page Name', 'required|trim');
		$this->form_validation->set_rules('content', 'Description', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Pages/content',$data);
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		$varification_field = "Page_name";
		
		$varify_data = $this->input->post('name');
		$res = $this->master->varification($table,$varification_field,$varify_data);
		if($res)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry, this record already exits.</span><br/>');
			redirect(page_url.'Pages/Content/About_us');
		}else{
				$field_name = "id";
				$date = date('Y-m-d H:i:s');
				$data = array('Page_name'=>$this->input->post('name'),
				'page_title'=>$this->input->post('page_title'),
				'meta_keyword'=>$this->input->post('meta_keyword'),
				'meta_description'=>$this->input->post('meta_description'),
				'description'=>$this->input->post('content'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				//echo "<pre>"; print_r($data); exit;
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Pages/Content/About_us');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Pages/Content/About_us');	
					
				}
				}
			$this->load->view('Pages/about_us',$data);
			}
		}
		
	public function update_about_us_status()
	{
		
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "id";
		$table = "about_us";
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
			redirect('Pages/Content/About_us');
		
		}
		
	public function delete_about_us()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('id', $id);
   			$this->db->delete('about_us');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Pages/Content/About_us');
			
		}

		
	/**********About Us**********/
	
		/**********FAQ's**********/
	public function FAQs()
	{
		$table = "faqs";
		$this->form_validation->set_rules('name', 'FAQs Question', 'required|trim');
		$this->form_validation->set_rules('content', 'FAQs Answer', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Pages/faqs');
		}
	else
	{
		date_default_timezone_set("Asia/Kolkata"); 
		$varification_field = "Page_name";
		$varify_data = $this->input->post('name');
		$res = $this->master->varification($table,$varification_field,$varify_data);
		if($res)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry, this record already exits.</span><br/>');
			redirect(page_url.'Pages/Content/FAQs');
		}else{
			
        $date =  date('Y-m-d H:i:s'); 
			$data = array('Page_name'=>$this->input->post('name'),
			'page_title'=>$this->input->post('page_title'),
			'meta_keyword'=>$this->input->post('meta_keyword'),
			'meta_description'=>$this->input->post('meta_description'),
			'description'=>$this->input->post('content'),
			'status'=>1,
			'added_on'=>$date,
			'added_by'=>$employee_ID);
		$result  = $this->master->insert_record($table,$data);	
		if($result)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully added.</span><br/>');
			redirect(page_url.'Pages/Content/FAQs');
			
		}else
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
			redirect(page_url.'Pages/Content/FAQs');	
			
		}
		}
		$this->load->view('Pages/faqs');
		
	}
		
}

public function edit_faqs()
	{
		$identifier =  $this->uri->segment(4);
		$field = "id";
		$table = "faqs";
		$data['edit_rec'] = $this->master->edit($table,$field,$identifier);
		$this->load->view('Pages/edit_faqs',$data);
		}
		
public function update_faqs()
	{
		$identifier =  $this->input->post('page_id');
		$table = "faqs";
		$this->form_validation->set_rules('name', 'FAQs Question', 'required|trim');
		$this->form_validation->set_rules('content', 'FAQs Answer', 'required|trim');
		$this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
		$employee_ID =$this->session->userdata['logged_in']['user_id'];		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Pages/edit_faqs',$data);
		}
		else
		{
		date_default_timezone_set("Asia/Kolkata"); 
		$varification_field = "Page_name";
		
		$varify_data = $this->input->post('name');
		$res = $this->master->varification($table,$varification_field,$varify_data);
		if($res)
		{
			$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry, this record already exits.</span><br/>');
			redirect(page_url.'Pages/Content/FAQs');
		}else{
				$field_name = "id";
				$date = date('Y-m-d H:i:s');
				$data = array('Page_name'=>$this->input->post('name'),
				'page_title'=>$this->input->post('page_title'),
				'meta_keyword'=>$this->input->post('meta_keyword'),
				'meta_description'=>$this->input->post('meta_description'),
				'description'=>$this->input->post('content'),
				'status'=>1,
				'added_on'=>$date,
				'added_by'=>$employee_ID);
				//echo "<pre>"; print_r($data); exit;
				$result  = $this->master->update_records($table,$data,$identifier,$field_name);	
				if($result)
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Thank you, record successfully updated.</span><br/>');
					redirect(page_url.'Pages/Content/FAQs');
					
				}else
				{
					$this->session->set_flashdata('message','<span style="color:red; float-left:20px;">Sorry,technical error accure.</span><br/>');
					redirect(page_url.'Pages/Content/FAQs');	
					
				}
				}
			$this->load->view('Pages/edit_faqs',$data);
			}
		}
		
	public function update_faqs_status()
	{
		
		$identifier =  $this->uri->segment(5);
		$sval =  $this->uri->segment(4);
		$field_name = "id";
		$table = "faqs";
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
			redirect('Pages/Content/FAQs');
		
		}
		
	public function delete_faqs()
	{
		$id = $this->uri->segment(4);
		 $this->db->where('id', $id);
   			$this->db->delete('faqs');
			$this->session->set_flashdata('message', '<span style="color:red;">Thank you! Record successfully deleted.</span>');
			redirect('Pages/Content/FAQs');
			
		}

		
	/**********FAQ's**********/
}
