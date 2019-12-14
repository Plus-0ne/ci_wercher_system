<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Selects extends CI_Model {

	public function GetEmployee()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Employed'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function getApplicant() // TODO: Duplicate?
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Applicant'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function getApplicantExpired()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Expired'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckEmployee($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID = ?";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function GetEmployeeDetails($id)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantNo = ?";
		$result = $this->db->query($SQL,$id);
		return $result;
	}
	public function GetEmployeeAcadhis($ApplicantID)
	{
		$SQL = "SELECT * FROM acad_history WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetEmploymentDetails($ApplicantID)
	{
		$SQL = "SELECT * FROM employment_record WHERE ApplicantID = '$ApplicantID'";
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
	public function GetApplicants() // TODO: Duplicate?
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Applicant'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetTotalApplicants()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Applicant' OR Status = 'Expired'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetApplicantSkills()
	{
		$result =  $this->db->query("SELECT PositionDesired, COUNT(*) as count FROM applicants WHERE Status = 'Applicant' GROUP BY PositionDesired");
		return $result;
	}
	public function CheckApplicant($ApplicantNo)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantNo = ?";
		$result = $this->db->query($SQL,$ApplicantNo);
		return $result;
	}
	public function Machine_Operatessss($ApplicantID)
	{
		$SQL = "SELECT * FROM machine_operated WHERE ApplicantID = ?";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function GetClients()
	{
		$SQL = "SELECT * FROM clients WHERE Status = 'Active'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckClient($ClientName)
	{
		$SQL = "SELECT * FROM clients WHERE Name = ?";
		$result = $this->db->query($SQL,$ClientName);
		return $result;
	}
	public function getClientOption()
	{
		$SQL = "SELECT * FROM clients";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetContractHistory($id)
	{
		$SQL = "SELECT * FROM contract_history, applicants WHERE contract_history.ApplicantID = '$id' AND applicants.ApplicantID = '$id'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbook()
	{
		$SQL = "SELECT * FROM logbook ORDER BY No DESC";
		$result = $this->db->query($SQL);
		return $result;
	}
}
