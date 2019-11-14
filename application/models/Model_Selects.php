<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Selects extends CI_Model {

	public function GetEmployee()
	{
		$SQL = "SELECT * FROM employee WHERE Status = 'Active'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function getApplicant()
	{
		$SQL = "SELECT * FROM employee WHERE Status = 'Applicant'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckEmployee($Employee_ID)
	{
		$SQL = "SELECT * FROM employee WHERE Employee_ID = ?";
		$result = $this->db->query($SQL,$Employee_ID);
		return $result;
	}
	public function GetEmployeeDetails($id)
	{
		$SQL = "SELECT * FROM employee WHERE Employee_No = ?";
		$result = $this->db->query($SQL,$id);
		return $result;
	}
	public function GetEmployeeAcadhis()
	{
		$SQL = "SELECT * FROM acad_history";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetAdmin()
	{
		$SQL = "SELECT * FROM admin";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckAdminID($AdminID)
	{
		$SQL = "SELECT * FROM admin WHERE AdminID = ?";
		$result = $this->db->query($SQL,$AdminID);
		return $result;
	}
}
