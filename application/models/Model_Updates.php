<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Updates extends CI_Model {

	public function EmployNewApplicant($ApplicantID,$data)
	{
		extract($data);
		$data = array(
			'ClientEmployed' => $ClientEmployed,
			'DateStarted' => $DateStarted,
			'DateEnds' => $DateEnds,
			'Status' => 'Employed',
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function ApplicantExpired($ApplicantID)
	{
		$data = array(
			'Client' => '',
			'DateStarted' => '',
			'Status' => 'Expired',
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function ExtendContract($ApplicantID,$data)
	{
		extract($data);
		$data = array(
			'DateEnds' => $DateEnds,
		);
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
	public function UpdateEmployee($ApplicantID,$data)
	{
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->update('applicants', $data);
		return $result;
	}
}
