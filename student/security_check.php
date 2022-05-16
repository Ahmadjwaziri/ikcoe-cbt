<?php require_once('../includes/functions.php') ?>

<?php
if (isset($_POST['logout'])) {
    logout();
}
if (!loggedStudent()) {
    header('location:../index.php');
} else {
    $student = loggedStudent();
    $class = getClass($student['class_id']);
}
?>

<?php require_once('layouts/header.php') ?>
<?php require_once('layouts/navbar.php') ?>

<main class="py-5" id="bg">
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-2 p-3 bg-primary rounded-left">
                <?php
                if ($student['avatar']) {
                    $url = '../admin/uploads/avatars/' . $student['avatar'];
                } else {
                    $url = '../includes/placeholders/avatar.png';
                }
                ?>
                <img class="img-fluid" src="<?php echo $url; ?>">
            </div>

            <div class="col-md-4 p-3 bg-primary text-white rounded-right">
                <b>
                    <h3 style="color: red;">Please Comfirm Your Information</h3>
                <div class="mt-1" style="color: black;">Name: <?php echo htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8') ?></div>
                <div class="mt-1" style="color: black;">Programme: <?php echo htmlspecialchars($class['name'], ENT_QUOTES, 'UTF-8') ?></div>
                <div class="mt-1"  style="color: black;">Reg. Number: <?php echo htmlspecialchars($student['roll_no'], ENT_QUOTES, 'UTF-8') ?></div>
                <div class="mt-1"  style="color: black;">Department: <?php echo htmlspecialchars($student['dept_name'], ENT_QUOTES, 'UTF-8') ?></div>
                <div class="mt-1"  style="color: black;">Course Comb: <?php echo htmlspecialchars($student['course_name'], ENT_QUOTES, 'UTF-8') ?></div>
                </b>
                <?php if($student['status'] == 1) {?> 
                <div class="card-footer">
                   
                                <a href="index.php"  style="color:greenyellow;"> <b> Yes Continue </b>  <i class="fas fa-angle-double-right"></i></a>
                                
                            </div>
                            <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();" style="color: red;"><i class="fas fa-angle-double-left"></i> <b>No Exit</b> </a>        
                            <?php }  ?>
                            <?php if($student['status'] == 0) {?> 
                                <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();" style="color: red;"><i class="fas fa-angle-double-left"></i> <b style="height: 40px;">You have not been check Properly plsease, Contact Invigilator</b> </a>
                                <?php } ?>
                        </div>

        </div>
    </div>
</main>

<script src="../sbadmin/js/jquery.min.js" crossorigin="anonymous"></script>
<script src="../sbadmin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../sbadmin/js/scripts.js"></script>
<script src="../sbadmin/js/toastr.min.js"></script>

<?php require_once('layouts/end.php') ?>