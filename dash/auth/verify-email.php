<?php
include '../user-area/includes/connection.php';
session_start();

$email = $_GET['email'];

$sql = "UPDATE clients set email_verified_at = 'verified' WHERE email='$email'";
$result = mysqli_query($con, $sql);

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
    <title>Tradovex | Verify</title>
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
                                        <?php if ($sql) {?>
                                        <p>Your email has successfully been verified</p>
                                        <?php } else {
    echo "<p>Error verifying email</p>";
}?>
                                    </div>

                                    <hr>
                                    <div class="d-flex content-justify">
                                        <div class="text-left w-75 text-white">
                                            Verified? <a class="font-weight-bold small" href="login.php"
                                                style="color:#ffc107;">Sign into your account</a>
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