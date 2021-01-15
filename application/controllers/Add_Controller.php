<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Controller extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->model('Model_Security');
		$this->load->model('Model_Selects');
		$this->load->model('Model_Inserts');
		$this->load->model('Model_Updates');
		$this->load->model('Model_Logbook');

		date_default_timezone_set('Asia/Manila');
	}
	public function addNewEmployee()
	{
		if($this->Model_Security->CheckPermissions('ApplicantsEditing')):
			# PERSONAL INFORMATION
			$pImageChecker = $this->input->post('pImageChecker');
			$PositionDesired = $this->input->post('PositionDesired');
			$PositionGroup = $this->input->post('PositionGroup');
			// $SalaryExpected = $this->input->post('SalaryExpected');
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
			# DOCUMENTS
			$SSS = $this->input->post('SSS');
			$SSS_Effective = $this->input->post('SSS_Effective');
			$RCN = $this->input->post('RCN');
			$TIN = $this->input->post('TIN');
			$HDMF = $this->input->post('HDMF');
			$PhilHealth = $this->input->post('PhilHealth');
			$ATM_No = $this->input->post('ATM_No');

			$EmergencyPerson = $this->input->post('EmergencyPerson');
			$EmergencyContact = $this->input->post('EmergencyContact');
			$Referral = $this->input->post('Referral');
			$NameExtension = $this->input->post('NameExtension');

			# ADDRESSES
			$Address_Present = $this->input->post('Address_Present');
			$Address_Provincial = $this->input->post('Address_Provincial');
			$Address_Manila = $this->input->post('Address_Manila');

			$CreateADuplicate = $this->input->post('CreateADuplicate');



			$CheckLFName = $this->Model_Selects->CheckLFName($LastName, $FirstName);
			if ($CheckLFName->num_rows() > 0 && $CreateADuplicate !== 'Yes') {
				$data = array(
					'PositionDesired' => $PositionDesired,
					'PositionGroup' => $PositionGroup,
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
					'SSS' => $SSS,
					'SSS_Effective' => $SSS_Effective,
					'RCN' => $RCN,
					'TIN' => $TIN,
					'HDMF' => $HDMF,
					'ATM_No' => $ATM_No,
					'PhilHealth' => $PhilHealth,

					'EmergencyPerson' => $EmergencyPerson,
					'EmergencyContact' => $EmergencyContact,
					'Referral' => $Referral,
					'NameExtension' => $NameExtension,

					'Address_Present' => $Address_Present,
					'Address_Provincial' => $Address_Provincial,
					'Address_Manila' => $Address_Manila,

					'Notice' => 'Duplicate Name'
				);
				$this->session->set_flashdata('data',$data);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$cc = $this->db->count_all('applicants');
			$ccc = $cc + 1;
			$coun = str_pad($ccc,5,0,STR_PAD_LEFT);
			$id = '-A';
			$customid = $coun.$id;
			$ApplicantID = $customid;
			// Check Employee if exist
			$chkem = $this->Model_Selects->CheckEmployee($ApplicantID);
			if ($chkem->num_rows() > 0) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Applicant ID exists.');
				redirect('NewEmployee');
			}
			else
			{
				$config['upload_path']          = './uploads/'.$customid;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$config['max_width']            = 2000;
				$config['max_height']           = 2000;

				$this->load->library('upload', $config);
				if (!is_dir('uploads'))
				{
					mkdir('./uploads', 0777, true);
				}
				if (!is_dir('uploads/' . $customid))
				{
					mkdir('./uploads/' . $customid, 0777, true);
					$dir_exist = false;
				}
				if ($pImageChecker != NULL) {
					if ($pImageChecker == 'url') {
						$pImageURL = $_POST['pImageURL'];
						// $pImageURL = str_replace('data:image/png;base64,', '', $pImageURL);
						// $pImageURL = str_replace(' ', '+', $pImageURL);
						// $pImageDecoded = base64_decode($pImageURL);
						// file_put_contents(base_url().'uploads/'.$customid.'/image.png', $pImageURL);
						// if (!empty($pImageDecoded) || $pImageDecoded == NULL) {
						// 	$this->Model_Logbook->SetPrompts('error', 'error', $pImageURL);
						// 	redirect('NewEmployee');
						// } else {
							$im = imagecreatefromstring($pImageURL);
							if (!$im) {
								$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading image.');
								redirect('NewEmployee');
							}
							else {
								// header('Content-Type: image/png');
								imagejpeg($im, base_url().'uploads/'.$customid.'/image.png');
								// imagedestroy($im);
							}
						// }
					} elseif ($pImageChecker == 'manual') {
						if ( ! $this->upload->do_upload('pImage'))
						{
							$this->Model_Logbook->SetPrompts('error', 'none', $this->upload->display_errors());
							redirect('NewEmployee');
						}
						else
						{
							$pImage = base_url().'uploads/'.$customid.'/'.$this->upload->data('file_name');
							// Create thumbnail
							$this->load->library('image_lib');
							$tconfig['image_library'] = 'gd2';
							$tconfig['source_image'] = './uploads/'.$customid.'/'.$this->upload->data('file_name');
							$tconfig['create_thumb'] = TRUE;
							$tconfig['maintain_ratio'] = TRUE;
							$tconfig['width']         = 70;
							$tconfig['height']       = 70;
							$tconfig['new_image'] = './uploads/'.$customid.'/';

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
				} else {
					$pImage = base_url().'assets/img/wercher_noimage_standard.png';
				}
				// INSERT EMPLOYEE
				$data = array(
					'ApplicantImage' => $pImage,
					'ApplicantID' => $customid,
					'PositionDesired' => $PositionDesired,
					'PositionGroup' => $PositionGroup,
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

					'SSS_No' => $SSS,
					'EffectiveDateCoverage' => $SSS_Effective,
					'ResidenceCertificateNo' => $RCN,
					'TIN' => $TIN,
					'HDMF' => $HDMF,
					'ATM_No' => $ATM_No,
					'PhilHealth' => $PhilHealth,

					'EmergencyPerson' => $EmergencyPerson,
					'EmergencyContact' => $EmergencyContact,
					'Referral' => $Referral,
					'NameExtension' => $NameExtension,

					'Status' => 'Applicant',
					'AppliedOn' => date('Y-m-d h:i:s A'),
				);
				$addedEmployee = $this->Model_Inserts->AddThisEmployee($data);
				if ($addedEmployee == TRUE) {
					if (isset($_SESSION["acadcart"])) {
						foreach ($_SESSION["acadcart"] as $s_da) {
							$data = array(
								'ApplicantID' => $customid,
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
								'ApplicantID' => $customid,
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
								'ApplicantID' => $customid,
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
					$this->session->set_flashdata('isApplicantAdded', 'true');
					unset($_SESSION["acadcart"]);
					unset($_SESSION["emp_cart"]);
					unset($_SESSION["mach_cart"]);
					// unset($_SESSION["rela_cart"]); 
					// unset($_SESSION["beneCart"]);
					
					$this->Model_Logbook->SetPrompts('success', 'success', 'New employee added.');
					// LOGBOOK
					$this->Model_Logbook->LogbookEntry('Green', 'Applicant', ' added a new applicant: <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewEmployee?id=' . $ApplicantID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleName) . '</a>');
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Applicant ID: <b>' . $ApplicantID . '</b>');
					$this->Model_Logbook->LogbookExtendedEntry(0, 'Referral: <b>' . $Referral . '</b>');
					redirect('Applicants');
				}
				else
				{
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect('NewEmployee');
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function Add_NewAdmin()
	{
		if($this->Model_Security->CheckPermissions('AdminsEditing')):
			$AdminID = $this->input->post('AdminID',TRUE);
			$Password = $this->input->post('PasswordHolder',TRUE);
			// 'pImage': Do not forget the encryption.
			$pImageChecker = $this->input->post('pImageChecker');
			$Permissions = $this->input->post('PermissionsCart',TRUE);
			$Position = $this->input->post('AdminPosition',TRUE);
			$FirstName = $this->input->post('AdminFirstName',TRUE);
			$MiddleName = $this->input->post('AdminMiddleName',TRUE);
			$LastName = $this->input->post('AdminLastName',TRUE);
			$Notes = $this->input->post('AdminNotes',TRUE);

			if ($Position == NULL || $AdminID == NULL || $Password == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'ID, password, and position is required.');
				redirect('Admins');
			}
			else
			{
				$CheckAdminID = $this->Model_Selects->CheckAdminID($AdminID);
				if ($CheckAdminID->num_rows() > 0) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Admin ID already exists.');
					redirect('Admins');
				}
				else
				{
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
					if ($pImageChecker != NULL) {
						if ( ! $this->upload->do_upload('adminImage'))
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
					} else {
						$pImage = base_url().'assets/img/wercher_noimage_standard.png';
					}
					$now = new DateTime();
					$DateAdded = $now->format('Y-m-d H:i:s');

					$En_Password = password_hash($Password, PASSWORD_BCRYPT);
					$data = array(
						'AdminID' => $AdminID,
						'Password' => $En_Password,
						'Image' => $pImage,
						'Permissions' => $Permissions,
						'Position' => $Position,
						'FirstName' => $FirstName,
						'MiddleName' => $MiddleName,
						'LastName' => $LastName,
						'DateAdded' => $DateAdded,
						'Notes' => $Notes,
						'Status' => 'Active',
					);
					$InsertAdmin = $this->Model_Inserts->InsertAdmin($data);
					if ($InsertAdmin == TRUE) {
						$this->session->set_flashdata('isAdminAdded', true);
						$this->Model_Logbook->SetPrompts('success', 'success', 'New admin added.');

						// LOGBOOK
						$this->Model_Logbook->LogbookEntry('Green', 'Admin', ' added a new admin: <a class="logbook-tooltip-highlight" href="' . base_url() . 'ViewAdmin?id=' . $AdminID . '" target="_blank">' . ucfirst($LastName) . ', ' . ucfirst($FirstName) .  ' ' . ucfirst($MiddleIN) . '</a>');
						$this->Model_Logbook->LogbookExtendedEntry(0, 'Admin ID: ' . $ApplicantID);
						$this->Model_Logbook->LogbookExtendedEntry(0, 'Position: ' . $AdminLevel . ' - ' . $Position);
						redirect('Admins');
					}
					else
					{
						$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
						redirect('Admins');
					}
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function Add_newClient()
	{
		if($this->Model_Security->CheckPermissions('ClientsEditing')):
			$ClientName = $this->input->post('ClientName',TRUE);
			$ClientAddress = $this->input->post('ClientAddress',TRUE);
			$ClientContact = $this->input->post('ClientContact',TRUE);
			$EmployeeIDSuffix = $this->input->post('EmployeeIDSuffix',TRUE);

			if ( $ClientName == NULL ) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Client name is required.');
				redirect('Clients');
			}
			else
			{
				$CheckClient = $this->Model_Selects->CheckClient($ClientName);
				if ($CheckClient->num_rows() > 0) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Client exists.');
					redirect('Clients');
				}
				else
				{
					$data = array(
						'Name' => $ClientName,
						'Address' => $ClientAddress,
						'ContactNumber' => $ClientContact,
						'EmployeeIDSuffix' => $EmployeeIDSuffix,
						'DateAdded' => date('Y-m-d h:i:s A'),
						'Status' => 'Active',
					);
					$cc = $this->db->count_all('clients');
					$ClientID = $cc + 1;
					$InsertNewClient = $this->Model_Inserts->InsertNewClient($data, $ClientID);
					if ($InsertNewClient == TRUE) {
						$this->session->set_flashdata('isClientAdded', true);
						$this->Model_Logbook->SetPrompts('success', 'success', 'New client added.');
						// LOGBOOK
						$GetClientIDFromName = $this->Model_Selects->GetClientIDFromName($ClientName);
						if ($GetClientIDFromName->num_rows() > 0) {
							foreach($GetClientIDFromName->result_array() as $row) {
								$ClientID = $row['ClientID'];
							}
						} else {
							$ClientID = 0; // default
						}
						$this->Model_Logbook->LogbookEntry('Green', 'Client', ' added a new client: <a class="logbook-tooltip-highlight" href="' . base_url() . 'Clients?id=' . $ClientID . '" target="_blank">' . $ClientName . '</a>');
						$this->Model_Logbook->LogbookExtendedEntry(0, 'Address: ' . $Address);
						$this->Model_Logbook->LogbookExtendedEntry(0, 'ContactNumber: ' . $ClientContact);
						redirect('Clients');
					}
					else
					{
						$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
						redirect('Clients');
					}
				}
			}
		else:
			redirect('Forbidden');
		endif;	
	}
	public function AddSupDoc()
	{
		if($this->Model_Security->CheckPermissions('EmployeesEditing')):
			$ApplicantID = $this->input->post('ApplicantID',TRUE);
			$Subject = $this->input->post('Subject',TRUE);
			$Description = $this->input->post('Description',TRUE);
			$Remarks = $this->input->post('Remarks',TRUE);
			$Type = $this->input->post('Type',TRUE);

			$CheckEmployee = $this->Model_Selects->CheckEmployee($ApplicantID);
			if ($CheckEmployee->num_rows() > 0) {
				foreach($CheckEmployee->result_array() as $row) {
					$ClientID = $row['ClientEmployed'];
				}
			} else {
				$ClientID = 'N/A';
			}

			if ($ApplicantID == NULL || $Subject == NULL || $Type == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Subject is missing. Please try again.');
				redirect('Employees');
				exit();
			}

			else
			{
				// Preview Image File Upload
				$config['upload_path']          = './uploads/'.$ApplicantID;
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 12800;
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

				// TODO: Add restrictions to deny /uploads/ access.
				// PDF File Upload
				if ( ! $this->upload->do_upload('pFile')) {
					$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
					redirect('Employees');
					exit();
				} else {
					$pFile = base_url().'uploads/'.$ApplicantID.'/'.$this->upload->data('file_name');
					$pFileName = $this->upload->data('file_name');
					if (strlen($pFileName) > 15) {
						$pFileName = substr($pFileName, 0, 15);
						$pFileName = $pFileName . '...';
					}
					$data = array(
						'ApplicantID' => $ApplicantID,
						'ClientID' => $ClientID,
						'Doc_Image' => $pImage,
						'Doc_File' => $pFile,
						'Doc_FileName' => $pFileName,
						'Type' => $Type,
						'Subject' => $Subject,
						'Description' => $Description,
						'Remarks' => $Remarks,
						'DateAdded' => date('Y-m-d'),
					);
					if ($Type == 'Blacklist') {
						$this->Model_Updates->BlacklistEmployee($ApplicantID);
					}
					$AddDocuments = $this->Model_Inserts->AddDocuments($data);
					if ($AddDocuments == TRUE) {
						$this->Model_Logbook->SetPrompts('success', 'success', 'New document added.');
						if ($Type == 'Suspension') {
							$S_Days = $this->input->post('S_Days',TRUE);
							$S_Months = $this->input->post('S_Months',TRUE);
							$S_Years = $this->input->post('S_Years',TRUE);

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

							$sdata = array(
								'SuspensionStarted' => $DateStarted,
								'SuspensionEnds' => $DateEnds,
								'SuspensionRemarks' => $S_Remarks,
								'Suspended' => 'Yes',
							);
							$Suspend = $this->Model_Updates->Suspend($ApplicantID,$sdata);
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
								redirect('ViewEmployee?id=' . $ApplicantID . '#Documents');
							}
							else
							{
								$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
								redirect($_SERVER['HTTP_REFERER']);
							}
						} else {
							redirect('ViewEmployee?id=' . $ApplicantID . '#Documents');
							exit();
						}
					}
					else
					{
						$this->Model_Logbook->SetPrompts('error', 'error', 'Error uploading data. Please try again.');
						redirect('Employees');
						exit();
					}
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function AddthisSss()
	{
		if($this->Model_Security->CheckPermissions('Payroll')):
			$f_range = $this->input->post('f_range',TRUE);
			$t_range = $this->input->post('t_range',TRUE);
			$contributionER = $this->input->post('contribution_er',TRUE);
			$contributionEE = $this->input->post('contribution_ee',TRUE);
			$contributionEC = $this->input->post('contribution_ec',TRUE);
			if ($f_range == NULL || $t_range == NULL || $contributionER == NULL || $contributionEE == NULL || $contributionEC == NULL) {
				$this->Model_Logbook->SetPrompts('error', 'error', 'Missing fields. Please try again.');
				redirect('SSS_Table');
			}
			else
			{
				$batch = 1;
				$GetSSSLatestBatch = $this->Model_Selects->GetSSSLatestBatch();
				if ($GetSSSLatestBatch->num_rows() > 0) {
					foreach($GetSSSLatestBatch->result_array() as $row) {
						$batch = $row['Batch'];
					}
				}
				$total = $contributionER + $contributionEE;
				$totalEC = $total + $contributionEC;
				$data = array(
					'batch' => $batch,
					'f_range' => $f_range,
					't_range' => $t_range,
					'contribution_er' => $contributionER,
					'contribution_ee' => $contributionEE,
					'contribution_ec' => $contributionEC,
					'total' => $total,
					'total_with_ec' => $totalEC,
					'active' => 1,
				);
				$AddtoSSS = $this->Model_Inserts->AddtoSSS($data);
				if ($AddtoSSS == TRUE) {
					$this->Model_Logbook->SetPrompts('success', 'success', 'Added new row');
					$this->Model_Logbook->LogbookEntry('Green', 'Payroll', ' added a new SSS table row');
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
					redirect('SSS_Table');
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}


	public function AddEmployeeDeferredDeductions($id,$aid,$amt,$period)
	{
		$SQL = "insert into employee_deductions (id,applicant_id,amount,period,is_paid) values($id,$aid,$amt,$period)";
		$result = $this->db->query($SQL,$id,$aid,$amt,$period);
		return $result;
	}

	public function AddEmployeeOtherDeductions($id,$aid,$desc,$amt,$type)
	{
		$SQL = "insert into other_deductions (id,applicant_id,description,amount,type,deduction_datetime) values ($id,$aid,$desc,$amt,$type,NOW())";
		$result = $this->db->query($SQL,$id,$aid,$desc,$amt,$type);
		return $result;

	}
}
