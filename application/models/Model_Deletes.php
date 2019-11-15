<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Deletes extends CI_Model {

	public function RemoveEmpl($id)
	{
		$SQL = "UPDATE applicants SET Status ='Deleted' WHERE ApplicantNo = ?";
		$result = $this->db->query($SQL,$id);
		return $result;
	}
}
