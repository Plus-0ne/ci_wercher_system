<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Deletes extends CI_Model {

	public function RemoveEmpl($ApplicantID)
	{
		$now = new DateTime();
		$DateRemoved = $now->format('Y-m-d H:i:s');
		$SQL = "UPDATE applicants SET Status ='Deleted', DateRemoved = '$DateRemoved', ClientEmployed = NULL WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function RemoveAdminM($id)
	{
		$now = new DateTime();
		$DateRemoved = $now->format('Y-m-d H:i:s');
		$SQL = "UPDATE admin SET Status = 'Deleted', DateRemoved = '$DateRemoved' WHERE AdminNo = ?";
		$result = $this->db->query($SQL,$id);
		return $result;
	}
	public function RemoveClientM($id)
	{
		$now = new DateTime();
		$DateRemoved = $now->format('Y-m-d H:i:s');
		$SQL = "UPDATE clients SET Status ='Deleted', DateRemoved = '$DateRemoved' WHERE ClientID = ?";
		$result = $this->db->query($SQL,$id);
		return $result;
	}
	public function RemoveAcadHistory($listCheck)
	{
		$SQL = "DELETE FROM `acad_history` WHERE `Acad_No` IN ($listCheck)";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function RemoveEmpRecord($listCheck)
	{
		$SQL = "DELETE FROM `employment_record` WHERE `No` IN ($listCheck)";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function RemoveMachineOperated($listCheck)
	{
		$SQL = "DELETE FROM `machine_operated` WHERE `No` IN ($listCheck)";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CleanWeeklyDates()
	{
		$SQL = "DELETE FROM dummy_hours WHERE Current IS NULL";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CleanDashboardMonths($CurrentYear)
	{
		$SQL = "DELETE FROM dashboard_months WHERE Year <> '$CurrentYear'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function RemoveDocumentsNote($DatabaseID, $ApplicantID)
	{
		$SQL = "UPDATE tab_documents_notes SET Deleted ='1' WHERE DatabaseID = '$DatabaseID' AND ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function RemovePayrollLoans($ApplicantID, $LoanID)
	{
		$SQL = "UPDATE payroll_loans SET Deleted ='1' WHERE ID = '$LoanID' AND ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function RemovePayrollProvisions($ApplicantID, $ProvisionID)
	{
		$SQL = "UPDATE payroll_provisions SET Deleted ='1' WHERE ID = '$ProvisionID' AND ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function RemoveSSSTableRow($id)
	{
		$data = array(
			'active' => 0,
		);
		$this->db->where('ID', $id);
		$result = $this->db->update('sss_table', $data);
		return $result;
	}
}
