<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Inserts extends CI_Model {

	public function AddThisEmployee($data)
	{
		$result = $this->db->insert('applicants', $data);
		return $result;
	}
	public function InsertAcadH($data)
	{
		$result = $this->db->insert('acad_history', $data);
		return $result;
	}
	public function InsertAdmin($data)
	{
		$result = $this->db->insert('admin', $data);
		return $result;
	}
	public function InsertEmploymentRecord($data)
	{
		$result = $this->db->insert('employment_record', $data);
		return $result;
	}
	public function InsertMachineOperated($data)
	{
		$result = $this->db->insert('machine_operated', $data);
		return $result;
	}
	public function InsertNewClient($data)
	{
		$result = $this->db->insert('clients', $data);
		return $result;
	}
	// public function InsertRelativesdata($data)
	// {
	// 	$result = $this->db->insert('relatives', $data);
	// 	return $result;
	// }
	// public function InserBeneficia($data)
	// {
	// 	$result = $this->db->insert('beneficiaries', $data);
	// 	return $result;
	// }

	public function InsertAuditLog($data)
	{
		$result = $this->db->insert('audit_log', $data);
		return $result;
	}
}
