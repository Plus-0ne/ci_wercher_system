<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Main_Controller';
$route['404_override'] = 'Main_Controller/FourOhFour';
$route['translate_uri_dashes'] = FALSE;
$route['Forbidden'] = 'Main_Controller/Forbidden';

$route['Dashboard'] = 'Main_Controller/Dashboard';
$route['Employees'] = 'Main_Controller/Employee';
$route['Employees/Regulars'] = 'Main_Controller/EmployeePermanent';
$route['Employees/Absorbed/Wercher'] = 'Main_Controller/EmployeeAbsorbedWercher';
$route['Employees/Absorbed/Left'] = 'Main_Controller/EmployeeAbsorbedLeft';
$route['Employees/Resigned'] = 'Main_Controller/EmployeeResigned';
$route['Employees/Terminated'] = 'Main_Controller/EmployeeTerminated';
$route['ViewEmployee'] = 'Main_Controller/ViewEmployee';
$route['ModifyEmployee'] = 'Main_Controller/ModifyEmployee';
$route['Applicants'] = 'Main_Controller/V_Applicants';
$route['ApplicantsExpired'] = 'Main_Controller/V_ApplicantsExpired';
$route['NewEmployee'] = 'Main_Controller/NewEmployee';
$route['Admins'] = 'Main_Controller/View_Admins';
$route['AdminsArchived'] = 'Main_Controller/AdminsArchived';
$route['Clients'] = 'Main_Controller/Clients';
$route['ClientsArchived'] = 'Main_Controller/ClientsArchived';
$route['Experimental'] = 'Main_Controller/Experimental';
$route['Archived'] = 'Main_Controller/V_Archived';
$route['Blacklisted'] = 'Main_Controller/V_Blacklisted';
$route['SSS_Table'] = 'Main_Controller/SSS_Table';

$route['Payroll'] = 'Main_Controller/PayrollClients';
$route['ViewClient'] = 'Main_Controller/ViewClient';
$route['ViewPayroll'] = 'Main_Controller/ViewPayroll';
$route['ExcelImportSuccessful'] = 'Main_Controller/ExcelImportSuccessful';

$route['GenerateIDCard'] = 'Main_Controller/GenerateIDCard';
$route['PrintEmployee'] = 'Main_Controller/PrintEmployee';

$route['Search'] = 'Main_Controller/Search';
$route['Logbook'] = 'Main_Controller/Logbook';

$route['GeneratePayslip'] = 'Main_Controller/GeneratePayslip';

// LOGIN
$route['LoginValidation'] = 'Login_Controller/LoginValidation';
// CREATE
$route['addNewEmployee'] = 'Add_Controller/addNewEmployee';
$route['Add_NewAdmin'] = 'Add_Controller/Add_NewAdmin';
$route['Add_newClient'] = 'Add_Controller/Add_newClient';
$route['AddSupDoc'] = 'Add_Controller/AddSupDoc';
$route['AddthisSss'] = 'Add_Controller/AddthisSss';




// DELETE
$route['RemoveEmployee'] = 'Delete_Controller/RemoveEmployee';
$route['RemoveAdmin'] = 'Delete_Controller/RemoveAdmin';
$route['RemoveClient'] = 'Delete_Controller/RemoveClient';
$route['RemoveDocumentsNote'] = 'Delete_Controller/RemoveDocumentsNote';
$route['DeleteSSSTableRow'] = 'Delete_Controller/DeleteSSSTableRow';

// UPDATE
$route['EmployApplicant'] = 'Update_Controller/EmployApplicant';
$route['ExtendContract'] = 'Update_Controller/ExtendContract';
$route['UpdateEmployee'] = 'Update_Controller/UpdateEmployee';
$route['AddNote'] = 'Update_Controller/AddNote';
$route['AddNoteDocuments'] = 'Update_Controller/AddNoteDocuments';
$route['SetReminder'] = 'Update_Controller/SetReminder';
$route['BlacklistEmployee'] = 'Update_Controller/BlacklistEmployee';
$route['RestoreEmployee'] = 'Update_Controller/RestoreEmployee';
$route['RestoreAdmin'] = 'Update_Controller/RestoreAdmin';
$route['RestoreClient'] = 'Update_Controller/RestoreClient';
$route['SetWeeklyHours'] = 'Update_Controller/SetWeeklyHours';
$route['ViewClientEmployees'] = 'Update_Controller/ViewClientEmployees';
$route['ImportExcel'] = 'Update_Controller/ImportExcel';
$route['UpdateSSSField'] = 'Update_Controller/UpdateSSSField';
$route['Suspend'] = 'Update_Controller/Suspend';
$route['SetPrimaryWeek'] = 'Update_Controller/SetPrimaryWeek';
$route['ModifyContract'] = 'Update_Controller/ModifyContract';
$route['EmployUserPermanent'] = 'Update_Controller/EmployUserPermanent';
$route['EditClient'] = 'Update_Controller/EditClient';
$route['EditAdmin'] = 'Update_Controller/EditAdmin';
$route['ChangeEmploymentType'] = 'Update_Controller/UpdateEmploymentType';

// AJAX
$route['AJAX_addLogbookNotes'] = 'Main_Controller/AJAX_addLogbookNotes';
$route['AJAX_showLogbookNotes'] = 'Main_Controller/AJAX_showLogbookNotes';
$route['AJAX_checkLogbookNotifCounter'] = 'Main_Controller/AJAX_checkLogbookNotifCounter';
$route['AJAX_checkBellNotifCounter'] = 'Main_Controller/AJAX_checkBellNotifCounter';
$route['AJAX_resetBellNotifCounter'] = 'Main_Controller/AJAX_resetBellNotifCounter';
$route['AJAX_updateSSSToBePaid'] = 'Update_Controller/AJAX_updateSSSToBePaid';
$route['AJAX_removePayrollLoans'] = 'Main_Controller/AJAX_removePayrollLoans';
$route['AJAX_showPayrollLoans'] = 'Main_Controller/AJAX_showPayrollLoans';
$route['AJAX_insertPayrollLoans'] = 'Main_Controller/AJAX_insertPayrollLoans';
$route['AJAX_removePayrollProvisions'] = 'Main_Controller/AJAX_removePayrollProvisions';
$route['AJAX_showPayrollProvisions'] = 'Main_Controller/AJAX_showPayrollProvisions';
$route['AJAX_insertPayrollProvisions'] = 'Main_Controller/AJAX_insertPayrollProvisions';
$route['AJAX_checkPassword'] = 'Main_Controller/AJAX_checkPassword';
$route['AJAX_showLatestAdminActivity'] = 'Main_Controller/AJAX_showLatestAdminActivity';
$route['AJAX_showLogbookDataForAdmin'] = 'Main_Controller/AJAX_showLogbookDataForAdmin';

// ADMIN
$route['Logout'] = 'Main_Controller/Logout';