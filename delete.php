<?php
require_once 'connection.php';

/* header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 */
// This header will allow user to access service with DELETE method and get JSON data from the service.


/* $method = $_SERVER['REQUEST_METHOD'];
if ('DELETE' === $method) 
{
parse_str(file_get_contents('php://input'), $_DELETE);
}
 */

$id = $_POST['student_id'];

$q= "DELETE FROM `studenti` WHERE `student_id` =".$id.";";
$r = $conn->prepare($q);
$r->execute();

 $id=$_POST['student_id'];

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST')
{
    $id=$_POST['student_id'];
}  
elseif ($method === 'DELETE')
{
    $id=$_DELETE['student_id'];
}

$q= "DELETE FROM `studenti` WHERE `student_id` =".$id.";";
$r = $conn->prepare($q);
$r->execute();
