<?php
include('security.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/style2.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <style>
        body {
          background-image: url('images/ArmedForces.jpg');
        }
    </style>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                <div class="card shadow-lg border-0 rounded-lg mt-3">
                    <div class="card-body">
                        <h1 style = "font-size: 45px" class="text-center text-black font-weight-dark my-2">Welcome to Services Information System</h1>
                    </div>
                </div>
                </div>
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div>
                                        <?php
                                        if(isset($_SESSION['login_status']) && $_SESSION['login_status']!=''){
                                            if($_SESSION['login_status_code']!="loggedin"){ ?>
                                                <div class="alert alert-success">
                                                <?php echo '<h4 class="text-center"> '.$_SESSION['login_status'].'</h4>'; ?>
                                                </div>
                                                <?php unset($_SESSION['login_status']);
                                            }
                                        }
                                    ?>
                                    </div>
                                    <div class="card-header"><h3 class="text-center font-weight-dark my-3">Login</h3></div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4" id="email" name="email" type="email" placeholder="Enter email address" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <button type="submit" name="loginbtn" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <a class="small" href="#"></a>
                            <div class="text-muted">Copyright &copy; Bangladesh Armed Forces | 2020</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
