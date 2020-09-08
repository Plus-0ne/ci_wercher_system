<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Logbook extends CI_Model {

	public function LogbookEntry($logbookType = 'Unknown', $logbookIcon = 'Unknown', $logbookEvent = '')
	{
		// ~ essentials ~
		if (!empty($this->session->userdata['AdminID'])) {
			$logbookAdmin = $this->session->userdata['AdminID'];
		} else {
			$logbookAdmin = 'GUEST';
		}
		$logbookCurrentTime = date('Y-m-d h:i:s A');
		// ~ event entry ~
		if (empty($this->session->userdata['AdminID'])) {
			$logbookType = 'Yellow';
		}
		$data = array(
			'AdminID' => $logbookAdmin,
			'Time' => $logbookCurrentTime,
			'Type' => $logbookType,
			'Icon' => $logbookIcon,
			'Event' => $logbookEvent,
		);
		$logbookInsert = $this->Model_Inserts->InsertLogbook($data);
	}
	public function LogbookExtendedEntry($logbookExtendedType = 2, $logbookEventTooltip = '', $HookOffset = 0)
	{
		// ~ essentials ~
		$logbookHookNo = $this->db->count_all('logbook');
		$logbookHookNo = $logbookHookNo + $HookOffset;
		if (!empty($this->session->userdata['AdminID'])) {
			$logbookAdmin = $this->session->userdata['AdminID'];
		} else {
			$logbookAdmin = '[SYSTEM]';
		}
		// ~ extended entry ~
		// Type: 0 = normal; 1 = note; 2 = error;
		$data = array(
			'HookNo' => $logbookHookNo,
			'Type' => $logbookExtendedType,
			'EventTooltip' => $logbookEventTooltip,
		);
		$logbookExtendedInsert = $this->Model_Inserts->InsertLogbookExtended($data);
	}
}
