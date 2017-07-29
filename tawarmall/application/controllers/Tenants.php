<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenants extends CI_Controller {
	
	 public function __construct() {
    parent::__construct();
    $this->load->model('Query_builder','query');
}

	public function index()
	{
		
		$this->load->view('tenants/add-tenants');
	}
	
	public function add()
	{
		$this->load->model('Query_builder','query');
		
		//$this->form_validation->set_rules('category', 'Tenant Category', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|trim');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|trim|matches[pass]');
		
		$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
		$this->load->view('tenants/add-tenants');
		}else
		{
			
			$suff='';
			
			$this->db->select('*')->from('hoosk_tenant')->limit('1')->order_by('id','DESC');
			$que=$this->db->get();
			foreach($que->result() as $rest)
			
			$suff=$rest->id;
			
			if($suff=='')
			{
				$suff='0';
			}else
			{
			$suff=$rest->id;
			}
			$num=$suff+1;
			$num_padded = sprintf("%02d",$num);
			$emp_id='TNT-'.$num_padded;
			
			//echo $emp_id;exit;
			
			$nshop=$this->input->post('nshops');
			//echo $nshop;exit;
			
			for($z=0;$z<$nshop;$z++)
			{
			
			$ar1=$_FILES['logo']['name'][$z];
		
	$draw1=explode('.',$ar1);
			$dra1=end($draw1);
			$new1=time().$z.'.'.$dra1;
		move_uploaded_file($_FILES['logo']['tmp_name'][$z],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/'.$new1);
		
		
		
		
			$ar3=$_FILES['pbrouch']['name'][$z];
		
	$draw3=explode('.',$ar3);
			$dra3=end($draw3);
			$new3=time().$z.'2'.'.'.$dra3;
		move_uploaded_file($_FILES['pbrouch']['tmp_name'][$z],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/'.$new3);
		
		
		/* Data  */
		
		
		$bname=$_POST['bname'][$z];
		$category=$_POST['category'][$z];
		$des=$_POST['desc'][$z];
		$stime=$_POST['stime'][$z];
		$web=$_POST['web'][$z];
		
		//echo "<pre>"; print_r($_POST);exit;
		
		/* End Data */
		
		
			$data=array('tenant_id'=>$emp_id,'password'=>$this->input->post('pass'),'brand_name'=>$bname,'brand_logo'=>$new1,'category'=>$category,'description'=>$des,'shop_timing'=>$stime,'website'=>$web,'fullname'=>$this->input->post('name'),'email'=>$this->input->post('email'),'phone'=>$this->input->post('phone'),'status'=>'1','create_date'=>date('Y-m-d'),'tenant_brochure'=>$new3);
			
			//echo "<pre>"; print_r($data);
			
			//echo "hi";exit;
		$res=$this->query->insert_record($data,'hoosk_tenant');
		
		
		
	}
	
	
	
		if($res==true)
		{
			
			
			
			$ar2=$_FILES['pimage']['name'];
			
		
		$w=count($ar2);
		 //echo $w;exit;
		
		for($i=0;$i<$w;$i++)
		{
		//echo "<pre>"; print_r($ar2[$i]);exit;
	$draw2=explode('.',$ar2[$i]);
			$dra2=end($draw2);
			$new2=time().$i.'.'.$dra2;
		move_uploaded_file($_FILES['pimage']['tmp_name'][$i],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/'.$new2);
		
		$docs_data=array('tenant_id'=>$emp_id,'image'=>$new2,'addedOn'=>date('Y-m-d'));
			$this->query->insert_record($docs_data,'property_images');
			
			
		
		
		
			}
		 $this->session->set_flashdata('message','Records added'); 
			redirect('Tenants');
		
		}else
		{
			$this->load->view('tenants/add-tenants');
		}
		}
	
	
}




public function add_back()
	{
		$this->load->model('Query_builder','query');
		
		$this->form_validation->set_rules('category', 'Tenant Category', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|trim');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|trim|matches[pass]');
		
		$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
		$this->load->view('tenants/add-tenants');
		}else
		{
			
			$suff='';
			
			$this->db->select('*')->from('hoosk_tenant')->limit('1')->order_by('id','DESC');
			$que=$this->db->get();
			foreach($que->result() as $rest)
			
			$suff=$rest->id;
			
			if($suff=='')
			{
				$suff='0';
			}else
			{
			$suff=$rest->id;
			}
			$num=$suff+1;
			$num_padded = sprintf("%02d",$num);
			$emp_id='TNT-'.$num_padded;
			
			//echo $emp_id;exit;
			
			$ar1=$_FILES['logo']['name'];
		
	$draw1=explode('.',$ar1);
			$dra1=end($draw1);
			$new1=time().'.'.$dra1;
		move_uploaded_file($_FILES['logo']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/'.$new1);
		
		
		
		
			$ar3=$_FILES['pbrouch']['name'];
		
	$draw3=explode('.',$ar3);
			$dra3=end($draw3);
			$new3=time().'2'.'.'.$dra3;
		move_uploaded_file($_FILES['pbrouch']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/'.$new3);
		
		
		
		
			$data=array('tenant_id'=>$emp_id,'password'=>$this->input->post('pass'),'brand_name'=>$this->input->post('bname'),'brand_logo'=>$new1,'category'=>$this->input->post('category'),'no_of_shops'=>$this->input->post('nshops'),'description'=>$this->input->post('desc'),'shop_timing'=>$this->input->post('stime'),'website'=>$this->input->post('web'),'fullname'=>$this->input->post('name'),'email'=>$this->input->post('email'),'phone'=>$this->input->post('phone'),'status'=>'1','create_date'=>date('Y-m-d'),'tenant_brochure'=>$new3);
			
			//echo "<pre>"; print_r($data);exit;
		$res=$this->query->insert_record($data,'hoosk_tenant');
		if($res==true)
		{
			
			$ar2=$_FILES['pimage']['name'];
		
		$w=count($ar2);
		
		for($i=0;$i<$w;$i++)
		{
		
	$draw2=explode('.',$ar2[$i]);
			$dra2=end($draw2);
			$new2=time().$i.'.'.$dra2;
		move_uploaded_file($_FILES['pimage']['tmp_name'][$i],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/'.$new2);
		
		$docs_data=array('tenant_id'=>$emp_id,'image'=>$new2,'addedOn'=>date('Y-m-d'));
			$this->query->insert_record($docs_data,'property_images');
		
		}
		
		 $this->session->set_flashdata('message','Records added'); 
			redirect('Tenants');
		
		}else
		{
			$this->load->view('tenants/add-tenants');
		}
		}
	
	
}


public function list_records()
{
	$data['list']=$this->query->select_records('*','hoosk_tenant');
	$this->load->view('tenants/list',$data);
	
	
}


public function product()
{
	$this->load->view('product/add-products');
	
	
}

public function add_product()
{
	
	$this->load->model('Query_builder','query');
		
		//$this->form_validation->set_rules('pcode', 'Product Code', 'required');
		//$this->form_validation->set_rules('name', 'Product Name', 'required');
		//$this->form_validation->set_rules('cat', 'Product Category', 'required');
	//$this->form_validation->set_rules('price', 'Product Price', 'required|trim');
		//$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		//if ($this->form_validation->run() == FALSE)
		//{
			
			
		//$this->load->view('product/add-products');
		
		
		//}else
		//{
			
			$data=array('tenant_id'=>$this->session->userdata['logged_in']['user_id'],'name'=>$this->input->post('name'),'code'=>$this->input->post('pcode'),'category'=>$this->input->post('cat'),'brand'=>$this->input->post('brand'),'price'=>$this->input->post('price'),'addedOn'=>date('Y-m-d'));
			//echo "<pre>"; print_r($data);exit;
		$res=$this->query->insert_record($data,'products');
		if($res==true)
		{
		 $this->session->set_flashdata('message','Records added'); 
			redirect('Tenants/product');
		}else
		{
		 $this->load->view('product/add-products');
		
		}
			
		//}
	
}


function notification()
{
	$this->load->view('notifications/add-notifications');
	
}


public function add_notifications()
{
	
	$this->load->model('Query_builder','query');
		
		$this->form_validation->set_rules('title', 'Notification Title', 'required');
		$this->form_validation->set_rules('des', 'Notification Description', 'required');
	
		$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			
		$this->load->view('notifications/add-notifications');
		
		
		}else
		{
			
			
			$suff='';
			
			$this->db->select('*')->from('notifications')->limit('1')->order_by('id','DESC');
			$que=$this->db->get();
			foreach($que->result() as $rest)
			
			$suff=$rest->id;
			
			if($suff=='')
			{
				$suff='0';
			}else
			{
			$suff=$rest->id;
			}
			$num=$suff+1;
			$num_padded = sprintf("%02d",$num);
			$emp_id='NT-'.$num_padded;
			
			
				$ar1=$_FILES['image']['name'];
		
	$draw1=explode('.',$ar1);
			$dra1=end($draw1);
			$new1=time().'.'.$dra1;
		move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/notifications/'.$new1);
			
			
			
			$data=array('notification_id'=>$emp_id,'tenant_id'=>$this->session->userdata['logged_in']['user_id'],'title'=>$this->input->post('title'),'description'=>$this->input->post('des'),'url'=>$this->input->post('url'),'timing'=>$this->input->post('timm'),'image'=>$new1,'status'=>'0','addedOn'=>date('Y-m-d'));
			//echo "<pre>"; print_r($data);exit;
		$res=$this->query->insert_record($data,'notifications');
		if($res==true)
		{
		 $this->session->set_flashdata('message','Records added'); 
			redirect('Tenants/add_notifications');
		}else
		{
		 $this->load->view('notifications/add-notifications');
		
		}
			
			
		}
	
}


function deals()
{
	
	$this->load->view('deals/add-deals');
	
	
}



public function add_deals()
{
	
	$this->load->model('Query_builder','query');
		
		$this->form_validation->set_rules('title', ' Title', 'required');
		$this->form_validation->set_rules('des', ' Description', 'required');
	
		$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			
		$this->load->view('deals/add-deals');
		
		
		}else
		{
			
			
			$suff='';
			
			$this->db->select('*')->from('deals')->limit('1')->order_by('id','DESC');
			$que=$this->db->get();
			foreach($que->result() as $rest)
			
			$suff=$rest->id;
			
			if($suff=='')
			{
				$suff='0';
			}else
			{
			$suff=$rest->id;
			}
			$num=$suff+1;
			$num_padded = sprintf("%02d",$num);
			$emp_id='DE-'.$num_padded;
			
			
				$ar1=$_FILES['image']['name'];
		
	$draw1=explode('.',$ar1);
			$dra1=end($draw1);
			$new1=time().'.'.$dra1;
		move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/deals/'.$new1);
			
			if($this->input->post('type')=='1')
			{
			$ti=$this->input->post('time');	
			}else
			{
				$ti=$this->input->post('time1');
			}
			
			
			$data=array('deals_id'=>$emp_id,'tenant_id'=>$this->session->userdata['logged_in']['user_id'],'event_or_deal'=>$this->input->post('type'),'title'=>$this->input->post('title'),'description'=>$this->input->post('des'),'timming'=>$ti,'image'=>$new1,'status'=>'0','addedOn'=>date('Y-m-d'));
			//echo "<pre>"; print_r($data);exit;
		$res=$this->query->insert_record($data,'deals');
		if($res==true)
		{
		 $this->session->set_flashdata('message','Records added'); 
			redirect('Tenants/add_deals');
		}else
		{
		 $this->load->view('deals/add-deals');
		
		}
			
			
		}
	
}


public function log_request()
{
	
	$this->load->view('logrequest/add-log-request');
	
	
}


public function add_log_request()
{
	
	$this->load->model('Query_builder','query');
		
		$this->form_validation->set_rules('type', ' Priority Type', 'required');
		$this->form_validation->set_rules('sub', ' Subject', 'required');
		
	
		$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			
		$this->load->view('logrequest/add-log-request');
		
		
		}else
		{
			
			
			$suff='';
			
			$this->db->select('*')->from('log_request')->limit('1')->order_by('id','DESC');
			$que=$this->db->get();
			foreach($que->result() as $rest)
			
			$suff=$rest->id;
			
			if($suff=='')
			{
				$suff='0';
			}else
			{
			$suff=$rest->id;
			}
			$num=$suff+1;
			$num_padded = sprintf("%02d",$num);
			$emp_id='LR-'.$num_padded;
			
			
			$ar1=$_FILES['image']['name'];
		
	$draw1=explode('.',$ar1);
			$dra1=end($draw1);
			$new1=time().'.'.$dra1;
		move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/logrequest/'.$new1);
		
			
		
			
			
			$data=array('log_id'=>$emp_id,'tenant_id'=>$this->session->userdata['logged_in']['user_id'],'priority'=>$this->input->post('type'),'subject'=>$this->input->post('sub'),'image'=>$new1,'message'=>$this->input->post('des'),'status'=>'0','addedOn'=>date('Y-m-d'));
			//echo "<pre>"; print_r($data);exit;
		$res=$this->query->insert_record($data,'log_request');
		if($res==true)
		{
		
		 $this->session->set_flashdata('message','Records added'); 
		redirect('Tenants/add_log_request');
		}else
		{
		 $this->load->view('logrequest/add-log-request');
		
		}
			
			
		}
	
}


function lost_found()
{
	$this->load->view('lost&found/add-lost_found-request');
	
}



public function add_lost_found_request()
{
	
	$this->load->model('Query_builder','query');
		
		$this->form_validation->set_rules('aname', ' Article Name', 'required');
		$this->form_validation->set_rules('name', ' Your Name', 'required');
		$this->form_validation->set_rules('phone', ' Contact Number', 'required');
		
	
		$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			
		$this->load->view('lost&found/add-lost_found-request');
		
		
		}else
		{
			
			
		
		
			
				$ar1=$_FILES['image']['name'];
		
	$draw1=explode('.',$ar1);
			$dra1=end($draw1);
			$new1=time().'.'.$dra1;
		move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/tawarmall/external_uploads/tenant/lostnfound/'.$new1);
			
			
			
			$data=array('tenant_id'=>$this->session->userdata['logged_in']['user_id'],'article_name'=>$this->input->post('aname'),'p_name'=>$this->input->post('name'),'phone'=>$this->input->post('phone'),'image'=>$new1,'status'=>'0','addedOn'=>date('Y-m-d'));
			 //echo "<pre>"; print_r($data);exit;
		$res=$this->query->insert_record($data,'lost_found_request');
		if($res==true)
		{
		
		 $this->session->set_flashdata('message','Records added'); 
		redirect('Tenants/add_lost_found_request');
		}else
		{
		 $this->load->view('lost&found/add-lost_found-request');
		
		}
			
			
		}
	
}

function list_deals()
{
	
	$data['list']=$this->query->select_conditionalRecords('*','deals','event_or_deal','1');
	$this->load->view('deals/list-deals',$data);
	
}


function list_events()
{
	
	$data['list']=$this->query->select_conditionalRecords('*','deals','event_or_deal','2');
	$this->load->view('deals/list-events',$data);
	
}


function change_status()
{
	$rt=$this->uri->segment('3');
	
	//echo $rt;exit;
	
	if($rt=='1')
	{
	$sta='0';	
	}else
	{$sta='1';
	}
	
	$data=array('status'=>$sta);
	
	$res =  $this->db->where('id',$this->uri->segment('4'));
		$res=$this->db->update('deals',$data);
	
	if($res)
		{
		
		 $this->session->set_flashdata('message','Status Changed'); 
		redirect('Tenants/list_events');
		}else
		{
			 $this->session->set_flashdata('message','Error');
		 $this->load->view('deals/list_events');
		
		}
	
	
	
	
}

function list_log()
{
	
	
	$data['list']=$this->query->select_records('*','log_request');
	$this->load->view('logrequest/list-log',$data);
	
}

function change_log_status()
{
	
	$rt=$this->uri->segment('3');
	
	//echo $rt;exit;
	
	if($rt=='1')
	{
	$sta='0';	
	}else
	{$sta='1';
	}
	
	$data=array('status'=>$sta);
	
	$res =  $this->db->where('id',$this->uri->segment('4'));
		$res=$this->db->update('log_request',$data);
	
	if($res)
		{
		
		 $this->session->set_flashdata('message','Status Changed'); 
		redirect('Tenants/list_log');
		}else
		{
			 $this->session->set_flashdata('message','Error');
		 $this->load->view('log_request/list-log');
		
		}
	
	
}

function list_notifications()
{
	
	$data['list']=$this->query->select_records('*','notifications');
	$this->load->view('notifications/list-notifications',$data);
	
}

function change_not_status()
{
	
	$rt=$this->input->post('status');
	$id=$this->input->post('id');
	

	
	$data=array('status'=>$rt);
	
	
	$res =  $this->db->where('id',$id);
		$res=$this->db->update('notifications',$data);
	
	echo "Status Updated";
	
}

function list_lostfound()
{
	
	$data['list']=$this->query->select_records('*','lost_found_request');
	$this->load->view('lost&found/list-lost_found',$data);
}



function change_lost_status()
{
	
	$rt=$this->uri->segment('3');
	
	//echo $rt;exit;
	
	if($rt=='1')
	{
	$sta='0';	
	}else
	{$sta='1';
	}
	
	$data=array('status'=>$sta);
	
	$res =  $this->db->where('id',$this->uri->segment('4'));
		$res=$this->db->update('lost_found_request',$data);
	
	if($res)
		{
		
		 $this->session->set_flashdata('message','Status Changed'); 
		redirect('Tenants/list_lostfound');
		}else
		{
			 $this->session->set_flashdata('message','Error');
		 $this->load->view('lost&found/list-lost_found');
		
		}
}



function tenant_list_lostfound()
{
	
	$data['list']=$this->query->select_conditionalRecords('*','lost_found_request','tenant_id',$this->session->userdata['logged_in']['user_id']);
	$this->load->view('lost&found/tenant_list-lost_found',$data);
}


function tenant_list_notifications()
{
	
	$data['list']=$this->query->select_conditionalRecords('*','notifications','tenant_id',$this->session->userdata['logged_in']['user_id']);
	$this->load->view('notifications/tenant_list-notifications',$data);
	
}


function tenant_list_log()
{
	
	
	$data['list']=$this->query->select_conditionalRecords('*','log_request','tenant_id',$this->session->userdata['logged_in']['user_id']);
	$this->load->view('logrequest/tenant_list-log',$data);
	
}

function tenant_list_deals()
{
	
	$data['list']=$this->query->select_conditionalRecords('*','deals','tenant_id',$this->session->userdata['logged_in']['user_id']);
	$this->load->view('deals/tenant_list-deals',$data);
	
}

function notificationamount()
{
	$this->load->view('notifications/add_amount');

}


function add_notiamount()
{
	
		
		$this->form_validation->set_rules('noti', 'Notification', 'required');
		$this->form_validation->set_rules('amt', 'Notification Amount', 'required');
	
		$this->form_validation->set_error_delimiters('<span style="color:red;position:absolute;">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			
		$this->load->view('notifications/add_amount');
		
		
		}else
		{
			
			$data=array('amount'=>$this->input->post('amt'));
			
			$this->db->where('id',$this->input->post('noti'));
			$this->db->update('notifications',$data);
			
			 $this->session->set_flashdata('message','Amount Set');
		    $this->load->view('notifications/add_amount');
		
			
		}
	
}

function attachments()
{

$this->load->view('tenants/view-attachments');	
}
   
   
   function change_deal_status()
{
	
	$rt=$this->input->post('status');
	$id=$this->input->post('id');
	

	
	$data=array('status'=>$rt);
	
	
	$res =  $this->db->where('id',$id);
		$res=$this->db->update('deals',$data);
	
	echo "Status Updated";
	
}


function all_products()
{
	
		$data['list']=$this->query->select_conditionalRecords('*','products','tenant_id',$this->session->userdata['logged_in']['user_id']);
	$this->load->view('product/tenant_all_products',$data);
}

   




}
