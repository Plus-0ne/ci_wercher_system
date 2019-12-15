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
	public function GetEmployeeDetails($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID = '$ApplicantID'"; // TODO: Duplicate
		$result = $this->db->query($SQL,$ApplicantID);
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
		$result =  $this->db->query("SELECT PositionDesired, COUNT(*) as count FROM applicants WHERE Status = 'Applicant' OR Status = 'Expired' GROUP BY PositionDesired");
		return $result;
	}
	public function CheckApplicant($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID = ?";
		$result = $this->db->query($SQL,$ApplicantID);
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
		$SQL = "SELECT * FROM clients WHERE Status = 'Active'";
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
	public function GetLogbookWithLimit($Limit)
	{
		$SQL = "SELECT * FROM logbook ORDER BY No DESC LIMIT $Limit";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPreviousContract($id)
	{
		$SQL = "SELECT * FROM contract_history, applicants WHERE contract_history.ApplicantID = '$id' AND applicants.ApplicantID = '$id' ORDER BY ID DESC LIMIT 1";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPreviousContractInfo($name)
	{
		$SQL = "SELECT * FROM contract_history, clients WHERE contract_history.Client = '$name' AND clients.Name = '$name' ORDER BY ID DESC LIMIT 1";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetClientsEmployed($ClientID)
	{
		$SQL = "SELECT * FROM applicants, clients WHERE applicants.ClientEmployed = '$ClientID' AND clients.ClientID = '$ClientID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetMonthlyTotal()
	{
		$SQL = "SELECT DATE_FORMAT(AppliedOn, '%Y') as 'Year', DATE_FORMAT(AppliedOn, '%m') as 'Month', COUNT(ApplicantID) as 'Total' FROM applicants GROUP BY DATE_FORMAT(AppliedOn, '%Y%m')";
		$result = $this->db->query($SQL);
		return $result;
	}
}
