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
	public function InsertNewClient($data, $ClientID)
	{
		$date = date('Y-m-d');
		$dateHours = date('Y-m-d H:i:s A');
		$salary_data = array(
			'ClientID' => $ClientID,
			'WeekStart' => $date,
			'TimeAdded' => $dateHours,
		);
		$result = $this->db->insert('salary', $salary_data);
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

	// RECORDS

	public function InsertContractHistory($data)
	{
		$result = $this->db->insert('contract_history', $data);
		return $result;
	}
	public function InsertAuditLog($data) // TODO: Add audit log functionality?
	{
		$result = $this->db->insert('audit_log', $data);
		return $result;
	}
	public function InsertLogbook($data)
	{
		$result = $this->db->insert('logbook', $data);
		return $result;
	}
	public function InsertLogbookExtended($data)
	{
		$result = $this->db->insert('logbook_extended', $data);
		return $result;
	}
	public function InsertReminder($ApplicantID, $data)
	{
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function InsertToClient($data)
	{
		$result = $this->db->insert('hours_weekly', $data);
		$result = $this->db->insert('hours_semimonthly', $data);
		$result = $this->db->insert('hours_monthly', $data);
		return $result;
	}
	public function InsertToPrevious($data)
	{
		$result = $this->db->insert('previous_company', $data);
		return $result;
	}
	public function InsertDummyHours($data)
	{
		$result = $this->db->replace('dummy_hours', $data);
		return $result;
	}
	public function AddDocuments($data)
	{
		$result = $this->db->insert('supp_documents', $data);
		return $result;
	}
	public function InsertDashboardMonths($data) // Dummy months
	{
		$result = $this->db->replace('dashboard_months', $data);
		return $result;
	}
	public function InsertToGraph()
	{
		$SQL = "REPLACE INTO dashboard_months (Year, Month, Total) SELECT DATE_FORMAT(AppliedOn, '%Y') as 'Year', DATE_FORMAT(AppliedOn, '%m') as 'Month', COUNT(ApplicantID) as 'Total' FROM applicants GROUP BY DATE_FORMAT(AppliedOn, '%Y%m')";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function InsertDocumentsNote($ApplicantID, $Note)
	{
		$DateAdded = date('Y-m-d h:i:s A');
		$data = array(
			'ApplicantID' => $ApplicantID,
			'Note' => $Note,
			'DateAdded' => $DateAdded,
		);
		$result = $this->db->insert('tab_documents_notes', $data);
		return $result;
	}
	public function AddtoSSS($data)
	{
		$result = $this->db->insert('sss_table', $data);
		return $result;
	}
	public function InsertTrackingTable($data)
	{
		$result = $this->db->insert('tracking_table', $data);
		return $result;
	}

	public function InsertDeferred($id,$empid,$amount,$period)
	{
		$SQL = "insert into deferred_deduction (id,employee_id,amount,period) values ($id,$empid,$amount,$period)";
        $result = $this->db->query($SQL,$id,$empid,$amount,$period);
	}
	public function InsertPayrollLoans($data)
	{
		$data['Time'] = date('Y-m-d H:i:s A');
		$result = $this->db->insert('payroll_loans', $data);
		return $result;
	}
	public function UpdatePayrollLoans($ID, $data)
	{
		$this->db->where('ID', $ID);
		$result = $this->db->update('payroll_loans', $data);
		return $result;
	}
	public function InsertPayrollProvisions($data)
	{
		$data['Time'] = date('Y-m-d H:i:s A');
		$result = $this->db->insert('payroll_provisions', $data);
		return $result;
	}
	public function UpdatePayrollProvisions($ID, $data)
	{
		$this->db->where('ID', $ID);
		$result = $this->db->update('payroll_provisions', $data);
		return $result;
	}
	public function InsertToEditHistory($data, $table)
	{
		$now = new DateTime();
		$DateUpdated = $now->format('Y-m-d H:i:s');
		$data['DateUpdated'] = $DateUpdated;
		$result = $this->db->insert($table, $data);
		return $result;
	}
	public function InsertSSSWeekPaid($data)
	{
		$data['Time'] = date('Y-m-d H:i:s A');
		$result = $this->db->insert('sss_weekpaid', $data);
		return $result;
	}
}
