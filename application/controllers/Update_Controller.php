<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_Controller extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->model('Model_Selects');
		$this->load->model('Model_Inserts');
		$this->load->model('Model_Deletes');
		$this->load->model('Model_Updates');
	}
	public function EmployApplicant()
	{
		if (isset($_POST['ApplicantID'])) {
			$ApplicantID = $this->input->post('ApplicantID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$ClientID = $this->input->post('ClientID',TRUE);
			$H_Days = $this->input->post('H_Days',TRUE);
			$H_Months = $this->input->post('H_Months',TRUE);
			$H_Years = $this->input->post('H_Years',TRUE);
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
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again! (Error: Missing Field/s) A:' . $ApplicantID . ' C:' . $ClientID .' D:' . $H_Days . ' H:' . $H_Months . ' Y:' . $H_Years . ' </h5></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				if ($CheckApplicant->num_rows() > 0) {
					$row = $CheckApplicant->row_array();

					date_default_timezone_set('Asia/Manila');

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
						'ClientEmployed' => $ClientID,
						'DateStarted' => $DateStarted,
						'DateEnds' => $DateEnds,
					);
					$EmployNewApplicant = $this->Model_Updates->EmployNewApplicant($Temp_ApplicantID,$ApplicantID,$data);
					$data = array(
						'ClientID' => $ClientID,
						'FirstName' => $row['FirstName'],
						'MiddleInitial' => $row['MiddleInitial'],
						'LastName' => $row['LastName'],
						'SalaryExpected' => $row['SalaryExpected'],
					);
					$EmployNewApplicant = $this->Model_Inserts->InsertToClient($ClientID,$Temp_ApplicantID,$data);
					if ($EmployNewApplicant == TRUE) {
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Applicant employed!</h5></div>');
						// LOGBOOK
						date_default_timezone_set('Asia/Manila');
						$LogbookCurrentTime = date('Y-m-d h:i:s A');
						$LogbookType = 'New';
						$LogbookEvent = 'Applicant ID ' . $Temp_ApplicantID .' has been employed to Client ID ' . $ClientID . ' for ';
						if($H_Years != 0) {
							$LogbookEvent = $LogbookEvent . $H_Years;
							if($H_Years == 1) {
								$LogbookEvent = $LogbookEvent . ' year, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' years, ';
							}
						}
						if($H_Months != 0) {
							$LogbookEvent = $LogbookEvent . $H_Months;
							if($H_Months == 1) {
								$LogbookEvent = $LogbookEvent . ' month, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' months, ';
							}
						}
						if($H_Days != 0) {
							$LogbookEvent = $LogbookEvent . $H_Days;
							if($H_Days == 1) {
								$LogbookEvent = $LogbookEvent . ' day, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' days, ';
							}
						}
						$LogbookEvent = substr($LogbookEvent, 0, -2) . '!';
						$LogbookLink = base_url() . 'ViewEmployee?id=' . $Temp_ApplicantID;
						$data = array(
							'Time' => $LogbookCurrentTime,
							'Type' => $LogbookType,
							'Event' => $LogbookEvent,
							'Link' => $LogbookLink,
						);
						$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try agains!</h5></div>');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againss!</h5></div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againsss!</h5></div>');
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
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again! (Error: Extend Contract) A:' . $ApplicantID . ' D:' . $E_Days . ' H:' . $E_Months . ' Y:' . $E_Years . ' </h5></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				if ($CheckApplicant->num_rows() > 0) {

					date_default_timezone_set('Asia/Manila');

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
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Contract Extended to ' . $DateEnds . '!</h5></div>');
						// LOGBOOK
						date_default_timezone_set('Asia/Manila');
						$LogbookCurrentTime = date('Y-m-d h:i:s A');
						$LogbookType = 'Update';
						$LogbookEvent = 'Applicant ID ' . $ApplicantID .' has their contract extended by ';
						if($E_Years != 0) {
							$LogbookEvent = $LogbookEvent . $E_Years;
							if($E_Years == 1) {
								$LogbookEvent = $LogbookEvent . ' year, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' years, ';
							}
						}
						if($E_Months != 0) {
							$LogbookEvent = $LogbookEvent . $E_Months;
							if($E_Months == 1) {
								$LogbookEvent = $LogbookEvent . ' month, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' months, ';
							}
						}
						if($E_Days != 0) {
							$LogbookEvent = $LogbookEvent . $E_Days;
							if($E_Days == 1) {
								$LogbookEvent = $LogbookEvent . ' day, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' days, ';
							}
						}
						$LogbookEvent = substr($LogbookEvent, 0, -2) . '!';
						$LogbookLink = base_url() . 'ViewEmployee?id=' . $ApplicantID;
						$data = array(
							'Time' => $LogbookCurrentTime,
							'Type' => $LogbookType,
							'Event' => $LogbookEvent,
							'Link' => $LogbookLink,
						);
						$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try agains!</h5></div>');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againss!</h5></div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againsss!</h5></div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function UpdateEmployee()
	{
		$ApplicantID = $this->input->post('M_ApplicantID');
		$pImage = $this->input->post('M_ApplicantImage');
		# PERSONAL INFORMATION
		$PositionDesired = $this->input->post('PositionDesired');
		$SalaryExpected = $this->input->post('SalaryExpected');
		$LastName = $this->input->post('LastName');
		$FirstName = $this->input->post('FirstName');
		$MI = $this->input->post('MI');
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
		# DOCUMENTS
		$SSS = $this->input->post('SSS');
		$SSS_Effective = $this->input->post('SSS_Effective');
		$RCN = $this->input->post('RCN');
		$RCN_at = $this->input->post('RCN_at');
		$RCN_On = $this->input->post('RCN_On');
		$TIN = $this->input->post('TIN');
		$TIN_At = $this->input->post('TIN_At');
		$TIN_On = $this->input->post('TIN_On');

		$HDMF = $this->input->post('HDMF');
		$HDMF_At = $this->input->post('HDMF_At');
		$HDMF_On = $this->input->post('HDMF_On');

		$PhilHealth = $this->input->post('PhilHealth');
		$PhilHealth_At = $this->input->post('PhilHealth_At');
		$PhilHealth_On = $this->input->post('PhilHealth_On');
		$ATM_No = $this->input->post('ATM_No');

		# ADDRESSES
		$Address_Present = $this->input->post('Address_Present');
		$Address_Provincial = $this->input->post('Address_Provincial');
		$Address_Manila = $this->input->post('Address_Manila');

		if ($PositionDesired == NULL || $SalaryExpected == NULL || $LastName == NULL || $FirstName == NULL || $MI == NULL || $Gender == NULL || $Age == NULL || $Height == NULL || $Weight == NULL || $Religion == NULL || $bDate == NULL || $bPlace == NULL || $Citizenship == NULL || $CivilStatus == NULL || $No_Children == NULL || $PhoneNumber == NULL || $SSS == NULL || $SSS_Effective == NULL || $RCN == NULL || $RCN_at == NULL || $RCN_On == NULL || $TIN == NULL || $TIN_At == NULL || $TIN_On == NULL || $HDMF == NULL || $HDMF_At == NULL || $HDMF_On == NULL || $Address_Present == NULL) {
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> All fields are required!</h5></div>');
			$data = array(
				'PositionDesired' => $PositionDesired,
				'SalaryExpected' => $SalaryExpected,
				'LastName' => $LastName,
				'FirstName' => $FirstName,
				'MI' => $MI,
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
				'SSS' => $SSS,
				'SSS_Effective' => $SSS_Effective,
				'RCN' => $RCN,
				'RCN_at' => $RCN_at,
				'RCN_On' => $RCN_On,
				'TIN' => $TIN,
				'TIN_At' => $TIN_At,
				'TIN_On' => $TIN_On,

				'HDMF' => $HDMF,
				'HDMF_At' => $HDMF_At,
				'HDMF_On' => $HDMF_On,
				'ATM_No' => $ATM_No,

				'PhilHealth' => $PhilHealth,
				'PhilHealth_At' => $PhilHealth_At,
				'PhilHealth_On' => $PhilHealth_On,
				


				'Address_Present' => $Address_Present,
				'Address_Provincial' => $Address_Provincial,
				'Address_Manila' => $Address_Manila,
			);
			$this->session->set_flashdata($data);
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
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

				if (!$_FILES['pImage']['name'] == '') {
					if (! $this->upload->do_upload('pImage'))
					{
						$this->session->set_flashdata('prompts', '<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> '.$this->upload->display_errors().'</h5></div>');
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						$pImage = base_url().'uploads/'.$ApplicantID.'/'.$this->upload->data('file_name');
					}
				}
				// INSERT EMPLOYEE
				$data = array(
					'ApplicantImage' => $pImage,
					'ApplicantID' => $ApplicantID,
					'PositionDesired' => $PositionDesired,
					'SalaryExpected' => $SalaryExpected,
					'LastName' => ucfirst($LastName),
					'FirstName' => ucfirst($FirstName),
					'MiddleInitial' => ucfirst($MI),
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

					'SSS_No' => $SSS,
					'EffectiveDateCoverage' => $SSS_Effective,
					'ResidenceCertificateNo' => $RCN,
					'Rcn_At' => $RCN_at,
					'Rcn_On' => $RCN_On,
					'TIN' => $TIN,
					'TIN_At' => $TIN_At,
					'TIN_On' => $TIN_On,
					
					'HDMF' => $HDMF,
					'HDMF_At' => $HDMF_At,
					'HDMF_On' => $HDMF_On,
					'ATM_No' => $ATM_No,

					'PhilHealth' => $PhilHealth,
					'PhilHealth_At' => $PhilHealth_At,
					'PhilHealth_On' => $PhilHealth_On,
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
					
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Details updated!</h5></div>');
					// LOGBOOK
					date_default_timezone_set('Asia/Manila');
					$LogbookCurrentTime = date('Y-m-d h:i:s A');
					$LogbookType = 'Update';
					$LogbookEvent = 'Updated details on Person ID ' . $ApplicantID . '.';
					$LogbookLink = base_url() . 'ViewEmployee?id=' . $ApplicantID;
					$data = array(
						'Time' => $LogbookCurrentTime,
						'Type' => $LogbookType,
						'Event' => $LogbookEvent,
						'Link' => $LogbookLink,
					);
					$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
					redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong!</h5></div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
	public function AddNote()
	{
		if (isset($_POST['Note'])) {
			$Note = $this->input->post('Note',TRUE);
			// LOGBOOK
			date_default_timezone_set('Asia/Manila');
			$LogbookCurrentTime = date('Y-m-d h:i:s A');
			$LogbookType = 'Note';
			$data = array(
				'Time' => $LogbookCurrentTime,
				'Type' => $LogbookType,
				'Event' => $Note,
			);
			$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
			redirect(base_url() . 'Dashboard#Logbook');

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
			$ReminderDate = 0;

			if ($ApplicantID == NULL) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again! (Error: Extend Contract) A:' . $ApplicantID . ' D:' . $E_Days . ' H:' . $E_Months . ' Y:' . $E_Years . ' </h5></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantID);
				if ($CheckApplicant->num_rows() > 0) {

					date_default_timezone_set('Asia/Manila');

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
						'ReminderLocked' => 'No',
					);
					$SetReminder = $this->Model_Inserts->InsertReminder($ApplicantID,$data);
					if ($SetReminder == TRUE) {
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Reminder set!</h5></div>');
						// LOGBOOK
						date_default_timezone_set('Asia/Manila');
						$LogbookCurrentTime = date('Y-m-d h:i:s A');
						$LogbookType = 'New';
						$LogbookEvent = 'A reminder has been set for ID ' . $ApplicantID .', alerting after ';
						if($R_Years != 0) {
							$LogbookEvent = $LogbookEvent . $R_Years;
							if($R_Years == 1) {
								$LogbookEvent = $LogbookEvent . ' year, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' years, ';
							}
						}
						if($R_Months != 0) {
							$LogbookEvent = $LogbookEvent . $R_Months;
							if($R_Months == 1) {
								$LogbookEvent = $LogbookEvent . ' month, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' months, ';
							}
						}
						if($R_Days != 0) {
							$LogbookEvent = $LogbookEvent . $R_Days;
							if($R_Days == 1) {
								$LogbookEvent = $LogbookEvent . ' day, ';
							} else {
								$LogbookEvent = $LogbookEvent . ' days, ';
							}
						}
						$LogbookEvent = substr($LogbookEvent, 0, -2) . '!';
						$LogbookLink = base_url() . 'ViewEmployee?id=' . $ApplicantID;
						$data = array(
							'Time' => $LogbookCurrentTime,
							'Type' => $LogbookType,
							'Event' => $LogbookEvent,
							'Link' => $LogbookLink,
						);
						$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try agains!</h5></div>');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againss!</h5></div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againsss!</h5></div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function BlacklistEmployee()
	{
		$ApplicantID = $this->input->get('id');
		if (!isset($_GET['id'])) {
			redirect('Employee');
		}
		else
		{
			$Removethis = $this->Model_Updates->BlacklistEmployee($ApplicantID);
			if ($Removethis == TRUE) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Employee ID ' . $ApplicantID . ' has been blacklisted.</h5></div>');
				// LOGBOOK
				date_default_timezone_set('Asia/Manila');
				$LogbookCurrentTime = date('Y-m-d h:i:s A');
				$LogbookType = 'Archival';
				$LogbookEvent = 'Employee ID ' . $ApplicantID .' has been blacklisted.';
				$LogbookLink = base_url() . 'ViewEmployee?id=' . $ApplicantID;
				$data = array(
					'Time' => $LogbookCurrentTime,
					'Type' => $LogbookType,
					'Event' => $LogbookEvent,
					'Link' => $LogbookLink,
				);
				$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
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
	public function SetWeeklyHours()
	{
		if (isset($_POST['ApplicantID'])) {
			$ApplicantID = $this->input->post('ApplicantID',FALSE); // TODO: (Dec 12, 2019) Changed from TRUE to FALSE > No XSS filtering.
			$Monday = $this->input->post('HoursDayOne',TRUE);
			$Tuesday = $this->input->post('HoursDayTwo',TRUE);
			$Wednesday = $this->input->post('HoursDayThree',TRUE);
			$Thursday = $this->input->post('HoursDayFour',TRUE);
			$Friday = $this->input->post('HoursDayFive',TRUE);
			$Saturday = $this->input->post('HoursDaySix',TRUE);
			if($Monday == NULL) {
				$Monday = 0;
			}
			if($Tuesday == NULL) {
				$Tuesday = 0;
			}
			if($Wednesday == NULL) {
				$Wednesday = 0;
			}
			if($Thursday == NULL) {
				$Thursday = 0;
			}
			if($Friday == NULL) {
				$Friday = 0;
			}
			if($Saturday == NULL) {
				$Saturday = 0;
			}

			if ($ApplicantID == NULL) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again! (Error: Missing Field/s)</h5></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				$GetWeeklyListEmployee = $this->Model_Selects->GetWeeklyListEmployee($ApplicantID);
				if ($GetWeeklyListEmployee->num_rows() > 0) {
					$row = $GetWeeklyListEmployee->row_array();

					date_default_timezone_set('Asia/Manila');

					$data = array(
						'Monday' => $Monday,
						'Tuesday' => $Tuesday,
						'Wednesday' => $Wednesday,
						'Thursday' => $Thursday,
						'Friday' => $Friday,
						'Saturday' => $Saturday,
					);
					$UpdateWeeklyHours = $this->Model_Updates->UpdateWeeklyHours($ApplicantID,$data);
					if ($UpdateWeeklyHours == TRUE) {
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Updated!</h5></div>');
						// LOGBOOK
						date_default_timezone_set('Asia/Manila');
						$LogbookCurrentTime = date('Y-m-d h:i:s A');
						$LogbookType = 'Update';
						$LogbookEvent = 'Updated weekly hours for ' . $ApplicantID . '.';
						// $LogbookLink = base_url() . 'ViewClient?id=' . $Temp_ApplicantID;
						$LogbookLink = base_url() . 'Clients';
						$data = array(
							'Time' => $LogbookCurrentTime,
							'Type' => $LogbookType,
							'Event' => $LogbookEvent,
							'Link' => $LogbookLink,
						);
						$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
						redirect($_SERVER['HTTP_REFERER']);
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try agains!</h5></div>');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againss!</h5></div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		else
		{
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againsss!</h5></div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}