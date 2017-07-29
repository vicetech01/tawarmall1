<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
	}
	public function insert_record($table,$data)
	{
		$result = $this->db->insert($table,$data);
		return $result;
	}
	
	public function varification($table,$varification_field,$varify_data)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($varification_field,$varify_data);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function indian_city($state)
	{
		$this->db->select('City');
		$this->db->distinct();
		$this->db->from('india_states_cities');
		$this->db->where('State',$state);
		$res = $this->db->get();
		return $res->result();
		}
	
	function update_records($table,$data,$identifier,$field_name)
	{	
		 $this->db->where($field_name,$identifier);
		 $this->db->update($table,$data);
		 return true;
		
		}
	public function edit($table,$field,$identifier)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$identifier);
		$query = $this->db->get();
		return $query->result();
		
		
	}
}
	
	