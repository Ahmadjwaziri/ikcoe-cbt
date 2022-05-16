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
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col h4">
                                        Lecturers
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="view_teacher.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col h4">
                                        Exams
                                        <b> <span> <?php
                                        $query1 = $conn->query("SELECT * FROM exams");
                                        $count1 = $query1->num_rows;
                                        echo $count1; 
                                        ?>
                                        </span> </b>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <i class="fas fa-align-right fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="exam.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col h4">
                                        Results
                                       
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <i class="fas fa-poll fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="results.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Recently Registered Lecturers
                            </div>
                            <div class="card-body">
                                <?php
                                $recentTeachers = recentTeachers();
                                $recentTeachers = array_slice($recentTeachers, 0, 6, true);
                                if (count($recentTeachers)) {
                                ?>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($recentTeachers as $teacher) {
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($teacher['name'], ENT_QUOTES, 'UTF-8');  ?></td>
                                                    <td><?php echo htmlspecialchars($teacher['mobile'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($teacher['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once('layouts/footer.php') ?>
    </div>
</div>

<?php require_once('layouts/end.php') ?>