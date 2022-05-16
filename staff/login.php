<?php
session_start();
extract($_POST);
extract($_GET);
include 'includes/db.php';

    $pass = md5($password);
    $query = $dBASE->query("SELECT * FROM check_in where username='$username' And password='$pass'")or die($dBASE->error);

    if($query->num_rows > 0){
        ?> 
        <?php 
        $row = $query->fetch_assoc();
        $_SESSION["username"] = $row["username"];
        $_SESSION["name"] = $row["name"];
        $_SESSION['user_id'] = $row['id'];
                        header('location:'. admin/index.php')
        
        ?>
        
        <?php
    }else{
        ?>
        <?php
        ?>
           
        <?php
    }
// }
?>

