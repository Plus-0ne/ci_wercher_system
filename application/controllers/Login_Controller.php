<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo password_hash("condoriano", PASSWORD_BCRYPT);

class Login_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Selects');
	}
	public function LoginValidation()
	{
		$UserName = $this->input->post('UserName',TRUE);
		$Password = $this->input->post('Password',TRUE);
		if ($UserName == NULL || $Password == NULL) {
			$p_text = '<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><i class="fas fa-times fa-fw"></i> Incorrect username or password!</div>';
			$this->session->set_flashdata('prompt',$p_text);
			redirect(base_url());
		}
		else
		{
			$CheckAdminCred = $this->Model_Selects->CheckAdminCred($UserName);
			if ($CheckAdminCred->num_rows() > 0) {
				$d_row = $CheckAdminCred->row_array();
				if (password_verify($Password, $d_row['Password'])) {
					$data = array(
						'AdminNo' => $d_row['AdminNo'],
						'AdminImage' => $d_row['Image'],
						'Permissions' => explode(',', $d_row['Permissions']),
						'Position' => $d_row['Position'],
						'AdminID' => $d_row['AdminID'],
						'FirstName' => $d_row['FirstName'],
						'MiddleName' => $d_row['MiddleName'],
						'LastName' => $d_row['LastName'],
						'Gender' => $d_row['Gender'],
						'DateAdded' => $d_row['DateAdded'],
						'Notes' => $d_row['Notes'],
						'is_logged_in' => 'Active',
					);
					$this->session->set_userdata($data);
					redirect('Dashboard');
				}
				else
				{
					$p_text = '<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><i class="fas fa-times fa-fw"></i> Incorrect username or password!</div>';
					$this->session->set_flashdata('prompt',$p_text);
					redirect(base_url());
				}
			}
			else
			{
				$p_text = '<div class="text-center" style="width: 100%;padding: 21px; color: #F52F2F;"><i class="fas fa-times fa-fw"></i> Incorrect username or password!</div>';
				$this->session->set_flashdata('prompt',$p_text);
				redirect(base_url());
			}
		}
	}
}
