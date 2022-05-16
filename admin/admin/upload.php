<?php
/*
* iTech Empires:  How to Import Data from CSV File to MySQL Using PHP Script
* Version: 1.0.0
* Page: Import.PHP
*/
// Database Connection
require_once('db.php');
session_start();

//csrf token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        // show error message
        $message = 'Invalid file type, please use .CSV file!';
    } else {

        move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $_FILES['file']['name']);

        $file = "files/" . $_FILES['file']['name'];

        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE students
         FIELDS TERMINATED BY ','
         LINES TERMINATED BY 'n'
         IGNORE 1 LINES
        (name,dept_name,course_name,level_name,class_id,roll_no,username,password,avatar,status,ondate)
eof;
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        $message = "CSV file successfully imported!";
    }
}

// View records from the table
$users = '<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Name</th>
    <th>Dept</th>
    <th>Reg no.</th>
    <th>Status</th>
   
</tr>
';
$query = "SELECT * FROM students";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}
if (mysqli_num_rows($result) > 0) {
    $number = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['dept_name'] . '</td>
            <td>' . $row['roll_no'] . '</td>
            <td>' . $row['status'] . '</td>
        </tr>';
        $number++;
    }
} else {
    $users .= '<tr>
        <td colspan="4">Records not found!</td>
        </tr>';
}
$users .= '</table>';
?>