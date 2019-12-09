<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Updates extends CI_Model {

	public function EmployNewApplicant($ApplicantNo,$data)
	{
		extract($data);
		$data = array(
			'ClientEmployed' => $ClientEmployed,
			'DateStarted' => $DateStarted,
			'DateEnds' => $DateEnds,
			'Status' => 'Employed',
		);
		$this->db->where('ApplicantNo', $ApplicantNo);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function ApplicantExpired($ApplicantNo)
	{
		$data = array(
			'DateStarted' => '',
			'Status' => 'Expired',
		);
		$this->db->where('ApplicantNo', $ApplicantNo);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
}
