<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	
	public function __construct()
	{
		//echo "hi";exit;
		parent::__construct();
		$this->load->model('Query_builder','common_query');
		
	}

	public function index()
	{
		$data['profile_for']=$this->common_query->selectRecords('*','profile_for','status','1');
		$data['relig']=$this->common_query->selectRecords('*','religion','status','1');
		$data['mothertong']=$this->common_query->selectRecords('*','mother_tongue','status','1');
		$this->load->view('Users/add-profile.php',$data);
	}
	
	public function Category()
	{
		$this->load->view('Master/Category');
	}
	
	
}
