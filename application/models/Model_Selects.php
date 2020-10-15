<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Selects extends CI_Model {

	public function GetEmployee()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Employed'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function getApplicant() // TODO: Duplicate?
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Applicant'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function getApplicantExpired()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Expired'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetApplicantArchived()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Deleted'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetApplicantBlacklisted()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Blacklisted'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckEmployee($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID = ?";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function GetEmployeeDetails($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID = '$ApplicantID'"; // TODO: Duplicate
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function GetEmployeeAcadhis($ApplicantID)
	{
		$SQL = "SELECT * FROM acad_history WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetEmploymentDetails($ApplicantID)
	{
		$SQL = "SELECT * FROM employment_record WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetAdmin()
	{
		$SQL = "SELECT * FROM admin WHERE Status <> 'Deleted'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckAdminID($AdminID)
	{
		$SQL = "SELECT * FROM admin WHERE AdminID = ?";
		$result = $this->db->query($SQL,$AdminID);
		return $result;
	}
	public function CheckAdminNo($AdminNo)
	{
		$SQL = "SELECT * FROM admin WHERE AdminNo = ?";
		$result = $this->db->query($SQL,$AdminNo);
		return $result;
	}
	public function GetApplicants() // TODO: Duplicate?
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Applicant'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetTotalApplicants()
	{
		$SQL = "SELECT * FROM applicants WHERE Status = 'Applicant' OR Status = 'Expired'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetApplicantSkills()
	{
		$result =  $this->db->query("SELECT PositionGroup, COUNT(*) as count FROM applicants WHERE Status = 'Applicant' AND PositionGroup IS NOT NULL GROUP BY PositionGroup");
		return $result;
	}
	public function GetApplicantSkillsExpired()
	{
		$result =  $this->db->query("SELECT PositionGroup, COUNT(*) as count FROM applicants WHERE Status = 'Expired' AND PositionGroup IS NOT NULL GROUP BY PositionGroup");
		return $result;
	}
	public function CheckApplicant($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID = ?";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function Machine_Operatessss($ApplicantID)
	{
		$SQL = "SELECT * FROM machine_operated WHERE ApplicantID = ?";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function GetClients()
	{
		$SQL = "SELECT * FROM clients WHERE Status = 'Active'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckClient($ClientName)
	{
		$SQL = "SELECT * FROM clients WHERE Name = ?";
		$result = $this->db->query($SQL,$ClientName);
		return $result;
	}
	public function getClientOption()
	{
		$SQL = "SELECT * FROM clients WHERE Status = 'Active'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetContractHistory($id)
	{
		$SQL = "SELECT * FROM contract_history, applicants WHERE contract_history.ApplicantID = '$id' AND applicants.ApplicantID = '$id'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbookWithLimit($Limit)
	{
		$SQL = "SELECT * FROM logbook ORDER BY No DESC LIMIT $Limit";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPreviousContract($id)
	{
		$SQL = "SELECT * FROM contract_history, applicants WHERE contract_history.ApplicantID = '$id' AND applicants.ApplicantID = '$id' ORDER BY ID DESC LIMIT 1";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPreviousContractInfo($name)
	{
		$SQL = "SELECT * FROM contract_history, clients WHERE contract_history.Client = '$name' AND clients.Name = '$name' ORDER BY ID DESC LIMIT 1";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetClientsEmployed($ClientID)
	{
		$SQL = "SELECT * FROM applicants, clients WHERE applicants.ClientEmployed = '$ClientID' AND clients.ClientID = '$ClientID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetMonthlyTotal($Year)
	{
		// $SQL = "SELECT DATE_FORMAT(AppliedOn, '%Y') as 'Year', DATE_FORMAT(AppliedOn, '%m') as 'Month', COUNT(ApplicantID) as 'Total' FROM applicants GROUP BY DATE_FORMAT(AppliedOn, '%Y%m')";
		$SQL = "SELECT * FROM dashboard_months WHERE Year = '$Year' ORDER BY `dashboard_months`.`Month` ASC";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetMonthlyTotalNoZero($Year)
	{
		$SQL = "SELECT * FROM dashboard_months WHERE Year = '$Year' AND Total <> '0' ORDER BY `dashboard_months`.`Month` ASC";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetMonthlyTotalSpecificMonth($Year, $Month)
	{
		$SQL = "SELECT * FROM dashboard_months WHERE Year = '$Year' AND Month = '$Month'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CountMonthlyTotal()
	{
		// $SQL = "SELECT DATE_FORMAT(AppliedOn, '%Y') as 'Year', DATE_FORMAT(AppliedOn, '%m') as 'Month', COUNT(ApplicantID) as 'Total' FROM applicants GROUP BY DATE_FORMAT(AppliedOn, '%Y%m')";
		$SQL = "SELECT * FROM dashboard_months";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetViolations($ApplicantID)
	{
		$SQL = "SELECT * FROM violations WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckAdminCred($UserName)
	{
		$SQL = "SELECT * FROM admin WHERE AdminID = '$UserName'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetApplicantsViaPartial($URL) // TODO: Not used yet.
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID LIKE '$URL-%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetWeeklyList($ClientID,$mode) // Argument is $id originally from source.
	{
		switch ($mode) {
			case 0:
				$SQL = "SELECT * FROM hours_weekly WHERE ClientID = '$ClientID'";
				break;
			case 1:
				$SQL = "SELECT * FROM hours_semimonthly WHERE ClientID = '$ClientID'";
				break;
			case 2:
				$SQL = "SELECT * FROM hours_monthly WHERE ClientID = '$ClientID'";
				break;
			default:
				$SQL = "SELECT * FROM hours_weekly WHERE ClientID = '$ClientID'";
				break;
		}

		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetClientID($ClientID)
	{
		$SQL = "SELECT * FROM clients WHERE ClientID = '$ClientID'";
		$result = $this->db->query($SQL,$ClientID);
		return $result;
	}
	public function GetWeeklyListEmployee($ClientID)
	{
		$SQL = "SELECT * FROM applicants WHERE ClientEmployed = '$ClientID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbookLatestHires()
	{
		$SQL = "SELECT * FROM logbook WHERE Type = 'Employment' ORDER BY No DESC";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetWeeklyDates()
	{
		$SQL = "SELECT * FROM dummy_hours WHERE Current = 'Current'";
		$result = $this->db->query($SQL);
		return $result;
	}
	// public function GetWeeklyListEmployeeActive($ClientID)
	// {
	// 	$SQL = "SELECT * FROM hours_weekly WHERE ClientID = '$ClientID' AND ApplicantID IS NOT NULL AND Name IS NOT NULL";
	// 	$result = $this->db->query($SQL);
	// 	return $result;
	// }
	// public function GetWeeklyDatesForEmployee($ApplicantID)
	// {
	// 	$SQL = "SELECT * FROM hours_weekly WHERE Current IS NULL AND ApplicantID = '$ApplicantID' AND Name IS NULL";
	// 	$result = $this->db->query($SQL);
	// 	return $result;
	// }
	public function GetMatchingDates($ApplicantID, $Time, $Mode)
	{
		switch ($Mode) {
			case '0':
				$SQL = "SELECT * FROM hours_weekly, dummy_hours WHERE hours_weekly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_weekly.ApplicantID = '$ApplicantID'";
				break;
			case '1':
				$SQL = "SELECT * FROM hours_semimonthly, dummy_hours WHERE hours_semimonthly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_semimonthly.ApplicantID = '$ApplicantID'";
				break;
			case '2':
				$SQL = "SELECT * FROM hours_monthly, dummy_hours WHERE hours_monthly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_monthly.ApplicantID = '$ApplicantID'";
				break;
			default:
				$SQL = "SELECT * FROM hours_weekly, dummy_hours WHERE hours_weekly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_weekly.ApplicantID = '$ApplicantID'";
				break;
		}
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetMatchingDatesType($ApplicantID, $Time, $Mode)
	{
		switch ($Mode) {
			case '0':
				$SQL = "SELECT * FROM hours_weekly, dummy_hours WHERE hours_weekly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_weekly.ApplicantID = '$ApplicantID'";
				break;
			case '1':
				$SQL = "SELECT * FROM hours_semimonthly, dummy_hours WHERE hours_semimonthly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_semimonthly.ApplicantID = '$ApplicantID'";
				break;
			case '2':
				$SQL = "SELECT * FROM hours_monthly, dummy_hours WHERE hours_monthly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_monthly.ApplicantID = '$ApplicantID'";
				break;
			default:
				$SQL = "SELECT * FROM hours_weekly, dummy_hours WHERE hours_weekly.Time = '$Time' AND dummy_hours.Time = '$Time' AND hours_weekly.ApplicantID = '$ApplicantID'";
				break;
		}
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetWeeklyListEmployeeForDates($ApplicantID, $Mode)
	{
		switch ($Mode) {
			case '0':
				$Mode = 'hours_weekly';
				break;
			case '1':
				$Mode = 'hours_semimonthly';
				break;
			case '2':
				$Mode = 'hours_monthly';
				break;
			default:
				$Mode = 'hours_weekly';
				break;
		}
		$SQL = "SELECT * FROM " . $Mode . " WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL,$ApplicantID);
		return $result;
	}
	public function GetDocuments($ApplicantID, $ClientID)
	{
		$SQL = "SELECT * FROM supp_documents WHERE ApplicantID = '$ApplicantID' AND Type = 'Document' AND ClientID = '$ClientID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetDocumentsViolations($ApplicantID, $ClientID) // Also includes Blacklists.
	{
		$SQL = "SELECT * FROM supp_documents WHERE ApplicantID = '$ApplicantID' AND (Type = 'Violation' OR Type = 'Blacklist') AND ClientID = '$ClientID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetDocumentsViolationsFromClient($ApplicantID, $ClientID, $HistoryFrom, $HistoryTo) // Also includes Blacklists.
	{
		$SQL = "SELECT * FROM supp_documents WHERE ApplicantID = '$ApplicantID' AND (Type = 'Violation' OR Type = 'Blacklist') AND ClientID = '$ClientID' AND (DateAdded BETWEEN '$HistoryFrom' AND '$HistoryTo')";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetWeeklyHours($ClientID, $Time) // Argument is $id originally from source.
	{
		$SQL = "SELECT * FROM dummy_hours, hours_weekly WHERE hours_weekly.ClientID = '$ClientID' AND dummy_hours.Time = hours_weekly.Time";
		$result = $this->db->query($SQL,$ClientID);
		return $result;
	}
	public function GetApplicantsByMonth($Year, $Month)
	{
		$SQL = "SELECT * FROM applicants WHERE AppliedOn LIKE '%$Year-$Month%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetTotalHours($ApplicantID, $TimeFrom, $TimeTo)
	{
		$SQL = "SELECT * FROM hours_weekly WHERE ApplicantID = '$ApplicantID' AND Time = '$TimeFrom' OR WHERE Time = '$TimeFrom'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetDocumentsNotes($ApplicantID)
	{
		$SQL = "SELECT * FROM tab_documents_notes WHERE ApplicantID = '$ApplicantID' AND Deleted IS NULL";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function sss_Contri()
	{
		$SQL = "SELECT * FROM sss_table ORDER BY total ASC";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetEmployeeHours($ApplicantID) //Checkkkkkk
	{
		$SQL = "SELECT * FROM hours_weekly WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetempGP($ApplicantID)
	{

		$this->db->select_sum('day_pay');
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->get('hours_weekly')->row();  
		return $result->day_pay;
	}
	public function getsssRa()
	{
		$SQL = "SELECT * FROM sss_table";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetTotalH($ApplicantID)
	{
		$this->db->select_sum('Hours');
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->get('hours_weekly')->row();  
		return $result->Hours;
	}
	public function GetTotalOt($ApplicantID)
	{
		$this->db->select_sum('Overtime');
		$this->db->where('ApplicantID', $ApplicantID);
		$result = $this->db->get('hours_weekly')->row();  
		return $result->Overtime;
	}
	public function get_applicantContri($id)
	{
		$SQL = "SELECT * FROM tracking_table WHERE ClientID = $id";
		$result = $this->db->query($SQL);
		return $result;
	}
	// Search queries, possible duplicates
	public function SearchApplicantID($query)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID LIKE '%$query%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function SearchEmployeeID($query)
	{
		$SQL = "SELECT * FROM applicants WHERE EmployeeID LIKE '%$query%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function SearchPeople($query)
	{
		$SQL = "SELECT * FROM applicants WHERE LastName LIKE '%$query%' OR FirstName LIKE '%$query%' OR MiddleInitial LIKE '%$query%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function SearchClients($query)
	{
		$SQL = "SELECT * FROM clients WHERE Name LIKE '%$query%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function SearchPositionGroups($query)
	{
		$SQL = "SELECT * FROM applicants WHERE PositionGroup LIKE '%$query%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function SearchPositionSpecific($query)
	{
		$SQL = "SELECT * FROM applicants WHERE PositionDesired LIKE '%$query%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function SearchAdmins($query)
	{
		$SQL = "SELECT * FROM admin WHERE LastName LIKE '%$query%' OR FirstName LIKE '%$query%' OR MiddleInitial LIKE '%$query%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetEmployeeMatchingClient($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants, clients WHERE ApplicantID = '$ApplicantID' AND (applicants.ClientEmployed = clients.ClientID)";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function getPayslip($id)
	{
		$SQL = "SELECT * FROM tracking_table WHERE id = '$id'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetApplicantDet($ApplicantID)
	{
		$SQL = "SELECT * FROM applicants WHERE ApplicantID = '$ApplicantID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetClientDet($ClientID)
	{
		$SQL = "SELECT * FROM clients WHERE ClientID = '$ClientID'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckSSS($number)
	{
		$SQL = "SELECT * FROM applicants WHERE SSS_No = ?";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckRCN($number)
	{
		$SQL = "SELECT * FROM applicants WHERE ResidenceCertificateNo = ?";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckTIN($number)
	{
		$SQL = "SELECT * FROM applicants WHERE TIN = ?";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckHDMF($number)
	{
		$SQL = "SELECT * FROM applicants WHERE HDMF = ?";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckPhilHealth($number)
	{
		$SQL = "SELECT * FROM applicants WHERE PhilHealth = ?";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckATM($number)
	{
		$SQL = "SELECT * FROM applicants WHERE ATM_No = ?";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function CheckLFName($LastName, $FirstName)
	{
		$SQL = "SELECT * FROM applicants WHERE LastName = '$LastName' AND FirstName = '$FirstName'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetAllApplicants()
	{
		$SQL = "SELECT * FROM applicants";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetDailyExpires($Date)
	{
		$SQL = "SELECT * FROM applicants WHERE DateEnds LIKE '%$Date%'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetApplicantsIncrease($DateStart, $DateMax)
	{
		$SQL = "SELECT * FROM applicants WHERE (AppliedOn BETWEEN '$DateMax' AND '$DateStart')";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetEmployeesIncrease($DateStart, $DateMax)
	{
		$SQL = "SELECT * FROM applicants WHERE (DateStarted BETWEEN '$DateMax' AND '$DateStart')";
		$result = $this->db->query($SQL);
		return $result;
	}



	public function GetAllSSSTable()
	{
		$SQL = "SELECT * FROM sss_table";
		$result = $this->db->query($SQL);
		return $result;
	}

	public function GetAllHDMFTable()
	{
		$SQL = "SELECT * FROM hdmf_table";
		$result = $this->db->query($SQL);
		return $result;
	}

	public function GetAllPhilHealthTable()
	{
		$SQL = "SELECT * FROM philhealth_table";
		$result = $this->db->query($SQL);
		return $result;
	}

	public function GetAllTaxTable()
	{
		$SQL = "SELECT * FROM tax_table";
		$result = $this->db->query($SQL);
		return $result;
	}

	public function GetEmployeeDeductions($eid)
	{
		$SQL = "SELECT * FROM employee_deductions where applicant_id=$eid";
		$result = $this->db->query($SQL,$eid);
		return $result;
	}

	public function GetEmployeeOtherDeductions($eid)
	{
		$SQL = "SELECT * FROM employee_deductions where applicant_id=$eid";
		$result = $this->db->query($SQL,$eid);
		return $result;
	}
	public function GetWeeklyImports($ApplicantsArray)
	{
	    if (!empty($ApplicantsArray)) {
    		$SQL = "SELECT * FROM hours_weekly WHERE";
    		foreach($ApplicantsArray as $item) {
    			$SQL = $SQL . " ApplicantID = '" . $item . "'" . " OR "; 
    		}
    		$SQL = substr($SQL, 0, -4);
    		$result = $this->db->query($SQL);
    		return $result;
	    }
	}
	public function GetWeeklyListEmployeeFromImports($ApplicantsArray)
	{
	    if (!empty($ApplicantsArray)) {
    		$SQL = "SELECT * FROM applicants WHERE";
    		foreach($ApplicantsArray as $item) {
    			$SQL = $SQL . " ApplicantID = '" . $item . "'" . " OR "; 
    		}
    		$SQL = substr($SQL, 0, -4);
    		$result = $this->db->query($SQL);
    		return $result;
	    }
	}
	public function GetClientIDFromName($ClientName)
	{
		$SQL = "SELECT * FROM clients WHERE Name = '$ClientName'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbook($LimitEnd = 50, $AdminID = NULL, $Type = NULL, $Event = NULL, $DateStart = NULL, $DateMax = NULL)
	{
		$SQL = "SELECT * FROM logbook WHERE ";
		if ($AdminID != NULL) {
			$SQL = $SQL . "AdminID = '$AdminID' AND ";
		}
		if ($Type != NULL) {
			$SQL = $SQL . "Icon = '$Type' AND ";
		}
		if ($Event != NULL) {
			$SQL = $SQL . "Event LIKE '%$Event%' AND ";
		}
		if ($DateStart != NULL && $DateMax != NULL) {
			$SQL = $SQL . "(Time BETWEEN '$DateStart' AND '$DateMax') AND ";
		}
		$SQL = $SQL . "Icon <> 'Note' ORDER BY No DESC LIMIT 0, $LimitEnd";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbookNoLimit($AdminID = NULL, $Type = NULL, $Event = NULL, $DateStart = NULL, $DateMax = NULL)
	{
		
		$SQL = "SELECT * FROM logbook WHERE ";
		if ($AdminID != NULL) {
			$SQL = $SQL . "AdminID = '$AdminID' AND ";
		}
		if ($Type != NULL) {
			$SQL = $SQL . "Icon = '$Type' AND ";
		}
		if ($Event != NULL) {
			$SQL = $SQL . "Event LIKE '%$Event%' AND ";
		}
		if ($DateStart != NULL && $DateMax != NULL) {
			$SQL = $SQL . "(Time BETWEEN '$DateStart' AND '$DateMax') AND ";
		}
		$SQL = $SQL . "Icon <> 'Note' ORDER BY No DESC";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbookAdminImage($AdminID)
	{
		$SQL = "SELECT * FROM admin, logbook WHERE admin.AdminID = '$AdminID' AND logbook.AdminID = '$AdminID' LIMIT 1";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbookLogExtended($HookNo)
	{
		$SQL = "SELECT * FROM logbook, logbook_extended WHERE logbook.No = '$HookNo' AND logbook_extended.HookNo = '$HookNo'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLogbookNotes($LimitStart = 0, $LimitEnd = 25)
	{
		$SQL = "SELECT * FROM logbook WHERE Icon = 'Note' ORDER BY No DESC LIMIT $LimitStart, $LimitEnd";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLatestEmployees($FetchNum = 1) {
		$SQL = "SELECT * FROM applicants WHERE Status = 'Employed' ORDER BY DateStarted DESC LIMIT $FetchNum";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetLatestAdminActivity($AdminID, $FetchNum = 1) {
		$SQL = "SELECT * FROM logbook WHERE AdminID = '$AdminID' ORDER BY Time DESC LIMIT $FetchNum";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetCurrentPrimaryWeek($ClientID) {
		$SQL = "SELECT * FROM salary WHERE ClientID = '$ClientID' ORDER BY TimeAdded DESC LIMIT 1";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPayrollYear($Year, $Mode) {
		switch($Mode) {
			case 0:
				$Mode = 'hours_weekly';
				break;
			case 1:
				$Mode = 'hours_semimonthly';
				break;
			case 2:
				$Mode = 'hours_monthly';
				break;
		}
		$SQL = "SELECT * FROM "  . $Mode . " WHERE t_year = '$Year' ORDER BY t_year DESC";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPayrollMonth($Year, $Month, $Mode) {
		switch($Mode) {
			case 0:
				$Mode = 'hours_weekly';
				break;
			case 1:
				$Mode = 'hours_semimonthly';
				break;
			case 2:
				$Mode = 'hours_monthly';
				break;
		}
		$SQL = "SELECT * FROM "  . $Mode . " WHERE t_year = '$Year' AND Month = '$Month' ORDER BY Month DESC";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPayrollWeek($Year, $Month, $Week, $Mode) {
		switch($Mode) {
			case 0:
				$Mode = 'hours_weekly';
				break;
			case 1:
				$Mode = 'hours_semimonthly';
				break;
			case 2:
				$Mode = 'hours_monthly';
				break;
		}
		$SQL = "SELECT * FROM "  . $Mode . " WHERE t_year = '$Year' AND Month = '$Month' AND Week = '$Week'";
		$result = $this->db->query($SQL);
		return $result;
	}
	public function GetPayrollWeekGrossPay($ApplicantID, $Year, $Month, $Week, $Mode) { // Does not return any other row and column except for the sum of day_pay.
		switch($Mode) {
			case 0:
				$Mode = 'hours_weekly';
				break;
			case 1:
				$Mode = 'hours_semimonthly';
				break;
			case 2:
				$Mode = 'hours_monthly';
				break;
		}
		$this->db->select_sum('day_pay');
		$array = array('ApplicantID' => $ApplicantID, 't_year' => $Year, 'Month' => $Month, 'Week' => $Week);
		$this->db->where($array);
		$result = $this->db->get($Mode)->row();  
		return $result->day_pay;
	}
	public function GetPayrollWeekHours($ApplicantID, $Year, $Month, $Week, $Mode) { // Does not return any other row and column except for the sum of day_pay.
		switch($Mode) {
			case 0:
				$Mode = 'hours_weekly';
				break;
			case 1:
				$Mode = 'hours_semimonthly';
				break;
			case 2:
				$Mode = 'hours_monthly';
				break;
		}
		$this->db->select_sum('Hours');
		$array = array('ApplicantID' => $ApplicantID, 't_year' => $Year, 'Month' => $Month, 'Week' => $Week);
		$this->db->where($array);
		$result = $this->db->get($Mode)->row();  
		return $result->Hours;
	}
	public function GetPayrollWeekOTHours($ApplicantID, $Year, $Month, $Week, $Mode) { // Does not return any other row and column except for the sum of day_pay.
		switch($Mode) {
			case 0:
				$Mode = 'hours_weekly';
				break;
			case 1:
				$Mode = 'hours_semimonthly';
				break;
			case 2:
				$Mode = 'hours_monthly';
				break;
		}
		$this->db->select_sum('Overtime');
		$array = array('ApplicantID' => $ApplicantID, 't_year' => $Year, 'Month' => $Month, 'Week' => $Week);
		$this->db->where($array);
		$result = $this->db->get($Mode)->row();  
		return $result->Overtime;
	}
	public function GetSSSToBePaid($ApplicantID, $ClientID, $Year, $Month) {
		$SQL = "SELECT * FROM sss_tobepaid WHERE ApplicantID = '$ApplicantID' AND ClientID = '$ClientID' AND Year = '$Year' AND Month = '$Month'";
		$result = $this->db->query($SQL);
		return $result;
	}

	
}
