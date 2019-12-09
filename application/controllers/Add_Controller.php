<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Controller extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->model('Model_Selects');
		$this->load->model('Model_Inserts');
	}
	public function addNewEmployee()
	{
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
		# ADDRESSES
		$Address_Present = $this->input->post('Address_Present');
		$Address_Provincial = $this->input->post('Address_Provincial');
		$Address_Manila = $this->input->post('Address_Manila');

		if ($PositionDesired == NULL || $SalaryExpected == NULL || $LastName == NULL || $FirstName == NULL || $MI == NULL || $Gender == NULL || $Age == NULL || $Height == NULL || $Weight == NULL || $Religion == NULL || $bDate == NULL || $bPlace == NULL || $Citizenship == NULL || $CivilStatus == NULL || $No_Children == NULL || $PhoneNumber == NULL || $SSS == NULL || $SSS_Effective == NULL || $RCN == NULL || $RCN_at == NULL || $RCN_On == NULL || $TIN == NULL || $TIN_At == NULL || $TIN_On == NULL || $Address_Present == NULL) {
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
				'Address_Present' => $Address_Present,
				'Address_Provincial' => $Address_Provincial,
				'Address_Manila' => $Address_Manila,
			);
			$this->session->set_flashdata($data);
			redirect('NewEmployee');
		}
		else
		{
			$cc = $this->db->count_all('applicants');
			$ccc = $cc + 1;
			$coun = str_pad($ccc,5,0,STR_PAD_LEFT);
			$id = '-A';
			$customid = $coun.$id;
			$ApplicantID = $customid;
			// Check Employee if exist
			$chkem = $this->Model_Selects->CheckEmployee($ApplicantID);
			if ($chkem->num_rows() > 0) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Employee ID exist</h5></div>');
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
				
				if ( ! $this->upload->do_upload('pImage'))
				{
					$this->session->set_flashdata('prompts', '<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> '.$this->upload->display_errors().'</h5></div>');
					redirect('NewEmployee');
				}
				else
				{
					$pImage = base_url().'uploads/'.$customid.'/'.$this->upload->data('file_name');
					// INSERT EMPLOYEE
					$data = array(
						'ApplicantImage' => $pImage,
						'ApplicantID' => $customid,
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
						unset($_SESSION["acadcart"]);
						unset($_SESSION["emp_cart"]);
						unset($_SESSION["mach_cart"]);
						// unset($_SESSION["rela_cart"]); 
						// unset($_SESSION["beneCart"]);
						
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> New Employee added!</h5></div>');
						redirect('NewEmployee');
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong!</h5></div>');
						redirect('NewEmployee');
					}
				}
			}
		}
	}
	public function Add_NewAdmin()
	{
		$AdminLevel = $this->input->post('AdminLevel',TRUE);
		$Position = $this->input->post('Position',TRUE);
		$AdminID = $this->input->post('AdminID',TRUE);
		$Password = $this->input->post('Password',TRUE);
		$FirstName = $this->input->post('FirstName',TRUE);
		$MiddleIN = $this->input->post('MiddleIN',TRUE);
		$LastName = $this->input->post('LastName',TRUE);
		$Gender = $this->input->post('Gender',TRUE);

		if ($AdminLevel == NULL || $Position == NULL || $AdminID == NULL || $Password == NULL || $FirstName == NULL || $MiddleIN == NULL || $LastName == NULL || $Gender == NULL) {
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> All fields are required!</h5></div>');
			redirect('Admin_List');
		}
		else
		{
			$CheckAdminID = $this->Model_Selects->CheckAdminID($AdminID);
			if ($CheckAdminID->num_rows() > 0) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Admin exist!</h5></div>');
				redirect('Admin_List');
			}
			else
			{
				$now = new DateTime();
				$now->setTimezone(new DateTimeZone('Asia/Manila'));
				$DateAdded = $now->format('g:i A');

				$En_Password = password_hash($Password, PASSWORD_BCRYPT);
				$DateAdded = time();
				$data = array(
					'AdminLevel' => $AdminLevel,
					'Position' => $Position,
					'AdminID' => $AdminID,
					'Password' => $En_Password,
					'FirstName' => $FirstName,
					'MiddleInitial' => $MiddleIN,
					'LastName' => $LastName,
					'Gender' => $Gender,
					'DateAdded' => $DateAdded,
				);
				$InsertAdmin = $this->Model_Inserts->InsertAdmin($data);
				if ($InsertAdmin == TRUE) {
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> New Admin added!</h5></div>');
					redirect('Admin_List');
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong!</h5></div>');
					redirect('Admin_List');
				}
			}
		}
		
	}
	public function Add_newClient()
	{
		$ClientName = $this->input->post('ClientName',TRUE);
		$ClientAddress = $this->input->post('ClientAddress',TRUE);
		$ClientContact = $this->input->post('ClientContact',TRUE);

		if ( $ClientName == NULL || $ClientAddress == NULL || $ClientContact == NULL ) {
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> All fields are required!</h5></div>');
			redirect('Clients');
		}
		else
		{
			$CheckClient = $this->Model_Selects->CheckClient($ClientName);
			if ($CheckClient->num_rows() > 0) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Client exist!</h5></div>');
				redirect('Clients');
			}
			else
			{
				$data = array(
					'Name' => $ClientName,
					'Address' => $ClientAddress,
					'ContactNumber' => $ClientContact,
					'Status' => 'Active',
				);
				$InsertNewClient = $this->Model_Inserts->InsertNewClient($data);
				if ($InsertNewClient == TRUE) {
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> New Client added!</h5></div>');
					redirect('Clients');
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again!</h5></div>');
					redirect('Clients');
				}
			}
		}
	}
}
