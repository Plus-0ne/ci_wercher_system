<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_Controller extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->model('Model_Security');
		$this->load->model('Model_Selects');
		$this->load->model('Model_Inserts');
		$this->load->model('Model_Deletes');
		$this->load->model('Model_Updates');
		$this->load->model('Model_Logbook');

		date_default_timezone_set('Asia/Manila');
	}
	public function EmployApplicant()
	{
		if (isset($_POST['ApplicantID'])) {
			$ApplicantID = $this->input->post('ApplicantID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$ClientID = $this->input->post('ClientID',TRUE);
			$H_Days = $this->input->post('H_Days',TRUE);
			$H_Months = $this->input->post('H_Months',TRUE);
			$H_Years = $this->input->post('H_Years',TRUE);
			$Salary = $this->input->post('Salary',TRUE);
			$EmployeeID = $this->input->post('EmployeeID',TRUE);
			$EmploymentType = $this->input->post('EmploymentType',TRUE);
			if($H_Days == NULL) {
				$H_Days = 0;
			}
			if($H_Months == NULL) {
				$H_Months = 0;
			}
			if($H_Years == NULL) {
				$H_Years = 0;
			}
			$Temp_ApplicantID = $ApplicantID;
			$Temp_ApplicantID++;

			if ($ApplicantID == NULL || $ClientID == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again. 1');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				if ($CheckApplicant->num_rows() > 0) {
					$row = $CheckApplicant->row_array();
					if ($EmploymentType == 'Contractual') {
						$DateStarted = date('Y-m-d h:i:s A');

						if ($H_Months == NULL) {
							$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 months', strtotime($DateStarted)));
						} else {
							$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$H_Months.' months', strtotime($DateStarted)));
						}
						if ($H_Days == NULL) {
							$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 days', strtotime($DateEnds)));
						} else {
							$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$H_Days.' days', strtotime($DateEnds)));
						}
						if ($H_Years == NULL) {
							$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 days', strtotime($DateEnds)));
						} else {
							$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$H_Years.' years', strtotime($DateEnds)));
						}

						$data = array(
							'EmployeeID' => $EmployeeID,
							'ClientEmployed' => $ClientID,
							'DateStarted' => $DateStarted,
							'DateEnds' => $DateEnds,
							'Status' => 'Employed',
							'SalaryExpected' => $Salary,
						);
						$EmployNewApplicant = $this->Model_Updates->EmployNewApplicant($Temp_ApplicantID,$ApplicantID,$data);
						$fullName = '';
						if ($row['LastName']) {
							$fullName = $fullName . $row['LastName'] . ', ';
						} else {
							$fullName = $fullName . '[No Last Name], ';
						}
						if ($row['FirstName']) {
							$fullName = $fullName . $row['FirstName'];
						} else {
							$fullName = $fullName . '[No First Name]';
						}
						if ($row['MiddleName']) {
							$fullName = ' ' . $fullName . $row['MiddleName'];
						}
						$data = array(
							'ClientID' => $ClientID,
							'ApplicantID' => $Temp_ApplicantID,
							'Name' => $fullName,
							'Salary' => $row['SalaryExpected'],
						);
						$InsertToClient = $this->Model_Inserts->InsertToClient($data);
						if ($EmployNewApplicant && $InsertToClient) {
							$this->Model_Logbook->SetPrompts('success', 'success', 'Employed successfully');
							// LOGBOOK
							$duration = '';
							if($H_Years != 0) {
								$duration = $duration . $H_Years;
								if($H_Years == 1) {
									$duration = $duration . ' year, ';
								} else {
									$duration = $duration . ' years, ';
								}
							}
							if($H_Months != 0) {
								$duration = $duration . $H_Months;
								if($H_Months == 1) {
									$duration = $duration . ' month, ';
								} else {
									$duration = $duration . ' months, ';
								}
							}
							if($H_Days != 0) {
								$duration = $duration . $H_Days;
								if($H_Days == 1) {
									$duration = $duration . ' day, ';
								} else {
									$duration = $duration . ' days, ';
								}
							}
							$duration = substr($duration, 0, -2);
							$duration = new DateTime($duration);
							$now = (new DateTime(date('Y-m-d')))->format('F d, Y');
							$duration = $duration->format('F d, Y');
							$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
							if ($CheckApplicant->num_rows() > 0) {
								foreach($CheckApplicant->result_array() as $row) {
									$LastName = $row['LastName'];
									$FirstName = $row['FirstName'];
									$MiddleName = $row['MiddleName'];
								}
							} else {
								$LastName = 'N/A';
								$FirstName = 'N/A';
								$MiddleName = 'N/A';
							}
							$GetClientID = $this->Model_Selects->GetClientID($ClientID);
							if ($GetClientID->num_rows() > 0) {
								foreach($GetClientID->result_array() as $row) {
									$ClientName = $row['Name'];
								}
							} else {
								$ClientName = 'N/A';
							}
							$this->Model_Logbook->LogbookEntry('Blue', 'Employee', ' employed <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Contract" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a> to <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $ClientID . '" target="_blank">' . $ClientName . '</a>');
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Status changed from <b>Applicant</b> to <b>Employed</b>');
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Contract Duration: <b>' . $now . '</b> to <b>' . $duration . '</b>');
							redirect($_SERVER['HTTP_REFERER']);
						}
						else
						{
							$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again. 6');
							redirect($_SERVER['HTTP_REFERER']);
						}
					}
					else
					{
						$EmploymentStatus = $this->input->post('EmploymentStatus');
						if ($EmploymentStatus != NULL) {
							$EmploymentType = $EmploymentStatus;
						}
						if ($EmploymentType == 'Regular') {
							$EmploymentType = 'Employed (Permanent)';
						}
						$PreviousCompany = $this->input->post('PreviousName');
						$PreviousContact = $this->input->post('PreviousContact');
						$PreviousAddress = $this->input->post('PreviousAddress');
						$data = array(
							'EmployeeID' => $EmployeeID,
							'ClientEmployed' => $ClientID,
							'Status' => $EmploymentType,
							'SalaryExpected' => $Salary,
						);
						$EmployNewApplicant = $this->Model_Updates->EmployNewApplicant($Temp_ApplicantID,$ApplicantID,$data);
						$fullName = '';
						if ($row['LastName']) {
							$fullName = $fullName . $row['LastName'] . ', ';
						} else {
							$fullName = $fullName . '[No Last Name], ';
						}
						if ($row['FirstName']) {
							$fullName = $fullName . $row['FirstName'];
						} else {
							$fullName = $fullName . '[No First Name]';
						}
						if ($row['MiddleName']) {
							$fullName = ' ' . $fullName . $row['MiddleName'];
						}
						$data = array(
							'ClientID' => $ClientID,
							'ApplicantID' => $Temp_ApplicantID,
							'Name' => $fullName,
							'Salary' => $row['SalaryExpected'],
						);
						$InsertToClient = $this->Model_Inserts->InsertToClient($data);
						$data = array(
							'ApplicantID' => $ApplicantID,
							'CompanyName' => $PreviousCompany,
							'CompanyContact' => $PreviousContact,
							'CompanyAddress' => $PreviousAddress,
						);
						$InsertToPrevious = $this->Model_Inserts->InsertToPrevious($data);
						if ($EmployNewApplicant && $InsertToClient) {
							$this->Model_Logbook->SetPrompts('success', 'success', 'Employed successfully');
							// LOGBOOK
							$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
							if ($CheckApplicant->num_rows() > 0) {
								foreach($CheckApplicant->result_array() as $row) {
									$LastName = $row['LastName'];
									$FirstName = $row['FirstName'];
									$MiddleName = $row['MiddleName'];
								}
							} else {
								$LastName = 'N/A';
								$FirstName = 'N/A';
								$MiddleName = 'N/A';
							}
							$GetClientID = $this->Model_Selects->GetClientID($ClientID);
							if ($GetClientID->num_rows() > 0) {
								foreach($GetClientID->result_array() as $row) {
									$ClientName = $row['Name'];
								}
							} else {
								$ClientName = 'N/A';
							}
							$this->Model_Logbook->LogbookEntry('Blue', 'Employee', ' employed <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Contract" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a> to <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $ClientID . '" target="_blank">' . $ClientName . '</a>');
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Status changed from <b>Applicant</b> to <b>Regular</b>');
							redirect($_SERVER['HTTP_REFERER']);
						}
						else
						{
							$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again. 2');
							redirect($_SERVER['HTTP_REFERER']);
						}
					}
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again. 3');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again. 4');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function ExtendContract()
	{
		if (isset($_POST['ApplicantID'])) {
			$ApplicantID = $this->input->post('ApplicantID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$E_CurrentDate = $this->input->post('E_CurrentDate',TRUE);
			$E_Days = $this->input->post('E_Days',TRUE);
			$E_Months = $this->input->post('E_Months',TRUE);
			$E_Years = $this->input->post('E_Years',TRUE);

			if ($ApplicantID == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				if ($CheckApplicant->num_rows() > 0) {

					if ($E_Months == NULL) {
						$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 months', strtotime($E_CurrentDate)));
					} else {
						$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$E_Months.' months', strtotime($E_CurrentDate)));
					}
					if ($E_Days == NULL) {
						$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 days', strtotime($DateEnds)));
					} else {
						$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$E_Days.' days', strtotime($DateEnds)));
					}
					if ($E_Years == NULL) {
						$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 days', strtotime($DateEnds)));
					} else {
						$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$E_Years.' years', strtotime($DateEnds)));
					}

					$data = array(
						'DateEnds' => $DateEnds,
					);
					$EmployNewApplicant = $this->Model_Updates->ExtendContract($ApplicantID,$data);
					if ($EmployNewApplicant == TRUE) {
						// LOGBOOK
						$CheckEmployee = $this->Model_Selects->CheckEmployee($ApplicantID);
						if ($CheckEmployee->num_rows() > 0) {
							foreach($CheckEmployee->result_array() as $row) {
								$LastName = $row['LastName'];
								$FirstName = $row['FirstName'];
								$MiddleName = $row['MiddleName'];
							}
						} else {
							$LastName = 'N/A';
							$FirstName = 'N/A';
							$MiddleName = 'N/A';
						}
						$logbookBeforeDate = new DateTime($E_CurrentDate);
						$logbookAfterDate = new DateTime($DateEnds);
						$logbookBeforeDate = $logbookBeforeDate->format('Y-m-d');
						$logbookAfterDate = $logbookAfterDate->format('Y-m-d');
						$logbookBeforeDate = DateTime::createFromFormat('Y-m-d', $logbookBeforeDate)->format('F d, Y');
						$logbookAfterDate = DateTime::createFromFormat('Y-m-d', $logbookAfterDate)->format('F d, Y');
						$this->Model_Logbook->SetPrompts('success', 'success', 'Contract extended to ' . $logbookAfterDate);
						$this->Model_Logbook->LogbookEntry('Blue', 'Employee', ' updated contract duration for <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Contract" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
						$this->Model_Logbook->LogbookExtendedEntry(0, 'Contract changed from <b>' . $logbookBeforeDate . '</b> to <b>' . $logbookAfterDate . '</b>');
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again.');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'No connection to server. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function Suspend()
	{
		if (isset($_POST['SuspendID'])) {
			$ApplicantID = $this->input->post('SuspendID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$S_Days = $this->input->post('S_Days',TRUE);
			$S_Months = $this->input->post('S_Months',TRUE);
			$S_Years = $this->input->post('S_Years',TRUE);
			$S_Hours = $this->input->post('S_Days',TRUE);
			$S_Minutes = $this->input->post('S_Months',TRUE);
			$S_Seconds = $this->input->post('S_Years',TRUE);
			$S_Remarks = $this->input->post('S_Remarks',TRUE);

			if ($ApplicantID == NULL) {
				$this->Model_Logbook->SetPrompts('success', 'success', 'Contract extended to ' . $logbookAfterDate);$this->Model_Logbook->SetPrompts('success', 'success', 'Contract extended to ' . $logbookAfterDate);
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{

				$DateStarted = date('Y-m-d h:i:s A');

				if ($S_Months == NULL) {
					$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 months', strtotime($DateStarted)));
				} else {
					$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$S_Months.' months', strtotime($DateStarted)));
				}
				if ($S_Days == NULL) {
					$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 days', strtotime($DateEnds)));
				} else {
					$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$S_Days.' days', strtotime($DateEnds)));
				}
				if ($S_Years == NULL) {
					$DateEnds = date('Y-m-d h:i:s A', strtotime('+0 days', strtotime($DateEnds)));
				} else {
					$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$S_Years.' years', strtotime($DateEnds)));
				}

				$data = array(
					'SuspensionStarted' => $DateStarted,
					'SuspensionEnds' => $DateEnds,
					'SuspensionRemarks' => $S_Remarks,
					'Suspended' => 'Yes',
				);
				$Suspend = $this->Model_Updates->Suspend($ApplicantID,$data);
				if ($Suspend == TRUE) {
					// LOGBOOK
					$CheckEmployee = $this->Model_Selects->CheckEmployee($ApplicantID);
					if ($CheckEmployee->num_rows() > 0) {
						foreach($CheckEmployee->result_array() as $row) {
							$LastName = $row['LastName'];
							$FirstName = $row['FirstName'];
							$MiddleName = $row['MiddleName'];
						}
					} else {
						$LastName = 'N/A';
						$FirstName = 'N/A';
						$MiddleName = 'N/A';
					}
					$logbookBeforeDate = new DateTime($DateStarted);
					$logbookAfterDate = new DateTime($DateEnds);
					$logbookBeforeDate = $logbookBeforeDate->format('Y-m-d');
					$logbookAfterDate = $logbookAfterDate->format('Y-m-d');
					$logbookBeforeDate = DateTime::createFromFormat('Y-m-d', $logbookBeforeDate)->format('F d, Y');
					$logbookAfterDate = DateTime::createFromFormat('Y-m-d', $logbookAfterDate)->format('F d, Y');
					$this->Model_Logbook->SetPrompts('success', 'success', 'Added suspension until ' . $logbookAfterDate);
					$this->Model_Logbook->LogbookEntry('Red', 'Employee', ' suspended <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Contract" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Suspended for <b>' . $logbookBeforeDate . '</b> to <b>' . $logbookAfterDate . '</b>');
					redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function UpdateEmployee()
	{
		$ApplicantID = $this->input->post('M_ApplicantID');
		$EmployeeID = $this->input->post('EmployeeID');
		$pImage = $this->input->post('M_ApplicantImage');
		# PERSONAL INFORMATION
		$PositionDesired = $this->input->post('PositionDesired');
		$PositionGroup = $this->input->post('PositionGroup');
		$SalaryExpected = $this->input->post('SalaryExpected');
		$LastName = $this->input->post('LastName');
		$FirstName = $this->input->post('FirstName');
		$MiddleName = $this->input->post('MiddleName');
		$Gender = $this->input->post('Gender');
		$Age = $this->input->post('Age');
		$Height = $this->input->post('Height');
		$Weight = $this->input->post('Weight');
		$Religion = $this->input->post('Religion');
		
		$bDate = $this->input->post('bDate');
		$bPlace = $this->input->post('bPlace');
		$Citizenship = $this->input->post('Citizenship');
		$CivilStatus = $this->input->post('CivilStatus');
		$No_Children = $this->input->post('No_Children');
		$PhoneNumber = $this->input->post('PhoneNumber');
		$EmailAddress = $this->input->post('EmailAddress');
		# DOCUMENTS
		$SSS = $this->input->post('SSS');
		$RCN = $this->input->post('RCN');
		$TIN = $this->input->post('TIN');
		$HDMF = $this->input->post('HDMF');
		$PhilHealth = $this->input->post('PhilHealth');
		$HMO = $this->input->post('HMO');
		$ATM_No = $this->input->post('ATM_No');

		$EmergencyPerson = $this->input->post('EmergencyPerson');
		$EmergencyContact = $this->input->post('EmergencyContact');
		$Referral = $this->input->post('Referral');
		$NameExtension = $this->input->post('NameExtension');

		# ADDRESSES
		$Address_Present = $this->input->post('Address_Present');
		$Address_Provincial = $this->input->post('Address_Provincial');
		$Address_Manila = $this->input->post('Address_Manila');

		if ($PositionDesired == NULL || $LastName == NULL || $FirstName == NULL) {
			$this->Model_Logbook->SetPrompts('error', 'error', 'Missing required fields: Position Desired, Last Name, and First Name.');
			$data = array(
				'EmployeeID' => $EmployeeID,
				'PositionDesired' => $PositionDesired,
				'PositionGroup' => $PositionGroup,
				'SalaryExpected' => $SalaryExpected,
				'LastName' => $LastName,
				'FirstName' => $FirstName,
				'MiddleName' => $MiddleName,
				'Gender' => $Gender,
				'Age' => $Age,
				'Height' => $Height,
				'Weight' => $Weight,
				'Religion' => $Religion,
				'bDate' => $bDate,
				'bPlace' => $bPlace,
				'Citizenship' => $Citizenship,
				'CivilStatus' => $CivilStatus,
				'No_Children' => $No_Children,
				'PhoneNumber' => $PhoneNumber,
				'EmailAddress' => $EmailAddress,
				'SSS' => $SSS,
				'RCN' => $RCN,
				'TIN' => $TIN,
				'HDMF' => $HDMF,
				'ATM_No' => $ATM_No,
				'PhilHealth' => $PhilHealth,
				'HMO' => $HMO,

				'EmergencyPerson' => $EmergencyPerson,
				'EmergencyContact' => $EmergencyContact,
				'Referral' => $Referral,
				'NameExtension' => $NameExtension,


				'Address_Present' => $Address_Present,
				'Address_Provincial' => $Address_Provincial,
				'Address_Manila' => $Address_Manila,
			);
			$this->session->set_flashdata($data);
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			// Logbook Records
			$CheckEmployee = $this->Model_Selects->CheckEmployee($ApplicantID);
			if ($CheckEmployee->num_rows() > 0) {
				foreach ($CheckEmployee->result_array() as $row) {
					$prevEmployeeID = $row['EmployeeID'];
					$prevpImage = $row['ApplicantImage'];
					# PERSONAL INFORMATION
					$prevPositionDesired = $row['PositionDesired'];
					$prevPositionGroup = $row['PositionGroup'];
					$prevSalaryExpected = $row['SalaryExpected'];
					$prevLastName = $row['LastName'];
					$prevFirstName = $row['FirstName'];
					$prevMiddleName = $row['MiddleName'];
					$prevGender = $row['Gender'];
					$prevAge = $row['Age'];
					$prevHeight = $row['Height'];
					$prevWeight = $row['Weight'];
					$prevReligion = $row['Religion'];

					$prevbDate = $row['BirthDate'];
					$prevbPlace = $row['BirthPlace'];
					$prevCitizenship = $row['Citizenship'];
					$prevCivilStatus = $row['CivilStatus'];
					$prevNo_Children = $row['No_OfChildren'];
					$prevPhoneNumber = $row['Phone_No'];
					$prevEmailAddress = $row['EmailAddress'];
					# DOCUMENTS
					$prevSSS = $row['SSS_No'];
					$prevRCN = $row['ResidenceCertificateNo'];
					$prevTIN = $row['TIN'];
					$prevHDMF = $row['HDMF'];
					$prevPhilHealth = $row['PhilHealth'];
					$prevHMO = $row['HMO'];
					$prevATM_No = $row['ATM_No'];

					$prevEmergencyPerson = $row['EmergencyPerson'];
					$prevEmergencyContact = $row['EmergencyContact'];
					$prevReferral = $row['Referral'];
					$prevNameExtension = $row['NameExtension'];

					# ADDRESSES
					$prevAddress_Present = $row['Address_Present'];
					$prevAddress_Provincial = $row['Address_Provincial'];
					$prevAddress_Manila = $row['Address_Manila'];
				}
			} else {
				$prevEmployeeID = 'N/A';
				$prevpImage = 'N/A';
				# PERSONAL INFORMATION
				$prevPositionDesired = 'N/A';
				$prevPositionGroup = 'N/A';
				$prevSalaryExpected = 'N/A';
				$prevLastName = 'N/A';
				$prevFirstName = 'N/A';
				$prevMiddleName = 'N/A';
				$prevGender = 'N/A';
				$prevAge = 'N/A';
				$prevHeight = 'N/A';
				$prevWeight = 'N/A';
				$prevReligion = 'N/A';

				$prevbDate = 'N/A';
				$prevbPlace = 'N/A';
				$prevCitizenship = 'N/A';
				$prevCivilStatus = 'N/A';
				$prevNo_Children = 'N/A';
				$prevPhoneNumber = 'N/A';
				# DOCUMENTS
				$prevSSS = 'N/A';
				$prevRCN = 'N/A';
				$prevTIN = 'N/A';
				$prevHDMF = 'N/A';
				$prevPhilHealth = 'N/A';
				$prevHMO = 'N/A';
				$prevATM_No = 'N/A';

				$prevEmergencyPerson = 'N/A';
				$prevEmergencyContact = 'N/A';
				$prevReferral = 'N/A';
				$prevNameExtension = 'N/A';

				# ADDRESSES
				$prevAddress_Present = 'N/A';
				$prevAddress_Provincial = 'N/A';
				$prevAddress_Manila = 'N/A';

			}

			if (!$_FILES['pImage']['name'] == '') {
				$config['upload_path']          = './uploads/'.$ApplicantID;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$config['max_width']            = 2000;
				$config['max_height']           = 2000;

				$this->load->library('upload', $config);
				if (!is_dir('uploads'))
				{
					mkdir('./uploads', 0777, true);
				}
				if (!is_dir('uploads/' . $ApplicantID))
				{
					mkdir('./uploads/' . $ApplicantID, 0777, true);
					$dir_exist = false;
				}

				if (! $this->upload->do_upload('pImage'))
				{
					$this->Model_Logbook->SetPrompts('error', 'none', $this->upload->display_errors());
					redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
					$pImage = base_url().'uploads/'.$ApplicantID.'/'.$this->upload->data('file_name');
					// Create thumbnail
					$this->load->library('image_lib');
					$tconfig['image_library'] = 'gd2';
					$tconfig['source_image'] = './uploads/'.$ApplicantID.'/'.$this->upload->data('file_name');
					$tconfig['create_thumb'] = TRUE;
					$tconfig['maintain_ratio'] = TRUE;
					$tconfig['width']         = 70;
					$tconfig['height']       = 70;
					$tconfig['new_image'] = './uploads/'.$ApplicantID.'/';

					$this->load->library('image_lib', $tconfig);
					$this->image_lib->initialize($tconfig);

					$this->image_lib->resize();
					if ( ! $this->image_lib->resize())
					{
					        $this->Model_Logbook->SetPrompts('error', 'error', $this->image_lib->display_errors() . $tconfig['source_image']);
					}
					$this->image_lib->clear();
				}
			}

			// INSERT EMPLOYEE
			$data = array(
				'ApplicantImage' => $pImage,
				'ApplicantID' => $ApplicantID,
				'EmployeeID' => $EmployeeID,
				'PositionDesired' => $PositionDesired,
				'PositionGroup' => $PositionGroup,
				'SalaryExpected' => $SalaryExpected,
				'LastName' => ucfirst($LastName),
				'FirstName' => ucfirst($FirstName),
				'MiddleName' => ucfirst($MiddleName),
				'Gender' => $Gender,
				'Age' => $Age,
				'Height' => $Height,
				'Weight' => $Weight,
				'Religion' => $Religion,
				'BirthDate' => $bDate,
				'BirthPlace' => $bPlace,
				'Citizenship' => $Citizenship,
				'CivilStatus' => $CivilStatus,
				'No_OfChildren' => $No_Children,

				'Address_Present' => $Address_Present,
				'Address_Provincial' => $Address_Provincial,
				'Address_Manila' => $Address_Manila,

				'Phone_No' => $PhoneNumber,
				'EmailAddress' => $EmailAddress,

				'SSS_No' => $SSS,
				'ResidenceCertificateNo' => $RCN,
				'TIN' => $TIN,
				'HDMF' => $HDMF,
				'ATM_No' => $ATM_No,
				'PhilHealth' => $PhilHealth,
				'HMO' => $HMO,

				'EmergencyPerson' => $EmergencyPerson,
				'EmergencyContact' => $EmergencyContact,
				'Referral' => $Referral,
				'NameExtension' => $NameExtension,
			);
			$addedEmployee = $this->Model_Updates->UpdateEmployee($ApplicantID, $data);
			if ($addedEmployee == TRUE) {

				$AcadHCheckbox = $this->input->post('AcadHCheckbox');
				$listCheck = "'" . implode("','", $AcadHCheckbox) . "'";
				$this->Model_Deletes->RemoveAcadHistory($listCheck);

				$EmpRecordCheckbox = $this->input->post('EmpRecordCheckbox');
				$listCheck = "'" . implode("','", $EmpRecordCheckbox) . "'";
				$this->Model_Deletes->RemoveEmpRecord($listCheck);

				$MachOpCheckbox = $this->input->post('MachOpCheckbox');
				$listCheck = "'" . implode("','", $MachOpCheckbox) . "'";
				$this->Model_Deletes->RemoveMachineOperated($listCheck);

				if (isset($_SESSION["acadcart"])) {
					foreach ($_SESSION["acadcart"] as $s_da) {
						$data = array(
							'ApplicantID' => $ApplicantID,
							'Level' => $s_da['acadcart']['SchoolLevel'],
							'SchoolName' => $s_da['acadcart']['SchoolName'],
							'SchoolAddress' => $s_da['acadcart']['SchoolAddress'],
							'DateStarted' => $s_da['acadcart']['FromYearSchool'],
							'DateEnds' => $s_da['acadcart']['ToYearSchool'],
							'HighDegree' => $s_da['acadcart']['H_Attained'],

						);
						$this->Model_Inserts->InsertAcadH($data);
					}
				}
				if (isset($_SESSION["emp_cart"])) {
					foreach ($_SESSION["emp_cart"] as $s_da) {
						$data = array(
							'ApplicantID' => $ApplicantID,
							'Name' => $s_da['emp_cart']['EmployeerName'],
							'Address' => $s_da['emp_cart']['emAddress'],
							'PeriodCovered' => $s_da['emp_cart']['PeriodCovered'],
							'Position' => $s_da['emp_cart']['Position'],
							'Salary' => $s_da['emp_cart']['Salary'],
							'CauseOfSeparation' => $s_da['emp_cart']['cos'],

						);
						$this->Model_Inserts->InsertEmploymentRecord($data);
					}
				}
				if (isset($_SESSION["mach_cart"])) {
					foreach ($_SESSION["mach_cart"] as $s_da) {
						$data = array(
							'ApplicantID' => $ApplicantID,
							'MachineName' => $s_da['mach_cart']['MachineName'],
						);
						$this->Model_Inserts->InsertMachineOperated($data);
					}
				}
					// if (isset($_SESSION["rela_cart"])) {
					// 	foreach ($_SESSION["rela_cart"] as $s_da) {
					// 		$data = array(
					// 			'ApplicantID' => $customid,
					// 			'Relation' => $s_da['rela_cart']['Relation'],
					// 			'Name' => $s_da['rela_cart']['rName'],
					// 			'Occupation' => $s_da['rela_cart']['rOccupation'],
					// 		);
					// 		$this->Model_Inserts->InsertRelativesdata($data);
					// 	}
					// }
					// if (isset($_SESSION["beneCart"])) {
					// 	foreach ($_SESSION["beneCart"] as $s_da) {
					// 		$data = array(
					// 			'ApplicantID' => $customid,
					// 			'Name' => $s_da['beneCart']['BeneName'],
					// 			'Relationship' => $s_da['beneCart']['BeneRelationship'],
					// 		);
					// 		$this->Model_Inserts->InserBeneficia($data);
					// 	}
					// }
				unset($_SESSION["acadcart"]);
				unset($_SESSION["emp_cart"]);
				unset($_SESSION["mach_cart"]);
					// unset($_SESSION["rela_cart"]); 
					// unset($_SESSION["beneCart"]);

					// LOGBOOK
				$changesCounter = 0;
				if ($EmployeeID != $prevEmployeeID) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Employee ID from <b>' . $prevEmployeeID . '</b> to <b>' . $EmployeeID . '</b>', +1);
					$changesCounter++;
				}
				if ($pImage != $prevpImage) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Changed profile picture', +1);
					$changesCounter++;
				}
				if ($PositionDesired != $prevPositionDesired) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Position desired changed from <b>' . $prevPositionDesired . '</b> to <b>' . $PositionDesired . '</b>', +1);
					$changesCounter++;
				}
				if ($PositionGroup != $prevPositionGroup) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Position group changed from <b>' . $prevPositionGroup . '</b> to <b>' . $PositionGroup . '</b>', +1);
					$changesCounter++;
				}
				if ($SalaryExpected != $prevSalaryExpected) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Expected salary changed from <b>₱' . $prevSalaryExpected . '</b> to <b>₱' . $SalaryExpected . '</b>', +1);
					$changesCounter++;
				}
				if ($LastName != $prevLastName) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Last Name changed from <b>' . $prevLastName . '</b> to <b>' . $LastName . '</b>', +1);
					$changesCounter++;
				}
				if ($FirstName != $prevFirstName) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'First Name changed from <b>' . $prevFirstName . '</b> to <b>' . $FirstName . '</b>', +1);
					$changesCounter++;
				}
				if ($MiddleName != $prevMiddleName) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Middle Initial changed from <b>' . $prevMiddleName . '</b> to <b>' . $MiddleName . '</b>', +1);
					$changesCounter++;
				}
				if ($Gender != $prevGender) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Sex changed from <b>' . $prevGender . '</b> to <b>' . $Gender . '</b>', +1);
					$changesCounter++;
				}
				if ($Height != $prevHeight) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Height changed from <b>' . $prevHeight . '</b> to <b>' . $Height . '</b>', +1);
					$changesCounter++;
				}
				if ($Weight != $prevWeight) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Weight changed from <b>' . $prevWeight . '</b> to <b>' . $Weight . '</b>', +1);
					$changesCounter++;
				}
				if ($Religion != $prevReligion) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Religion changed from <b>' . $prevReligion . '</b> to <b>' . $Religion . '</b>', +1);
					$changesCounter++;
				}
				$bDateReadable = (new DateTime(date($bDate)))->format('F d, Y');
				$prevbDateReadable = (new DateTime(date($prevbDate)))->format('F d, Y');
				if ($bDate != $prevbDate) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Birthday changed from <b>' . $prevbDateReadable . '</b> to <b>' . $bDateReadable . '</b>', +1);
					$changesCounter++;
				}
				if ($bPlace != $prevbPlace) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Birthplace changed from <b>' . $prevbPlace . '</b> to <b>' . $bPlace . '</b>', +1);
					$changesCounter++;
				}
				if ($Citizenship != $prevCitizenship) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Citizenship changed from <b>' . $prevCitizenship . '</b> to <b>' . $Citizenship . '</b>', +1);
					$changesCounter++;
				}
				if ($CivilStatus != $prevCivilStatus) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Civil Status changed from <b>' . $prevCivilStatus . '</b> to <b>' . $CivilStatus . '</b>', +1);
					$changesCounter++;
				}
				if ($No_Children != $prevNo_Children) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Number of children changed from <b>' . $prevNo_Children . '</b> to <b>' . $No_Children . '</b>', +1);
					$changesCounter++;
				}
				if ($PhoneNumber != $prevPhoneNumber) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Contact number changed from <b>' . $prevPhoneNumber . '</b> to <b>' . $PhoneNumber . '</b>', +1);
					$changesCounter++;
				}
				if ($EmailAddress != $prevEmailAddress) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Email address changed from <b>' . $prevEmailAddress . '</b> to <b>' . $EmailAddress . '</b>', +1);
					$changesCounter++;
				}
				if ($SSS != $prevSSS) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'SSS number changed from <b>' . $prevSSS . '</b> to <b>' . $SSS . '</b>', +1);
					$changesCounter++;
				}
					// $SSS_EffectiveReadable = (new DateTime(date($SSS_Effective)))->format('F d, Y');
					// $prevSSS_EffectiveReadable = (new DateTime(date($prevSSS_Effective)))->format('F d, Y');
					// if ($SSS_Effective != $prevSSS_Effective) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'SSS effective date of coverage changed from <b>' . $prevSSS_EffectiveReadable . '</b> to <b>' . $SSS_EffectiveReadable . '</b>', +1);
					// 	$changesCounter++;
					// }
				if ($RCN != $prevRCN) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'RCN number changed from <b>' . $prevRCN . '</b> to <b>' . $RCN . '</b>', +1);
					$changesCounter++;
				}
					// if ($RCN_at != $prevRCN_at) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'RCN location changed from <b>' . $prevRCN_at . '</b> to <b>' . $RCN_at . '</b>', +1);
					// 	$changesCounter++;
					// }
					// $RCN_OnReadable = (new DateTime(date($RCN_On)))->format('F d, Y');
					// $prevRCN_OnReadable = (new DateTime(date($prevRCN_On)))->format('F d, Y');
					// if ($RCN_On != $prevRCN_On) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'RCN date changed from <b>' . $prevRCN_OnReadable . '</b> to <b>' . $RCN_OnReadable . '</b>', +1);
					// 	$changesCounter++;
					// }
				if ($TIN != $prevTIN) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'TIN number changed from <b>' . $prevTIN . '</b> to <b>' . $TIN . '</b>', +1);
					$changesCounter++;
				}
					// if ($TIN_At != $prevTIN_At) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'TIN location changed from <b>' . $prevTIN_At . '</b> to <b>' . $TIN_At . '</b>', +1);
					// 	$changesCounter++;
					// }
					// $TIN_OnReadable = (new DateTime(date($TIN_On)))->format('F d, Y');
					// $prevTIN_OnReadable = (new DateTime(date($prevTIN_On)))->format('F d, Y');
					// if ($TIN_On != $prevTIN_On) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'TIN date changed from <b>' . $prevTIN_OnReadable . '</b> to <b>' . $TIN_OnReadable . '</b>', +1);
					// 	$changesCounter++;
					// }
				if ($HDMF != $prevHDMF) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'HDMF number changed from <b>' . $prevHDMF . '</b> to <b>' . $HDMF . '</b>', +1);
					$changesCounter++;
				}
					// if ($HDMF_At != $prevHDMF_At) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'HDMF location changed from <b>' . $prevHDMF_At . '</b> to <b>' . $HDMF_At . '</b>', +1);
					// 	$changesCounter++;
					// }
					// $HDMF_OnReadable = (new DateTime(date($HDMF_On)))->format('F d, Y');
					// $prevHDMF_OnReadable = (new DateTime(date($prevHDMF_On)))->format('F d, Y');
					// if ($HDMF_On != $prevHDMF_On) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'HDMF date changed from <b>' . $prevHDMF_OnReadable . '</b> to <b>' . $HDMF_OnReadable . '</b>', +1);
					// 	$changesCounter++;
					// }
				if ($PhilHealth != $prevPhilHealth) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'PhilHealth number changed from <b>' . $prevPhilHealth . '</b> to <b>' . $PhilHealth . '</b>', +1);
					$changesCounter++;
				}
					// if ($PhilHealth_At != $prevPhilHealth_At) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'PhilHealth location changed from <b>' . $prevPhilHealth_At . '</b> to <b>' . $PhilHealth_At . '</b>', +1);
					// 	$changesCounter++;
					// }
				if ($HMO != $prevHMO) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'HMO number changed from <b>' . $prevHMO . '</b> to <b>' . $HMO . '</b>', +1);
					$changesCounter++;
				}
					// $PhilHealth_OnReadable = (new DateTime(date($PhilHealth_On)))->format('F d, Y');
					// $prevPhilHealth_OnReadable = (new DateTime(date($prevPhilHealth_On)))->format('F d, Y');
					// if ($PhilHealth_On != $prevPhilHealth_On) {
					// 	$this->Model_Logbook->LogbookExtendedEntry(0, 'PhilHealth date changed from <b>' . $prevPhilHealth_OnReadable . '</b> to <b>' . $PhilHealth_OnReadable . '</b>', +1);
					// 	$changesCounter++;
					// }
				if ($ATM_No != $prevATM_No) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'ATM number changed from <b>' . $prevATM_No . '</b> to <b>' . $ATM_No . '</b>', +1);
					$changesCounter++;
				}
				if ($EmergencyPerson != $prevEmergencyPerson) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Person to notify in case of emergyency changed from <b>' . $prevEmergencyPerson . '</b> to <b>' . $EmergencyPerson . '</b>', +1);
					$changesCounter++;
				}
				if ($EmergencyContact != $EmergencyContact) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Emergency contact number changed from <b>' . $EmergencyContact . '</b> to <b>' . $EmergencyContact . '</b>', +1);
					$changesCounter++;
				}
				if ($Referral != $prevReferral) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Source of application (Referral) changed from <b>' . $prevReferral . '</b> to <b>' . $Referral . '</b>', +1);
					$changesCounter++;
				}
				if ($NameExtension != $prevNameExtension) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Name extension changed from <b>' . $prevNameExtension . '</b> to <b>' . $NameExtension . '</b>', +1);
					$changesCounter++;
				}
				if ($Address_Present != $prevAddress_Present) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Present address changed from <b>' . $prevAddress_Present . '</b> to <b>' . $Address_Present . '</b>', +1);
					$changesCounter++;
				}
				if ($Address_Provincial != $prevAddress_Provincial) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Provincial address changed from <b>' . $prevAddress_Provincial . '</b> to <b>' . $Address_Provincial . '</b>', +1);
					$changesCounter++;
				}
				if ($Address_Manila != $prevAddress_Manila) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Manila address changed from <b>' . $prevAddress_Manila . '</b> to <b>' . $Address_Manila . '</b>', +1);
					$changesCounter++;
				}
				if ($changesCounter > 0) {
					$this->Model_Logbook->LogbookEntry('Blue', 'Employee', ' updated details for <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
					$this->Model_Logbook->SetPrompts('success', 'success', 'Details updated');
				}
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	public function AddNote()
	{
		if (isset($_POST['Note'])) {
			$Note = $this->input->post('Note',TRUE);
			// LOGBOOK
			$this->Model_Logbook->LogbookEntry('Yellow', 'Note', ' attached a new note');
			$this->Model_Logbook->LogbookExtendedEntry(0, $Note);
			redirect(base_url() . 'Logbook');

		}
	}
	public function AddNoteDocuments()
	{
		if (isset($_POST['NoteDocuments'])) {
			$ApplicantID = $this->input->post('ApplicantID',TRUE);
			$Note = $this->input->post('NoteDocuments',TRUE);
			$this->Model_Inserts->InsertDocumentsNote($ApplicantID, $Note);
			// LOGBOOK
			$CheckEmployee = $this->Model_Selects->CheckEmployee($ApplicantID);
			if($CheckEmployee->num_rows() > 0) {
				foreach($CheckEmployee->result_array() as $row) {
					$LastName = $row['LastName'];
					$FirstName = $row['FirstName'];
					$MiddleName = $row['MiddleName'];
				}
			} else {
				$LastName = 'N/A';
				$FirstName = 'N/A';
				$MiddleName = 'N/A';
			}
			$this->Model_Logbook->LogbookEntry('Yellow', 'Note', ' attached a new note to <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
			$this->Model_Logbook->LogbookExtendedEntry(0, $Note);
			redirect(base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Documents');

		}
	}
	public function SetReminder()
	{
		if (isset($_POST['ApplicantID'])) {
			$ApplicantID = $this->input->post('ApplicantID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$R_Type = $this->input->post('R_Type',TRUE);
			$R_Days = $this->input->post('R_Days',TRUE);
			$R_Months = $this->input->post('R_Months',TRUE);
			$R_Years = $this->input->post('R_Years',TRUE);
			$ReminderDateString = "";
			if ($R_Years != 0) {
				if ($R_Years == 1) {
					$ReminderDateString = $R_Years . ' year';
				} else {
					$ReminderDateString = $R_Years . ' years';
				}
				if ($R_Months != 0 || $R_Days != 0) {
					$ReminderDateString = $ReminderDateString . ', ';
				}
			}
			if ($R_Months != 0) {
				if ($R_Months == 1) {
					$ReminderDateString = $ReminderDateString . $R_Months . ' month';
				} else {
					$ReminderDateString = $ReminderDateString . $R_Months . ' months';
				}
				if ($R_Days != 0) {
					$ReminderDateString = $ReminderDateString . ', ';
				}
			}
			if ($R_Days != 0) {
				if ($R_Days == 1) {
					$ReminderDateString = $ReminderDateString . $R_Days . ' day';
				} else {
					$ReminderDateString = $ReminderDateString . $R_Days . ' days';
				}
			}
			$ReminderDate = 0;

			if ($ApplicantID == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				if ($CheckApplicant->num_rows() > 0) {
					if ($R_Months == NULL) {
						$ReminderDate = $ReminderDate + 0;
					} else {
						$ReminderDate = $ReminderDate + ($R_Months * 2629743);
					}
					if ($R_Days == NULL) {
						$ReminderDate = $ReminderDate + 0;
					} else {
						$ReminderDate = $ReminderDate + ($R_Days * 86400);
					}
					if ($R_Years == NULL) {
						$ReminderDate = $ReminderDate + 0;
					} else {
						$ReminderDate = $ReminderDate + ($R_Years * 31556926);
					}

					$data = array(
						'ReminderType' => $R_Type,
						'ReminderDate' => $ReminderDate,
						'ReminderDateString' => $ReminderDateString,
						'ReminderLocked' => 'No',
					);
					$SetReminder = $this->Model_Inserts->InsertReminder($ApplicantID,$data);
					if ($SetReminder == TRUE) {
						$this->Model_Logbook->SetPrompts('success', 'success', 'Reminder added.');
						// LOGBOOK
						$duration = '';
						if($R_Years != 0) {
							$duration = $duration . $R_Years;
							if($R_Years == 1) {
								$duration = $duration . ' year, ';
							} else {
								$duration = $duration . ' years, ';
							}
						}
						if($R_Months != 0) {
							$duration = $duration . $R_Months;
							if($R_Months == 1) {
								$duration = $duration . ' month, ';
							} else {
								$duration = $duration . ' months, ';
							}
						}
						if($R_Days != 0) {
							$duration = $duration . $R_Days;
							if($R_Days == 1) {
								$duration = $duration . ' day, ';
							} else {
								$duration = $duration . ' days, ';
							}
						}
						$duration = substr($duration, 0, -2);
						foreach($CheckApplicant->result_array() as $row) {
							$LastName = $row['LastName'];
							$FirstName = $row['FirstName'];
							$MiddleName = $row['MiddleName'];
							$ReminderDateString = $row['ReminderDateString'];
						}
						if ($duration != $ReminderDateString) {
							$this->Model_Logbook->LogbookEntry('Yellow', 'Note', ' added a new contract reminder to <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Notifies when the date reaches ' . $duration . ' before contract expires');
						}
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function BlacklistEmployee()
	{
		$ApplicantID = $this->input->get('id');
		if (!isset($_GET['id'])) {
			redirect('Employees');
		}
		else
		{
			$Removethis = $this->Model_Updates->BlacklistEmployee($ApplicantID);
			if ($Removethis == TRUE) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Employee ID ' . $ApplicantID . ' has been blacklisted.</h5></div>');
				// LOGBOOK
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				foreach($CheckApplicant->result_array() as $row) {
					$LastName = $row['LastName'];
					$FirstName = $row['FirstName'];
					$MiddleName = $row['MiddleName'];
				}
				$this->Model_Logbook->SetPrompts('success', 'success', 'Successfully blacklisted ' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName));
				$this->Model_Logbook->LogbookEntry('Red', 'Employee', ' blacklisted <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
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
	}
	public function RestoreEmployee()
	{
		$ApplicantID = $this->input->get('id');
		if (!isset($_GET['id'])) {
			redirect('Employees');
		}
		else
		{
			$RestoreEmployee = $this->Model_Updates->RestoreEmployee($ApplicantID);
			if ($RestoreEmployee == TRUE) {
				// LOGBOOK
				$CheckApplicant = $this->Model_Selects->CheckApplicant($id);
				if ($CheckApplicant->num_rows() > 0) {
					foreach($CheckApplicant->result_array() as $row) {
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
					}
				} else {
					// default
					$FullName = '[No Name]';
				}
				$this->Model_Logbook->SetPrompts('success', 'success', 'Successfully restored ' . $FullName);
				$this->Model_Logbook->LogbookEntry('Green', 'Applicant', ' restored <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . $FullName . '</a>');
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Changed status to <b>Applicant</b>');
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
	}
	public function RestoreAdmin()
	{
		$AdminNo = $this->input->get('id');
		if (!isset($_GET['id'])) {
			redirect('Admins');
		}
		else
		{
			$RestoreAdmin = $this->Model_Updates->RestoreAdmin($AdminNo);
			if ($RestoreAdmin == TRUE) {
				// LOGBOOK
				$CheckAdminNo = $this->Model_Selects->CheckAdminNo($AdminNo);
				foreach($CheckAdminNo->result_array() as $row) {
					if ($row['AdminID']) {
						$AdminID = $row['AdminID'];
					} else {
						$AdminID = '[No Admin ID]';
					}
				}
				$this->Model_Logbook->SetPrompts('success', 'success', 'Successfully restored ' . $AdminID);
				$this->Model_Logbook->LogbookEntry('Green', 'Applicant', ' restored admin <a class="logbook-tooltip-highlight" href="' . base_url() . 'Logbook?admin=' . $AdminID . '" target="_blank">' . $AdminID . '</a>');
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Changed status from <b>Archived</b> to <b>Active</b>');
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
	public function RestoreClient()
	{
		$ClientID = $this->input->get('id');
		if (!isset($_GET['id'])) {
			redirect('Clients');
		}
		else
		{
			$RestoreClient = $this->Model_Updates->RestoreClient($ClientID);
			if ($RestoreClient == TRUE) {
				// LOGBOOK
				$GetClientID = $this->Model_Selects->GetClientID($ClientID);
				foreach($GetClientID->result_array() as $row) {
					if ($row['Name']) {
						$ClientName = $row['Name'];
					} else {
						$ClientName = '[No Client Name]';
					}
				}
				$this->Model_Logbook->SetPrompts('success', 'success', 'Successfully restored ' . $ClientID);
				$this->Model_Logbook->LogbookEntry('Green', 'Applicant', ' restored client <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $ClientID . '" target="_blank">' . $ClientName . '</a>');
				$this->Model_Logbook->LogbookExtendedEntry(0, 'Changed status from <b>Archived</b> to <b>Active</b>');
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
	public function SetWeeklyHours()
	{
		if (isset($_POST['ApplicantID'])) 
		{
			$ApplicantID = $this->input->post('ApplicantID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$ClientID = $this->input->post('ClientID',TRUE);
			$Mode = $this->input->post('ModeType', TRUE);
			$GetWeeklyDates = $this->Model_Selects->GetWeeklyDates();
			$ArrayInt = 0;
			$ArrayLength = $GetWeeklyDates->num_rows();
			$DeductionOption=$this->input->post('DeductionOption',TRUE); //0 no deduction, 1 with deduction, 2 deferred deductions 
			$cutoffMode=$this->input->post('CutoffMode',TRUE);
			$Hours = 0;
			$HoursTotal=0;
			$gross_pay=0;

			//record attendance for each workday
			$GetCurrentPrimaryWeek = $this->Model_Selects->GetCurrentPrimaryWeek($ClientID);
			if ($GetCurrentPrimaryWeek->num_rows() <= 0) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Primary week not found. Please set it first on Salary page.');
				redirect($_SERVER['HTTP_REFERER']);
			} elseif ($GetCurrentPrimaryWeek->num_rows() > 0) {
				foreach($GetCurrentPrimaryWeek->result_array() as $prow) {
					$CurrentPrimaryWeek = new DateTime($prow['WeekStart']);
					$DateToday = new DateTime();

					
					switch ($Mode) {

						case '0': ### WEEKLY

							$diff = $DateToday->diff($CurrentPrimaryWeek)->format("%a");
							if ($diff <= 7) {
								$Week = 1;
							} elseif ($diff <= 14 && $diff > 7) {
								$Week = 2;
							} elseif ($diff <= 21 && $diff > 14) {
								$Week = 3;
							} elseif ($diff <= 28 && $diff > 21) {
								$Week = 4;
							} else {
								$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P29D'));
								$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
								$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
								$Week = 1;
							}

							$Month = $CurrentPrimaryWeek->format('m');
						break;

						case '1': ### SEMI-MONTHLY

							if ($diff <= 15) {
								$Week = 1;
							} elseif ($diff > 15 || $diff <= 30) {
								$Week = 2;
							}
							else
							{
								$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P31D'));
								$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
								$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
								$Week = 1;
							}

							$Month = $CurrentPrimaryWeek->format('m');

						break;

						case '2': ### MONTHLY
							if ($diff < 31) {
								$Week = 1;
							} else {
								$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P31D'));
								$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
								$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
							}

							$Month = $CurrentPrimaryWeek->format('m');
						break;

						default:
							$diff = $DateToday->diff($CurrentPrimaryWeek)->format("%a");
							if ($diff <= 7) {
								$Week = 1;
							} elseif ($diff <= 14 && $diff > 7) {
								$Week = 2;
							} elseif ($diff <= 21 && $diff > 14) {
								$Week = 3;
							} elseif ($diff <= 28 && $diff > 21) {
								$Week = 4;
							} else {
								$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P29D'));
								$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
								$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
								$Week = 1;
							}

							$Month = $CurrentPrimaryWeek->format('m');
						break;
					}
					
					
					

					
					// $this->Model_Logbook->SetPrompts('info', 'info', $diff);
				}
			}
			foreach ($GetWeeklyDates->result_array() as $nrow):
				$ArrayInt++;
				$Type = $this->input->post('Type_' . $nrow['Time'],TRUE);
				$Hours = $this->input->post('Hours_' . $nrow['Time'],TRUE);
				if ($Hours != NULL) {
					$Hours = $this->input->post('Hours_' . $nrow['Time'],TRUE);
				} else {
					$Hours = 0;
				}
				$HoursTotal+=$Hours;
				$Overtime = $this->input->post('OTHours_' . $nrow['Time'],TRUE);
				$NightHours = $this->input->post('NightHours_' . $nrow['Time'],TRUE);
				$NightOvertime = $this->input->post('NightOTHours_' . $nrow['Time'],TRUE);
				$Remarks = $this->input->post('Remarks_' . $nrow['Time'],TRUE);
				// TYPE
				$RegCheck = $this->input->post('REGCheck_' . $nrow['Time'],TRUE);
				$RestCheck = $this->input->post('RESTCheck_' . $nrow['Time'],TRUE);
				$SpecialCheck = $this->input->post('SPCheck_' . $nrow['Time'],TRUE);
				$NationalCheck = $this->input->post('NHCheck_' . $nrow['Time'],TRUE);
				$RegularGrossPay = $this->input->post('RegularGrossPay_' . $nrow['Time'],TRUE);
				$OvertimeGrossPay = $this->input->post('OvertimeGrossPay_' . $nrow['Time'],TRUE);
				$NPGrossPay = $this->input->post('NPGrossPay_' . $nrow['Time'],TRUE);
				$NPOvertimeGrossPay = $this->input->post('NPOvertimeGrossPay_' . $nrow['Time'],TRUE);
				// BENEFITS
				$HDMF = $this->input->post('HDMF_' . $nrow['Time'],TRUE);
				$Philhealth = $this->input->post('Philhealth_' . $nrow['Time'],TRUE);
				$SSS = $this->input->post('SSS_' . $nrow['Time'],TRUE);
				$Tax = $this->input->post('Tax_' . $nrow['Time'],TRUE);

				$Date = $this->input->post($nrow['Time'],TRUE);

				$total_hoursperday = $this->input->post('total_hoursperday_' . $nrow['Time'],TRUE);
				$dayRate = $this->input->post('dayRate_' . $nrow['Time'],TRUE);
				$TdRate = $this->input->post('TdRate_' . $nrow['Time'],TRUE);

				if($Hours == NULL) {
					$Hours = 0;
				}
				if($Overtime == NULL) {
					$Overtime = 0;
				}
				if($NightHours == NULL) {
					$NightHours = 0;
				}
				if($NightOvertime == NULL) {
					$NightOvertime = 0;
				}

				if ($ApplicantID == NULL) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
					$GrossPay = $total_hoursperday * $dayRate;

					$data = array(
						'ApplicantID' => $ApplicantID,
						'ClientID' => $ClientID,
						'Time' => $Date,
						'Week' => $Week,
						'Month' => $Month,
						't_year' => $CurrentPrimaryWeek->format('Y'),
						'Hours' => $Hours,
						'Overtime' => $Overtime,
						'NightHours' => $NightHours,
						'NightOvertime' => $NightOvertime,
						'Remarks' => $Remarks,

						'Type' => $Type,
						'HDMF' => $HDMF,
						'Philhealth' => $Philhealth,
						'SSS' => $SSS,
						'Tax' => $Tax,

						'GrossPay' => $RegularGrossPay,
						'OvertimeGrossPay' => $OvertimeGrossPay,
						'NPGrossPay' => $NPGrossPay,
						'NPOvertimeGrossPay' => $NPOvertimeGrossPay,

					);
					if ($RestCheck) {
						$data['RestDay'] = 1;
					}
					if ($SpecialCheck) {
						$data['SpecialHoliday'] = 1;
					}
					if ($NationalCheck) {
						$data['NationalHoliday'] = 1;
					}
					$UpdateWeeklyHours = $this->Model_Updates->UpdateWeeklyHours($data, $Mode);
					if ($UpdateWeeklyHours == TRUE) {
						// $DateReadable = (new DateTime(date($Date)))->format('F d, Y');
						// $this->Model_Logbook->LogbookExtendedEntry(0, 'Remarks: ' . $Remarks . '<br><b>' . $DateReadable . '</b>\' total hours: ' . $total_hoursperday, +1);
						if ($ArrayInt >= $ArrayLength) {
							// $this->Model_Logbook->SetPrompts('success', 'success', 'Updated successfully');
							// $this->Model_Logbook->SetPrompts('info', 'info', 'mode: ' . $Mode);
							// LOGBOOK
							$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
							foreach($CheckApplicant->result_array() as $row) {
								$LastName = $row['LastName'];
								$FirstName = $row['FirstName'];
								$MiddleName = $row['MiddleName'];
							}
							$this->Model_Logbook->LogbookEntry('Blue', 'Salary', ' updated the hours of <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
						}
					}
					else
					{
						// $this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
						
					}
				}
			endforeach;

			//cutoffMode
			//get employee hours
			$EmployeeHoursList = $this->Model_Selects->GetEmployeeHours($ApplicantID);

			if ($EmployeeHoursList->num_rows() > 0) {
				$sss_contri = 0;
				$hdmf_contri = 0;
				$hdmf_rate=0.0;
				$philhealth_contri = 0;
				$philhealth_percentage = 0;
				$tax = 0;
				$totalDeduction=0;
				$net_pay=0;
				$cutoffTaxDivider=0;

				$employees = $this->Model_Selects-> CheckEmployee($ApplicantID);
				$employee=$employees->result_array()[0];
				$employeeSalary = $employee["SalaryExpected"];

				
				if(cutoffMode==0)//weekly
				{
					$gross_pay = $this->Model_Selects->GetempGP($ApplicantID);
				}
				else if(cutoffMode==1)//semi monthly
				{
					$semiMonthlyTotalSalary=$employeeSalary/2;		   //total salary per half of month
					$semiMonthlyHourRate= $semiMonthlyTotalSalary/96;  //including saturdays. otherwise it would just be 80
					$semiMonthlyDeductedHours=96-$HoursTotal;		   //difference of supposed total hours of half a month (96) and total hours worked
					$semiMonthlyDeductedHoursTotalRate=$semiMonthlyDeductedHours * $semiMonthlyHourRate; //rate to be deducted from total amount

					if($semiMonthlyDeductedHoursTotalRate<=0) //no absences or cases where it has 31st day in month
					{
						$gross_pay=$semiMonthlyTotalSalary;

					}
					else //normal. subtract absents and leaves
					{
						$gross_pay=$semiMonthlyTotalSalary-$semiMonthlyDeductedHoursTotalRate;

					}
				}
				else if(cutoffMode==2)
				{
					$monthlyHourRate= $employeeSalary/192;
					$monthlyDeductedHours = 192-$HoursTotal;
					$monthlyDeductedHoursTotalRate = $monthlyDeductedHours * $monthlyHourRate;

					if($monthlyDeductedHoursTotalRate<=0) //no absences or cases where it has 31st day in month
					{
						$gross_pay=$employeeSalary;

					}
					else //normal. subtract absents and leaves
					{
						$gross_pay=$employeeSalary-$monthlyDeductedHoursTotalRate;

					}
				}

				$GetTotalH = $this->Model_Selects->GetTotalH($ApplicantID);
				$GetTotalOt = $this->Model_Selects->GetTotalOt($ApplicantID);

				


				$sssTable = $this->Model_Selects->GetAllSSSTable();
				$hdmfTable = $this->Model_Selects->GetAllHDMFTable();
				$philhealthTable = $this->Model_Selects->GetAllPhilHealthTable();
				//$philhealthTable = $this->Model_Selects->GetAllTaxTable();


				

				

			if($DeductionOption==1 || $DeductionOption==2)//if with deductions or deferred 
			{

				foreach ($sssTable->result_array() as $row) {
					if ($employeeSalary >= $row['f_range'] && $employeeSalary <= $row['t_range']) {
						$sss_contri = $row['contribution_ee'];
					}
				}

				foreach ($hdmfTable->result_array() as $row) {
					if ($employeeSalary >= $row['f_range'] && $employeeSalary <= $row['t_range']) {
						$hdmf_rate= $row['contribution_ee'];
					}
				}
				

				$philhealthArray=$philhealthTable->result_array();

				if ($employeeSalary >= $philhealthArray[0]['f_range'] && $employeeSalary <= $philhealthArray[0]['t_range'])
				{
					$philhealth_percentage=300;
				}
				else if($employeeSalary >= $philhealthArray[1]['f_range'] && $employeeSalary <= $philhealthArray[1]['t_range'])
				{
					$philhealth_percentage=($employeeSalary * 0.03);

				}
				else
				{
					$philhealth_percentage=1800;
				}


				
				if($cutoffMode==0)//weekly
				{
					$cutoffTaxDivider=4;
				}
				else if($cutoffMode==1)//semi monthly
				{
					$cutoffTaxDivider=2;
				}
				else if($cutoffMode==2) //monthly
				{
					$cutoffTaxDivider=1;
				}

				$sss_contri = $sss_contri/$cutoffTaxDivider;
				$hdmf_contri =($employeeSalary*$hdmf_rate)/$cutoffTaxDivider;
				$philhealth_contri=$philhealth_percentage/$cutoffTaxDivider;
				


				


				//tax
				$year=date("Y");
				$annualSalary=$employeeSalary*12;
				if($year<=2022)
				{
					if($annualSalary<=250000) //Not over P250,000 -- 0%
					{
						$tax=0; 
					}
					else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 20% of the excess over P250,000
					{
						$tax=((($annualSalary-250000)*0.2)/12)/$cutoffTaxDivider;
					} 
					else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P30,000 + 25% of the excess over P400,000
					{
						$tax=((30000+(($annualSalary-400000)*0.25))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}
					else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P130,000 + 30% of the excess over P800,000
					{
						$tax=((130000+(($annualSalary-800000)*0.3))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}
					else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P490,000 + 32% of the excess over P2,000,000
					{
						$tax=((490000+(($annualSalary-2000000)*0.32))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}
					else 															//Over P8,000,000 -- P2,410,000 + 35% of the excess over P8,000,000
					{
						$tax=((2410000+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}

				}
				else
				{
					if($annualSalary<=250000) //Not over P250,000 -- 0%
					{
						$tax=0; 
					}
					else if($annualSalary>=250000.01 && $annualSalary <= 400000) 	//Over P250,000 but not over P400,000 -- 15% of the excess over P250,000
					{
						$tax=((($annualSalary-250000)*0.15)/12)/$cutoffTaxDivider;
					} 
					else if($annualSalary>=400000.01 && $annualSalary <= 800000) 	//Over P400,000 but not over P800,000 -- P22,500 + 20% of the excess over P400,000
					{
						$tax=((22500+(($annualSalary-400000)*0.20))/12)/$cutoffTaxDivider; 		 	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}
					else if($annualSalary>=800000.01 && $annualSalary <= 2000000) 	//Over P800,000 but not over P2,000,000 -- P102,500 + 25% of the excess over P800,000
					{
						$tax=((102500+(($annualSalary-800000)*0.25))/12)/$cutoffTaxDivider; 		  	//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}
					else if($annualSalary>=2000000.01 && $annualSalary <= 8000000) 	//Over P2,000,000 but not over P8,000,000 -- P402,500 + 30% of the excess over P2,000,000
					{
						$tax=((402500+(($annualSalary-2000000)*0.30))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, tthen divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}
					else 															//Over P8,000,000 -- P2,202,500 + 35% of the excess over P8,000,000
					{
						$tax=((202500+(($annualSalary-8000000)*0.35))/12)/$cutoffTaxDivider; 		//divided into 12 for monthly, then divided by 4 for weekly, 2 for semi monthly, 1 for monthly
					}
				}

				$totalDeduction=$sss_contri + $hdmf_contri + $philhealth_contri + $tax;
				if($DeductionOption==1)
				{
					$net_pay = $gross_pay - $totalDeduction;
				}
				else if ($DeductionOption==2)
				{

					$deferedid= "DEF_". com_create_guid();
					$this->Model_Inserts->AddEmployeeDeferredDeductions($deferedid,$ApplicantID,$totalDeduction,date());
				}

				

			}
			else
			{
				$net_pay = $gross_pay;
			}


			$data = array(
				'ClientID' => $ClientID,
				'ApplicantID' => $ApplicantID,
				'gross_pay' => round($gross_pay,2),
				'sss_contri' => $sss_contri,
				'TotalHours' => $GetTotalH,
				'TotaOT' => $GetTotalOt,
				'net_pay' => $net_pay,
			);
			$this->Model_Inserts->InsertTrackingTable($data);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	else
	{
		$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
		redirect($_SERVER['HTTP_REFERER']);
	}
}



	public function ViewClientEmployees() // Date Range
	{
		$ClientID = $this->input->post('ViewClientID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
		$Mode = $this->input->post('Mode',TRUE);
		$FromDate = $this->input->post('FromDate',TRUE);
		$ToDate = $this->input->post('ToDate',TRUE);
		$this->session->set_userdata('FirstDate', $FromDate);
		$this->session->set_userdata('LastDate', $ToDate);

		if ($Mode == NULL || $FromDate == NULL || $ToDate == NULL) {
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error missing fields. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}

		if ($ClientID == NULL) {
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$date1 = new DateTime($FromDate);
			$date2 = new DateTime($ToDate);

			$diff = $date2->diff($date1)->format("%a");

			if($Mode==0)
			{
				if ($diff > 6) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Date range for weekly must be lower than 1 week.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			else if($Mode ==1)
			{
				if ($diff > 15) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Date range for semi-monthly must be lower than 16 days.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			else
			{//needs cleaning up. needs differentiating between months number of days
				if ($diff > 31) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Date range for monthly must be lower than 31 days.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			
			//velseif ($diff > 180 && $diff < 730) {
			// 	$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #FFA500;"><h5><i class="fas fa-exclamation-triangle"></i> Note: You are viewing at a huge date range, performance may get slower than usual</h5></div>');
			// }
			// TODO: Clean & optimize this. May cause lag on huge database.
			$this->Model_Updates->UpdateWeeklyHoursCurrent();
			$this->Model_Deletes->CleanWeeklyDates();
			$HoursHolidays = array('01-01', '04-09', '04-10', '05-01', '06-12', '08-31', '11-30', '12-25', '12-30'); // MONTH - DAY
			$SpecialHolidays = array('01-25', '02-25', '04-11', '08-21', '11-01', '11-02', '12-08', '12-24', '12-31'); // MONTH - DAY

			for ($i = 0; $i <= $diff; $i++) {
				$Date = date('Y-m-d', strtotime('+' . $i . ' day', strtotime($FromDate)));
				$DateChecker = new DateTime($Date);
				if (in_array($DateChecker->format('m-d'), $HoursHolidays)) {
					$Type = 'Holiday';
				} elseif (in_array($DateChecker->format('m-d'), $SpecialHolidays)) {
					$Type = 'Special';
				} else {
					$Type = 'Normal';
				}
				$data = array(
					'Time' => $Date,
					'Current' => 'Current',
				);
				$ClientViewTime = $this->Model_Inserts->InsertDummyHours($data);
				if ($ClientViewTime && $i == $diff) {
					redirect('ViewClient?id=' . $ClientID . "&mode=" . $Mode );
				}
			}
		}
	}
	public function ImportExcel()
	{
		// $ClientID = $this->input->post('ExcelClientID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
		$File = $_FILES['file'];
		date_default_timezone_set('Asia/Manila');
		$this->load->library('SimpleXLSX');	
		if ( $xlsx = SimpleXLSX::parse( $File['tmp_name'] ) ) {

			$this->load->view('_template/users/u_redirecting');
			$dim = $xlsx->dimension();
			$cols = $dim[0];
			$RowCount = 0;
			$ColCount = 0;
				$DatesTotal = 0; // Count how many days there are
				$ApplicantsArray = array();

				foreach ( $xlsx->rows() as $k => $r ):
					// if ($k == 0) continue; // skip first row
					// echo '<tr class="clickable-row" data-toggle="modal" data-target="#HoursWeeklyModal">';
					for ( $i = 0; $i < $cols; $i ++ ) {
						if ($RowCount == 0){
							if ($ColCount == 3) { // Client Name
								$ClientName = ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' );
								$GetClientIDFromName = $this->Model_Selects->GetClientIDFromName($ClientName);
								if ($GetClientIDFromName->num_rows() > 0) {
									foreach($GetClientIDFromName->result_array() as $row) {
										$ClientID = $row['ClientID'];
									}
								} else {
									$ClientID = 0; // default
									$this->Model_Logbook->SetPrompts('info', 'info', 'No client with that name was found.');
								}
							}
							if ($ColCount == 5) { // Salary Mode
								$SalaryMode = ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' );
								switch ($SalaryMode) {
									case 'Weekly':
									$SalaryMode = 0;
									break;
									case 'Semi-Monthly':
									$SalaryMode = 1;
									break;
									case 'Monthly':
									$SalaryMode = 2;
									break;
									default:
										$SalaryMode = 0; // default
										$this->Model_Logbook->SetPrompts('info', 'info', 'Invalid salary mode. Defaulting to weekly.');
										break;
									}
								}

						}
						if ($RowCount == 1){
							if ($ColCount == 3) {
								$StartingDate = ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' );

								$this->Model_Updates->UpdateWeeklyHoursCurrent();
								$this->Model_Deletes->CleanWeeklyDates();
								$HoursHolidays = array('01-01', '04-09', '04-10', '05-01', '06-12', '08-31', '11-30', '12-25', '12-30'); // MONTH - DAY
								$SpecialHolidays = array('01-25', '02-25', '04-11', '08-21', '11-01', '11-02', '12-08', '12-24', '12-31'); // MONTH - DAY

								for ($i = 0; $i <= $cols - 5; $i++) {
									$DatesTotal++;
									$Date = date('Y-m-d', strtotime('+' . $i . ' day', strtotime($StartingDate)));
									if ($i == 0) {
										$FirstDate = $Date;
									} elseif ($i == ($cols - 5)) {
										$LastDate = $Date;
									}
									$DateChecker = new DateTime($Date);
									if (in_array($DateChecker->format('m-d'), $HoursHolidays)) {
										$Type = 'Holiday';
									} elseif (in_array($DateChecker->format('m-d'), $SpecialHolidays)) {
										$Type = 'Special';
									} else {
										$Type = 'Normal';
									}
									$data = array(
										'Time' => $Date,
										'Current' => 'Current',
									);
									// if (isset($Holiday)) {
									// 	$data['Holiday'] = '1';
									// } else {
									// 	$data['Holiday'] = NULL;
									// }
									// if (isset($Special)) {
									// 	$data['Special'] = '1';
									// } else {
									// 	$data['Special'] = NULL;
									// }
									$ClientViewTime = $this->Model_Inserts->InsertDummyHours($data);
								}

							}

						}
						if ($RowCount >= 2) {
							if ($ColCount == 0) {
								$ApplicantID = ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' );
								array_push($ApplicantsArray, $ApplicantID);
							}
							if ($ColCount == 1) {
								$Name = ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' );
							}
							if ($ColCount == 2) {
								$Salary = ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' );
							}
							if ($ColCount >= 3 && $ColCount < $cols - 1) {
								$GetCurrentPrimaryWeek = $this->Model_Selects->GetCurrentPrimaryWeek($ClientID);
								if ($GetCurrentPrimaryWeek->num_rows() <= 0) {
									$this->Model_Logbook->SetPrompts('error', 'error', 'Primary week not found. Please set it first on Salary page.');
									redirect($_SERVER['HTTP_REFERER']);
								} elseif ($GetCurrentPrimaryWeek->num_rows() > 0) {
									foreach($GetCurrentPrimaryWeek->result_array() as $prow) {
										$CurrentPrimaryWeek = new DateTime($prow['WeekStart']);
										$DateToday = new DateTime();

										
										switch ($SalaryMode) {

											case '0': ### WEEKLY

												$diff = $DateToday->diff($CurrentPrimaryWeek)->format("%a");
												if ($diff <= 7) {
													$Week = 1;
												} elseif ($diff <= 14 && $diff > 7) {
													$Week = 2;
												} elseif ($diff <= 21 && $diff > 14) {
													$Week = 3;
												} elseif ($diff <= 28 && $diff > 21) {
													$Week = 4;
												} else {
													$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P29D'));
													$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
													$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
													$Week = 1;
												}

												$Month = $CurrentPrimaryWeek->format('m');
											break;

											case '1': ### SEMI-MONTHLY

												if ($diff <= 15) {
													$Week = 1;
												} elseif ($diff > 15 || $diff <= 30) {
													$Week = 2;
												}
												else
												{
													$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P31D'));
													$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
													$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
													$Week = 1;
												}

												$Month = $CurrentPrimaryWeek->format('m');

											break;

											case '2': ### MONTHLY
												if ($diff < 31) {
													$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P31D'));
													$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
													$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
													$Week = 1;
												}

												$Month = $CurrentPrimaryWeek->format('m') - 1;
											break;

											default:
												$diff = $DateToday->diff($CurrentPrimaryWeek)->format("%a");
												if ($diff <= 7) {
													$Week = 1;
												} elseif ($diff <= 14 && $diff > 7) {
													$Week = 2;
												} elseif ($diff <= 21 && $diff > 14) {
													$Week = 3;
												} elseif ($diff <= 28 && $diff > 21) {
													$Week = 4;
												} else {
													$PrimaryWeek = $CurrentPrimaryWeek->add(new DateInterval('P29D'));
													$PrimaryWeek = $PrimaryWeek->format('Y-m-d');
													$this->Model_Updates->SetPrimaryWeek($PrimaryWeek, $ClientID);
													$Week = 1;
												}

												$Month = $CurrentPrimaryWeek->format('m');
											break;
										}
										
										
										

										
										// $this->Model_Logbook->SetPrompts('info', 'info', $diff);
									}
								}
								$GetWeeklyDates = $this->Model_Selects->GetWeeklyDates();
								// foreach ($GetWeeklyDates->result_array($ColCount - 3) as $nrow):
								// 	echo $nrow['Time'];
								// endforeach;

								$Split = explode('/', ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ));
								if ($Split[0] == 'N') {
									$Type = 'Normal';
								} elseif ($Split[0] == 'R') {
									$Type = 'Rest Day';
								} elseif ($Split[0] == 'H') {
									$Type = 'Holiday';
								} elseif ($Split[0] == 'S') {
									$Type = 'Special';
								} else {
									$Type = 'Unknown';
								}

								if ( $Split[0] > 8) {
									$otValue = $Split[0] - 8;
								}
								else
								{
									$otValue = 0;
								}
								if ( $Split[0] > 8) {
									$rHours = 8;
								}
								else
								{
									$rHours = $Split[0];
								}
								$data = array(
									'ApplicantID' => $ApplicantID,
									'ClientID' => $ClientID,
									'Time' => $GetWeeklyDates->result_array()[$ColCount - 3]['Time'],
									'Type' => $Type,
									'Week' => $Week,
									'Month' => $Month,
									't_year' => $CurrentPrimaryWeek->format('Y'),

									// ADD VARIBLES
									// ERROR 01
									'NightHours' => null,
									'NightOvertime' => null,
									'Remarks' => null,
									'GrossPay' => null,

									'Hours' => $rHours,
									'Overtime' => $otValue,
									'HDMF' => null,
									'Philhealth' => null,
									'SSS' => null,
									'Tax' => null
								);
								$UpdateWeeklyHours = $this->Model_Updates->UpdateWeeklyHours($data, $SalaryMode);
								// echo '------------- <br>';
								// echo 'Applicant ID: ' . $ApplicantID . '<br>';
								// echo 'Name: ' . $Name . '<br>';
								// echo 'Salary: ' . $Salary . '<br>';
								// echo 'Date: ' . $GetWeeklyDates->result_array()[$ColCount - 3]['Time'] . '<br>';
								// echo 'Hours: ' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '<br>';
								// echo '------------- <br>';
							}
						}
						// echo '<td><i class="Hours_' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '"></i>' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
						$ColCount++;
					}
					// echo '</tr>';
					$RowCount++;
					$ColCount = 0;
				endforeach;
				if ($RowCount <= $xlsx->rows()) {
					$ApplicantsArray = serialize($ApplicantsArray);
					$this->session->set_userdata('ApplicantsArray', $ApplicantsArray);
					$this->session->set_userdata('FirstDate', $FirstDate);
					$this->session->set_userdata('LastDate', $LastDate);
					$this->session->set_userdata('DatesTotal', $DatesTotal);
					$this->session->set_userdata('SalaryMode', $SalaryMode);
					// $CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
					// foreach($CheckApplicant->result_array() as $row) {
					// 	$LastName = $row['LastName'];
					// 	$FirstName = $row['FirstName'];
					// 	$MiddleName = $row['MiddleName'];
					// }
					// $this->Model_Logbook->LogbookEntry('Blue', 'Salary', ' updated the hours of <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
					// $this->Model_Logbook->LogbookExtendedEntry(0, 'Changed status from <b>Blacklisted</b> to <b>Applicant</b>');
					redirect('ExcelImportSuccessful');
				}
				
				// echo '</table>';
			} else {
				$Error = SimpleXLSX::parseError();
				$this->Model_Logbook->SetPrompts('error', 'error', $Error);
				redirect($_SERVER['HTTP_REFERER']);
			}

			// $date1 = new DateTime($FromDate);
			// $date2 = new DateTime($ToDate);

			// $diff = $date2->diff($date1)->format("%a");
			// if ($diff > 730) {
			// 	$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Error: Date Range for weekly must be lower than 2 years</h5></div>');
			// 	redirect($_SERVER['HTTP_REFERER']);
			// } elseif ($diff > 180 && $diff < 730) {
			// 	$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #FFA500;"><h5><i class="fas fa-exclamation-triangle"></i> Note: You are viewing at a huge date range, performance may get slower than usual</h5></div>');
			// }
			// // TODO: Clean & optimize this. May cause lag on huge database.
			// $this->Model_Updates->UpdateWeeklyHoursCurrent();
			// $this->Model_Deletes->CleanWeeklyDates();
			// for ($i = 0; $i <= $diff; $i++) {
			// 	if ($Day < 10 && $i != 0) {
			// 		$Date = $Year . '-' . $Month . '-' . '0' . $Day;
			// 	} else {
			// 		$Date = $Year . '-' . $Month . '-' . $Day;
			// 	}
			// 	$data = array(
			// 		'Time' => $Date,
			// 		'Current' => 'Current',
			// 	);
			// 	$ClientViewTime = $this->Model_Inserts->InsertClientViewTime($data);
			// 	$Day++;
			// 	if ($ClientViewTime && $i == $diff) {
			// 		redirect('ViewClient?id=' . $ClientID);
			// 	}
			// }
		}
		public function UpdateSSSField()
		{
			if (isset($_POST['id'])) {
			$id = $this->input->post('id',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$f_range = $this->input->post('f_range',TRUE);
			$t_range = $this->input->post('t_range',TRUE);
			$contributionER = $this->input->post('contribution_er',TRUE);
			$contributionEE = $this->input->post('contribution_ee',TRUE);
			$contributionEC = $this->input->post('contribution_ec',TRUE);
			if ($f_range == NULL || $t_range == NULL || $contributionER == NULL || $contributionEE == NULL || $contributionEC == NULL ) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Missing fields. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$total = $contributionER + $contributionEE;
				$totalEC = $total + $contributionEC;
				$data = array(
					'f_range' => $f_range,
					't_range' => $t_range,
					'contribution_er' => $contributionER,
					'contribution_ee' => $contributionEE,
					'contribution_ec' => $contributionEC,
					'total' => $total,
					'total_with_ec' => $totalEC,
				);
				$UpdateSSSField = $this->Model_Updates->UpdateSSSField($id, $data);
				if ($UpdateSSSField == TRUE) {
					$this->Model_Logbook->SetPrompts('success', 'success', 'Updated successfully.');
					$this->Model_Logbook->LogbookEntry('Blue', 'Salary', ' updated the SSS table');
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>From:</b> ' . $f_range);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>To:</b> ' . $t_range);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Contribution (ER):</b> ' . $contributionER);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Contribution (EE):</b> ' . $contributionEE);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Contribution (EC):</b> ' . $contributionEC);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Total:</b> ' . $total);
					$this->Model_Logbook->LogbookExtendedEntry(0, '<b>Total with EC:</b> ' . $totalEC);
					redirect('SSS_Table');
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function SetPrimaryWeek()
	{
		$Week = $this->input->post('Week',TRUE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
		$ClientID = $this->input->post('PrimaryClientID', TRUE);
		if ($Week == NULL) {
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$SetPrimaryWeek = $this->Model_Updates->SetPrimaryWeek($Week, $ClientID);
			if ($SetPrimaryWeek == TRUE) {
				$this->Model_Logbook->SetPrompts('success', 'success', 'New primary week set.');
				$this->Model_Logbook->LogbookEntry('Blue', 'Salary', ' updated the primary week');
				redirect('Payroll');
			}
			else
			{
				$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	public function AJAX_updateSSSToBePaid()
	{
		$Input = $this->input->post('Input');
		$ApplicantID = $this->input->post('ApplicantID');
		$ClientID = $this->input->post('ClientID');
		$Year = $this->input->post('Year');
		$Month = $this->input->post('Month');
		$Week = $this->input->post('Week');
		$Mode = $this->input->post('Mode');
		$now = new DateTime();
		$DateUpdated = $now->format('Y-m-d H:i:s A');

		$data = array(
			'Input' => $Input,
			'ApplicantID' => $ApplicantID,
			'ClientID' => $ClientID,
			'Month' => $Month,
			'Year' => $Year,
			'Week' => $Week,
			'Mode' => $Mode,
			'DateUpdated' => $DateUpdated,
		);
		$UpdateSSSToBePaid = $this->Model_Updates->UpdateSSSToBePaid($data);
		$data = array(
			'Amount' => $Input,
			'ApplicantID' => $ApplicantID,
			'ClientID' => $ClientID,
			'Month' => $Month,
			'Year' => $Year,
			'Week' => $Week,
			'Mode' => $Mode,
		);
		$InsertSSSWeekPaid = $this->Model_Inserts->InsertSSSWeekPaid($data);
	}
	public function ModifyContract()
	{
		if (isset($_POST['M_ApplicantID'])) {
			$ApplicantID = $this->input->post('M_ApplicantID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$ClientID = $this->input->post('M_ClientID',TRUE);
			$DateStarted = $this->input->post('M_DateStarted',TRUE);
			$DateEnds = $this->input->post('M_DateEnds',TRUE);
			$DateStartedHour = $this->input->post('M_DateStartedHour',TRUE);
			$DateStartedMinute = $this->input->post('M_DateStartedMinute',TRUE);
			$DateStartedSecond = $this->input->post('M_DateStartedSecond',TRUE);
			$DateEndsHour = $this->input->post('M_DateEndsHour',TRUE);
			$DateEndsMinute = $this->input->post('M_DateEndsMinute',TRUE);
			$DateEndsSecond = $this->input->post('M_DateEndsSecond',TRUE);
			$EmployeeID = $this->input->post('M_EmployeeID',TRUE);
			$Salary = $this->input->post('M_Salary',TRUE);
			$DateStartedHourType = $this->input->post('M_DateStartedHourType',TRUE);
			$DateEndsHourType = $this->input->post('M_DateEndsHourType',TRUE);
			// Previous data for logbook
			$GetEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($ApplicantID);
			if ($GetEmployeeDetails->num_rows() > 0) {
				foreach($GetEmployeeDetails->result_array() as $row) {
					$prevClientID = $row['ClientEmployed'];
					$prevDateStarted = $row['DateStarted'];
					$prevDateEnds = $row['DateEnds'];
					$prevEmployeeID = $row['EmployeeID'];
					$prevSalary = $row['SalaryExpected'];
				}
			} else {
				$prevClientID = 'N/A';
				$prevDateStarted = 'N/A';
				$prevDateEnds = 'N/A';
				$prevEmployeeID = 'N/A';
				$prevSalary = 'N/A';
			}
			
			// Concatenating date and hours
			if($DateStartedHour == NULL) {
				$DateStartedHour = 0;
			}
			if($DateStartedMinute == NULL) {
				$DateStartedMinute = 0;
			}
			if($DateStartedSecond == NULL) {
				$DateStartedSecond = 0;
			}
			if($DateEndsHour == NULL) {
				$DateEndsHour = 0;
			}
			if($DateEndsMinute == NULL) {
				$DateEndsMinute = 0;
			}
			if($DateEndsSecond == NULL) {
				$DateEndsSecond = 0;
			}

			if ($DateStartedHour > 12) {
				$DateStartedHour = 12;
			}
			if ($DateStartedMinute > 60) {
				$DateStartedMinute = 0;
			}
			if ($DateStartedSecond > 60) {
				$DateStartedSecond = 0;
			}

			if($DateStartedHour < 10 && $DateStartedHour != 0 && strlen($DateStartedHour) < 2) {
				$DateStartedHour = '0' . $DateStartedHour;
			} elseif ($DateStartedHour == 0) {
				$DateStartedHour = '00';
			}
			if($DateStartedMinute < 10 && $DateStartedMinute != 0 && strlen($DateStartedMinute) < 2) {
				$DateStartedMinute = '0' . $DateStartedMinute;
			} elseif ($DateStartedMinute == 0) {
				$DateStartedMinute = '00';
			}
			if($DateStartedSecond < 10 && $DateStartedSecond != 0 && strlen($DateStartedSecond) < 2) {
				$DateStartedSecond = '0' . $DateStartedSecond;
			} elseif ($DateStartedSecond == 0) {
				$DateStartedSecond = '00';
			}

			if ($DateEndsHour > 12) {
				$DateEndsHour = 12;
			}
			if ($DateEndsMinute > 60) {
				$DateEndsMinute = 0;
			}
			if ($DateEndsSecond > 60) {
				$DateEndsSecond = 0;
			}

			if($DateEndsHour < 10 && $DateEndsHour != 0 && strlen($DateEndsHour) < 2) {
				$DateEndsHour = '0' . $DateEndsHour;
			} elseif ($DateEndsHour == 0) {
				$DateEndsHour = '00';
			}
			if($DateEndsMinute < 10 && $DateEndsMinute != 0 && strlen($DateEndsMinute) < 2) {
				$DateEndsMinute = '0' . $DateEndsMinute;
			} elseif ($DateEndsMinute == 0) {
				$DateEndsMinute = '00';
			}
			if($DateEndsSecond < 10 && $DateEndsSecond != 0 && strlen($DateEndsSecond) < 2) {
				$DateEndsSecond = '0' . $DateEndsSecond;
			} elseif ($DateEndsSecond == 0) {
				$DateEndsSecond = '00';
			}

			$DateStartedFull = $DateStarted . ' ' . $DateStartedHour . ':' . $DateStartedMinute . ':' . $DateStartedSecond . ' ' . $DateStartedHourType;
			$DateEndsFull = $DateEnds . ' ' . $DateEndsHour . ':' . $DateEndsMinute . ':' . $DateEndsSecond . ' ' . $DateEndsHourType;

			$Temp_ApplicantID = $ApplicantID;
			$Temp_ApplicantID++;

			if ($ApplicantID == NULL || $ClientID == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				if ($CheckApplicant->num_rows() > 0) {
					$row = $CheckApplicant->row_array();

					$data = array(
						'EmployeeID' => $EmployeeID,
						'ClientEmployed' => $ClientID,
						'DateStarted' => $DateStartedFull,
						'DateEnds' => $DateEndsFull,
						'SalaryExpected' => $Salary,
					);
					$EmployNewApplicant = $this->Model_Updates->EmployNewApplicant($Temp_ApplicantID,$ApplicantID,$data);
					$fullName = '';
					if ($row['LastName']) {
						$fullName = $fullName . $row['LastName'] . ', ';
					} else {
						$fullName = $fullName . '[No Last Name], ';
					}
					if ($row['FirstName']) {
						$fullName = $fullName . $row['FirstName'];
					} else {
						$fullName = $fullName . '[No First Name]';
					}
					if ($row['MiddleName']) {
						$fullName = ' ' . $fullName . $row['MiddleName'];
					}
					$data = array(
						'ClientID' => $ClientID,
						'ApplicantID' => $Temp_ApplicantID,
						'Name' => $fullName,
						'Salary' => $row['SalaryExpected'],
					);
					$EmployNewApplicant = $this->Model_Inserts->InsertToClient($data);
					if ($EmployNewApplicant == TRUE) {
						// LOGBOOK
						$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
						if ($CheckApplicant->num_rows() > 0) {
							foreach($CheckApplicant->result_array() as $row) {
								$LastName = $row['LastName'];
								$FirstName = $row['FirstName'];
								$MiddleName = $row['MiddleName'];
							}
						} else {
							$LastName = 'N/A';
							$FirstName = 'N/A';
							$MiddleName = 'N/A';
						}
						$changeCounter = 0;
						$this->Model_Logbook->LogbookEntry('Blue', 'Employee', ' updated <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Contract" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>\'s contract details');
						if ($ClientID != $prevClientID) {
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Client changed from <b>' . $prevClientID . '</b> to <b>' . $ClientID . '</b>');
							$changeCounter++;
						}
						if ($DateStartedFull != $prevDateStarted) {
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Contract\'s date start changed from <b>' . $prevDateStarted . '</b> to <b>' . $DateStartedFull . '</b>');
							$changeCounter++;
						}
						if ($DateEndsFull != $prevDateEnds) {
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Contract\'s date ends changed from <b>' . $prevDateEnds . '</b> to <b>' . $DateEndsFull . '</b>');
							$changeCounter++;
						}
						if ($EmployeeID != $prevEmployeeID) {
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Employee ID changed from <b>' . $prevEmployeeID . '</b> to <b>' . $EmployeeID . '</b>');
							$changeCounter++;
						}
						if ($Salary != $prevSalary) {
							$this->Model_Logbook->LogbookExtendedEntry(0, 'Salary changed from <b>' . $prevSalary . '</b> to <b>' . $Salary . '</b>');
							$changeCounter++;
						}
						if ($changeCounter > 0) {
							$this->Model_Logbook->SetPrompts('success', 'success', 'Updated successfully');
						} else {
							$this->Model_Logbook->SetPrompts('info', 'info', 'No changes made');
						}
						redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
					}
					else
					{
						$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
						redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
					}
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');;
				}
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
		}
	}
	public function EmployUserPermanent()
	{
		if (isset($_GET['id']) && isset($_GET['client'])) {
			$ApplicantID = $this->input->get('id',TRUE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$ClientID = $this->input->get('client',TRUE);

			if ($ApplicantID == NULL || $ClientID == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$EmployPermanent = $this->Model_Updates->EmployPermanent($ApplicantID, $ClientID);
				if ($EmployPermanent) {
					$this->Model_Logbook->SetPrompts('success', 'success', 'Employed successfully');
					// LOGBOOK
					$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
					if ($CheckApplicant->num_rows() > 0) {
						foreach($CheckApplicant->result_array() as $row) {
							$LastName = $row['LastName'];
							$FirstName = $row['FirstName'];
							$MiddleName = $row['MiddleName'];
						}
					} else {
						$LastName = 'N/A';
						$FirstName = 'N/A';
						$MiddleName = 'N/A';
					}
					$GetClientID = $this->Model_Selects->GetClientID($ClientID);
					if ($GetClientID->num_rows() > 0) {
						foreach($GetClientID->result_array() as $row) {
							$ClientName = $row['Name'];
						}
					} else {
						$ClientName = 'N/A';
					}
					$this->Model_Logbook->LogbookEntry('Blue', 'Employee', ' employed <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '#Contract" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a> permanently to <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $ClientID . '" target="_blank">' . $ClientName . '</a>');
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Status changed from <b>' . $prevStatus . '</b> to <b>Employed (Permanent)</b>');
					redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
				}
			}
		}
		else
		{
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
		}
	}
	public function UpdateEmploymentType()
	{
		$ApplicantID = $this->input->post('ApplicantID', TRUE);
		$EmploymentType = $this->input->post('EmploymentType', TRUE);
		if ($ApplicantID == NULL || $EmploymentType == NULL) {
			$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$ChangeEmploymentType = $this->Model_Updates->ChangeEmploymentType($ApplicantID, $EmploymentType);
			if ($ChangeEmploymentType) {
				$this->Model_Logbook->SetPrompts('success', 'success', 'Changed successfully');
				redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
			} else {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
				redirect('ViewEmployee?id=' . $ApplicantID . '#Contract');
			}
		}
	}
	public function EditClient()
	{
		$ClientID = $this->input->post('EditClientID',TRUE);
		$ClientName = $this->input->post('EditClientName',TRUE);
		$ClientAddress = $this->input->post('EditClientAddress',TRUE);
		$ClientContact = $this->input->post('EditClientContact',TRUE);
		$EmployeeIDSuffix = $this->input->post('EditEmployeeIDSuffix',TRUE);

		if ( $ClientName == NULL || $EmployeeIDSuffix == NULL ) {
			$this->Model_Logbook->SetPrompts('error', 'error', 'Client name and suffix is required');
			redirect('Clients');
		}
		else
		{
			$GetClientID = $this->Model_Selects->GetClientID($ClientID);
			if ($GetClientID->num_rows() > 0) {
				foreach($GetClientID->result_array() as $crow) {
					if ($crow['Name'] != NULL) {
						$prevClientName = $crow['Name'];
					} else {
						$prevClientName = 'N/A';
					}
					if ($crow['Address'] != NULL) {
						$prevClientAddress = $crow['Address'];
					} else {
						$prevClientAddress = 'N/A';
					}
					if ($crow['ContactNumber'] != NULL) {
						$prevClientContact = $crow['ContactNumber'];
					} else {
						$prevClientContact = 'N/A';
					}
					if ($crow['EmployeeIDSuffix'] != NULL) {
						$prevEmployeeIDSuffix = $crow['EmployeeIDSuffix'];
					} else {
						$prevEmployeeIDSuffix = 'N/A';
					}
				}
			} else {
				$prevClientName = 'N/A';
				$prevClientAddress = 'N/A';
				$prevClientContact = 'N/A';
				$prevEmployeeIDSuffix = 'N/A';
			}
			$data = array(
				'ClientID' => $ClientID,
				'Name' => $ClientName,
				'Address' => $ClientAddress,
				'ContactNumber' => $ClientContact,
				'EmployeeIDSuffix' => $EmployeeIDSuffix,
			);
			$UpdateClientInfo = $this->Model_Updates->UpdateClientInfo($data);
			if ($UpdateClientInfo) {
				// LOGBOOK
				$this->Model_Logbook->LogbookEntry('Blue', 'Client', ' updated client <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $ClientID . '" target="_blank">' . $ClientName . '</a>');
				$changesCounter = 0;
				if ($prevClientName != $ClientName) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Name changed from <b>' . $prevClientName . '</b> to <b>' . $ClientName . '</b>.');
					$changesCounter++;
				}
				if ($prevClientAddress != $ClientAddress) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Address changed from <b>' . $prevClientAddress . '</b> to <b>' . $ClientAddress . '</b>.');
					$changesCounter++;
				}
				if ($prevClientContact != $ClientContact) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Contact number changed from <b>' . $prevClientContact . '</b> to <b>' . $ClientContact . '</b>.');
					$changesCounter++;
				}
				if ($prevEmployeeIDSuffix != $EmployeeIDSuffix) {
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Employee\'s ID Suffix changed from <b>' . $prevEmployeeIDSuffix . '</b> to <b>' . $EmployeeIDSuffix . '</b>.');
					$changesCounter++;
				}
				if ($changesCounter == 0) {
					$this->Model_Logbook->SetPrompts('info', 'info', 'No changes made');
				} else {
					$this->Model_Logbook->SetPrompts('success', 'success', 'Updated client succesfully');
				}
				redirect('Clients');
			}
			else
			{
				$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
				redirect('Clients');
			}
		}
	}
	public function EditAdmin() 
	{
		$AdminDatabaseID = $this->input->post('EditAdminDatabaseID',TRUE);
		$AdminID = $this->input->post('EditAdminID',TRUE);
		$Password = $this->input->post('EditNewPasswordHolder',TRUE);
		$PasswordChanged = $this->input->post('EditPasswordChanged',TRUE);
		$PasswordVerified = $this->session->flashdata('checkPasswordVerification'); // Called from Main Controller -> AJAX_checkPassword
		// 'pImage': Do not forget the encryption.
		$pImage = $this->input->post('EditAdminImage');
		$pImageChecker = $this->input->post('EditpImageChecker');
		$Permissions = $this->input->post('EditPermissionsCart',TRUE);
		$Position = $this->input->post('EditAdminPosition',TRUE);
		$FirstName = $this->input->post('EditAdminFirstName',TRUE);
		$MiddleName = $this->input->post('EditAdminMiddleName',TRUE);
		$LastName = $this->input->post('EditAdminLastName',TRUE);
		$Notes = $this->input->post('EditAdminNotes',TRUE);

		if (!$PasswordVerified && $PasswordChanged) {
			$this->Model_Logbook->SetPrompts('error', 'error', 'Current password not verified. Are you trying to bypass?');
			redirect('Admins');
		} else {
			if ($Position == NULL || $AdminID == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'ID, password, and position is required.');
				redirect('Admins');
			}
			else
			{
				$CheckAdminNo = $this->Model_Selects->CheckAdminNo($AdminDatabaseID);
				if ($CheckAdminNo->num_rows() <= 0) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Admin not found in database');
					redirect('Admins');
				}
				else
				{
					$CheckAdminID = $this->Model_Selects->CheckAdminID($AdminID);
					if ($CheckAdminID->num_rows() > 1) {
						$this->Model_Logbook->SetPrompts('error', 'error', 'Admin ID already exists');
						redirect('Admins');
					} else {
						$config['upload_path']          = './uploads/'.$AdminID;
						$config['allowed_types']        = 'gif|jpg|png';
						$config['max_size']             = 2000;
						$config['max_width']            = 2000;
						$config['max_height']           = 2000;

						$this->load->library('upload', $config);
						if (!is_dir('uploads'))
						{
							mkdir('./uploads', 0777, true);
						}
						if (!is_dir('uploads/' . $AdminID))
						{
							mkdir('./uploads/' . $AdminID, 0777, true);
							$dir_exist = false;
						}
						if (!$_FILES['EditadminImage']['name'] == '') {
							if ($pImageChecker != NULL) {
								if ( ! $this->upload->do_upload('EditadminImage'))
								{
									$this->Model_Logbook->SetPrompts('error', 'error', $this->upload->display_errors());
									redirect('Admins');
								}
								else
								{
									$pImage = base_url().'uploads/'.$AdminID.'/'.$this->upload->data('file_name');
									// Create thumbnail
									$this->load->library('image_lib');
									$tconfig['image_library'] = 'gd2';
									$tconfig['source_image'] = './uploads/'.$AdminID.'/'.$this->upload->data('file_name');
									$tconfig['create_thumb'] = TRUE;
									$tconfig['maintain_ratio'] = TRUE;
									$tconfig['width']         = 70;
									$tconfig['height']       = 70;
									$tconfig['new_image'] = './uploads/'.$AdminID.'/';

									$this->load->library('image_lib', $tconfig);
									$this->image_lib->initialize($tconfig);

									$this->image_lib->resize();
									if ( ! $this->image_lib->resize())
									{
									        $this->Model_Logbook->SetPrompts('error', 'error', $this->image_lib->display_errors() . $tconfig['source_image']);
									}
									$this->image_lib->clear();
								}
							}
						}
						foreach($CheckAdminNo->result_array() as $crow) {
							$prevAdminID = $crow['AdminID'];
							if ($PasswordVerified && $PasswordChanged) {
								$prevPassword = $crow['Password'];
							}
							$prevpImage = $crow['Image'];
							$prevPermissions = $crow['Permissions'];
							$prevPosition = $crow['Position'];
							$prevFirstName = $crow['FirstName'];
							$prevMiddleName = $crow['MiddleName'];
							$prevLastName = $crow['LastName'];
							$prevNotes = $crow['Notes'];
						}
						if ($prevAdminID == NULL) {
							$prevAdminID = 'N/A';
						}
						if ($PasswordVerified && $PasswordChanged) {
							if ($prevPassword == NULL) {
								$prevPassword = 'N/A';
							}
						}
						if ($prevpImage == NULL) {
							$prevpImage = 'N/A';
						}
						if ($prevPermissions == NULL) {
							$prevPermissions = 'N/A';
						}
						if ($prevPosition == NULL) {
							$prevPosition = 'N/A';
						}
						if ($prevFirstName == NULL) {
							$prevFirstName = 'N/A';
						}
						if ($prevMiddleName == NULL) {
							$prevMiddleName = 'N/A';
						}
						if ($prevLastName == NULL) {
							$prevLastName = 'N/A';
						}
						if ($prevNotes == NULL) {
							$prevNotes = 'N/A';
						}

						$data = array(
							'AdminNo' => $AdminDatabaseID,
							'AdminID' => $AdminID,
							'Image' => $pImage,
							'Permissions' => $Permissions,
							'Position' => $Position,
							'FirstName' => $FirstName,
							'MiddleName' => $MiddleName,
							'LastName' => $LastName,
							'Notes' => $Notes,
						);
						if ($PasswordVerified && $PasswordChanged) {
							$En_Password = password_hash($Password, PASSWORD_BCRYPT);
							$data['Password'] = $En_Password;
						}
						$InsertToEditHistory = $this->Model_Inserts->InsertToEditHistory($data, 'admin_edithistory');
						$UpdateAdminInfo = $this->Model_Updates->UpdateAdminInfo($data, $AdminDatabaseID);
						if ($UpdateAdminInfo == TRUE) {
							if ($this->session->userdata('AdminID') === $AdminID) {
								$data = array(
									'AdminImage' => $pImage,
									'Permissions' => explode(',', $Permissions),
									'Position' => $Position,
									'AdminID' => $AdminID,
									'FirstName' => $FirstName,
									'MiddleName' => $MiddleName,
									'LastName' => $LastName,
									'Notes' => $Notes,
								);
								$this->session->set_userdata($data);
							}
							// LOGBOOK
							$changesCounter = 0;
							if ($prevAdminID != $AdminID && $AdminID != NULL) {
								$this->Model_Logbook->LogbookExtendedEntry(0, 'Admin ID changed from <b>' . $prevAdminID . '</b> to <b>' . $AdminID . '</b>.');
								$changesCounter++;
							}
							if ($PasswordVerified && $PasswordChanged) {
								if ($prevPassword != $En_Password && $Password != NULL) {
									$this->Model_Logbook->LogbookExtendedEntry(0, 'Changed password.');
									$changesCounter++;
								}
							}
							if ($prevpImage != $pImage && $pImage != NULL) {
								$this->Model_Logbook->LogbookExtendedEntry(0, 'Changed profile picture.');
								$changesCounter++;
							}
							if ($prevPermissions != $Permissions && $Permissions != NULL) {
								$prevPermissions = explode(',', $prevPermissions);
								$prevPermissions = implode(', ', $prevPermissions);
								$Permissions = explode(',', $Permissions);
								$this->Model_Logbook->LogbookExtendedEntry(0, 'Permissions changed from <b>' . $prevPermissions . '</b> to <b>' . $Permissions . '</b>.');
								$changesCounter++;
							}
							if ($prevPosition != $Position && $Position != NULL) {
								$this->Model_Logbook->LogbookExtendedEntry(0, 'Position changed from <b>' . $prevPosition . '</b> to <b>' . $Position . '</b>.');
								$changesCounter++;
							}
							if ($prevFirstName != $FirstName && $FirstName != NULL) {
								$this->Model_Logbook->LogbookExtendedEntry(0, 'First name changed from <b>' . $prevFirstName . '</b> to <b>' . $FirstName . '</b>.');
								$changesCounter++;
							}
							if ($prevMiddleName != $MiddleName && $MiddleName != NULL) {
								$this->Model_Logbook->LogbookExtendedEntry(0, 'Middle name changed from <b>' . $prevMiddleName . '</b> to <b>' . $MiddleName . '</b>.');
								$changesCounter++;
							}
							if ($prevLastName != $LastName && $LastName != NULL) {
								$this->Model_Logbook->LogbookExtendedEntry(0, 'Last name changed from <b>' . $prevLastName . '</b> to <b>' . $LastName . '</b>.');
								$changesCounter++;
							}
							if ($prevNotes != $Notes && $Notes != NULL) {
								$this->Model_Logbook->LogbookExtendedEntry(0, 'Notes changed from <b>' . $prevNotes . '</b> to <b>' . $Notes . '</b>.');
								$changesCounter++;
							}
							if ($changesCounter == 0) {
								$this->Model_Logbook->SetPrompts('info', 'info', 'No changes made');
							} else {
								$this->Model_Logbook->LogbookEntry('Blue', 'Admin', ' updated <a class="logbook-tooltip-highlight" href="' . base_url() . 'Admins?id=' . $AdminID . '" target="_blank">' . $AdminID . '</a>');
								$this->Model_Logbook->SetPrompts('success', 'success', 'Updated admin succesfully');
							}
							redirect('Admins');
						}
						else
						{
							$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
							redirect('Admins');
						}
					}
				}
			}
		}
	}
}