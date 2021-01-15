<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Updates extends CI_Model {

	public function EmployNewApplicant($Temp_ApplicantID,$ApplicantID,$data)
	{
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function ApplicantExpired($ApplicantID)
	{
		$data = array(
			'ClientEmployed' => '',
			'DateStarted' => '',
			'DateEnds' => '',
			'Status' => 'Expired',
			'ReminderType' => '',
			'ReminderDate' => '',
			'ReminderLocked' => 'No',
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function SuspensionExpires($ApplicantID)
	{
		$data = array(
			'Suspended' => '',
			'SuspensionStarted' => '',
			'SuspensionEnds' => '',
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function ExtendContract($ApplicantID,$data)
	{
		extract($data);
		$data = array(
			'DateEnds' => $DateEnds,
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function Suspend($ApplicantID,$data)
	{
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function UpdateEmployee($ApplicantID,$data)
	{
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function ReminderLocked($ApplicantID)
	{
		$data = array(
			'ReminderLocked' => 'Yes',
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function UpdateApplicantID($Temp_ApplicantID)
	{
		$data = array(
			'ApplicantID' => $Temp_ApplicantID,
		);
		$this->db->where('Temp_ApplicantID', $Temp_ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function BlacklistEmployee($ApplicantID)
	{
		$SQL = "UPDATE applicants SET Status = 'Blacklisted' WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function RestoreEmployee($ApplicantID)
	{
		$SQL = "UPDATE applicants SET Status = 'Applicant' WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function RestoreAdmin($AdminNo)
	{
		$SQL = "UPDATE admin SET Status = 'Active' WHERE AdminNo = '$AdminNo'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function RestoreClient($ClientID)
	{
		$SQL = "UPDATE clients SET Status = 'Active' WHERE ClientID = '$ClientID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function UpdateWeeklyHours($data, $Mode)
	{
		switch ($Mode) {
			case '0':
				$Mode = 'hours_weekly';
				break;
			case '1':
				$Mode = 'hours_semimonthly';
				break;
			case '2':
				$Mode = 'hours_monthly';
				break;
			default:
				$Mode = 'hours_weekly'; // default
				$this->Model_Logbook->SetPrompts('info', 'info', 'Invalid salary mode. Defaulting to weekly.');
				break;
		}
		$result = $this->db->replace($Mode, $data);
		return $result;
	}
	public function UpdateWeeklyHoursCurrent()
	{
		$data = array(
			'Current' => NULL,
		);
		$this->db->where('Current', 'Current');
		$result = $this->db->update('dummy_hours', $data);
		return $result;
	}
	public function UpdateSSSField($id, $data)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('sss_table', $data);
		return $result;
	}
	public function SetPrimaryWeek($Week, $ClientID)
	{
		$data = array(
			'WeekStart' => $Week,
			'ClientID' => $ClientID,
			'TimeAdded' => date('Y-m-d H:i:s'),
		);
		$result = $this->db->insert('salary', $data);
		return $result;
	}

	public function PayDeferredDeductions($id)
	{
		$SQL = "update deferred_deduction set is_paid=1 where id=$id";
        $result = $this->db->query($SQL,$id);
	}

	public function MarkAsPaid($id)
	{
		$SQL = "update hours_weekly set is_paid=1 where No=$id";
        $result = $this->db->query($SQL,$id);
	}
	public function AddSSSToBePaidAmount($data)
	{
		extract($data);
		$data = array(
			'Amount' => $Amount,
			'ApplicantID' => $ApplicantID,
			'ClientID' => $ClientID,
			'Year' => $Year,
			'Month' => $Month,
			'Week' => $Week,
			'Mode' => $Mode,
			'DateAdded' => $DateAdded,
		);
		switch($Week) {
			case 1:
				$WeekQuery = "Week1Amount = '$Amount', ";
				break;
			case 2:
				$WeekQuery = "Week2Amount = '$Amount', ";
				break;
			case 3:
				$WeekQuery = "Week3Amount = '$Amount', ";
				break;
			case 4:
				$WeekQuery = "Week4Amount = '$Amount', ";
				break;
			default:
				$WeekQuery = "Week1Amount = '$Amount', ";
				break;
		} 
		$SQL = "REPLACE INTO sss_tobepaid SET ApplicantID = '$ApplicantID',
		ClientID = '$ClientID',
		Month = '$Month',
		Year = '$Year',
		Mode = '$Mode',
		" . $WeekQuery . "
		DateAdded = '$DateAdded'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function UpdateSSSToBePaidAmount($data)
	{
		extract($data);
		$data = array(
			'Amount' => $Amount,
			'ApplicantID' => $ApplicantID,
			'ClientID' => $ClientID,
			'Year' => $Year,
			'Month' => $Month,
			'Week' => $Week,
			'Mode' => $Mode,
		);
		switch($Week) {
			case 1:
				$WeekQuery = " SET Week1Amount = '$Amount'";
				break;
			case 2:
				$WeekQuery = " SET Week2Amount = '$Amount'";
				break;
			case 3:
				$WeekQuery = " SET Week3Amount = '$Amount'";
				break;
			case 4:
				$WeekQuery = " SET Week4Amount = '$Amount'";
				break;
			default:
				$WeekQuery = " SET Week1Amount = '$Amount'";
				break;
		} 
		$SQL = "UPDATE sss_tobepaid" . $WeekQuery . " WHERE ApplicantID = '$ApplicantID' AND
		ClientID = '$ClientID' AND
		Month = '$Month' AND
		Year = '$Year' AND
		Mode = '$Mode'
		";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function UpdateSSSToBePaid($data)
	{
		extract($data);
		$data = array(
			'Input' => $Input,
			'ApplicantID' => $ApplicantID,
			'ClientID' => $ClientID,
			'Year' => $Year,
			'Month' => $Month,
			'Week' => $Week,
			'Mode' => $Mode,
			'DateUpdated' => $DateUpdated,
		);
		switch($Week) {
			case 1:
				$WeekQuery = "Week1Paid = '$Input'";
				break;
			case 2:
				$WeekQuery = "Week2Paid = '$Input'";
				break;
			case 3:
				$WeekQuery = "Week3Paid = '$Input'";
				break;
			case 4:
				$WeekQuery = "Week4Paid = '$Input'";
				break;
			default:
				$WeekQuery = "Week1Paid = '$Input'";
				break;
		} 
		$SQL = "UPDATE sss_tobepaid SET " . $WeekQuery . ", DateUpdated = '$DateUpdated' WHERE ApplicantID = '$ApplicantID' AND
		ClientID = '$ClientID' AND
		Month = '$Month' AND
		Year = '$Year' AND
		Mode = '$Mode'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function EmployPermanent($ApplicantID, $ClientID)
	{
		$DateStarted = new DateTime();
		$DateStarted = $DateStarted->format('Y-m-d H:i:s');
		$data = array(
			'ClientEmployed' => $ClientID,
			'Status' => 'Employed (Permanent)',
			'DateStarted' => $DateStarted,
			'DateEnds' => '',
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function UpdateClientInfo($data)
	{
		extract($data);
		$this->db->where('ClientID', $ClientID);
		$result = $this->db->update('clients', $data);
		return $result;
	}
	public function UpdateAdminInfo($data, $AdminNo)
	{
		$this->db->where('AdminNo', $AdminNo);
		$result = $this->db->update('admin', $data);
		return $result;
	}
}
