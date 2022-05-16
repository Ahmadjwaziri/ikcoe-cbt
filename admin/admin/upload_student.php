<?php require_once('../includes/functions.php') ?>

<?php
if (!loggedAdmin()) {
    header('location:../index.php');
}
if (isset($_POST['logout'])) {
    logout();
}
if (isset($_POST['submit'])) {
    uploadstudents();
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
                <h1 class="mt-3 h5"><span class="badge badge-pill badge-primary">Upload Student</span></h1>


                <div class="mt-3 card mb-4">
                    <div class="card-body">
                    <ul class="alert alert-info" style="padding-left: 40px">
            <li>Please import data from excel, using the provided format</li>
            <li>Data must not be empty, all must be filled in.</li>
            <li>For Class data, it can only be filled using Class ID.</li>
        </ul>
        <div class="text-center">
            <a href="./uploads/format/ikcoe_cbt_upload.xlsx" class="btn-default btn">Download Format</a>
        </div>
                    </div>
                    <br>
        <div class="text-center">
        <center>
        <div class="row">
        <div class="col-md-6 col-md-offset-0">
            <form enctype="multipart/form-data" method="post" action="">
               
                <div class="form-group">
                    <label for="file">Select .CSV file to Import</label>
                    <input name="file" type="file" class="form-control">
                </div>
                <div class="form-group">
                
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
                </div>
                
            </form>
            <div class="form-group">
               
            </div>
        </div>

    </div>
                </div>
                </center>
                <div class="form-group">
               
            </div>
            </div>
        </main>

        <?php require_once('layouts/footer.php') ?>
    </div>
</div>

<?php require_once('layouts/end.php') ?>