<?php
require_once 'db_module.php';
require_once 'module_get_employees.php';
require_once 'module_edit_employees.php';
require_once 'module_add_employees.php';
require_once 'module_delete_employees.php';




// db_query("SELECT * FROM enterprise");

header('Content-Type: application/json');

$action = $_GET['action'] ?? null;
$response = ['info' => 'Unknow action'];

switch ($action) {
    case 'get_employees':
        $response = ['info' => 'getEmployees'];
        $response['data'] = getEmployees();
        break;
    

    case 'edit_employees':
        $response = ['info' => editEmployees($_GET)];
        break;


    case 'add_employees':
        $response = ['info' => 'addEmployees'];
        $response = ['info' => addEmployees($_GET)];
        break;


    case 'delete_employees':
        $response = ['info' => 'deleteEmployees'];
        $response = ['info' => deleteEmployees($_GET)];
        break;


    // case 'value':
    //     # code...
    //     break;

    default:
        $response = ['info' => 'Invalid action'];
        break;
}





echo json_encode($response);




?>