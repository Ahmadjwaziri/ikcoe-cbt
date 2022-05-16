<?php require_once('../includes/functions.php') ?>

<?php
if (isset($_POST['logout'])) {
    logout();
}
if (!loggedStudent()) {
    header('location:../index.php');
} else {
    $student = loggedStudent();
    $class_id = $student['class_id'];
}
?>

<?php require_once('layouts/header.php') ?>
<?php require_once('layouts/navbar.php') ?>

<main class="py-5" id="bg">
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 text-center">

               
                    <div class="alert alert-secondary">
                        <h2>You have submitted the Your Exam response!</h2>
                        <h2>Your Scores will be communicated to you later</h2>
                        <h3>  <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();"><i class="fas fa-power-off fa-fw"></i> Logout</a> </h3>
                        
                    </div>
                
            </div>
        </div>
    </div>
</main>

<script src="../sbadmin/js/jquery.min.js" crossorigin="anonymous"></script>
<script src="../sbadmin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../sbadmin/js/scripts.js"></script>
<script src="../sbadmin/js/toastr.min.js"></script>

<?php require_once('layouts/end.php') ?>