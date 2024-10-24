<?php
require_once 'db_config.php';
require_once 'db_module.php';
require_once 'module_get_employees.php';
require_once 'module_get_positions.php';
require_once 'module_add_employee.php';
require_once 'module_edit_employee.php';
require_once 'module_delete_employee.php';
require_once 'module_add_positions.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? null;
$response = ['info' => 'Unknown action'];

switch ($action) {
    case 'get_employees':
        $response['data'] = getEmployees();
        break;
    case 'get_positions':
        $response['data'] = getPositions();
        break;
    case 'add_employee':
        $response['info'] = addEmployee($_GET);
        break;
    case 'edit_employee':
        $response['info'] = editEmployee($_GET);
        break;
    case 'delete_employee':
        $response['info'] = deleteEmployee($_GET);
        break;
    default:
        $response['info'] = 'Invalid action';
}

echo json_encode($response);
?>
