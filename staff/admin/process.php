<?php


session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
require_once('../includes/db.php');


date_default_timezone_set('Africa/Lagos');
// Then call the date functions
$date = date('Y/m/d H:i:s');

if(isset($_POST['approve_accounting'])){
    $query = $conn->query("UPDATE students SET status='1', ondate='$date' WHERE id='$id'") or die($conn->error);
    header('location:'  . ' view_student.php');
}

?>