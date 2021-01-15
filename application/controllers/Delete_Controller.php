<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_Controller extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->model('Model_Security');
		$this->load->model('Model_Selects');
		$this->load->model('Model_Inserts');
		$this->load->model('Model_Deletes');
		$this->load->model('Model_Logbook');

		date_default_timezone_set('Asia/Manila');
	}
	public function RemoveEmployee()
	{
		if($this->Model_Security->CheckPermissions('ApplicantsEditing') || $this->Model_Security->CheckPermissions('EmployeesEditing')):
			$id = $this->input->get('id');
			if (!isset($_GET['id'])) {
				redirect('Employees');
			}
			else
			{
				$Removethis = $this->Model_Deletes->RemoveEmpl($id);
				if ($Removethis == TRUE) {
					// LOGBOOK
					$CheckEmployee = $this->Model_Selects->CheckEmployee($id);
					if ($CheckEmployee->num_rows() > 0) {
						foreach($CheckEmployee->result_array() as $row) {
							$FullName = '';
							if ($row['LastName']) {
								$FullName = $FullName . $row['LastName'] . ', ';
							}
							if ($row['FirstName']) {
								$FullName = $FullName . $row['FirstName'];
							}
							if ($row['MiddleName']) {	
								$FullName = $FullName . ' ' . $row['MiddleName'][0] . '.';
							}
							if ($row['ContactNumber']) {
								$ContactNumber = $row['Phone_No'];
							} else {
								$ContactNumber = 'N/A';
							}
						}
					} else {
						// default
						$FullName = '[No Name]';
						$ContactNumber = 'No record';
					}
					$this->Model_Logbook->SetPrompts('success', 'success', 'Succesfully archived ' . $FullName);
					$this->Model_Logbook->LogbookEntry('Red', 'Applicant', ' archived <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $id . '" target="_blank">' . $FullName . '</a>');
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Applicant ID:</b> ' . $id);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>ContactNumber:</b> ' . $ContactNumber);
					if (isset($_SERVER['HTTP_REFERER'])) {
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						redirect('Employees');
					}
				}
				else
				{
					redirect('Employees');
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function RemoveAdmin()
	{
		if($this->Model_Security->CheckPermissions('AdminsEditing')):
			$id = $this->input->get('id');
			if (!isset($_GET['id'])) {
				redirect('Admins');
			}
			else
			{
				$Removethis = $this->Model_Deletes->RemoveAdminM($id);
				if ($Removethis == TRUE) {
					// LOGBOOK
					$CheckAdminNo = $this->Model_Selects->CheckAdminNo($id);
					if ($CheckAdminNo->num_rows() > 0) {
						foreach($CheckAdminNo->result_array() as $row) {
							if ($row['AdminID']) {
								$AdminID = $row['AdminID'];
							} else {
								$AdminID = '[No Admin ID]';
							}
							$FullName = '';
							if ($row['LastName']) {
								$FullName = $FullName . $row['LastName'] . ', ';
							}
							if ($row['FirstName']) {
								$FullName = $FullName . $row['FirstName'];
							}
							if ($row['MiddleName']) {	
								$FullName = $FullName . ' ' . $row['MiddleName'][0] . '.';
							}
							if ($row['Position']) {
								$Position = $row['Position'];
							} else {
								$Position = 'N/A';
							}
							if ($row['Permissions']) {
								$Permissions = str_replace(',', ', ', $row['Permissions']);
							} else {
								$Permissions = 'N/A';
							}
							if ($row['DateAdded']) {
								$DateAdded = $row['DateAdded'];
							} else {
								$DateAdded = 'N/A';
							}
						}
					} else {
						// default
						$AdminID = '[No Admin ID]';
						$FullName = '[No Name]';
						$Position = 'N/A';
						$Permissions = 'N/A';
						$DateAdded = 'N/A';
					}
					$this->Model_Logbook->SetPrompts('success', 'success', 'Succesfully archived admin ' . $AdminID);
					$this->Model_Logbook->LogbookEntry('Red', 'Admin', ' removed admin <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewAdmin?id=' . $id . '" target="_blank">' . $AdminID . '</a>');
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Name:</b> ' . $FullName);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Position:</b> ' . $Position);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Permissions:</b> ' . $Permissions);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Date Added:</b> ' . $DateAdded);
					if (isset($_SERVER['HTTP_REFERER'])) {
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						redirect('Admins');
					}
				}
				else
				{
					redirect('Admins');
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function RemoveClient()
	{
		if($this->Model_Security->CheckPermissions('ClientsEditing')):
			$id = $this->input->get('id');
			if (!isset($_GET['id'])) {
				redirect('Clients');
			}
			else
			{
				$Removethis = $this->Model_Deletes->RemoveClientM($id);
				if ($Removethis == TRUE) {
					// LOGBOOK
					$CheckClient = $this->Model_Selects->CheckClient($id);
					if ($CheckClient->num_rows() > 0) {
						foreach($CheckClient->result_array() as $row) {
							if ($row['Name']) {
								$Name = $row['Name'];
							} else {
								$Name = '[No Name]';
							}
							if ($row['Address']) {
								$Address = $row['Address'];
							} else {
								$Address = 'N/A';
							}
							if ($row['ContactNumber']) {
								$ContactNumber = $row['ContactNumber'];
							} else {
								$ContactNumber = 'N/A';
							}
						}
					} else {
						// default
						$Name = 'N/A';
						$Address = 'N/A';
						$ContactNumber = 'N/A';
					}
					$this->Model_Logbook->SetPrompts('success', 'success', 'Succesfully archived client ' . $Name);
					$this->Model_Logbook->LogbookEntry('Red', 'Client', ' archived client <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $id . '" target="_blank">' . $id . '</a>');
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Name:</b> ' . $Name);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Address:</b> ' . $Address);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Contact Number:</b> ' . $ContactNumber);
					if (isset($_SERVER['HTTP_REFERER'])) {
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						redirect('Clients');
					}
				}
				else
				{
					redirect('Clients');
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function RemoveDocumentsNote()
	{
		if($this->Model_Security->CheckPermissions('ApplicantsEditing') || $this->Model_Security->CheckPermissions('EmployeesEditing')):
			$DatabaseID = $this->input->get('id');
			$ApplicantID = $this->input->get('user');
			if (!isset($_GET['id'])) {
				redirect('ViewEmployee?id=' . $ApplicantID . '#Documents');
			}
			else
			{
				$Removethis = $this->Model_Deletes->RemoveDocumentsNote($DatabaseID, $ApplicantID);
				if ($Removethis == TRUE) {
					redirect('ViewEmployee?id=' . $ApplicantID . '#Documents');
				}
				else
				{
					redirect('Employees');
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function DeleteSSSTableRow()
	{
		if($this->Model_Security->CheckPermissions('Payroll')):
			$id = $this->input->get('row');
			if ($id == NULL) {
				redirect('SSS_Table');
				$this->Model_Logbook->SetPrompts('danger', 'danger', 'No row selected for deletion');
			}
			else
			{
				$dataAvailable = false;
				$GetSSSTableRowFromID = $this->Model_Selects->GetSSSTableRowFromID($id);
				if ($GetSSSTableRowFromID->num_rows() > 0) {
					foreach($GetSSSTableRowFromID->result_array() as $srow) {
						$dataAvailable = true;
						$fromRange = $srow['f_range'];
						$toRange = $srow['t_range'];
						$contributionER = $srow['contribution_er'];
						$contributionEE = $srow['contribution_ee'];
						$contributionEC = $srow['contribution_ec'];
						$total = $srow['total'];
						$totalEC = $srow['total_with_ec'];

					}
				}
				$RemoveSSSTableRow = $this->Model_Deletes->RemoveSSSTableRow($id);
				if ($RemoveSSSTableRow == TRUE) {
					redirect('SSS_Table');
					$this->Model_Logbook->SetPrompts('success', 'success', 'Succesfully removed row');
					$this->Model_Logbook->LogbookEntry('Red', 'Payroll', ' removed an SSS table row');
					if ($dataAvailable) {
						$this->Model_Logbook->LogbookExtendedEntry(0, '<b>From:</b> ' . $fromRange);
						$this->Model_Logbook->LogbookExtendedEntry(0, '<b>To:</b> ' . $toRange);
						$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Contribution (ER):</b> ' . $contributionER);
						$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Contribution (EE):</b> ' . $contributionEE);
						$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Contribution (EC):</b> ' . $contributionEC);
						$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Total:</b> ' . $total);
						$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Total with EC:</b> ' . $totalEC);
					}
				}
				else
				{
					redirect('SSS_Table');
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}

}
