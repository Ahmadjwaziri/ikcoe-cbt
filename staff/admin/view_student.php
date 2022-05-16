<?php require_once('../includes/functions.php') ?>

<?php
    if(!loggedAdmin()){
        header('location:../index.php');
    }
    if(isset($_POST['logout'])){
        logout();
    }
    if(isset($_POST['submit'])){
        addTeacher();
    }
    if(isset($_POST['delete']) && isset($_POST['student_id'])){
        deleteStudent($_POST['student_id']);
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
                <h1 class="mt-3 h5"><span class="badge badge-pill badge-primary">Students</span></h1>

                <div class="card mt-3 mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fas fa-table mr-1"></i>
                                Registered Students
                               <b> <span> <?php
                                        $query1 = $conn->query("SELECT * FROM students");
                                        $count1 = $query1->num_rows;
                                        echo $count1; 
                                        ?>
                                        </span> </b>
                            </div>
                            <div class="col-md-3 offset-md-3">
                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <?php
                            $students = recentStudents();
                            if($students){
                        ?>
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Reg. No</th>                                         
                                            <th>C/comb</th>
                                            <th>Check in</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php foreach($students as $student) { ?>
                                            
                                        
                                        <tr>
                                        
                                            <td><?php echo htmlspecialchars($student['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($student['roll_no'], ENT_QUOTES, 'UTF-8'); ?></td>                                         
                                            <td><?php echo htmlspecialchars($student['course_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td>
                                            <form action="process.php" method="POST">

<input type="hidden" value="<?php echo $student['id'];?>" name="id">

<?php if($student['status'] == "0"){?>
<button class="btn btn-success btn-xs" type="submit" name="approve_accounting"><i class="fa fa-long-arrow-right"></i> Check in</button>
<?php } else { ?>
<button class="btn btn-danger btn-xs" type="submit" disabled name=""><i class="fa-long-arrow-right" ></i> Checked <?php echo $student['ondate']; ?> </button>
<?php } ?>

</form>
</td>

                                        <?php } ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
        </main>
        
        <?php require_once('layouts/footer.php') ?>
    </div>
</div>


<script>
$(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<?php require_once('layouts/end.php') ?>

