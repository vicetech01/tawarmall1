<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function index()
	{
		
		$this->load->view('Master/Category');
	}
	
	public function Category()
	{
		$this->load->view('Master/Category');
	}
	
	
}
