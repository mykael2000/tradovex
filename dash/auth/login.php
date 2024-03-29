<?php
include '../user-area/includes/connection.php';
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM clients WHERE email='$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $otp = rand(1000, 9999);
        echo '<div class="alert alert-success">
                        login authenticated! Redirecting Now....
                </div>';
        header("location: ../user-area/2fa.php?id=$otp");

    } else {
        echo "<script>alert('whoops! Email or Password is incorrect')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $website->description }}">
    <meta name="keywords" content="{{ $website->keywords }}">
    <link href="{{ asset('storage/'.str_replace('public/', '', $company->favicon))}}" rel="icon">
    <title>Tradovex | Login</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" style="background-color:black;">
    <!-- Login Content -->
    <div class="container-login" id="home">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-8 col-md-9 pt-5">
                <div style="background-color:#222;" class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="d-flex justify-content-center p-3 pb-5">
                                        <img src="../../tradovexlogo.png" alt="logo">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-white mb-4 font-weight-bold">Welcome to Tradovex</h1>
                                    </div>


                                    <form class="user" method="POST" action="">

                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                    name="remember">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <div class="d-flex content-justify">
                                                <div class="text-right w-50">
                                                    <a style="position:relative; left: 85%; color: #ffc107"
                                                        class="font-weight-bold large" href="forgot.php">Forgot
                                                        password?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn text-white btn-block"
                                                style="background-color:#ffc107; border-radius: 25px;">Login</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="d-flex content-justify">
                                        <div class="text-left w-75 text-white">
                                            No account? <a class="font-weight-bold small" href="register.php"
                                                style="color:#ffc107;">Sign up</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center text-white">
                                        Return to <a class="font-weight-bold small" href="../../index.php"
                                            style="color:#ffc107;">Home</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <?php include "../../includes/livechat.php";?>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/ruang-admin.min.js"></script>
    <!-- particles -->
    <script src="../asset/js/particles.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <!-- scripts js -->
    <script src="../asset/js/scripts.js"></script>
</body>

</html>