<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Updates extends CI_Model {

	public function EmployNewApplicant($ApplicantNo)
	{
		$data = array(
			'Status' => 'Employed',
		);
		$this->db->where('ApplicantNo', $ApplicantNo);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
}
