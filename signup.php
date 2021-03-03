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
        <title>Sign Up</title>
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
                        <h1 style = "font-size: 45px" class="text-center text-black font-weight-dark my-2">Services Information System</h1>
                    </div>
                </div>
                </div>
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div>
                                        <?php
                                            if(isset($_SESSION['signup_status']) && $_SESSION['signup_status']!=''){ ?>
                                            <div class="alert alert-success">
                                                <?php echo '<h4 class="text-center"> '.$_SESSION['signup_status'].'</h4>';
                                                if($_SESSION['signup_status_code'] == "success"){
                                                    echo '<h4 class="text-center">Please wait(max 12 hours) for the admin approval.</h4>';
                                                } ?>
                                            </div>
                                                <?php unset($_SESSION['signup_status']);
                                            }
                                        ?>
                                    </div>
                                    <div class="card-header"><h3 class="text-center font-weight-dark my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="ba_no">BA/P/BD Number</label>
                                                    <input class="form-control py-4" id="ba_no" name="ba_no" type="text" placeholder="Enter BA/P/BD number" required/>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="username">Username</label>
                                                    <input class="form-control py-4" id="username" name="username" type="text" placeholder="Enter username" required/>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required/>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="password">Password</label>
                                                        <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="confirmpassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1" for="sector">Select sector</label>
                                                    <select class="form-control" name="sector">
                                                        <option>Army</option>
                                                        <option>Navy</option>
                                                        <option>Air Force</option>
                                                    </select>
                                                </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="rank">Rank</label>
                                                        <input class="form-control py-4" id="rank" name="rank" type="text" placeholder="Enter rank" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="corps">Corps</label>
                                                        <input class="form-control py-4" id="corps" name="corps" type="text" placeholder="Enter corps" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="unit">Unit</label>
                                                        <input class="form-control py-4" id="unit" name="unit" type="text" placeholder="Enter unit" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="appointment">Appointment</label>
                                                        <input class="form-control py-4" id="appointment" name="appointment" type="text" placeholder="Enter appointment" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="contact">Contact Number</label>
                                                        <input class="form-control py-4" id="contact" name="contact" type="text" placeholder="Enter contact number" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="address">Address</label>
                                                        <input class="form-control py-4" id="address" name="address" type="address" placeholder="Enter address" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="signupbtn" class="btn btn-primary">Create Account</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
