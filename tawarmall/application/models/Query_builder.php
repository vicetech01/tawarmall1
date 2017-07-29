<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Query_builder extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
	}
	
	function insert($data,$tablename)
	{
		$result = $this->db->insert($tablename,$data);
		return $result;
	}
	
	function insert_record($data,$tablename)
	{
		$result = $this->db->insert($tablename,$data);
		return $result;
	}
	
	function select_records($field,$tblname)
	{
		 $this->db->select($field);
		 $res = $this->db->get($tblname);
		 $res1 = $res->result();
		// echo "<pre>";print_r($res1);exit;
		 return $res1;
		}

function list_records($field,$tablename)
	{
		$this->db->select($field);
		$this->db->from($tablename);
		$this->db->join('organization','organization.org_id = department.org_id');
		$query = $this->db->get();
		$res1 = $query->result();
		return $res1;
		}


		
	public function select_by_join()
	{
		$this->db->select('*');
		$this->db->from('pre_hiring a');
		$this->db->join('organization b','b.org_id=a.organization','left');
		$this->db->join('vacancy c','a.post_applied=c.vacancy_id','left');
		$this->db->order_by("a.ID","desc");
		$result = $this->db->get();
		$res =  $result->result();
		//echo "<pre>"; print_r($res); exit;
		return $res;
		
	}

function list_designation($field,$tablename)
	{
		$this->db->select($field);
		$this->db->from('designation a');
		$this->db->join('organization b','b.org_id =a.org_id','left');
		$this->db->join('department c','c.department_id=a.department_id','left');
		$query = $this->db->get();
		$res1 = $query->result();
		return $res1;
		}
	
		
		
		function select_conditionalRecords($field,$tblname,$conditional_field,$condition)
	{
		 $this->db->select($field)->where($conditional_field,$condition);
		 $res = $this->db->get($tblname);
		 $res1 = $res->result();
		 //echo"<pre>"; print_r($res1); exit;
		 return $res1;
		}



function edit_organization()
		{
		$Org_id =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('organization');
		$this->db->where('org_id',$Org_id);
		$query = $this->db->get();
		return $query->result();
		}
function update($data)
	{
		$id = $this->input->post('designation_id');
		 $this->db->where('designation_id',$id);
		 $this->db->update('designation',$data);
		 return true;
		
		}

	
	public function update_status($Identifier,$fieldName,$tblName,$data,$field_ID)
	{
		$res =  $this->db->where($Identifier,$field_ID);
		$this->db->update($tblName,$data);
		return true;
		
		}
		
		
		public function update_data($conditional_field,$condition,$tbl_name,$data)
		{
			$res =  $this->db->where($conditional_field,$condition);
		$this->db->update($tbl_name,$data);
		return true;
			
		}


public function select_join_by4($id)
	{
		$this->db->select('*');
		$this->db->from('pre_hiring a');
		$this->db->join('organization b','b.org_id=a.organization','left');
		$this->db->join('vacancy c','a.post_applied=c.vacancy_id','left');
		//$this->db->join('interviewer_status d','d.prehiring_id=a.ID','left');
		$this->db->where('a.ID',$id);
		$result = $this->db->get();
		$res =  $result->result();
		//echo "<pre>"; print_r($res); exit;
		return $res;
	}


          function authentication()
	        {
		$username=$this->input->post('uname');
		$pass=$this->input->post('pass');
		 $this->db->select('*')->where('username',$username)->where('password',$pass);
		 $res = $this->db->get('ems_users');
		 $res1 = $res->result();
		 //echo "<pre>"; print_r($res1); exit;
		 return $res1;
		}
	
	
	
	public function post_employeeData()
	{
		$this->db->select('*');
		$this->db->from('post_hiring a');
		$this->db->join('organization b','b.org_id=a.business_unit','left');
		
		$this->db->join('designation c','c.designation_id=a.designation','left');
		$this->db->join('department d','d.department_id=a.department','left');
		$result = $this->db->get();
		$res =  $result->result();
		//echo "<pre>"; print_r($res); exit;
		return $res;
	}
	
	
	
	public function post_employeeDetail()
	{
		
		$emp_id =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('post_hiring a');
		$this->db->join('organization b','b.org_id=a.business_unit','left');
		
		$this->db->join('designation c','c.designation_id=a.designation','left');
		$this->db->join('department d','d.department_id=a.department','left');
		$this->db->where('ID',$emp_id);
		$result = $this->db->get();
		$res =  $result->result();
		//echo "<pre>"; print_r($res); exit;
		return $res;
	}
	
	
	
	
	/* Manglesh Query */


public function list_roles()
	{
		$this->db->select('*');
		$this->db->from('user_role');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		
		}
		
	public function ajax_department($org_id)
	{
			$this->db->select('*');
			$this->db->from('department');
			$this->db->where('org_id',$org_id);
			$this->db->where('status','1');
			$query = $this->db->get();
			return $query->result();
			
		}
		
	public function ajax_designation($dept_id)
	{
			$this->db->select('*');
			$this->db->from('designation');
			$this->db->where('department_id',$dept_id);
			$this->db->where('status','1');
			$query = $this->db->get();
			return $query->result();
			
			
		}
		
	public function list_all_user_role()
	{
		 $this->db->select('*');
		 $this->db->from('user_role a');
		 $this->db->join('organization b','a.org_id=b.org_id');
		 $this->db->join('department c','a.department_id=c.department_id','left');
		 $this->db->join('designation d','a.designation_id=d.designation_id','left');
		 $res = $this->db->get();
		 $res1 = $res->result();
		 //echo "<pre>"; print_r($res1); exit;
		 return $res1;
		}
	
	public function match_query($userrole)
	{
		$this->db->select('role_name');
		$this->db->from('user_role');
		$this->db->where('role_name',$userrole);
		$res = $this->db->get();
		return $res->result();
		}
		
	public function edit_user_role($Role_id)
	{
		$this->db->select('*');
		$this->db->from('user_role');
		$this->db->where('role_id',$Role_id);
		$result = $this->db->get();
		return $result->result();
		
		}
	public function update_user_role($field_ID,$data)
	{
		
		$res =  $this->db->where('role_id',$field_ID);
		$this->db->update('user_role',$data);
		return true;
		
		}
	public function select_business_unit($org_name)
	{
		$this->db->select('*');
		$this->db->from('organization');
		$this->db->where('org_name',$org_name);
		$res = $this->db->get();
		return $res->result();
		
		}
	
	
	
	
	function edit_records($fields,$tablename)
	{
		$desg_ID =  $this->uri->segment(3);
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->where('designation_id',$desg_ID);
		$query = $this->db->get();
		return $query->result();
		}
		
	
		
	function edit_department($Department_ID)
		{
		$Department_ID =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('department');
		$this->db->where('department_id',$Department_ID);
		$query = $this->db->get();
		return $query->result();
		}
		
	
	
	function update_department($Department_ID,$data)
	{
		 $this->db->where('department_id',$Department_ID);
		 $this->db->update('department',$data);
		 return true;
		
		}
		
	public function update_organization($data)
	{
		 $Org_id =  $this->uri->segment(3);
		 $this->db->where('org_id',$Org_id);
		 $this->db->update('organization',$data);
		 return true;
		
		}
	
	/*******************29-JULY*****************/
	
	public function check_attendance_type($attendance_type,$alias_name)
	{
		$this->db->select('attendance_type')->from('attendance_type')->where('attendance_type',$attendance_type)->or_where('attendance_alias_name',$alias_name);
		$query = $this->db->get();
		return $query->result();
			
		}
		
	public function insert_attendance_type($data,$attendence_tble)
	{
		$result = $this->db->insert($attendence_tble,$data);
		return $result;
		}
		
	public function Attendance_list()
	{
		$this->db->select('*')->from('attendance_type');
		$query = $this->db->get();
		return $query->result();
			
		}
		
	public function edit_attendance_type($attendance_ID)
	{
		$attendance_ID =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('attendance_type');
		$this->db->where('attendance_ID',$attendance_ID);
		$query = $this->db->get();
		return $query->result();
		
		}
		
	public function update_attendance_type($data)
	{
		$attendance_ID =  $this->uri->segment(3);
		 $this->db->where('attendance_ID',$attendance_ID);
		 $this->db->update('attendance_type',$data);
		 return true;
		}
		
	public function absent_reason_list()
	{
		
		$this->db->select('*')->from('absent_reason');
		$query = $this->db->get();
		return $query->result();
		
		}
		
	public function check_absent_reason($absent_reason)
	{
		$this->db->select('absent_reason')->from('absent_reason')->where('absent_reason',$absent_reason);
		$query = $this->db->get();
		return $query->result();
		
		}
		
	public function insert_absent_reason($data,$table_name)
	{
	$result = $this->db->insert($table_name,$data);
	return $result;
	}
	
	public function edit_absent_reason($absent_reason)
	{
		$absent_reason =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('absent_reason');
		$this->db->where('absent_ID',$absent_reason);
		$query = $this->db->get();
		return $query->result();
		
		}
	
	public function update_absent_reason($data)
	{
		$reason_ID =  $this->uri->segment(3);
		 $this->db->where('absent_ID',$reason_ID);
		 $this->db->update('absent_reason',$data);
		 return true;
		}
	
		
	/*******************29-JULY END*****************/
	
	/**********************30 July************************/
	
	public function all_service_types()
	{
		$this->db->select('*');
		$this->db->from('service_type a');
		$this->db->join('organization b','a.org_id=b.org_id','left');
		$query = $this->db->get();
		return $query->result();
		}
		
	
	public function check_service_type($service_name)
	{
		$this->db->select('*');
		$this->db->from('service_type');
		$this->db->where('service_type',$service_name);
		$query = $this->db->get();
		return $query->result();
		}
	
	public function add_new_service_type($data,$table_name)
	{
		$result = $this->db->insert($table_name,$data);
		return $result;
		
		}
	
	public function edit_service_type($serviceID)
	{
		$this->db->select('*');
		$this->db->from('service_type');
		$this->db->where('service_type_ID',$serviceID);
		$query = $this->db->get();
		return $query->result();
		}
		
	public function update_service_type($data)
	{
		$reason_ID =  $this->uri->segment(3);
		 $this->db->where('service_type_ID',$reason_ID);
		 $this->db->update('service_type',$data);
		 return true;
		}
		
	
	
	/**********************30 July************************/

	public function get_joining_employee()
	{
		
		$condition=date('m'.'/'.'d'.'/'.'Y');
		
		
	$tblname='pre_hiring';
		$field='*';
		$conditional_field='joining_date';
		$condition1=date('m'.'/'.'d'.'/'.'Y');
		$condition2=date('m'.'/'.'d'.'/'.'Y',strtotime('+1 week'));
		
		
	$this->db->select('*');
		$this->db->from('pre_hiring a');
		$this->db->join('organization b','b.org_id=a.organization','left');
		$this->db->join('vacancy c','a.post_applied=c.vacancy_id','left');
		$this->db->where('a.joining_date>=',$condition1);
		$this->db->where('a.joining_date <=', $condition2);
		$this->db->order_by("a.joining_date","asc");
		$result = $this->db->get();
		$res =  $result->result();
		//echo "<pre>"; print_r($res); exit;
		return $res;		
	}
	
	
	public function pre_weekjoining()
	{
		
		$tblname='pre_hiring';
		$field='*';
		$conditional_field='joining_date';
		$condition1=date('m'.'/'.'d'.'/'.'Y');
		$condition2=date('m'.'/'.'d'.'/'.'Y',strtotime('+1 week'));
		
		
	$this->db->select('*');
		$this->db->from('pre_hiring a');
		$this->db->join('organization b','b.org_id=a.organization','left');
		$this->db->join('vacancy c','a.post_applied=c.vacancy_id','left');
		$this->db->where('joining_date>=',$condition1);
		$this->db->where('joining_date <=', $condition2);
		$this->db->order_by("a.ID","desc");
		$result = $this->db->get();
		$res =  $result->result();
		//echo "<pre>"; print_r($res); exit;
		return $res;	
	}



public function training_data()
{
	$this->db->select('*');
		$this->db->from('pre_hiring a');
		$this->db->join('organization b','b.org_id=a.organization','left');
		$this->db->join('vacancy c','a.post_applied=c.vacancy_id','left');
		$this->db->join('jointotrain d','a.ID=d.user_id','left');
		$this->db->where('flag_status','IT');
		$this->db->order_by("a.ID","desc");
		$result = $this->db->get();
		$res =  $result->result();
		//echo "<pre>"; print_r($res); exit;
		return $res;	
}


public function select_Intraining()
	{
		 $this->db->select('*')->from('pre_hiring a');
		 $this->db->join('jointotrain b','b.user_id=a.ID','left');
		$this->db->where('a.flag_status','IT');
		$this->db->or_where('a.flag_status','IET');
		$this->db->or_where('a.flag_status','RIT');
		$this->db->order_by("a.first_name", "ASC"); 
		 $res = $this->db->get();
		 $res1 = $res->result();
		 //echo"<pre>"; print_r($res1); exit;
		 return $res1;
	}


function generate_traineeReport()
{
	$trainee=$this->input->post('trainee');
	$date_fromOn=$this->input->post('datefrom');
	$from=date('Y-m-d',strtotime($date_fromOn));
//echo $from;exit;
	
	$date_to=$this->input->post('dateto');
	
	if($date_to == '')
	{
		$this->db->select('*')->from('trainee_attendence')->where('att_date',$from)->where('attendence',$trainee);
		$que=$this->db->get();
		$resu=$que->result();
//echo "<pre>";print_r($resu);exit;
		if($resu)
		{
			$this->db->select('*')->from('pre_hiring')->where('ID',$trainee);
			$que=$this->db->get();
			$yesres=$que->result();
			
			//$desire=array('Astatus'=>'Present');
//			$result = array_merge( $yesres, $desire);
//			//duplicate objects will be removed
//			$result = array_map("unserialize", array_unique(array_map("serialize", $result)));
//			//array is sorted on the bases of id

			return $yesres;
			
		}else
		{
			$this->db->select('*')->from('pre_hiring')->where('ID',$trainee);
			$que=$this->db->get();
			foreach($que->result() as $tdata)
		
			 $res[] = (object) array('ID'=>$tdata->ID,'first_name'=>$tdata->first_name,'last_name'=>$tdata->last_name,'middle_name'=>$tdata->middle_name,'Astatus'=>'Absent','dfrom'=>$date_fromOn);
			//echo "<pre>";print_r($res);exit;
			return $res;
		}
				
	}else if($date_to <>'')
	{
		
		$from=date('Y-m-d', strtotime($date_fromOn));
		$to=date('Y-m-d', strtotime($date_to));
		
		
		$this->db->select('*')->from('trainee_attendence')->where('att_date BETWEEN "'.$from. '" and "'.$to.'"')->where('attendence',$trainee);
		$que=$this->db->get();
		$resu=$que->result();
		//echo "<pre>";print_r($resu);exit;
		return $resu;
			
		}
			
}



public function check_hiring_source($source_type)
	{
		$this->db->select('source')->from('hiring_source')->where('source',$source_type);
		$query = $this->db->get();
		return $query->result();
		
		}
		
		
		public function hiring_source_list()
	{
		
		$this->db->select('*')->from('hiring_source');
		$query = $this->db->get();
		return $query->result();
		
		}
		
		
		function edit_hiringsource()
		{
		$id =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('hiring_source');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result();
		}
		
function update_hiringsource($data)
	{
		$id = $this->uri->segment(3);
		 $this->db->where('id',$id);
		 $this->db->update('hiring_source',$data);
		 return true;
		
		}
		
		public function check_consultancy($consul)
	{
		$this->db->select('consultancy_name')->from('consultancy')->where('consultancy_name',$consul);
		$query = $this->db->get();
		return $query->result();
		
		}
		
		
			
		public function consultancy_list()
	{
		
		$this->db->select('*')->from('consultancy');
		$query = $this->db->get();
		return $query->result();
		
		}
		
		
		function edit_consultancy()
		{
		$id =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('consultancy');
		$this->db->where('consultancy_id',$id);
		$query = $this->db->get();
		return $query->result();
		}



function update_consultancy($data)
	{
		$id = $this->uri->segment(3);
		 $this->db->where('consultancy_id',$id);
		 $this->db->update('consultancy',$data);
		 return true;
		
		}
		
			public function check_portals($consul)
	{
		$this->db->select('name')->from('jobportals')->where('name',$consul);
		$query = $this->db->get();
		return $query->result();
		
		}
		
				
		public function portal_list()
	{
		
		$this->db->select('*')->from('jobportals');
		$query = $this->db->get();
		return $query->result();
		
		}
		
		
		function edit_portals()
		{
		$id =  $this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('jobportals');
		$this->db->where('portal_id',$id);
		$query = $this->db->get();
		return $query->result();
		}



function update_portals($data)
	{
		$id = $this->uri->segment(3);
		 $this->db->where('portal_id',$id);
		 $this->db->update('jobportals',$data);
		 return true;
		
		}
		


function edit_PostRecord()
{
	
	$id =  $this->uri->segment(3);
	
	$this->db->select('*')->from('post_hiring')->where('ID',$id);
	$query = $this->db->get();
	return $query->result();
	
}






}