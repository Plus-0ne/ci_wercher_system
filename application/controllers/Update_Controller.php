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
			$ApplicantNo = $this->input->post('ApplicantID',TRUE);
			$ClientID = $this->input->post('ClientID',TRUE);
			$H_Months = $this->input->post('H_Months',TRUE);

			if ($ApplicantNo == NULL || $ClientID == NULL || $H_Months == NULL) {
				$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try again!</h5></div>');
				redirect('Applicants');
			}
			else
			{
				$CheckApplicant = $this->Model_Selects->CheckApplicant($ApplicantNo);
				if ($CheckApplicant->num_rows() > 0) {

					date_default_timezone_set('Asia/Manila');

					$DateEnds = date('Y-m-d h:i:s A', strtotime('+'.$H_Months.' months'));

					$data = array(
						'ClientEmployed' => $ClientID,
						'DateStarted' => date('Y-m-d h:i:s A'),
						'DateEnds' => $DateEnds,
					);
					$EmployNewApplicant = $this->Model_Updates->EmployNewApplicant($ApplicantNo,$data);
					if ($EmployNewApplicant == TRUE) {
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #45C830;"><h5><i class="fas fa-check"></i> Applicant employed!</h5></div>');
						redirect('Applicants');
					}
					else
					{
						$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try agains!</h5></div>');
						redirect('Applicants');
					}
				}
				else
				{
					$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againss!</h5></div>');
					redirect('Applicants');
				}
			}
		}
		else
		{
			$this->session->set_flashdata('prompts','<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><h5><i class="fas fa-times"></i> Something\'s wrong, Please try againsss!</h5></div>');
			redirect('Applicants');
		}
	}
}
