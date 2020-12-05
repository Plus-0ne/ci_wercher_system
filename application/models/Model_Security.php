<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Security extends CI_Model {

	public function CheckPermissions($Permission)
	{
		// ~ essentials ~
		$AdminID = $this->session->userdata['AdminID'];
		$CheckAdminID = $this->Model_Selects->CheckAdminID($AdminID);
		if ($CheckAdminID->num_rows() > 0) {
			foreach($CheckAdminID->result_array() as $row) {
				$PermissionsList = $row['Permissions'];
			}
			$PermissionsList = explode(',', $PermissionsList);
			if (in_array($Permission, $PermissionsList)) {
				return true;
			}
		} else {
			return false;
		}
	}
}
