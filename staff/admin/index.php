<?php require_once('../includes/functions.php') ?>

<?php
if (isset($_POST['logout'])) {
    logout();
}
if (!loggedAdmin()) {
    header('location:../index.php');
}
?>

<?php require_once('layouts/header.php') ?>
<?php require_once('layouts/navbar.php') ?>


<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php require_once('layouts/sidebar.php') ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col h4">
                                        Students
                                        <b> <span> <?php
                                        $query1 = $conn->query("SELECT * FROM students");
                                        $count1 = $query1->num_rows;
                                        echo $count1; 
                                        ?>
                                        </span> </b>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <i class="fas fa-user-graduate fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="view_student.php">View Details</a>
                               
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    
               
            </div>
        </main>
        <?php require_once('layouts/footer.php') ?>
    </div>
</div>

<?php require_once('layouts/end.php') ?>