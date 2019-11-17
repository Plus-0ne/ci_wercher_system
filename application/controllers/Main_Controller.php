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
		unset($_SESSION["acadcart"]);
		unset($_SESSION["emp_cart"]);
		unset($_SESSION["mach_cart"]);

		$header['title'] = 'Dashboard | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		
		// CHART
		$result =  $this->Model_Selects->GetApplicantSkills();

		$record = $result->result();
		$data = [];

		foreach($record as $row) {
			$data['label'][] = $row->PositionDesired;
			$data['data'][] = (int) $row->count;
		}
		$data['chart_data'] = json_encode($data);
		// COUNT ADMIN
		$data['result_cadmin'] =  $this->Model_Selects->GetAdmin();
		// COUNT APPLICANTS
		$data['result_capp'] =  $this->Model_Selects->GetApplicants();
		$this->load->view('users/u_dashboard',$data);
	}
	
	public function V_Applicants()
	{
		unset($_SESSION["acadcart"]);
		unset($_SESSION["emp_cart"]);
		unset($_SESSION["mach_cart"]);

		$header['title'] = 'Applicants | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['get_employee'] = $this->Model_Selects->getApplicant();
		$this->load->view('users/u_applicant',$data);
	}
	public function Employee()
	{
		unset($_SESSION["acadcart"]);
		unset($_SESSION["emp_cart"]);
		unset($_SESSION["mach_cart"]);

		$header['title'] = 'Employees | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['get_employee'] = $this->Model_Selects->GetEmployee();
		$this->load->view('users/u_users',$data);
	}
	public function ViewEmployee()
	{
		unset($_SESSION["acadcart"]);
		unset($_SESSION["emp_cart"]);
		unset($_SESSION["mach_cart"]);

		if (isset($_GET['id'])) {

			$id = $_GET['id'];

			$header['title'] = 'Information | Wercher Solutions and Resources Workers Cooperative';
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
				$ApplicantID = $ged['ApplicantID'];
				$data['GetAcadHistory'] = $this->Model_Selects->GetEmployeeAcadhis($ApplicantID);
				$data['employment_record'] = $this->Model_Selects->GetEmploymentDetails($ApplicantID);
				$data['Machine_Operatessss'] = $this->Model_Selects->Machine_Operatessss($ApplicantID);
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
		unset($_SESSION["acadcart"]);
		unset($_SESSION["emp_cart"]);
		unset($_SESSION["mach_cart"]);

		$header['title'] = 'New Employee | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$this->load->view('users/u_addemployee',$data);
	}
	public function View_Admins()
	{
		unset($_SESSION["acadcart"]);
		unset($_SESSION["emp_cart"]);
		unset($_SESSION["mach_cart"]);

		$header['title'] = 'Administrator | Wercher Solutions and Resources Workers Cooperative';
		$data['T_Header'] = $this->load->view('_template/users/u_header',$header);
		$data['ShowAdmin'] = $this->Model_Selects->GetAdmin();
		$this->load->view('users/u_admins',$data);
	}
	// ACADEMIC HISTORY
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
		if (!isset($_SESSION['emp_cart'])) {
			echo '<div class="pb-3"><h5><i class="fas fa-stream"></i> Employment Record Empty</h5></div>';
		}

		if (isset($_SESSION['emp_cart'])) {
			echo '<div class="p-3"><h5><i class="fas fa-stream"></i> Emplyement Record </h5></div>';
			echo '<table class="table table-bordered">
			<thead>
			<th>Name</th>
			<th>Address</th>
			<th>PeriodCovered</th>
			<th>Position</th>
			<th>Salary</th>
			<th>cos</th>

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
				<button id="'.$s_da['emp_cart']['emp_id'].'" class="remoaemop btn-tr" type="button"><i class="fas fa-trash"></i></button>
				</td>
				</tr>
				';
			}
			echo '</tbody>
			</table>';
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
		if (!isset($_SESSION['mach_cart'])) {
			echo '<div class="pb-3"><h5><i class="fas fa-stream"></i> Machine Operated Empty</h5></div>';
		}

		if (isset($_SESSION['mach_cart'])) {
			echo '<div class="p-3"><h5><i class="fas fa-stream"></i> Machine Operated </h5></div>';
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
				<button id="'.$s_da['mach_cart']['MachID'].'" class="removemachine btn-tr" type="button"><i class="fas fa-trash"></i></button>
				</td>
				</tr>
				';
			}
			echo '</tbody>
			</table>';
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
	}
}
