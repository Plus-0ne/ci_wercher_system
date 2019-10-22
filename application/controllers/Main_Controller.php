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
		redirect('Dashboard');
	}
	public function Dashboard()
	{
		$this->session->unset_userdata('acadcart');
		$header['title'] = 'Dashboard';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$this->load->view('users/u_dashboard');
	}
	
	public function V_Applicants()
	{
		$this->session->unset_userdata('acadcart');
		$header['title'] = 'Applicants';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['get_employee'] = $this->Model_Selects->getApplicant();
		$this->load->view('users/u_applicant',$data);
	}
	public function Employee()
	{
		$this->session->unset_userdata('acadcart');
		$header['title'] = 'Employees';
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
					'Employee_No' => $ged['Employee_No'],
					'Employee_ID' => $ged['Employee_ID'],
					'EmployeeImage' => $ged['EmployeeImage'],
					'EmploymentType' => $ged['EmploymentType'],
					'LastName' => $ged['LastName'],
					'FirstName' => $ged['FirstName'],
					'MiddleInitial' => $ged['MiddleInitial'],
					'Address' => $ged['Address'],
					'BirthDate' => $ged['BirthDate'],
					'BirthPlace' => $ged['BirthPlace'],
					'Gender' => $ged['Gender'],
					'MaritalStatus' => $ged['MaritalStatus'],
					'ProjectAssigned' => $ged['ProjectAssigned'],
					'SSS' => $ged['SSS'],
					'Philhealth' => $ged['Philhealth'],
					'HDMF' => $ged['HDMF'],
					'TIN' => $ged['TIN'],
					'ATM' => $ged['ATM'],
					'DateHired' => $ged['DateHired'],
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
		$header['title'] = 'New Employee';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$this->load->view('users/u_addemployee',$data);
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
				<button id="'.$s_da['acadcart']['SchoolLevel'].'" class="remoach btn-tr" type="button"><i class="fas fa-trash"></i></button>
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
		$SchoolLevel = $_POST["SchoolLevel"];
		$SchoolName = $_POST["SchoolName"];
		$FromYearSchool = $_POST["FromYearSchool"];
		$ToYearSchool = $_POST["ToYearSchool"];
		if ($SchoolLevel == NULL || $SchoolName == NULL || $FromYearSchool == NULL || $ToYearSchool == NULL) {
			echo "Error";
		}
		else
		{
			foreach ($_SESSION["acadcart"] as $s_da => $row) {
				if ($row['acadcart']['SchoolLevel'] == $_POST['SchoolLevel']) {
					exit();
				}
			}
			if (!isset($_SESSION ['acadcart'] )) {
				$_SESSION ['acadcart'] = array ();
			}
			$data['acadcart'] = array(
				'SchoolLevel' => $SchoolLevel,
				'SchoolName' => $SchoolName,
				'FromYearSchool' => $FromYearSchool,
				'ToYearSchool' => $ToYearSchool,
			);
			$_SESSION['acadcart'][] = $data;
		}
	}
	public function removeAcad()
	{
		foreach ($_SESSION["acadcart"] as $s_da => $row) {
			if ($row['acadcart']['SchoolLevel'] == $_POST['row_id']) {
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
