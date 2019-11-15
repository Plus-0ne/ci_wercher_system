<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Inserts extends CI_Model {

	public function AddThisEmployee($data)
	{
		$result = $this->db->insert('applicants', $data);
		return $result;
	}
	public function InsertAcadH($data)
	{
		$result = $this->db->insert('acad_history', $data);
		return $result;
	}
	public function InsertAdmin($data)
	{
		$result = $this->db->insert('admin', $data);
		return $result;
	}
}
