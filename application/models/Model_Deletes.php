<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Deletes extends CI_Model {

	public function RemoveEmpl($id)
	{
		$SQL = "UPDATE employee SET Status ='Deleted' WHERE Employee_No = ?";
		$result = $this->db->query($SQL,$id);
		return $result;
	}
}
