<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Selects');
	}
	public function index()
	{
		$this->session->unset_userdata('acadcart');
		$this->load->view('Login');
	}
	public function Dashboard()
	{
		$this->session->unset_userdata('acadcart');
		$header['title'] = 'Dashboard | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		// GET ADMIN COUNT
		$data['C_Admin'] = $this->Model_Selects->GetAdmin();
		$this->load->view('users/u_dashboard',$data);
	}
	
	public function V_Applicants()
	{
		$this->session->unset_userdata('acadcart');
		$header['title'] = 'Applicants | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['get_employee'] = $this->Model_Selects->getApplicant();
		$this->load->view('users/u_applicant',$data);
	}
	public function Employee()
	{
		$this->session->unset_userdata('acadcart');
		$header['title'] = 'Employees | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['get_employee'] = $this->Model_Selects->GetEmployee();
		$this->load->view('users/u_users',$data);
	}
	public function ViewEmployee()
	{
		if (isset($_GET['id'])) {

			$this->session->unset_userdata('acadcart');

			$id = $_GET['id'];

			$header['title'] = 'Information';
			$data['T_Header'] = $this->load->view('_template/users/u_header',$header);

			$GetEmployeeDetails = $this->Model_Selects->GetEmployeeDetails($id);

			if ($GetEmployeeDetails->num_rows() > 0) {
				$ged = $GetEmployeeDetails->row_array();
				$data = array(
					'ApplicantImage' => $ged['ApplicantImage'],
					'ApplicantID' => $ged['ApplicantID'],
					'PositionDesired' => $ged['PositionDesired'],
					'SalaryExpected' => $ged['SalaryExpected'],
					'LastName' => $ged['LastName'],
					'FirstName' => $ged['FirstName'],
					'MiddleInitial' => $ged['MiddleInitial'],
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
					'Rcn_At' => $ged['Rcn_At'],
					'Rcn_On' => $ged['Rcn_On'],
					'TIN' => $ged['TIN'],
					'TIN_At' => $ged['TIN_At'],
					'TIN_On' => $ged['TIN_On'],
					'Status' => $ged['Status'],

				);
				$data['GetAcadHistory'] = $this->Model_Selects->GetEmployeeAcadhis();
				$this->load->view('users/u_viewemployee',$data);
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
	public function NewEmployee()
	{
		$header['title'] = 'New Employee | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$this->load->view('users/u_addemployee',$data);
	}
	public function View_Admins()
	{
		$header['title'] = 'Administrator | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['ShowAdmin'] = $this->Model_Selects->GetAdmin();
		$this->load->view('users/u_admins',$data);
	}
	public function showAcad()
	{
		if (!isset($_SESSION['acadcart'])) {
			echo '<div class="pb-3"><h5><i class="fas fa-stream"></i> Academic History Empty</h5></div>';
		}

		if (isset($_SESSION['acadcart'])) {
			echo '<div class="pb-3"><h5><i class="fas fa-stream"></i> Academic History</h5></div>';
			echo '<table class="table table-bordered">
			<thead>
			<th>School Level</th>
			<th>School Name</th>
			<th>From</th>
			<th>To</th>
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
				'.$s_da['acadcart']['FromYearSchool'] .'
				</td>
				<td>
				'.$s_da['acadcart']['ToYearSchool'] .'
				</td>
				<td>
				'.$s_da['acadcart']['H_Attained'] .'
				</td>
				<td>
				<button id="'.$s_da['acadcart']['c_id'].'" class="remoach btn-tr" type="button"><i class="fas fa-trash"></i></button>
				</td>
				</tr>
				';
			}
			echo '</tbody>
			</table>';
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

	public function showSkills()
	{
		if (!isset($_SESSION['skillscart'])) {
			echo '<div class="pb-3"><h5><i class="fas fa-stream"></i> Skills Empty</h5></div>';
		}

		if (isset($_SESSION['skillscart'])) {
			echo '<div class="p-3"><h5><i class="fas fa-stream"></i> Skills </h5></div>';
			echo '<table class="table table-bordered">
			<thead>
			<th>School Level</th>
			<th>School Name</th>
			<th>From</th>
			<th>To</th>
			<th>Action</th>
			</thead>
			<tbody>';
			foreach ($_SESSION['skillscart'] as $s_da) {
				echo '
				<tr>
				<td>
				'.$s_da['skillscart']['SchoolLevel'] .'
				</td>
				<td>
				'.$s_da['skillscart']['SchoolName'] .'
				</td>
				<td>
				'.$s_da['skillscart']['FromYearSchool'] .'
				</td>
				<td>
				'.$s_da['skillscart']['ToYearSchool'] .'
				</td>
				<td>
				<button id="'.$s_da['skillscart']['SchoolLevel'].'" class="remoach btn-tr" type="button"><i class="fas fa-trash"></i></button>
				</td>
				</tr>
				';
			}
			echo '</tbody>
			</table>';
		}
		echo '<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#skillsFields"><i class="fas fa-plus"></i> Add Data</button>';
	}
	public function Logout()
	{
		session_destroy();
	}
}
