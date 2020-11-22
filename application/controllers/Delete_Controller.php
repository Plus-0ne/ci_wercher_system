<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_Controller extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->model('Model_Selects');
		$this->load->model('Model_Inserts');
		$this->load->model('Model_Deletes');
		$this->load->model('Model_Logbook');

		date_default_timezone_set('Asia/Manila');
	}
	public function RemoveEmployee()
	{
		$id = $this->input->get('id');
		if (!isset($_GET['id'])) {
			redirect('Employee');
		}
		else
		{
			$Removethis = $this->Model_Deletes->RemoveEmpl($id);
			if ($Removethis == TRUE) {
				// LOGBOOK
				$CheckEmployee = $this->Model_Selects->CheckEmployee($id);
				if ($CheckEmployee->num_rows() > 0) {
					foreach($CheckEmployee->result_array() as $row) {
						$LastName = $row['LastName'];
						$FirstName = $row['FirstName'];
						$MiddleName = $row['MiddleName'];
						$ContactNumber = $row['Phone_No'];
					}
				} else {
					// default
					$LastName = 'N/A';
					$FirstName = 'N/A';
					$MiddleName = 'N/A';
				}
				$this->Model_Logbook->SetPrompts('success', 'success', 'Succesfully archived ' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName));
				$this->Model_Logbook->LogbookEntry('Red', 'Applicant', ' archived <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $id . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Applicant ID: ' . $id);
				$this->Model_Logbook->LogbookExtendedEntry(0, 'ContactNumber: ' . $ContactNumber);
				if (isset($_SERVER['HTTP_REFERER'])) {
					redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
					redirect('Employee');
				}
			}
			else
			{
				redirect('Employee');
			}
		}
	}
	public function RemoveAdmin()
	{
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
						$AdminID = $row['AdminID'];
						$LastName = $row['LastName'];
						$FirstName = $row['FirstName'];
						$MiddleName = $row['MiddleName'];
						$AdminLevel = $row['AdminLevel'];
						$Position = $row['Position'];
						$DateAdded = $row['DateAdded'];
					}
				} else {
					// default
					$AdminID = 'N/A';
					$LastName = 'N/A';
					$FirstName = 'N/A';
					$MiddleName = 'N/A';
					$AdminLevel = 'N/A';
					$Position = 'N/A';
					$DateAdded = 'N/A';
				}
				$this->Model_Logbook->SetPrompts('success', 'success', 'Succesfully archived admin ' . $AdminID);
				$this->Model_Logbook->LogbookEntry('Red', 'Admin', ' removed admin <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewAdmin?id=' . $id . '" target="_blank">' . $AdminID . '</a>');
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Name: ' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName));
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Position: ' . $AdminLevel . ' - ' . $Position);
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Date Added: ' . date('Y-m-d H:i:s A',$row['DateAdded']));
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
	}
	public function RemoveClient()
	{
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
						$Name = $row['Name'];
						$Address = $row['Address'];
						$ContactNumber = $row['ContactNumber'];
					}
				} else {
					// default
					$Name = 'N/A';
					$Address = 'N/A';
					$ContactNumber = 'N/A';
				}
				$this->Model_Logbook->SetPrompts('success', 'success', 'Succesfully archived client ' . $Name);
				$this->Model_Logbook->LogbookEntry('Red', 'Client', ' archived client <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $id . '" target="_blank">' . $id . '</a>');
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Name: ' . $Name);
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Address: ' . $Address);
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Contact Number: ' . date('Y-m-d H:i:s A',$row['DateAdded']));
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
	}
	public function RemoveDocumentsNote()
	{
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
				redirect('Employee');
			}
		}
	}

}
