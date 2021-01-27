 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Main_Controller extends CI_Controller {

 	public function __construct() {
 		parent::__construct();
 		$this->load->model('Model_Security');
 		$this->load->model('Model_Selects');
		$this->load->model('Model_Updates');
		$this->load->model('Model_Inserts');
		$this->load->model('Model_Logbook');
		$GetEmployee = $this->Model_Selects->GetEmployee();
		$GetClient = $this->Model_Selects->getClientOption();
		date_default_timezone_set('Asia/Manila');
		$currTime = date('Y-m-d h:i:s A');
		// TODO: Don't call this here. Need a real time checker. Find a better solution than this.
		// print($this->session->userdata['AdminNo']);
		foreach ($GetEmployee->result_array() as $row) {
			// Assigns a new ID after successfully hiring
			if ($row['Temp_ApplicantID'] != NULL && $row['Temp_ApplicantID'] == $row['ApplicantID']) {
				$this->Model_Updates->UpdateApplicantID($row['Temp_ApplicantID']);
			}
			$ApplicantID = $row['ApplicantID'];
			if ($row['ReminderLocked'] != 'Yes'){
				if (strtotime($row['DateEnds']) < (strtotime($currTime) + strtotime($row['ReminderDate'])) && strtotime($row['DateEnds']) > strtotime($currTime)) {
					// $LogbookInsert = $this->Model_Updates->ReminderLocked($ApplicantID);
					// // LOGBOOK
					// $LogbookCurrentTime = date('Y-m-d h:i:s A');
					// $LogbookType = 'Reminder';
					// $LogbookEvent = 'Employee ' . $ApplicantID . ' is expiring in ' . $row['ReminderDateString'] . '!';
					// $LogbookLink = base_url() . 'ViewEmployee?id=' . $ApplicantID;
					// $data = array(
					// 	'Time' => $LogbookCurrentTime,
					// 	'Type' => $LogbookType,
					// 	'Event' => $LogbookEvent,
					// 	'Link' => $LogbookLink,
					// );
					// $LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
				}
			}
			if (strtotime($row['DateEnds']) < strtotime($currTime)) {
				foreach ($GetEmployee->result_array() as $row) {
					foreach ($GetClient->result_array() as $nrow) {
						if ($row['ClientEmployed'] == $nrow['ClientID']) {
							$ClientName = $nrow['Name'];
						}
					}
				}

				if ($ApplicantID == NULL) {
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again!</h5></div>');
				}
				else
				{
					$CheckEmployee = $this->Model_Selects->CheckEmployee($ApplicantID);
					if ($CheckEmployee->num_rows() > 0) {
						$data = array(
							'ApplicantID' => $ApplicantID,
							'PreviousDateStarted' => $row['DateStarted'],
							'PreviousDateEnds' => $row['DateEnds'],
							'Client' => $ClientName,
						);
						$InsertContractHistory = $this->Model_Inserts->InsertContractHistory($data);
						$ApplicantExpired = $this->Model_Updates->ApplicantExpired($ApplicantID);
						if ($ApplicantExpired == TRUE) {
							$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Employee ' . $ApplicantID . ' has expired!</h5></div>');
							// // LOGBOOK
							// $LogbookCurrentTime = date('Y-m-d h:i:s A');
							// $LogbookType = 'Update';
							// $LogbookEvent = 'Employee ' . $ApplicantID . ' has expired!';
							// $LogbookLink = base_url() . 'ViewEmployee?id=' . $ApplicantID;
							// $data = array(
							// 	'Time' => $LogbookCurrentTime,
							// 	'Type' => $LogbookType,
							// 	'Event' => $LogbookEvent,
							// 	'Link' => $LogbookLink,
							// );
							// $LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
						}
						else
						{
							$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try agains!</h5></div>');
						}
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againss!</h5></div>');
					}
				}
			}
			if ($row['Suspended'] != '' && strtotime($row['SuspensionEnds']) < strtotime($currTime)) {
				if ($ApplicantID == NULL) {
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again!</h5></div>');
				}
				else
				{
					$CheckEmployee = $this->Model_Selects->CheckEmployee($ApplicantID);
					if ($CheckEmployee->num_rows() > 0) {
						$SuspensionExpires = $this->Model_Updates->SuspensionExpires($ApplicantID);
						if ($SuspensionExpires == TRUE) {
							$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Employee ' . $ApplicantID . ' is no longer suspended.</h5></div>');
							// LOGBOOK
							date_default_timezone_set('Asia/Manila');
							$LogbookCurrentTime = date('Y-m-d h:i:s A');
							$LogbookType = 'Update';
							$LogbookEvent = 'Employee ' . $ApplicantID . ' is no longer suspended.';
							$LogbookLink = base_url() . 'ViewEmployee?id=' . $ApplicantID;
							$data = array(
								'Time' => $LogbookCurrentTime,
								'Type' => $LogbookType,
								'Event' => $LogbookEvent,
								'Link' => $LogbookLink,
							);
							$LogbookInsert = $this->Model_Inserts->InsertLogbook($data);
						}
						else
						{
							$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try agains!</h5></div>');
						}
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againss!</h5></div>');
					}
				}
			}
		}

	}
	public function index()
	{
		// $this->session->unset_userdata('acadcart');
		// redirect('Dashboard');
		if ($this->session->userdata('is_logged_in')) {
			redirect('Dashboard');
		} else {
			$this->load->view('Login');
		}
	}
	public function FourOhFour()
	{
		// redirect('Dashboard');
		$this->load->view('FourOhFour');
	}
	public function Forbidden()
	{
		// redirect('Dashboard');
		$this->load->view('Forbidden');
	}
	public function CheckUserLogin()
	{
		if (!isset($_SESSION['is_logged_in'])) {
			$p_text = '<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><i class="fas fa-times fa-fw"></i> User login required!</div>';
			$this->session->set_flashdata('prompt',$p_text);
			redirect('');
			exit();
		}
	}
	public function Dashboard()
	{
		if($this->Model_Security->CheckPermissions('Dashboard')):
			$this->load->model('Model_Deletes');

			###	CHECK SESSION
			// $this->CheckUserLogin();

			$header['title'] = 'Dashboard | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

			// CHART
			$result =  $this->Model_Selects->GetApplicantSkills();

			$record = $result->result();
			$data = [];

			// WEEKLY INCREASE
			$CurrentDay = date('Y-m-d h:i:s A');
			$CurrentDayScope = date('Y-m-d h:i:s A', strtotime('-7 days', strtotime($CurrentDay)));
			$data['WeeklyApplicants'] = $this->Model_Selects->GetApplicantsIncrease($CurrentDay, $CurrentDayScope)->num_rows();
			$data['WeeklyEmployees'] = $this->Model_Selects->GetEmployeesIncrease($CurrentDay, $CurrentDayScope)->num_rows();

			foreach($record as $row) {
				$data['label'][] = $row->PositionGroup;
				$data['data'][] = (int) $row->count;
			}
			$data['chart_data'] = json_encode($data);
			$edata = [];
			$GetApplicantSkillsExpired = $this->Model_Selects->GetApplicantSkillsExpired();
			$edata['data'][] = $GetApplicantSkillsExpired->num_rows();
			foreach($GetApplicantSkillsExpired->result_array() as $row) {
				$edata['label'][] = $row['PositionGroup'];
			}
			$data['chart_data_expired'] = json_encode($edata);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Dashboard">Dashboard</a></li>
			</ol>
			</nav>';
			$data['getClientOption'] = $this->Model_Selects->getClientOption();
			// COUNT ADMIN
			$data['result_cadmin'] =  $this->Model_Selects->GetAdmin();
			// COUNT APPLICANTS
			$data['result_capp'] =  $this->Model_Selects->GetTotalApplicants();
			// COUNT EMPLOYEE
			$data['result_cemployee'] =  $this->Model_Selects->GetEmployee();
			// COUNT CLIENT
			$data['result_cclients'] =  $this->Model_Selects->GetClients();
			// LOGBOOK
			$data['GetLogbook'] =  $this->Model_Selects->GetLogbookWithLimit(10);
			// COUNT MONTHLY TOTAl
			$CurrentYear = date('Y');
			$Year = $CurrentYear;
			$Month = date('01');
			$data['CurrentYear'] = $CurrentYear;
			if (isset($_GET['Year'])) {
				$Year = $this->input->get('Year');
				$CountMonthlyTotal =  $this->Model_Selects->CountMonthlyTotal();
				if ($CountMonthlyTotal->num_rows() > 144) { // Truncates cache (Database) after 12 years of history
					$this->Model_Deletes->CleanDashboardMonths($CurrentYear);
					for ($i = 0; $i < 12; $i++) {
						$MonthAdd = date('m', strtotime('+' . $i . ' month', strtotime($Month)));
						$sql = array(
							'Year' => $Year,
							'Month' => $MonthAdd,
							'Total' => '0'
						);
						$this->Model_Inserts->InsertDashboardMonths($sql);
						$this->Model_Inserts->InsertToGraph();
						if ($i == 11) {
							$data['result_monthly'] = $this->Model_Selects->GetMonthlyTotal($Year);
							$data['result_monthly_current_year'] =  $this->Model_Selects->GetMonthlyTotal($CurrentYear);
							$data['SelectedYear'] = $Year;
							$CountTotal = 0;
							foreach ($this->Model_Selects->GetMonthlyTotal($CurrentYear)->result_array() as $row) {
								$CountTotal = $CountTotal + $row['Total'];
							}
							$data['CurrentYearTotal'] = $CountTotal;
							$CountTotal = 0;
							foreach ($this->Model_Selects->GetMonthlyTotal($Year)->result_array() as $row) {
								$CountTotal = $CountTotal + $row['Total'];
							}
							$data['SelectedYearTotal'] = $CountTotal;
							$this->load->view('users/u_dashboard',$data);
						}
					}
				} else {
					$YearChecker =  $this->Model_Selects->GetMonthlyTotal($Year);
					if ($YearChecker->num_rows() < 12) { // Loads faster if already on cache (Database)
						for ($i = 0; $i < 12; $i++) {
							$MonthAdd = date('m', strtotime('+' . $i . ' month', strtotime($Month)));
							$sql = array(
								'Year' => $Year,
								'Month' => $MonthAdd,
								'Total' => '0'
							);
							$this->Model_Inserts->InsertDashboardMonths($sql);
							$this->Model_Inserts->InsertToGraph();
							if ($i == 11) {
								$data['result_monthly'] = $this->Model_Selects->GetMonthlyTotal($Year);
								$data['result_monthly_current_year'] =  $this->Model_Selects->GetMonthlyTotal($CurrentYear);
								$data['SelectedYear'] = $Year;
								$CountTotal = 0;
								foreach ($this->Model_Selects->GetMonthlyTotal($CurrentYear)->result_array() as $row) {
									$CountTotal = $CountTotal + $row['Total'];
								}
								$data['CurrentYearTotal'] = $CountTotal;
								$CountTotal = 0;
								foreach ($this->Model_Selects->GetMonthlyTotal($Year)->result_array() as $row) {
									$CountTotal = $CountTotal + $row['Total'];
								}
								$data['SelectedYearTotal'] = $CountTotal;
								$this->load->view('users/u_dashboard',$data);
							}
						}
					} else {
						if ($CountMonthlyTotal->num_rows() > 144) {
							$this->Model_Deletes->CleanDashboardMonths();
						}
						$this->Model_Inserts->InsertToGraph();
						$data['result_monthly'] = $this->Model_Selects->GetMonthlyTotal($Year);
						$data['result_monthly_current_year'] =  $this->Model_Selects->GetMonthlyTotal($CurrentYear);
						$data['SelectedYear'] = $Year;
						$CountTotal = 0;
						foreach ($this->Model_Selects->GetMonthlyTotal($CurrentYear)->result_array() as $row) {
							$CountTotal = $CountTotal + $row['Total'];
						}
						$data['CurrentYearTotal'] = $CountTotal;
						$CountTotal = 0;
						foreach ($this->Model_Selects->GetMonthlyTotal($Year)->result_array() as $row) {
							$CountTotal = $CountTotal + $row['Total'];
						}
						$data['SelectedYearTotal'] = $CountTotal;
						$this->load->view('users/u_dashboard',$data);
					}
				}
			} else {
				$YearChecker =  $this->Model_Selects->GetMonthlyTotal($CurrentYear);
				if ($YearChecker->num_rows() < 12) { // Cache on first Dashboard visit
					for ($i = 0; $i < 12; $i++) {
						$MonthAdd = date('m', strtotime('+' . $i . ' month', strtotime($Month)));
						$sql = array(
							'Year' => $CurrentYear,
							'Month' => $MonthAdd,
							'Total' => '0'
						);
						$this->Model_Inserts->InsertDashboardMonths($sql);
						$this->Model_Inserts->InsertToGraph();
						if ($i == 11) {
							$data['result_monthly'] = $this->Model_Selects->GetMonthlyTotal($CurrentYear);
							$data['result_monthly_current_year'] =  $this->Model_Selects->GetMonthlyTotal($CurrentYear);
							$data['SelectedYear'] = $CurrentYear;
							$CountTotal = 0;
							foreach ($this->Model_Selects->GetMonthlyTotal($CurrentYear)->result_array() as $row) {
								$CountTotal = $CountTotal + $row['Total'];
							}
							$data['CurrentYearTotal'] = $CountTotal;
							$CountTotal = 0;
							foreach ($this->Model_Selects->GetMonthlyTotal($Year)->result_array() as $row) {
								$CountTotal = $CountTotal + $row['Total'];
							}
							$data['SelectedYearTotal'] = $CountTotal;
							$this->load->view('users/u_dashboard',$data);
						}
					}
				} else {
					$data['result_monthly_current_year'] =  $this->Model_Selects->GetMonthlyTotal($CurrentYear);
					$data['SelectedYear'] = $CurrentYear;
					$CountTotal = 0;
					foreach ($this->Model_Selects->GetMonthlyTotal($CurrentYear)->result_array() as $row) {
						$CountTotal = $CountTotal + $row['Total'];
					}
					$data['CurrentYearTotal'] = $CountTotal;
					$data['SelectedYearTotal'] = $CountTotal;
					$this->load->view('users/u_dashboard',$data);
				}
			}
		else:
			redirect('Forbidden');
		endif;
	}
	
	public function V_Applicants()
	{
		if($this->Model_Security->CheckPermissions('Applicants')):
			$header['title'] = 'Applicants | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Applicants">Applicants</a></li>
			</ol>
			</nav>';

			// WEEKLY INCREASE
			$CurrentDay = date('Y-m-d h:i:s A');
			$CurrentDayScope = date('Y-m-d h:i:s A', strtotime('-7 days', strtotime($CurrentDay)));
			$data['WeeklyApplicants'] = $this->Model_Selects->GetApplicantsIncrease($CurrentDay, $CurrentDayScope)->num_rows();

			$data['GetAllApplicants'] = $this->Model_Selects->GetAllApplicants()->num_rows();
			$data['get_employee'] = $this->Model_Selects->getApplicant();
			$data['get_ApplicantExpired'] = $this->Model_Selects->getApplicantExpired();
			$data['getClientOption'] = $this->Model_Selects->getClientOption();
			$this->load->view('users/u_applicant',$data);
		else:
			redirect('Forbidden');
		endif;

	}
	public function V_ApplicantsExpired()
	{
		if($this->Model_Security->CheckPermissions('ApplicantsExpired')):
			$header['title'] = 'Expired Contracts | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ApplicantsExpired">Expired</a></li>
			</ol>
			</nav>';
			$data['get_employee'] = $this->Model_Selects->getApplicant();
			$data['get_ApplicantExpired'] = $this->Model_Selects->getApplicantExpired();
			$data['getClientOption'] = $this->Model_Selects->getClientOption();
			$this->load->view('users/u_applicantexpired',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function V_Archived()
	{
		if($this->Model_Security->CheckPermissions('ApplicantsArchived')):
			$header['title'] = 'Archived | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Archived">Archived</a></li>
			</ol>
			</nav>';
			$data['get_employee'] = $this->Model_Selects->getApplicant();
			$data['get_ApplicantExpired'] = $this->Model_Selects->getApplicantExpired();
			$data['GetArchived'] = $this->Model_Selects->GetApplicantArchived();
			$data['getClientOption'] = $this->Model_Selects->getClientOption();
			$this->load->view('users/u_archived',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function V_Blacklisted()
	{
		if($this->Model_Security->CheckPermissions('ApplicantsBlacklisted')):
			$header['title'] = 'Blacklisted | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Blacklisted">Blacklisted</a></li>
			</ol>
			</nav>';
			$data['get_employee'] = $this->Model_Selects->getApplicant();
			$data['get_ApplicantExpired'] = $this->Model_Selects->getApplicantExpired();
			$data['GetBlacklisted'] = $this->Model_Selects->GetApplicantBlacklisted();
			$data['getClientOption'] = $this->Model_Selects->getClientOption();
			$this->load->view('users/u_blacklisted',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function Employee()
	{
		if($this->Model_Security->CheckPermissions('Employees')):
			$header['title'] = 'Employees | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Employees">Employees</a></li>
			</ol>
			</nav>';

			// WEEKLY INCREASE
			$CurrentDay = date('Y-m-d h:i:s A');
			$CurrentDayScope = date('Y-m-d h:i:s A', strtotime('-7 days', strtotime($CurrentDay)));
			$data['WeeklyEmployees'] = $this->Model_Selects->GetEmployeesIncrease($CurrentDay, $CurrentDayScope)->num_rows();

			$data['get_employee'] = $this->Model_Selects->GetEmployee();
			$data['get_ApplicantExpired'] = $this->Model_Selects->getApplicantExpired();
			$data['getClientOption'] = $this->Model_Selects->getClientOption();
			$data['GetTotalEmployees'] = $this->Model_Selects->GetTotalEmployees();
			$data['GetPermanentEmployees'] = $this->Model_Selects->GetPermanentEmployees();
			$this->load->view('users/u_users',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function EmployeePermanent()
	{
		if($this->Model_Security->CheckPermissions('EmployeesRegulars')):
			$header['title'] = 'Regular Employees | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="' . base_url() . 'Employees">Employees</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="' . base_url() . 'Employees/Regulars">Regulars</a></li>
			</ol>
			</nav>';

			// WEEKLY INCREASE
			$CurrentDay = date('Y-m-d h:i:s A');
			$CurrentDayScope = date('Y-m-d h:i:s A', strtotime('-7 days', strtotime($CurrentDay)));
			$data['WeeklyEmployees'] = $this->Model_Selects->GetEmployeesIncrease($CurrentDay, $CurrentDayScope)->num_rows();

			$data['get_employee'] = $this->Model_Selects->GetEmployee();
			$data['get_ApplicantExpired'] = $this->Model_Selects->getApplicantExpired();
			$data['getClientOption'] = $this->Model_Selects->getClientOption();
			$data['GetTotalEmployees'] = $this->Model_Selects->GetTotalEmployees();
			$data['GetPermanentEmployees'] = $this->Model_Selects->GetPermanentEmployees();
			$this->load->view('users/u_userspermanent',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function ViewEmployee()
	{
		if($this->Model_Security->CheckPermissions('Employees')):
			if (isset($_GET['id'])) {

				$id = $_GET['id'];

				$header['title'] = 'Information | Wercher Solutions and Resources Workers Cooperative';
				$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

				$GetEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($id);

				if ($GetEmployeeDetails->num_rows() > 0) {
					$ged = $GetEmployeeDetails->row_array();
					$data = array(
						'ApplicantNo' => $ged['ApplicantNo'],
						'ApplicantImage' => $ged['ApplicantImage'],
						'EmployeeID' => $ged['EmployeeID'],
						'ApplicantID' => $ged['ApplicantID'],
						'PositionDesired' => $ged['PositionDesired'],
						'PositionGroup' => $ged['PositionGroup'],
						'SalaryExpected' => $ged['SalaryExpected'],
						'LastName' => $ged['LastName'],
						'FirstName' => $ged['FirstName'],
						'MiddleName' => $ged['MiddleName'],
						'Gender' => $ged['Gender'],
						'Age' => $ged['Age'],
						'Height' => $ged['Height'],
						'Weight' => $ged['Weight'],
						'Religion' => $ged['Religion'],
						'BirthDate' => $ged['BirthDate'],
						'BirthPlace' => $ged['BirthPlace'],
						'Citizenship' => $ged['Citizenship'],
						'CivilStatus' => $ged['CivilStatus'],
						'No_OfChildren' => $ged['No_OfChildren'],
						'Phone_No' => $ged['Phone_No'],
						'Address_Present' => $ged['Address_Present'],
						'Address_Provincial' => $ged['Address_Provincial'],
						'Address_Manila' => $ged['Address_Manila'],

						'SSS_No' => $ged['SSS_No'],
						'EffectiveDateCoverage' => $ged['EffectiveDateCoverage'],
						'ResidenceCertificateNo' => $ged['ResidenceCertificateNo'],
						'TIN' => $ged['TIN'],
						'HDMF' => $ged['HDMF'],
						'PhilHealth' => $ged['PhilHealth'],
						'ATM_No' => $ged['ATM_No'],

						'Status' => $ged['Status'],

						'ClientEmployed' => $ged['ClientEmployed'],
						'DateStarted' => $ged['DateStarted'],
						'DateEnds' => $ged['DateEnds'],
						'AppliedOn' => $ged['AppliedOn'],

						'SuspensionStarted' => $ged['SuspensionStarted'],
						'SuspensionEnds' => $ged['SuspensionEnds'],
						'SuspensionRemarks' => $ged['SuspensionRemarks'],
						'Suspended' => $ged['Suspended'],

						'ReminderDate' => $ged['ReminderDate'],
						'ReminderDateString' => $ged['ReminderDateString'],

						'NameExtension' => $ged['NameExtension'],
						'EmergencyPerson' => $ged['EmergencyPerson'],
						'EmergencyContact' => $ged['EmergencyContact'],
						'Referral' => $ged['Referral'],

					);
					if(!$this->Model_Security->CheckPermissions('Applicants') && $ged['Status'] == 'Applicant'):
						redirect('Forbidden');
					elseif(!$this->Model_Security->CheckPermissions('ApplicantsExpired') && $ged['Status'] == 'Expired'):
						redirect('Forbidden');
					elseif(!$this->Model_Security->CheckPermissions('ApplicantsBlacklisted') && $ged['Status'] == 'Blacklisted'):
						redirect('Forbidden');
					elseif(!$this->Model_Security->CheckPermissions('ApplicantsArchived') && $ged['Status'] == 'Deleted'):
						redirect('Forbidden');
					elseif(!$this->Model_Security->CheckPermissions('Employees') && $ged['Status'] == 'Employed'):
						redirect('Forbidden');
					elseif(!$this->Model_Security->CheckPermissions('EmployeesRegulars') && $ged['Status'] == 'Employed (Permanent)'):
						redirect('Forbidden');
					endif;
					$ApplicantID = $ged['ApplicantID'];
					$ClientID = $ged['ClientEmployed'];
					$data['GetAcadHistory'] = $this->Model_Selects->GetEmployeeAcadhis($ApplicantID);
					$data['employment_record'] = $this->Model_Selects->GetEmploymentDetails($ApplicantID);
					$data['Machine_Operatessss'] = $this->Model_Selects->Machine_Operatessss($ApplicantID);
					$data['get_employee'] = $this->Model_Selects->GetEmployee();
					$data['getClientOption'] = $this->Model_Selects->getClientOption();
					$data['ShowClients'] = $this->Model_Selects->GetClients();
					$data['GetContractHistory'] = $this->Model_Selects->GetContractHistory($ApplicantID);
					$data['GetPreviousContract'] = $this->Model_Selects->GetPreviousContract($ApplicantID);
					$data['GetViolations'] = $this->Model_Selects->GetViolations($ApplicantID);
					$data['GetDocuments'] = $this->Model_Selects->GetDocuments($ApplicantID, $ClientID);
					$data['GetDocumentsViolations'] = $this->Model_Selects->GetDocumentsViolations($ApplicantID, $ClientID);
					$data['GetDocumentsNotes'] = $this->Model_Selects->GetDocumentsNotes($ApplicantID);
					$data['GetEmployeeMatchingClient'] = $this->Model_Selects->GetEmployeeMatchingClient($ApplicantID);
					$breadcrumbFullName = $ged['LastName'] . ', ' . $ged['FirstName'] . ' ' . $ged['MiddleName'] . '.';

					// Name Handler
					$breadcrumbFullName = '';
					if ($ged['LastName']) {
						$breadcrumbFullName = $breadcrumbFullName . $ged['LastName'] . ', ';
					} else {
						$breadcrumbFullName = $breadcrumbFullName . '[No Last Name], ';
					}
					if ($ged['FirstName']) {
						$breadcrumbFullName = $breadcrumbFullName . $ged['FirstName'] . ' ';
					} else {
						$breadcrumbFullName = $breadcrumbFullName . '[No First Name] ';
					}
					if ($ged['MiddleName']) {
						$breadcrumbFullName = $breadcrumbFullName . $ged['MiddleName'][0] . '.';
					} else {
						$breadcrumbFullName = $breadcrumbFullName . '[No MI].';
					}
					if ($ged['NameExtension']) {
						$breadcrumbFullName = $breadcrumbFullName . ', ' . $ged['NameExtension'];
					}
					if (strlen($breadcrumbFullName) > 45) {
						$breadcrumbFullName = substr($breadcrumbFullName, 0, 45);
						$breadcrumbFullName = $breadcrumbFullName . '...';
					}
					if ($data['Status'] == 'Employed') {
						$data['Breadcrumb'] = '
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: transparent;">
						<li class="breadcrumb-item" aria-current="page"><a href="Employees">Employees</a></li>
						<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
						</ol>
						</nav>';
					} elseif ($data['Status'] == 'Employed (Permanent)') {
						$data['Breadcrumb'] = '
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: transparent;">
						<li class="breadcrumb-item" aria-current="page"><a href="Employees">Employees</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="Employees/Regulars">Regulars</a></li>
						<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
						</ol>
						</nav>';
					} elseif ($data['Status'] == 'Expired') {
						$data['Breadcrumb'] = '
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: transparent;">
						<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="ApplicantsExpired">Expired</a></li>
						<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
						</ol>
						</nav>';
					} elseif ($data['Status'] == 'Blacklisted') {
						$data['Breadcrumb'] = '
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: transparent;">
						<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="Blacklisted">Blacklisted</a></li>
						<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
						</ol>
						</nav>';
					} elseif ($data['Status'] == 'Deleted') {
						$data['Breadcrumb'] = '
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: transparent;">
						<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="Archived">Archived</a></li>
						<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
						</ol>
						</nav>';
					} else {
						$data['Breadcrumb'] = '
						<nav aria-label="breadcrumb">
						<ol class="breadcrumb" style="background-color: transparent;">
						<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
						<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
						</ol>
						</nav>';
					}
					$this->load->view('users/u_viewemployee',$data);
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
		else:
			redirect('Forbidden');
		endif;
	}
	public function PrintEmployee()
	{
		if (isset($_GET['id'])) {

			$id = $_GET['id'];

			$header['title'] = 'Print Employee | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

			$GetEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($id);

			if ($GetEmployeeDetails->num_rows() > 0) {
				$ged = $GetEmployeeDetails->row_array();
				$data = array(
					'ApplicantNo' => $ged['ApplicantNo'],
					'ApplicantImage' => $ged['ApplicantImage'],
					'EmployeeID' => $ged['EmployeeID'],
					'ApplicantID' => $ged['ApplicantID'],
					'PositionDesired' => $ged['PositionDesired'],
					'PositionGroup' => $ged['PositionGroup'],
					'SalaryExpected' => $ged['SalaryExpected'],
					'LastName' => $ged['LastName'],
					'FirstName' => $ged['FirstName'],
					'MiddleName' => $ged['MiddleName'],
					'Gender' => $ged['Gender'],
					'Age' => $ged['Age'],
					'Height' => $ged['Height'],
					'Weight' => $ged['Weight'],
					'Religion' => $ged['Religion'],
					'BirthDate' => $ged['BirthDate'],
					'BirthPlace' => $ged['BirthPlace'],
					'Citizenship' => $ged['Citizenship'],
					'CivilStatus' => $ged['CivilStatus'],
					'No_OfChildren' => $ged['No_OfChildren'],
					'Phone_No' => $ged['Phone_No'],
					'Address_Present' => $ged['Address_Present'],
					'Address_Provincial' => $ged['Address_Provincial'],
					'Address_Manila' => $ged['Address_Manila'],

					'SSS_No' => $ged['SSS_No'],
					'EffectiveDateCoverage' => $ged['EffectiveDateCoverage'],
					'ResidenceCertificateNo' => $ged['ResidenceCertificateNo'],
					'TIN' => $ged['TIN'],
					'HDMF' => $ged['HDMF'],
					'PhilHealth' => $ged['PhilHealth'],
					'ATM_No' => $ged['ATM_No'],

					'Status' => $ged['Status'],

					'ClientEmployed' => $ged['ClientEmployed'],
					'DateStarted' => $ged['DateStarted'],
					'DateEnds' => $ged['DateEnds'],
					'AppliedOn' => $ged['AppliedOn'],

					'SuspensionStarted' => $ged['SuspensionStarted'],
					'SuspensionEnds' => $ged['SuspensionEnds'],
					'SuspensionRemarks' => $ged['SuspensionRemarks'],
					'Suspended' => $ged['Suspended'],

					'ReminderDate' => $ged['ReminderDate'],
					'ReminderDateString' => $ged['ReminderDateString'],

					'NameExtension' => $ged['NameExtension'],
					'EmergencyPerson' => $ged['EmergencyPerson'],
					'EmergencyContact' => $ged['EmergencyContact'],
					'Referral' => $ged['Referral'],

				);
				if(!$this->Model_Security->CheckPermissions('Applicants') && $ged['Status'] == 'Applicant'):
					redirect('Forbidden');
				elseif(!$this->Model_Security->CheckPermissions('ApplicantsExpired') && $ged['Status'] == 'Expired'):
					redirect('Forbidden');
				elseif(!$this->Model_Security->CheckPermissions('ApplicantsBlacklisted') && $ged['Status'] == 'Blacklisted'):
					redirect('Forbidden');
				elseif(!$this->Model_Security->CheckPermissions('ApplicantsArchived') && $ged['Status'] == 'Deleted'):
					redirect('Forbidden');
				elseif(!$this->Model_Security->CheckPermissions('Employees') && $ged['Status'] == 'Employed'):
					redirect('Forbidden');
				elseif(!$this->Model_Security->CheckPermissions('EmployeesRegulars') && $ged['Status'] == 'Employed (Permanent)'):
					redirect('Forbidden');
				endif;
				$ApplicantID = $ged['ApplicantID'];
				$data['GetAcadHistory'] = $this->Model_Selects->GetEmployeeAcadhis($ApplicantID);
				$data['employment_record'] = $this->Model_Selects->GetEmploymentDetails($ApplicantID);
				$data['Machine_Operatessss'] = $this->Model_Selects->Machine_Operatessss($ApplicantID);
				$data['get_employee'] = $this->Model_Selects->GetEmployee();
				$data['getClientOption'] = $this->Model_Selects->getClientOption();
				$data['ShowClients'] = $this->Model_Selects->GetClients();
				$data['GetContractHistory'] = $this->Model_Selects->GetContractHistory($ApplicantID);
				$data['GetEmployeeMatchingClient'] = $this->Model_Selects->GetEmployeeMatchingClient($ApplicantID);
				// Name Handler
				$breadcrumbFullName = '';
				if ($ged['LastName']) {
					$breadcrumbFullName = $breadcrumbFullName . $ged['LastName'] . ', ';
				} else {
					$breadcrumbFullName = $breadcrumbFullName . '[No Last Name], ';
				}
				if ($ged['FirstName']) {
					$breadcrumbFullName = $breadcrumbFullName . $ged['FirstName'] . ' ';
				} else {
					$breadcrumbFullName = $breadcrumbFullName . '[No First Name] ';
				}
				if ($ged['MiddleName']) {
					$breadcrumbFullName = $breadcrumbFullName . $ged['MiddleName'][0] . '.';
				} else {
					$breadcrumbFullName = $breadcrumbFullName . '[No MI].';
				}
				if ($ged['NameExtension']) {
					$breadcrumbFullName = $breadcrumbFullName . ', ' . $ged['NameExtension'];
				}
				if (strlen($breadcrumbFullName) > 45) {
					$breadcrumbFullName = substr($breadcrumbFullName, 0, 45);
					$breadcrumbFullName = $breadcrumbFullName . '...';
				}
				if ($data['Status'] == 'Employed') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Employees">Employees</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="PrintEmployee?id=' . $ApplicantID .'">Print</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Employed (Permanent)') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Employees">Employees</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="Employees/Regulars">Regulars</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="PrintEmployee?id=' . $ApplicantID .'">Print</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Expired') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ApplicantsExpired">Expired</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="PrintEmployee?id=' . $ApplicantID .'">Print</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Blacklisted') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="Blacklisted">Blacklisted</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="PrintEmployee?id=' . $ApplicantID .'">Print</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Deleted') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="Archived">Archived</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="PrintEmployee?id=' . $ApplicantID .'">Print</a></li>
					</ol>
					</nav>';
				} else {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="PrintEmployee?id=' . $ApplicantID .'">Print</a></li>
					</ol>
					</nav>';
				}
				$this->load->view('users/u_printemployee',$data);
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
	public function SSS_Table()
	{
		if($this->Model_Security->CheckPermissions('Payroll')):
			$header['title'] = 'SSS Table | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Applicants">SSS Table</a></li>
			</ol>
			</nav>';
			$latestBatch = 0;
			$createdDate = 'N/A';
			$GetSSSLatestBatch = $this->Model_Selects->GetSSSLatestBatch();
			if($GetSSSLatestBatch->num_rows() > 0) {
				foreach($GetSSSLatestBatch->result_array() as $row) {
					$latestBatch = $row['Batch'];
					$createdDate = $row['DateAdded'];
				}
			}
			$data['latestBatch'] = $latestBatch;
			$data['createdDate'] = $createdDate;
			$data['GetSSSBatchRows'] = $this->Model_Selects->GetSSSBatchRows($latestBatch);
			$this->load->view('payroll/p_sssPage',$data);
		else:
			redirect('Forbidden');
		endif;

	}
	public function ModifyEmployee()
	{
		if (isset($_GET['id'])) {

			$id = $_GET['id'];

			$header['title'] = 'Modify | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

			$GetEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($id);

			if ($GetEmployeeDetails->num_rows() > 0) {
				$ged = $GetEmployeeDetails->row_array();
				$data = array(
					'ApplicantNo' => $ged['ApplicantNo'],
					'ApplicantImage' => $ged['ApplicantImage'],
					'ApplicantID' => $ged['ApplicantID'],
					'EmployeeID' => $ged['EmployeeID'],
					'PositionDesired' => $ged['PositionDesired'],
					'PositionGroup' => $ged['PositionGroup'],
					'SalaryExpected' => $ged['SalaryExpected'],
					'LastName' => $ged['LastName'],
					'FirstName' => $ged['FirstName'],
					'MiddleName' => $ged['MiddleName'],
					'Gender' => $ged['Gender'],
					'Age' => $ged['Age'],
					'Height' => $ged['Height'],
					'Weight' => $ged['Weight'],
					'Religion' => $ged['Religion'],
					'BirthDate' => $ged['BirthDate'],
					'BirthPlace' => $ged['BirthPlace'],
					'Citizenship' => $ged['Citizenship'],
					'CivilStatus' => $ged['CivilStatus'],
					'No_OfChildren' => $ged['No_OfChildren'],
					'Phone_No' => $ged['Phone_No'],
					'Address_Present' => $ged['Address_Present'],
					'Address_Provincial' => $ged['Address_Provincial'],
					'Address_Manila' => $ged['Address_Manila'],

					'SSS_No' => $ged['SSS_No'],
					'EffectiveDateCoverage' => $ged['EffectiveDateCoverage'],
					'ResidenceCertificateNo' => $ged['ResidenceCertificateNo'],
					'TIN' => $ged['TIN'],
					'HDMF' => $ged['HDMF'],
					'PhilHealth' => $ged['PhilHealth'],
					'ATM_No' => $ged['ATM_No'],

					'Status' => $ged['Status'],

					'ClientEmployed' => $ged['ClientEmployed'],
					'DateStarted' => $ged['DateStarted'],
					'DateEnds' => $ged['DateEnds'],
					'AppliedOn' => $ged['AppliedOn'],

					'NameExtension' => $ged['NameExtension'],
					'EmergencyPerson' => $ged['EmergencyPerson'],
					'EmergencyContact' => $ged['EmergencyContact'],
					'Referral' => $ged['Referral'],

				);
				if(!$this->Model_Security->CheckPermissions('ApplicantsEditing') && ($ged['Status'] == 'Applicant' || $ged['Status'] == 'Expired' || $ged['Status'] == 'Blacklisted' || $ged['Status'] == 'Deleted')):
					redirect('Forbidden');
				elseif(!$this->Model_Security->CheckPermissions('EmployeesEditing') && ($ged['Status'] == 'Employed' || $ged['Status'] == 'Employed (Permanent)')):
					redirect('Forbidden');
				endif;
				$ApplicantID = $ged['ApplicantID'];
				$data['GetAcadHistory'] = $this->Model_Selects->GetEmployeeAcadhis($ApplicantID);
				$data['employment_record'] = $this->Model_Selects->GetEmploymentDetails($ApplicantID);
				$data['Machine_Operatessss'] = $this->Model_Selects->Machine_Operatessss($ApplicantID);
				$data['get_employee'] = $this->Model_Selects->GetEmployee();
				$data['getClientOption'] = $this->Model_Selects->getClientOption();
				$data['ShowClients'] = $this->Model_Selects->GetClients();
				$data['GetContractHistory'] = $this->Model_Selects->GetContractHistory($ApplicantID);
				// Name Handler
				$breadcrumbFullName = '';
				if ($ged['LastName']) {
					$breadcrumbFullName = $breadcrumbFullName . $ged['LastName'] . ', ';
				} else {
					$breadcrumbFullName = $breadcrumbFullName . '[No Last Name], ';
				}
				if ($ged['FirstName']) {
					$breadcrumbFullName = $breadcrumbFullName . $ged['FirstName'] . ' ';
				} else {
					$breadcrumbFullName = $breadcrumbFullName . '[No First Name] ';
				}
				if ($ged['MiddleName']) {
					$breadcrumbFullName = $breadcrumbFullName . $ged['MiddleName'][0] . '.';
				} else {
					$breadcrumbFullName = $breadcrumbFullName . '[No MI].';
				}
				if ($ged['NameExtension']) {
					$breadcrumbFullName = $breadcrumbFullName . ', ' . $ged['NameExtension'];
				}
				if (strlen($breadcrumbFullName) > 45) {
					$breadcrumbFullName = substr($breadcrumbFullName, 0, 45);
					$breadcrumbFullName = $breadcrumbFullName . '...';
				}
				if ($data['Status'] == 'Employed') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Employees">Employees</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="">Edit</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Employed (Permanent)') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Employees">Employees</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="Employees/Regulars">Regulars</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="">Edit</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Expired') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ApplicantsExpired">Expired</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="">Edit</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Blacklisted') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="Blacklisted">Blacklisted</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="">Edit</a></li>
					</ol>
					</nav>';
				} elseif ($data['Status'] == 'Deleted') {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="Archived">Archived</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="">Edit</a></li>
					</ol>
					</nav>';
				} else {
					$data['Breadcrumb'] = '
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background-color: transparent;">
					<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="ViewEmployee?id=' . $ApplicantID .'">' . $breadcrumbFullName . '</a></li>
					<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="">Edit</a></li>
					</ol>
					</nav>';
				}
				$this->load->view('users/u_modifyemployee',$data);
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
	public function GenerateIDCard()
	{
		if (isset($_GET['id'])) {

			$id = $_GET['id'];

			$header['title'] = 'Generate ID Card | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

			$GetEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($id);

			if ($GetEmployeeDetails->num_rows() > 0) {
				$ged = $GetEmployeeDetails->row_array();
				$data = array(
					'ApplicantNo' => $ged['ApplicantNo'],
					'ApplicantImage' => $ged['ApplicantImage'],
					'EmployeeID' => $ged['EmployeeID'],
					'ApplicantID' => $ged['ApplicantID'],
					'PositionDesired' => $ged['PositionDesired'],
					'PositionGroup' => $ged['PositionGroup'],
					'SalaryExpected' => $ged['SalaryExpected'],
					'LastName' => $ged['LastName'],
					'FirstName' => $ged['FirstName'],
					'MiddleName' => $ged['MiddleName'],
					'Gender' => $ged['Gender'],
					'Age' => $ged['Age'],
					'Height' => $ged['Height'],
					'Weight' => $ged['Weight'],
					'Religion' => $ged['Religion'],
					'BirthDate' => $ged['BirthDate'],
					'BirthPlace' => $ged['BirthPlace'],
					'Citizenship' => $ged['Citizenship'],
					'CivilStatus' => $ged['CivilStatus'],
					'No_OfChildren' => $ged['No_OfChildren'],
					'Phone_No' => $ged['Phone_No'],
					'Address_Present' => $ged['Address_Present'],
					'Address_Provincial' => $ged['Address_Provincial'],
					'Address_Manila' => $ged['Address_Manila'],

					'SSS_No' => $ged['SSS_No'],
					'EffectiveDateCoverage' => $ged['EffectiveDateCoverage'],
					'ResidenceCertificateNo' => $ged['ResidenceCertificateNo'],
					'TIN' => $ged['TIN'],
					'HDMF' => $ged['HDMF'],
					'PhilHealth' => $ged['PhilHealth'],
					'ATM_No' => $ged['ATM_No'],

					'Status' => $ged['Status'],

					'ClientEmployed' => $ged['ClientEmployed'],
					'DateStarted' => $ged['DateStarted'],
					'DateEnds' => $ged['DateEnds'],
					'AppliedOn' => $ged['AppliedOn'],

					'ReminderDate' => $ged['ReminderDate'],
					'ReminderDateString' => $ged['ReminderDateString'],

					'NameExtension' => $ged['NameExtension'],
					'EmergencyPerson' => $ged['EmergencyPerson'],
					'EmergencyContact' => $ged['EmergencyContact'],
					'Referral' => $ged['Referral'],

				);
				if(!$this->Model_Security->CheckPermissions('Applicants') && ($ged['Status'] == 'Applicant' || $ged['Status'] == 'Expired' || $ged['Status'] == 'Blacklisted' || $ged['Status'] == 'Deleted')):
					redirect('Forbidden');
				elseif(!$this->Model_Security->CheckPermissions('Employees') && ($ged['Status'] == 'Employed' || $ged['Status'] == 'Employed (Permanent)')):
					redirect('Forbidden');
				endif;
				$ApplicantID = $ged['ApplicantID'];
				if ($data['Status'] == 'Employed' || $data['Status'] == 'Employed (Permanent)') {
					$this->load->view('users/u_generateid',$data);
				} else {
					redirect('Employees');
				}
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
	public function NewEmployee()
	{
		if($this->Model_Security->CheckPermissions('ApplicantsEditing')):
			$header['title'] = 'New Employee | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Applicants">Applicants</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="NewEmployee">New</a></li>
			</ol>
			</nav>';
			$this->load->view('users/u_addemployee',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function View_Admins()
	{
		if($this->Model_Security->CheckPermissions('Admins')):
			$header['title'] = 'Administrators | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Admins">Admins</a></li>
			</ol>
			</nav>';
			$data['ShowAdmin'] = $this->Model_Selects->GetAdmin();
			$this->load->view('users/u_admins',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function AdminsArchived()
	{
		if($this->Model_Security->CheckPermissions('AdminsArchived')):
			$header['title'] = 'Admin Archived | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Admins">Admins</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="AdminsArchived">Archived</a></li>
			</ol>
			</nav>';
			$data['ShowAdmin'] = $this->Model_Selects->GetAdminArchived();
			$this->load->view('users/u_adminsarchived',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function Clients()
	{
		if($this->Model_Security->CheckPermissions('Clients')):
			$header['title'] = 'Clients | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Clients">Clients</a></li>
			</ol>
			</nav>';
			$data['ShowClients'] = $this->Model_Selects->GetClients();
			$this->load->view('users/u_clients',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function ClientsArchived()
	{
		if($this->Model_Security->CheckPermissions('ClientsArchived')):
			$header['title'] = 'Clients Archived | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Clients">Clients</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ClientsArchived">Archived</a></li>
			</ol>
			</nav>';
			$data['ShowClients'] = $this->Model_Selects->GetClientsArchived();
			$this->load->view('users/u_clientsarchived',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function PayrollClients()
	{
		if($this->Model_Security->CheckPermissions('Payroll')):
			$header['title'] = 'Clients | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Payroll">Payroll</a></li>
			</ol>
			</nav>';
			$data['ShowClients'] = $this->Model_Selects->GetClients();
			$data['GetLogbookLatestHires'] =  $this->Model_Selects->GetLogbookLatestHires();
			$this->load->view('payroll/p_clients',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function ViewPayroll()
	{
		if($this->Model_Security->CheckPermissions('Payroll')):
			$id = $_GET['id'];
			$mode = $_GET['mode'];

			$header['title'] = 'Payroll | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

			$GetWeeklyList = $this->Model_Selects->GetWeeklyList($id, $mode);

			$row = $GetWeeklyList->row_array();
			$data = array(
				'ClientID' => $row['ClientID'],
				'ApplicantID' => $row['ApplicantID'],

			);
			$ApplicantID = $row['ApplicantID'];
			$data['GetWeeklyListEmployee'] = $this->Model_Selects->GetWeeklyListEmployee($id);
			
			$data['get_applicantContri'] = $this->Model_Selects->get_applicantContri($id);
			


			$data['IsFromExcel'] = False;
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Payroll">Payroll</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewClient?id=' . $id . '&mode=' . $mode . '">Details</a></li>
			</ol>
			</nav>';

			// $data['ShowClients'] = $this->Model_Selects->GetClients();
			$data['GetLogbookLatestHires'] =  $this->Model_Selects->GetLogbookLatestHires();
			$data["Mode"]=$_GET['mode'];
			$data["ClientID"] = $_GET['id'];
			$this->load->view('payroll/p_payrolls',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function ViewClient()
	{
		if($this->Model_Security->CheckPermissions('Payroll')):
			if (isset($_GET['id'])) {

				$id = $_GET['id'];
				$ClientID = $_GET['id'];
				$mode = $_GET['mode'];

				$header['title'] = 'Attendance | Wercher Solutions and Resources Workers Cooperative';
				$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

				if ($id == 'excel') {
					// print_r($ApplicantsArray);
					$ApplicantsArray = $this->session->userdata('ApplicantsArray');
					$ApplicantsArray = unserialize($ApplicantsArray);
					$GetWeeklyList = $this->Model_Selects->GetWeeklyImports($ApplicantsArray);
					$data['GetWeeklyList'] = $this->Model_Selects->GetWeeklyImports($ApplicantsArray);
				} else {
					$GetWeeklyList = $this->Model_Selects->GetWeeklyList($id,$mode);
					$data['GetWeeklyList'] = $this->Model_Selects->GetWeeklyList($ClientID,$mode);
				}

				$row = $GetWeeklyList->row_array();
				$data = array(
					'ClientID' => $row['ClientID'],
					'ApplicantID' => $row['ApplicantID'],
				);

				$ApplicantID = $row['ApplicantID'];

				

				if ($id == 'excel') {
					$data['GetWeeklyListEmployee'] = $this->Model_Selects->GetWeeklyListEmployeeFromImports($ApplicantsArray);
				} else {
					$data['GetWeeklyListEmployee'] = $this->Model_Selects->GetWeeklyListEmployee($id);
				}
				// $data['GetWeeklyListEmployeeActive'] = $this->Model_Selects->GetWeeklyListEmployeeActive($id);
				$data['GetClientID'] = $this->Model_Selects->GetClientID($id);
				$data['GetWeeklyDates'] = $this->Model_Selects->GetWeeklyDates();
				// $data['GetWeeklyDatesForEmployee'] = $this->Model_Selects->GetWeeklyDatesForEmployee($row['ApplicantID']);
				$data['IsFromExcel'] = False;
				$data['Breadcrumb'] = '
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb" style="background-color: transparent;">
				<li class="breadcrumb-item" aria-current="page"><a href="Payroll">Payroll</a></li>
				<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="ViewClient?id=' . $id . '&mode=' . $mode . '">Details</a></li>
				</ol>
				</nav>';
				$data["Mode"]=$_GET['mode'];
				$data["ClientID"] = $_GET['id'];
				$this->load->view('payroll/p_viewclient',$data);
			}
			else
			{
				redirect('Clients');
			}
		else:
			redirect('Forbidden');
		endif;
	}
	public function ExcelImportSuccessful()
	{
		if($this->Model_Security->CheckPermissions('Payroll')):
			$header['title'] = 'Client Information | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a href="Payroll">Payroll</a></li>
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active">Details</a></li>
			</ol>
			</nav>';
			$this->load->view('payroll/p_excelimportsuccessful',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function Experimental()
	{
		$header['title'] = 'Experimental | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['Breadcrumb'] = '
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="background-color: transparent;">
		<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Experimental">Experimental</a></li>
		</ol>
		</nav>';
		$this->load->library('SimpleXLSX');
		$this->load->view('users/u_experimental',$data);
	}

	// ACADEMIC HISTORY
	public function showAcad()
	{

		if (isset($_SESSION['acadcart'])) {
			echo '<hr>';
			echo '<h6 class="ml-2"><i class="fas fa-save"></i> New Record</h6>';
			echo '<table class="table table-bordered">
			<thead>
			<th>Level</th>
			<th>School Name</th>
			<th>School Address
			<th>From Year</th>
			<th>To Year</th>
			<th>Highest Degree / Certificate Attained</th>
			<th>Action</th>
			</thead>
			<tbody>';
			foreach ($_SESSION['acadcart'] as $s_da) {
				echo '
				<tr>
				<td>
				'.$s_da['acadcart']['SchoolLevel'] .'
				</td>
				<td>
				'.$s_da['acadcart']['SchoolName'] .'
				</td>
				<td>
				'.$s_da['acadcart']['SchoolAddress'] .'
				</td>
				<td>
				'.$s_da['acadcart']['FromYearSchool'] .'
				</td>
				<td>
				'.$s_da['acadcart']['ToYearSchool'] .'
				</td>
				<td>
				'.$s_da['acadcart']['H_Attained'] .'
				</td>
				<td>
				<button id="'.$s_da['acadcart']['c_id'].'" class="remoach btn btn-sm btn-danger" type="button"><i class="fas fa-times"></i> Discard</button>
				</td>
				</tr>
				';
			}
			echo '</tbody>
			</table>
			<hr>';
		}
		echo '<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#acadFields"><i class="fas fa-plus"></i> Add Data</button>';
	}
	public function add_to_cart()
	{
		$min=10000000;
		$max=99999999;
		$rint = random_int($min,$max);

		$SchoolLevel = $_POST["SchoolLevel"];
		$SchoolName = $_POST["SchoolName"];
		$SchoolAddress = $_POST["SchoolAddress"];
		$FromYearSchool = $_POST["FromYearSchool"];
		$ToYearSchool = $_POST["ToYearSchool"];
		$H_Attained = $_POST["H_Attained"];
		if ($SchoolLevel == NULL || $SchoolName == NULL || $FromYearSchool == NULL || $ToYearSchool == NULL || $SchoolAddress == NULL || $H_Attained == NULL) {
			echo "Error";
		}
		else
		{
			foreach ($_SESSION["acadcart"] as $s_da => $row) {
				if ($row['acadcart']['c_id'] == $rint) {
					exit();
				}
			}
			if (!isset($_SESSION ['acadcart'] )) {
				$_SESSION ['acadcart'] = array ();
			}
			$data['acadcart'] = array(
				'c_id' => $rint,
				'SchoolLevel' => $SchoolLevel,
				'SchoolName' => $SchoolName,
				'SchoolAddress' => $SchoolAddress,
				'FromYearSchool' => $FromYearSchool,
				'ToYearSchool' => $ToYearSchool,
				'H_Attained' => $H_Attained,
			);
			$_SESSION['acadcart'][] = $data;
		}
	}
	public function removeAcad()
	{
		foreach ($_SESSION["acadcart"] as $s_da => $row) {
			if ($row['acadcart']['c_id'] == $_POST['row_id']) {
				unset($_SESSION["acadcart"][$s_da]);
				if(empty($_SESSION["acadcart"]))
					unset($_SESSION["acadcart"]);
			}
		}
	}
	// EMPLOYMENT RECORD
	public function add_toemp()
	{
		$min=10000000;
		$max=99999999;
		$rint = random_int($min,$max);

		$EmployeerName = $_POST["EmployeerName"];
		$emAddress = $_POST["emAddress"];
		$PeriodCovered = $_POST["PeriodCovered"];
		$Position = $_POST["Position"];
		$Salary = $_POST["Salary"];
		$cos = $_POST["cos"];
		if ($EmployeerName == NULL || $emAddress == NULL || $PeriodCovered == NULL || $Position == NULL || $Salary == NULL || $cos == NULL) {
			echo "Error";
		}
		else
		{
			foreach ($_SESSION["emp_cart"] as $s_da => $row) {
				if ($row['emp_cart']['emp_id'] == $rint) {
					exit();
				}
			}
			if (!isset($_SESSION ['emp_cart'] )) {
				$_SESSION ['emp_cart'] = array ();
			}
			$data['emp_cart'] = array(
				'emp_id' => $rint,
				'EmployeerName' => $EmployeerName,
				'emAddress' => $emAddress,
				'PeriodCovered' => $PeriodCovered,
				'Position' => $Position,
				'Salary' => $Salary,
				'cos' => $cos,
			);
			$_SESSION['emp_cart'][] = $data;
		}
	}
	public function showSkills()
	{

		if (isset($_SESSION['emp_cart'])) {
			echo '<hr>';
			echo '<h6 class="ml-2"><i class="fas fa-save"></i> New Record</h6>';
			echo '<table class="table table-bordered">
			<thead>
			<th>Name</th>
			<th>Address</th>
			<th>Period Covered</th>
			<th>Position</th>
			<th>Salary</th>
			<th>Cause of Seperation</th>

			<th>Action</th>
			</thead>
			<tbody>';
			foreach ($_SESSION['emp_cart'] as $s_da) {
				echo '
				<tr>
				<td>
				'.$s_da['emp_cart']['EmployeerName'] .'
				</td>
				<td>
				'.$s_da['emp_cart']['emAddress'] .'
				</td>
				<td>
				'.$s_da['emp_cart']['PeriodCovered'] .'
				</td>
				<td>
				'.$s_da['emp_cart']['Position'] .'
				</td>
				<td>
				'.$s_da['emp_cart']['Salary'] .'
				</td>
				<td>
				'.$s_da['emp_cart']['cos'] .'
				</td>
				<td>
				<button id="'.$s_da['emp_cart']['emp_id'].'" class="remoaemop btn btn-sm btn-danger" type="button"><i class="fas fa-times"></i> Discard</button>
				</td>
				</tr>
				';
			}
			echo '</tbody>
			</table>
			<hr>';
		}
		echo '<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#skillsFields"><i class="fas fa-plus"></i> Add Data</button>';
	}
	public function removeemp()
	{
		foreach ($_SESSION["emp_cart"] as $s_da => $row) {
			if ($row['emp_cart']['emp_id'] == $_POST['row_id']) {
				unset($_SESSION["emp_cart"][$s_da]);
				if(empty($_SESSION["emp_cart"]))
					unset($_SESSION["emp_cart"]);
			}
		}
	}
	// MACHINE OPERATED
	public function ShowMachineOperated()
	{

		if (isset($_SESSION['mach_cart'])) {
			echo '<hr>';
			echo '<h6 class="ml-2"><i class="fas fa-save"></i> New Record</h6>';
			echo '<table class="table table-bordered">
			<thead>
			<th>Machine Name</th>
			<th>Action</th>
			</thead>
			<tbody>';
			foreach ($_SESSION['mach_cart'] as $s_da) {
				echo '
				<tr>
				<td>
				'.$s_da['mach_cart']['MachineName'] .'
				</td>
				<td>
				<button id="'.$s_da['mach_cart']['MachID'].'" class="removemachine btn btn-sm btn-danger" type="button"><i class="fas fa-times"></i> Discard</button>
				</td>
				</tr>
				';
			}
			echo '</tbody>
			</table>
			<hr>';
		}
		echo '<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#Mach_Operated"><i class="fas fa-plus"></i> Add Data</button>';
	}
	public function Add_MachineOP()
	{
		$min=10000000;
		$max=99999999;
		$rint = random_int($min,$max);

		
		$MachineName = $_POST["MachineName"];
		if ($MachineName == NULL) {
			echo "Error";
		}
		else
		{
			foreach ($_SESSION["mach_cart"] as $s_da => $row) {
				if ($row['mach_cart']['emp_id'] == $rint) {
					exit();
				}
			}
			if (!isset($_SESSION ['mach_cart'] )) {
				$_SESSION ['mach_cart'] = array ();
			}
			$data['mach_cart'] = array(
				'MachID' => $rint,
				'MachineName' => $MachineName,
				
			);
			$_SESSION['mach_cart'][] = $data;
		}
	}
	public function remomanchine()
	{
		foreach ($_SESSION["mach_cart"] as $s_da => $row) {
			if ($row['mach_cart']['MachID'] == $_POST['row_id']) {
				unset($_SESSION["mach_cart"][$s_da]);
				if(empty($_SESSION["mach_cart"]))
					unset($_SESSION["mach_cart"]);
			}
		}
	}
	public function Search()
	{
		$header['title'] = 'Search | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['Breadcrumb'] = '
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="background-color: transparent;">
		<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Search">Search</a></li>
		</ol>
		</nav>';
		if(isset($_GET['query'])) {
			$query = $_GET['query'];
			$data['query'] = $query;
			$data['SearchApplicantID'] = $this->Model_Selects->SearchApplicantID($query);
			$data['SearchEmployeeID'] = $this->Model_Selects->SearchEmployeeID($query);
			$data['SearchPeople'] = $this->Model_Selects->SearchPeople($query);
			$data['SearchClients'] = $this->Model_Selects->SearchClients($query);
			$data['SearchPositionGroups'] = $this->Model_Selects->SearchPositionGroups($query);
			$data['SearchPositionSpecific'] = $this->Model_Selects->SearchPositionSpecific($query);
			$data['SearchAdmins'] = $this->Model_Selects->SearchAdmins($query);
		}
		$this->load->view('users/u_search',$data);
	}
	public function Logbook()
	{
		if ($this->Model_Security->CheckPermissions('DashboardLogbook')):
			$header['title'] = 'Logbook | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="Logbook">Logbook</a></li>
			</ol>
			</nav>';
			$LogbookDBCount = $this->db->count_all('logbook');
			$this->session->set_userdata('NotifCounterLogbook', $LogbookDBCount);
			$this->session->set_userdata('BellNotifCounter', $LogbookDBCount);
			$this->load->view('users/u_logbook',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	public function AJAX_showLogbookNotes()
	{
		$LogbookCount = $this->db->count_all('logbook');

		if (!empty($this->session->userdata['logbook_n'])) {
			$NotesLimitStart = $this->session->userdata['logbook_n'];
			if ($NotesLimitStart < 0) {
				$NotesLimitStart = 0;
			}
		} else {
			$NotesLimitStart = 0;
		}
		$NotesLimitEnd = $NotesLimitStart + 25;
		$GetLogbookNotes = $this->Model_Selects->GetLogbookNotes($NotesLimitStart, $NotesLimitEnd);
		$logbookIteration = 0;

		foreach ($GetLogbookNotes->result_array() as $row): 
			$logbookIteration++;
			$GetLogbookLogExtended = $this->Model_Selects->GetLogbookLogExtended($row['No']);
			echo '<div class="row logbook-log-container logbook-log logbook-log-toggle '; if ($GetLogbookLogExtended->num_rows() > 0): echo 'logbook-log-hover';endif; if($logbookIteration == 1) { echo ' logbook-log-notes-fade'; } echo '">';
				echo '<div class="col-sm-1">';
					$GetLogbookAdminImage = $this->Model_Selects->GetLogbookAdminImage($row['AdminID']);
					if ($GetLogbookAdminImage->num_rows() > 0 || !empty($row['Image'])): 
						foreach ($GetLogbookAdminImage->result_array() as $nrow):
							$AdminImage = $nrow['Image'];
						endforeach;
						echo '
							<div class="logbook-notes-admin-image text-center align-middle">
								<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="45px" height="45px" class="rounded-circle"></a>
							</div>
							';
					else:
						$AdminImage = base_url() . 'assets/img/wercher_logo.png';
						echo '
							<div class="logbook-notes-admin-image text-center align-middle">
								<a href="?user=' . $row['AdminID'] . '"><img src="' . $AdminImage . '" width="53px" height="46px" class="rounded-circle"></a>
							</div>
							';
					endif;
				echo '</div>';
				echo '<div class="col-sm-11">';
					echo '<div class="row">';
						echo '<div class="col-sm-12">';
							echo '<a href="?user=' . $row['AdminID'] . '" class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a>' . $row['Event'];
							echo '<span class="logbook-log-number" style="float: right; display: none;" value="' . $row['No'] . '">';
								echo '<i class="fas fa-paperclip" style="font-size: 13px;"></i>' . $row['No'];
							echo '</span>';
						echo '</div>';
						echo '<div class="col-sm-12">';
							echo '<div class="logbook-tooltip-date">';
									$date = new DateTime($row['Time']);
									$day = $date->format('Y-m-d');
									$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
									$hours = $date->format('h:i:s A');

									echo $day . ' at ' . $hours;
								if ($GetLogbookLogExtended->num_rows() > 0):
									echo '<span class="logbook-log-toggle" style="float: right;">
										<i class="fas fa-angle-right" style="margin-right: -1px;"></i>
									</span>';
								endif;
							echo '</div>
						</div>
					</div>
				</div>';
				if ($GetLogbookLogExtended->num_rows() > 0):
					$iteration = 0;
					foreach ($GetLogbookLogExtended->result_array() as $nrow):
						$iteration++;
						echo '<div class="col-sm-12">';
							echo '<div class="logbook-tooltip-extended" style="display: none;">';
								if ($iteration == $GetLogbookLogExtended->num_rows()):
									echo '<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree.png">';
								else:
									echo '<img class="logbook-tooltip-extended-tree" src="assets/img/documents-folder-tree-continuous.png">';
								endif;
								echo '<div class="logbook-tooltip-extended-text">';
									if($nrow['Type'] == 1):
										echo '<span class="logbook-tooltip-extended-note">Note:</span> ' . $nrow['EventTooltip'];
									else:
										echo $nrow['EventTooltip'];
									endif;
								echo '</div>
							</div>
						</div>';
					endforeach;
				endif;
			echo '</div>';
		endforeach;
	}
	public function AJAX_addLogbookNotes()
	{
		if (!empty($this->session->userdata['AdminID'])):
			$AdminID = $this->session->userdata['AdminID'];
		else:
			$AdminID = 'GUEST';
		endif;
		$Type = 1;
		$HookNo = $this->input->post('HookNo', TRUE);
		$LimitNotes = $this->input->post('LimitNotes', TRUE);
		$Event = $this->input->post('NotesEvent', TRUE);
		if ($LimitNotes == NULL || $AdminID == NULL || $Event == NULL) {
			echo "Error";
		}
		else
		{
			if (!empty($HookNo)) {
				$this->Model_Logbook->LogbookNotesExtendedEntry($HookNo, 1, $Event);
			} else {
				$this->Model_Logbook->LogbookEntry('Yellow', 'Note', ': ' . $Event);
			}
			$this->session->set_userdata('logbook_n', $LimitNotes);
		}
	}
	public function AJAX_checkLogbookNotifCounter()
	{
		$LogbookDBCount = $this->db->count_all('logbook');
		$LogbookNotifCounter = $this->session->userdata('NotifCounterLogbook');
		$Difference = $LogbookDBCount - $LogbookNotifCounter;
		if ($Difference > 0):
			echo '<a href="Logbook" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-html="true" title="Click to refresh" style="float: right;"><i class="fas fa-redo"></i> ' . $Difference . ' new entries</a>';
		else:
			echo '<a href="Logbook" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-html="true" title="Click to refresh" style="float: right;"><i class="fas fa-check"></i> Viewing latest entries</a>';
		endif;
	}
	public function AJAX_checkBellNotifCounter()
	{
		$DBCount = $this->db->count_all('logbook');
		$BellNotifCounter = $this->session->userdata('BellNotifCounter');
		$Difference = $DBCount - $BellNotifCounter;
		if ($Difference > 0):
			echo $Difference;
		else:
			echo '';
		endif;
	}
	public function AJAX_resetBellNotifCounter()
	{
		$DBCount = $this->db->count_all('logbook');
		$BellNotifCounter = $this->session->set_userdata('BellNotifCounter', $DBCount);
		echo ''; // Reset the bell counter
	}
	public function AJAX_removePayrollLoans()
	{
		$this->load->model('Model_Deletes');

		$ApplicantID = $this->input->post('ApplicantID');
		$LoansArray = json_decode($_POST['LoansArray']);
		if (count($LoansArray) > 0) {
			for($index = 0; $index < count($LoansArray); $index++) {
				$LoanID = $LoansArray[$index];
				if(is_numeric($LoanID)) {
					// Only numbers allowed
					$RemovePayrollLoans = $this->Model_Deletes->RemovePayrollLoans($ApplicantID, $LoanID);
				}
			}
		}
	}
	public function AJAX_showPayrollLoans()
	{
		$ApplicantID = $this->input->post('ApplicantID');
		$Year = $this->input->post('Year');
		$Month = $this->input->post('Month');
		$Week = $this->input->post('Week');
		$Mode = $this->input->post('Mode');
		$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $Year, $Month, $Week, $Mode);
		if ($ShowPayrollLoans->num_rows() > 0) {
			foreach($ShowPayrollLoans->result_array() as $row) {
				echo '
				<div class="form-row loan-input w-100">
					<input class="form-control loan-id" type="hidden" value="' . $row['ID'] . '">
					<div class="col-sm-7 mt-1">
						<input class="form-control loan-name" type="text" name="LoanName[]" value="' . $row['LoanName'] . '">
					</div>
					<div class="col-sm-4 mt-1">
						<input class="form-control loan-amount" type="number" name="LoanAmount[]" value="' . $row['Amount'] . '">
					</div>
					<div class="col-sm-1 mt-1">
						<button class="form-control loan-remove btn-secondary" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Remove?"><i class="fas fa-trash" style="font-size: 12px; margin-left: -5px;"></i></button>
					</div>
				</div>';
			}
		}
	}
	public function AJAX_insertPayrollLoans()
	{
		$ID = $this->input->post('ID');
		$ApplicantID = $this->input->post('ApplicantID');
		$LoanName = $this->input->post('LoanName');
		$Amount = $this->input->post('Amount');
		$Year = $this->input->post('Year');
		$Month = $this->input->post('Month');
		$Week = $this->input->post('Week');
		$Mode = $this->input->post('Mode');
		if ($ApplicantID == NULL || $LoanName == NULL || $Amount == NULL || $Year == NULL || $Month == NULL || $Week == NULL || $Mode == NULL) {
			echo "Error. Please refresh.";
		}
		else
		{
			$data = array(
				'ApplicantID' => $ApplicantID,
				'LoanName' => $LoanName,
				'Amount' => $Amount,
				'Year' => $Year,
				'Month' => $Month,
				'Week' => $Week,
				'Type' => $Mode,
			);
			if ($ID == -1 || $ID == NULL) {
				// Insert if new and doesn't exist
				$InsertPayrollLoans = $this->Model_Inserts->InsertPayrollLoans($data);
				if ($InsertPayrollLoans) {
					$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $Year, $Month, $Week, $Mode);
					if ($ShowPayrollLoans->num_rows() > 0) {
						foreach($ShowPayrollLoans->result_array() as $row) {
							echo '
							<div class="form-row loan-input w-100">
								<input class="form-control loan-id" type="hidden" value="' . $row['ID'] . '">
								<div class="col-sm-7 mt-1">
									<input class="form-control loan-name" type="text" name="LoanName[]" value="' . $row['LoanName'] . '">
								</div>
								<div class="col-sm-4 mt-1">
									<input class="form-control loan-amount" type="number" name="LoanAmount[]" value="' . $row['Amount'] . '">
								</div>
								<div class="col-sm-1 mt-1">
									<button class="form-control loan-remove btn-secondary" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Remove?"><i class="fas fa-trash" style="font-size: 12px; margin-left: -5px;"></i></button>
								</div>
							</div>';
						}
					}
				}
			} else {
				// Updates if the loan already exists
				$UpdatePayrollLoans = $this->Model_Inserts->UpdatePayrollLoans($ID, $data);
				if ($UpdatePayrollLoans) {
					$ShowPayrollLoans = $this->Model_Selects->ShowPayrollLoans($ApplicantID, $Year, $Month, $Week, $Mode);
					if ($ShowPayrollLoans->num_rows() > 0) {
						foreach($ShowPayrollLoans->result_array() as $row) {
							echo '
							<div class="form-row loan-input w-100">
								<input class="form-control loan-id" type="hidden" value="' . $row['ID'] . '">
								<div class="col-sm-7 mt-1">
									<input class="form-control loan-name" type="text" name="LoanName[]" value="' . $row['LoanName'] . '">
								</div>
								<div class="col-sm-4 mt-1">
									<input class="form-control loan-amount" type="number" name="LoanAmount[]" value="' . $row['Amount'] . '">
								</div>
								<div class="col-sm-1 mt-1">
									<button class="form-control loan-remove btn-secondary" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Remove?"><i class="fas fa-trash" style="font-size: 12px; margin-left: -5px;"></i></button>
								</div>
							</div>';
						}
					}
				}
			}
			
			
		}
	}
	public function AJAX_removePayrollProvisions()
	{
		$this->load->model('Model_Deletes');

		$ApplicantID = $this->input->post('ApplicantID');
		$ProvisionsArray = json_decode($_POST['ProvisionsArray']);
		if (count($ProvisionsArray) > 0) {
			for($index = 0; $index < count($ProvisionsArray); $index++) {
				$ProvisionID = $ProvisionArray[$index];
				if(is_numeric($ProvisionID)) {
					// Only numbers allowed
					$RemovePayrollProvisions = $this->Model_Deletes->RemovePayrollProvisions($ApplicantID, $ProvisionID);
				}
			}
		}
	}
	public function AJAX_showPayrollProvisions()
	{
		$ApplicantID = $this->input->post('ApplicantID');
		$Year = $this->input->post('Year');
		$Month = $this->input->post('Month');
		$Week = $this->input->post('Week');
		$Mode = $this->input->post('Mode');
		$ShowPayrollProvisions = $this->Model_Selects->ShowPayrollProvisions($ApplicantID, $Year, $Month, $Week, $Mode);
		if ($ShowPayrollProvisions->num_rows() > 0) {
			foreach($ShowPayrollProvisions->result_array() as $row) {
				echo '
				<div class="form-row provision-input w-100">
					<input class="form-control provision-id" type="hidden" value="' . $row['ID'] . '">
					<div class="col-sm-7 mt-1">
						<input class="form-control provision-name" type="text" name="ProvisionName[]" value="' . $row['ProvisionName'] . '">
					</div>
					<div class="col-sm-4 mt-1">
						<input class="form-control provision-amount" type="number" name="ProvisionAmount[]" value="' . $row['Amount'] . '">
					</div>
					<div class="col-sm-1 mt-1">
						<button class="form-control provision-remove btn-secondary" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Remove?"><i class="fas fa-trash" style="font-size: 12px; margin-left: -5px;"></i></button>
					</div>
				</div>';
			}
		}
	}
	public function AJAX_insertPayrollProvisions()
	{
		$ID = $this->input->post('ID');
		$ApplicantID = $this->input->post('ApplicantID');
		$ProvisionName = $this->input->post('ProvisionName');
		$Amount = $this->input->post('Amount');
		$Year = $this->input->post('Year');
		$Month = $this->input->post('Month');
		$Week = $this->input->post('Week');
		$Mode = $this->input->post('Mode');
		if ($ApplicantID == NULL || $ProvisionName == NULL || $Amount == NULL || $Year == NULL || $Month == NULL || $Week == NULL || $Mode == NULL) {
			echo "Error. Please refresh.";
		}
		else
		{
			$data = array(
				'ApplicantID' => $ApplicantID,
				'ProvisionName' => $ProvisionName,
				'Amount' => $Amount,
				'Year' => $Year,
				'Month' => $Month,
				'Week' => $Week,
				'Type' => $Mode,
			);
			if ($ID == -1 || $ID == NULL) {
				// Insert if new and doesn't exist
				$InsertPayrollProvisions = $this->Model_Inserts->InsertPayrollProvisions($data);
				if ($InsertPayrollProvisions) {
					$ShowPayrollProvisions = $this->Model_Selects->ShowPayrollProvisions($ApplicantID, $Year, $Month, $Week, $Mode);
					if ($ShowPayrollProvisions->num_rows() > 0) {
						foreach($ShowPayrollProvisions->result_array() as $row) {
							echo '
							<div class="form-row provision-input w-100">
								<input class="form-control provision-id" type="hidden" value="' . $row['ID'] . '">
								<div class="col-sm-7 mt-1">
									<input class="form-control provision-name" type="text" name="ProvisionName[]" value="' . $row['ProvisionName'] . '">
								</div>
								<div class="col-sm-4 mt-1">
									<input class="form-control provision-amount" type="number" name="ProvisionAmount[]" value="' . $row['Amount'] . '">
								</div>
								<div class="col-sm-1 mt-1">
									<button class="form-control provision-remove btn-secondary" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Remove?"><i class="fas fa-trash" style="font-size: 12px; margin-left: -5px;"></i></button>
								</div>
							</div>';
						}
					}
				}
			} else {
				// Updates if the provision already exists
				$UpdatePayrollProvisions = $this->Model_Inserts->UpdatePayrollProvisions($ID, $data);
				if ($UpdatePayrollProvisions) {
					$ShowPayrollProvisions = $this->Model_Selects->ShowPayrollProvisions($ApplicantID, $Year, $Month, $Week, $Mode);
					if ($ShowPayrollProvisions->num_rows() > 0) {
						foreach($ShowPayrollProvisions->result_array() as $row) {
							echo '
							<div class="form-row provision-input w-100">
								<input class="form-control provision-id" type="hidden" value="' . $row['ID'] . '">
								<div class="col-sm-7 mt-1">
									<input class="form-control provision-name" type="text" name="ProvisionName[]" value="' . $row['ProvisionName'] . '">
								</div>
								<div class="col-sm-4 mt-1">
									<input class="form-control provision-amount" type="number" name="ProvisionAmount[]" value="' . $row['Amount'] . '">
								</div>
								<div class="col-sm-1 mt-1">
									<button class="form-control provision-remove btn-secondary" type="button" data-toggle="tooltip" data-placement="top" data-html="true" title="Remove?"><i class="fas fa-trash" style="font-size: 12px; margin-left: -5px;"></i></button>
								</div>
							</div>';
						}
					}
				}
			}
			
			
		}
	}
	public function AJAX_checkPassword()
	{
		$AdminID = $this->input->post('AdminID');
		$Password = $this->input->post('CurrentPassword');
		if ($AdminID == NULL || $Password == NULL) {
			echo json_encode(false);
		}
		else
		{
			$CheckAdminCred = $this->Model_Selects->CheckAdminCred($AdminID);
			if ($CheckAdminCred->num_rows() > 0) {
				$row = $CheckAdminCred->row_array();
				if (password_verify($Password, $row['Password'])) {
					$this->session->set_flashdata('checkPasswordVerification', true);
					echo json_encode(true); // Returns true to the AJAX call
				}
				else
				{
					echo json_encode(false);
				}
			}
			else
			{
				echo 'Error. No admin found with specified ID.';
			}
		}
	}
	public function AJAX_showLatestAdminActivity()
	{
		$AdminID = $this->input->post('AdminID');
		$GetLogbookWithLimitSpecificID = $this->Model_Selects->GetLogbookWithLimitSpecificID(5, $AdminID);
		if ($GetLogbookWithLimitSpecificID->num_rows() > 0) {
			foreach($GetLogbookWithLimitSpecificID->result_array() as $row) {
				$date = new DateTime($row['Time']);
				$day = $date->format('Y-m-d');
				$day = DateTime::createFromFormat('Y-m-d', $day)->format('F d, Y');
				$hours = $date->format('h:i:s A');
				$icon = $row['Icon'];
				if ($icon == 'Applicant'):
					$iconText = '<i class="fas fa-user-tie" style="margin-right: -1px;"></i>';
				elseif ($icon == 'Employee'):
					$iconText = '<i class="fas fa-users" style="margin-right: -1px;"></i>';
				elseif ($icon == 'Admin'):
					$iconText = '<i class="fas fa-user-secret" style="margin-right: -1px;"></i>';
				elseif ($icon == 'Client'):
					$iconText = '<i class="fas fa-user-tag" style="margin-right: -1px;"></i>';
				elseif ($icon == 'Note'):
					$iconText = '<i class="fas fa-sticky-note" style="margin-right: -1px;"></i>';
				elseif ($icon == 'Salary'):
					$iconText = '<i class="fas fa-dollar-sign" style="margin-right: -1px;"></i>';
				else:
					$iconText = '<i class="fas fa-cog" style="margin-right: -1px;"></i>';
				endif;
				echo '
				<div class="row mt-2">
					<div class="col-sm-1 ml-1" style="margin-top: 5px;">
						' . $iconText . '
					</div>
					<div class="col-sm-10" style="margin-left: -20px;">
						<div class="row">
							<div class="col-sm-12">
								<a href="?admin=' . $row['AdminID'] . ' class="logbook-tooltip-highlight">' . $row['AdminID'] . '</a> ' . $row['Event'] . '
							</div>
							<div class="col-sm-12">
								<i style="color: gray;"> 
										' . $day . ' at ' . $hours . '
								</i>
							</div>
						</div>
					</div>
				</div>
				<hr>';
			}
		} else {
			echo '<div class="mt-2">No records found.</div>';
		}
	}
	public function AJAX_showLogbookDataForAdmin()
	{
		$AdminID = $this->input->post('AdminID');
		$CheckAdminID = $this->Model_Selects->CheckAdminID($AdminID);
		if ($CheckAdminID->num_rows() > 0) {
			$dataSet = [];
			$GetLogbookDataTotal = $this->Model_Selects->GetLogbookDataTotal($AdminID);
			array_push($dataSet, $GetLogbookDataTotal->num_rows());
			$GetLogbookDataApplicant = $this->Model_Selects->GetLogbookDataForAdmin($AdminID, 'Applicant');
			array_push($dataSet, ($GetLogbookDataApplicant->num_rows()));
			$GetLogbookDataEmployee = $this->Model_Selects->GetLogbookDataForAdmin($AdminID, 'Employee');
			array_push($dataSet, ($GetLogbookDataEmployee->num_rows()));
			$GetLogbookDataClient = $this->Model_Selects->GetLogbookDataForAdmin($AdminID, 'Client');
			array_push($dataSet, $GetLogbookDataClient->num_rows());
			$GetLogbookDataSalary = $this->Model_Selects->GetLogbookDataForAdmin($AdminID, 'Salary');
			array_push($dataSet, $GetLogbookDataSalary->num_rows());
			$GetLogbookDataAdmin = $this->Model_Selects->GetLogbookDataForAdmin($AdminID, 'Admin');
			array_push($dataSet, $GetLogbookDataAdmin->num_rows());
			$GetLogbookDataNote = $this->Model_Selects->GetLogbookDataForAdmin($AdminID, 'Note');
			array_push($dataSet, $GetLogbookDataNote->num_rows());

			echo json_encode($dataSet);
		} else {
			echo 'No admin found.';
		}
	}
	public function GeneratePayslip()
	{
		if ($this->Model_Security->CheckPermissions('Payroll')):
			$header['title'] = 'Generate Payslip | Wercher Solutions and Resources Workers Cooperative';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
			$data['Breadcrumb'] = '
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: transparent;">
			<li class="breadcrumb-item" aria-current="page"><a class="wercher-breadcrumb-active" href="GeneratePayslip">Generate Payslip</a></li>
			</ol>
			</nav>';
			$this->load->view('users/u_generatepayslip',$data);
		else:
			redirect('Forbidden');
		endif;
	}
	// // Relatives
	// public function ShowRelatives()
	// {
	// 	if (!isset($_SESSION['rela_cart'])) {
	// 		echo '<div class="pb-3"><h5><i class="fas fa-stream"></i> Relatives Empty</h5></div>';
	// 	}

	// 	if (isset($_SESSION['rela_cart'])) {
	// 		echo '<div class="p-3"><h5><i class="fas fa-stream"></i> Relatives </h5></div>';
	// 		echo '<table class="table table-bordered">
	// 		<thead>
	// 		<th>Relation</th>
	// 		<th>Name</th>
	// 		<th>Occupation</th>
	// 		<th>Action</th>
	// 		</thead>
	// 		<tbody>';
	// 		foreach ($_SESSION['rela_cart'] as $s_da) {
	// 			echo '
	// 			<tr>
	// 			<td>
	// 			'.$s_da['rela_cart']['Relation'] .'
	// 			</td>
	// 			<td>
	// 			'.$s_da['rela_cart']['rName'] .'
	// 			</td>
	// 			<td>
	// 			'.$s_da['rela_cart']['rOccupation'] .'
	// 			</td>
	// 			<td>
	// 			<button id="'.$s_da['rela_cart']['relaID'].'" class="removeRela btn-tr" type="button"><i class="fas fa-trash"></i></button>
	// 			</td>
	// 			</tr>
	// 			';
	// 		}
	// 		echo '</tbody>
	// 		</table>';
	// 	}
	// 	echo '<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#Relatives_Modal"><i class="fas fa-plus"></i> Add Data</button>';
	// }
	// public function Add_Relatives()
	// {
	// 	$min=10000000;
	// 	$max=99999999;
	// 	$rint = random_int($min,$max);

	// 	$Relation = $_POST["Relation"];
	// 	$rName = $_POST["rName"];
	// 	$rOccupation = $_POST["rOccupation"];

	// 	if ($Relation == NULL || $rName == NULL || $rOccupation == NULL) {
	// 		echo "Error";
	// 	}
	// 	else
	// 	{
	// 		foreach ($_SESSION["rela_cart"] as $s_da => $row) {
	// 			if ($row['rela_cart']['emp_id'] == $rint) {
	// 				exit();
	// 			}
	// 		}
	// 		if (!isset($_SESSION ['rela_cart'] )) {
	// 			$_SESSION ['rela_cart'] = array ();
	// 		}
	// 		$data['rela_cart'] = array(
	// 			'relaID' => $rint,
	// 			'Relation' => $Relation,
	// 			'rName' => $rName,
	// 			'rOccupation' => $rOccupation,

	// 		);
	// 		$_SESSION['rela_cart'][] = $data;
	// 	}
	// }
	// public function RemoveRelativs()
	// {
	// 	foreach ($_SESSION["rela_cart"] as $s_da => $row) {
	// 		if ($row['rela_cart']['relaID'] == $_POST['row_id']) {
	// 			unset($_SESSION["rela_cart"][$s_da]);
	// 			if(empty($_SESSION["rela_cart"]))
	// 				unset($_SESSION["rela_cart"]);
	// 		}
	// 	}
	// }
	// // BENIFICIARIES
	// public function ShowBene()
	// {
	// 	if (!isset($_SESSION['beneCart'])) {
	// 		echo '<div class="pb-3"><h5><i class="fas fa-stream"></i> Beneficiaries Empty</h5></div>';
	// 	}

	// 	if (isset($_SESSION['beneCart'])) {
	// 		echo '<div class="p-3"><h5><i class="fas fa-stream"></i> Beneficiaries </h5></div>';
	// 		echo '<table class="table table-bordered">
	// 		<thead>
	// 		<th>Name</th>
	// 		<th>Relationship</th>
	// 		<th>Action</th>
	// 		</thead>
	// 		<tbody>';
	// 		foreach ($_SESSION['beneCart'] as $s_da) {
	// 			echo '
	// 			<tr>
	// 			<td>
	// 			'.$s_da['beneCart']['BeneName'] .'
	// 			</td>
	// 			<td>
	// 			'.$s_da['beneCart']['BeneRelationship'] .'
	// 			</td>
	// 			<td>
	// 			<button id="'.$s_da['beneCart']['beneID'].'" class="removeBENEEE btn-tr" type="button"><i class="fas fa-trash"></i></button>
	// 			</td>
	// 			</tr>
	// 			';
	// 		}
	// 		echo '</tbody>
	// 		</table>';
	// 	}
	// 	echo '<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#Bene_Modal"><i class="fas fa-plus"></i> Add Data</button>';
	// }
	// public function Add_Bene()
	// {
	// 	$min=10000000;
	// 	$max=99999999;
	// 	$rint = random_int($min,$max);

	// 	$bName = $_POST["bName"];
	// 	$bRelationship = $_POST["bRelationship"];

	// 	if ($bName == NULL || $bRelationship == NULL) {
	// 		echo "Error";
	// 	}
	// 	else
	// 	{
	// 		foreach ($_SESSION["beneCart"] as $s_da => $row) {
	// 			if ($row['beneCart']['beneID'] == $rint) {
	// 				exit();
	// 			}
	// 		}
	// 		if (!isset($_SESSION ['beneCart'] )) {
	// 			$_SESSION ['beneCart'] = array ();
	// 		}
	// 		$data['beneCart'] = array(
	// 			'beneID' => $rint,
	// 			'BeneName' => $bName,
	// 			'BeneRelationship' => $bRelationship,

	// 		);
	// 		$_SESSION['beneCart'][] = $data;
	// 	}
	// }
	// public function RemoveBene()
	// {
	// 	foreach ($_SESSION["beneCart"] as $s_da => $row) {
	// 		if ($row['beneCart']['beneID'] == $_POST['row_id']) {
	// 			unset($_SESSION["beneCart"][$s_da]);
	// 			if(empty($_SESSION["beneCart"]))
	// 				unset($_SESSION["beneCart"]);
	// 		}
	// 	}
	// }

	public function Logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
