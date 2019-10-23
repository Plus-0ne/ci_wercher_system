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
		$EmploymentType = $this->input->post('EmploymentType');
		$LastName = $this->input->post('LastName');
		$FirstName = $this->input->post('FirstName');
		$MI = $this->input->post('MI');
		$Gender = $this->input->post('Gender');
		$Address = $this->input->post('Address');
		$MaritalStatus = $this->input->post('MaritalStatus');
		$bDate = $this->input->post('bDate');
		$bPlace = $this->input->post('bPlace');
		$ProjectAssigned = $this->input->post('ProjectAssigned');
		$SSS = $this->input->post('SSS');
		$Philhealth = $this->input->post('Philhealth');
		$HDMF = $this->input->post('HDMF');
		$TIN = $this->input->post('TIN');
		$ATM = $this->input->post('ATM');

		if ($EmploymentType == NULL || $LastName == NULL || $FirstName == NULL || $MI == NULL || $Gender == NULL || $Address == NULL || $MaritalStatus == NULL || $bDate == NULL || $bPlace == NULL || $ProjectAssigned == NULL) {
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> All fields are required!</h5></div>');
			redirect('NewEmployee');
		}
		else
		{
			$cc = $this->db->count_all('employee');
			$ccc = $cc + 1;
			$coun = str_pad($ccc,5,0,STR_PAD_LEFT);
			$id = '-A';
			$customid = $coun.$id;
			$Employee_ID = $customid;
			// Check Employee if exist
			$chkem = $this->Model_Selects->CheckEmployee($Employee_ID);
			if ($chkem->num_rows() > 0) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Employee ID exist</h5></div>');
				redirect('NewEmployee');
			}
			else
			{
				$config['upload_path']          = './uploads/'.$customid;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

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
						'EmploymentType' => $EmploymentType,
						'Employee_ID' => $customid,
						'EmployeeImage' => $pImage,
						'LastName' => ucfirst($LastName),
						'FirstName' => ucfirst($FirstName),
						'MiddleInitial' => ucfirst($MI),
						'Gender' => $Gender,
						'Address' => $Address,
						'MaritalStatus' => $MaritalStatus,
						'BirthDate' => $bDate,
						'BirthPlace' => $bPlace,
						'ProjectAssigned' => $ProjectAssigned,
						'SSS' => $SSS,
						'Philhealth' => $Philhealth,
						'HDMF' => $HDMF,
						'TIN' => $TIN,
						'ATM' => $ATM,
						'Status' => 'Applicant',
					);
					$addedEmployee = $this->Model_Inserts->AddThisEmployee($data);
					if ($addedEmployee == TRUE) {
						if (isset($_SESSION["acadcart"])) {
							foreach ($_SESSION["acadcart"] as $s_da) {
								$data = array(
									'EmployeeID' => $customid,
									'Level' => $s_da['acadcart']['SchoolLevel'],
									'SchoolName' => $s_da['acadcart']['SchoolName'],
									'DateStarted' => $s_da['acadcart']['FromYearSchool'],
									'DateEnds' => $s_da['acadcart']['ToYearSchool'],
								);
								$this->Model_Inserts->InsertAcadH($data);
							}
						}
						unset($_SESSION["acadcart"]);
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-times"></i> New Employee added!</h5></div>');
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
}
