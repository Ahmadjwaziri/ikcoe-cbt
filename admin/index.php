<?php
require_once('includes/functions.php');
if (isset($_POST['login'])) {
    login();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="IKOCE CBT APP V1.0S" />
    <meta name="author" content="Ahmad J. Waziri" />
    <title>IKCOE E-Test App -Admin/Lecturer Are</title>
    <link href="sbadmin/css/styles.css" rel="stylesheet" />
    <script src="/sbadmin/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
        <center>
                                    <img src="sbadmin\assets\img\ikcoelogo.jpg" style="padding-top: 20px;">
                                    </center>
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header" style="height: 80px;">
                                    <h3 class="text-center font-weight-light my-4"><b>IKCOE E-Test App</b></h3>
                                    <h4 class="text-center font-weight-light my-4"><b>ADMIN/LECTURER PANEL</b></h4>
                                   
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputRole">Role</label>
                                            <select class="form-control" name="role" id="inputRole">
                                                <option disabled selected>Select role</option>
                                                <option value="student" <?php echo (isset($_POST['role']) && $_POST['role'] == 'student') ? 'selected' : null ?>>CHeck in/out</option>
                                                <option value="teacher" <?php echo (isset($_POST['role']) && $_POST['role'] == 'teacher') ? 'selected' : null ?>>Lecturer</option>
                                                <option value="admin" <?php echo (isset($_POST['role']) && $_POST['role'] == 'admin') ? 'selected' : null ?>>Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : null ?>" id="inputUsername" type="text" placeholder="Enter username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" id="inputPassword" type="password" placeholder="Enter password" />
                                        </div>
                                        <div class="form-group d-flex justify-content-center mt-4 mb-0">
                                            <button class="btn btn-primary px-5" type="submit" name="login"> <i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                        <input type="hidden" name="csrf_token" value="<?php echo $token ?>">
                                    </form>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <?php require_once('includes/form_errors.php') ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="">IKCOE E-Test App V1.0</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 2022 Isa Kaita College of Education, Dutsinma || Powered by MIS Directorate</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>